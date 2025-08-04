<?php
include_once "function.php";

$pagnation = ""; 
$html_structure = '
<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
                [SHOP_ITEMS]    
			</div>
		</div>
	</div>'; 

if ((!isset($_POST['index'])) || ($page_index == null)) {
	$page_index = 0;
} else if ($page_index < 0) {
	$page_index = 0;
}else{
	$page_index = intval($_POST['index']);
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
            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="[VENDOR_WALLPAPER_]" alt="[STORE_NAME_]" style="aspect-ratio: 10/9; object-fit: cover; border-radius:5px;">

                    <a href="[VENDOR_LINK_]" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                [STORE_NAME_]
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                <p class="blog-meta">
                                    <img style="max-width:4rem; border-radius:10px;" src="[VENDOR_LOGO_]">
                                </p>
                            </span>
                        </div>
                        
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Visit Shop
                            </div>
                        </div>
                        
                    </a>
                </div>
            </div>';

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
        
		$vendor_link = 'vendor/' . encrypt_url($vendor_index) . '&safe_search=on/';

		
		$info = str_ireplace(
			['[VENDOR_LINK_]','[VENDOR_LOGO_]','[VENDOR_WALLPAPER_]','[STORE_NAME_]','[STORE_DESCRIPTION_]'],
			[$vendor_link,$vendor_image,$vendor_wallpaper,$vendor_title,$vendor_description],
			$vendor_html_structure
		);

		$x = ($page_index + 1); 
		$y = ($page_index); 

		if ((($x * (100)) >= ($vendor_count)) && (($vendor_count)>($y * (100)))){
			$data .= $info;
		}

		if ($page_index <1 ){
			$pagnation = '
				<div class="pagination-wrap">
					<ul>
						<li><a >Prev</a></li>
						<li><a class="active" href="#">1</a></li>
						<li><a  href="?page=1">2</a></li>
						<li><a href="?page=2">3</a></li>
						<li><a href="?page=1">Next</a></li>
					</ul>
				</div>';
		}else{
			$prev_index = $page_index -1; 
			$next_index = $page_index + 1; 

			$pagnation = '
				<div class="pagination-wrap">
					<ul>
						<li><a href="?page='.$prev_index.'">Prev</a></li>
						<li><a href="?page='.$prev_index.'">'.($page_index).'</a></li>
						<li><a class="active" href="#">'.$next_index.'</a></li>
						<li><a href="?page='.$next_index.'">'.($next_index+1).'</a></li>
						<li><a href="?page='.$next_index.'">Next</a></li>
					</ul>
				</div>
			';
		}
		
		
	}
}

$output = str_ireplace(
	array('[SHOP_ITEMS]','[PAGNATION]'),
	array($data,$pagnation),
	$html_structure
); 

include_once "top.php"; 
echo(create_seo_signature('Store','Here is a list of all the suppliers in the store','Varsity Market','')); 

?>
<?php include_once "header.php" ?>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="    background-image: url('images/timeline/vossie.jpeg');
    padding: 10rem 0rem;
    height: 10cm;
    filter: grayscale(1);
    background-position: center -50rem;
    background-attachment: fixed;">
		<h2 class="ltext-105 cl0 txt-center">
			Stores
		</h2>
	</section>

	<?php echo($output) ?>
		
<?php include_once "footer.php"; ?>