<?php 
#Search The Database For The Tokens 
$store_product_data = retrieve_store_data(); 
$data_ = "";
if ($store_product_data == null){

}else{
    foreach ($store_product_data as $key => $value) {
        # code...
        $product_name = $value['title'] ?? "Product Title";
        $product_price = $value['price'] ?? "0.00";	
        #Format The Product Price
        $product_price = number_format((float)$product_price, 2, '.', '');
        $product_price = str_replace(",", "", $product_price);
        
        $product_index = $value['product_id'] ?? "0";
        $data_ .= '
            <tr>
                <td class="table-num">'.$product_index.'</td>
                <td class="table-product">
                    <div>
                        <img src="favicon.png" style="max-width: 3rem; border-radius: 12%;">
                        <div class="video-view" style="padding: inherit; background: inherit;">'.$product_name.'</div>
                    </div>
                </td>
                <td class="table-num">1</td>
                <td class="table-num">$'.$product_price.'</td>
                <td class="table-product" style="max: width 100px;"></td>
            </tr>';  
    }
}
$page_ = '        
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Store Products
        </div>

        <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
            <div class="video-wrapper"></div>
            <div class="video-name">
                <div class="small-header anim" style="--delay: .3s">
                    <span style="font-size:10px; ">The Website Inventory</span><br>
                    Available Products 
                </div>
            </div>

            
            <div class="video-view" style="padding: 10px 20px 0px;">Search For Product</div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%; display: flex; flex-direction: row; align-content: space-between; justify-content: space-between; gap: 0.3rem; margin: 0px 0px 20px 0px;">
                    <input value="" type="text" placeholder="Product Name" id="edt_blog_username" style="background-image: none; max-width: 100%;">
                    <button>
                        Search
                    </button>
                </div>
            </div>
            <div style="padding: 0px 1rem; border-radius: 2rem;">
                <table class="table-grid-application-set">
                    <thead>
                        <tr>
                            <th class="table-num">No</th>
                            <th class="table-product">Product</th>
                            <th class="table-num">Items</th>
                            <th class="table-num">Price</th>
                            <th class="table-product" style="max: width 100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        [PRODUCT_DATA]
                    </tbody>
                </table>
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div class="video-view" style="padding: 0px;">Total Products: 20</div>
                    <div>
                        <a onclick="change_menu(`home`)" class="sidebar-link discover is-active">
                            <svg style="height:auto; width:100%; padding: 5px; margin: 10px; border-radius: 10px; max-width: 2rem;" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z"></path>
                            </svg>
                        </a>
                        <a onclick="change_menu(`home`)" class="sidebar-link discover is-active">
                            <svg style="height:auto; width:100%; padding: 5px; margin: 10px; border-radius: 10px; max-width: 2rem;" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z"></path>
                            </svg>
                        </a>
                        <a onclick="change_menu(`home`)" class="sidebar-link discover is-active">
                            <svg style="height:auto; width:100%; padding: 5px; margin: 10px; border-radius: 10px; max-width: 2rem;" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z"></path>
                            </svg>
                        </a>
                        <a onclick="change_menu(`home`)" class="sidebar-link discover is-active">
                            <svg style="height:auto; width:100%; padding: 5px; margin: 10px; border-radius: 10px; max-width: 2rem;" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z"></path>
                            </svg>
                        </a>
                        <a onclick="change_menu(`home`)" class="sidebar-link discover is-active">
                            <svg style="height:auto; width:100%; padding: 5px; margin: 10px; border-radius: 10px; max-width: 2rem;" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
';

$output = str_ireplace(['[PRODUCT_DATA]'],[$data_], $page_);
echo ($output);

?>