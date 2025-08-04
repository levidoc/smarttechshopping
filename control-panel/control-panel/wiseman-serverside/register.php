<?php 

# Title: Blog Register
# Author: Hardy Hastings 
# Description: The Class That Uses The Register To Create the admin blog panel
# Use: This will be used to monitor the control panel accounts. Allowing them access to the blog system

class blog_register{
    private $register_data; 
    private $register_dir; 
    private $register_file; 
    private $bypass_encoding; 
    private $bypass_decoding; 

    public function __construct() {
        $this->create_register_enviroment(); 
        $this->register_dir = __DIR__."/blog/register/"; 
        $this->register_file = $this->register_dir.'register.pxy'; 
        $this->bypass_encoding = 'unregistered_encoding'; 
        $this->bypass_decoding = 'unregistered_encoding';
    }

    public function register_encoding($encoding_algorithm){
        $this->bypass_encoding = $encoding_algorithm; 
    }

    public function register_decoding($decoding_algorithm){
        $this->bypass_decoding = $decoding_algorithm; 
    }

    public function unregistered_encoding(){
        exit('Unregistered Encoding'); 
    }

    public function lock_register($code){
        $e = $this->bypass_encoding;

        if (method_exists($this,$e)){
            return $this->$e($code); 
        }else{
            return $e($code); 
        }  
    }

    public function enable_lock($code){
        $e = $this->bypass_encoding; 
        #Encryption Class 

        $lock_file = $this->register_dir.'authentication.lock'; 
        if (method_exists($this,$e)){
            return $this->$e($code); 
        }else{
            $output = $e($code); 
            return file_put_contents($lock_file,$output);
        }
    }

    public function verify_lock($pin){
        $e = $this->bypass_decoding;
        $e_ = $this->bypass_encoding; 
        #Encryption Class

        $lock_file = $this->register_dir.'authentication.lock'; 
        if ((method_exists($this,$e)) || (method_exists($this,$e_))){
            return $this->$e(''); 
        }

        if (file_exists($lock_file)){
            $contents = file_get_contents($lock_file); 

            $saved_pin = $e($contents); 
            
            if ($saved_pin == $pin){
                return True; 
            }

            return False; 
        }

        return null; 
    }

    private function create_register_enviroment(){
        $public_dir = [
            __DIR__.'/blog',
            __DIR__.'/blog/register/'
        ]; 

        foreach ($public_dir as $dir) {
            if (is_dir($dir)){
                if (file_exists($dir) == false){    
                    mkdir($dir);
                }
            } 
        }
    }

    public function authenticate_client($username,$password,$client_hash_algorithm='default',$password_encryption_algorithm='default'){
        if ($password_encryption_algorithm == 'default'){
            #Use the Default Encryption Algorithm 
        }

        if ($client_hash_algorithm == 'default'){
            #Use the Default Hashing Algorithm 
        }


    }

    public function create_client($username,$password,$lock=false,$client_hash_algorithm='default',$password_encryption_algorithm='default'){
        if ($lock !== false){
            if ($this->verify_lock($lock)){
                return false; 
            }
        }
        #Check If the Lock Is Enabled 

        #Create The Bloging Client 
        $file = $this->register_file; 

        if ($client_hash_algorithm == "default"){
            $enc_username = hash('sha256',$username); 
        }else{
            $enc = $this->bypass_encoding; 
            $enc_username = $enc($username); 
        }

        if ($password_encryption_algorithm == "default"){
            $enc = $this->bypass_encoding; 
            $enc_password = $enc($password); 
        }else{
            $enc = $password_encryption_algorithm; 
            $enc_password = $enc($password); 
        }
        #Encryption Process 


        $encode = $this->bypass_encoding; 
        $decode = $this->bypass_decoding; 
        #Use The Defines Encryption Procedures 

        $register_data = []; 
        if (file_exists($file)){
            $register_data = json_decode($decode(file_get_contents($file)),JSON_PRETTY_PRINT); 
        }
        #Creating The Blog Client Register 

        #Check If User Already Exists 
        if(isset($register_data[hash('sha256',$username)])){
            return null; 
        }

        $register_data[hash('sha256',$username)] = json_encode(['s'=>$enc_password,'auth'=>$enc_username],JSON_PRETTY_PRINT); 
        if (file_put_contents($file,$encode(json_encode($register_data,JSON_PRETTY_PRINT)))){
            return $encode(hash('sha256',$username)); 
        }

        return false; 

    }
}

?>