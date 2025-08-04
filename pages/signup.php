<?php
include_once "top.php";
echo (create_seo_signature('Sign Up', 'Create Your CROSS GEN Account', 'CROSS GEN', ''));

?>
<?php include_once "header.php" ?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/cover.jpg'); padding: 10rem 0rem; height: 10cm;">
    <h2 class="ltext-105 cl0 txt-center">
        Sign Up
    </h2>
</section>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">User Profile</p>
            <h3 class="ltext-106 cl5 txt-center">
                Create Account         
            </h3>
        </div>

        <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form onsubmit="return false;">
                <div class="bor8 m-b-20 how-pos4-parent">
                    <input id="edtemail_create" type="email" placeholder="Your Email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                    <input id="edtphone_create" type="tel" placeholder="Your Phone" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <i class="how-pos4 pointer-none fa-solid fa-phone"></i>
                </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                    <input  id="edtusername_create" type="text" placeholder="Your Username" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <i class="how-pos4 pointer-none fa-solid fa-user"></i>
                </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                    <input id="edtpassword_create" type="password" placeholder="*************" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <i class="how-pos4 pointer-none fa-solid fa-eye"></i>
                </div>


                <button onclick="create_account()" style="max-width:15rem; margin:auto; " class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Create Account
                </button>

                
                <p class="cl5 p-t-55"><a href="signin.php" class="cl5">Already Have An Account ?</a></p>
                
            </form>
        </div>

    </div>
</section>

<?php include_once "footer.php"; ?>