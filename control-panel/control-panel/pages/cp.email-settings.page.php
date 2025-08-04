<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">


        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
        </div>
        <div class="anim" style="--delay: 0s; text-align: center; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-between;">
            <div style="text-align: left;">
                <h1>Configure Email</h1>
            </div>
        </div>


        <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">

            <div class="video-wrapper"></div>
            <div style="padding:15px;">
                <div class="small-header anim" style="--delay: .3s">
                    <span style="font-size:10px; ">Connet To Your Email</span><br>
                    Configure Your Site Email Settings
                </div>

                <div>
                    <span style="font-size:10px; ">Username</span><br>
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo __EMAIL_USERNAME__; ?>" placeholder="Your Website Title" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <br>

                <div>
                    <span style="font-size:10px; ">Host</span><br>
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo __EMAIL_HOST__; ?>" placeholder="Your Website Title" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <br>

                <div>
                    <span style="font-size:10px; ">Email</span><br>
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo __EMAIL_ADDRESS__; ?>" placeholder="Your Website Title" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                    </div>
                </div> 
                <br>

                <div>
                    <span style="font-size:10px; ">Password</span><br>
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo __EMAIL_PASSWORD__; ?>" placeholder="Your Website Title" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <br>


                <div>
                    <span style="font-size:10px; ">Port</span><br>
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo __EMAIL_PORT__; ?>" placeholder="Your Website Domain" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <br>

                <br>
                <div style="display: flex; justify-content: space-between;">
                <button onclick="save_website()">
                    Test Configuration
                </button>
                <button onclick="save_website()">
                    Save Changes
                </button>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "advanced-github");
?>
<script>
    async function reload_page(page_id) {

        operate_loader();
        const data = new URLSearchParams();
        data.append("page", page_id);
        const receivedData = await sendAndReceiveData(data, application_endpoint);
        const application_canvas = document.getElementById('application_canvas');
        application_canvas.innerHTML = receivedData;
        operate_loader('close');
    }
</script>