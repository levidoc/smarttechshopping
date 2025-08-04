<?php

include_once "top.php";
echo (create_seo_signature('Track Your Order', '', 'SITE_OWNER', ''));

include_once "header.php"; ?>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">Track Progress of your order</p>
            <h3 class="ltext-106 cl5 txt-center">
                Track An Order
            </h3>
        </div>
        <div class="flex-w flex-tr">
            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <img src="images/new_idea.gif" style="width:100%;">
            </div>

            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <form onsubmit="return false;">
                    <div>
                        <p class="cl5 txt-center m-b-20">Order Number</p>
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent" style="max-width: 500px; margin:auto; display:block; width:auto; ">
                        <input id="edt-input-order-number" type="text" placeholder="#00000" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                    </div>
                    <br>
                    <button onclick="track_order()" style="max-width:15rem; display: block; margin:2rem auto;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Track Order
                    </button>
                </form>

            </div>
        </div>

        <div id="track-order-output-container"></div>


    </div>
</section>
<script>
    function track_order() {
        const data_input = document.getElementById('edt-input-order-number').value;
        const file_path = "php/retrieve_tracking_order_info.php";
        let track_container = document.getElementById('track-order-output-container'); 

        const formData = new FormData();
        formData.append('order-code', data_input);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var data = this.responseText;
                track_container.innerHTML = data; 
            }
        };
        xhr.send(formData);

    }
</script>

<?php include_once "footer.php"; ?>