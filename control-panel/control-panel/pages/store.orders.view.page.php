<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Github Settings
        </div>

        <div class="main-blog anim" style="--delay: 0.1s; width: 100%; height: max-content; background-color: bisque; background: linear-gradient(181deg, #8e8e8f, transparent); margin: 1rem 0rem;">
            <div class="main-blog__author">
                <div class="author-img__wrapper">
                    <img class="author-img" src="favicon.png">
                </div>
                <div class="author-detail">
                    <div class="author-name" style="filter: blur(4px);">[USERNAME_PLACEHOLDER]</div>
                    <div class="author-info" style="filter: blur(1px);">https://github.com/varsitymarket-tech/control-panel/</div>
                </div>
            </div>

            <div class="main-blog__time">Github Control</div>
        </div>

    </div>
</div>

<?php 
#This is an Internal JS Function 

$page_id = hash("sha256","store-orders"); 
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