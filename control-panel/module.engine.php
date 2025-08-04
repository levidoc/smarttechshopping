<?php 
class WP_Engine
{
    public $source,$username,$auth_code; 

    public function __construct($link="https://vmlite.api.varsitymarket.work/")
    {
        $this->source = $link;  
        $this->username = "hastings";
        $this->auth_code = "password";     

        if ($this->engine_pulse() == false){
            #trigger_error("Failed To Connect To Engine"); 
            return false; 
        }
    }
    
    public function domain_activation($website_name,$website_domain){
        $input = [
            "action"=>"register-domain",
            "username"=>$this->username,
            "password"=>$this->auth_code,
            "website_name"=>$website_name,
            "website_domain" => $website_domain,
        ];

        $e = $this->curlPost($this->source,$input); 

        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Domain Active"){
                    return True; 
                }

                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }

        return false;
    } 

    public function reserve_slot($website_name,$website_domain){
        $input = [
            "action"=>"create-slot",
            "username"=>$this->username,
            "password"=>$this->auth_code,
            "website_name"=>$website_name,
            "website_domain" => $website_domain,
        ];

        $e = $this->curlPost($this->source,$input); 

        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Site Slot Created"){
                    return True; 
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    } 

    public function request_subdomain($website_name,$website_domain){
        $input = [
            "action"=>"request-subdomain",
            "username"=>$this->username,
            "password"=>$this->auth_code,
            "website_name"=>$website_name,
            "website_domain" => $website_domain,
        ];

        $e = $this->curlPost($this->source,$input); 

        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Domain Created"){
                    return True; 
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
    
    public function domain_connection($website_domain){
        $input = [
            "action"=>"domain-verification",
            "username"=>$this->username,
            "password"=>$this->auth_code,
            "website_domain" => $website_domain,
        ];

        $e = $this->curlPost($this->source,$input); 

        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Domain Conected"){
                    return True; 
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    } 

    public function create_site($website_name,$website_domain){
        $input = [
            "action"=>"create-site",
            "username"=>$this->username,
            "password"=>$this->auth_code,
            "website_name"=>$website_name,
            "website_domain" => $website_domain,
        ];

        $e = $this->curlPost($this->source,$input); 
       
        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Deploying Site"){
                    return True; 
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }

        return false;
    }   

    public function engine_pulse(){
        $input = [
            "action"=>"pulse",
            "username"=>$this->username,
            "password"=>$this->auth_code,
        ];

        $e = $this->curlPost($this->source,$input); 

        try {
            //code...
            $state = json_decode($e,JSON_PRETTY_PRINT); 
            if (isset($state['message'])){
                if ($state['message'] == "Engine Runing"){
                    return True; 
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    } 

    public function curlPost($url, array $postData, array $headers = [])
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            return false;
        }

        curl_close($ch);
        return $response;
    }
}

?>