<?php
namespace ENH\Database;

/**
 * Description of Account
 *
 * @author CTSAI
 */
class Account extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "account_name",
                "account_type_id",
                "active",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "account_name",
                "account_type_id",
                "active",
                "modified_by"
            ),
            "delete"=>array("id")
        );
    }
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id" => array(
                "value" => isset($rawData["id"]) ? $rawData["id"] : '',
                "type"=>\PDO::PARAM_INT
            ),
            "account_name" => array(
                "value" => isset($rawData["account_name"]) ? $rawData["account_name"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "account_type_id" => array(
                "value" => isset($rawData["account_type_id"]) ? $rawData["account_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "active" => array(
                "value" => isset($rawData["active"]) ? $rawData["active"] : '',
                "type" => \PDO::PARAM_BOOL
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
                    FROM    `account`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `account_name`,
                            `account_type_id`,
                            `active`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `account`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `account` (
                        `account_name`,
                        `account_type_id`,
                        `active`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :account_name,
                        :account_type_id,
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
        $stmt = "   UPDATE  `account`
                    SET     `account_name` = :account_name,
                            `account_type_id` = :account_type_id,
                            `active` = :active,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

}
