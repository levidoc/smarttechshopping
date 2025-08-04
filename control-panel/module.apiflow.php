<?php 
define("API_ENCRYPTION_TOKEN", hash("sha256","LEVIDOC"));
class api_flow{ 
    private array $event_responder_function; 
    public function session_log($message){
        $function = $this->event_responder_function['client_error'];
        $function($message); 
        
    }

    private function retrieve_endpoint(){
        $endpoints = [
            "create/website/"=>[
                "method"=>"PUT",
                "data"=>null,
            ], #Create A New Website

            #Register Users To System
            "systemctl/create/register/"=>[
                "method"=>"POST",
                "data"=>[
                    "guardian",
                    "gittoken",
                ]
            ],
            #Renew The Register Tokens 
            "systemctl/register/token/renew/"=>[
                "method"=>"POST",
                "data"=>[
                    "guardian"
                ]
            ]
        ]; 
        return $endpoints; 
    } 

    public function draft_endpoint(): array 
    {
        return $this->retrieve_endpoint() ?? null; 
    }

    private function authenticate_endpoint($endpoint){
        $available_endpoint = $this->retrieve_endpoint();

        foreach ($available_endpoint as $x => $link) {
            if ($endpoint == $x){
                return true; 
            }
        }
        return null; 
    }

    function config_response($error_function){
        $this->event_responder_function['success'] = $error_function['success'];
        $this->event_responder_function['error'] = $error_function['error'];
        $this->event_responder_function['client_error'] = $error_function['client_error'];
        $this->event_responder_function['lost'] = $error_function['lost'];
        $this->event_responder_function['confirm'] = $error_function['confirm'];          
        return True;
    }

    
    public function create_register($business_index,$git_tokens){

        #Creating System Register 
        if (class_exists('database_portal') !== false){
            @$databas_module = new database_portal(null,null,null,null); 
            $databas_module->configure_system(); 
        }

        #Creating System Index
            $client_index = "4a76602f387b8a04166e9380ed49b347ec6696a5ecbfe06002feb"; 
            $client_index = str_shuffle($client_index); 
            $client_flag = Null; 
            $business_flag = Null; 
            $result = $databas_module->select_table("SELECT * FROM `session_library` WHERE 1"); 
        
            foreach ($result as $key => $value) {
                if ($key == "control_index"){
                    if ($client_index == $value){
                        $client_flag = TRUE; 
                        $client_index = str_shuffle($client_index);     
                    }
                }

                if ($key == "business_index"){
                    if ($business_index == $value){
                        $business_flag = FALSE; 
                    }
                }
            }


        #Encrypting The Git Tokens 
            if (class_exists("encryption_services")){
                @$encryption_module = new encryption_services(); 
                $functions = $encryption_module->retrieve_encryption_algorithms(); 
                $function = $functions[1]; 
                $enc_git_tokens = $function('encrypt',$git_tokens,$client_index);
            }
        
        #Securing The Business Container 
            if (class_exists("encryption_services")){
                $encryption_module = new encryption_services(); 
                $functions = $encryption_module->retrieve_encryption_algorithms(); 
                $function = $functions[0]; 
                $enc_business_index = $function("encrypt",$business_index,$client_index); 
                $dir = dirname(__FILE__).'/cargo/'.hash("sha256",$client_index).""; 
                $function = $functions[1]; 
                $enc_dir = $function("encrypt",$dir,$client_index); 
            }
        
            $token_holder = hash("sha256",$business_index); 

        #Storing The Info On The Database 
            $sql = "INSERT INTO `session_library`
            (`business_index`, `container`, `gittokens`, `control_index`,`api_token_holder`) VALUES 
            ('{$enc_business_index}','{$enc_dir}','{$enc_git_tokens}','{$client_index}','{$token_holder}')"; 
            $exec = $databas_module->insert_data($sql); 

            return $exec;  
        //`business_index`, `container`, `gittokens`, `control_index`

    }

    public function renew_register_token($business_index) 
    {   
        if (class_exists("encryption_services") == false){
            $this->session_log("Library Class Missing"); 
        }

        if (class_exists('database_portal') == false){
            $this->session_log("Library Class Missing"); 
        }

        if (class_exists("SystemBlockChain") == false){
            $this->session_log("Library Class Missing"); 
        }
        
        @$databas_module = new database_portal(null,null,null,null); 
        $databas_module->configure_system(); 

        @$encryption_module = new encryption_services(); 
        $functions = $encryption_module->retrieve_encryption_algorithms(); 
        $index = hash("sha256",$business_index); 

        
        $sql = 'SELECT * FROM `session_library` WHERE (`api_token_holder` = "'.$index.'") LIMIT 1'; 
        $result = $databas_module->select_table($sql); 

        if ($result !== null){
            
            $control_index = hash("sha256",$result['control_index']);

            #Create The Tokens On The System
            $sql = "SELECT * FROM `authenticated_sessions` WHERE (`session_id` = '{$control_index}')";
            if (is_array($databas_module->select_table($sql))){
                $sql = "DELETE FROM `authenticated_sessions` WHERE (`session_id` = '{$control_index}') LIMIT 1;"; 
                $databas_module->delete_data($sql); 
                #There Exist Data On The Table
            }

            $session_code = str_shuffle("PASSWORD43cdeab3b528dfe61225c05b2b61a9881e6c721da0625cf53c27bc29ec0e0ea7");  
            $user_authentication = $session_code;

            $background_services = new SystemBlockChain( new BlockCells($user_authentication));
            #Signal Hashing Start 
        
            $x = rand(16,32);
            for ($i=0; $i < $x; $i++) { 
                $background_services->addBlock( new BlockCells($user_authentication.$background_services->chain[count($background_services->chain) - 1]->hash)); 
            }
        
            $background_services->addBlock( new BlockCells($user_authentication)); 
            #Signal Hashing End
        
            $closing_hash = $background_services->getLatestBlock();
            $closing_hash = $closing_hash->hash;  
            #Close The Hash 
            
            $function = $functions[1]; 
            
            $hash_pepering = $function("encrypt",$closing_hash,API_ENCRYPTION_TOKEN); 
            $session_code = $closing_hash.$hash_pepering; 
            #Authentication Token 
            $authentication_token = 
            [
                "data"=>$user_authentication,"final_hash"=>$closing_hash,"intensity"=>$x,
            ]; 
            $authentication_token = $function("encrypt",json_encode($authentication_token),API_ENCRYPTION_TOKEN); 
        

            $session_link = "http://localhost/online-store.varsitymarket.package/control-panel/?token=".$session_code; 
            $sess_code = hash("sha256",$session_code); 
            #$session_link = $function('encrypt',$session_link,API_ENCRYPTION_TOKEN); 
            $sql = "INSERT INTO `authenticated_sessions`
            (`session_id`, `session_code`, `session_auth`) VALUES 
            ('{$control_index}','{$sess_code}','{$authentication_token}'); "; 
            
            if ($databas_module->insert_data($sql)){
                $output = [
                    "auth" => $session_link,
                    "permission" => "admin",
                    "code" => $session_code
                ]; 

                return $output; 
            } 
        }
    }

    function inspect_condition($endpoint,$method="GET"){
        $endpoint_ctrl = $this->authenticate_endpoint($endpoint); 
        if ($endpoint_ctrl !== true){
            $this->session_log("Endpoint Are Invalid"); 
        }


    }

    function authenticate_control_panel_token($token){
        if (class_exists("encryption_services") == false){
            $this->session_log("Library Class Missing"); 
        }

        if (class_exists('database_portal') == false){
            $this->session_log("Library Class Missing"); 
        }
        
        @$databas_module = new database_portal(null,null,null,null); 
        $databas_module->configure_system(); 

        @$encryption_module = new encryption_services(); 
        $functions = $encryption_module->retrieve_encryption_algorithms(); 
        #$index = hash("sha256",$business_index); 

        $session_code = hash("sha256",$token); 
        $sql = 'SELECT * FROM `authenticated_sessions` WHERE (`session_code` = "'.$session_code.'") LIMIT 1'; 
        $result = $databas_module->select_table($sql); 
        if ($result !== null){
            //SELECT `session_id`, `session_code`, `event_target`, `session_auth`, `duration` FROM `authenticated_sessions` WHERE 1
            return hash("sha256","PROCEED");
        }

        return Null; 
    }
}

?>