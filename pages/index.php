<?php
#Retrieve Featured Products 
include_once "function.php";

$html_structure = '[PRODUCT_ITEMS]';

$data = "";
$product_data = "";
$page_index = 0;

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
		"COVER_IMG"=>$e['image'],
	];
	$json_data[] = $_data; 
}


if (!empty($json_data)) {
	$json_data = $json_data;

	$section = 0;

	$product_count = 0;

	foreach ($json_data as $row) {
		$product_count++;

		$product_html_structure = '
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item [PRODUCT_CATEGORY]">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" style="aspect-ratio: 7/9; object-fit: contain; ">

                        <a href="[PRODUCT_LINK_]" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
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
                            <a onclick="add_to_wishlist(`' . simple_encryption($row['INDEX']) . '`)" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>';

		$product_index = $row['INDEX'];
		$product_title = strtoupper($row['TITLE']);
		$product_image = __PROTOCOL__.__DOMAIN_NAME__."/@media/". $row['COVER_IMG']."/";
		$product_category = str_replace(';', '', $row['CATEGORY']);
		$store_name = "LEVIDOC";
		$product_currency = __CURRENCY_SIGN__;
		$product_amount = $row["PRICE"]; 
		$actual_price = $row['SALE']; 
		$product_link = __PROTOCOL__.__DOMAIN_NAME__.'/product/' . encrypt_url($product_index) . '/&safe_search=on/';

		if ($product_amount == $actual_price) {
			$price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price);
		} else {
			$price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> ' . retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount) . '</s></span>';
		}

		$info = str_ireplace(
			['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]', '[PRODUCT_REVIEW_COUNT_]', '[PRODUCT_CATEGORY]', '[STORE_NAME]'],
			[$product_title, $price, $product_image, $product_link, $product_review_count, $product_category, 'Store: ' . $store_name],
			$product_html_structure
		);

		$x = ($page_index + 1);
		$y = ($page_index);

		if ((($x * (12)) >= ($product_count)) && (($product_count) > ($y * (12)))) {
			$data .= $info;
		}
	}
}

$featured_products = $data;

$data = "";

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
    
if (!empty($json_data)) {
	$collection_pack = $json_data;
	foreach ($collection_pack as $row) {
		$info = '
			<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="[IMAGE_]" alt="[NAME_]" style="aspect-ratio: 10/9; object-fit: cover;">

					<a href="[LINK_]" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								[NAME_]
							</span>

							<span class="block1-info stext-102 trans-04">
								[CATEGORY_]
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

		$image = __PROTOCOL__.__DOMAIN_NAME__."/@media/". $row['IMAGE']."/";
		$name = strtoupper($row['TITLE']);
		$category = $row['PRIMARY_CATEGORY'];
		$link = 'set/'.encrypt_url($row['INDEX'])."/";

		$info = str_ireplace(['[IMAGE_]', '[NAME_]', '[LINK_]', '[CATEGORY_]'], [$image, $name, $link, $category], $info);
		$data .= $info;
	}
}
$collection_data = $data;
#Retrieve Featured Products 
include_once "top.php";
echo (create_seo_signature(retrieve_site_information('SITE_NAME'), retrieve_site_information('SITE_DESCRIPTION'), retrieve_site_information('PROPRIETOR'), ''));

?>
<?php include_once "header.php" ?>

<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1 rs2-slick1">
		<div class="slick1">


			<div class="item-slick1 bg-overlay1" style="background-image: url(images/wallpaper4.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Your Marketplace
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								Store Products
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(images/wallpaper1.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Digital Marketplace
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								Store Products
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(images/wallpaper2.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Marketplace
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								Store Products
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-95 p-b-55">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/wallpaper4.jpg" alt="Shoes" style="aspect-ratio: 9/10; object-fit: cover;">

					<a href="collection.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Shoes
							</span>

							<span class="block1-info stext-102 trans-04">
								New Trend
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-6 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/astral.webp" alt="Apparel And Clothing" style="aspect-ratio: 9/10; object-fit: cover;">

					<a href="collection.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Apparel And Clothing
							</span>

							<span class="block1-info stext-102 trans-04">
								New Trend
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<?php echo ($collection_data) ?>


		</div>
	</div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
	<div class="container">
		<div class="p-b-10">
			<p class="cl5 txt-center">See what our store has to offer</p>
			<h3 class="ltext-106 cl5 txt-center">
				Explore Store
			</h3>

		</div>
		<br>
		<?php if (empty($featured_products)){
			echo '<div class="flex-w flex-tr">
            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <img src="images/clipart/shopping.png" style="width:100%;">
            </div>

            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<h2 class="ltext-106 cl5 txt-center">No Available Products</h2>
                <p class="cl5 txt-center">It appears there is no products available here</p>
                
            </div>
        </div>'; 
		}?>

		<div class="row isotope-grid" id="featured_products">
			<?php echo ($featured_products); ?>

		</div>
	</div>
</section>

<?php include_once "footer.php"; ?>