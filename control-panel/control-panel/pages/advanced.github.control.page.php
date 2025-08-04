<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Github Settings
        </div>

    </div>
</div>

<?php 
#This is an Internal JS Function 

$page_id = hash("sha256","advanced-github"); 
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

    <?php echo "reload_page('{$page_id}')" ?>
</script>