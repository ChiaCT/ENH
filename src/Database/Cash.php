<?php
namespace ENH\Database;

/**
 * Description of Cash
 *
 * @author CTSAI
 */
class Cash extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "hundred",
                "fifty",
                "twenty",
                "ten",
                "five",
                "one",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "hundred",
                "fifty",
                "twenty",
                "ten",
                "five",
                "one",
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
            "hundred" => array(
                "value" => isset($rawData["hundred"]) ? $rawData["hundred"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "fifty" => array(
                "value" => isset($rawData["fifty"]) ? $rawData["fifty"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "twenty" => array(
                "value" => isset($rawData["twenty"]) ? $rawData["twenty"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "ten" => array(
                "value" => isset($rawData["ten"]) ? $rawData["ten"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "five" => array(
                "value" => isset($rawData["five"]) ? $rawData["five"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "one" => array(
                "value" => isset($rawData["one"]) ? $rawData["one"] : '',
                "type" => \PDO::PARAM_INT
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
                    FROM    `cash`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `hundred`,
                            `fifty`,
                            `twenty`,
                            `ten`,
                            `five`,
                            `one`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `cash`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `cash` (
                        `hundred`,
                        `fifty`,
                        `twenty`,
                        `ten`,
                        `five`,
                        `one`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :hundred,
                        :fifty,
                        :twenty,
                        :ten,
                        :five,
                        :one,
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
        $stmt = "   UPDATE  `cash`
                    SET     `hundred` = :hundred,
                            `fifty` = :fifty,
                            `twenty` = :twenty,
                            `ten` = :ten,
                            `five` = :five,
                            `one` = :one,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

}
