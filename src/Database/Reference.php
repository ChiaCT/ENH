<?php
namespace ENH\Database;

/**
 * Description of Reference
 *
 * @author CTSAI
 */
class Reference extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "transaction_id",
                "reference_type_id",
                "number",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "transaction_id",
                "reference_type_id",
                "number",
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
                "type" => \PDO::PARAM_INT
            ),
            "transaction_id" => array(
                "value" => isset($rawData["transaction_id"]) ? $rawData["transaction_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "reference_type_id" => array(
                "value" => isset($rawData["reference_type_id"]) ? $rawData["reference_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "number" => array(
                "value" => isset($rawData["number"]) ? $rawData["number"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "modified_by" => array(
                "value" => isset($rawData["modified_by"]) ? $rawData["modified_by"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "created_by" => array(
                "value" => isset($rawData["created_by"]) ? $rawData["created_by"] : '',
                "type" => \PDO::PARAM_STR
            ),
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
                            `transaction_id`,
                            `reference_type_id`,
                            `number`,
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
                        `transaction_id`,
                        `reference_type_id`,
                        `number`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :transaction_id,
                        :reference_type_id,
                        :number,
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
                    SET     `transaction_id` = :transaction_id,
                            `reference_type_id` = :reference_type_id,
                            `number` = :number,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
