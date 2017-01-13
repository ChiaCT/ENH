<?php
namespace ENH\Database;

/**
 * Description of Type
 *
 * @author CTSAI
 */
class Type extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "name",
                "is_account",
                "is_transaction",
                "is_address",
                "is_phone",
                "is_email",
                "is_payment",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "name",
                "is_account",
                "is_transaction",
                "is_address",
                "is_phone",
                "is_email",
                "is_payment",
                "modified_by",
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
            "name" => array(
                "value" => isset($rawData["name"]) ? $rawData["name"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "is_account" => array(
                "value" => isset($rawData["is_account"]) ? $rawData["is_account"] : '',
                "type" => \PDO::PARAM_BOOL
            ),
            "is_transaction" => array(
                "value" => isset($rawData["is_transaction"]) ? $rawData["is_transaction"] : '',
                "type" => \PDO::PARAM_BOOL
            ),
            "is_address" => array(
                "value" => isset($rawData["is_address"]) ? $rawData["is_address"] : '',
                "type" => \PDO::PARAM_BOOL
            ),
            "is_phone" => array(
                "value" => isset($rawData["is_phone"]) ? $rawData["is_phone"] : '',
                "type" => \PDO::PARAM_BOOL
            ),
            "is_email" => array(
                "value" => isset($rawData["is_email"]) ? $rawData["is_email"] : '',
                "type" => \PDO::PARAM_BOOL
            ),
            "is_payment" => array(
                "value" => isset($rawData["is_payment"]) ? $rawData["is_payment"] : '',
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
                    FROM    `type`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,
                            `name`,
                            `is_account`,
                            `is_transaction`,
                            `is_address`,
                            `is_phone`,
                            `is_email`,
                            `is_payment`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `type`
                    $where
                    $orderBy
                    $limit;";
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `type` (
                        `name`,
                        `is_account`,
                        `is_transaction`,
                        `is_address`,
                        `is_phone`,
                        `is_email`,
                        `is_payment`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :name,
                        :is_account,
                        :is_transaction,
                        :is_address,
                        :is_phone,
                        :is_email,
                        :is_payment,
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
        $stmt = "   UPDATE  `type`
                    SET     `name` = :name,
                            `is_account` = :is_account,
                            `is_transaction` = :is_transaction,
                            `is_address` = :is_address,
                            `is_phone` = :is_phone,
                            `is_email` = :is_email,
                            `is_payment` = :is_payment,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
