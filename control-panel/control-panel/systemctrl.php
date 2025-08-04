<?php

function map_page(){
    $sys_token = parse_url($_SERVER['REQUEST_URI'])['path'];
    $sys_token = explode("/",$sys_token);

    return $sys_token; 
}

if (!defined("MEDIA_PATH")) {
    define("MEDIA_PATH", dirname(__FILE__).DIRECTORY_SEPARATOR."@media".DIRECTORY_SEPARATOR);
}

if (!defined("__DOMAIN_NAME__")) {
    define("__DOMAIN_NAME__",$_SERVER['HTTP_HOST']); 
}

if (!defined("__PROTOCOL__")) {
    define("__PROTOCOL__",isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
}
if (!defined("__URL__")) {
        define("__URL__",__PROTOCOL__.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
}
if (!defined("__PAGE__")) {
    define("__PAGE__",__PROTOCOL__.__DOMAIN_NAME__."/".map_page()[1]."/");
}
if (!defined("__CURRENCY_SIGN__")) {
    define("__CURRENCY_SIGN__","R");
}

include_once "config.php"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php" ?? trigger_error("FAILED TO LOAD DATABASE MANAGER", E_USER_ERROR);
$db = new database_manager();
function _script($file)
{
    if (file_exists($file)) {
        include_once $file;
    }
}

function _e($data)
{
    echo $data;
}

function change_page($change, $data_sets = false)
{
    if ($data_sets == false) {
        $location = __PAGE__ . $change . "/";
        return $location;
    } else {
        $location = __PAGE__ . $change . "/" . base64_encode($data_sets) . "/";
        return $location;
    }
}

function get_media_hash_from_link($path) {
    $parts = explode('@media/', $path);
    $stringToHash = end($parts); // Get the last element of the array
    if (empty($stringToHash)) {
        return false;
    }
    return $stringToHash; 
}
