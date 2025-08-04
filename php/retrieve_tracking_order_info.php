<?php 
include_once "../function.php";

$order_code = $_POST['order-code']; 
$user_code = account_code();

$x = api_retrieve_track_order($user_code,$order_code); 

if (!isset($x['COURIER']['NAME'])){
    exit('NO COURIER INFO'); 
}

$courier_services = $x['COURIER']['NAME']; 
$shipping_description = nl2br($x['COURIER']['DESCIPTION']); 
$courier_link = $x['COURIER']['LINK']; 
$courier_code = $x['COURIER']['CODE']; 
$courier_status = $x['COURIER']['STATUS']; 

$delivery = $x['DELIVERY']; 

$data = '
<div>
    <h3 class="ltext-106 cl5">Shipping Details </h3>
    <p style="padding: 1rem 2rem 5rem 2rem;">'.$shipping_description.'</p>
    <h3 class="ltext-106 cl5"><i class="fa-solid fa-truck-fast"></i> Courier Details </h3>
    <div style="padding: 1rem 2rem 5rem 2rem">
    <p>Courier Service: '.$courier_services.'</p>
    <p>Courier Code: '.$courier_services.'</p>
    <p>Courier Link: '.$courier_services.'</p>
    </div>
    <h3 class="ltext-106 cl5"> Delivery Details </h3>
    <div style="padding:1rem 2rem 5rem 2rem">
    <p>User: '.$delivery['fNAME'].' '.$delivery['lNAME'].'</p>
    <p><i class="fa-solid fa-location-dot"></i> Location : '.$delivery['STREET'].', '.$delivery['CITY'].', '.$delivery['STATE'].', '.$delivery['ZIP'].', '.$delivery['COUNTRY'].'</p>
    </div>
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 3rem 1rem;">
        <a href="order_view.php?order_id='.encrypt_url($order_code).'">
            <button style="max-width:15rem;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                View Order
            </button>
        </a>

        <a href="order_view.php?order_id='.encrypt_url($user_code).'">
            <button style="max-width:15rem;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Report Order
            </button>
        </a>
    </div>
</div>'; 

/*
"ORDER": {
      "Date": "2024-09-07 13:18:34",
      "STATUS": "completed",
      "PAYMENT_METHOD": "NONE"
    },
    "BILLING": {
      "fNAME": "Austin",
      "lNAME": "Mazibeli",
      "COUNTRY": "South Africa",
      "CITY": "Polokwane",
      "STATE": "Limpopo",
      "ADDRESS": "12 Deo Manor",
      "ZIP": "0699"
    }
*/
echo($data); 
?>