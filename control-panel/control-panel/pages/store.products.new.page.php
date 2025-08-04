<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<style>
    #editor {
            height: 200px;
            border: 1px solid #ccc;
    }
</style>


<div style="width:100%; max-width:100vw; height:100%; max-height:100vh; padding:20px; ">        
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-between;">
            <div>
                Store Products
            </div>

            <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px; ">
                <button onclick="save_product()">
                    Save Product
                </button>
            </div>
        </div>

        <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
            <div class="video-wrapper"></div>
            <div class="video-name">
                <div class="small-header anim" style="--delay: .3s">
                    <span style="font-size:10px; ">Add To Website Inventory</span><br>
                    New Product 
                </div>
            </div>

            
            <div class="video-view" style="padding: 10px 20px 0px;">Product Title</div>
            <div class="video-name">
                <div class="search-bar" style="width:100%; max-width: 100vw;">
                    <input value="" type="text" placeholder="Product Name" id="edt_product_name" style="background-image: none; max-width: 100%;">
                </div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">Product Description</div>
            <div style="padding: 5px 20px;">
                <div id="toolbar">
                    <select class="ql-header" defaultValue="">
                        <option value="1">Header 1</option>
                        <option value="2">Header 2</option>
                        <option value="3">Header 3</option>
                        <option value="">Paragraph</option>
                    </select>
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                </div>

                <div id="editor"></div>
            </div>
            
        </div>
</div>

<script>
    var quill = new Quill('#editor', {
        modules: {
            toolbar: '#toolbar'
        },
        theme: 'snow'  // or 'bubble'
    });
</script>


<?php 
$page_id = hash("sha256","new-store-products"); 
?>
<script>
    async function save_product(){
        // Validate The Product Data 
        const product_name = document.getElementById('edt_product_name').value;
        const product_description = quill.root.innerHTML; // Get the HTML content of the editor
        if(product_name == ""){
            error_feedback("Product Name Cannot Be Empty");
            return;
        }
        if(product_description == ""){
            error_feedback("Product Description Cannot Be Empty");
            return;
        }
        // Send The Data To The Server

        operate_loader();
        const data = new URLSearchParams();
        data.append("request", "<?php echo $page_id; ?>"); 
        data.append("product_name", product_name);
        data.append("product_description", product_description);

        const ServerData = await sendAndReceiveData(data, process_endpoint);

        if (ServerData.trim() == "PROCEED"){
            // Redirect Page To Product List
            alert("Product Added Successfully"); 
            window.location.reload(true);
        }else if (ServerData.trim() == "ERROR"){
            error_feedback("An Error Occurred While Adding The Product"); 
        }else{
            error_feedback(); 
        }

        alert(ServerData); 
        operate_loader('close');
    }

</script>