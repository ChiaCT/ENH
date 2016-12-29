<?php
namespace ENH\Core;

/**
 * Description of address
 *
 * @author CTSAI
 */
class Address extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array("address_ln1", "address_ln2", "city", "state", "zip", "modified_by", "created_by"),
            "update"=>array("id", "address_ln1", "address_ln2", "city", "state", "zip", "modified_by"),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "address_ln1"=>array("value"=>$rawData["address_ln1"], "type"=>\PDO::PARAM_STR),
            "address_ln2"=>array("value"=>$rawData["address_ln2"], "type"=>\PDO::PARAM_STR),
            "city"=>array("value"=>$rawData["city"], "type"=>\PDO::PARAM_STR),
            "state"=>array("value"=>$rawData["state"], "type"=>\PDO::PARAM_STR),
            "zip"=>array("value"=>$rawData["zip"], "type"=>\PDO::PARAM_STR),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }
    
    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `address`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `address_ln1`,
                            `address_ln2`,
                            `city`,
                            `state`,
                            `zip`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `address`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($radData)
    {
        $stmt = "   INSERT INTO `address` (
                        `address_ln1`,
                        `address_ln2`,
                        `city`,
                        `state`,
                        `zip`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :address_ln1,
                        :address_ln2,
                        :city,
                        :state,
                        :zip,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );";
        $result = parent::exec($stmt, $this->prepareData($radData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `address`
                    SET     `address_ln1` = :address_ln1,
                            `address_ln2` = :address_ln2,
                            `city` = :city,
                            `state` = :state,
                            `zip` = :zip,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
