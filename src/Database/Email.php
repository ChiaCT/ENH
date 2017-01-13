<?php
namespace ENH\Database;

/**
 * Description of email
 *
 * @author CTSAI
 */
class Email extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array("contact_id", "contact_type_id", "email_address", "modified_by", "created_by"),
            "update"=>array("id", "contact_id", "contact_type_id", "email_address", "modified_by"),
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
            "email_address" => array(
                "value" => isset($rawData["email_address"]) ? $rawData["email_address"] : '',
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
                    FROM    `email`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,
                            `contact_id`,
                            `contact_type_id`,
                            `email_address`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `email`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `email` (
                        `contact_id`,
                        `contact_type_id`,
                        `email_address`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :contact_id,
                        :contact_type_id,
                        :email_address,
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
        $stmt = "   UPDATE  `email`
                    SET     `contact_id` = :contact_id,
                            `contact_type_id` = :contact_type_id,
                            `email_address` = :email_address,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
