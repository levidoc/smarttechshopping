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
            Contact Form Section
        </div>

        <?php
        if ($internal_page == "view-form") {
            $faq_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM contact_form WHERE id = '$faq_id'";
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
                            <span style="font-size:10px; ">Manage Forms</span><br>
                            View Contact Forms
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Manage Contact Form, and view the details of the contact form.
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Date Upload: ' . date('Y-m-d', strtotime($faq_data['date'])) . '</div>
                    <br>

                    <div class="video-view" style="padding: 10px 20px 0px;">Name</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input disabled value="' . $faq_data['name'] . '" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Contact</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input disabled value="' . $faq_data['email'] . '" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Message</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $faq_data['subject'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="delete_faq(`'.$faq_data['id'].'`)">Delete Record</button>
                        <button onclick="edit_faq(`'.$faq_data['id'].'`)">Direct Response</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            <br>
                <div style="display: contents;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/view-form/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                        <div class="video-wrapper"></div>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                <span style="font-size:10px; "># [DEPARTMENT]</span><br>
                                [TITLE]
                            </div>
                        </div>
                        <div class="video-view" style="padding: 10px 20px 0px;">
                            [TIME]
                        </div>
                        <br><br>
                    </div>
                </div>
            ';

            $contact_data = $db->query("SELECT * FROM contact_form ORDER BY id DESC");
            if (empty($contact_data)) {
            } else {
                $html = '';
                foreach ($contact_data as $row) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[DEPARTMENT]', '[TIME]'],
                        [$row['id'], 'Message From: '.$row['name'], $row['email'], date('Y-m-d (H:i)', strtotime($row['date']))],
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
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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