<?php
namespace ENH\Core;

/**
 * Description of Reference
 *
 * @author CTSAI
 */
class Reference extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array(
                "reference_number",
                "confirmation_number",
                "invoice_number",
                "order_number",
                "transaction_number",
                "check_number",
                "credit_card_id",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "reference_number",
                "confirmation_number",
                "invoice_number",
                "order_number",
                "transaction_number",
                "check_number",
                "credit_card_id",
                "modified_by",
            ),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "reference_number"=>array("value"=>$rawData["reference_number"], "type"=>\PDO::PARAM_STR),
            "confirmation_number"=>array("value"=>$rawData["confirmation_number"], "type"=>\PDO::PARAM_STR),
            "invoice_number"=>array("value"=>$rawData["invoice_number"], "type"=>\PDO::PARAM_STR),
            "order_number"=>array("value"=>$rawData["order_number"], "type"=>\PDO::PARAM_STR),
            "transaction_number"=>array("value"=>$rawData["transaction_number"], "type"=>\PDO::PARAM_STR),
            "check_number"=>array("value"=>$rawData["check_number"], "type"=>\PDO::PARAM_STR),
            "credit_card_id"=>array("value"=>$rawData["credit_card_id"], "type"=>\PDO::PARAM_INT),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `reference`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `reference_number`,
                            `confirmation_number`,
                            `invoice_number`,
                            `order_number`,
                            `transaction_number`,
                            `check_number`,
                            `credit_card_id`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `reference`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `reference` (
                        `reference_number`,
                        `confirmation_number`,
                        `invoice_number`,
                        `order_number`,
                        `transaction_number`,
                        `check_number`,
                        `credit_card_id`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :reference_number,
                        :confirmation_number,
                        :invoice_number,
                        :order_number,
                        :transaction_number,
                        :check_number,
                        :credit_card_id,
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
        $stmt = "   UPDATE  `reference`
                    SET     `reference_number` = :reference_number,
                            `confirmation_number` = :confirmation_number,
                            `invoice_number` = :invoice_number,
                            `order_number` = :order_number,
                            `transaction_number` = :transaction_number,
                            `check_number` = :check_number,
                            `credit_card_id` = :credit_card_id,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
