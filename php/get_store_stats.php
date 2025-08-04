<?php
include_once "../function.php";

$html_structure = '

<!-- latest news -->
<div class="latest-news mt-150 mb-150" id="shop_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Store </span>Suppliers</h3>
                    <p>list of our few suppliers.</p>
                </div>
            </div>
        </div>

        <div class="row">
            [SHOP_ITEMS]                
        </div>

    </div>
</div>
<!-- end latest news -->'; 

$page_index = intval($_POST['index']);

if ($page_index == null) {
	$page_index = 0;
} else if ($page_index < 0) {
	$page_index = 0;
}

$data = ""; 
$vendor_data = "";

$file_path = get_parent_directory() . '/DATA_SETS/vendor_pack.json';
if (file_exists($file_path)) {
	$json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

	$section = 0;

	$vendor_count = 0; 

	foreach ($json_data as $row) {
		$vendor_count ++; 

		$vendor_html_structure = '
        
                <div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="[VENDOR_LINK_]"><div class="latest-news-bg news-bg-1" style="background-image: url(\'[VENDOR_WALLPAPER_]\'); height:20rem;"></div></a>
						<div class="news-text-box">
							<h3><a>[STORE_NAME_]</a></h3>
							<p class="blog-meta">
                                <img style="max-width:4rem;" src="[VENDOR_LOGO_]">
							</p>
							<p class="excerpt" style="display: none;">[STORE_DESCRIPTION_]</p>
							<a href="[VENDOR_LINK_]" class="read-more-btn">View More <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>

			';

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
            $vendor_wallpaper = file_path('vendor_wallpaper') . $row['WALLPAPER'];
        }
		$vendor_description = nl2br($row['DESCRIPTION']);
        
		$vendor_link = 'store.php?reference=' . encrypt_url($vendor_index) . '&safe_search=on';

		
		$info = str_ireplace(
			['[VENDOR_LINK_]','[VENDOR_LOGO_]','[VENDOR_WALLPAPER_]','[STORE_NAME_]','[STORE_DESCRIPTION_]'],
			[$vendor_link,$vendor_image,$vendor_wallpaper,$vendor_title,$vendor_description],
			$vendor_html_structure
		);

		$x = ($page_index + 1); 
		$y = ($page_index); 

		if ((($x * (6)) >= ($vendor_count)) && (($vendor_count)>($y * (6)))){
			$data .= $info;
		}
		
		
	}
}

$output = str_ireplace(
	array('[SHOP_ITEMS]'),
	array($data),
	$html_structure
); 

echo $output; 
?>