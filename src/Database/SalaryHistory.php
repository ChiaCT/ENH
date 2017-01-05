<?php
namespace ENH\Database;

/**
 * Description of SalaryHistory
 *
 * @author CTSAI
 */
class SalaryHistory extends DB_Wrapper
{
    public function __construct($option = false)
    {
        parent::__construct($option);
        $this->dataFilter = array(
            "insert"=>array(
                "salary",
                "pay_period",
                "effective_date",
                "is_current",
                "modified_by",
                "created_by"
            ),
            "update"=>array(
                "id",
                "salary",
                "pay_period",
                "effective_date",
                "is_current",
                "modified_by",
            ),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id" => array(
                "value" => $rawData["id"],
                "type" => \PDO::PARAM_INT
            ),
            "salary" => array(
                "value" => $rawData["salary"],
                "type" => \PDO::PARAM_STR
            ),
            "pay_period" => array(
                "value" => $rawData["pay_period"],
                "type" => \PDO::PARAM_INT
            ),
            "effective_date" => array(
                "value" => $rawData["effective_date"],
                "type" => \PDO::PARAM_STR
            ),
            "is_current" => array(
                "value" => $rawData["is_current"],
                "type" => \PDO::PARAM_BOOL
            ),
            "modified_by" => array(
                "value" => $rawData["modified_by"],
                "type" => \PDO::PARAM_STR
            ),
            "created_by" => array(
                "value" => $rawData["created_by"],
                "type" => \PDO::PARAM_STR
            ),
        );
        
        return $this->filterData($data, $filter);
    }

    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `salary_history`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `salary`,
                            `pay_period`,
                            `effective_date`,
                            `is_current`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `salary_history`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `salary_history` (
                        `salary`,
                        `pay_period`,
                        `effective_date`,
                        `is_current`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :salary,
                        :pay_period,
                        :effective_date,
                        :is_current,
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
        $stmt = "   UPDATE  `salary_history`
                    SET     `salary` = :salary,
                            `pay_period` = :pay_period,
                            `effective_date` = :effective_date,
                            `is_current` = :is_current,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
