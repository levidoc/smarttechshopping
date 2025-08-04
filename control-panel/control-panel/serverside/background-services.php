<?php
define("USER_AUTH", retrieve_user_auth());

ini_set('memory_limit', '10M');

function retrieve_user_auth()
{
    return "SOMETHING";
}

function menu_page_slide()
{
    $output = FALSE;
    $scripts_file = dirname(dirname(dirname(__FILE__))) . "/package-manager.php";
    @include_once $scripts_file;

    if (class_exists('scripts_packages')) {
        $search_flag = false;
        $package_manager = new scripts_packages();
        $package_manager->activate_database();
        $owner = USER_AUTH;
        $sql_data = "SELECT * FROM `tblsite_pages` WHERE (`page_owner` = '{$owner}')";
        $data = $package_manager->database->select_data($sql_data);
        return $data;
    }

    #Filter The Database For Existing Information 

    return $output;
}

function construct_menu_slides($card = '<div class="side-menu">
            <a onclick="change_page(`modify-pages`,`[PAGE_ID]`)" class="side-menu-option">
              [PAGE_TITLE]
            </a>
          </div>')
{
    $output = "";
    $md = menu_page_slide();
    if (empty($md)) {
    }

    foreach ($md as $key => $md_tag) {
        #foreach ($md_tag as $inner_key => $inner_data){ 
        #print_r($inner_data[0]); 
        #}

        $menu_name = json_decode($md_tag['page_data'], true)["title"] ?? "";
        $menu_id = $md_tag['call_sign'] ;
        $card_info = str_ireplace(['[PAGE_TITLE]','[PAGE_ID]'], [$menu_name,$menu_id], $card);

        //
        $output .= $card_info;
    }

    echo $output;
}

function set_page_data($key,$value){
    $name = "internal_data";
    $cookie_name = (hash("sha256",$name)); 
    $cookie_data = base64_encode(json_encode([$key=>$value],JSON_PRETTY_PRINT)); 
    $expire_time = time() + 3000;
    setcookie($cookie_name, $cookie_data, $expire_time, "/"); // "/" means the cookie is available site-wide
    return TRUE;
}

function create_page_code()
{
    $output = false;

    #Find The Output from the database
    $pattern = "QWERTYYUIOPASDFGHJKLZXCVBNM_AND_SOME_BS";
    $r1 = str_shuffle($pattern);

    $scripts_file = dirname(dirname(dirname(__FILE__))) . "/package-manager.php";
    @include_once $scripts_file;

    if (class_exists('scripts_packages')) {
        $search_flag = false;
        while ($search_flag == false) {
            $package_manager = new scripts_packages();
            $package_manager->activate_database();
            $sql_data = "SELECT * FROM `tblsite_pages` WHERE `page_code` = '$r1' ";
            $data = $package_manager->database->select_data($sql_data);
            if (empty($data)) {
                return $r1;
            }
            $r1 = str_shuffle($r1);
        }
        return $data;
    }

    #Filter The Database For Existing Information 

    return $output;
}


function retrieve_store_data()
{
    $scripts_file = dirname(dirname(dirname(__FILE__))) . "/package-manager.php";
    @include_once $scripts_file;

    if (class_exists('scripts_packages')) {
        $package_manager = new scripts_packages();
        $package_manager->activate_database();
        $sql_data = "SELECT * FROM `tblstore_products`";
        $data = $package_manager->database->select_data($sql_data);
        return $data;
    }
}

function get_system_domain_network(): string
{
    return "varsitymarket.club";
}

function get_domain_request(): string
{
    return "immoralclothes";
}

function github_credentials($section = "login")
{
    $x = '  {
                "login":"levidoc",
                "id":157944600,
                "node_id":"U_kgDOCWoLGA",
                "avatar_url":"https://avatars.githubusercontent.com/u/157944600?v=4",
                "gravatar_id":"",
                "url":"https://api.github.com/users/levidoc",
                "html_url":"https://github.com/levidoc",
                "followers_url":"https://api.github.com/users/levidoc/followers",
                "following_url":"https://api.github.com/users/levidoc/following{/other_user}",
                "gists_url":"https://api.github.com/users/levidoc/gists{/gist_id}",
                "starred_url":"https://api.github.com/users/levidoc/starred{/owner}{/repo}",
                "subscriptions_url":"https://api.github.com/users/levidoc/subscriptions",
                "organizations_url":"https://api.github.com/users/levidoc/orgs",
                "repos_url":"https://api.github.com/users/levidoc/repos",
                "events_url":"https://api.github.com/users/levidoc/events{/privacy}",
                "received_events_url":"https://api.github.com/users/levidoc/received_events",
                "type":"User",
                "user_view_type":"private",
                "site_admin":false,
                "name":"hardy_hastings",
                "company":null,
                "blog":"",
                "location":null,
                "email":null,
                "hireable":null,
                "bio":null,
                "twitter_username":null,
                "notification_email":null,
                "public_repos":5,
                "public_gists":0,
                "followers":1,
                "following":0,
                "created_at":"2024-01-28T06:31:14Z",
                "updated_at":"2025-02-28T13:40:56Z",
                "private_gists":0,
                "total_private_repos":4,
                "owned_private_repos":4,
                "disk_usage":439140,
                "collaborators":0,
                "two_factor_authentication":false,
                "plan":{"name":"free","space":976562499,"collaborators":0,"private_repos":10000}}
            }                
                ';

    $data = json_decode($x);


    $data = [
        "login" => "levidoc",
        "site_admin" => false,
        "name" => "hardy_hastings",
    ];
    return $data[$section];
}

function set_internal_page($page)
{
    $name = "internal_menu";
    $value = $page;
    $expire_time = time() + 3000;
    setcookie($name, $value, $expire_time, "/"); // "/" means the cookie is available site-wide
    return TRUE;
}

function get_internal_page()
{
    $name = "internal_menu";

    // Check if the cookie is set and return its value
    if (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    } else {
        return null; // Return null if the cookie is not set
    }
}

function get_page_data(){
    $name = "internal_data";
    $cookie_name = (hash("sha256",$name)); 

    // Check if the cookie is set and return its value
    if (isset($_COOKIE[$cookie_name])) {
        return json_decode(base64_decode($_COOKIE[$cookie_name]),true);
    } else {
        return null; // Return null if the cookie is not set
    }
}

function get_page_map()
{
    $x = [
        "domain-settings" => "/pages/advanced.domain.settings.page.php",
        "new-page" => "/pages/new-page.website.page.php",
        "modify-pages" => "/pages/modify-pages.website.page.php",
        "github-control" => "/pages/advanced.github.control.page.php",
        "new-products" => "/pages/store.products.new.page.php",
        "store-products" => "/pages/store.products.view.page.php",
        "store-orders" => "/pages/store.orders.view.page.php",
        "dashboard" => "/pages/store.dashboard.page.php",
    ];
    return $x;
}

function get_github_tokens()
{
    return "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";
}
