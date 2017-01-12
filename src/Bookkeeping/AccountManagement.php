<?php
namespace ENH\Bookkeeping;

/**
 * Description of AccountManagement
 *
 * @author CTSAI
 */
class AccountManagement
{
    private $dbh, $table;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }
    public function addNewAccount()
    {
        
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
    private function addNewCompany($aData, $cData)
    {
        
    }
    private function addNewPerson($rawData)
    {
        $stmt = "   START TRANSACTION;
                    #PERSON
                    INSERT INTO `person` (
                            `nickname`,
                            `first_name`,
                            `last_name`,
                            `modified_by`,
                            `modified_on`,
                            `created_by`,
                            `created_on`
                    ) VALUES (
                            :first_name,
                    :last_name,
                    :modified_by,
                    NOW(),
                    :created_by,
                    NOW()
                    );
                    SET @personId = LAST_INSERT_ID();

                    #CONTACT
                    INSERT INTO `contact` (
                        `company_id`,
                        `person_id`
                    ) VALUES (
                        0,
                        @personId
                    );
                    SET @contactId = LAST_INSERT_ID();

                    #ADDRESS
                    INSERT INTO `address` (
                        `contact_id`,
                        `address_ln1`,
                        `address_ln2`,
                        `city`,
                        `state`,
                        `zip`,
                        `modified_by`,
                        `modified_on`,
                        `created_by`,
                        `created_on`
                    ) VALUES (
                        @contactId,
                        :address_ln1,
                        :address_ln2,
                        :city,
                        :state,
                        :zip,
                        :modified_by,
                        NOW(),
                        :created_by,
                        NOW()
                    );
                    SET @addressId = LAST_INSERT_ID();
                    COMMIT;";
        $data = array(
            "nickname" => array(
                "value" => isset($rawData["person"]["nickname"]) ? $rawData["person"]["nickname"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "nickname" => array(
                "value" => isset($rawData["nickname"]) ? $rawData["nickname"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "first_name" => array(
                "value" => isset($rawData["first_name"]) ? $rawData["first_name"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "last_name" => array(
                "value" => isset($rawData["last_name"]) ? $rawData["last_name"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "modified_by" => array(
                "value" => isset($rawData["modified_by"]) ? $rawData["modified_by"] : '',
                "type" => \PDO::PARAM_STR
            ),
            "created_by" => array(
                "value" => isset($rawData["created_by"]) ? $rawData["created_by"] : '',
                "type" => \PDO::PARAM_STR
            ),
        );
    }
    
    private function addNewAddress($cId, $pId, $address)
    {
        
    }
    private function addNewPhone($cId, $pId, $phone)
    {
        
    }
    private function addNewEmail($cId, $pId, $email)
    {
        
    }
}
