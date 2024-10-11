<?php
// error_reporting(E_ALL);
ini_set("display_errors", 0); // 1

header("Content-Type: text/html; charset=utf-8");

include("../config/config.php");
include "../vendor/autoload.php";

use Routes\ManagerRoute;

$manager = new ManagerRoute();


