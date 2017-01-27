<?php
namespace ENH\Bookkeeping;

/**
 * Description of AccountManagement
 *
 * @author CTSAI
 */
class AccountManagement
{
    private $dbh, $account, $contact;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->account = new \ENH\Database\Account();
        $this->contact = new \ENH\Database\Contact();
    }
    public function getType($type)
    {
        var_dump($type);
        switch ($type) {
            case "account":
                $where = "WHERE is_account = 1";
                break;
            case "address":
                $where = "WHERE is_address = 1";
                break;
            case "email":
                $where = "WHERE is_email = 1";
                break;
        }
        $accountType = new \ENH\Database\Type();
        $result = $accountType->getRow($where);
        if ($result["success"]) {
            return json_encode($result["rows"]);
        } else {
            return json_encode($result["success"]);
        }
    }
    public function addNewAccount($data)
    {
        $result = $this->account->insert($data);
        return json_encode($result);
    }
    public function addNewCompany($rawData)
    {
        $company = new \ENH\Database\Company();
        $result  = $company->insert($rawData);
        return json_endoce($result);
    }
    public function addNewPerson($rawData)
    {
        $person = new \ENH\Database\Person();
        $result = $person->insert($rawData);
        return json_endoce($result);
    }
    public function addNewContact($cId, $pId, $type, $data)
    {
        switch ($type) {
            case "address":
                $result = $this->addNewAddress($cId, $pId, $data);
                break;
            case "email":
                $result = $this->addNewEmail($cId, $pId, $data);
                break;
            case "phone":
                $result = $this->addNewPhone($cId, $pId, $data);
                break;
        }
    }
 
    private function addNewPhone($rawData)
    {
        $stmt = "   INSERT INTO `contact` (
                        company_id,
                        person_id
                    ) VALUES (
                        :company_id,
                        :person_id
                    );
                    SET @contactId = LAST_INSERT_ID();

                    INSERT INTO `phone` (
                        contact_id,
                        contact_type,
                        phone_number,
                        phone_ext,
                        modified_by,
                        modified_on,
                        created_by,
                        created_on
                    ) VALUES (
                        @contactId,
                        :contact_type,
                        :phone_number,
                        :phone_ext,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );";
        $data = array(
            "company_id" => array(
                "value" => (isset($rawData["company_id"]) && $rawData["company_id"] > 0)
                            ? $rawData["company_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "person_id" => array(
                "value" => (isset($rawData["person_id"]) && $rawData["person_id"] > 0)
                            ? $rawData["person_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "contact_type_id" => array(
                "value" => isset($rawData["contact_type_id"]) ? $rawData["contact_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "phone_number" => array(
                "value" => isset($rawData["phone_number"]) ? $rawData["phone_number"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "phone_ext" => array(
                "value" => isset($rawData["phone_ext"]) ? $rawData["phone_ext"] : '',
                "type" => \PDO::PARAM_STR
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
        $result = $this->contact->exec($stmt, $data);
        return json_encode($result);
    }
    
    private function addNewAddress($rawData)
    {
        $stmt = "   INSERT INTO `contact` (
                        company_id,
                        person_id
                    ) VALUES (
                        :company_id,
                        :person_id
                    );
                    SET @contactId = LAST_INSERT_ID();

                    INSERT INTO `address` (
                        contact_id,
                        contact_type_id,
                        address_ln1,
                        address_ln2,
                        city,
                        state,
                        zip,
                        modified_by,
                        modified_on,
                        created_by,
                        created_on
                    ) VALUES (
                        @contactId,
                        :contact_type_id,
                        :address_ln1,
                        :address_ln2,
                        :city,
                        :state,
                        :zip,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );";
        $data = array(
            "company_id" => array(
                "value" => (isset($rawData["company_id"]) && $rawData["company_id"] > 0)
                            ? $rawData["company_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "person_id" => array(
                "value" => (isset($rawData["person_id"]) && $rawData["person_id"] > 0)
                            ? $rawData["person_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "contact_type_id" => array(
                "value" => isset($rawData["contact_type_id"]) ? $rawData["contact_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "address_ln1"=>array(
                "value" => isset($rawData["address_ln1"]) ? $rawData["address_ln1"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "address_ln2" => array(
                "value" => isset($rawData["address_ln2"]) ? $rawData["address_ln2"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "city" => array(
                "value" => isset($rawData["city"]) ? $rawData["city"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "state" => array(
                "value" => isset($rawData["state"]) ? $rawData["state"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "zip"=>array(
                "value" => isset($rawData["zip"]) ? $rawData["zip"] : '',
                "type" => \PDO::PARAM_STR
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
        $result = $this->contact->exec($stmt, $data);
        return json_encode($result);
    }
    private function addNewEmail($rawData)
    {
        $stmt = "   INSERT INTO `contact` (
                        company_id,
                        person_id
                    ) VALUES (
                        :company_id,
                        :person_id
                    );
                    SET @contactId = LAST_INSERT_ID();

                    INSERT INTO `email` (
                        `contact_id`,
                        `contact_type_id`,
                        `email_address`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        @contactId,
                        :contact_type_id,
                        :email_address,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );";
        $data = array(
            "company_id" => array(
                "value" => (isset($rawData["company_id"]) && $rawData["company_id"] > 0)
                            ? $rawData["company_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "person_id" => array(
                "value" => (isset($rawData["person_id"]) && $rawData["person_id"] > 0)
                            ? $rawData["person_id"] 
                            : null,
                "type" => \PDO::PARAM_INT
            ),
            "contact_type_id" => array(
                "value" => isset($rawData["contact_type_id"]) ? $rawData["contact_type_id"] : '',
                "type" => \PDO::PARAM_INT
            ),
            "email_address" => array(
                "value" => isset($rawData["email_address"]) ? $rawData["email_address"] : '',
                "type" => \PDO::PARAM_STR
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
        $result = $this->contact->exec($stmt, $data);
        return json_encode($result);
    }
}
