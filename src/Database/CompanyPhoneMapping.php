<?php
namespace ENH\Database;

/**
 * Description of CompanyPhoneMapping
 *
 * @author CTSAI
 */
class CompanyPhoneMapping extends DB_Wrapper implements MappingTable
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "company_id",
                "phone_id"
            ),
            "update"=>array(
                "id",
                "company_id",
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
            "company_id" => array(
                "value" => isset($rawData["company_id"]) ? $rawData["company_id"] : '',
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
                    FROM    `company_phone_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `company_id`,
                            `phone_id`
                    FROM    `company_phone_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `company_phone_mapping` (
                        `company_id`,
                        `phone_id`
                    ) VALUES (
                        :company_id,
                        :phone_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `company_phone_mapping`
                    SET     `company_id` = :company_id,
                            `phone_id` = :phone_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

    public function getId($id1, $id2, $and = '')
    {
        $stmt   = " SELECT  *
                    FROM    `company_phone_mapping`
                    WHERE   company_id = '$id1' AND phone_id = '$id2'
                    $and";
        $select = $this->company->select($stmt);
        if ($select["success"]) {
            return $select["rows"][0]["id"];
        } else {
            return false;
        }
    }
}
