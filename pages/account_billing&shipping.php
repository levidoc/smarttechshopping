<?php

include_once "top.php";
echo (create_seo_signature('Billing And Shipping', '', 'SITE_OWNER', ''));

include_once "header.php"; ?>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Account Profile
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Billing & Shipping
        </span>
    </div>
</div>

<div id="checkout_container">
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
                        <input id="edt_billing_fname" type="text" placeholder="First Name"  class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_lname" type="text" placeholder="Last Name" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">More Info</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_company" type="text" placeholder="Company (Optional)" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Contact Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_email" type="email" placeholder="Email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_phone" type="tel" placeholder="Phone" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <i class="how-pos4 pointer-none fa-solid fa-phone"></i>
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Location Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_address" type="text" placeholder="Address" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_zip" type="text" placeholder="ZIP/Postal Code" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_city" type="text" placeholder="City" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_state" type="text" placeholder="State" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_billing_country" type="text" placeholder="Country" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>
                </form>
            </div>

        </div>
    </section>

    <section class="bg0 p-t-104 p-b-116">
        <div class="container">

            <div class="p-b-45">
                <p class="cl5 txt-center">Account Profile</p>
                <h3 class="ltext-106 cl5 txt-center">
                    Shipping Details
                </h3>
            </div>

            <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form onsubmit="return false;">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_fname" type="text" placeholder="First Name" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_lname" type="text" placeholder="Last Name" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <p class="cl5 p-t-10 p-b-10">Location Details</p>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_street" type="text" placeholder="Street Address" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_zip" type="text" placeholder="ZIP/Postal Code" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_city" type="text" placeholder="City" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_state" type="text" placeholder="State" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="edt_shipping_country" type="text" placeholder="Country" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">

                    </div>

                </form>
            </div>

        </div>
    </section>
</div>

<script>
    function save_billing_details() {
        const file_path = "php/save_billing_data.php";

        const fname = document.getElementById('edt_billing_fname').value;
        const lname = document.getElementById('edt_billing_lname').value;
        const scompany = document.getElementById('edt_billing_company').value;
        const semail = document.getElementById('edt_billing_email').value;
        const sphone = document.getElementById('edt_billing_phone').value;
        const saddress = document.getElementById('edt_billing_address').value;
        const szip = document.getElementById('edt_billing_zip').value;
        const scity = document.getElementById('edt_billing_city').value;
        const sstate = document.getElementById('edt_billing_state').value;
        const scountry = document.getElementById('edt_billing_country').value;

        if ((validate_input(fname) == false) || (validate_input(lname) == false) || (validate_input(saddress) == false) || (validate_input(semail) == false) || (validate_input(sphone) == false) || (validate_input(scountry) == false) || (validate_input(sstate) == false) || (validate_input(scity) == false) || (validate_input(szip) == false)) {
            error_dialog('Insert All Details');
            return null;
        }

        const formData = new FormData();
        formData.append('fname', fname);
        formData.append('lname', lname);
        formData.append('company', scompany);
        formData.append('phone', sphone);
        formData.append('email', semail);
        formData.append('address', saddress);
        formData.append('city', scity);
        formData.append('state', sstate);
        formData.append('zip', szip);
        formData.append('country', scountry);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var data = this.responseText;

                if (data.trim() == "ERROR") {
                    error_dialog('Could Not Process Request');
                } else {
                    confirm_dialog('Billing Details Saved');
                }
            };
        }

        xhr.send(formData);

    }

    function retrieve_checkout_components(section = "FIRST") {
        const file_path = "php/retrieve_account_billing_section.php";
        let container = document.getElementById('checkout_container');
        const formData = new FormData();

        formData.append('section', section);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var data = this.responseText;
                container.innerHTML = data;
            };
        }

        xhr.send(formData);

    }

    function validate_input(input) {
        if (input.value === 0) {
            return false;
        }

        if (input.value < 1) {
            return false;
        }

        return true;
    }

    function save_shipping_details() {
        const file_path = "php/save_shipping_data.php";

        const fname = document.getElementById('edt_shipping_fname').value;
        const lname = document.getElementById('edt_shipping_lname').value;
        const saddress = document.getElementById('edt_shipping_street').value;
        const szip = document.getElementById('edt_shipping_zip').value;
        const scity = document.getElementById('edt_shipping_city').value;
        const sstate = document.getElementById('edt_shipping_state').value;
        const scountry = document.getElementById('edt_shipping_country').value;

        if ((validate_input(fname) == false) || (validate_input(lname) == false) || (validate_input(saddress) == false) || (validate_input(scountry) == false) || (validate_input(sstate) == false) || (validate_input(scity) == false) || (validate_input(szip) == false)) {
            error_dialog('Insert All Details');
            return null;
        }

        const formData = new FormData();
        formData.append('fname', fname);
        formData.append('lname', lname);
        formData.append('address', saddress);
        formData.append('city', scity);
        formData.append('state', sstate);
        formData.append('zip', szip);
        formData.append('country', scountry);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var data = this.responseText;

                if (data.trim() == "ERROR") {
                    error_dialog('Could Not Process Request');
                } else {
                    confirm_dialog('Processing Data');
                }
            };
        }

        xhr.send(formData);

    }

    retrieve_checkout_components();
</script>
<?php include_once "footer.php"; ?>