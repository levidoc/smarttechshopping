<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            New Page
        </div>

        <div id="section_basic" style="display: none;">
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
                        <input placeholder="page title" type="text" id="edt_page_title" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">
                    https://reiddrop.varsitymarket.shop/page-title/
                </div>
                <div class="video-view"></div>
            </div>

            <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row; justify-content: flex-end; margin:10px 0px; ">
                    <button onclick="change_section('1')">
                        Next
                    </button>
                </div>
            </div>
        </div>

        <div id="section_seo" style="display: none;">
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
                        <input placeholder="page title" type="text" id="edt_page_seo_title" style="background-image: none; max-width: 100%;">
                    </div>
                </div>
                <div class="video-view" style="padding: 10px 20px 0px;">Page Description</div>
                <div class="video-name">
                    <div class="search-bar" style="max-width: 100%; height: auto;">
                        <textarea id="edt_page_seo_description" placeholder="Site Page Description" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;"></textarea>
                    </div>
                </div>
                <div class="video-view"></div>
            </div>

            <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 0px; ">
                    <button onclick="change_section('0')">
                        Back
                    </button>
                    <button onclick="change_section('2')">
                        Next
                    </button>
                </div>
            </div>
        </div>

        <div id="section_templates" style="display: none;">
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
                        <iframe src="http://localhost/websites/wusspopping/" class="preview_frame_small" tabindex="-1"></iframe>
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
    function change_section(part){
        //Listing Available Sections
        let sections = ["basic", "seo", "templates"];
        let section = sections[part];
        let section_id = "section_" + section;

        //Hide All Sections
        for (let i = 0; i < sections.length; i++) {
            let section_container = document.getElementById("section_" + sections[i]);
            if (section_container) {
                section_container.style.display = "none";
            }
        }

        let section_container = document.getElementById(section_id);
        if (section_container) {
            section_container.style.display = "block";
        }
    }

    async function public_create_page(){
        const page_title = document.getElementById("edt_page_title").value;
        const seo_title = document.getElementById("edt_page_seo_description").value; 
        const page_description = document.getElementById("edt_page_seo_description").value;
        const page_template = document.getElementById("preview_layout_file").value; 

        operate_loader();
        const data = new URLSearchParams();
        data.append("request", "<?php echo $page_id; ?>");
        data.append("page_title", page_title);
        data.append("page_description", page_description);
        data.append("page_template", page_template);

        const ServerData = await sendAndReceiveData(data, process_endpoint);

        if (ServerData.trim() == "PROCEED"){
            // Redirect Page To Product List
            alert("Page Added Successfully"); 
            window.location.reload(true);
        }else if (ServerData.trim() == "ERROR"){
            error_feedback("An Error Occurred While Creating This Page"); 
        }else{
            error_feedback(); 
        }

        alert(ServerData); 
        operate_loader('close');
    }

    change_section(0); 

    async function reload_page(page_id) {

        operate_loader();
        const data = new URLSearchParams();
        data.append("page", page_id);
        const receivedData = await sendAndReceiveData(data, application_endpoint);
        const application_canvas = document.getElementById('application_canvas');
        application_canvas.innerHTML = receivedData;
        operate_loader('close');
    }

    <?php //echo "reload_page('{$page_id}')" 
    ?>
</script>