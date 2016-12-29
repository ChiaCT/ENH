<?php
namespace ENH\Core;

/**
 * Description of person
 *
 * @author CTSAI
 */
class Person extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array("nickname", "first_name", "last_name", "modified_by", "created_by"),
            "update"=>array("id", "nickname", "first_name", "last_name", "modified_by"),
            "delete"=>array("id")
        );
    }
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "nickname"=>array("value"=>$rawData["nickname"], "type"=>\PDO::PARAM_STR),
            "first_name"=>array("value"=>$rawData["first_name"], "type"=>\PDO::PARAM_STR),
            "last_name"=>array("value"=>$rawData["last_name"], "type"=>\PDO::PARAM_STR),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `person`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `nickname`,
                            `first_name`,
                            `last_name`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `person`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `person` (
                        `nickname`,
                        `first_name`,
                        `last_name`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :nickname,
                        :first_name,
                        :last_name,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `person`
                    SET     `nickname` = :nickname,
                            `first_name` = :first_name,
                            `last_name` = :last_name,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

}
