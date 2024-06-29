<?php
#absoluts path
$internDir="tests/route-manager-php/";
define('URL',"http://{$_SERVER['HTTP_HOST']}/{$internDir}");
(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$bar="":$bar="/";
define('DIR',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$internDir}");

#Data base
// define('HOST',"localhost");
// define('DB',"ajaxwebdesign");
// define('USER',"root");
// define('PASS',"");