<?php
namespace ENH\Api;

require_once "../../src/include/config-dev.php";
require_once "../../src/include/test.php";

require_once "../../src/Core/DB_Wrapper.php";
require_once "../../src/Core/account.php";
require_once "../../src/Core/company.php";
require_once "../../src/Core/address.php";
require_once "../../src/Core/email.php";
require_once "../../src/Core/phone.php";
require_once "../../src/Core/person.php";
require_once "../../src/Core/AccountType.php";
require_once "../../src/Core/Employee.php";
require_once "../../src/Core/Note.php";
require_once "../../src/Core/Reference.php";
require_once "../../src/Core/SalaryHistory.php";
require_once "../../src/Core/Transaction.php";

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

$testObj        = new \ENH\Core\Transaction($dbConfig);
$testInsertData = $insertTransactionData;
$testUpdateData = $updateTransactionData;

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
        //print_r("-----------------reset-----------------\n");
        //$result  = $testObj->resetTable("phone");
        
        print_r("\n-----------------insert-----------------\n");
        $insert  = $testObj->insert($testInsertData);
        if ($insert["success"]) {
            $lastInsertId = $insert["lastId"];
            print_r("\n-----------------select-----------------\n");
            $selectInsert = $testObj->getRow("WHERE id=$lastInsertId");
            print_r($selectInsert["rows"][0]);
            print_r("Last Id: $lastInsertId\n");
            print_r("\n-----------------update-----------------\n");
            $testUpdateData["id"] = $lastInsertId;
            $update = $testObj->update($testUpdateData);
        
            print_r("\n-----------------select-----------------\n");
            $selectUpdate  = $testObj->getRow("WHERE id=$lastInsertId");
            print_r($selectUpdate["rows"][0]);
            
            print_r("\n-----------------delete-----------------\n");
            $delete  = $testObj->delete($lastInsertId);
            
            print_r("\n-----------------select-----------------\n");
            $selectUpdate  = $testObj->getRow();
            print_r($selectUpdate["rows"]);
        } else {
            print_r("\n-----------------insert failed-----------------\n");
        }

        break;
}