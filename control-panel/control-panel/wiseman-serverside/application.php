<?php 
include_once "services.php";

$page_request = $_POST['page']; 

if ($page_request == "wiseman.blog"){
    $prf = __DIR__."\app_pages\wiseman.blog"; 
    echo file_get_contents($prf); 
}else if($page_request == "configuration"){
    $prf = __DIR__."\app_pages\configuration.page"; 
    echo file_get_contents($prf);
}else if ($page_request == "profile"){
    #Account Profile 

    $prf = __DIR__."\app_pages\profile.page.htm"; 
    $navigator = $_POST['navigator'] ?? exit(); 
    $profile_data = system_profile($navigator); 
    $output = str_ireplace(
        ['[USERNAME_PLACEHOLDER]','[USERNAME_IMAGE]'],
        [$profile_data['username'],$profile_data['image']],
    file_get_contents($prf)); 

    echo ($output);
    exit(); 
    
    #Account Profile 

}else if ($page_request == "new-article"){
    $prf = __DIR__."\app_pages\\new-article.page.htm"; 
    echo file_get_contents($prf);
}else if ($page_request == "articles"){
    $prf = __DIR__."\app_pages\article.page.htm";
    echo file_get_contents($prf);
}else if ($page_request == "security"){
    $prf = __DIR__."\app_pages\signin.page.htm"; 
    echo file_get_contents($prf);
}else if ($page_request == "note_pages"){
    $prf = __DIR__."/app_pages/note_pages.page.html"; 
    echo file_get_contents($prf);
}else if ($page_request == "site-theme"){
    #Site Themes 

    $prf = __DIR__."/app_pages/site-theme.html";
    $navigator = $_POST['navigator'] ?? null;  
    $theme_stat = file_get_contents($prf);

    $themes = system_themes($navigator);
    $output = ""; 
    $market_theme = $themes['system']; 
    foreach($market_theme as $row => $code){
        $title = $code['title'] ?? $market_theme[$row]['title']; 
        $category = $code['category'];
        $category_data = "";  
        foreach ($category as $c){
            $category_data .= $c.', '; 
        }
        $output .= '
            <div class="video anim" style="--delay: 0.7s; min-height: 10rem; background-image: url('.$code['wallpaper'].'); background-position: center; background-size: cover;  /* margin: 10px 5px; */">
                <div class="video-wrapper"></div>
                <div class="video-name" style="background-color: #000000a1; margin: 0px 0px 2rem 0px; text-align: center; padding: 10px;">'.$title.'</div>
                <div class="video-view" style="background-color: transparent;">Niche : '.$category_data.'</div>
                <div class="video-view" style="background-color: transparent;">
                    <button onclick="select_theme(`'.$row.'`)" class="like">Select Theme</button>
                </div>
            </div>';
    }

    $data_output = str_ireplace(['[SYSTEM_THEMES]'],[$output],$theme_stat); 
    echo $data_output; 
    exit(); 
    #Site Themes 
}else if ($page_request == "site-menu"){
    $prf = __DIR__.'/app_pages/site-menu.html'; 
    echo file_get_contents($prf); 
}else if ($page_request == "new-menu"){
    $prf = __DIR__.'/app_pages/create-menu.html'; 
    echo file_get_contents($prf); 
    
}else{
    $prf = __DIR__.'\app_pages\404.page';
    echo file_get_contents($prf); 
}

?>