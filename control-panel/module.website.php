<?php 
class website_manager 
{   
    public $site_code = "SITE-CODE"; 

    public function fetch_source_pack(){
        $source_file = dirname(__FILE__)."/bin/website.source.pack.php"; 
        if (file_exists($source_file)){
            include_once $source_file; 
            return True; 
        }

        return Null;
    }

    public function record_rescource_theme($data_set){
        #Force System To Acknowledge The Theme
    }

    public function retrieve_rescources_themes(){
        #This function will return all the theme data 

        $theme_data = [
            "OAKLYN"=>[
                "preview_img"=>'',
                "rescource"=>"/rescources/theme/OAKLYN/",
                "plugins"=>[

                ],
                "services"=>[

                ]
            ],
        ]; 

        return $theme_data; 
    }

    public function site_installation(){
        #This function is responsible for the site installation. 
        
    }

    public function __construct()
    {
        if ($this->fetch_source_pack() !== TRUE){
            trigger_error("Failed To Get Source Pack"); 
        }
    }
}
 
?>