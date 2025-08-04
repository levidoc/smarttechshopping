<?php 
include_once "../function.php";

$user_code = account_code(); 
$order_data = (api_retrieve_order_history($user_code)); 
$data = ''; 
foreach ($order_data as $row){
    $order_id = $row['ORDER_ID']; 
    $vendor = $row['STORE_ID']; 
    $status = $row['STATUS']; 
    $date = $row['DATE']; 
    $order_amount = $row['AMOUNT'];
    $order_currency = $row['CURRENCY'];
    
    $store_name = retrieve_vendor_data($vendor,"NAME"); 
    
    $amount = retrieve_currency_code('CURRENCY_SIGN').number_format(ceil(currency_convert($order_amount,$order_currency)),2,'.',' '); 

    $data .= '
    <tr style="height:5rem;">
        <td class="column-1">
            <a style="color:black;" href="order_view.php?order_id='.encrypt_url($order_id).'">
                <p>#'.$order_id.'</p>
                <small><i class="fa-solid fa-shop"></i> '.$store_name.'</small>
            </a>
        </td>
        <td class="column-2">'.$amount.'</td>
        <td class="column-3">'.$status.'</td>
        <td class="column-4 p-r-30">'.$date.'</td>
    </tr>
    '; 
}

$html_structure = '
            <div style="max-width:60rem; width:100%;" class="m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Reference</th>
                                    <th class="column-2">Amount</th>
                                    <th class="column-3">Status</th>
                                    <th class="column-4 p-r-30">Date</th>
                                </tr>
                                '.$data.'
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
';

echo($html_structure); 

?>