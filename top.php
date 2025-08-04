<?php 
function create_seo_signature($title,$description,$propriety,$site_favicon,$site_link=FALSE){

$site_favicon = "images/favicon.png";

if ($site_link == FALSE){
    $protocol = "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $site_link = $CurPageURL; 
}
$seo_tags = '
    <base href="http://'.$_SERVER['HTTP_HOST'].'/">
    <link rel="icon" type="image/png" href="'.$site_favicon.'"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>'.$title.'</title>
    <meta name="description" content="'.$description.'">

    <meta property="og:site_name" content="'.$propriety.'">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="'.$site_link.'">
    <meta property="og:title" content="'.$title.'">
    <meta property="og:description" content="'.$description.'">
    <meta property="og:image" content="'.$site_favicon.'"> 

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@'.$propriety.'">
    <meta name="twitter:creator" content="@'.$propriety.'">
    <meta name="twitter:url" content="'.$site_link.'">
    <meta name="twitter:description" content="'.$description.'">
    <meta name="twitter:title" content="'.$title.'">
    <meta name="twitter:image" content="'.$site_favicon.'"> 
'; 

$structure = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    '.$seo_tags.'	
        
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <script src="javascript/main_script.js"></script>
    <!--===============================================================================================-->
    </head>'; 
    return $structure; 
}
?>