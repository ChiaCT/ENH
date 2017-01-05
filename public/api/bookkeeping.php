<?php
namespace ENH\Api;

require_once "../../src/include/config-dev.php";
require_once "../../src/include/test.php";
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
$account = new \ENH\Database\Account();
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
//        print_r("-----------------reset-----------------\n");
//        $result  = $testObj->resetTable("account");
        
//        print_r("\n-----------------insert-----------------\n");
//        $insert  = $testObj->insert($testInsertData);
//        if ($insert["success"]) {
//            $lastInsertId = $insert["lastId"];
//            print_r("\n-----------------select-----------------\n");
//            $selectInsert = $testObj->getRow("WHERE id=$lastInsertId");
//            print_r($selectInsert["rows"][0]);
//            print_r("Last Id: $lastInsertId\n");
//            print_r("\n-----------------update-----------------\n");
//            $testUpdateData["id"] = $lastInsertId;
//            $update = $testObj->update($testUpdateData);
//        
//            print_r("\n-----------------select-----------------\n");
//            $selectUpdate  = $testObj->getRow("WHERE id=$lastInsertId");
//            print_r($selectUpdate["rows"][0]);
//            
//            print_r("\n-----------------delete-----------------\n");
//            $delete  = $testObj->delete($lastInsertId);
//            
//            print_r("\n-----------------select-----------------\n");
//            $selectUpdate  = $testObj->getRow();
//            print_r($selectUpdate["rows"]);
//        } else {
//            print_r("\n-----------------insert failed-----------------\n");
//        }
        $accountInsert = $account->insert($insertAccountData);
        $accountSelect = $account->getRow();
        break;
}