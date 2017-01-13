<?php
namespace ENH\Database;

/**
 * Description of address
 *
 * @author CTSAI
 */
class Address extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array("contact_id", "contact_type_id", "address_ln1", "address_ln2", "city", "state", "zip", "modified_by", "created_by"),
            "update"=>array("id", "contact_id", "contact_type_id", "address_ln1", "address_ln2", "city", "state", "zip", "modified_by"),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id" => array(
                "value" => isset($rawData["id"]) ? $rawData["id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "contact_id" => array(
                "value" => isset($rawData["contact_id"]) ? $rawData["contact_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "contact_type_id" => array(
                "value" => isset($rawData["contact_type_id"]) ? $rawData["contact_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "address_ln1"=>array(
                "value" => isset($rawData["address_ln1"]) ? $rawData["address_ln1"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "address_ln2" => array(
                "value" => isset($rawData["address_ln2"]) ? $rawData["address_ln2"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "city" => array(
                "value" => isset($rawData["city"]) ? $rawData["city"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "state" => array(
                "value" => isset($rawData["state"]) ? $rawData["state"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "zip"=>array(
                "value" => isset($rawData["zip"]) ? $rawData["zip"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "modified_by" => array(
                "value" => isset($rawData["modified_by"]) ? $rawData["modified_by"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "created_by" => array(
                "value" => isset($rawData["created_by"]) ? $rawData["created_by"] : '',
                "type" => \PDO::PARAM_STR
            )
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
                            `contact_id`,
                            `contact_type_id`,
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
                        `contact_id`,
                        `contact_type_id`,
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
                        :contact_id,
                        :contact_type_id,
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
                    SET     `contact_id` = :contact_id,
                            `contact_type_id` = :contact_type_id,
                            `address_ln1` = :address_ln1,
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
