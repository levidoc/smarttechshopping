<?php

@include_once "function.php";

$id = get_url_data('reference') ?? ex(2); 

$page_index = 0; 
$page_limit = 45; 
if (get_url_data('page') !== null){
    $page_index = get_url_data('page'); 
}

$collection_index = decrypt_url($id);
$collection_title = false; 

$html_structure = '

[RELATED_COLLECTION]

<section class="bg0 p-t-45 p-b-130">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">See what our collection has to offer</p>
            <h3 class="ltext-106 cl5 txt-center">
                Explore Collection
            </h3>
        </div>
        <br>
        [COLLECTION_PRODUCT]
    </div>
</section>';

$related_collection = ""; 
$__db = __DATABASE__; 
$__category_data = $__db->query("SELECT * FROM `categories`");
$json_data = []; 

foreach ($__category_data as $e) {
	$_data = [
		"INDEX"=>$e['id'],
		"TITLE"=>$e['name'],
		"PRIMARY_CATEGORY" => $e['name'], 
		"IMAGE" => $e['image'],
	];
	$json_data[] = $_data; 

}

if (!empty($json_data)){
    $collection_pack = $json_data;

    foreach ($collection_pack as $row){
        if ($row['INDEX'] == $collection_index){
            $collection_title = $row['TITLE']; 
            $collection_image = $row['IMAGE']; 
            $collection_department = $row['PRIMARY_CATEGORY']; 
            break; 
        }
    }
    $collection_count = 0; 
    $collection_structure = '
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="[COLLECTION_IMG]" style="aspect-ratio: 11/9; object-fit: cover;">

                    <a href="[LINK]" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                [TITLE]
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                '.$collection_department.'
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                See Collection
                            </div>
                        </div>
                    </a>
                </div>
            </div>';

    foreach ($collection_pack as $row){
            $index = $row['INDEX'];
            $title = strtoupper($row['TITLE']); 
            $department = $row['PRIMARY_CATEGORY'];
            $image =  file_path('category').$row['IMAGE']; 
            $link = 'collection_set.php?reference='.encrypt_url($index); 

            if ($department == $collection_department){
                $x = str_ireplace(['[COLLECTION_IMG]','[LINK]','[TITLE]'],[$image,$link,$title],$collection_structure); 

                $collection_count ++; 
                if ($collection_count > 6){
                    break; 
                }

                if ($index == $collection_index){ 
                    $collection_count - 1; 
                    continue;     
                }else{
                    $related_collection .= $x;
                }
                 
            }
    }
}

$collection_product = ""; 

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
        "VENDOR" => "LEVIDOC",
        "COVER_IMG" => $e['image'], 
	];
	$json_data[] = $_data; 
}


if (!empty($json_data)) {

    if (count($json_data) < ($page_limit * $page_index)){
        $page_index = 0; 
    }

    $x = 0; 

	foreach ($json_data as $row) {
		$product_html_structure = '
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item [PRODUCT_CATEGORY]">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="[PRODUCT_IMAGE_]" style="aspect-ratio: 7/9; object-fit: contain; " alt="[PRODUCT_NAME_]">

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

		
		$store_name = retrieve_vendor_data($row['VENDOR'],"NAME"); 
		$product_html_structure = str_ireplace('[STORE_NAME]','<i class="fa-solid fa-shop"></i> '.$store_name,$product_html_structure); 
	
		$product_index = $row['INDEX'];
		$product_title = strtoupper($row['TITLE']);
		$product_image = __PROTOCOL__.__DOMAIN_NAME__."/@media/".$row['COVER_IMG']."/";
		$product_category = str_replace(';', '', $row['CATEGORY']); 
		//$product_filters .= $product_category; 

		$product_currency = __CURRENCY_SIGN__;
		$product_review_count = 0;
		$product_amount = currency_convert($row['PRICE'], $product_currency);
		$actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

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

        $x ++; 
		
        if (($collection_title !== false) && (strpos($product_category,$collection_title) !== false)){

            if (($x > ($page_index * $page_limit)) && ($x < (($page_index + 1 ) * $page_limit)))
            $collection_product .= $info; 
        }
		
	}
}

if (empty($collection_product)){
    $collection_product = '
        <div class="flex-w flex-tr">
            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <img src="images/new_idea.gif" style="width:100%;">
            </div>

            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div>
                    <p class="cl5 txt-center m-b-20">Unfortunately, this collection does not have any products allocated to it.</p>
                </div>


            </div>
        </div>';
}else{
    $collection_product = '
        <div class="row isotope-grid" id="featured_products" style="position: relative; height: 1401.38px;">
        '.$collection_product.'
        </div>
        <a href="collection_set.php?reference='.$id.'&page='.($page_index + 1).'">
            <button style="max-width:15rem; display: block; margin:2rem auto;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Load More
            </button>
        </a>

        ';

}

if (!empty($related_collection)){
    $related_collection = '<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">Similar Taste ?</p>
            <h3 class="ltext-106 cl5 txt-center">
                Related Collection
            </h3>
        </div>
        <div class="row">
        '.$related_collection.'
        </div>
    </div>
</div>
'; 

}
$output = str_ireplace(['[COLLECTION_PRODUCT]','[RELATED_COLLECTION]'],[$collection_product,$related_collection],$html_structure);

include_once "top.php";
echo (create_seo_signature(strtoupper($collection_title).' Collection', 'Here is a collection of all the things to expect from varsitymarket', 'SITE_OWNER', ''));

include_once "header.php"; ?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/cover.jpg'); padding: 10rem 0rem; height: 10cm;">
    <h2 class="ltext-105 cl0 txt-center">
        <span style="font-size: 15px;">Embrace beign Indecisive</span>
        <br><?php echo(strtoupper($collection_title)); ?><br>
        <span style="font-size:14px;">Why have one when you can have everything.</span>
    </h2>
</section>
<?php echo($output) ?>
<?php include_once "footer.php"; ?>