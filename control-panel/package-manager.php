<?php

class scripts_packages{
    public $scrambler; 
    public $database; 
    public $encryption_service;
    public $server_requests;  
    public $blockchain; 
    public $engine; 

    public function activate_scrambler(){
        $scrambler_file = dirname(__FILE__)."/module.scrambler.php"; 
        if (file_exists($scrambler_file)){
            include_once $scrambler_file; 

            $this->scrambler = new site_scrambler(); 
        }
    }

    public function activate_engine(){
        $_file = dirname(__FILE__)."/module.engine.php"; 
        if (file_exists($_file)){
            include_once $_file; 

            $this->engine = new wp_engine(); 
        }
    }

    public function activate_database(){
        #$module_file = dirname(__FILE__)."/module.database.php"; 

        $module_file = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php"; 
        if (file_exists($module_file)){
            include_once $module_file;  
        }
        #@$this->database = new database_portal('localhost','root','','online-store-datahouse');     
        $this->database = new database_manager(); 
    }

    public function activate_encryption(){
        $module_file = dirname(__FILE__)."/module.encryption.php"; 
        if (file_exists($module_file)){
            include_once $module_file;  
        }
        $this->encryption_service = new encryption_services(); 
    }

    public function activate_blockchain(){
        $module_file = dirname(__FILE__)."/module.blockchain.php"; 
        if (file_exists($module_file)){
            include_once $module_file;  
        }
        $this->blockchain = new SystemBlockChain( new BlockCells("Genesis Block"));
    }

    public function activate_api(){
        $module_file = dirname(__FILE__)."/module.apiflow.php"; 
        if (file_exists($module_file)){
            include_once $module_file;  
        }
        $this->server_requests = new api_flow();
    }


    public function __construct()
    {
        $this->scrambler = FALSE;
        #$this->activate_database();
        $this->activate_encryption();
        $this->activate_api(); 
        $this->activate_blockchain();     
        #$this->activate_engine();   
    }
}

$x = new scripts_packages(); 
#$x->activate_scrambler(); 
#@$x->scrambler->connect_to_source_pack();  
#@$r = $x->scrambler->algorithms_list(); 
#@print_r($r); 
?>