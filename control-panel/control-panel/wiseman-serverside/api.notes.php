<?php 
include_once "register.php";            #Managing Client Websites 
include_once "encryption.php";          #System Encryption Service Files 
include_once "database.services.php";   #Database Management Services
include_once "notes.services.php";      #Notes Adding Services; 
include_once "services.php";            #Include The Services Manager  

function add_theme($theme_data){
    $e = 'simple_decryption' ?? exit('Algorithm Corupt'); 
    try {
        $encryption_service = enc();
        #Database Fallback 
        $theme_file = __DIR__."/blog/datacenter/theme_forest.records.file.pxy";
        $theme_forest = []; 
        if (file_exists($theme_file)){
            $theme_forest = json_decode($encryption_service->$e(file_get_contents($theme_file)),JSON_PRETTY_PRINT); 
        }

        $theme_forest[$theme_data['id']] = $theme_data ?? exit('Theme Data Is Corrupt');  
        
        $z = "simple_encryption"; 
        $x = file_put_contents($theme_file,$encryption_service->$z(json_encode($theme_forest,JSON_PRETTY_PRINT)));
        if ($x){
            echo json_encode(['status'=>'success','response'=>'Website Theme Has Been Changed'],JSON_PRETTY_PRINT); 
            return true;          
        }else{
            exit('Could Not Save Data'); 
        }
    }catch (\Throwable $th){
        exit('Could Not Process Request'); 
    }
}

add_theme(['id'=>'laurencia_1xxnxxexo','title'=>'Laurencia','description'=>'Made and designed for elegance, made to speak for your passion. This theme was made for women journal magazines.','category'=>['women','blog','magazine'],'wallpaper'=>'http://localhost/TRASH/SIDE_GIG/BLACK_SHEEP_ASSETS/unnamed.jpg','author'=>'jeff']); 

echo json_encode(show_themes(),JSON_PRETTY_PRINT); 

?>