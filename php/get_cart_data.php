<?php
include_once "../function.php";

$html_structure = '

<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
    <div class="m-l-25 m-r--38 m-lr-0-xl">
        <div class="wrap-table-shopping-cart">
            <table class="table-shopping-cart">
                <tr class="table_head">
                    <th class="column-1">Product</th>
                    <th class="column-2"></th>
                    <th class="column-3">Price</th>
                    <th class="column-4">Quantity</th>
                    <th class="column-5">Total</th>
                </tr>

                [CART_DATA]

            </table>
        </div>

        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
            <div class="flex-w flex-m m-r-20 m-tb-5">
                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" placeholder="Coupon" id="coupon_input" value="[COUPON_CODE]">
                    
                <div onclick="activate_coupon()" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                    Apply coupon
                </div>
            </div>

            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                Continue Shopping
            </div>
        </div>
    </div>
</div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13" style="align-items: center">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209" style="text-align: end; padding: 1rem;">
								<span class="mtext-110 cl2">
                                    [SUB_TOTAL]
								</span>
							</div>
						</div>

                        <div class="flex-w flex-t bor12 p-b-13" style="align-items: center">
							<div class="size-208">
								<span class="stext-110 cl2">
									Deductions:
								</span>
							</div>

							<div class="size-209"  style="text-align: end; padding: 1rem;"> 
								<span class="mtext-110 cl2">
                                    [DEDUCTION]
								</span>
							</div>
						</div>

                        [COUPON_INFO]

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1" style="text-align: end; padding: 1rem;">
								<span class="mtext-110 cl2">
                                    [TOTAL]
								</span>
							</div>
						</div>

                        <a href="checkout.php">
                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </button>
                        </a>
					</div>
				</div>';

$cart_build = ""; 
$subtotal = 0.00; 
$total = 0.00; 
$deductions = 0.00; 
$discount = 0.00; 


$coupon_code = system_coupon();
if ($coupon_code !== FALSE){
    $coupon_info = '
<div class="flex-w flex-t bor12 p-b-13" style="align-items: center">
    <div class="size-208">
        <span class="stext-110 cl2">
            <strong>Coupon: [NAME] </strong>
        </span>
    </div>

    <div class="size-209"  style="text-align: end; padding: 1rem;">
        <span class="mtext-110 cl2">
            [AMOUNT]
        </span>
    </div>
</div>';

}else{
    $coupon_info = ''; 
}
$coupon_name = "";
$cart_file = get_parent_directory() . '/DATA_SETS/shopping_cart_pack.json';
if (file_exists($cart_file)) {
    $cart_data_pack = json_decode(file_get_contents($cart_file), TRUE);
    $products = array();

    $cart_info = array(); 
    foreach ($cart_data_pack as $row) {
        $user_code = account_code();
        $tracking_code = tracking_code('READ',true,"CART");
        
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

    $product_file = get_parent_directory() . '/DATA_SETS/product_pack.json';
    if (file_exists($product_file)) {

        $json_data = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);

        foreach ($json_data as $row) {
            $product_html_structure = '
                <tr class="table_row">
                    <td class="column-1">
                        <div class="how-itemcart1" onclick="remove_cart_item(`'.simple_encryption($row['INDEX']).'`)">
                            <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]">
                        </div>
                    </td>
                    <td class="column-2">[PRODUCT_NAME_]</td>
                    <td class="column-3">[PRODUCT_PRICE_]</td>
                    <td class="column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>

                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="[STOCK_QUANTITY]">

                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                    </td>
                    <td class="column-5">[PRODUCT_TOTAL]</td>
                </tr>';

            $product_index = $row['INDEX'];
            $product_title = strtoupper($row['TITLE']);
            $product_image = file_path('product_image') . $row['COVER_IMG'];
            
            $product_currency = $row['CURRENCY']['CODE'];
            $product_amount = currency_convert($row['PRICE'], $product_currency);
            $actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

            $product_link = 'product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

            $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount);

            if (in_array($product_index, $products)) {    
                $quantity = 1 ; 
                //Searching The Cart Quantity
                foreach ($cart_info as $cart_row){
                    if ($product_index == $cart_row['PRODUCT_ID']){
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

                if ($coupon_code !== FALSE){
                    $coupon_name = strtoupper($coupon_code['CODE']); 
                    $coupon_amount = intval($coupon_code['AMOUNT']); 
                    $coupon_type = $coupon_code['TYPE']; 

                    if ($coupon_code['VENDOR_CODE'] == $row['VENDOR']){
                        if ($coupon_type == "PERCENTAGE"){
                            $x = ($coupon_amount/100) * $true_total; 
                            $discount += $x; 
                        }else{
                            $coupon_amount = currency_convert($coupon_amount, $product_currency); 
                            if ($coupon_amount<$total){
                                $discount = $coupon_amount;
                            }
                        }
                    }
                }

                $info = str_ireplace(
                    ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]','[STOCK_QUANTITY]','[PRODUCT_TOTAL]'],
                    [$product_title, $price, $product_image, $product_link,$quantity, retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($base_total)],
                    $product_html_structure
                );

                $cart_build .= $info;
            }


        }
    }
}

$coupon_info = str_ireplace(['[NAME]','[AMOUNT]'],[$coupon_name,' - '.retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($discount)],$coupon_info); 

$total = ($total - $discount); 

$output = str_ireplace(['[CART_DATA]','[SUB_TOTAL]','[DEDUCTION]','[TOTAL]','[COUPON_CODE]','[COUPON_INFO]'],[$cart_build,retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($subtotal),' - '.retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($deductions),retrieve_currency_code("CURRENCY_SIGN")." ".string_to_currency($total),$coupon_name,$coupon_info],$html_structure); 

echo($output);