<?php

header("Content-Type: text/html; charset=utf-8");

include("../config/config.php");
include "../vendor/autoload.php";

use Controllers\Home;
use Routes\ManagerRoute;

echo "<pre>";
echo "<h1>Route Manager PHP</h1>";

$manager = new ManagerRoute();






