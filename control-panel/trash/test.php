<?php 
class website_control{
    private $website_id;
    private $website_data; 
    private $public_dir; 
    private $private_dir;

    public function __construct($website_id){
        $this->website_id = $website_id; 
    }    

    public function set_website_credits(){
        return $this->website_id; 
    }

    public function export_site(){
        #Export The Data To The Public Directory 
    }
}

$w = new website_control("reiddrop.varsitymarket.shop");

?>