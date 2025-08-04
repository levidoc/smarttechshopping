<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Domain Settings
        </div>

    </div>
</div>

<?php 
#This is an Internal JS Function 

$page_id = hash("sha256","domain-settings"); 
?>
<script>
    async function reload_page(page_id){
        operate_loader();
        const data = new URLSearchParams();
        data.append("page",page_id); 
        const receivedData = await sendAndReceiveData(data, application_endpoint);
        const application_canvas = document.getElementById('application_canvas'); 
        application_canvas.innerHTML = receivedData; 
        operate_loader('close');
    }

    async function change_domain(){
        const data = new URLSearchParams();
        let edt_domain = document.getElementById('edt_domain');
        data.append("domain",edt_domain.value);  
        data.append("action","reset");
        data.append("request", <?php _e("'".hash("sha256","advanced-github-reset-dns-records")."'");  ?>);
        operate_loader(); 
        let registration_confirmation = await sendAndReceiveData(data, process_endpoint); 
        console.log(registration_confirmation);
        try {
            // Decode The Variable 
            const arr_output = await JSON.parse(registration_confirmation); 
            if (arr_output.hasOwnProperty('error')){
                error_feedback(arr_output.error); 
                operate_loader('stop');
                return null; 
            }

            if (arr_output.hasOwnProperty('auth')){
                operate_loader('stop'); 
                showModal('Login Successful','You have successfully logged into your Wiseman.Blog account.'); 
            }

        } catch (error) {
            //console.error(error); 
            error_feedback(); 
            operate_loader('stop');
        }
        
    }

    //Custom Functions For Page     
    async function reset_records(){
        const data = new URLSearchParams();
        data.append("action","reset");
        data.append("request", <?php _e("'".hash("sha256","advanced-github-reset-dns-records")."'");  ?>);
        operate_loader(); 
        let registration_confirmation = await sendAndReceiveData(data, process_endpoint); 
        alert(registration_confirmation); 
        
        console.log(registration_confirmation);
        try {
            // Decode The Variable 
            const arr_output = await JSON.parse(registration_confirmation); 
            if (arr_output.hasOwnProperty('error')){
                error_feedback(arr_output.error); 
                operate_loader('stop');
                return null; 
            }

            if (arr_output.hasOwnProperty('auth')){
                operate_loader('stop'); 
                showModal('Login Successful','You have successfully logged into your Wiseman.Blog account.'); 
            }

        } catch (error) {
            //console.error(error); 
            error_feedback(); 
            operate_loader('stop');
        }
        
    }

    <?php echo "reload_page('{$page_id}')" ?>
</script>