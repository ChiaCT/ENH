<?php
namespace ENH\Core;

/**
 * Description of Employee
 *
 * @author CTSAI
 */
class Employee extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array("person_id", "active", "modified_by", "created_by"),
            "update"=>array("id", "person_id", "active", "type_name", "modified_by"),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "person_id"=>array("value"=>$rawData["person_id"], "type"=>\PDO::PARAM_INT),
            "active"=>array("value"=>$rawData["active"], "type"=>\PDO::PARAM_BOOL),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `employee`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `person_id`,
                            `active`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `employee`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `employee` (
                        `person_id`,
                        `active`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :person_id,
                        :active,
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
        $stmt = "   UPDATE  `employee`
                    SET     `person_id` = :person_id,
                            `active` = :active,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
