<?php
include_once "function.php";

$page_index = 0; 
$page_limit = 45; 

if ((get_url_data('page')) !== null){
    $page_index = get_url_data('page'); 
}

$data = ""; 
$html_structure = '
<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">More Than Just Apparel and Clothing</p>
            <h3 class="ltext-106 cl5 txt-center">
                Other Ancillary Collections
            </h3>
        </div>

        <div class="flex-w flex-tr">
            
            <div class="case_collection">
                <div class="box">
                    <span class="title">Graphic Tees</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

            <div class="case_collection">
                <div class="box">
                    <span class="title">MEN</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

            <div class="case_collection">
                <div class="box">
                    <span class="title">WOMEN</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

            <div class="case_collection">
                <div class="box">
                    <span class="title">JEANS</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

            <div class="case_collection">
                <div class="box">
                    <span class="title">KIDS</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

            <div class="case_collection">
                <div class="box">
                    <span class="title">DENIMS</span>
                    <div>
                        <strong>Apparel & Clothing</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

[STORE_COLLECTION]

'; 

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
    
if (isset($json_data)){
    $category_pack = $json_data; 

    $mentioned_collection = ""; 
    $collection = ""; 

    $mentioned_structure = '
            <div class="case_collection">
                <div class="box">
                    <span class="title">[COLLECTION_TITLE]</span>
                    <div>
                        <strong>[COLLECTION_DEPARTMENT]</strong>
                    </div>
                </div>
            </div>'; 
    
    $collection_structure = '
    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
            <img src="[COLLECTION_IMAGE]" style="aspect-ratio: 11/9; object-fit: cover;">

            <a href="[COLLECTION_LINK]" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                <div class="block1-txt-child1 flex-col-l">
                    <span class="block1-name ltext-102 trans-04 p-b-8">
                        [COLLECTION_TITLE]
                    </span>

                    <span class="block1-info stext-102 trans-04">
                        [COLLECTION_DEPARTMENT]
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

    $x = 0; 

    if (count($category_pack) < ($page_index * $page_limit)){
        $page_index = 0; 
    }

    foreach ($category_pack as $row){
        $index = $row['INDEX'];
        $title = strtoupper($row['TITLE']); 
        $department = $row['PRIMARY_CATEGORY'];
        $image =  __PROTOCOL__.__DOMAIN_NAME__."/@media/".$row['IMAGE']."/"; 
        $link = 'set/'.encrypt_url($index)."/&safe_search=on/"; 
        
        $mentioned_data = str_ireplace(['[COLLECTION_TITLE]','[COLLECTION_DEPARTMENT]'],[$title,$department],$mentioned_structure); 
        $collection_data = str_ireplace(['[COLLECTION_TITLE]','[COLLECTION_DEPARTMENT]','[COLLECTION_IMAGE]','[COLLECTION_LINK]'],[$title,$department,$image,$link],$collection_structure); 

        $x ++; 

        if (($x > ($page_limit * $page_index)) && ((($page_index + 1) * $page_limit) > $x ) ){
            
        $mentioned_collection .= $mentioned_data; 
        $collection .= $collection_data; 

        }

    }

    if (null !== $collection){

        $collection = '
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">Dont decide just view all</p>
            <h3 class="ltext-106 cl5 txt-center">
                Your & My Collection
            </h3>
        </div>
        <div class="row">
        '.$collection.'
        </div>

        <a href="collection.php?page='.($page_index + 1).'">
            <button style="max-width:15rem; display: block; margin:2rem auto;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Load More
            </button>
        </a>
    </div>
</div>'; 
    }else{
        //Display Empty Text Info 
    }

    $data = str_ireplace(['[CASE_COLLECTION]','[STORE_COLLECTION]'],[$mentioned_collection,$collection],$html_structure); 
}

$output = $data; 

include_once "top.php";
echo (create_seo_signature('Collection', 'Here is a collection of all the things to expect from Varsity Market', 'Varsity Market', ''));

include_once "header.php"; ?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="    background-image: url('images/timeline/arcadia.jpg');
    padding: 10rem 0rem;
    height: 10cm;
    background-position: center -20vw;
    background-attachment: fixed;
    /* display: block; */
    filter: grayscale(1);
    /* background-repeat: repeat; */
    /* background-size: cover; */">
    <h2 class="ltext-105 cl0 txt-center">
        <span style="font-size: 15px;">Embrace beign Indecisive</span>
        <br>Apparel & Clothing<br>
        <span style="font-size:14px;">Why have one when you can have everything.</span>
    </h2>
</section>
<?php echo($output); ?> 
<?php include_once "footer.php"; ?>