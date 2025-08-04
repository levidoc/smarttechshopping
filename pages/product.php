<?php
include_once "function.php";

$id = get_url_data('reference') ?? ex(2);
$product_index = decrypt_url($id);

$html_structure = '
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="[PRODUCT_COVER_IMG_]">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="[PRODUCT_COVER_IMG_]" alt="[PRODUCT_NAME_]">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="[PRODUCT_COVER_IMG_]">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            [PRODUCT_GALLERY_]

                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        [PRODUCT_NAME_]
                    </h4>

                    <span class="mtext-106 cl2">
                        [PRODUCT_PRICE_]
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        [PRODUCT_DESCRIPTION_]
                    </p>
                    
                    <!--  -->
                    <div class="p-t-33">
                        
                        [STOCK_CONDITION_CONTAINER]
                        
                        <div class="p-b-10 p-t-10">
                            <h4 class="mtext-106 cl2 p-b-10">Vendor</h4>
                            [STORE_PROFILE_]
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a onclick="add_to_wishlist(`' . simple_encryption($product_index) . '`)" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a onclick="share_on_whatsApp()" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>

                        <a onclick="share_on_instagram()" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a onclick="share_page()" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Share Page">
                            <i class="fas fa-share-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#description" role="tab">Size Guide</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#reviews" role="tab">Reviews ([PRODUCT_REVIEW_COUNT])</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade" id="description" role="tabpanel">
                        <div class="flex-w flex-tr">
                            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                                <img src="images/website-store.gif" style="width:100%;">
                            </div>
                
                            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                                <h3 class="ltext-106 cl5 txt-center">
                                    Empty Size Guide
                                </h3>
                                <br>
                                <p class="cl5">There is no available size guides for this particular product.</p>
                                
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            [PRODUCT_WEIGHT]
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            [PRODUCT_DIMENSIONS]
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Department
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            [PRODUCT_DEPARTMENT]
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade show active" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    [PRODUCT_REVIEW_DATA]

                                    [REVIRE_FORM_DATA]
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25" style="display:contents">
            Categories: [PRODUCT_CATEGORY_]
        </span>
    </div>
</section>


<!-- Supplier Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                From Supplier
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                [SUPPLIER_PRODUCTS_DATA_]
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                [RELATED_PRODUCTS_DATA_]
            </div>
        </div>
    </div>
</section>

';

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
        "STOCK_QUANTITY" => $e['stock'],
        "GALLERY_INFO" => [],
        "WEIGHT"=>"",
        "LENGTH"=>"",
        "WIDTH" => "",
        "HEIGHT" => "",
        "NUMERIC_SIZE"=>[],
        "COLOR_VARIATION" => [],
        "DEPARTMENT" => [],
        "DESCRIPTION"=>$e['description'],
        "VENDOR"=> "LEVIDOC", 
        "REVIEWS" => [], 
        "STATIC_SIZE" => [],
	];
	$json_data[] = $_data; 
}


if (!empty($json_data)) {
    $subsearch_query = $json_data;

    $data = '';
    $supplier_code = FALSE;
    foreach ($json_data as $row) {

        if ($product_index == $row['INDEX']) {

            $product_title = strtoupper($row['TITLE']);
            $product_image = __PROTOCOL__.__DOMAIN_NAME__."/@media/".$row['COVER_IMG']."/";
            $product_gallery = $row['GALLERY_INFO'];
            $product_quantity = $row['STOCK_QUANTITY'];

            $product_weight = $row['WEIGHT'] . ' kg';
            $product_dimensions = '(L) ' . $row['LENGTH'] . ' X (W) ' . $row['WIDTH'] . ' X (H) ' . $row['HEIGHT'] . ' cm';

            $product_category = "";
            $product_department = "";
            foreach ($row['DEPARTMENT'] as $department) {
                $product_department .= $department . ',';
            }

            $color_variation = $row['COLOR_VARIATION'];
            $numeric_variation = $row['NUMERIC_SIZE'];
            $static_variation = $row['STATIC_SIZE'];

            #Numeric Variation 
            $product_numric_data = "";  
            if (!empty($numeric_variation)){
                foreach ($numeric_variation as $num_var_row){
                    $product_numric_data .= '<option>'.$num_var_row['SIZE'].' '.$num_var_row['UNITS'].'</option>'; 
                }
            }

            #color variation
            $product_color_data = "";
            if (!empty($color_variation)) {
                foreach ($color_variation as $col_val_row){
                    $product_color_data .= '<option color-variation-code="'.$col_val_row['COLOR_CODE'].'" color-variation-image="'.($col_val_row['IMAGE']).'">'.strtoupper($col_val_row['COLOR_TEXT']).'</option>'; 
                }
            }

            #Static Variation 
            $product_static_data = "";
            if (!empty($static_variation)) {
                foreach ($static_variation as $stat_var) {
                    $product_static_data .= "<option>" . strtoupper($stat_var['SIZE']) . "</option>";
                }
            }

            if (!empty($product_static_data)) {
                $product_static_data = '<div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" id="cbx_product_static_size_options">
                                        <option></option>
                                        ' . $product_static_data . '
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>';
            }

            if (!empty($product_numric_data)) {
                $product_numric_data = '<div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" id="cbx_product_numeric_size_options">
                                        <option></option>
                                        ' . $product_numric_data . '
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>';
            }

            if (!empty($product_color_data)) {
                $product_color_data = '
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Color: 
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" id="cbx_product_color_options">
                                        <option></option>
                                        ' . $product_color_data . '
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>';
            }


            if (is_product_stock_available($product_index)) {
                #Search for color variation 
                $color_variation =
                    $replace = '

                        <div id="product_meta_data_container" style="padding-bottom:1rem;">
                            [PRODUCT_NUMERIC_DATA_CONTAINER]

                            [PRODUCT_STATIC_DATA_CONTAINER]

                            [PRODUCT_COLOR_DATA_CONTAINER]
                        </div>


                        <div id="button_continue_request" style="display:none" class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <button onclick="continue_with_selection()" style="    font-size: 12px; display: block;" class=" stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
                                    <i class="fa-solid fa-shopping-cart"></i> Select Preference
                                </button>
                            </div>
                        </div>

                        <div id="button_continue_execute_proc" class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-20">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="stock_quantity" min="1" step="1" max="[STOCK_QUANTITY]" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>


                                <button onclick="process_cart()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    <i class="fa-solid fa-shopping-cart"></i> Add to cart
                                </button>
                            </div>
                        </div>
                    ';
                $html_structure = str_ireplace(['[STOCK_CONDITION_CONTAINER]', '[PRODUCT_STATIC_DATA_CONTAINER]', '[PRODUCT_COLOR_DATA_CONTAINER]','[PRODUCT_NUMERIC_DATA_CONTAINER]'], [$replace, $product_static_data, $product_color_data,$product_numric_data], $html_structure);
            } else {
                $replace = '
                    <div class=" p-b-10">
                        <div class="product_error">
                            <div class="product_error_title"><i class="fa-solid fa-circle-exclamation"></i>  Out Of Stock</div>
                        </div>
                    </div>';

                $html_structure = str_ireplace('[STOCK_CONDITION_CONTAINER]', $replace, $html_structure);
            }


            $product_category_array = explode(";", chop($row['CATEGORY']));

            foreach ($product_category_array as $cat) {
                if (!empty($cat)) {
                    $product_category .= '<a style="margin:0.5rem;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">' . $cat . '</a>';
                }
            }

            $product_description = nl2br($row['DESCRIPTION']);
            $supplier_code = $row['VENDOR'];

            $product_review = $row['REVIEWS'];
            $review_count = 0;

            if (empty(account_code())) {
                $review_form = '<!-- Add review -->
                <form onsubmit="return false;" class="w-full">
                    <h5 class="mtext-108 cl2 p-b-7">
                        Add a review
                    </h5>

                    <p class="stext-102 cl6">
                        Log in to post a review
                    </p>

                </form>';
            } else {
                $review_form = '<!-- Add review -->
                <form onsubmit="return false;" class="w-full">
                    <h5 class="mtext-108 cl2 p-b-7">
                        Add a review
                    </h5>

                    <p class="stext-102 cl6">
                        Your email address will not be published. Required fields are marked *
                    </p>

                    <div class="flex-w flex-m p-t-50 p-b-23">
                        <span class="stext-102 cl3 m-r-16">
                            Your Rating
                        </span>

                        <span class="wrap-rating fs-18 cl11 pointer">
                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                            <input id="review_count" class="dis-none" type="number" name="rating">
                        </span>
                    </div>

                    <div class="row p-b-25">
                        <div class="col-12 p-b-5">
                            <label class="stext-102 cl3" for="review">Your review</label>
                            <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                        </div>
                    </div>

                    <button onclick="record_review()" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Submit
                    </button>
                </form>';
            }

            $review_data = '';
            foreach ($product_review as $review) {


                $rate = $review['REVIEW_VOTE'];
                if (($rate >= 0) && ($rate < 1)) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                    </span>';
                } else if (($rate >= 1) && ($rate < 2)) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                    </span>';
                } else if (($rate >= 2) && ($rate < 3)) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                    </span>';
                } else if (($rate >= 3) && ($rate < 4)) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                    </span>';
                } else if (($rate >= 4) && ($rate < 5)) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star-outline"></i>
                    </span>';
                } else if ($rate >= 5) {
                    $review_stars = '
                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                    </span>';
                }


                $r_html = '
                <div class="flex-w flex-t" style="padding:2rem 0rem;">
                    <div class="wrap-pic-s size-109 bor0 m-r-18 m-t-6">
                        <h2><i class="fa-solid fa-user"></i></h2>
                    </div>

                    <div class="size-207">
                        <div class="flex-w flex-sb-m p-b-17">
                            <span class="mtext-107 cl2 p-r-20">
                                @' . $review['NAME'] . '
                            </span>

                            ' . $review_stars . '
                        </div>

                        <p class="stext-102 cl6">
                            ' . $review['COMMENT_TEXT'] . '
                        </p>
                    </div>
                </div>';

                if (!empty($review['RESPONSE_TEXT'])) {
                    $p_html = '
                    <div class="flex-w flex-t p-b-68" style="padding:0 2rem 3rem 2rem;">
                        <div class="wrap-pic-s size-109 bor0 m-r-18 m-t-6">
                            <h2><i class="fa-solid fa-user"></i></h2>
                        </div>
    
                        <div class="size-207">
                            <div class="flex-w flex-sb-m p-b-17">
                                <span class="mtext-107 cl2 p-r-20">
                                    Vendor Response
                                </span>
    
                               
                            </div>
    
                            <p class="stext-102 cl6">
                                ' . $review['RESPONSE_TEXT'] . '
                            </p>
                        </div>
                    </div>';
                } else {
                    $p_html = '<div class="p-b-68"></div>';
                }


                $x = $review['COMMENT_STATUS'];
                if ($x > 100) {
                    $review_data .= $r_html . $p_html;
                }

                $review_count++;
            }

            if (retrieve_vendor_data($supplier_code) !== FALSE) {
                $store_name = retrieve_vendor_data($supplier_code, "NAME");
                $store_icon = file_path('vendor_wallpaper') . retrieve_vendor_data($supplier_code, "ICON");
                $store_link = "vendor.php?reference=" . encrypt_url($supplier_code);

                $replace = '
            <a href="' . $store_link . '">
                <div class="vendor_product_container">
                    <img src="' . $store_icon . '">
                    <p class="bold">' . $store_name . '</p>
                </div>
            </a>';

                $html_structure = str_ireplace('[STORE_PROFILE_]', $replace, $html_structure);
            } else {

                $replace = '';
                $html_structure = str_ireplace('[STORE_PROFILE_]', $replace, $html_structure);
            }

            $gallery_data = '';
            foreach ($product_gallery as $gallery_info) {

                $image = file_path('galley') . $gallery_info['IMAGE'];

                $g = '
                    <div class="item-slick3" data-thumb="' . $image . '">
                        <div class="wrap-pic-w pos-relative">
                            <img src="' . $image . '" alt="' . $product_title . '">

                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="' . $image . '">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>';

                $gallery_data .= $g;
            }
            $product_currency = __CURRENCY_SIGN__; 

            $product_amount = $row['PRICE']; 
            $actual_price = $row['SALE']; 

            $product_link = 'app_product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

            if ($product_amount == $actual_price) {
                $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price);
            } else {
                $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> ' . retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount) . '</s></span>';
            }

            break;
        }
    }

    $supplier_products = "";
    $related_product_data = "";

    $search_count = 0;
    $relate_count = 0;

    foreach ($subsearch_query as $product_search) {

        $search_store_id = $product_search['VENDOR'];

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
                                <a onclick="add_to_wishlist(`' . simple_encryption($product_search['INDEX']) . '`)" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';

        $store_name = retrieve_vendor_data($product_search['VENDOR'], "NAME");
        $product_html_structure = str_ireplace('[STORE_NAME]', '<i class="fa-solid fa-shop"></i> ' . $store_name, $product_html_structure);

        $search_product_index = $product_search['INDEX'];
        $search_product_title = strtoupper($product_search['TITLE']);
        $search_product_image = __PROTOCOL__.__DOMAIN_NAME__."/@media/".$product_search['COVER_IMG']."/";

        $search_category = $product_search['CATEGORY'];

        $search_product_currency = __CURRENCY_SIGN__;
        $search_product_amount = $product_search['PRICE']; 
        $search_actual_price = $product_search['SALE']; 
        $search_product_link = 'product/' . encrypt_url($search_product_index) . '/&safe_search=on/';

        if ($search_product_amount == $search_actual_price) {
            $search_price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($search_actual_price);
        } else {
            $search_price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($search_actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> ' . retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($search_product_amount) . '</s></span>';
        }

        $info = str_ireplace(
            ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]'],
            [$search_product_title, $search_price, $search_product_image, $search_product_link],
            $product_html_structure
        );

        if (($search_store_id === $supplier_code) && ($product_index !== $search_product_index)) {
            $search_count++;
            if ($search_count <= 100) {
                $supplier_products .= $info;
            }
        }

        $x = explode(';', $search_category);
        $x = array_map('trim', $x);

        foreach ($x as $val) {
            if (($relate_count < 100) && (strpos($product_category, $val) !== false) && (!empty($val)) && ($product_index !== $search_product_index)) {
                $related_product_data .= $info;
                $relate_count++;
                break;
            }
        }
    }

    $data = str_ireplace(
        [
            '[PRODUCT_NAME_]',
            '[PRODUCT_PRICE_]',
            '[PRODUCT_DESCRIPTION_]',
            '[PRODUCT_COVER_IMG_]',
            '[PRODUCT_GALLERY_]',
            '[PRODUCT_REVIEW_COUNT]',
            '[REVIRE_FORM_DATA]',
            '[PRODUCT_REVIEW_DATA]',
            '[PRODUCT_CATEGORY_]',
            '[SUPPLIER_PRODUCTS_DATA_]',
            '[RELATED_PRODUCTS_DATA_]',
            '[STOCK_QUANTITY]',
            '[PRODUCT_WEIGHT]',
            '[PRODUCT_DIMENSIONS]',
            '[PRODUCT_DEPARTMENT]'
        ],
        [
            $product_title,
            $price,
            $product_description,
            $product_image,
            $gallery_data,
            $review_count,
            $review_form,
            $review_data,
            $product_category,
            $supplier_products,
            $related_product_data,
            $product_quantity,
            $product_weight,
            $product_dimensions,
            $product_department
        ],
        $html_structure,
    );

    //    print($data);
}

include_once "top.php";
echo (create_seo_signature($product_title, $product_description, 'CROSS GEN', ''));

?>
<?php include_once "header.php" ?>
<!-- Product -->
<?php echo ($data) ?>

<script>
    function continue_with_selection() {
        const product_meta_data_container = document.getElementById('product_meta_data_container');
        const button_continue_request = document.getElementById('button_continue_request');
        const button_continue_execute_proc = document.getElementById('button_continue_execute_proc');

        const cbx_product_static_size_options = document.getElementById('cbx_product_static_size_options'); 
        const cbx_product_numeric_size_options = document.getElementById('cbx_product_numeric_size_options'); 
        const cbx_product_color_options = document.getElementById('cbx_product_color_options'); 

        let j = ((product_meta_data_container.innerText)).length

        if (j == 0) {
            button_continue_execute_proc.style.display = "block";
            button_continue_request.style.display = "none";
        } else {
            if (button_continue_request.style.display == "none") {
                button_continue_execute_proc.style.display = "none";
                button_continue_request.style.display = "block";
            } else {

                if (cbx_product_color_options){
                    if (cbx_product_color_options.value == ""){
                        return error_dialog('Select Color To Proceed');      
                    }
                }

                if (cbx_product_numeric_size_options){
                    if (cbx_product_numeric_size_options.value == ""){
                        return error_dialog('Select Size To Proceed');    
                    }
                }

                if (cbx_product_static_size_options){
                    if (cbx_product_static_size_options.value == ""){
                        return error_dialog('Select Size To Proceed');    
                    }
                }

                button_continue_execute_proc.style.display = "block";
                button_continue_request.style.display = "none";
            }
        }

    }

    continue_with_selection();

    function process_cart() {
        let product_index = read_url_parameter('reference');
        let quan = document.getElementById('stock_quantity').value;

        add_to_cart(product_index, quan);

    }

    function record_review() {
        let review_text = document.getElementById('review').value;

        if ((review_text.length) > 2) {
            const file_path = "php/record_review.php";
            let product_id = '<?php echo ($product_index) ?>';
            let vendor_code = '<?php echo ($supplier_code) ?>';
            let review = document.getElementById('review_count').value;

            const formData = new FormData();
            formData.append('review', review);
            formData.append('vendor', vendor_code);
            formData.append('comment', review_text);
            formData.append('product', product_id);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', file_path, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    var data = this.responseText;

                    if (data.trim() == "PROCEED") {
                        confirm_dialog('Review Has Beem Made'); 
                        document.getElementById('review_count').value = null; 
                        
                    }else{
                        error_dialog('Could Not Process Request'); 
                    }
                }
            };
            xhr.send(formData);
        }
    }
</script>

<?php include_once "footer.php"; ?>