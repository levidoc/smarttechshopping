<?php 
include_once "composer_function.php"; 

if (check_api_status() == TRUE){
    generate_encryption_algorithm(); 
    //First Method Is To Generate Encryption Algorithm 
    

    if (recent_updates() !== FALSE){
        update_data_packs(); 
        echo('UNPACKING DATA');
        //Update All The JSON Files So That Site Works With Fresh Data 
            
    }else{
        echo('NO UPDATES'); 
        //Update The JSON Files With Fresh Data
    }
}else{
    print('INVALID LICENCE KEYS'); 
}
 
?>