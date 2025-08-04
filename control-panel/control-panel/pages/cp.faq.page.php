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
            FAQ Section
        </div>

        <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
            <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                <button onclick="window.location=`<?php echo __PAGE__ . map_page()[2] . '/add-faq/'; ?> `">
                    Create New FAQ
                </button>
            </div>
        </div>
        <?php
        if ($internal_page == "add-faq") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Add New FAQ to Site</span><br>
                            New Frequently Asked Question
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Add a new FAQ to your website. This will help users find answers to common questions.
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Question</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="FAQ Question" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Response</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your FAQ Response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_faq()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else if ($internal_page == "edit-faq") {
            $faq_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM faq WHERE id = {$faq_id}";
            $faq_data = $db->query($sql);
            if (empty($faq_data)) {
                echo "<div class='error'>FAQ not found.</div>";
                exit();
            }
            $faq_data = $faq_data[0];

            $html = '
            <div id="section_faq" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Edit FAQ</span><br>
                            Edit Frequently Asked Question
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Managing your FAQ will help users find answers to common questions.
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Date Upload: ' . date('Y-m-d', strtotime($faq_data['created_at'])) . '</div>
                    <br>

                    <div class="video-view" style="padding: 10px 20px 0px;">Question</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="' . $faq_data['question'] . '" placeholder="FAQ Question" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Response</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your FAQ Response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $faq_data['response'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="delete_faq(`'.$faq_data['id'].'`)">Delete Faq</button>
                        <button onclick="edit_faq(`'.$faq_data['id'].'`)">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            <br>
                <div style="display: contents;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/edit-faq/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                        <div class="video-wrapper"></div>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                <span style="font-size:10px; "># [DEPARTMENT]</span><br>
                                [TITLE]
                            </div>
                        </div>
                        <div class="video-view" style="padding: 10px 20px 0px;">
                            [RESPONSE]
                        </div>
                        <br><br>
                    </div>
                </div>
            ';

            $faq_data = $db->query("SELECT * FROM faq");
            if (empty($faq_data)) {
            } else {
                $html = '';
                foreach ($faq_data as $faq) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[DEPARTMENT]', '[TIME]', '[RESPONSE]'],
                        [$faq['id'], $faq['question'], $faq['category'], date('Y-m-d', strtotime($faq['created_at'])), $faq['response']],
                        $html_template
                    );
                }
                $html .= '';
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

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/scripts/scripts.php'; ?>");
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