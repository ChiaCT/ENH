<?php
namespace ENH\Api;

require_once "../../src/include/config-dev.php";
require_once "../../src/include/test.php";
require_once "../../src/include/init-data.php";
require_once "../../src/include/ENHAutoloader.php";

//require_once "../../src/Database/DB_Wrapper.php";
//require_once "../../src/Database/Account.php";
//require_once "../../src/Database/Company.php";
//require_once "../../src/Database/Address.php";
//require_once "../../src/Database/Email.php";
//require_once "../../src/Database/Phone.php";
//require_once "../../src/Database/Person.php";
//require_once "../../src/Database/AccountType.php";
//require_once "../../src/Database/Employee.php";
//require_once "../../src/Database/Note.php";
//require_once "../../src/Database/Reference.php";
//require_once "../../src/Database/SalaryHistory.php";
//require_once "../../src/Database/Transaction.php";
//require_once "../../src/Database/Cash.php";

$loader = new \ENH\Core\ENHAutoloaderClass;
$loader->register();
$loader->addNamespace("ENH\Database", "../../src/Database");
$loader->addNamespace("ENH\Bookkeeping", "../../src/Bookkeeping");

$dsn      = "mysql:host=" . ENH_MYSQL_HOST . ";dbname=" . ENH_MYSQL_DBNAME;
$dbConfig = array("dsn"=>$dsn, "username"=>ENH_MYSQL_USERNAME, "password"=>ENH_MYSQL_PASSWORD);

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $filter = INPUT_POST;
        break;
    case "GET":
        $filter = INPUT_GET;
        break;
    default:
        $filter = INPUT_REQUEST;
}

$action = strtolower(trim(filter_input($filter, "action")));
$data   = json_encode(trim(filter_input($filter, "data")));

//$testInsertData = $insertCashData;
//$testUpdateData = $updateCashData;
$db = \ENH\Database\DB_Wrapper::instance();
$accountType = new \ENH\Database\AccountType();
switch ($action) {
    case "account_add_person":
        
        break;
    case "account_add_company":
        
        break;
    case "account_update":
        
        break;
    case "account_delete":
        
        break;
    case "company_add":
        
        break;
    case "company_update":
        
        break;
    case "company_delete":
        
        break;
    case "person_add":
        
        break;
    case "person_update":
        
        break;
    case "person_delete":
        
        break;
    case "transaction_add":
        
        break;
    case "transaction_update":
        
        break;
    case "trnasaction_delete":
        
        break;
    case "test_reset":
        print_r("-----------------reset-----------------\n");
        $reset = $accountType->resetDB(ENH_MYSQL_DBNAME);

//        print_r("-----------------reset-----------------\n");
//        $result  = $testObj->resetTable("account");
        
        
//        foreach ($accountTypeData as $data) {
//            $accountInsert = $accountType->insert($data);
//        }
//        $accountSelect = $accountType->getRow();
//        $cm = new \ENH\Bookkeeping\CompanyManagement($db);
//        $data1 = array(
//            "company"=>$companyData[0],
//            "address"=>$addressData[0],
//            "email"=>$emailData[0],
//            "phone"=>$phoneData[0]
//        );
//        $data2 = array(
//            "company"=>$companyData[1],
//            "address"=>$addressData[1],
//            "email"=>$emailData[0],
//            "phone"=>$phoneData[0]
//        );
//        $cm->addNew($data1, "company");
//        $cm->addNew($data2, "company");
//        $rows = $cm->getRow();
//        print_r($rows["rows"][0]);
//        $cm->update($updateAddressData, "address");
//        $cm->update($updateEmailData, "email");
//        $cm->update($updatePhoneData, "phone");
//        $rows = $cm->getRow();
//        print_r($rows["rows"][0]);
        break;
}