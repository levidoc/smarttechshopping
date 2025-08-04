<?php 

#This function is used to scramble the encryption algorithm used to secure external sites. 

class site_scrambler{
    private $private_dir;
     
    public function algorithms_list(){
        #Function will return all the available algorithms in the system 
        $algorithm_list = [
            "FIRST"=>[
                "encoding"=>"linear_encoding",
            ],
            "SECOND"=>"INV-LINEAR",
        ]; 

        return $algorithm_list;
    }
    public function reset_codes(){
        #Reseting The Target Website Codes
        
        #Retrieve The Algorithm List
        $algorithm_list = $this->algorithms_list();
        
        #First Create The Leading Dir 
        $leading_dir = "/residual";
        @mkdir($this->private_dir.$leading_dir); 

        foreach ($algorithm_list as $ak => $al){

            #Create The Remaining/Leading Directories 
            $dir = $this->private_dir.$leading_dir.'/'.hash("sha256",$ak);
            #$dir = $this->private_dir.$leading_dir.'/'.$ak;  
            @mkdir($dir); 

            for ($i=0; $i < 8; $i++) {
                #$subset_dir = $dir."/".$i;
                $subset_dir = $dir."/".hash("sha256",$i); 
                @mkdir($subset_dir); 

                #Create The Fingerprint Signature
                for ($j=0; $j < 8; $j++) { 
                    file_put_contents($subset_dir."/".hash("md5",$j).".pxy",hash("sha256",str_shuffle("SERVING ALL DAY"))); 
                }
            }
        }

        #Starting With The Anchor


    }

    public function connect_to_source_pack(){
        $file = dirname(__FILE__)."/bin/scrambler.source.pack.php"; 
        if (file_exists($file)){
            include_once $file; 
            return true; 
        }

        trigger_error('Failed To Connect To Source Pack'); 
    }

    public function __construct($dir="DEFAULT")
    {
        $output = FALSE; 
        if ($dir=="DEFAULT"){
            $dir = dirname(__FILE__);
        }
        $this->private_dir = $dir;  

        return $output; 
    }
}

#Example To Implement On Dev Mode 
$site_encryption_scrambler = new site_scrambler(dirname(__FILE__)."/stores");

#Setting The Website Encryption Algorithms 
#$site_encryption_scrambler->reset_codes(); 

?>