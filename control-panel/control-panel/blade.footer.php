<?php

?>

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid transparent;
        background-color: white;

    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none !important;
        border-radius: unset !important;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color:black; 
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #765da1ff;
        color: white;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #6c2bd9;
        color:white; 
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }

    div.gallery {
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }

    .responsive {
        padding: 0 6px;
        float: left;
        width: 24.99999%;
    }

    @media only screen and (max-width: 700px) {
        .responsive {
            width: 49.99999%;
            margin: 6px 0;
        }
    }

    @media only screen and (max-width: 500px) {
        .responsive {
            width: 100%;
        }
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }




    #imagePreviewContainer {
        margin-top: 20px;
        border: 1px dashed #ccc;
        padding: 10px;
        text-align: center;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #previewImage {
        max-width: 100%;
        max-height: 200px;
        /* Adjust as needed */
        display: none;
        /* Hidden by default until an image is selected */
    }

    /* Hide the default file input visually */
    #hiddenFileInput {
        display: none;
        /* You could also use:
            position: absolute;
            left: -9999px;
            opacity: 0;
            */
    }

    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .custom-file-upload:hover {
        background-color: #0056b3;
    }
</style>

<script>
    // For all the times that class "add_media_data" is used, it will be replaced with the actual media path
    document.querySelectorAll('.add_media_data').forEach(function(element) {
        element.addEventListener('click', function() {
            request_media_container(element);
        });
    });

    function open_TAB(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function select_media_query(path){
        let id = image_container_query; 
        let e = image_container_query; 
        e.src = path; 
        document.getElementById('media_container').innerHTML = "";
    }
    let image_container_query; 
    async function request_media_container(e) {
        // Check if the container exists, if not, create it and append to body
        let container = document.getElementById('media_container');
        image_container_query = e; 
        if (!container) {
            container = document.createElement('div');
            container.id = 'media_container';
            document.body.appendChild(container);
        }

        try {
            const response = await fetch('<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . "/@scripts/gui/media/" ?>', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (response.ok) {
                const html = await response.text();
                container.innerHTML = html;



                // Get references to HTML elements
                const hiddenFileInput = document.getElementById('hiddenFileInput');
                const previewImage = document.getElementById('previewImage');
                const noImageSelectedText = document.getElementById('noImageSelectedText');
                const submitButton = document.getElementById('submitButton');

                // Function to handle image selection and preview
                hiddenFileInput.addEventListener('change', function() {
                    const file = this.files[0]; // Get the first selected file

                    if (file) {
                        // Check if the selected file is an image
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader(); // Create a FileReader object

                            reader.onload = function(e) {
                                // When the file is loaded, set the image source to the result
                                previewImage.src = e.target.result;
                                previewImage.style.display = 'block'; // Show the image
                                noImageSelectedText.style.display = 'none'; // Hide the "No image selected" text
                            };

                            // Read the file as a Data URL (base64 encoded string)
                            reader.readAsDataURL(file);
                        } else {
                            error_feedback('Please select an image file (e.g., JPEG, PNG, GIF).');
                            // Clear the file input if a non-image is selected
                            hiddenFileInput.value = '';
                            previewImage.style.display = 'none';
                            noImageSelectedText.style.display = 'block';
                        }
                    } else {
                        // No file selected, reset preview
                        previewImage.src = '';
                        previewImage.style.display = 'none';
                        noImageSelectedText.style.display = 'block';
                    }
                });

                // Optional: Simulate submission to show the file is indeed in the input
                submitButton.addEventListener('click', function() {
                    if (hiddenFileInput.files.length > 0) {
                        const selectedFile = hiddenFileInput.files[0];
                        //alert(`Image "${selectedFile.name}" (${selectedFile.type}, ${selectedFile.size} bytes) is ready for submission!`);
                        // In a real application, you would now send this file to a server
                        // using FormData and an XMLHttpRequest or Fetch API.
                        console.log("File ready for upload:", selectedFile);

                    const formData = new FormData();
                    formData.append('uploadedImage', selectedFile);

                    try { 
                        const response = fetch('<?php echo __PROTOCOL__.__DOMAIN_NAME__.'/@scripts/control-panel/?request=media-upload' ?> ', {
                            method: 'POST',
                            body: formData, // FormData automatically sets 'Content-Type: multipart/form-data'
                        });
                        
                        // Check if the request was successful (HTTP status 2xx)
                        alert('Image Saved On Server'); 
                        open_TAB(event, 'media_contents_files_tab'); 
                    } catch (error) {
                        console.error('Network or client-side error:', error);
                        uploadStatus.textContent = `An error occurred: ${error.message}`;
                        uploadStatus.className = 'error';
                        error_feedback("Failed To Upload Image To Server"); 
                    }

                    } else {
                        error_feedback('No image has been selected yet.');
                    }
                });

            } else {
                //container.innerHTML = 'Failed to load media content.';
                error_feedback('Failed to load media content');
            }
        } catch (error) {
            error_feedback('Error fetching media content: ' + error.message);
            //container.innerHTML = 'Error loading media content.';
        }
    }
</script>