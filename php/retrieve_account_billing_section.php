<?php 
include_once "../function.php";

function read_billing($section){
    $x = retrieve_billing_details(); 

    if (isset($x[$section])){
        return $x[$section]; 
    }else{
        return FALSE; 
    }
}

function read_shipping($section){
    $x = retrieve_shipping_details(); 

    if (isset($x[$section])){
        return $x[$section]; 
    }else{
        return FALSE; 
    }
}


function load_page_one(){
    $billing = retrieve_billing_details(); 

    if ($billing !== FALSE){

    $info = '
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">

            <div class="p-b-45">
                <p class="cl5 txt-center">Account Profile</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Billing Details
                </h3>
            </div>

            <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form onsubmit="return false;">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input  id="edt_billing_fname" type="text" placeholder="First Name" value="'.read_billing('FIRST_NAME').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_lname" type="text" placeholder="Last Name" value="'.read_billing('LAST_NAME').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">More Info</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_company" type="text" placeholder="Company (Optional)" value="'.read_billing('COMPANY_NAME').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Contact Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_email" type="email" placeholder="Email" value="'.read_billing('EMAIL').'" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_phone" type="tel" placeholder="Phone" value="'.read_billing('PHONE_NUMBER').'" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <i class="how-pos4 pointer-none fa-solid fa-phone"></i>
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Location Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_address" type="text" placeholder="Address" value="'.read_billing('ADDRESS').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_zip" type="text" placeholder="ZIP/Postal Code" value="'.read_billing('ZIP').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_city" type="text" placeholder="City" value="'.read_billing('CITY').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_state" type="text" placeholder="State" value="'.read_billing('STATE').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input  id="edt_billing_country" type="text" placeholder="Country" value="'.read_billing('COUNTRY').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <button onclick="save_billing_details()" style="max-width:15rem; margin:2rem auto; display:block;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Save Billing Details
                    </button>
                </form>
            </div>

        </div>
    </section>';

    }else{
        $info = FALSE; 
    }
    return $info; 
}

function load_page_two(){
    $info = ""; 
    $shipping = retrieve_shipping_details(); 

    if ($shipping !== FALSE){
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
                            <input id="edt_shipping_fname" type="text" placeholder="First Name" value="'.read_shipping('FIRST_NAME').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_lname" type="text" placeholder="Last Name" value="'.read_shipping('LAST_NAME').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <p class="cl5 p-t-10 p-b-10">Location Details</p>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_street" type="text" placeholder="Street Address" value="'.read_shipping('STREET').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_zip" type="text" placeholder="ZIP/Postal Code" value="'.read_shipping('ZIP').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_city" type="text" placeholder="City" value="'.read_shipping('CITY').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input id="edt_shipping_state" type="text" placeholder="State" value="'.read_shipping('STATE').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input  id="edt_shipping_country" type="text" placeholder="Country" value="'.read_shipping('COUNTRY').'" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                        </div>

                        
                    <button onclick="save_shipping_details()" style="max-width:15rem; margin:2rem auto; display:block;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Save Shipping Details
                    </button>

                    </form>
                </div>

            </div>
        </section>';
    }

    return $info; 
}

$x = load_page_one().load_page_two();
echo($x); 

?>