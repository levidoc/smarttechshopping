<?php
include_once "../function.php";

$html_structure = '
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="cart-table-wrap">
                <table class="cart-table">
                    <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th class="product-remove"></th>
                            <th class="product-image">Product Image</th>
                            <th class="product-name">Name</th>
                            <th class="product-price">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        [WISHLIST_DATA]
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="total-section">
                <table class="total-table">
                    <thead class="total-table-head">
                        <tr class="table-total-row">
                            <th>Total</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="total-data">
                            <td><strong>SubTotal: </strong></td>
                            <td>[SUB_TOTAL]</td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Deductions: </strong></td>
                            <td>[DEDUCTION]</td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Total: </strong></td>
                            <td>[TOTAL]</td>
                        </tr>
                    </tbody>
                </table>
                <div class="cart-buttons">
                    <a href="shop.php" class="boxed-btn">Continue Shopping</a>
                    <a class="boxed-btn">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>';
$wishlist_build = ""; 
$subtotal = 0.00; 
$total = 0.00; 
$deductions = 0.00; 

$wishlist_file = get_parent_directory() . '/DATA_SETS/wishlist_pack.json';
if (file_exists($wishlist_file)) {
    $wishlist_data_pack = json_decode(file_get_contents($wishlist_file), TRUE);
    $products = array();
    foreach ($wishlist_data_pack as $row) {
        $user_code = account_code();
        $tracking_code = tracking_code();

        if (($tracking_code == $row['TRACKING_CODE']) && ($user_code == $row['USER_CODE'])) {
            if (!in_array($row["PRODUCT"], $products)) {
                $products[] = $row["PRODUCT"];
            }
        }
    }

    $product_file = get_parent_directory() . '/DATA_SETS/product_pack.json';
    if (file_exists($product_file)) {

        $json_data = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);

        foreach ($json_data as $row) {
            $product_html_structure = '
            <tr class="table-body-row">
                <td class="product-remove"><a onclick="remove_wishlist_item(`'.simple_encryption($row['INDEX']).'`)"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><a href="[PRODUCT_LINK_]"><img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]"></a></td>
                <td class="product-name">[PRODUCT_NAME_]</td>
                <td class="product-price">[PRODUCT_PRICE_]</td>
            </tr>';

            $product_index = $row['INDEX'];
            $product_title = strtoupper($row['TITLE']);
            $product_image = file_path('product_image') . $row['COVER_IMG'];
            
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
                    ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]'],
                    [$product_title, $price, $product_image, $product_link],
                    $product_html_structure
            );

            if (in_array($product_index, $products)) {
                $wishlist_build .= $info;

                $total += $actual_price; 
                $subtotal += $product_amount;
                
                $deductions = $subtotal - $total; 
            }


        }
    }
}

$output = str_ireplace(['[WISHLIST_DATA]','[SUB_TOTAL]','[DEDUCTION]','[TOTAL]'],[$wishlist_build,retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($subtotal),' - '.retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($deductions),retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($total)],$html_structure); 

echo($output);