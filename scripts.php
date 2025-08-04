<?php
# This Will contain all the Site fucntions 
define("CRASH_APP", display_300());
if (!defined("PWD")) {
    define("PWD", __DIR__);
}

@include_once PWD . "/database/client.module.php";
if (!defined("MEDIA_PATH")) {
    define("MEDIA_PATH", dirname(__FILE__).DIRECTORY_SEPARATOR."@media".DIRECTORY_SEPARATOR);
}

if (!defined('__DATABASE__')){
    $ettttttttttt = new database_manager(); 
    define("__DATABASE__",$ettttttttttt); 
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
if (!defined("__CURRENCY_SIGN__")) {
    define("__CURRENCY_SIGN__","R");
}

if (!defined("__ADMIN_URL__")){
    define("__ADMIN_URL__",get_admin_url()); 
}

function get_admin_url(){
    $file_path = PWD."/control-panel/bin/dependencies/gateways.pxy";
    $default_route = "vm-admin";
    if (file_exists($file_path)){
        #Encryption Class  
        try {
            @include_once PWD."/control-panel/bin/encryption.source.pack.php"; 
            $enc = "stateless_encryption";
            $e = $enc(file_get_contents($file_path),"decryption"); 
            return $e;  
        } catch (\Throwable $th) {
            die($th); 
            return $default_route; 
        }
    }else{
        return $default_route; 
    }
}

function get_site_icon(){
    $dir = (dirname(__FILE__)).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."bin".DIRECTORY_SEPARATOR."dependencies".DIRECTORY_SEPARATOR;
    $file = $dir."icon.pxy";
    $output = "lost"; 
    if (file_exists($file)){
        $data = base64_decode(file_get_contents($file)); 
        $output = $data; 
    }
    $path = __PROTOCOL__.__DOMAIN_NAME__."/@media/".$output."/"; 
    return $path; 
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function site_path($section = 1)
{
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

    $x = $_SERVER['REQUEST_URI'];
    $_xm = explode("/", $x);
    return $_xm[$section];
}

function display_300()
{
    return "";
}

function  display_404()
{
    return "";
}

function display_505()
{
    return "";
}

function use_($info)
{
    try {
        include_once PWD . "/blocks/" . $info . ".php";
    } catch (\Throwable $th) {
        echo "Failed To Use Rescource";
        return exit(1);
    }
}
 

function construct_header($genetic, $seo, $twiter_seo)
{
    $file = PWD . "/blocks/header.php";
    $genetic_search = [
        "[@@@PAGE_TITLE@@@]" => [
            "site_genetic_title"
        ],
    ];
    $page_contents = file_get_contents($file);
    //exit(); 
    $construct = str_ireplace(array_keys($genetic_search), $genetic, $page_contents) ?? CRASH_APP;
    $construct = str_ireplace(['[__PAGE_ICON__]'],[get_site_icon()],$construct); 
    echo $construct;
    return false; 
}
