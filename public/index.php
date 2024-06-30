<?php

header("Content-Type: text/html; charset=utf-8");

include("../config/config.php");
include "../vendor/autoload.php";

use Routes\ManagerRoute;

$manager = new ManagerRoute();






