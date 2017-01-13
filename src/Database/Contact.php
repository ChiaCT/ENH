<?php
namespace ENH\Database;

/**
 * Description of Contact
 *
 * @author CTSAI
 */
class Contact extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array("company_id", "person_id"),
            "update"=>array("id", "company_id", "person_id"),
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
            "company_id" => array(
                "value" => (isset($rawData["company_id"]) && $rawData["company_id"] > 0)
                            ? $rawData["company_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "person_id" => array(
                "value" => (isset($rawData["person_id"]) && $rawData["person_id"] > 0)
                            ? $rawData["person_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            )
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `contact`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,
                            `company_id`,
                            `person_id`
                    FROM    `contact`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `contact` (
                        `company_id`,
                        `person_id`
                    ) VALUES (
                        :company_id,
                        :person_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `contact`
                    SET     `company_id` = :company_id,
                            `person_id` = :person_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
