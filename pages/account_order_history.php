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
            Order History
        </span>
    </div>
</div>

<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">Account Profile</p>
            <h3 class="ltext-106 cl5 txt-center">
                My Orders
            </h3>
        </div>
        <div class="row" id="history_container">
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

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function retrieve_order_history(){
        const container = document.getElementById('history_container');
        file_path = "php/retrieve_user_order_history.php";
        const formData = new FormData();
        formData.append('index', 'featured');
        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function () {
            if (this.status === 200) {
                var data = this.responseText;
                container.innerHTML = data;
            }
        };
        xhr.send(formData);

    }

    retrieve_order_history(); 
</script>
<?php include_once "footer.php"; ?>