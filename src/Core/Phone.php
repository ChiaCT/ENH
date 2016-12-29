<?php
namespace ENH\Core;

/**
 * Description of phone
 *
 * @author CTSAI
 */
class Phone extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array("phone_type", "phone_number", "phone_ext", "modified_by", "created_by"),
            "update"=>array("id", "phone_type", "phone_number", "phone_ext", "modified_by"),
            "delete"=>array("id")
        );
    }

    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "phone_type"=>array("value"=>$rawData["phone_type"], "type"=>\PDO::PARAM_STR),
            "phone_number"=>array("value"=>$rawData["phone_number"], "type"=>\PDO::PARAM_STR),
            "phone_ext"=>array("value"=>$rawData["phone_ext"], "type"=>\PDO::PARAM_STR),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }
    
    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `phone`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `phone_type`,
                            `phone_number`,
                            `phone_ext`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `phone`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `phone` (
                        `phone_type`,
                        `phone_number`,
                        `phone_ext`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :phone_type,
                        :phone_number,
                        :phone_ext,
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
        $stmt = "   UPDATE  `phone`
                    SET     `phone_type` = :phone_type,
                            `phone_number` = :phone_number,
                            `phone_ext` = :phone_ext,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
