<?php
header("Content-Type: application/json; charset=UTF-8");

$module_file = dirname(dirname(__FILE__))."/package-manager.php"; #Package Manager 
$function_file = dirname(__FILE__)."/functions.php";    #Functions File 

@include_once $function_file; 
@include_once $module_file; 

@$authorisation = $_GET['auth'] ?? $_POST['auth']; 

if ($authorisation !== "hastings"){
    exit(api_feedback_response("Invalid Authentication",400)); 
}

#Run Program Based On Endpoints And Data Source 

$request_endpoint = $_GET['request'] ?? "create/session/";

$session_data = $_GET['data'] ?? $_POST['data'] ?? null; 
#Creating The Vendor Panel Accounts

$script_packages = new scripts_packages();
$script_packages->server_requests->config_response([
    "success"=>"api_success_letter",
    "error"=>"api_error",
    "client_error"=>"api_client_error",
    "lost"=>"api_lost_error",
    "confirm"=>"api_success_letter"]); 
$script_packages->server_requests->inspect_condition($request_endpoint);

#Checking For The Data Information
try {
    $data_input = json_decode($session_data,true); 
} catch (\Throwable $th) {
    $scripts_packages->server_requests->session_log("The Data Inputs Are Incorrect"); 
    //throw $th;
}

#First Check The Endpoints are correct 
$system_endpoints = $script_packages->server_requests->draft_endpoint(); 
foreach ($system_endpoints as $endpoint_link_key => $endpoint_link_value) {
    if ($request_endpoint == $endpoint_link_key){                                  
        $total_endpoint_count = count($system_endpoints[$request_endpoint]['data']);
        $method = $system_endpoints[$request_endpoint]['method']; 
        $system_data = $system_endpoints[$request_endpoint]['data'];  

        $x = 0; 
        $data_count = 0; 
        if ($data_input !== null){
            $x = count($data_input) ?? 0;
        }

        if ($x !== $total_endpoint_count){
            $script_packages->server_requests->session_log("Data Inputs is Invalid");
        }

        try {
            
            #Check If Response Is A POST 
            if ($method == "POST"){
                #The Method Is POST 
                if (isset($_POST['data'])){
                    $import = json_decode($_POST['data'],true); 
                    foreach ($import as $se => $sv) { 
                        if (in_array($se,$system_endpoints[$request_endpoint]['data'])){
                            $data_count += 1; 
                        }
                    } 
                    if ($total_endpoint_count !== $data_count){
                        $script_packages->server_requests->session_log("Your Data Source Is Invalid"); 
                    }
                }else{
                    $script_packages->server_requests->session_log('Invalid Request'); 
                }
            }

            #Check If Response Is A GET 
            if ($method == "GET"){
                #The Method Is POST 
                if (isset($_GET['data'])){
                    $import = json_decode($_GET['data'],true); 
                    foreach ($import as $se => $sv) { 
                        if (in_array($se,$system_endpoints[$request_endpoint]['data'])){
                            $data_count += 1; 
                        }
                    } 
                    if ($total_endpoint_count !== $data_count){
                        $script_packages->server_requests->session_log("Your Data Source Is Invalid"); 
                    }
                }else{
                    $script_packages->server_requests->session_log('Invalid Request'); 
                }
            }


        } catch (\Throwable $th) {
            #Record The Error In The Config File 
            $system_endpoints = $script_packages->server_requests->session_log("System Could Not Process Request"); 
            //throw $th;
        }

        #Creating The New Register 
        if ($request_endpoint == "systemctl/create/register/"){
            $github_tokens = $import['gittoken'] ?? $script_packages->server_requests->session_log("Missing Data Contents"); 
            $store_owner = $import['guardian'] ?? $script_packages->server_requests->session_log("Missing Data Contents"); 

            $exec = $script_packages->server_requests->create_register($store_owner,$github_tokens); 
            if ($exec == true){
                #$message = json_encode(["message"=>"Registration Complete"],JSON_PRETTY_PRINT);
                $message = ["message"=>"Registration Complete"];  
                api_success_letter($message); 
            }else{
                $script_packages->server_requests->session_log("Could Not Register"); 
            } 
        }
 
        #Connecting To The Register 
        if ($request_endpoint == "systemctl/register/token/renew/"){
            $store_owner = $import['guardian'] ?? $script_packages->server_requests->session_log("Missing Data Contents");
            $exec = $script_packages->server_requests->renew_register_token($store_owner); 
            if (is_array($exec)){
                api_success_letter($exec); 
            }
        }

        #

    }
}   
exit(); 
?>