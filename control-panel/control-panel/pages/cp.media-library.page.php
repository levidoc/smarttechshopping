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
            Media Library
        </div>
        <?php
        if ($internal_page == "add-image") {
            $html = '
            <div class="main-blog anim" style="--delay: 0.1s; width: 100%; height: max-content; background-color: bisque; background: linear-gradient(181deg, #8e8e8f, transparent); margin: 1rem 0rem;">
                <div style="display: flex; align-items: center; padding-bottom: 10px; flex-direction: column;" class="main-blog__author">
                    <h3 class="small-header" style="margin:0">Upload Image Preview</h3>
                    <label for="hiddenFileInput" class="custom-file-upload">
                        Choose Image
                    </label>

                    <input type="file" id="hiddenFileInput" accept="image/*">

                    <div style="width:fit-content" id="imagePreviewContainer">
                        <img style="max-width: 21rem; max-height:21rem; ;" id="previewImage" src="" alt="Image Preview">
                        <p id="noImageSelectedText">No image selected</p>
                    </div>
                    <br>
                    <button id="submitButton">Submit Image</button>
                    
                </div>
            </div>
            ';
            echo $html;
        } else {

            @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "systemctrl.php";
            $data_sets = $db->query("SELECT * FROM gallery ORDER BY `id` DESC");
            $template_row = '
                    <div class="responsive">
                        <div class="gallery" style="padding:10px">
                            <a target="_blank">
                                <img style="aspect-ratio:7/7; object-fit:cover; " src="PATH" alt="TITLE" width="600" height="400">
                                <div style="margin:-3rem 5px 0px 5px; ">
                                    <div style="width:40px; height:40px;"><img src="' . __PROTOCOL__ . __DOMAIN_NAME__ . '/@rescources/icons/delete-icon/"></div>
                                </div>
                            </a>
                        </div>
                    </div>';
            $output = "";
            foreach ($data_sets as $media_e) {
                $output .= str_ireplace(
                    ['TITLE', 'DESCRIPTION', 'PATH', 'HASH'],
                    [$media_e['title'], $media_e['description'], __PROTOCOL__ . __DOMAIN_NAME__ . "/@media/" . $media_e['hash'], $media_e['hash']],
                    $template_row
                );
            }

            if (empty($output)) {
                $output = '<div style="display: flex; align-items: center; flex-direction: column;"><img src="' . __PROTOCOL__ . __DOMAIN_NAME__ . '/rescources/art/construction.svg"><h2>No Content</h2><br>No Media Available</div>';
            }

            echo '
            <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                    <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-image/'.'`">
                        Upload Image 
                    </button>
                </div>
            </div>
            
            <div>' . $output . '</div>';
        }
        ?>
    </div>
</div>