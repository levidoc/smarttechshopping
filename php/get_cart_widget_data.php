<?php
include_once "../function.php";
$section = $_POST['section'];

$cart_build = "";
$subtotal = 0.00;
$total = 0.00;
$deductions = 0.00;
$discount = 0.00;

$cart_widget_container = '
<ul class="header-cart-wrapitem w-full">
    [PRODUCT_CART_DATA]
</ul>

<div class="w-full">
    <div class="header-cart-total w-full p-tb-40">
        Total: [TOTAL]
    </div>

    <div class="header-cart-buttons flex-w w-full">
        <a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            View Cart
        </a>

        <a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
        </a>
    </div>
</div>
';
$cart_file = get_parent_directory() . '/DATA_SETS/shopping_cart_pack.json';
if (file_exists($cart_file)) {
    $cart_data_pack = json_decode(file_get_contents($cart_file), TRUE);
    $products = array();

    $cart_info = array();
    foreach ($cart_data_pack as $row) {
        $user_code = account_code();
        $tracking_code = tracking_code('READ', true, "CART");

        if ($tracking_code == $row['TRACKING_CODE']) {
            if (!in_array($row["PRODUCT_ID"], $products)) {
                $products[] = $row["PRODUCT_ID"];
                $x = array(
                    'PRODUCT_ID' => $row["PRODUCT_ID"],
                    'QUANTITY' => intval($row['QUANTITY']),
                );

                $cart_info[] = $x;
            }
        }
    }

    if ($section == "count") {
        $i = count($products);
        $output = '<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="' . $i . '">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>';
        echo ($output);
        exit();
    }

    $product_file = get_parent_directory() . '/DATA_SETS/product_pack.json';
    if (file_exists($product_file)) {

        $json_data = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);
        $i = 0;

        if ($json_data !== false) {
            foreach ($json_data as $row) {
                $product_html_structure = '
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div onclick="remove_cart_item(`' . simple_encryption($row['INDEX']) . '`)" class="header-cart-item-img">
                        <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]">
                    </div>
            
                    <div class="header-cart-item-txt p-t-8">
                        <a href="[PRODUCT_LINK_]" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            [PRODUCT_NAME_]
                        </a>
            
                        <span class="header-cart-item-info">
                            [STOCK_QUANTITY] x [PRODUCT_PRICE_]
                        </span>
                    </div>
                </li>';

                $product_index = $row['INDEX'];
                $product_title = strtoupper($row['TITLE']);
                $product_image = file_path('product_image') . $row['COVER_IMG'];

                $product_currency = $row['CURRENCY']['CODE'];
                $product_amount = currency_convert($row['PRICE'], $product_currency);
                $actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

                $product_link = 'product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

                $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount);

                if (in_array($product_index, $products)) {
                    $quantity = 1;
                    //Searching The Cart Quantity
                    foreach ($cart_info as $cart_row) {
                        if ($product_index == $cart_row['PRODUCT_ID']) {
                            $quantity = $cart_row['QUANTITY'];
                            break;
                        }
                    }
                    //Searching The Cart Quantity


                    $base_total = $quantity * ($product_amount);
                    $true_total = $quantity * $actual_price;

                    $subtotal += $base_total;
                    $total += $true_total;

                    $deductions = $subtotal - $total;

                    $info = str_ireplace(
                        ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]', '[STOCK_QUANTITY]', '[PRODUCT_TOTAL]'],
                        [$product_title, $price, $product_image, $product_link, $quantity, retrieve_currency_code("CURRENCY_SIGN") . " " . string_to_currency($base_total)],
                        $product_html_structure
                    );

                    $i++;

                    if ($i < 5) {
                        $cart_build .= $info;
                    }
                }
            }
        }

        if (empty($cart_build)){
            $cart_build .= '
                <div>
                    <div>
                        <img src="images/clipart/selfie.png" style="width:100%; max-width:6rem; margin:auto; display:block; ">
                    </div>

                    <div>
                        <h3 class="ltext-106 cl5 txt-center">Cart Empty</h4>
                        <p class="cl5 txt-center">It appears your cart is empty</p>
                                
                    </div>
                </div>
            '; 
        }
        $output = str_ireplace(['[PRODUCT_CART_DATA]', '[TOTAL]'], [$cart_build, retrieve_currency_code("CURRENCY_SIGN") . " " . string_to_currency($total)], $cart_widget_container);
        echo ($output);
    }
}
