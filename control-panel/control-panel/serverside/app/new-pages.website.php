<?php
$page_title = $_POST['page_title'];
$page_description = $_POST['page_description'];
$page_template = $_POST['page_template'];

#Reserve The Page Until Launch 

$package_file = dirname(dirname(dirname(dirname(__FILE__)))) . "/package-manager.php";
if (file_exists($package_file)) {
    @include_once $package_file;
}

if (class_exists('scripts_packages') == false) {
    exit("ERROR");
}

try {
    $executable = new scripts_packages();
    $executable->activate_blockchain(); #Block Chain Needed For Dealing With Public Data 
    $executable->activate_database();

    $page_keywords = "website, control, settings, configurations, reiddrop, varsitymarket, shop";
    $page_author = "Varsity Market";
    $page_image = "https://reiddrop.varsitymarket.shop/assets/images/logo.png";
    $page_url = "https://reiddrop.varsitymarket.shop/control-panel/serverside/app/new-pages.website.php";
    $page_type = "website";
    $page_section = "website";

    $seo_data = json_encode([
        "author" => $page_author,
        "url" => $page_url,
        "image" => $page_image,
        "keywords" => $page_keywords,
        "description" => $page_description,
        "title" => $page_title,
    ], JSON_PRETTY_PRINT);

    $site_data = json_encode([
        "author" => $page_author,
        "url" => $page_url,
        "image" => $page_image,
        "keywords" => $page_keywords,
        "description" => $page_description,
        "title" => $page_title,
    ], JSON_PRETTY_PRINT);


    $page_owner = USER_AUTH;
    $page_code = create_page_code();
    $executable->blockchain->add_items($page_code);
    $call_sign = $executable->blockchain->getLatestBlock()->hash;

    $sql = "INSERT INTO `tblsite_pages` (`page_owner`, `page_code`, `page_seo`, `page_data`,  `call_sign` ) VALUES  ('{$page_owner}','{$page_code}','{$seo_data}','{$site_data}', '{$call_sign}')";

    $exec = $executable->database->insert_data($sql);
    if ($exec == TRUE) {
        echo "PROCEED";

        //Set The Execution For The Page Transfer 
        $menu_selection = "modify-pages";  
        $exec = set_internal_page($menu_selection); 
        $exec = set_page_data("request",$call_sign); 
        exit();
    }

    exit('ERROR');


    //code...
} catch (\Throwable $th) {

    exit('ERROR');
}
