<?php
include_once "../function.php";

$html_structure = '
    <section class="shop-banner" style="background:url(\'[WALLPAPER]\')">
    	<div class="container" style="margin:auto; display:block;">
        	<h3>[TITLE]</h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="[LINK]" class="cart-btn btn-lg">View Shop</a>
        </div>
    </section>
'; 

$file_path = get_parent_directory() . '/DATA_SETS/vendor_pack.json';
if (file_exists($file_path)) {
    $json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);


    // Get a random index within the range of the array length
    $randomIndex = rand(0, count($json_data) - 1);

    // Access the randomly selected item
    $row = $json_data[$randomIndex];

    if (!empty($row['WALLPAPER']) && (!empty($row['DESCRIPTION']))){
        $vendor_index = $row['CODE'];
		$vendor_title = strtoupper($row['NAME']);
        if (empty($row['LOGO'])){
            $vendor_image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/No_photo_%282067963%29_-_The_Noun_Project.svg/800px-No_photo_%282067963%29_-_The_Noun_Project.svg.png'; 
        }else{
            $vendor_image = file_path('vendor_wallpaper') . $row['LOGO'];
        }

        if (empty($row['WALLPAPER'])){
            $vendor_wallpaper = 'assets/img/broken_img.png'; 
        }else{
            $vendor_wallpaper = $row['WALLPAPER'];
        }

		$vendor_description = nl2br($row['DESCRIPTION']);
		$vendor_link = 'store.php?reference=' . encrypt_url($vendor_index) . '&safe_search=on';

        $data = str_ireplace(['[WALLPAPER]','[TITLE]','[LINK]'],[$vendor_wallpaper,$vendor_title,$vendor_link],$html_structure);

        print($data);
    }else{
        echo('FALSE');
    }
}else{
    echo('FALSE'); 
}
?>