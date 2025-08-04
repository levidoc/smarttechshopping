<?php
@include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php" ?? trigger_error("FAILED TO LOAD DATABASE MANAGER", E_USER_ERROR);
$db = new database_manager();
?>