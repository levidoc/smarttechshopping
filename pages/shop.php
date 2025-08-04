<?php
include_once "function.php";

$pagnation = ""; 
$html_structure = '

<!-- Product -->
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>
				[PRODUCT_CATEGORY]
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					 Filter
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>
			
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>	
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Default
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Popularity
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Average rating
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Newness
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Price: Low to High
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Price: High to Low
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									All
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$0.00 - $50.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$50.00 - $100.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$100.00 - $150.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$150.00 - $200.00
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$200.00+
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col3 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Color
						</div>

						<ul>
							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #222;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Black
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Blue
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Grey
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Green
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Red
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
									<i class="zmdi zmdi-circle-o"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									White
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Tags
						</div>

						<div class="flex-w p-t-4 m-r--5">
							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Fashion
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Lifestyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Denim
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Streetstyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Crafts
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row isotope-grid">
			[PRODUCT_ITEMS]
		</div>

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Load More
			</a>
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
$product_data = "";
$product_filters = ""; 

$category_array = array(); 

$__db = __DATABASE__; 
$__product_data = $__db->query("SELECT * FROM `products`");
$json_data = []; 

foreach ($__product_data as $e) {
	$_data = [
		"INDEX"=>$e['id'],
		"TITLE"=>$e['title'],
		"PRICE" => $e['price'], 
		"IMAGE" => $e['image'],
		"CATEGORY"=>$e['category']."; ",
		"SOURCE"=>$e['source'], 
		"SALE"=>$e['price'], 
	];
	$json_data[] = $_data; 
}

if (isset($json_data)) {
	#$json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

	$section = 0;

	$product_count = 0; 

	if ($json_data !== false){
		foreach ($json_data as $row) {
			$product_count ++; 
	
			$product_html_structure = '
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item [PRODUCT_CATEGORY]">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="[PRODUCT_IMAGE_]" style="aspect-ratio: 7/9; object-fit: cover; " alt="[PRODUCT_NAME_]">
	
							<a href="[PRODUCT_LINK_]" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								View
							</a>
						</div>
	
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="[PRODUCT_LINK_]" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									[PRODUCT_NAME_]
								</a>
								<p class="product-price"><span>[STORE_NAME]</span>  </p>
								<span class="stext-105 cl3">
									[PRODUCT_PRICE_]
								</span>
							</div>
	
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" onclick="add_to_wishlist(`[PRODUCT_INDEX]`)" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>';
	
			
			#$store_name = retrieve_vendor_data($row['VENDOR'],"NAME"); 
			$store_name = "LEVIDOC--"; 

			$store_name = $row['SOURCE']; 
			$product_html_structure = str_ireplace('[STORE_NAME]','<i class="fa-solid fa-shop"></i> '.$store_name,$product_html_structure); 
		
			$product_index = $row['INDEX'];
			$product_title = strtoupper($row['TITLE']);
			$product_image = __PROTOCOL__.__DOMAIN_NAME__."/@media/".$row['IMAGE']."/"; 
			#$product_gallery = $row['GALLERY_INFO'];
	
			$product_category = str_replace(';', '', $row['CATEGORY']); 
			$product_filters .= $product_category; 
	
			$product_review_count = 0;
			#$product_amount = currency_convert($row['PRICE'], $product_currency);
			#$actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);
			$actual_price = $row['SALE']; 
			$product_amount = $row['PRICE'];

	
			$product_link = 'product/' . encrypt_url($product_index) . '/&safe_search=on/';
	
			if ($product_amount == $actual_price) {
				$price = retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($actual_price);
			} else {
				$price = retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($actual_price) . ' <span style="font-size:12px; padding:0px 10px;"><s> '.retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($product_amount) . '</s></span>';
			}
	
			$info = str_ireplace(
				['[PRODUCT_INDEX]','[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]', '[PRODUCT_REVIEW_COUNT_]','[PRODUCT_CATEGORY]', '[BUSINESS_NAME_]'],
				[simple_encryption($product_index),$product_title, $price, $product_image, $product_link, $product_review_count, $product_category, ''],
				$product_html_structure
			);
	
			$x = ($page_index + 1); 
			$y = ($page_index); 
	
			if ((($x * (100)) >= ($product_count)) && (($product_count)>($y * (100)))){
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
	}else{
		$data .= '</div><div class="flex-w flex-tr">
            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <img src="images/clipart/shopping.png" style="width:100%;">
            </div>

            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<h2 class="ltext-106 cl5 txt-center">No Available Products</h2>
                <p class="cl5 txt-center">It appears there is no products available here</p>
                
            </div>
        </div>'; 
	}
	
}

$categories = explode(' ', $product_filters);

// Trim whitespace from each category
$categories = array_map('trim', $categories);

$product_filters = ""; 
foreach ($categories as $filter){
	$filter = strtolower($filter);

	if ((!in_array($filter, $category_array)) && (!empty($filter))) {
		// Add the unique string to the array
		$category_array[] = $filter;
		$product_filters .= '<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".'.$filter.'">'.$filter.'</button>';
	}

}



$output = str_ireplace(
	array('[PRODUCT_ITEMS]','[PAGNATION]','[PRODUCT_CATEGORY]'),
	array($data,$pagnation,$product_filters),
	$html_structure
); 

include_once "top.php"; 
echo(create_seo_signature('Shop','A list of all the products in the shop','Varsity Market','')); 

?>
<?php include_once "header.php" ?>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="    background-image: url('images/timeline/fire.jpg');
    padding: 10rem 0rem;
    height: 10cm;
    filter: sepia(0.9);
    filter: contrast(0.9);
    filter: grayscale(1);
    background-attachment: scroll;">
		<h2 class="ltext-105 cl0 txt-center">
			Shop
		</h2>
	</section>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" id="product_section"><?php echo($output) ?>
	</div>
		
<?php include_once "footer.php"; ?>
 