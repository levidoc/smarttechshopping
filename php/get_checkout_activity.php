<?php
include_once "../plugin/yoco_payment_gateway.php";
include_once "../function.php";

function read_billing($section)
{
    $x = retrieve_billing_details();

    if (isset($x[$section])) {
        return $x[$section];
    } else {
        return FALSE;
    }
}

function read_shipping($section){
    $x = retrieve_shipping_details();

    if (isset($x[$section])) {
        return $x[$section];
    } else {
        return FALSE;
    }

}
function load_page_one()
{
    $billing = retrieve_billing_details();

    if ($billing !== FALSE) {

        $info = '
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">

            <div class="p-b-45">
                <p class="cl5 txt-center">Checkout Process</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Billing Details
                </h3>
            </div>

            <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form onsubmit="return false;">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input  id="edt_billing_fname" type="text" placeholder="First Name" value="' . read_billing('FIRST_NAME') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_lname" type="text" placeholder="Last Name" value="' . read_billing('LAST_NAME') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">More Info</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_company" type="text" placeholder="Company (Optional)" value="' . read_billing('COMPANY_NAME') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Contact Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_email" type="email" placeholder="Email" value="' . read_billing('EMAIL') . '" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_phone" type="tel" placeholder="Phone" value="' . read_billing('PHONE_NUMBER') . '" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <i class="how-pos4 pointer-none fa-solid fa-phone"></i>
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Location Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_address" type="text" placeholder="Address" value="' . read_billing('ADDRESS') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_zip" type="text" placeholder="ZIP/Postal Code" value="' . read_billing('ZIP') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_city" type="text" placeholder="City" value="' . read_billing('CITY') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_state" type="text" placeholder="State" value="' . read_billing('STATE') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input  id="edt_billing_country" type="text" placeholder="Country" value="' . read_billing('COUNTRY') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <button onclick="save_billing_details()" style="max-width:15rem;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Next
                    </button>
                </form>
            </div>

        </div>
    </section>';
    } else {
        $info = FALSE;
    }
    return $info;
}

function load_page_two()
{
    $info = "";
    $shipping = retrieve_shipping_details();

    if ($shipping !== FALSE) {
        $info = '
                
        <section class="bg0 p-t-104 p-b-116">
            <div class="container">

                <div class="p-b-45">
                    <p class="cl5 txt-center">Checkout Process</p>
                    <h3 class="ltext-106 cl5 txt-center">
                        Shipping Details
                    </h3>
                </div>

                <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form onsubmit="return false;">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_fname" type="text" placeholder="First Name" value="' . read_shipping('FIRST_NAME') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_lname" type="text" placeholder="Last Name" value="' . read_shipping('LAST_NAME') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <p class="cl5 p-t-10 p-b-10">Location Details</p>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_street" type="text" placeholder="Street Address" value="' . read_shipping('STREET') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_zip" type="text" placeholder="ZIP/Postal Code" value="' . read_shipping('ZIP') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_city" type="text" placeholder="City" value="' . read_shipping('CITY') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_state" type="text" placeholder="State" value="' . read_shipping('STATE') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input  id="edt_shipping_country" type="text" placeholder="Country" value="' . read_shipping('COUNTRY') . '" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div style="display: flex; justify-content: space-between;">
                            <button onclick="retrieve_checkout_components()" style="max-width:10rem;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                Prev
                            </button>

                            <button onclick="save_shipping_details()" style="max-width:10rem;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                Next
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>';
    }

    return $info;
}

function load_page_three()
{

    $shipping_data = retrieve_shipping_details();
    $billing_data = retrieve_billing_details();

    $info = '
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">

            <div class="p-b-45">
                <p class="cl5 txt-center">Checkout Process</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Confirm Order
                </h3>
            </div>

            <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <div style="display: flex; align-items: center; justify-content: space-between; margin:1rem 0px;">
                    <div style="padding:5px;">
                        <p><strong><i class="fas fa-shipping-fast"></i> Shipping Details: </strong><br><small>' . $shipping_data['FIRST_NAME'] . ' ' . $shipping_data['LAST_NAME'] . '<br>' . $shipping_data['STREET'] . ',' . $shipping_data['ZIP'] . ', ' . $shipping_data['CITY'] . ',' . $shipping_data['STATE'] . ', ' . $shipping_data['COUNTRY'] . '</small></p>
                    </div>
                    <div style="padding:5px;">
                        <p><strong><i class="fas fa-file-invoice"></i> Billing Details: </strong><br><small>' . $billing_data['FIRST_NAME'] . ' ' . $billing_data['LAST_NAME'] . '<br>' . $billing_data['ADDRESS'] . ',' . $billing_data['ZIP'] . ', ' . $billing_data['CITY'] . ',' . $billing_data['STATE'] . ', ' . $billing_data['COUNTRY'] . '</small></p>
                    </div>
                </div>

                <form onsubmit="return false;">
                    <h4 class="mtext-105 cl2 p-b-30">
                        Order Note
                    </h4>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Say Something"></textarea>
                    </div>

                </form>

            </div>
            <section class="p-b-116">
                <div class="p-b-45">
                    <p class="cl5 txt-center">Select The Store You Want To Checkout From</p>
                    <h3 class="ltext-106 cl5 txt-center">
                        Multi-Store Order
                    </h3>
                </div>

                <p class="cl5"><i class="fas fa-shipping-fast"></i> Stores Supporting Shipping </p>

                <div style="max-width: 80rem; width:100%; display: block; margin: auto;">

                [SUPPORTING_STORES_]

                   
                </div>

                <p class="cl5 p-t-45"><i class="fas fa-ban"></i> No Shipping Available </p>

                <div style="max-width: 80rem; width:100%; display: block; margin: auto;">

                [NO_SUPPORTING_STORES]

                </div>

            </section>

        </div>
    </section>';

    $no_supporting_stores = "";
    $supporting_stores = "";

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

        $vendor = array();
        $product_file = get_parent_directory() . '/DATA_SETS/product_pack.json';
        if (file_exists($product_file)) {

            $json_data = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);

            foreach ($json_data as $row) {
                $product_vendor = $row['VENDOR'];
                $product_index = $row['INDEX'];

                if ((in_array($product_index, $products)) && (!in_array($product_vendor, $vendor))) {
                    $vendor[] = $product_vendor;
                }
            }
        }


        $available_vendor = [];
        foreach ($vendor as $row) {
            $zone = retrieve_delivery_data($row);

            if ($zone !== FALSE) {
                foreach ($zone as $secion) {
                    if ((strtoupper($secion['REGION']) == strtoupper($shipping_data['COUNTRY'])) && (strtoupper($secion['STATE']) == strtoupper($shipping_data['STATE']))) {
                        $available_vendor[] = $row;
                        break;
                    } else if ((strtoupper($secion['REGION']) == "GLOBAL") && (strtoupper($secion['STATE']) == "GLOBAL")) {
                        $available_vendor[] = $row;
                        break;
                    }
                }
            }
        }

        $unavailable_vendors = array_diff($vendor, $available_vendor);


        $file_path = '../DATA_SETS/vendor_pack.json';
        if (file_exists($file_path)) {
            $json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

            foreach ($json_data as $row) {
                $store_name = $row['NAME'];
                $store_icon = $row['ICON'];

                if (empty($row['ICON'])) {
                    $store_icon = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/No_photo_%282067963%29_-_The_Noun_Project.svg/800px-No_photo_%282067963%29_-_The_Noun_Project.svg.png';
                } else {
                    $store_icon = file_path('vendor_wallpaper') . $row['ICON'];
                }

                if (in_array($row['CODE'], $available_vendor)) {
                    $supporting_stores .= '
                    <div style="padding: 5px 10px;">
                        <div onclick="process_order_request(`' . $row['CODE'] . '`)" class="bor7" style="display: flex; justify-content: space-between; padding:10px 20px; font-size: 1.4rem; font-weight: 700;">
                            <div style="display: flex; align-items: center;">
                                <img style="max-width: 2rem; margin: 0px 10px;" src="' . $store_icon . '">
                                <p>' . $store_name . '</p>
                            </div>
                            <p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </p>
                        </div>

                    </div>';
                } else if (in_array($row['CODE'], $unavailable_vendors)) {
                    $no_supporting_stores .= '
                    <div style="padding: 5px 10px;">
                        <div onclick="error_dialog(\'Unfortunately ' . $store_name . ' Does Not Provide Shipping To Your Region.\')" class="bor7" style="display: flex; justify-content: space-between; padding:10px 20px; font-size: 1.4rem; font-weight: 700;">
                            <div style="display: flex; align-items: center;">
                                <img style="max-width: 2rem; margin: 0px 10px;" src="' . $store_icon . '">
                                <p>' . $store_name . '</p>
                            </div>
                            
                        </div>

                    </div>';
                }
            }
        }
    }

    $info = str_ireplace(['[SUPPORTING_STORES_]', '[NO_SUPPORTING_STORES]'], [$supporting_stores, $no_supporting_stores], $info);
    return $info;
}

function load_page_four()
{
    $retrieve_data = read_session('CHECKOUT');
    $vendor_code = read_session('VENDOR_CHECKOUT');

    $file_path = '../DATA_SETS/vendor_pack.json';
    if (file_exists($file_path)) {
        $json_data = json_decode(file_get_contents($file_path), JSON_PRETTY_PRINT);

        foreach ($json_data as $row) {
            $store_name = $row['NAME'];
            $store_icon = $row['LOGO'];

            if (empty($row['LOGO'])) {
                $store_icon = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/No_photo_%282067963%29_-_The_Noun_Project.svg/800px-No_photo_%282067963%29_-_The_Noun_Project.svg.png';
            } else {
                $store_icon = file_path('vendor_wallpaper') . $row['LOGO'];
            }
        }
    }

    $order = json_decode($retrieve_data, true);

    $order_data = api_retrieve_order_details($vendor_code, $order['ORDER_NUM']);

    if ($order_data !== FALSE) {

        $payment_build_info = "";
        $order_currency = $order_data['CURRENCY'];
        $payment_build = $order_data['PAYMENT_BUILD'];
        foreach ($payment_build as $description => $amount) {
            $payment_build_info .= '
            <div class="flex-w flex-t bor12 p-b-13" style="align-items: center">
                <div class="size-208">
                    <span class="stext-110 cl2">
                    ' . $description . '
                    </span>
                </div>

                <div class="size-209" style="text-align: end; padding: 1rem;">
                    <span class="mtext-110 cl2">
                    ' . retrieve_currency_code('CURRENCY_SIGN') . ' ' . number_format(currency_convert($amount, $order_currency), 2, '.', ' ') . '
                    </span>
                </div>
            </div>';
        }


        $product_build_info = "";
        $product_build = $order_data['PRODUCT_BUILD'];
        foreach ($product_build as $row) {
            $product_name = $row['META_DATA'][0]['TITLE'];
            $product_image = file_path('product_image') . $row['META_DATA'][0]['COVER_IMG'];
            $product_quantity =  $row['QUANTITY'];
            $product_amount = currency_convert($row['AMOUNT'], $order_currency);

            $sum = $product_quantity * $product_amount;

            $product_size = $row['SIZE'];
            $product_color = $row['COLOR'];
            $x = '
                    
                    <tr class="table_row">
                        <td class="column-1">
                            <div class="how-itemcart1">
                                <img src="' . $product_image . '" alt="' . $product_name . '">
                            </div>
                        </td>
                        <td class="column-2">' . $product_name . '</td>
                        <td class="column-3">' . retrieve_currency_code('CURRENCY_SIGN') . ' ' . number_format(ceil($product_amount), '2', '.', ' ') . '</td>
                        <td class="column-4">x ' . $product_quantity . '</td>
                        <td class="column-5">' . retrieve_currency_code('CURRENCY_SIGN') . '  ' . number_format(ceil($sum), '2', '.', ' ') . '</td>
                    </tr>';

            $product_build_info .= $x;
        }

        $html_structure = '
        
        <section class="bg0 p-t-104 p-b-116">
            <div class="p-b-45">
                <p class="cl5 txt-center">Checkout Process</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Payment Section
                </h3>

                <div style="margin:10rem 0rem 4rem 0rem; ">
                    <img style="max-width:5rem; margin:auto; display:block; " src="' . $store_icon . '">
                    <p style="text-align:center;">Store : ' . $store_name . '</p>
                </div>

            </div>

            <form onsubmit="return false;">
                <div class="container">
                    <div class="row" id="cart_container">


                        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                            <div class="m-l-25 m-r--38 m-lr-0-xl">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tbody>
                                            <tr class="table_head">
                                                <th class="column-1">Product</th>
                                                <th class="column-2"></th>
                                                <th class="column-3">Price</th>
                                                <th class="column-4">Quantity</th>
                                                <th class="column-5">Total</th>
                                            </tr>
                                            ' . $product_build_info . '

                                        </tbody>
                                    </table>
                                </div>

                                
                            </div>
                        </div>

                        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                                <h4 class="mtext-109 cl2 p-b-30">
                                    Order Totals
                                </h4>

                                ' . $payment_build_info . '

                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
                                        <span class="mtext-101 cl2">
                                            Total:
                                        </span>
                                    </div>

                                    <div class="size-209 p-t-1" style="text-align: end; padding: 1rem;">
                                        <span class="mtext-110 cl2">
                                            ' . retrieve_currency_code('CURRENCY_SIGN') . number_format(ceil(currency_convert($order_data['AMOUNT'], $order_currency)), 2, '.', ' ') . '
                                        </span>
                                    </div>
                                </div>
                                <a target="_self" href="[PAYMENT_LINK]" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                    Pay Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>';

        $amount = ceil(currency_convert($order_data['AMOUNT'], $order_currency)) * 100;
        $totalTaxAmount = 0;
        if (isset($order_data['PAYMENT_BUILD']['Store Sales'])) {
            $totalDiscount = ceil(currency_convert($order_data['PAYMENT_BUILD']['Store Sales'], $order_currency)) * 100;
        } else {
            $totalDiscount = ceil(currency_convert(0.00, $order_currency)) * 100;
        }

        $currency = 'ZAR';
        $secretKey = 'sk_test_960bfde0VBrLlpK098e4ffeb53e1';
        $subtotalAmount = ceil(currency_convert($order_data['PAYMENT_BUILD']['Product Total'], $order_currency)) * 100;
        $cancel_link = 'order_process.php?status=' . simple_encryption('cancel');
        $success_link = 'order_process.php?status=' . simple_encryption('success');
        $failure_url = 'order_process.php?status=' . simple_encryption('failed');

        $payment = createPaymentCheckout($amount, $subtotalAmount, $totalTaxAmount, $totalDiscount, $currency, $secretKey, $cancel_link, $success_link, $failure_url);

        $payment = json_decode($payment, TRUE);

        $payment_link = $payment['redirectUrl'];

        $html_structure = str_ireplace('[PAYMENT_LINK]', $payment_link, $html_structure);

        return $html_structure;
    }
}

function return_signup_default()
{
    $output = '
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">

            <div class="p-b-45">
                <p class="cl5 txt-center">Please Sign In </p>
                <h3 class="ltext-106 cl5 txt-center">
                    Checkout Process
                </h3>
            </div>
            <div class="flex-w flex-tr">
                <div class="size-210 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <img src="images/online-purchase.gif" style="width:100%;">
                </div>

                <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <h3 class="ltext-106 cl5 txt-center">
                        
                    </h3>
                    <br>
                    <p class="cl5">To complete your checkout, please log in to your account. Our policies do not allow us to enable ghost/invincible checkout.</p>
                    <br>
                    <a href="signin.php" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                        Sign In 
                    </a>            
                </div>
            </div>


        </div>
    </section>';

    return $output;
}


$user = api_validate_account_code(LICENSE_KEY,account_code());
if (isset($user['META_INFO'])){
    
    $section = $_POST['section']; 

    if ($section == "FIRST"){
        print(load_page_one()); 
        //Bring The First Page 
    }else if (simple_decryption($section) == "SECOND"){
        print(load_page_two()); 
    }else if (simple_decryption($section) == "THIRD"){
        print(load_page_three()); 
    }else if (simple_decryption($section) == "LAST"){
        print(load_page_four()); 
    }

}else{
    print(return_signup_default()); 
}
?>