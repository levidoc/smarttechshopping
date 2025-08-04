<?php 
include_once "services.php";

function error_api($error){
    echo json_encode(['error'=>$error],JSON_PRETTY_PRINT); 
    exit(); 
}

$mode = $_POST['mode'] ?? error_api('Misssing Mode'); 
if ($mode == "verify_footprint"){
    $finger_print = $_POST['footprint'] ?? error_api('Missing Param'); 

}else if ($mode == "authenticate"){

    $email = $_POST['authenticate_email']; 
    $password = $_POST['authenticate_password']; 
    $server_auth = $_POST['authenticate_code']; 
    $server = $_POST['authenticate_server']; 
    $username = $_POST['authenticate_username']; 

    $server_register = new blog_register(); 
    #Bloging Authenticate Register

    $server_register->register_decoding('notes_decryption'); 
    $server_register->register_encoding('notes_encryption'); 
    #Set The Register's Encryption Algorithm

    $lock = $server_register->verify_lock($server_auth); 
    #Check If Server Is Locked

    if (($lock == null) || ($lock == true)){
        if ($lock == null){$lock = false; }
        $auth = $server_register->create_client($username,$password,$lock,'url_encryption','password_encryption');  
        if ($auth == null){
            echo json_encode(['status'=>'error','error'=>'Account Already Exists'],JSON_PRETTY_PRINT); 
            exit(); 
        }

        $fingerprint = [
            'algorithm' => 'silk_encryption',
            'fingerprint_lock' => hash('sha256',str_shuffle($password)),
            'authentication' => [
                'username' => $username,
                'password' => $password,
                'domain' => 'techbuild.penease.digital',
                'ip' => '0.0.0.0',
                'server' => $server,
            ]
        ];

        $p = format_to_fingerprint(create_print($fingerprint),"\n"); 
        if (file_put_contents(__DIR__.'/blog/register/license/'.hash('sha256',$auth).'.download.pxy',$p)){
            echo json_encode(['status'=>'success','auth'=>'http://localhost/SKYNET/wiseman-admin/wiseman-serverside/downloads.php?license='.hash('sha256',$auth)],JSON_PRETTY_PRINT);  
            exit(); 
        } 
        #Account Created Now echo The Link 

        exit;

        #Confirm The Password or confirm no password 
    }else{
        echo json_encode(['status'=>'error','error'=>'Server Did Not Authenticate'],JSON_PRETTY_PRINT);
        exit(); 
    }
    
}else if ($mode == "connect"){
    #Trying To Connect To The Server 
    $fingerprint = $_POST['authenticate_fingerprint'] ?? error_api('Fingerprint Missing'); 
    $username = $_POST['authenticate_username'] ?? error_api('Missing User Parameter');
    $password = $_POST['authenticate_password'] ?? error_api('Missing User Parameter'); 
    $domain = $_POST['authenticate_domain'] ?? error_api('Missing Parameter'); 
    #If the fingerprint is compresssed try to decompress it    
    $finger_print_data = (understand_print(format_to_print($fingerprint,"\n"))) ?? error_api('Fingerprint Seems Corrupt');  

    if (isset($finger_print_data['authentication'])){
        //Array ( [algorithm] => silk_decryption [fingerprint_lock] => d146346d855c8381bcaf380441c2dd9d119a0bff589ecf2c037b07d7b0b2f773 [authentication] => Array ( [username] => Hastings2 [password] => ha$t1ngS75 [domain] => techbuild.penease.digital [ip] => 0.0.0.0 [server] => ) ) MAHAHA
        
        if ($username == $finger_print_data['authentication']['username']){
            if ($password == $finger_print_data['authentication']['password']){
                $e = 'simple_encryption' ?? $finger_print_data['algorithm']; 
                try {
                    $encryption_service = enc();
                    $token = $encryption_service->$e($finger_print_data['fingerprint_lock']); 
                    if (enable_authenticate_register($token)){
                        echo json_encode(['status'=>'success','auth'=>$token],JSON_PRETTY_PRINT);  
                        exit(); 
                    }
                } catch (\Throwable $th) {
                    error_api('Failed To Create Token'); 
                }
            }
        }
    }

    error_api('Failed To Authenticate Fingerprint'); 
}else if ($mode == "pulse"){
    $signature = $_POST['signature'] ?? error_api('Missing Parameters'); 

    if ($signature == null){
        exit();     
    }

    if (authenticate_register($signature)){
        echo json_encode(['status'=>'success','response'=>'Valid Device Signature'],JSON_PRETTY_PRINT); 
        exit();  
    }

    error_api('Cannot Confirm Signature'); 
}else if ($mode == "set-profile"){

    $signature = $_POST['signature'] ?? error_api('Missing Parameters'); 
    $navigator = $_POST['navigator'] ?? 'navigator'; // error_api('Missing Parameters');
    $profile_image = $_POST['image'] ?? error_api('Missing Parameters');
    $profile_username = $_POST['username'] ?? error_api('Missing Parameters'); 

    if (!authenticate_register($signature)){
        error_api('Forbiden Access');   
    }
    
    $e = 'simple_decryption' ?? error_api('Algorithm Corupt'); 
    try {
        $encryption_service = enc();
        $token = $encryption_service->$e($signature); 

        #Use The Navigator as the Guider 
        

        #Database Fallback 
        $profile_file = __DIR__."/blog/datacenter/profile.records.file.pxy";
        $profile_data = []; 
        if (file_exists($profile_file)){
            $profile_data = json_decode($encryption_service->$e(file_get_contents($profile_file)),JSON_PRETTY_PRINT); 
        }
        $profile_data[$navigator]['username'] = $profile_username;
        $profile_data[$navigator]['image'] = $profile_image;
        #Configure The Profile Data 
        $z = "simple_encryption"; 
        #Try to save the current data 
        $x = file_put_contents($profile_file,$encryption_service->$z(json_encode($profile_data,JSON_PRETTY_PRINT)));  
        if ($x){
            echo json_encode(['status'=>'success','response'=>'Valid Device Signature'],JSON_PRETTY_PRINT); 
            exit();  
        }else{
            error_api('Could Not Save Profile '); 
        }
    } catch (\Throwable $th){
        error_api('Failed To Authenticate Navigation'); 
    }

}else if ($mode == "set-theme"){
    $signature = $_POST['signature'] ?? error_api('Missing Parameters'); 
    $theme = $_POST['theme'] ?? error_api('Missing Parameters'); 

    if (!authenticate_register($signature)){
        error_api('Forbiden Access');   
    }
    
    $e = 'simple_decryption' ?? error_api('Algorithm Corupt'); 
    try {
        $encryption_service = enc();
        $token = $encryption_service->$e($signature);

        #Database Fallback 
        $theme_forest = [];
        $theme_forest = show_themes(); 
        if (!isset($theme_forest[$theme])){
            error_api('Selected Theme Seems Corrupt'); 
        }
 
        $site_file = __DIR__."/blog/datacenter/site_forest.records.file.pxy";
        $website_forest = []; 
        if (file_exists($site_file)){
            $website_forest = json_decode($encryption_service->$e(file_get_contents($site_file)),JSON_PRETTY_PRINT); 
        }

        $z = "simple_encryption"; 
        $website_forest[$token]['theme'] = $theme; 
        $x = file_put_contents($site_file,$encryption_service->$z(json_encode($website_forest,JSON_PRETTY_PRINT)));
        if ($x){
            echo json_encode(['status'=>'success','response'=>'Website Theme Has Been Changed'],JSON_PRETTY_PRINT); 
            exit();         
        }else{
            error_api('Could Not Save Data'); 
        }
    }catch (\Throwable $th){
        error_api('Could Not Process Request'); 
    }
}else if ($mode == "set-menu"){
    $signature = $_POST['signature'] ?? error_api('Missing Parameters'); 
    $menu_id = $_POST['menu_id'] ?? error_api('Missing Parameters'); 

    if (!authenticate_register($signature)){
        error_api('Forbiden Access');   
    }

    $menu_file = __DIR__."/blog/datacenter/menu_forest.records.file.pxy";
    $menu_forest = []; 
    if (file_exists($menu_file)){
        
    }

    
    $e = 'simple_decryption' ?? error_api('Algorithm Corupt'); 
    try {
        $encryption_service = enc();
        $token = $encryption_service->$e($signature);
    }catch(\Throwable $th){

    }
}

?> 