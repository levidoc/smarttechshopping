<?php
include_once "register.php";            #Managing Client Websites 
include_once "encryption.php";          #System Encryption Service Files 
include_once "database.services.php";   #Database Management Services
include_once "notes.services.php";      #Notes Adding Services; 

function hoursSince($setTime) {
    // Validate the input time format (HH:MM)
    if (!preg_match("/^(?:[01]\d|2[0-3]):(?:[0-5]\d)$/", $setTime)) {
        return "Invalid time format. Please use HH:MM format.";
    }

    // Get the current time
    $currentTime = date("H:i");

    // Convert both times to timestamps for comparison
    $setTimeStamp = strtotime($setTime);
    $currentTimeStamp = strtotime($currentTime);

    // Calculate the difference in seconds
    $differenceInSeconds = $currentTimeStamp - $setTimeStamp;

    // Convert seconds to hours
    $hoursPassed = $differenceInSeconds / 3600;

    // Return the result
    return floor($hoursPassed);
}

function encryption($e)
{
    $encryption = enc();
    return $encryption->encryption_threading($e);
}

function decryption($e)
{
    $encryption = enc();
    return $encryption->decryption_threading($e);
}

function notes_encryption($data)
{
    $encryption = enc();
    return $encryption->silk_encryption($data);
}

function notes_decryption($data)
{
    $encryption = enc();
    return $encryption->silk_decryption($data);
}

function password_encryption($e)
{
    $encryption = enc();
    return $encryption->encryption_threading($e);
}

function password_decryption($e)
{
    $encryption = enc();
    return $encryption->decryption_threading($e);
}

function url_encryption($e)
{
    $encryption = enc();
    return $encryption->encrypt_url($e);
}

function url_decryption($e)
{
    $encryption = enc();
    return $encryption->decrypt_url($e);
}


function enc(){
    $encryption = new encryption_services('TOKEN_CODE'); 
    return $encryption; 
}
/*
FINGERPRINT:
    ALGORITHM: __DEFINED_ALGORITHM__
    FINGERPRINT_LOCK: [ENCRYPTION_CODE]

    AUTHENTICATION:

    USERNAME: ADMIN
    PASSWORD: PASS
      DOMAIN: techbuild.penease.digital
  IP_ADDRESS: 80.80.80.80
      SERVER: services.free.wiseman.org

$fingerprint = [
    'algorithm' => 'silk_encryption',
    'fingerprint_lock' => '__ACCESS_CODE__',
    'authentication' => [
        'username' => 'admin',
        'password' => 'pass',
        'domain' => 'techbuild.penease.digital',
        'ip' => '0.0.0.0',
        'server' => '',
    ]
];

*/

define('encryption_signature', hash('sha256', '_authentication_'));

function create_print($fingerprint, $signature_algorithm = 'encryption_threading')
{
    $algorithm = $fingerprint['algorithm'] ?? 'silk_encryption';
    $print_lock = $fingerprint['fingerprint_lock'] ?? str_shuffle('ACCEESS_CODE');
    $authentication_signature = $fingerprint['authentication'];

    if (class_exists('encryption_services')) {
        if (method_exists('encryption_services', $algorithm)) {
            $fingerprint_signature = [
                'algorithm' => false,
                'fingerprint_lock' => false,
                'authentication' => false,
            ];
            #Configure The Default Fingerprint Signature 
            $e = new encryption_services($print_lock);
            $e_ = new encryption_services(encryption_signature);
            $authentication_signature = $e->$algorithm(json_encode($authentication_signature, JSON_PRETTY_PRINT));

            $fingerprint_signature['authentication'] = $authentication_signature;
            $fingerprint_signature['fingerprint_lock'] = $e_->$signature_algorithm($print_lock);
            $fingerprint_signature['algorithm'] = $algorithm;

            return $e_->$signature_algorithm(json_encode($fingerprint_signature, JSON_PRETTY_PRINT));
        }
    }
}

function understand_print($fingerprint_signature, $signature_algorithm = 'decryption_threading')
{
    if (class_exists('encryption_services')) {
        $e_ = new encryption_services(encryption_signature);
        $fingerprint = json_decode($e_->$signature_algorithm($fingerprint_signature), JSON_PRETTY_PRINT);

        if ($fingerprint['algorithm'] == "silk_encryption") {
            $algorithm = "silk_decryption";
        }

        if (method_exists('encryption_services', $algorithm)) {
            $fingerprint_lock = $e_->$signature_algorithm($fingerprint['fingerprint_lock']);
            $e = new encryption_services($fingerprint_lock);
            $authentication = $e->$algorithm($fingerprint['authentication']);

            $fingerprint_signature = [
                'algorithm' => false,
                'fingerprint_lock' => false,
                'authentication' => false,
            ];
            #Configure The Default Fingerprint Signature

            $fingerprint_signature['algorithm'] = $algorithm;
            $fingerprint_signature['fingerprint_lock'] = $fingerprint_lock;
            $fingerprint_signature['authentication'] = json_decode($authentication, JSON_PRETTY_PRINT);

            return $fingerprint_signature;
        }
    }
}

function format_to_fingerprint($fingerprint, $space = "<br>", $begin_header = "BEGIN_FINGERPRINT[SPACE]---------------------------[SPACE]", $end_header = "=============================[SPACE]END_FINGERPRINT")
{
    $output = "";
    $begin_header = str_replace('[SPACE]', $space, $begin_header);
    $end_header = str_replace('[SPACE]', $space, $end_header);

    $e = str_split($fingerprint, 128);
    foreach ($e as $v) {
        $output .= $v . $space;
    }
    return $begin_header . $output . $end_header;
}

function format_to_print($fingerprint, $space = "[SPACE]", $begin_header = "BEGIN_FINGERPRINT[SPACE]---------------------------[SPACE]", $end_header = "=============================[SPACE]END_FINGERPRINT")
{
    $fingerprint_format = str_replace($space, '', $fingerprint);
    $begin_header = str_replace('[SPACE]', '', $begin_header);
    $end_header = str_replace('[SPACE]', '', $end_header);

    $finger_print_data = trim($fingerprint_format); 
    
    // Define the start and end markers
    $startMarker = $begin_header;
    $endMarker = $end_header;
    $input = $finger_print_data;

    // Locate the start and end markers
    $startPos = strpos($input, $startMarker);
    $endPos = strpos($input, $endMarker);

    // Check if both markers are found
    if ($startPos === false || $endPos === false) {
        return null; // Return null if markers are not found
    }

    // Extract the fingerprint
    $startPos += strlen($startMarker); // Move past the start marker
    $fingerprint = substr($input, $startPos, $endPos - $startPos);

    // Trim any whitespace or new lines
    return trim($fingerprint);
}

function authenticate_register($token,$dec="url_decryption"){
    $register_file = __DIR__."/blog/register/token.lock";
    $register_data = []; 
    if (file_exists($register_file)){
        $register_data = json_decode($dec(file_get_contents($register_file)),JSON_PRETTY_PRINT); 
    }

    if (isset($register_data[$token])){
        if (hoursSince($register_data[$token]['timeline']) < 12){
            return True; 
        }       
    }
    return False; 
}

function enable_authenticate_register($token,$encryption="url_encryption",$decryption="url_decryption"){
    $register_file = __DIR__."/blog/register/token.lock";
    $register_data = []; 
    if (file_exists($register_file)){
        $register_data = json_decode($decryption(file_get_contents($register_file)),JSON_PRETTY_PRINT); 
    }
    $currentTime = date("H:i");
    $register_data[$token] = ['timeline'=>$currentTime]; 
    $x = file_put_contents($register_file,$encryption(json_encode($register_data,JSON_PRETTY_PRINT))); 
    if ($x == true){
        return TRUE; 
    }else{
        return FALSE; 
    }   
}

function create_navigator($signature="RE9zSFJiM1VBREp3WHZtUlJRaGQwZklRamVIcDdmYXliajd6cFpaWlNsMkdpT2FjY3hPbFVkZWFlMHdCWEZZU0o1YnF2cGIrREtzOHR3UEhrbklUeGJadUhYaWJJQzZuYkx4SlNPbkNnRTA9",$encode="simple_encryption"){
    $e = enc(); 
    $pepering_encode = "encrypt_url"; 
    $navigation_print = $e->$encode($e->$pepering_encode($signature)); 
    return $navigation_print; 
    #Create The Navigation Encoded Code 

}


function print_to_navigator_print($navigation_print, $space = "<br>", $begin_header = "BEGIN_GUIDE[SPACE]---------------------------[SPACE]", $end_header = "=============================[SPACE]END_GUIDE"){
    $output = "";
    $begin_header = str_replace('[SPACE]', $space, $begin_header);
    $end_header = str_replace('[SPACE]', $space, $end_header);

    $e = str_split($navigation_print, 64);
    foreach ($e as $v) {
        $output .= $v . $space;
    }
    return $begin_header . $output . $end_header;
}

function show_themes(){
    $e = 'simple_decryption' ?? exit('Algorithm Corupt'); 
    try {
        $encryption_service = enc();
        #Database Fallback 
        $theme_file = __DIR__."/blog/datacenter/theme_forest.records.file.pxy";
        $theme_forest = []; 
        if (file_exists($theme_file)){
            $theme_forest = json_decode($encryption_service->$e(file_get_contents($theme_file)),JSON_PRETTY_PRINT); 
        }
        return $theme_forest; 
    }catch (\Throwable $th){
        exit('Could Not Process Request'); 
    }

}

function system_profile($navigator_id){
    return ['username'=>'Hastings','image'=>'https://avatars.githubusercontent.com/u/157944600?s=400&u=c17aa56d5e9e1e9aa77bdc1514e4856043ffad96&v=4']; 
}


function system_themes($navigator_id){
    return ['active'=>['img'=>'http://localhost/TRASH/SIDE_GIG/BLACK_SHEEP_ASSETS/unnamed.jpg','title'=>'Burning House','theme_code'=>'#set_code'],'system'=>show_themes()]; 
}


    