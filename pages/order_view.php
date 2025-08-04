<?php
include_once "function.php";

$id = get_url_data('order_id');

$vendor_code = TRUE; 
$order = decrypt_url($id); 

$order_data = api_retrieve_order_details($vendor_code,$order); 

if (isset($order_data)){

    $payment_build_info = ""; 
    $order_currency = $order_data['CURRENCY']; 
    $payment_build = $order_data['PAYMENT_BUILD']; 
    foreach ($payment_build as $description=>$amount){
        $payment_build_info .= '
        <div class="flex-w flex-t bor12 p-b-13" style="align-items: center">
            <div class="size-208">
                <span class="stext-110 cl2">
                    '.$description.'
                </span>
            </div>

            <div class="size-209" style="text-align: end; padding: 1rem;">
                <span class="mtext-110 cl2">
                '.retrieve_currency_code('CURRENCY_SIGN').' '.number_format(currency_convert($amount,$order_currency),2,'.',' ').'
                </span>
            </div>
        </div>'; 
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
            <tr class="table_row">
                <td class="column-1">
                    <div class="how-itemcart1">
                        <img src="'.$product_image.'" alt="'.$product_name.'">
                    </div>
                </td>
                <td class="column-2">'.$product_name.'</td>
                <td class="column-3">'.retrieve_currency_code('CURRENCY_SIGN').' '.number_format(ceil($product_amount),2,'.',' ').'</td>
                <td class="column-4">x '.$product_quantity.'</td>
                <td class="column-5">'.retrieve_currency_code('CURRENCY_SIGN').'  '.number_format(ceil($sum),2,'.',' ').'</td>
            </tr>';
        $product_build_info .= $x; 
    }

    $status_info = $order_data['STATUS']; 

    $html_structure = '
        <section class="bg0 p-t-104 p-b-116">
            <div class="p-b-45">
                <p class="cl5 txt-center">Order '.ucwords(strtolower($status_info)).'</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Order #'.$order.'
                </h3>
            </div>

            <form>
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

                                            '.$product_build_info.'

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

                                '.$payment_build_info.'

                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
                                        <span class="mtext-101 cl2">
                                            Total:
                                        </span>
                                    </div>

                                    <div class="size-209 p-t-1" style="text-align: end; padding: 1rem;">
                                        <span class="mtext-110 cl2">
                                        '.retrieve_currency_code('CURRENCY_SIGN').number_format(ceil(currency_convert($order_data['AMOUNT'],$order_currency)),2,'.',' ').'
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    '; 
    
}


include_once "top.php";
echo (create_seo_signature('Cart', false, 'CROSS GEN', ''));

?>
<?php include_once "header.php" ?>
<?php echo($html_structure); ?>
<?php include_once "footer.php" ?>