<?php
namespace ENH\Database;

/**
 * Description of PersonAddressMapping
 *
 * @author CTSAI
 */
class PersonAddressMapping extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "person_id",
                "address_id"
            ),
            "update"=>array(
                "id",
                "person_id",
                "address_id",
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
            "address_id" => array(
                "value" => isset($rawData["address_id"]) ? $rawData["address_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `person_address_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `person_id`,
                            `address_id`
                    FROM    `person_address_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `person_address_mapping` (
                        `person_id`,
                        `address_id`
                    ) VALUES (
                        :person_id,
                        :address_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `person_address_mapping`
                    SET     `person_id` = :person_id,
                            `address_id` = :address_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
