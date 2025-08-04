<?php 
class data_export_services {
    private $token; 

    public function read_data($raw_data,$token_data=false){
        #First Decode The Data For Processing 
        if ($token_data !== false){
            $obscure_clear = $this->decode_data($raw_data);
        }
        $obscure_clear = $this->decode_data($this->get_token()); 


        #Fiest Instruction Will Be To Locate The 
        $obscure_open = $this->decode_data($obscure_clear); 

        $algo = $obscure_open['cipher']; 
        $key = $obscure_open['']; 
        $obscure_data = openssl_decrypt($raw_data,$algo,$key,0,$iv); 

        $file_contents = file_get_contents('product.guide.pxy'); 
$set = json_decode(base64_decode($file_contents),true);
$key = $set['hash']; 
$algo = $set['cipher']; 
$iv = substr(hash("sha256",$key), 0 , 16);
$string = file_get_contents('product.crumbs.pxy'); 
$decode = openssl_decrypt($string,$algo,$key,0,$iv);

    }

    public function get_token(){
        return $this->token; 
    }
    
    public function set_token($token){
        $this->token = $token; 
    }   

    public function decode_data($info){
        return base64_decode($info); 
    }

    public function encode_data(){

    }

    public function __construct()
    {
        
    }
}

$data = new data_export_services(); 
#$website_data->
?>