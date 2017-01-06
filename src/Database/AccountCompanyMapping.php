<?php
namespace ENH\Database;

/**
 * Description of newPHPClass
 *
 * @author CTSAI
 */
class AccountCompanyMapping extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "account_id",
                "company_id"
            ),
            "update"=>array(
                "id",
                "account_id",
                "company_id",
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
            "company_id" => array(
                "value" => isset($rawData["company_id"]) ? $rawData["company_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `account_company_mapping`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `account_id`,
                            `company_id`
                    FROM    `account_company_mapping`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `account_company_mapping` (
                        `account_id`,
                        `company_id`
                    ) VALUES (
                        :account_id,
                        :company_id
                    );";
        $result = parent::exec($stmt, $this->prepareData($rawData, "insert"));
        
        return $result;
    }

    public function update($rawData)
    {
        $stmt = "   UPDATE  `account_company_mapping`
                    SET     `account_id` = :account_id,
                            `company_id` = :company_id
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }

}
