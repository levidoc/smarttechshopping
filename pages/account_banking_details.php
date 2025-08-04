<?php

include_once "top.php";
echo (create_seo_signature('Account Details', '', 'SITE_OWNER', ''));

include_once "header.php"; ?>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Account Profile
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Banking Details
        </span>
    </div>
</div>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">Account Profile</p>
            <h3 class="ltext-106 cl5 txt-center">
                Banking Details
            </h3>
        </div>
        <div class="flex-w flex-tr">
            <div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <img src="images/digital-wallet.gif" style="width:100%;">
            </div>

            <div class="size-210  flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <p class="cl5 txt-center">For security reasons we dont store user credit card and debit card details. All payments are processed by third party systems, this allows us to not worry about storing banking details.</p>
            </div>
        </div>


    </div>
</section>

<?php include_once "footer.php"; ?>