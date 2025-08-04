<?php
include_once "../function.php";

$store_index = decrypt_url($_POST['index']);

$html_structure = '	<!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg" style="background-image: url(\'[STORE_WALLPAPER]\');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>CROSS GEN</p>
                            <h1>Vendor Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->

        <div class="abt-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="abt-text">
                            <p>CROSS GEN</p>
                            <h2>Store Profile </h2>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="abt-bg" style="background-image : url(\'[STORE_LOGO]\'); background-repeat: no-repeat; background-size: auto;">
        
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="abt-text">
                            <p class="top-sub">CROSS GEN\'s Store Profiles</p>
                            <h2>Store: <span class="orange-text">[STORE_NAME]</span></h2>
                            <p>[STORE_DESCRIPTION]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        [STORE_CATEGORY]

        <div class="contact-from-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="abt-text">
                            <p>Contact Section</p>
                            <h2>Contact Store</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="form-title">
                            <h2>Contact Store Admin\'s </h2>
                            <p>Do you have more questions or want to contact the store admin\'s, feel free to fill the form and the admins will respond to your request.</p>
                        </div>
                        <div id="form_status"></div>
                        <div class="contact-form">
                            <form type="POST" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                                <p>
                                    <input type="text" placeholder="Name" name="name" id="name">
                                    <input type="email" placeholder="Email" name="email" id="email">
                                </p>
                                <p>
                                    <input type="tel" placeholder="Phone" name="phone" id="phone">
                                    <input type="text" placeholder="Subject" name="subject" id="subject">
                                </p>
                                <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                                <input type="hidden" name="token" value="FsWga4&amp;@f6aw">
                                <p><input type="submit" value="Submit"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form-wrap">
                            <div class="contact-form-box">
                                <h4><i class="fas fa-map"></i> Shop Address</h4>
                                <p>[STORE_LOCATION]</p>
                            </div>
                            <div class="contact-form-box">
                                <h4><i class="far fa-clock"></i> Shop Hours</h4>
                                <p>[STORE_TIME]</p>
                            </div>
                            <div class="contact-form-box">
                                <h4><i class="fas fa-address-book"></i> Contact</h4>
                                <p>Phone: [STORE_PHONE] <br> Email: [STORE_EMAILS]</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        [STORE_PRODUCTS]

        <div>
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="abt-text">
                    <p>Policy Section</p>
                    <h2>Store Policies</h2>
                </div>
            </div>
            <div class="checkout-accordion-wrap" style="margin:2rem;">
                <div class="accordion" id="accordionExample">
                <div class="card single-accordion">
                    [MANDATORY_SET]
                </div>
                </div>

            </div>
        </div>


        [ADDITIONAL_POLICY_SET]
';

$mandatory_policy_html = '
<div class="card single-accordion">
    <div class="card-header" id="[MANDATORY_POLICY_INDEX]">
    <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_[MANDATORY_POLICY_INDEX]" aria-expanded="false" aria-controls="collapse_[MANDATORY_POLICY_INDEX]">
            [POLICY_NAME_]
        </button>
    </h5>
    </div>
    <div id="collapse_[MANDATORY_POLICY_INDEX]" class="collapse" aria-labelledby="[MANDATORY_POLICY_INDEX]" data-parent="#accordionExample" style="">
    <div class="card-body">
        <div class="card-details">
            <p>[POLICY_DETAILS_]</p>
        </div>
    </div>
    </div>
</div>';

$policy_html = '
<div class="card single-accordion">
    <div class="card-header" id="[MANDATORY_POLICY_INDEX]">
    <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_[MANDATORY_POLICY_INDEX]" aria-expanded="false" aria-controls="collapse_[MANDATORY_POLICY_INDEX]">
            [POLICY_NAME_]
        </button>
    </h5>
    </div>
    <div id="collapse_[MANDATORY_POLICY_INDEX]" class="collapse" aria-labelledby="[MANDATORY_POLICY_INDEX]" data-parent="#accordionExample" style="">
    <div class="card-body">
        <div class="card-details">
            <p>[POLICY_DETAILS_]</p>
            <div class="hero-btns">
                <a href="#" class="boxed-btn">View Document</a>
            </div>

        </div>
    </div>
    </div>
</div>';

$store_category_html = '
<div class="col-lg-4 col-md-6">
    <div class="single-latest-news">
        <a>
            <div class="latest-news-bg" style="height: 270px; background-position: center; background-size: contain; background-repeat: no-repeat; backdrop-filter: invert(1);">
                <img src="[CATEGORY_IMAGE]" style="aspect-ratio: 11/9; object-fit: cover;">
            </div>
        </a>
        <div class="news-text-box">
            <h3><a >[CATEGORY_TITLE]</a></h3>
        </div>
    </div>
</div>';

$file_path = '../DATA_SETS/vendor_pack.json';
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
            if (!empty($row['ADDRESS'])){
                $store_location = $row['ADDRESS']["STREET"].', '.$row['ADDRESS']["STATE"].', '.$row['ADDRESS']["CITY"].', '.$row['ADDRESS']["ZIP"].', '.$row['ADDRESS']["COUNTRY"]; 
            }
            
            if (empty($row['LOGO'])){
                $store_logo = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/No_photo_%282067963%29_-_The_Noun_Project.svg/800px-No_photo_%282067963%29_-_The_Noun_Project.svg.png'; 
            }else{
                $store_logo = file_path('vendor_wallpaper') . $row['LOGO'];
            }

            if (empty($row['WALLPAPER'])){
                $store_wallpaper = 'assets/img/broken_img.png'; 
            }else{
                $store_wallpaper = file_path('vendor_wallpaper') . $row['WALLPAPER'];
            }

            //Store Hours
            $store_hours = '';
            if (!empty($row['HOURS'])){
                if (!empty($row['HOURS']['Sunday_Opening']) && !empty($row['HOURS']['Sunday_Closing'])){
                    $store_hours .= '<br>Sun : '.$row['HOURS']['Sunday_Opening'].' to '.$row['HOURS']['Sunday_Closing'];
                }

                if (!empty($row['HOURS']['Monday_Opening']) && !empty($row['HOURS']['Monday_Closing'])){
                    $store_hours .= '<br>Mon : '.$row['HOURS']['Monday_Opening'].' to '.$row['HOURS']['Monday_Closing'];
                }

                if (!empty($row['HOURS']['Tuesday_Opening']) && !empty($row['HOURS']['Tuesday_Closing'])){
                    $store_hours .= '<br>Tue : '.$row['HOURS']['Tuesday_Opening'].' to '.$row['HOURS']['Tuesday_Closing'];
                }

                if (!empty($row['HOURS']['Wednesday_Opening']) && !empty($row['HOURS']['Wednesday_Closing'])){
                    $store_hours .= '<br>Wed : '.$row['HOURS']['Wednesday_Opening'].' to '.$row['HOURS']['Wednesday_Closing'];
                }

                if (!empty($row['HOURS']['Thursday_Opening']) && !empty($row['HOURS']['Thursday_Closing'])){
                    $store_hours .= '<br>Thu : '.$row['HOURS']['Thursday_Opening'].' to '.$row['HOURS']['Thursday_Closing'];
                }

                if (!empty($row['HOURS']['Friday_Opening']) && !empty($row['HOURS']['Friday_Closing'])){
                    $store_hours .= '<br>Fri : '.$row['HOURS']['Friday_Opening'].' to '.$row['HOURS']['Friday_Closing'];
                }

                if (!empty($row['HOURS']['Saturday_Opening']) && !empty($row['HOURS']['Saturday_Closing'])){
                    $store_hours .= '<br>Sat : '.$row['HOURS']['Saturday_Opening'].' to '.$row['HOURS']['Saturday_Closing'];
                }
            }
            //Store Hours 

            //Store Category
                $category_file_path = '..\DATA_SETS\catgory_pack.json'; 
                $category_data = ''; 
                if (file_exists($category_file_path)){
                    $category_data_pack = json_decode(file_get_contents($category_file_path),JSON_PRETTY_PRINT); 
                    $category_count = 0; 

                    foreach ($category_data_pack as $category){
                        if (($category['VENDOR'] == $store_index) && ($category_count<6)){
                            $category_count ++; 
                            $category_image = file_path('category').$category['IMAGE']; 
                            $category_title = strtoupper($category['TITLE']); 
                            
                            $info = str_ireplace(['[CATEGORY_IMAGE]','[CATEGORY_TITLE]'],[$category_image,$category_title],$store_category_html);
                            $category_data .= $info; 
                        }
                    }
                }

                if ($category_data !== ""){
                    $category_data = '
                <div class="latest-news mt-150 mb-150">
                    <div class="container">
                        <div class="col-lg-8 offset-lg-2 text-center mb-100">
                            <div class="abt-text">
                                <p>Store Categories</p>
                                <h2>Store Collection</h2>
                            </div>
                        </div>
                        <div class="row">
            
                        '.$category_data.'            
            
                        </div>
                    </div>
                </div>';
                }

            //Store Category 
            
            //Store Products
                $file_path = '../DATA_SETS/product_pack.json';
                $supplier_products = ""; 
                if (file_exists($file_path)){
                    $product_data_pack = json_decode(file_get_contents($file_path),JSON_PRETTY_PRINT);
                    $search_count = 0;
                    foreach ($product_data_pack as $product_search) {

                        $search_store_id = $product_search['VENDOR'];
                
                        $product_html_structure = '
                                    <div class="col-lg-4 col-md-6 text-center [PRODUCT_CATEGORY]">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                                <a href="[PRODUCT_LINK_]"><img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" style="aspect-ratio: 7/9; object-fit: contain; "></a>
                                            </div>
                                            <h3>[PRODUCT_NAME_]</h3>
                                            <p class="product-price">[PRODUCT_PRICE_] </p>
                                            <div>
                                                <a class="cart-btn" onclick="add_to_wishlist(`'.simple_encryption($product_search['INDEX']).'`)"><i class="fas fa-regular fa-heart"></i></a>
                                                <a href="[PRODUCT_LINK_]" class="cart-btn">View Product</a>
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
                            if ($search_count <= 6)  {
                                $supplier_products .= $info;
                            }
                        }
                            
                    }
                
                }

                if ($supplier_products !== ""){
                    $supplier_products = '
                <div class="more-products mb-150">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 text-center">
                                <div class="abt-text">
                                    <p>Featured Products</p>
                                    <h2>Store Products</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            '.$supplier_products.'
                        </div>
                    </div>
                </div>';
                }
            
            //Store Products

            //Store Mandatory Policy
                $policy_file = '../DATA_SETS/mandatory_policy_pack.json';
                $mandatory_policy_data_pack = json_decode(file_get_contents($policy_file),JSON_PRETTY_PRINT); 

                $mandatory_data = ""; 
                foreach ($mandatory_policy_data_pack as $policy){
                    if ($policy["VENDOR"] == $store_index){
                        $policy_description = nl2br($policy["DESCRIPTION"]);
                        $policy_name = ucwords($policy['POLICY']); 
                        $policy_code = 'MANDATORY_POLICY_'.($policy['INDEX']); 

                        $info = str_ireplace(['[MANDATORY_POLICY_INDEX]','[POLICY_NAME_]','[POLICY_DETAILS_]'],[$policy_code,$policy_name,$policy_description],$mandatory_policy_html); 
                        $mandatory_data .= $info; 
                    }                
                }

            //Store Mandatory Policy
            
            //Store Additional Policy
                $policy_file = '../DATA_SETS/policy_pack.json';
                $policy_data_pack = json_decode(file_get_contents($policy_file),JSON_PRETTY_PRINT); 

                $policy_data = ""; 
                foreach ($policy_data_pack as $policy){
                    if ($policy['VENDOR'] == $store_index){
                        $policy_code = $policy['REFERENCE'];
                        $policy_description = $policy['DESCRIPTION']; 
                        $policy_label = ucwords($policy['LABEL']); 
                        $policy_file_path = $policy['FILE_NAME']; 

                        $info = str_ireplace(['[MANDATORY_POLICY_INDEX]','[POLICY_NAME_]','[POLICY_DETAILS_]'],
                        [$policy_code,$policy_label,$policy_description],$policy_html); 
                        $policy_data .= $info; 

                    }
                }

                if ($policy_data !== ""){
                    $policy_data = '
                <div>
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="abt-text">
                            <p>Policy Section</p>
                            <h2>Additional Policies</h2>
                        </div>
                    </div>
                    <div class="checkout-accordion-wrap" style="margin:2rem;">
                        <div class="accordion" id="accordionExample">
                        '.$policy_data.'
                        </div>
        
                    </div>
                </div>';
                }

            //Store Additional Policy
        }
    }

    $data = str_ireplace(
        ['[STORE_NAME]','[STORE_DESCRIPTION]','[STORE_PHONE]','[STORE_LOCATION]','[STORE_EMAILS]','[STORE_LOGO]','[STORE_WALLPAPER]','[MANDATORY_SET]','[ADDITIONAL_POLICY_SET]','[STORE_CATEGORY]','[STORE_PRODUCTS]','[STORE_TIME]'],
        [$store_name,$store_description,$store_phone,$store_location,$store_email,$store_logo,$store_wallpaper,$mandatory_data,$policy_data,$category_data,$supplier_products,$store_hours],
        $html_structure,
    );

    print($data);
}
