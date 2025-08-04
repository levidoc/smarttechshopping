<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Category Section
        </div>
        <?php
        if ($internal_page == "add-category") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Add New Category to Site</span><br>
                            Add Category
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Adding categories will help users to easily find what they are looking for. 
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Category Title</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Catgory Name" type="text" id="edt_category_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Category Image</div>
                    <div class="video-name">
                        <img class="add_media_data" id="category-add-media" src="'.__PROTOCOL__ . __DOMAIN_NAME__ . '/@media/sharie_image"  style="max-width: 75vw; max-height: 75vh; object-fit: cover; border-radius: 8px; margin-bottom: 10px; margin: 10px auto; display: block; height: fit-content; width: fit-content;">
                    </div>
                    
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_category()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <a>
                            <img style="aspect-ratio:7/6; object-fit: cover; " src="'.__PROTOCOL__.__DOMAIN_NAME__.'/@media/[IMAGE]">
                        </a>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; font-size:20px; margin: 0px 0px 10px 0px;">
                                <span style="font-size:10px; "># Category</span><br>
                                [TITLE]
                            </div>
                        </div>
                    </div>
                </div>
            ';

            $faq_data = $db->query("SELECT * FROM `categories`");
            if (empty($faq_data)) {
            } else {
                $html = '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-category/'.'`">
                            Create New Category
                        </button>
                    </div>
                </div>
                <div>';
                foreach ($faq_data as $_data) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[IMAGE]'],
                        [$_data['id'], $_data['name'], $_data['image']],
                        $html_template
                    );
                }
                $html .= '</div>';
                echo $html;
            }
        }
        ?>
    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "new-website-page");
?>
<script>

    async function add_category(){
        operate_loader();
        const title = document.getElementById("edt_category_title").value;
        const image = document.getElementById("category-add-media").src;

        if (title.trim() === "" || image.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in fields before saving.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-category');
        data.append('title', title);
        data.append('image', image);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        alert(registration_confirmation); 
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function delete_faq(faq_id) {
        operate_loader();
    
        const data = new URLSearchParams();
        data.append('request', 'delete-faq');
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function add_faq() {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-faq');
        data.append('question', question);
        data.append('response', response);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function delete_faq(faq_id) {
        operate_loader();
    
        const data = new URLSearchParams();
        data.append('request', 'delete-faq');
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function edit_faq(faq_id) {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'update-faq');
        data.append('question', question);
        data.append('response', response);
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }
</script>