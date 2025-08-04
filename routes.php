<?php
@include_once dirname(__FILE__) . "/function.php";


$site_map = [

    "community" => [
        "page" => "public",
        "file" => "community.php",
    ],
    "product"=>[
        "page"=>"public",
        "file" => "product.php",
    ],
    "programs" => [
        "page" => "public",
        "file" => "affiliate_program.php",
    ],
    "referal" => [
        "page" => "public",
        "file" => "become_a_vendor.php",
    ],
    "cart" => [
        "page" => "public",
        "file" => "cart.php",
    ],
    "wishlist" => [
        "page" => "public",
        "file" => "wishlist.php",
    ],
    "shop" => [
        "page" => "public",
        "file" => "shop.php",
    ],
    "stores" => [
        "page" => "public",
        "file" => "store.php",
    ],
    "collection" => [
        "page" => "public",
        "file" => "collection.php",
    ],
    
    "set" => [
        "page" => "public",
        "file" => "collection_set.php",
    ],
    "policy" => [
        "page" => "public",
        "file" => "policies.page.php",
    ],
    "track-order" => [
        "page" => "public",
        "file" => "track-order.php"
    ],
    "vendor" => [
        "page" => "public",
        "file" => "vendor.php"
    ],
    "help" => [
        "page" => "public",
        "file" => "help_center.php"
    ],
    "" => [
        "page" => "public",
        "file" => "index.php",
    ]
];
$error_pages = [
    "404" => dirname(__FILE__) . "/pages/error.404.page.php",
    "000" => dirname(__FILE__) . "/pages/error.000.page.php",
    "500" => dirname(__FILE__) . "/pages/error.500.page.php",
];

$rescource_request = ex();
traffic_inspection();
$traffic_request = $rescource_request; 
if ($traffic_request == __ADMIN_URL__) {
    @include_once PWD . "/control-panel/control-panel/index.php";
    die(0);
}

if (isset($site_map[$rescource_request]['page'])) {
    #Check If The Rescource File Exists 
    $rescource_file = dirname(__FILE__) . "/pages/" . $site_map[$rescource_request]['file'] ?? false;
    if (file_exists($rescource_file)) {
        try {
            merge_page($rescource_file);
        } catch (\Throwable $th) {
            die($th); 
            merge_page($error_pages['500']);
        }
    } else {
        merge_page($error_pages['404']);
    }
}
#Conduct Traffic Inspection 
merge_page($error_pages['404']);
