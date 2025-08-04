<?php 
include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."package-manager.php";
define("__USER_CODE__",retrieve_code()); 
include_once "config.php"; 

function __error($description){
    echo $description; 
}

function base_encryption($string){
    $module = new scripts_packages(); 
    $e = simple_encryption_procedure("encrypt",$string,"ENCRYPTION_KEYS"); 
    return $e; 
}

function base_decryption($string){
    $module = new scripts_packages(); 
    $e = simple_encryption_procedure("decrypt",$string,"ENCRYPTION_KEYS"); 
    return $e; 
}

function simple_encryption($string){
    return base64_encode($string); 
}

function simple_decryption($string){
    return base64_decode($string); 
}

function retrieve_code(){
    $key = "LEVIDOC"; 
    return hash("sha256",$key); 
}

function create_support_ticket_id(){
    $module = new scripts_packages(); 
    $module->activate_database(); 
    $sql = "SELECT MAX(id) AS last_id FROM tblsupport;";
    $exec =  $module->database->query($sql);
    $ticket_num = ($exec[0]['last_id'] + 1); 
    return $ticket_num;  
}

function execute_sql_query($sql){
    #Filter SQL Statement 
    $module = new scripts_packages(); 
    $module->activate_database(); 
    $output = $module->database->query($sql); 
    if (is_array($output)){
        return true; 
    }
    return $output; 
}


function get_admin_url(){
    $pwd = dirname(dirname(dirname(__FILE__))); 
    $file_path = $pwd."/control-panel/bin/dependencies/gateways.pxy";
    $default_route = "vm-admin";
    if (file_exists($file_path)){
        #Encryption Class  
        try {
            @include_once $pwd."/control-panel/bin/encryption.source.pack.php"; 
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

?>