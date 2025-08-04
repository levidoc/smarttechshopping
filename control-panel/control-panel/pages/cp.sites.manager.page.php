<?php
#Testing With Dummy Data
$website_data = [
    'id' => '12345',
    'name' => 'My Website',
    'domain' => 'mywebsite.com',
    'date' => '2024-06-01 10:00:00',
    'active' => true,
    'state' => 'active',
    'application' => 'Web Application',
    'description' => 'This is a sample website description.',
    'template' => 'default',
    'owner' => 'John Doe',
    'ip' => '127.0.0.1',
];
?>

<div style="width:100%; max-width:100vw; height:100%; max-height:100vh; padding:20px; overflow-y: scroll;">
    <br>
    <div class="anim" style="--delay: 0s; text-align: center; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-between;">
        <div style="text-align: left;">
            <h1>Manage Site</h1><span>Home > <span onclick="window.location = '<?php echo change_page('websites') ?>'"> Website </span> > <?php echo ($website_data['name']); ?> </span>
        </div>
    </div>

    <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">

        <div class="video-wrapper"></div>
        <div style="padding:15px;">
            <div class="small-header anim" style="--delay: .3s; display: flex; justify-content: space-between;">
                <div>
                    Control Panel
                    <br>
                    <span style="font-size:1rem; "><?php echo ($website_data['application']); ?></span>
                </div>
                <button onclick="window.location = '<?php echo change_page('create-website') ?>'" style="height: fit-content;">Access Panel</button>
            </div>
            <br>
            <div>

            </div>
        </div>

    </div>

    <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">

        <div class="video-wrapper"></div>
        <div style="padding:15px;">
            <div class="small-header anim" style="--delay: .3s; display: flex; justify-content: space-between;">
                <div>
                    <span style="font-size:10px; ">The domain connected to this website</span><br>
                    Website Domain
                    <br>
                    <span style="font-size:1rem; "><?php echo ($website_data['domain']); ?></span><br>
                </div>
                <button onclick="window.location = '<?php echo change_page('create-website') ?>'" style="height: fit-content;">Reconfigure Domain</button>
            </div>
            <br>
            <div>

            </div>
        </div>

    </div>

    <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">

        <div class="video-wrapper"></div>
        <div style="padding:15px;">
            <div class="small-header anim" style="--delay: .3s; display: flex; justify-content: space-between;">
                <div>
                    <span style="font-size:10px; ">Scheduled Backup For Your Website</span><br>
                    Site Backups
                    <br>
                    <span style="font-size:1rem; ">Backup <?php echo ($website_data['domain']); ?></span><br>
                </div>
                <button onclick="window.location = '<?php echo change_page('create-website') ?>'" style="height: fit-content;">Reconfigure Domain</button>
            </div>
            <br>
            <div>

            </div>
        </div>

    </div>

    <!-- 

    <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
        <div class="video-wrapper"></div>
        <div class="video-name">
            <div class="small-header anim" style="--delay: .3s">
                <span style="font-size:10px; ">Create a new website in 5 mins</span><br>
                Register Website
            </div>



            <div style="background-image: url('http://127.0.0.1:8000/rescources/theme/oaklyn/undraw_warning_cyit.png'); height: 100%; position-area: center; height: auto; width: 100%; background-position: center; object-fit: cover; aspect-ratio: 10/10; background-size: contain; border-radius: 15px;">

            </div>
        </div>

    </div> 

    -->
</div>

<?php $page_id = "create-site"; ?>

<script>
    async function save_website() {
        // Validate The Website Data 
        const website_name = document.getElementById('edt_site_name').value;
        if (website_name == "") {
            error_feedback("Website Name Cannot Be Empty");
            return;
        }
        if (website_name.length < 3) {
            error_feedback("Website Name Must Be At Least 3 Characters Long");
            return;
        }

        const website_domain = document.getElementById('edt_page_title').value;
        if (website_domain == "") {
            error_feedback("Website Domain Cannot Be Empty");
            return;
        }
        if (!website_domain.includes('.')) {
            error_feedback("Invalid Website Domain");
            return;
        }
        if (website_domain.length < 5) {
            error_feedback("Website Domain Must Be At Least 5 Characters Long");
            return;
        }

        operate_loader();
        const data = new URLSearchParams();
        data.append("request", "<?php echo $page_id; ?>");
        data.append("website-name", website_name);
        data.append("website-domain", website_domain);

        const ServerData = await sendAndReceiveData(data, 'http://127.0.0.1:8000/executables/script.php');

        if (ServerData.trim() == "PROCEED") {
            // Redirect Page To Product List
            alert("Product Added Successfully");
            window.location.reload(true);
        } else if (ServerData.trim() == "ERROR") {
            error_feedback("An Error Occurred While Adding Your Website");
        } else {
            error_feedback(ServerData);
        }

        //alert(ServerData);
        operate_loader('close');
    }
</script>