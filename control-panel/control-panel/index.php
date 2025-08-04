<?php 
@include "systemctrl.php"; 
@include "interface.php";  
/*

#Check For Get Authentication 
$sys_token = parse_url($_SERVER['REQUEST_URI'])['path'];
$sys_token = explode("/",$sys_token);

//First Dir Is The Token Dir 
#$token = $sys_token[0] ?? null;
$token = $sys_token[1] ?? null;
$token = htmlspecialchars($token, ENT_QUOTES, 'UTF-8');
$token = str_replace("..","",$token);
$token = str_replace("/","",$token);

if ($token == "levidoc"){
    $page_request = "dashboard";
    print($page_request); 
}
/*
@include_once dirname(__FILE__)."/serverside/background-services.php";

$package_script = dirname(dirname(__FILE__))."/package-manager.php"; 
if (file_exists($package_script) == false){
    #Report To Error Pages 
    @include_once dirname(__FILE__)."/error-pages/500.blade"; 
    exit(); 
}
 
@include_once $package_script; 

#Check For Get Authentication 
$sys_token = parse_url($_SERVER['REQUEST_URI'])['path'];
$sys_token = explode("/",$sys_token);

//First Dir Is The Token Dir 
#$token = $sys_token[0] ?? null;
$token = $sys_token[1] ?? null;
$token = htmlspecialchars($token, ENT_QUOTES, 'UTF-8');
$token = str_replace("..","",$token);
$token = str_replace("/","",$token);

#Check Media Type
$endpoint_request = $sys_token[2] ?? null;

//$endpoint_request = $sys_token[4] ?? null;

if (empty($endpoint_request) == false){
    #Try Finding The File 
    $dir = dirname(__FILE__); 
    if (file_exists($dir."/".$endpoint_request) == false){
        #Report To Error Pages 
        @include_once dirname(__FILE__)."/error-pages/404.blade"; 
        exit(); 
    }
    $file =  $dir."/".$endpoint_request; 
    $FileType = mime_content_type($file);
    $file_path = realpath($file);

    // Set the appropriate headers
    header('Content-Type: ' . $FileType);
    header('Content-Length: ' . filesize($file));
    
    // Output the image
    readfile($file_path);
    exit();
}

if ($token == false){
    @include_once dirname(__FILE__)."/error-pages/404.blade"; 
    exit(); 
}

#Create Temporary API Flow 
$background_services = new scripts_packages();
$token_inspection = $background_services->server_requests->authenticate_control_panel_token($token); 
if (($token_inspection == null) || ($token_inspection == false)) {
    @include_once dirname(__FILE__)."/lock.head.php"; 
    exit(); 
}

if ($token_inspection = hash("sha256","PROCEED")){
    #Store Token On Cookie 
        
        $cookie_name = hash("sha256","SYSTEM-LOG");
        $cookie_value = base64_encode($token);
        $expire_time = time() + (86400 * 1);
        setcookie($cookie_name, $cookie_value, $expire_time, "/"); // "/" means the cookie is available site-wide
        if (isset($_COOKIE[$cookie_name])) {
            #Verify Cookie
            @include_once dirname(__FILE__)."/interface.php";
        } else {
            // Get the current URL
            $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header("Location: $current_url");
            exit();

            #echo "Cookie '" . $cookie_name . "' is not set!";
        }

    //
}


*/

?>