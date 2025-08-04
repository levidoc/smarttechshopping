<?php

include_once "function.php";

$id = get_url_data('reference') ?? ex(2);
$store_index = decrypt_url($id);

$html_structure = '
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(\'[STORE_WALLPAPER]\');" padding:10rem;">
    <h2 class="ltext-105 cl0 txt-center">
        <span style="font-size: 15px;">Store Profile</span>
        <br>
        [STORE_NAME]
    </h2>
</section>


<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Story
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        [STORE_DESCRIPTION]
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div style="border:0;" class="how-bor1">
                    <div class="hov-img0">
                        <img src="[STORE_LOGO]" alt="[STORE_NAME]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

[STORE_CATEGORY]

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">Keep In Touch</p>
            <h3 class="ltext-106 cl5 txt-center">
                Interact with us
            </h3>
        </div>
        
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form onsubmit="return false;">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Send Us A Message
                    </h4>

                    <div class="bor8 m-b-30">
                        <input type="hidden" value="' . $store_index . '" id="vendor_contact_form_code">
                        <textarea id="vendor_contact_form_message" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
                    </div>

                    <button onclick="record_contact_form()" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15">
                        Submit
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Address
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            [STORE_LOCATION]
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Lets Talk
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            [STORE_PHONE]
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email Support
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            [STORE_EMAILS]
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

[STORE_PRODUCTS]


<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">In person contact ?</p>
            <h3 class="ltext-106 cl5 txt-center">
                Reach out to us
            </h3>
        </div>
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 w-full-md">
                <div id="map"><iframe id="map" style="width:100%; height:35rem;" frameborder="0" src="https://maps.google.com/maps?q=[STORE_LOCATION]&amp;hl=en&amp;z=14&amp;output=embed" allowfullscreen=""></iframe></div>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Store Time
                        </span>

                        

                        <div class="m-r--5">
                            [STORE_TIME]
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="p-b-116">
    <div class="p-b-45">
        <p class="cl5 txt-center">Rules and Regulations</p>
        <h3 class="ltext-106 cl5 txt-center">
            Our Policies
        </h3>
    </div>

    <div style="max-width: 80rem; width:100%; display: block; margin: auto;">
        [MANDATORY_SET]
    </div>
</section>

[ADDITIONAL_POLICY_SET]';

$mandatory_policy_html = '
        <div style="padding: 5px 10px;">
            <div onclick="toggle_div(`collapse_[MANDATORY_POLICY_INDEX]`)" class="bor7" style="display: flex; justify-content: space-between; padding:10px 20px; font-size: 1.4rem; font-weight: 700;">
                <p>[POLICY_NAME_]</p>
                <p>
                    <i class="fa-solid fa-chevron-down"></i>
                </p>
            </div>
            <div id="collapse_[MANDATORY_POLICY_INDEX]" style="padding:1rem; display:none;">
                [POLICY_DETAILS_]
            </div>
        </div>';

$policy_html = '
        <div style="padding: 5px 10px;">
            <div onclick="toggle_div(`real_[MANDATORY_POLICY_INDEX]`)" id="[MANDATORY_POLICY_INDEX]" class="bor7" style="display: flex; justify-content: space-between; padding:10px 20px; font-size: 1.4rem; font-weight: 700;">
                <p>[POLICY_NAME_]</p>
                <p>
                    <i class="fa-solid fa-chevron-down"></i>
                </p>
            </div>
            <div id="real_[MANDATORY_POLICY_INDEX]" style="padding:1rem; display:none;">
                [POLICY_DETAILS_]
                <button class="m-b-45 m-t-45 flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
					View Document
				</button>

            </div>
        </div>';

$store_category_html = '

<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
<!-- Block1 -->
    <div class="block1 wrap-pic-w">
        <img src="[CATEGORY_IMAGE]" style="aspect-ratio: 11/9; object-fit: cover;">

        <a href="[CATEGORY_LINK]" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
            <div class="block1-txt-child1 flex-col-l">
                <span class="block1-name ltext-102 trans-04 p-b-8">
                    [CATEGORY_TITLE]
                </span>

                <span class="block1-info stext-102 trans-04">
                    [CATEGORY_DEPARTMENT]
                </span>
            </div>

            <div class="block1-txt-child2 p-b-4 trans-05">
                <div class="block1-link stext-101 cl0 trans-09">
                    Shop Now
                </div>
            </div>
        </a>
    </div>
</div>';

$file_path = './DATA_SETS/vendor_pack.json';
if (file_exists($file_path)) {
    $json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

    $data = '';
    foreach ($json_data as $row) {

        if ($store_index == $row['CODE']) {
            $store_name = $row['NAME'];
            $store_industry = $row['INDUSTRY'];
            $store_icon = $row['ICON'];
            $store_logo = $row['LOGO'];
            $store_phone = ($row['PHONE']);
            $store_email = $row['EMAIL'];
            $store_description = nl2br($row['DESCRIPTION']);

            $store_location = "";
            if (!empty($row['ADDRESS'])) {
                $store_location = $row['ADDRESS']["STREET"] . ', ' . $row['ADDRESS']["STATE"] . ', ' . $row['ADDRESS']["CITY"] . ', ' . $row['ADDRESS']["ZIP"] . ', ' . $row['ADDRESS']["COUNTRY"];
            }

            if (empty($row['LOGO'])) {
                $store_logo = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/No_photo_%282067963%29_-_The_Noun_Project.svg/800px-No_photo_%282067963%29_-_The_Noun_Project.svg.png';
            } else {
                $store_logo = file_path('vendor_wallpaper') . $row['LOGO'];
            }

            if (empty($row['WALLPAPER'])) {
                $store_wallpaper = 'assets/img/broken_img.png';
            } else {
                $store_wallpaper = file_path('vendor_wallpaper') . $row['WALLPAPER'];
            }

            //Store Hours
            $store_hours = '';
            if (!empty($row['HOURS'])) {
                if (!empty($row['HOURS']['Sunday_Opening']) && !empty($row['HOURS']['Sunday_Closing'])) {
                    $store_hours .= '
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Sun:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Sunday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Sunday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Monday_Opening']) && !empty($row['HOURS']['Monday_Closing'])) {
                    $store_hours .= '
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Mon:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Monday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Monday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Tuesday_Opening']) && !empty($row['HOURS']['Tuesday_Closing'])) {
                    $store_hours .= '
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Tue:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Tuesday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        ' . $row['HOURS']['Tuesday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Wednesday_Opening']) && !empty($row['HOURS']['Wednesday_Closing'])) {
                    $store_hours .= '
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Wed:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Wednesday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Wednesday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Thursday_Opening']) && !empty($row['HOURS']['Thursday_Closing'])) {
                    $store_hours .= '
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Thu:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Thursday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Thursday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Friday_Opening']) && !empty($row['HOURS']['Friday_Closing'])) {
                    $store_hours .= '
                    
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Fri:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Friday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Friday_Closing'] . '
                                    </a>
                                </p>';
                }

                if (!empty($row['HOURS']['Saturday_Opening']) && !empty($row['HOURS']['Saturday_Closing'])) {
                    $store_hours .= '
                    
                                <p class="stext-115 cl6 size-213 p-t-18" style="display: flex; align-items: flex-start;">
                                    <span class="p-lr-15">Sat:</span>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Saturday_Opening'] . '
                                    </a>
                                    <a style="font: menu;" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    ' . $row['HOURS']['Saturday_Closing'] . '
                                    </a>
                                </p>';
                }
            }
            //Store Hours 

            //Store Category
            $category_file_path = './DATA_SETS/catgory_pack.json';
            $category_data = '';
            if (file_exists($category_file_path)) {
                $category_data_pack = json_decode(file_get_contents($category_file_path), JSON_PRETTY_PRINT);
                $category_count = 0;

                foreach ($category_data_pack as $category) {
                    if (($category['VENDOR'] == $store_index) && ($category_count < 6)) {
                        $category_count++;
                        $category_image = file_path('category') . $category['IMAGE'];
                        $category_title = strtoupper($category['TITLE']);

                        $category_link = 'collection_set.php?reference=' . encrypt_url($category['INDEX']);

                        $department = $category['PRIMARY_CATEGORY'];

                        $info = str_ireplace(['[CATEGORY_IMAGE]', '[CATEGORY_LINK]', '[CATEGORY_TITLE]', '[CATEGORY_DEPARTMENT]'], [$category_image, $category_link, $category_title, $department], $store_category_html);
                        $category_data .= $info;
                    }
                }
            }

            if ($category_data !== "") {
                $category_data = '
                    <div class="sec-banner bg0 p-t-80 p-b-50">
                        <div class="container">
                            <div class="p-b-45">
                                <p class="cl5 txt-center">Explore More</p>
                                <h3 class="ltext-106 cl5 txt-center">
                                    Our Collection
                                </h3>
                            </div>
                            <div class="row">
                                
                                ' . $category_data . '

                            </div>
                        </div>
                    </div>';
            }

            //Store Category 

            //Store Products
            $file_path = './DATA_SETS/product_pack.json';
            $supplier_products = "";
            if (file_exists($file_path)) {
                $product_data_pack = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);
                $search_count = 0;

                if ($product_data_pack == false){
                    $supplier_products .= '
                        </div>
                        <div class="flex-w flex-tr">
                            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                                <img src="images/clipart/shopping.png" style="width:100%;">
                            </div>

                            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                                <h2 class="ltext-106 cl5 txt-center">No Available Products</h2>
                                <p class="cl5 txt-center">It appears there is no products available here</p>
                                
                            </div>
                        </div>'; 
                }else{
                    
                    foreach ($product_data_pack as $product_search) {

                        $search_store_id = $product_search['VENDOR'];

                        $product_html_structure = '
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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
                
                                                <span class="stext-105 cl3">
                                                    [PRODUCT_PRICE_]
                                                </span>
                                            </div>
                
                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a onclick="add_to_wishlist(`' . simple_encryption($product_search['INDEX']) . '`)" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                        $search_product_index = $product_search['INDEX'];
                        $search_product_title = strtoupper($product_search['TITLE']);
                        $search_product_image = file_path('product_image') . $product_search['COVER_IMG'];

                        $search_category = $product_search['CATEGORY'];

                        $search_product_currency = $product_search['CURRENCY']['CODE'];

                        $search_product_amount = currency_convert($product_search['PRICE'], $search_product_currency);
                        $search_actual_price = currency_convert(retrieve_product_amount($search_product_index), $search_product_currency);

                        $search_product_link = 'product.php?reference=' . encrypt_url($search_product_index) . '&safe_search=on';

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

                        if ($search_store_id === $store_index) {
                            $search_count++;
                            if ($search_count <= 20) {
                                $supplier_products .= $info;
                            }
                        }
                    }

                }
            }

            if ($supplier_products !== "") {
                $supplier_products = '<!-- Related Products -->
                    <section class="sec-relate-product bg0 p-t-45 p-b-105">
                        <div class="container">
                            <div class="p-b-45">
                                <p class="cl5 txt-center">Here is a hint of what we are</p>
                                <h3 class="ltext-106 cl5 txt-center">
                                    Sample Products
                                </h3>
                            </div>
                    
                            <!-- Slide2 -->
                            <div class="wrap-slick2">
                                <div class="slick2">
                                
                                ' . $supplier_products . '
                    
                                </div>
                            </div>
                        </div>
                    </section>';
            }

            //Store Products

            //Store Mandatory Policy
            $policy_file = './DATA_SETS/mandatory_policy_pack.json';
            $mandatory_policy_data_pack = json_decode(file_get_contents($policy_file), JSON_PRETTY_PRINT);

            $mandatory_data = "";
            if ($mandatory_policy_data_pack == false){
                $mandatory_data .= '
                        </div>
                        <div class="flex-w flex-tr">
                            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                                <img src="images/clipart/directions.png" style="width:100%;">
                            </div>

                            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                                <h2 class="ltext-106 cl5 txt-center">Missing Policies</h2>
                                <p class="cl5 txt-center">It appears this store has no available policies. </p>
                                
                            </div>
                        </div>'; 
            }else{
                foreach ($mandatory_policy_data_pack as $policy) {
                    if ($policy["VENDOR"] == $store_index) {
                        $policy_description = nl2br($policy["DESCRIPTION"]);
                        $policy_name = ucwords($policy['POLICY']);
                        $policy_code = 'MANDATORY_POLICY_' . ($policy['INDEX']);
    
                        $info = str_ireplace(['[MANDATORY_POLICY_INDEX]', '[POLICY_NAME_]', '[POLICY_DETAILS_]'], [$policy_code, $policy_name, $policy_description], $mandatory_policy_html);
                        $mandatory_data .= $info;
                    }
                }
            }
            

            //Store Mandatory Policy

            //Store Additional Policy
            $policy_file = './DATA_SETS/policy_pack.json';
            $policy_data_pack = json_decode(file_get_contents($policy_file), JSON_PRETTY_PRINT);

            $policy_data = "";
            if (is_array($policy_data_pack)) {

                foreach ($policy_data_pack as $policy) {
                    if ($policy['VENDOR'] == $store_index) {
                        $policy_code = $policy['REFERENCE'];
                        $policy_description = $policy['DESCRIPTION'];
                        $policy_label = ucwords($policy['LABEL']);
                        $policy_file_path = $policy['FILE_NAME'];

                        $info = str_ireplace(
                            ['[MANDATORY_POLICY_INDEX]', '[POLICY_NAME_]', '[POLICY_DETAILS_]'],
                            [$policy_code, $policy_label, $policy_description],
                            $policy_html
                        );
                        $policy_data .= $info;
                    }
                }
            };


            if ($policy_data !== "") {
                $policy_data = '
                    <section class="p-b-116">
                        <div class="p-b-45">
                            <p class="cl5 txt-center">Holdon We not done yet</p>
                            <h3 class="ltext-106 cl5 txt-center">
                                More Policies
                            </h3>
                        </div>

                        <div style="max-width: 80rem; width:100%; display: block; margin: auto;">
                            ' . $policy_data . '
                        </div>
                    </section>';
            }

            //Store Additional Policy
        }
    }

    $data = str_ireplace(
        ['[STORE_NAME]', '[STORE_DESCRIPTION]', '[STORE_PHONE]', '[STORE_LOCATION]', '[STORE_EMAILS]', '[STORE_LOGO]', '[STORE_WALLPAPER]', '[MANDATORY_SET]', '[ADDITIONAL_POLICY_SET]', '[STORE_CATEGORY]', '[STORE_PRODUCTS]', '[STORE_TIME]'],
        [$store_name, $store_description, $store_phone, $store_location, $store_email, $store_logo, $store_wallpaper, $mandatory_data, $policy_data, $category_data, $supplier_products, $store_hours],
        $html_structure,
    );
}
include_once "top.php";
echo (create_seo_signature($store_name, $store_description, 'SITE_OWNER', ''));

include_once "header.php";

echo ($data);
?>
<script>
    function toggle_div(section) {
        const x = document.getElementById(section);
        if (x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<?php include_once "footer.php";
