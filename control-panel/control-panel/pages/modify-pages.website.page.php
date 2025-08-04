<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Website Page
        </div>
        <?php 
            if (function_exists("get_page_data")){
                $page_call_sign = get_page_data();
                if (isset($page_call_sign['navbar-data'])){$page_call_sign = $page_call_sign['navbar-data']; }
                $e = dirname(dirname(dirname(__FILE__)))."/package-manager.php"; if(file_exists($e)){@include_once $e; }
                $sql = "SELECT * FROM `tblsite_pages` WHERE (`call_sign` = '{$page_call_sign}') ";  
                if (class_exists('scripts_packages')){
                    $main_system = new scripts_packages();
                    $main_system->activate_database(); 
                    $page_info = $main_system->database->select_data($sql);  
                    $system_data = $page_info[0]; 
                } 
            }
        ?>
        
        <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 0px; ">
                    <div style="display: flex; align-items: center; gap: 0.3rem;">
                        <button onclick="change_section('0')">
                            Delete
                        </button>
                        <button onclick="change_section('0')">
                            Save
                        </button>
                    </div>
                    <button onclick="redirect_inline_page()" style="border-color: #6c2bd9; border-width: 2px; background-color: #ffffff; color: #6c2bd9; border-style: solid;" onclick="change_section('2')">
                        Website Builder
                    </button>
                </div>
            </div>
            <script>
                function redirect_inline_page(){
                    window.location = "http://localhost/online-store.varsitymarket.package/website-builder/#"; 
                }
            </script>

        <div id="section_basic" style="display: block;">
            <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                <div class="video-wrapper"></div>
                <div class="video-name">
                    <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                        <span style="font-size:10px; ">Configure Your Page Details</span><br>
                        Page Details
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">
                    Set Information On The Website Page.
                </div>

                <div class="video-view" style="padding: 10px 20px 0px;">Page Title</div>
                <div class="video-name">
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo(json_decode($system_data['page_data'],true)['title']) ?>" placeholder="page title" type="text" id="edt_page_title" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">
                    https://reiddrop.varsitymarket.shop/page-title/
                </div>
                <div class="video-view"></div>
            </div>
        </div>

        <div id="section_seo" style="display: contents;">
            <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                <div class="video-wrapper"></div>
                <div class="video-name">
                    <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                        <span style="font-size:10px; ">Configure Your SEO Settings</span><br>
                        SEO Configuration
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">
                    Set the configuration for Search Engines to easily pick up on your website pages.
                </div>

                <div class="video-view" style="padding: 10px 20px 0px;">Page Title</div>
                <div class="video-name">
                    <div class="search-bar" style="max-width: 100%;">
                        <input value="<?php echo(json_decode($system_data['page_seo'],true)['title']) ?>" placeholder="page title" type="text" id="edt_page_seo_title" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">Page Description</div>
                <div class="video-name">
                    <div class="search-bar" style="max-width: 100%; height: auto;">
                        <textarea id="edt_page_seo_description" placeholder="Site Page Description" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;"><?php echo(json_decode($system_data['page_seo'],true)['description']) ?></textarea>
                    </div>
                </div>
                <div class="video-view"></div>
            </div>
        </div>

        <div id="section_templates" style="display: contents;">
            <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                <div class="video-wrapper"></div>
                <div class="video-name">
                    <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                        <span style="font-size:10px; ">Configure Your Page Template</span><br>
                        Page Templates
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">
                    Set the existing page templates to make a quick design.
                </div>

                <div class="col-12" style="padding: 20px;">
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px; margin-top:0px;">
                            <span style="font-size:1rem; ">Choose Page Layout</span>
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Select a page from the current template
                    </div>    
                    <div>
                        <select id="preview_layout_file" class="form-select mw-edit-page-layout-selector" data-width="100%" autocomplete="off">
                            <option title="Inherit" value="inherit">
                                Inherit 
                            </option>
                        </select>
                    </div>
                </div>


                <div class="video-view">
                    <div class="frame-prep">
                        <iframe src="http://localhost/online-store.varsitymarket.package/website-builder/canvas/" class="preview_frame_small" tabindex="-1"></iframe>
                    </div>

                </div>
            </div>

            <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 0px; ">
                    <button onclick="change_section('1')">
                        Back
                    </button>

                    <button style="background-color: #6c2bd942;" onclick="public_create_page()">
                        Create Page
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "new-website-page");
?>
<script>

    <?php //echo "reload_page('{$page_id}')" 
    ?>
</script>