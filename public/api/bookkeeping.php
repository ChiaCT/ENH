<?php
namespace ENH\Api;

require_once "../../src/include/config-dev.php";
require_once "../../src/include/ENHAutoloader.php";

$loader = new \ENH\Core\ENHAutoloaderClass;
$loader->register();
$loader->addNamespace("ENH\Database", "../../src/Database");
$loader->addNamespace("ENH\Bookkeeping", "../../src/Bookkeeping");

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
$data   = json_decode(trim(filter_input($filter, "data")));
$db = \ENH\Database\DB_Wrapper::instance();
switch ($action) {
    case "gettype":
        $am   = new \ENH\Bookkeeping\AccountManagement($db);
        $rows = $am->getType($data->type);
        echo $rows;
        break;
}