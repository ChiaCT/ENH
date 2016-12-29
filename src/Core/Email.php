<?php
namespace ENH\Core;

/**
 * Description of email
 *
 * @author CTSAI
 */
class Email extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
        $this->dataFilter = array(
            "insert"=>array("email_type", "email_address", "modified_by", "created_by"),
            "update"=>array("id", "email_type", "email_address", "modified_by"),
            "delete"=>array("id")
        );
    }
    
    protected function prepareData($rawData, $filter)
    {
        $data = array(
            "id"=>array("value"=>$rawData["id"], "type"=>\PDO::PARAM_INT),
            "email_type"=>array("value"=>$rawData["email_type"], "type"=>\PDO::PARAM_STR),
            "email_address"=>array("value"=>$rawData["email_address"], "type"=>\PDO::PARAM_STR),
            "modified_by"=>array("value"=>$rawData["modified_by"], "type"=>\PDO::PARAM_STR),
            "created_by"=>array("value"=>$rawData["created_by"], "type"=>\PDO::PARAM_STR),
        );
        
        return $this->filterData($data, $filter);
    }
    
    public function delete($id)
    {
        $stmt = "   DELETE
                    FROM    `email`
                    WHERE   `id` = :id;";
        
        return parent::exec($stmt, $this->prepareData(array("id"=>$id), "delete"));
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  `id`,                       
                            `email_type`,
                            `email_address`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    FROM    `email`
                    $where
                    $orderBy
                    $limit;";
        
        return parent::select($stmt);
    }

    public function insert($rawData)
    {
        $stmt = "   INSERT INTO `email` (
                        `email_type`,
                        `email_address`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        :email_type,
                        :email_address,
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
        $stmt = "   UPDATE  `email`
                    SET     `email_type` = :email_type,
                            `email_address` = :email_address,
                            `modified_by` = :modified_by,
                            `modified_on` = NOW()
                    WHERE   `id` = :id;";
        $result = parent::exec($stmt, $this->prepareData($rawData, "update"));
        
        return $result;
    }
}
