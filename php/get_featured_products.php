<?php
include_once "../function.php";

$html_structure = '[PRODUCT_ITEMS]'; 

$page_index = intval($_POST['index']);

if ($page_index == null) {
	$page_index = 0;
} else if ($page_index < 0) {
	$page_index = 0;
}

$data = ""; 
$product_data = "";
$product_filters = ""; 

$category_array = array(); 

$file_path = get_parent_directory() . '/DATA_SETS/product_pack.json';
if (file_exists($file_path)) {
	$json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

	$section = 0;

	$product_count = 0; 

	foreach ($json_data as $row) {
		$product_count ++; 

		$product_html_structure = '
				<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 [PRODUCT_CATEGORY]">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" style="aspect-ratio: 7/9; object-fit: contain; ">

                            <a href="[PRODUCT_LINK_]" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="[PRODUCT_LINK_]" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    [PRODUCT_NAME_]
                                </a>

                                <span>[STORE_NAME]</span>

                                <span class="stext-105 cl3">
                                    [PRODUCT_PRICE_]
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a onclick="add_to_wishlist(`'.simple_encryption($row['INDEX']).'`)" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';
			
		$product_index = $row['INDEX'];
		$product_title = strtoupper($row['TITLE']);
		$product_image = file_path('product_image') . $row['COVER_IMG'];
		$product_gallery = $row['GALLERY_INFO'];

		$product_category = str_replace(';', '', $row['CATEGORY']); 
		$product_filters .= $product_category; 

		$store_name = retrieve_vendor_data($row['VENDOR'],"NAME"); 

		$product_currency = $row['CURRENCY']['CODE'];
		$product_review_count = 0;
		$product_reviews = $row['REVIEWS'];
		foreach ($product_reviews as $section) {
			$product_review_count++;
		}
		$product_amount = currency_convert($row['PRICE'], $product_currency);
		$actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

		$product_link = 'product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

		if ($product_amount == $actual_price) {
			$price = retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($actual_price);
		} else {
			$price = retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> '.retrieve_currency_code("CURRENCY_SIGN").' ' . string_to_currency($product_amount) . '</s></span>';
		}

		$info = str_ireplace(
			['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]', '[PRODUCT_REVIEW_COUNT_]','[PRODUCT_CATEGORY]', '[STORE_NAME]'],
			[$product_title, $price, $product_image, $product_link, $product_review_count, $product_category, 'Store: '.$store_name],
			$product_html_structure
		);

		$x = ($page_index + 1); 
		$y = ($page_index); 

		if ((($x * (6)) >= ($product_count)) && (($product_count)>($y * (6)))){
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

$categories = explode(' ', $product_filters);

// Trim whitespace from each category
$categories = array_map('trim', $categories);

$product_filters = ""; 
foreach ($categories as $filter){
	$filter = strtolower($filter);

	if ((!in_array($filter, $category_array)) && (!empty($filter))) {
		// Add the unique string to the array
		$category_array[] = $filter;
		$product_filters .= '<li data-filter=".'.$filter.'">'.$filter.'</li>';
	}

}



$output = str_ireplace(
	array('[PRODUCT_ITEMS]','[PAGNATION]','[PRODUCT_CATEGORY]'),
	array($data,$pagnation,$product_filters),
	$html_structure
); 

echo $output; 
?>