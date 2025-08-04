<?php
@include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "scripts.php";
#Include The Main Script File 

$website_name = $_POST['website-name'] ?? __error("Missing Website Name");
$website_domain = $_POST['website-domain'] ?? __error("Missing Website Domain");
$website_template = $_POST['website-template'] ?? "blank";

#From Engine Module 
$e = new scripts_packages();
if ($e->engine->engine_pulse()) {
    #echo "Functional Engine"; 

    #Reserve Slot For The Site
    if ($e->engine->reserve_slot($website_name, $website_domain)) {
        #Record to Database
        /* $db = $e->activate_database(
            "",
            "", 
            "",
            "online-store-datahouse"
        );
        $USER_CODE = USER_CODE; 

        /*

        if ($db){
            $sql = "INSERT INTO `sites`(`name`, `domain`, `template`,`code`) VALUES ('{$website_name}','{$website_domain}','{$website_template}','{$USER_CODE}')";
            $e->database->insert_data($sql);   
            __error("Site Slot Created Successfully");  
        } else {
            __error("Failed To Connect To Database");
        }

        */
        if ($e->engine->create_site($website_name, $website_domain)) {
            #__error("Site Created Successfully");
            if ($e->engine->request_subdomain($website_name, $website_domain)) {
                # __error("Subdomain Created Successfully");  
                if ($e->engine->domain_connection($website_domain)) {
                    #__error("Domain Connected Successfully");  
                    @$exec = ($e->engine->domain_activation($website_name, $client_domain));
                } else {
                    __error("Failed To Connect Domain");
                }
            } else {
                __error("Failed To Create Subdomain");
            }
        } else {
            __error("Failed To Create Site");
        }
    } else {
        __error("Failed To Create New Site Slot");
    }
}
__error("Website Engine Is Offline");
