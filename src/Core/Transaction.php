<?php
namespace ENH\Core;

/**
 * Description of Transaction
 *
 * @author CTSAI
 */
class Transaction extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array(
                "account_id",
                "payment_type_id",
                "reference_id",
                "note_id",
                "amount",
                "transaction_date",
                "pay_date",
                "exclude",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "account_id",
                "payment_type_id",
                "reference_id",
                "note_id",
                "amount",
                "transaction_date",
                "pay_date",
                "exclude",
                "modified_by",
            ),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "account_id"=>array("value"=>$rawData["account_id"], "type"=>\PDO::PARAM_INT),
            "payment_type_id"=>array("value"=>$rawData["payment_type_id"], "type"=>\PDO::PARAM_INT),
            "reference_id"=>array("value"=>$rawData["reference_id"], "type"=>\PDO::PARAM_INT),
            "note_id"=>array("value"=>$rawData["note_id"], "type"=>\PDO::PARAM_INT),
            "amount"=>array("value"=>$rawData["amount"], "type"=>\PDO::PARAM_STR),
            "transaction_date"=>array("value"=>$rawData["transaction_date"], "type"=>\PDO::PARAM_STR),
            "pay_date"=>array("value"=>$rawData["pay_date"], "type"=>\PDO::PARAM_STR),
            "exclude"=>array("value"=>$rawData["exclude"], "type"=>\PDO::PARAM_BOOL),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `transaction`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `account_id`,
                            `payment_type_id`,
                            `reference_id`,
                            `note_id`,
                            `amount`,
                            `transaction_date`,
                            `pay_date`,
                            `exclude`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `transaction`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `transaction` (
                        `account_id`,
                        `payment_type_id`,
                        `reference_id`,
                        `note_id`,
                        `amount`,
                        `transaction_date`,
                        `pay_date`,
                        `exclude`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :account_id,
                        :payment_type_id,
                        :reference_id,
                        :note_id,
                        :amount,
                        :transaction_date,
                        :pay_date,
                        :exclude,
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
        $stmt = "   UPDATE  `transaction`
                    SET     `account_id` = :account_id,
                            `payment_type_id` = :payment_type_id,
                            `reference_id` = :reference_id,
                            `note_id` = :note_id,
                            `amount` = :amount,
                            `transaction_date` = :transaction_date,
                            `pay_date` = :pay_date,
                            `exclude` = :exclude,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
