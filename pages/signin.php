<?php
include_once "top.php";
echo (create_seo_signature('Sign Up', 'Create Your Cross Gen Account', 'CROSS GEN', ''));

?>
<?php include_once "header.php" ?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/cover.jpg'); padding: 10rem 0rem; height: 10cm;">
    <h2 class="ltext-105 cl0 txt-center">
        Sign In
    </h2>
</section>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">User Profile</p>
            <h3 class="ltext-106 cl5 txt-center">
                Connect Account         
            </h3>
        </div>

        <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form onsubmit="return false;">
                <div class="bor8 m-b-20 how-pos4-parent">
                    <input  id="edtusername_connect" type="text" placeholder="Your Username" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <i class="how-pos4 pointer-none fa-solid fa-user"></i>
                </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                    <input id="edtpassword_connect" type="password" placeholder="*************" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                    <i onclick="toggle_pass_type()" class="how-pos4 fa-solid fa-eye"></i>
                </div>

                <button onclick="connect_account()" style="max-width:15rem; margin:auto; " class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Connect Account
                </button>

                
                <p class="cl5 p-t-55"><a href="signup.php" class="cl5">Dont Have An Account ?</a></p>
                <p onclick="error_dialog('Section Under Construction')" class="cl5 p-t-30">Forgot Your Password ?</p>
            </form>
        </div>

    </div>
</section>

<script>

    function toggle_pass_type(){
        x = document.getElementById('edtpassword_connect'); 
        if (x.type == "text"){
            x.type = "password"; 
        }else{
            x.type = "text"; 
        }
    }
</script>
<?php include_once "footer.php"; ?>