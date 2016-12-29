<?php
namespace ENH\Core;

/**
 * Description of DB_Wrapper
 *
 * @author CTSAI
 */
abstract class DB_Wrapper
{
    private $config, $dbh;
    protected $dataFilter;

    public abstract function insert($rawData);
    public abstract function update($rawData);
    public abstract function delete($id);
    public abstract function getRow($where = '', $orderBy = '', $limit = '');
    protected abstract function prepareData($rawData, $filter);
    
    public function __construct($config, $option = false)
    {
        $this->config = $config;
        $this->init();
    }
    
    private function init($option = false)
    {
        try {
            $this->dbh = new \PDO($this->config["dsn"], $this->config["username"], $this->config["password"]);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    /**
     * Executing a statement
     * @param string $stmt A query statement to be execute
     * @param string $data Data to be insert or update
     * @param mixed $option
     * @return mixed
     */
    protected function exec($stmt, $data, $option = false)
    {
        try {
            $sth = $this->dbh->prepare($stmt);
            foreach ($data as $k => $v) {
                $sth->bindValue(":$k", $v["value"], $v["type"]);
            }
            $result = $sth->execute();
            $count  = $sth->rowCount();
            if ($result === false || $count === 0) {
                return array("success"=>false, "errorMsg"=>$sth->errorInfo()[2]);
            } else {
                return array("success"=>true, "lastId"=>$this->dbh->lastInsertId());
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    protected function select($stmt)
    {
        try {
            $result = $this->dbh->query($stmt);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        if ($result === false) {
            return array("success"=>false, "errorMsg"=>$this->dbh->errorInfo()[2]);
        } else {
            return array("success"=>true, "rows"=>$result->fetchAll(\PDO::FETCH_ASSOC));
        }
    }
            
    protected function filterData($data, $filter)
    {
        $filterKeys = $this->dataFilter[$filter];
        $dataKeys   = array_keys($data);
        $diffKeys   = array_diff($dataKeys, $filterKeys);
        foreach ($diffKeys as $k) {
            unset($data[$k]);
        }
        return $data;
    }
    
/**
     * Reset a database
     * @param string $db Target database
     * @return array
     */
    public function resetDB($db)
    {
        $fail    = array();
        $success = array();
        $tables  = $this->getAllTable($db);
        foreach ($tables as $table) {
            $reset = $this->resetTable($table);
            if (!$reset) {
                $fail[] = $table;
            } else {
                $success[] = $table;
            }
        }
        return array("success"=>$success, "fail"=>$fail);
    }
    
    /**
     * Truncate a table
     * @param string $table Table to be truncate
     * @return boolean
     */
    public function resetTable($table)
    {
        $stmt = "TRUNCATE $table;";
        try {
            $truncate = $this->dbh->query($stmt);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        return $truncate;
    }
    
    /**
     * Get all tables in a database.
     * @param string $db Target database.
     * @return array
     */
    public function getAllTable($db)
    {
        $tables = array();
        $stmt   = " SELECT	`TABLE_NAME`
                    FROM	`information_schema`.`tables`
                    WHERE	TABLE_SCHEMA = '$db'
                    AND		TABLE_TYPE = 'BASE TABLE';";
        try {
            $select = $this->dbh->query($stmt, \PDO::FETCH_ASSOC);
            foreach ($select as $row) {
                $tables[] = $row["TABLE_NAME"];
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        return $tables;
    }
}
