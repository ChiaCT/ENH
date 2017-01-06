<?php
namespace ENH\Bookkeeping;

/**
 * Description of CompanyManagement
 *
 * @author CTSAI
 */
class CompanyManagement implements EntityInterface
{
    private $dbh, $table;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->table["company"] = new \ENH\Database\Company();
        $this->table["email"]   = new \ENH\Database\Email();
        $this->table["address"] = new \ENH\Database\Address();
        $this->table["phone"]   = new \ENH\Database\Phone();
        $this->table["caMap"]   = new \ENH\Database\CompanyAddressMapping();
        $this->table["ceMap"]   = new \ENH\Database\CompanyEmailMapping();
        $this->table["cpMap"]   = new \ENH\Database\CompanyPhoneMapping();
    }
    
    public function addNew($data, $table, $id = null)
    {
        $this->dbh->beginTransaction();
        
        switch ($table) {
            case "address":
                $insert["address"] = $this->table["address"]->insert($data);
                $insert["caMap"]   = $this->table["caMap"]->insert(
                    array(
                        "company_id" => $id,
                        "address_id" => $insert["address"]["lastId"],
                    )
                );
                break;
            case "email":
                $insert["email"] = $this->table["email"]->insert($data);
                $insert["ceMap"] = $this->table["ceMap"]->insert(
                    array(
                        "company_id" => $id,
                        "email_id"   => $insert["email"]["lastId"],
                    )
                );
                break;
            case "phone":
                $insert["phone"] = $this->table["phone"]->insert($data);
                $insert["cpMap"] = $this->table["cpMap"]->insert(
                    array(
                        "company_id" => $id,
                        "phone_id"   => $insert["phone"]["lastId"],
                    )
                );
                break;
            case "company":
                $insert["company"] = $this->table["company"]->insert($data["company"]);
                $insert["address"] = $this->table["address"]->insert($data["address"]);
                $insert["phone"]   = $this->table["phone"]->insert($data["phone"]);
                $insert["email"]   = $this->table["email"]->insert($data["email"]);
                $insert["caMap"]   = $this->table["caMap"]->insert(
                    array(
                        "company_id" => $insert["company"]["lastId"],
                        "address_id" => $insert["address"]["lastId"],
                    )
                );
                $insert["ceMap"] = $this->table["ceMap"]->insert(
                    array(
                        "company_id" => $insert["company"]["lastId"],
                        "email_id"   => $insert["email"]["lastId"],
                    )
                );
                $insert["cpMap"] = $this->table["cpMap"]->insert(
                    array(
                        "company_id" => $insert["company"]["lastId"],
                        "phone_id"   => $insert["phone"]["lastId"],
                    )
                );
                break;
        }
        
        $result = true;
        foreach ($insert as $k => $v) {
            $result = $result && $v["success"];
        }
        if ($result) {
            $this->dbh->commit();
        } else {
            $this->dbh->rollBack();
        }
    }

    public function delete($id1, $id2, $table)
    {
        switch ($table) {
            case "address":
                $camId  = $this->table["caMap"]->getId($id, $id2);
                $delete = $this->table["caMap"]->delete($camId);
                break;
            case "email":
                $cemId  = $this->table["ceMap"]->getId($id, $id2);
                $delete = $this->table["ceMap"]->delete($cemId);
                break;
            case "phone":
                $cpmId  = $this->table["cpMap"]->getId($id, $id2);
                $delete = $this->table["cpMap"]->delete($cpmId);
                break;
            case "company":
                
                break;
        }
        
        if ($delete["success"]) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data, $table)
    {
        switch ($table) {
            case "address":
                $update = $this->table["address"]->update($data);
                break;
            case "email":
                $update = $this->table["email"]->update($data);
                break;
            case "phone":
                $update = $this->table["phone"]->update($data);
                break;
        }
        if ($update["success"]) {
            return true;
        } else {
            return false;
        }
    }
    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  c.id `company_id`
                            , `company_name`
                            , a.id `address_id`
                            , `address_ln1`
                            , `address_ln2`
                            , `city`
                            , `state`
                            , `zip`
                            , p.id `phone_id`
                            , `phone_type`
                            , `phone_number`
                            , `phone_ext`
                            , e.id `email_id`
                            , `email_type`
                            , `email_address`
                    FROM    `company` AS c
                    JOIN    `company_address_mapping` AS cam ON c.id = cam.company_id
                    JOIN    `address` AS a ON cam.address_id = a.id
                    JOIN    `company_phone_mapping` AS cpm ON c.id = cpm.company_id
                    JOIN    `phone` AS p ON cpm.phone_id = p.id
                    JOIN    `company_email_mapping` AS cem ON c.id = cem.company_id
                    JOIN    `email` AS e ON cem.email_id = e.id
                    $where
                    $orderBy
                    $limit;";
        
        return $this->table["company"]->select($stmt);
    }
}
