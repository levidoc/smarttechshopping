<?php 
class Site_Template{
    private $room_id; 
    public $template_code; 

    private function get_room_id(){
        return ''; 
    }

    public function __construct($template_code,$room_id=FALSE)
    {   
        if ($room_id == FALSE){
            $this->room_id = $this->get_room_id(); 
        }else{
            $this->room_id = $room_id; 
        }

        $this->template_code = $template_code; 
    }

    public function retrieve_theme_blocks(){
        $Theme_source = $this->theme_data_source();
        return $Theme_source[$this->template_code]['blocks'];  

    }

    public function construct_header_style(){
        $output = ""; 
        $rescources = $this->theme_data_source();
        $website_code = $this->template_code; 

        if (isset($rescources[$website_code]['style']['header']['link'])){
            foreach ($rescources[$website_code]['style']['header']['link'] as $e){
                $output .= "<link rel=\"stylesheet\" href=\"$e\"> \n"; 
            }
        }

        return $output; 
    }

    private function theme_data_source(){
        $output = [
            'beyeke'=>[
                'blocks'=>[
                    [
                        'title'=>'navbar',
                        'img'=>'TRASH/header-test.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'header-v1',
                    ],
                    [
                        'title'=>'Hero ',
                        'img'=>'TRASH/hero-test.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'initiate',
                    ],
                    [
                        'title'=>'Mini Hero',
                        'img'=>'TRASH/hero-test-2.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'mini-header-v2',
                    ],
                    [
                        'title'=>'About Us',
                        'img'=>'TRASH/about-test.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'best-features-1.0',
                    ],[
                        'title'=>'Product',
                        'img'=>'TRASH/product-test-2.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'latest-products-1.0',
                    ]
                    ,[
                        'title'=>'Contact Us',
                        'img'=>'TRASH/contact-test.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'contact-us-c1',
                    ]
                    ,[
                        'title'=>'Visit Us',
                        'img'=>'TRASH/contact-maps-test.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'maps-aboutus-mpgl',
                    ]
                    ,[
                        'title'=>'Footer',
                        'img'=>'TRASH/footer-test-2.png',
                        'description'=>'The Site Navigation Bar',
                        'code'=>'footer-v1',
                    ],
                ],
                'style'=>[
                    'header'=>[
                        'link'=>[
                            'http://localhost/SKYNET/theme/templatemo_546_sixteen_clothing/vendor/bootstrap/css/bootstrap.min.css',
                            'theme/templatemo_546_sixteen_clothing/assets/css/fontawesome.css',
                            'theme/templatemo_546_sixteen_clothing/assets/css/templatemo-sixteen.css',
                            'theme/templatemo_546_sixteen_clothing/assets/css/owl.css',
                        ]
                    ]
                ]
            ]
        ];
        
        return $output; 
    }
}

?>