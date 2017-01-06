<?php
namespace ENH\Api;

require_once "../../src/include/config-dev.php";
require_once "../../src/include/test.php";
require_once "../../src/include/init-data.php";
require_once "../../src/include/ENHAutoloader.php";

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

$db = \ENH\Database\DB_Wrapper::instance();
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
}