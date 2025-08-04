<?php
include_once "../function.php";

$keywords = $_POST['keyword'];

$store_page_index = $_POST['store_index'];
$collection_index = $_POST['collection_index'];

$product_page_index = intval($_POST['product_index']);

if ($product_page_index == 'null') {
	$product_page_index = 0;
} else if ($product_page_index < 0) {
	$product_page_index = 0;
}

if ($store_page_index == 'null') {
	$store_page_index = 0;
} else if ($store_page_index < 0) {
	$store_page_index = 0;
}


$html_structure = '
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg" style="background-image: url(\'assets/img/wallpaper/img_2.jpg\');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>CROSS GEN</p>
                    <h1>Search Results: [SEARCH_DATA] </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="abt-section mt-150 mb-150" style="display:[PRODUCT_STYLE]">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="abt-text">
                    <p>Search Results</p>
                    <h2>Shop Products</h2>
                </div>
            </div>

            <div class="container">
                <div class="row product-lists">
                    [PRODUCT_INFO]
                </div>

                [PRODUCT_PAGINATION]
            </div>
        </div>
    </div>
</div>

<div class="latest-news mt-150 mb-150" style="display:[COLLECTION_STYLE]">
    <div class="container">
        <div class="col-lg-8 offset-lg-2 text-center mb-100">
            <div class="abt-text">
                <p>Store Categories</p>
                <h2>Store Collection</h2>
            </div>
        </div>
        <div class="row">
            [COLLECTION_DATA]
        </div>
    </div>
</div>

<div class="abt-section mt-150 mb-150" style="display:[VENDOR_STYLE]">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="abt-text">
                    <p>Search Results</p>
                    <h2>Shop Vendors</h2>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    [SHOP_ITEMS]
                </div>

                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                [STORE_PAGNATION]
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';

$product_info = "
<div style='text-align: center; width: 100%; margin: 9rem 0rem 0rem 0rem; '>
    <p>Search Results</p>
    <h2>No Available Products</h2>
</div>";

$store_vendor_data = "
<div style='text-align: center; width: 100%; margin: 9rem 0rem 0rem 0rem; '>
    <p>Search Results </p>
    <h2>No Available Stores</h2>
</div>";

$collection_info = "
<div style='text-align: center; width: 100%; margin: 9rem 0rem 0rem 0rem; '>
    <p>Search Results </p>
    <h2>No Available Collections</h2>
</div>
"; 
$product_pagnation = ''; 
$store_pagnation = $product_pagnation; 
$collection_pagnation = $store_pagnation; 

$product_style="none"; 
$vendor_style = "none"; 
$collection_style = "none";

#Seach for Store Products 
    $product_file = get_parent_directory() . '\DATA_SETS\product_pack.json';
    if (file_exists($product_file)) {
        $product_data_pack = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);

        $product_data = '';
        $product_structure = '
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="[PRODUCT_LINK_]"><img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" style="aspect-ratio: 7/9; object-fit: contain; "></a>
                </div>
                <h3>[PRODUCT_NAME_]</h3>
                <p class="product-price"><span>[STORE_NAME]</span> [PRODUCT_PRICE_] </p>
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>';

        $product_count = 0; 
        foreach ($product_data_pack as $row) {
            $product_index = $row['INDEX'];
            $product_title = strtoupper($row['TITLE']);
            $product_image = file_path('product_image') . $row['COVER_IMG'];

            $store_name = retrieve_vendor_data($row['VENDOR'], "NAME");

            $product_currency = $row['CURRENCY']['CODE'];
            $product_amount = currency_convert($row['PRICE'], $product_currency);
            $actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

            $product_link = 'product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

            if ($product_amount == $actual_price) {
                $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price);
            } else {
                $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> ' . retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount) . '</s></span>';
            }

            $info = str_ireplace(
                ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]', '[STORE_NAME]'],
                [$product_title, $price, $product_image, $product_link, 'Store: ' . $store_name],
                $product_structure
            );


            if (stristr($product_title, $keywords)) { 
                $x = ($product_page_index + 1);
                $y = ($product_page_index);

                $product_count += 1; 

                if ((($x * (6)) >= ($product_count)) && (($product_count) > ($y * (6)))) {
                    $product_data .= $info;

                    $product_info = $product_data;
                    $product_style = "block"; 
                }

                if ($product_page_index < 1) {
                    $product_pagnation = '
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="pagination-wrap">
                                    <ul>
                                        <li><a >Prev</a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a  href="?page=1">2</a></li>
                                        <li><a href="?page=2">3</a></li>
                                        <li><a href="?page=1">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>';

                } else {
                    $prev_index = $product_page_index - 1;
                    $next_index = $product_page_index + 1;

                    $product_pagnation = '
                    <div class="row">
                        <div class="col-lg-12 text-center">

                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="?page=' . $prev_index . '">Prev</a></li>
                                    <li><a href="?page=' . $prev_index . '">' . ($product_page_index) . '</a></li>
                                    <li><a class="active" href="#">' . $next_index . '</a></li>
                                    <li><a href="?page=' . $next_index . '">' . ($next_index + 1) . '</a></li>
                                    <li><a href="?page=' . $next_index . '">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>';

                }
            }
        }
    }
    $output = str_ireplace(['[PRODUCT_INFO]','[PRODUCT_PAGINATION]'],[$product_info,$product_pagnation],$html_structure); 
#Search for Store Products 

#Search for Store Profiles 
    $store_file = get_parent_directory().'\DATA_SETS\vendor_pack.json'; 
    if (file_exists($store_file)) {
        $json_data = json_decode(file_get_contents($store_file), JSON_PRETTY_PRINT);

        $vendor_count = 0; 
        $vendor_data = ""; 
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

            $x = ($store_page_index + 1); 
            $y = ($store_page_index); 

            if (stristr($vendor_title,$keywords)){
                if ((($x * (6)) >= ($vendor_count)) && (($vendor_count)>($y * (6)))){
                    $vendor_data .= $info;

                    $store_vendor_data = $vendor_data; 
                    $vendor_style = "block"; 
                }
        
                if ($store_page_index <1 ){
                    $store_pagnation = '
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
                    $prev_index = $store_page_index -1; 
                    $next_index = $store_page_index + 1; 
        
                    $store_pagnation = '
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="?page='.$prev_index.'">Prev</a></li>
                                <li><a href="?page='.$prev_index.'">'.($store_page_index).'</a></li>
                                <li><a class="active" href="#">'.$next_index.'</a></li>
                                <li><a href="?page='.$next_index.'">'.($next_index+1).'</a></li>
                                <li><a href="?page='.$next_index.'">Next</a></li>
                            </ul>
                        </div>
                    ';
                }
            }
            
        }
    }
    $output = str_ireplace(array('[SHOP_ITEMS]','[STORE_PAGNATION]'),array($store_vendor_data,$store_pagnation),$output); 
#Search for Store Profiles 

#Search for Store Collections 
    $collection_file = get_parent_directory().'/DATA_SETS/catgory_pack.json';
    if (file_exists($collection_file)){
        $collection_pack = json_decode(file_get_contents($collection_file),JSON_PRETTY_PRINT); 
        $category_count = 0; 
        $collection_data = ""; 
        foreach ($collection_pack as $row){
            $store_category_html = '
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a >
                            <div class="latest-news-bg"
                                style="height: 270px; background-position: center; background-size: contain; background-repeat: no-repeat; backdrop-filter: invert(1);">
                                <img src="[CATEGORY_IMAGE]"
                                    style="aspect-ratio: 11/9; object-fit: cover;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a >[CATEGORY_TITLE]</a></h3>
                        </div>
                    </div>
                </div>'; 

            $category_count ++; 
            $category_image = file_path('category').$row['IMAGE']; 
            $category_title = strtoupper($row['TITLE']); 
            
            $info = str_ireplace(['[CATEGORY_IMAGE]','[CATEGORY_TITLE]'],[$category_image,$category_title],$store_category_html);

            if (stristr($category_title,$keywords)){
                $collection_data .= $info;

                $collection_style = "block"; 
            }
            
            $collection_info = $collection_data; 
        }
    }

    $output = str_ireplace(['[COLLECTION_DATA]'],[$collection_info],$output); 
#Search for Store Collections


$output = str_ireplace(['[SEARCH_DATA]','[PRODUCT_STYLE]','[VENDOR_STYLE]','[COLLECTION_STYLE]'],[$keywords,$product_style,$vendor_style,$collection_style],$output);
print($output); 

?>