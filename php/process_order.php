<?php 
include_once "../function.php";

$status_info = strtoupper(simple_decryption($_POST['status'])); 

$retrieve_data = read_session('CHECKOUT'); 
$vendor_code = read_session('VENDOR_CHECKOUT'); 
$order = json_decode($retrieve_data,true); 

$order_data = api_retrieve_order_details($vendor_code,$order['ORDER_NUM']); 

if ($order_data !== FALSE){

    $payment_build_info = ""; 
    $order_currency = $order_data['CURRENCY']; 
    $payment_build = $order_data['PAYMENT_BUILD']; 
    foreach ($payment_build as $description=>$amount){
        $payment_build_info .= '
        <tr>
            <td>'.$description.'</td>
            <td>'.retrieve_currency_code('CURRENCY_SIGN').' '.number_format(currency_convert($amount,$order_currency),2,'.',' ').'</td>
        </tr>'; 
    } 
    
    
    $product_build_info = ""; 
    $product_build = $order_data['PRODUCT_BUILD'];
    foreach($product_build as $row){
        $product_id = $row['INDEX']; 
        $product_name = $row['META_DATA'][0]['TITLE']; 
        $product_image = file_path('product_image').$row['META_DATA'][0]['COVER_IMG']; 
        $product_quantity = $row['QUANTITY'];
        $product_amount = currency_convert($row['AMOUNT'],$order_currency);  
        remove_cart($product_id); 
        $sum = $product_quantity * $product_amount; 

        $product_size = $row['SIZE']; 
        $product_color = $row['COLOR']; 
                $x = '
            <tr class="table-body-row">
                <td class="product-image"><a><img src="'.$product_image.'" alt="'.$product_name.'"></a></td>
                <td class="product-name">'.$product_name.'</td>
                <td class="product-price">'.retrieve_currency_code('CURRENCY_SIGN').' '.number_format(ceil($product_amount),2,'.',' ').'</td>
                <td class="product-quantity">x '.$product_quantity.'</td>
                <td class="product-total">'.retrieve_currency_code('CURRENCY_SIGN').'  '.number_format(ceil($sum),2,'.',' ').'</td>
            </tr>';
        $product_build_info .= $x; 
    }

    $html_structure = '
        
        <!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg" style="background-image: url(\'assets/img/wallpaper/img_2.jpg\');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>CROSS GEN</p>
                            <h1>Order: #'.$order['ORDER_NUM'].'</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->

        <!-- check out section -->
        <div class="checkout-section mt-150 mb-150">
            <div class="container">

                <div style="display: block;">
                    <div class="abt-text" style="text-align:center">
                        <p>Order Status</p>
                        <h2>Order '.$status_info.'</h2>
                        <p>Order: #'.$order['ORDER_NUM'].'</p>
                        <p><br></p>

                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="cart-table-wrap">
                                <table class="cart-table">
                                    <thead class="cart-table-head">
                                        <tr class="table-head-row">
                                            <th class="product-image">Product Image</th>
                                            <th class="product-name">Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        '.$product_build_info.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order-details-wrap">
                                <table class="order-details">
                                    <thead>
                                        <tr>
                                            <th>Your order Details</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout-details">
                                        '.$payment_build_info.'
                                        <tr>
                                            <td>Total</td>
                                            <td>'.retrieve_currency_code('CURRENCY_SIGN').number_format(ceil(currency_convert($order_data['AMOUNT'],$order_currency)),2,'.',' ').'</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        
    
    '; 

    $status_info = strtolower($status_info); 

    $payment_method = "YOCO Payment Gateway"; 
    $order_id = $order['ORDER_NUM']; 
    if ($status_info == "cancel"){
        $order_status = "cancelled"; 
    }else if ($status_info == "success"){
        $order_status = "completed"; 
    }else {
        $order_status = "failed"; 
    }

    $x = api_update_order($payment_method,$order_status,$order_id); 
    if ($x == "UPDATED"){
        clear_session(); 
    }

    echo($html_structure); 

}else{
    header('Location: /index.php'); 
    exit; 
}

?>