<?php
namespace ENH\Database;

/**
 * Description of CompanyAddressMapping
 *
 * @author CTSAI
 */
class CompanyAddressMapping extends DB_Wrapper implements MappingTable
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "company_id",
                "address_id"
            ),
            "update"=>array(
                "id",
                "company_id",
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
            "company_id" => array(
                "value" => isset($rawData["company_id"]) ? $rawData["company_id"] : '',
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
                    FROM    `company_address_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `company_id`,
                            `address_id`
                    FROM    `company_address_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `company_address_mapping` (
                        `company_id`,
                        `address_id`
                    ) VALUES (
                        :company_id,
                        :address_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `company_address_mapping`
                    SET     `company_id` = :company_id,
                            `address_id` = :address_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
    
    public function getId($id1, $id2, $and = '')
    {
        $stmt   = " SELECT  *
                    FROM    `company_address_mapping`
                    WHERE   company_id = '$id1' AND address_id = '$id2'
                    $and";
        $select = $this->company->select($stmt);
        if ($select["success"]) {
            return $select["rows"][0]["id"];
        } else {
            return false;
        }
    }
}
