<?php

include_once "top.php";
echo (create_seo_signature('Account Profile', '', 'SITE_OWNER', ''));

include_once "header.php"; ?>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Account Profile
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Home
        </span>
    </div>
</div>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">Customise Profile</p>
            <h3 class="ltext-106 cl5 txt-center">
                User Image
            </h3>
        </div>

        <?php
            $user = api_validate_account_code(LICENSE_KEY,account_code());
            if (isset($user['META_INFO'])){
                $username = ''.strtoupper($user['META_INFO']['USERNAME']);
                $email = strtolower($user['META_INFO']['EMAIL']);   
            }else{
                $username = '';  
                $email = ''; 
            }
        ?>

        <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form onsubmit="return false;">
                <div>
                    <img src="http://varsitymarket.store/assets/img/avatar/no_profile.gif" style="max-width: 400px; margin:auto; display:block; width:fit-content; ">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent" style="max-width: 500px; margin:auto; display:block; width:auto; ">
                    <input id="edt_billing_fname" type="text" placeholder="Username" value="<?php echo($username); ?>" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                </div>
                <br>
                <div class="bor8 m-b-20 how-pos4-parent" style="max-width: 500px; margin:auto; display:block; width:auto; ">
                    <input id="edt_billing_" type="text" placeholder="Email " value="<?php echo($email); ?>" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30">
                </div>
                <button onclick="change_user_profile()" style="max-width:15rem; display: block; margin:2rem auto;" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Save
                </button>
            </form>
        </div>

    </div>
</section>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">

        <div class="p-b-45">
            <p class="cl5 txt-center">Account Preference</p>
            <h3 class="ltext-106 cl5 txt-center">
                Change Password
            </h3>
        </div>

        <div class="p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form onsubmit="return false;">

                <div style="max-width: 500px; margin:auto; display:block; width:auto; ">
                    <p class="cl5 p-t-10 p-b-10">Old Password</p>
                    <div class="bor8 m-b-20 how-pos4-parent">

                        <input id="edtpassword" type="password" placeholder="***************" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <i class="how-pos4 fa-solid fa-eye" onclick="toggle_pass_section(`edtpassword`)"></i>
                    </div>
                </div>

                <div style="max-width: 500px; margin:auto; display:block; width:auto; ">
                    <p class="cl5 p-t-10 p-b-10">New Password</p>
                    <div class="bor8 m-b-20 how-pos4-parent">

                        <input id="edtpassword_connect" type="password" placeholder="***************" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30">
                        <i class="how-pos4 fa-solid fa-eye" onclick="toggle_pass_section(`edtpassword_connect`)"></i>
                    </div>
                </div>

                <button onclick="change_password()" style="max-width:15rem; margin:2rem auto; display:block; " class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Change Password
                </button>
            </form>
        </div>

    </div>
</section>

<script>
    function toggle_pass_section(id){
        let x = document.getElementById(id); 
        if (x.type == "text"){
            x.type = "password"; 
        }else{
            x.type = "text"; 
        }
    }

    function change_user_profile(){
        //Process Function Later

        error_dialog('Could Not Change Your Profile'); 
    }

    function validate_password(){
        var password_string = document.getElementById('edtpassword_connect').value; 

        const username_patterns = /^[a-zA-Z0-9_]{3,20}$/; 
        const password_patterns = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/; 
        var output = true; 

        if (validatePassword(password_string) == false){
            output = false; 
            error_dialog('Invalid Password. Must be at least 8 characters with at least one digit, one lowercase and one uppercase letter.');
        }


        return output; 

    }

    function change_password(){
        x = validate_password(); 
        if (x == true){
            var file_path = 'php/procedure_change_password.php';     
            var new_password = document.getElementById('edtpassword_connect').value;
            var old_password = document.getElementById('edtpassword').value;  

            const formData = new FormData();

            formData.append('new_password', new_password);
            formData.append('old_password', old_password);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', file_path, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    var data = this.responseText;
                    confirm_dialog(data);  
                }
            };
            xhr.send(formData);

        }
    }
</script>
<?php include_once "footer.php"; ?>