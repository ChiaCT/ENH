<?php
namespace ENH\Database;

/**
 * Description of PersonPhoneMapping
 *
 * @author CTSAI
 */
class PersonPhoneMapping extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "person_id",
                "phone_id"
            ),
            "update"=>array(
                "id",
                "person_id",
                "phone_id",
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
            "person_id" => array(
                "value" => isset($rawData["person_id"]) ? $rawData["person_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "phone_id" => array(
                "value" => isset($rawData["phone_id"]) ? $rawData["phone_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `person_phone_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `person_id`,
                            `phone_id`
                    FROM    `person_phone_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `person_phone_mapping` (
                        `person_id`,
                        `phone_id`
                    ) VALUES (
                        :person_id,
                        :phone_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `person_phone_mapping`
                    SET     `person_id` = :person_id,
                            `phone_id` = :phone_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
