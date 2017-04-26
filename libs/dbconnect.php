<?php

if(!defined('mnminclude')){header('Location: ../error_404.php');die();}

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

define("EZSQL_DB_USER", $connectstr_dbusername);
define("EZSQL_DB_PASSWORD", $connectstr_dbpassword);
define("EZSQL_DB_NAME", $connectstr_dbname);
define("EZSQL_DB_HOST", $connectstr_dbhost);
if (!function_exists('gettext')) {
	function _($s) {return $s;}
}
?>