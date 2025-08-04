<div style="width:100%; max-width:100vw; height:100%; max-height:100vh; padding:20px; overflow-y: scroll;">
    <br>
    <div class="anim" style="--delay: 0s; text-align: center; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-between;">
        <div style="text-align: left;">
            <h1>Create Site</h1><span>Home > Website > Create Site</span>
        </div>
    </div>

    <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">

        <div class="video-wrapper"></div>
        <div style="padding:15px;">
            <div class="small-header anim" style="--delay: .3s">
                <span style="font-size:10px; ">Create a new website in 5 mins</span><br>
                Register Website
            </div>

            <div>
                <span style="font-size:10px; ">Website Name</span><br>
                <div class="search-bar" style="max-width: 100%;">
                    <input placeholder="Website Name" type="text" id="edt_site_name" style="background-image: none; max-width: 100%;">
                </div>
            </div>
            <br>

            <div>
                <span style="font-size:10px; ">Website Domain</span><br>
                <div class="search-bar" style="max-width: 100%;">
                    <input placeholder="example.com" type="text" id="edt_page_title" style="background-image: none; max-width: 100%;">
                </div>
            </div>
            <br>
            <style>
            /* Container Styles */
            @media (max-width: 600px) {
                #template-gallery {
                    flex-direction: column !important;
                    gap: 0.5rem !important;
                    align-items: stretch !important;
                }
                .template-card {
                    width: 100% !important;
                    max-width: 100% !important;
                }
            }

            /* Template Gallery */
            #template-gallery {
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
                margin: 1rem 0;
            }

            /* Template Card */
            .template-card {
                cursor: pointer;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
                width: 140px;
                text-align: center;
                transition: box-shadow 0.2s, border-color 0.2s;
                background: #fff;
            }
            .template-card img {
                width: 100%;
                border-radius: 4px;
                object-fit: cover;
            }
            .template-card:hover {
                box-shadow: 0 0 0 2px #007bff;
                border-color: #007bff;
            }

            /* Search Bar Input */
            .search-bar input[type="text"] {
                width: 100%;
                padding: 8px 12px;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 1rem;
                outline: none;
                transition: border-color 0.2s;
                background: #fafafa;
                box-sizing: border-box;
            }
            .search-bar input[type="text"]:focus {
                border-color: #007bff;
            }


            /* General Responsive Typography */
            @media (max-width: 400px) {
                .small-header.anim {
                    font-size: 1rem !important;
                }
                h2 {
                    font-size: 1.2rem !important;
                }
            }
            </style>
            <div>
                <span style="font-size:10px;">Choose a Setup Template</span><br>
                <div id="template-gallery" style="display: flex; gap: 1rem; flex-wrap: wrap; margin: 1rem 0;">
                    <!-- Example Template 1 -->
                    <div class="template-card" onclick="selectTemplate('modern')" style="cursor:pointer; border:1px solid #ddd; border-radius:8px; padding:10px; width:140px; text-align:center; transition:box-shadow 0.2s;">
                        <img src="https://via.placeholder.com/120x80?text=Modern" alt="Modern Template" style="width:100%; border-radius:4px;">
                        <div style="margin-top:8px; font-size:13px;">Blank Theme</div>
                    </div>
                </div>
                <input type="hidden" id="selected_template" value="modern">
            </div>
            <script>
                function selectTemplate(template) {
                    document.getElementById('selected_template').value = template;
                    // Highlight selected card
                    document.querySelectorAll('.template-card').forEach(card => {
                        card.style.boxShadow = '';
                        card.style.borderColor = '#ddd';
                    });
                    const selected = Array.from(document.querySelectorAll('.template-card')).find(card =>
                        card.onclick.toString().includes("'" + template + "'")
                    );
                    if (selected) {
                        selected.style.boxShadow = '0 0 0 2px #007bff';
                        selected.style.borderColor = '#007bff';
                    }
                }
                // Set default selection
                window.addEventListener('DOMContentLoaded', () => selectTemplate('modern'));
            </script>

 
            <button onclick="save_website()">
                Create Website
            </button>
        </div>

    </div>
</div>

<?php $page_id = "create-site"; ?>

<script>
    async function save_website() {
        // Validate The Website Data 
        const website_name = document.getElementById('edt_site_name').value;
        if (website_name == "") {
            error_feedback("Website Name Cannot Be Empty");
            return;
        }
        if (website_name.length < 3) {
            error_feedback("Website Name Must Be At Least 3 Characters Long");
            return;
        }

        const website_domain = document.getElementById('edt_page_title').value;
        if (website_domain == "") {
            error_feedback("Website Domain Cannot Be Empty");
            return;
        }
        if (!website_domain.includes('.')) {
            error_feedback("Invalid Website Domain");
            return;
        }
        if (website_domain.length < 5) {
            error_feedback("Website Domain Must Be At Least 5 Characters Long");
            return;
        }
        
        operate_loader();
        const data = new URLSearchParams();
        data.append("request", "<?php echo $page_id; ?>");
        data.append("website-name", website_name);
        data.append("website-domain", website_domain);

        const ServerData = await sendAndReceiveData(data, 'http://127.0.0.1:8000/executables/script.php');

        if (ServerData.trim() == "PROCEED") {
            // Redirect Page To Product List
            alert("Product Added Successfully");
            window.location.reload(true);
        } else if (ServerData.trim() == "ERROR") {
            error_feedback("An Error Occurred While Adding Your Website");
        } else {
            error_feedback(ServerData);
        }

        //alert(ServerData);
        operate_loader('close');
    }
</script>