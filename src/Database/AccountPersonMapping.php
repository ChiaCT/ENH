<?php
namespace ENH\Database;

/**
 * Description of AccountPersonMapping
 *
 * @author CTSAI
 */
class AccountPersonMapping extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "account_id",
                "person_id"
            ),
            "update"=>array(
                "id",
                "account_id",
                "person_id",
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
            "account_id" => array(
                "value" => isset($rawData["account_id"]) ? $rawData["account_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "person_id" => array(
                "value" => isset($rawData["person_id"]) ? $rawData["person_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `account_person_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `account_id`,
                            `person_id`
                    FROM    `account_person_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `account_person_mapping` (
                        `account_id`,
                        `person_id`
                    ) VALUES (
                        :account_id,
                        :person_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `account_person_mapping`
                    SET     `account_id` = :account_id,
                            `person_id` = :person_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

}
