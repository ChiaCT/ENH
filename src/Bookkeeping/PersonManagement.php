<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ENH\Bookkeeping;

/**
 * Description of PersonManagement
 *
 * @author CTSAI
 */
class PersonManagement implements \ENH\Bookkeeping\EntityInterface
{
    private $dbh, $table;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->table["person"]  = new \ENH\Database\Person();
        $this->table["email"]   = new \ENH\Database\Email();
        $this->table["address"] = new \ENH\Database\Address();
        $this->table["phone"]   = new \ENH\Database\Phone();
        $this->table["paMap"]   = new \ENH\Database\PersonAddressMapping();
        $this->table["peMap"]   = new \ENH\Database\PersonEmailMapping();
        $this->table["ppMap"]   = new \ENH\Database\PersonPhoneMapping();
    }

    public function addNew($data, $table, $id = null)
    {
        $this->dbh->beginTransaction();
        
        switch ($table) {
            case "address":
                $insert["address"] = $this->table["address"]->insert($data);
                $insert["paMap"]   = $this->table["paMap"]->insert(
                    array(
                        "person_id"  => $id,
                        "address_id" => $insert["address"]["lastId"],
                    )
                );
                break;
            case "email":
                $insert["email"] = $this->table["email"]->insert($data);
                $insert["peMap"] = $this->table["peMap"]->insert(
                    array(
                        "person_id" => $id,
                        "email_id"  => $insert["email"]["lastId"],
                    )
                );
                break;
            case "phone":
                $insert["phone"] = $this->table["phone"]->insert($data);
                $insert["ppMap"] = $this->table["ppMap"]->insert(
                    array(
                        "person_id" => $id,
                        "phone_id"  => $insert["phone"]["lastId"],
                    )
                );
                break;
            case "person":
                $insert["person"]  = $this->table["person"]->insert($data["person"]);
                $insert["address"] = $this->table["address"]->insert($data["address"]);
                $insert["phone"]   = $this->table["phone"]->insert($data["phone"]);
                $insert["email"]   = $this->table["email"]->insert($data["email"]);
                $insert["paMap"]   = $this->table["paMap"]->insert(
                    array(
                        "person_id"  => $insert["person"]["lastId"],
                        "address_id" => $insert["address"]["lastId"],
                    )
                );
                $insert["peMap"] = $this->table["peMap"]->insert(
                    array(
                        "person_id" => $insert["person"]["lastId"],
                        "email_id"  => $insert["email"]["lastId"],
                    )
                );
                $insert["ppMap"] = $this->table["ppMap"]->insert(
                    array(
                        "person_id" => $insert["person"]["lastId"],
                        "phone_id"  => $insert["phone"]["lastId"],
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
                $camId  = $this->table["paMap"]->getId($id1, $id2);
                $delete = $this->table["paMap"]->delete($camId);
                break;
            case "email":
                $cemId  = $this->table["peMap"]->getId($id1, $id2);
                $delete = $this->table["peMap"]->delete($cemId);
                break;
            case "phone":
                $cpmId  = $this->table["ppMap"]->getId($id1, $id2);
                $delete = $this->table["ppMap"]->delete($cpmId);
                break;
            case "person":
                
                break;
        }
        
        if ($delete["success"]) {
            return true;
        } else {
            return false;
        }
    }

    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        $stmt = "   SELECT  per.id `person_id`,
                            `nickname`,
                            `first_name`,
                            `last_name`,
                            a.id `address_id`,
                            `address_ln1`,
                            `address_ln2`,
                            `city`,
                            `state`,
                            `zip`,
                            p.id `phone_id`,
                            `phone_type`,
                            `phone_number`,
                            `phone_ext`,
                            e.id `email_id`,
                            `email_type`,
                            `email_address`
                    FROM    `person` AS per
                    JOIN    `person_address_mapping` AS pam ON per.id = pam.person_id
                    JOIN    `address` AS a ON pam.address_id = a.id
                    JOIN    `person_phone_mapping` AS ppm ON per.id = ppm.person_id
                    JOIN    `phone` AS p ON ppm.phone_id = p.id
                    JOIN    `person_email_mapping` AS pem ON per.id = pem.person_id
                    JOIN    `email` AS e ON pem.email_id = e.id
                    $where
                    $orderBy
                    $limit;";
        
        return $this->table["person"]->select($stmt);
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
}
