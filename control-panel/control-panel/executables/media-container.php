<div class="moadal-full-page" style="position: absolute !important; overflow-x: scroll !important;">
    <div style="margin:1rem; width:calc(100% - 1rem); overflow:scroll; position: inherit;">
        <div class="anim" style="--delay: 0.1s; padding:10px; border-radius:20px; background: #42414c; width: 100%; height: 100%; overflow-x: auto;">
            <div class="small-header" style="margin:0px;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <h2>Media Container<br><span style="font-size:10px;">Manage all the media files in your web server</span></h2>

                    <svg style="max-width:2.5rem; filter:invert(1);  " onclick="document.getElementById('media_container').innerHTML = ''"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="#292D32"></path>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="tab">
                <button class="tablinks" onclick="open_TAB(event, 'media_contents_files_tab')">Media Files</button>
                <button class="tablinks" onclick="open_TAB(event, 'add_media_contents_tab')">Upload Media</button>

            </div>

            <div id="add_media_contents_tab" class="tabcontent">
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

            <div id="media_contents_files_tab" class="tabcontent">
                <?php 
                @include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."systemctrl.php"; 
                $data_sets = $db->query("SELECT * FROM gallery ORDER BY `id` DESC");
                $template_row = '
                    <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" onclick="select_media_query(`PATH`)">
                                <img src="PATH" alt="TITLE" width="600" height="400">
                                <div style="margin:-3rem 5px 0px 5px; ">
                                    <div style="width:40px; height:40px;"><img src="'.__PROTOCOL__.__DOMAIN_NAME__.'/rescources/icons/delete-icon.png"></div>
                                </div>
                            </a>
                        </div>
                    </div>'; 
                $output = ""; 
                foreach ($data_sets as $media_e) {
                    $output .= str_ireplace(
                        ['TITLE','DESCRIPTION','PATH','HASH'],
                        [$media_e['title'],$media_e['description'],__PROTOCOL__.__DOMAIN_NAME__."/@media/".$media_e['hash'],$media_e['hash']],
                        $template_row); 
                }

                if (empty($output)){
                    $output = '<div style="display: flex; align-items: center; flex-direction: column;"><img src="'.__PROTOCOL__.__DOMAIN_NAME__.'/@rescources/art/construction/"><h2>No Content</h2><br>No Media Available</div>';  
                }
                ?>

                <div>
                    <?php echo $output ?>
                </div>
            </div>

        </div>
    </div>
</div>