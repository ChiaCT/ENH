<?php
namespace ENH\Database;

/**
 * Description of DB_Wrapper
 *
 * @author CTSAI
 */
abstract class DB_Wrapper
{
    public abstract function insert($rawData);
    public abstract function update($rawData);
    public abstract function delete($id);
    public abstract function getRow($where = '', $orderBy = '', $limit = '');
    
    protected $dataFilter;
    
    protected static $dbh = null;
    
    protected abstract function prepareData($rawData, $filter);
    protected function __construct($option = false) {}
    protected function __clone() {}

    public static function instance()
    {
        if (self::$dbh === null)
        {
            $dsn      = "mysql:host=" . ENH_MYSQL_HOST . ";dbname=" . ENH_MYSQL_DBNAME;
            $dbConfig = array("dsn"=>$dsn, "username"=>ENH_MYSQL_USERNAME, "password"=>ENH_MYSQL_PASSWORD);
            $opt      = array(
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_SILENT,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            );
            try {
                self::$dbh = new \PDO($dbConfig["dsn"], $dbConfig["username"], $dbConfig["password"], $opt);
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        return self::$dbh;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
    public function getStatus($status)
    {
        var_dump(self::$dbh);
        print_r(self::$dbh->getAttribute($status));
    }
    
    /**
     * Executing a statement
     * @param string $stmt A query statement to be execute
     * @param string $data Data to be insert or update
     * @param mixed $option
     * @return mixed
     */
    public function exec($stmt, $data, $option = false)
    {
        try {
            $sth = self::$dbh->prepare($stmt);
            foreach ($data as $k => $v) {
                $sth->bindValue(":$k", $v["value"], $v["type"]);
            }
            $result = $sth->execute();
            $count  = $sth->rowCount();
            if ($result === false || $count === 0) {
                return array("success"=>false, "errorMsg"=>$sth->errorInfo()[2]);
            } else {
                return array("success"=>true, "lastId"=>self::$dbh->lastInsertId());
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    public function select($stmt)
    {
        try {
            $result = self::$dbh->query($stmt);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        if ($result === false) {
            return array("success"=>false, "errorMsg"=>self::$dbh->errorInfo()[2]);
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
        self::$dbh->query("SET FOREIGN_KEY_CHECKS = 0;");
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
        self::$dbh->query("SET FOREIGN_KEY_CHECKS = 1;");
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
            $truncate = self::$dbh->query($stmt);
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
            $select = self::$dbh->query($stmt, \PDO::FETCH_ASSOC);
            foreach ($select as $row) {
                $tables[] = $row["TABLE_NAME"];
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        return $tables;
    }
}
