<?php
include_once "function.php";

include_once "top.php";
echo (create_seo_signature('Cart', false, '', ''));

?>
<?php include_once "header.php" ?>

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Checkout
        </span>
    </div>
</div>

<div id="checkout_container"></div>

<script>
    function process_order_request(vendor_code) {
        const file_path = "php/create_order.php";
        const formData = new FormData();
        formData.append('order_note', null);
        formData.append('vendor', vendor_code);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var data = this.responseText;
                retrieve_checkout_components(data);
            };
        }

        xhr.send(formData);
    }

    function retrieve_checkout_components(section = "FIRST") {
        const file_path = "php/get_checkout_activity.php";
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
                    retrieve_checkout_components(data);
                }
            };
        }

        xhr.send(formData);

    }

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
                    retrieve_checkout_components(data);
                }
            };
        }

        xhr.send(formData);

    }

    retrieve_checkout_components();
</script>

<?php include_once "footer.php" ?>