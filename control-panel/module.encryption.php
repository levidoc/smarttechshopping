<?php 
class encryption_services{
    public function retrieve_encryption_algorithms(){
        $list = [
            'simple_encryption_procedure',
            'encryption_workflow_procedure'
        ]; 
        return $list; 
    }

    public function fetch_source_pack(){
        $source_file = dirname(__FILE__)."/bin/encryption.source.pack.php";
        if (file_exists($source_file)){
            include_once $source_file; 
            return TRUE; 
        } 
        return FALSE; 
    }

    public function __construct()
    {
        if ($this->fetch_source_pack() !== TRUE){
            trigger_error('Could Not Locate Source Pack'); 
        }

        #Conducting Function Verification
        $enc_algorithms = $this->retrieve_encryption_algorithms(); #Get All Algorithms 
        foreach ($enc_algorithms as $algo) {
            if (function_exists($algo)){
                #pass function 
            }else{
                trigger_error('Could Not Load Encryption Algorithm For '.$algo); 
            }
        }
    }
}

?>