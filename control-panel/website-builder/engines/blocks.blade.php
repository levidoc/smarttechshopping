<?php
@include_once dirname(__FILE__)."/module.engine.php";

$auth_code = "SOMETHING";
$room_id = "admin";
$template_code = "beyeke";

$classname = encrypt('skynet_block_panel', $auth_code);
$slidebar = encrypt('skynet_builder_slidebar', $auth_code);

#Theme Block Implementation
$theme_block_container = encrypt('skynet_theme_block', $auth_code);
$site_services = new Site_Template($template_code, $room_id);


$theme_block_data = "";
foreach ($site_services->retrieve_theme_blocks() as $t) {
    $title = $t['title'];
    $img = $t['img'];
    $description = $t['description'];
    $code = $t['code'];

    $zt = '<div class="tool" draggable="true" data-type="' . $code . '" style="
        margin: auto;
    text-align: center;
    color: #818181;
    width: 100%;
    border-radius: 0.4rem;
    background-color: #ffffff17;
    padding: 3px 0px;">
            <img src="' . $img . '" style="border-radius:5px; aspect-ratio: 0 / 1; object-fit: cover; width: 100%; height: auto;">
            <h3 style="margin:4px 0 7px 0; font-size:14px; font-weight:700;padding: 0px 15px 0px 15px;  display:flex; align-items: center; justify-content: center;"> <img src="https://img.icons8.com/?size=30&id=61821&format=png" style="width: 14px; filter: contrast(0.1); ">' . $title . '</h3>
            <h3 style="margin:0px 0 10px 0; padding:0; font-size:15px; font-weight:700; display:none;  ">' . $title . '</h3>
            </div>';
    $theme_block_data .= $zt;
}

echo $site_services->construct_header_style();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    <?php echo ('.object_' . $classname) ?> {
        padding: 10px 0px 0px 0px !important;
        width: 100% !important;
        height: 100% !important;
        position: fixed !important;
        z-index: 1000000 !important;
        top: 0 !important;
        left: calc(0% - 0rem) !important;
        background-color: rgba(0, 0, 0, 0.95);
        background-color: rgb(18, 19, 23, 0.9) !important;
        overflow-x: hidden !important;
        transition: 0.5s !important;
        max-width: 20rem !important;
        opacity: 1 !important;
        pointer-events: all !important;
    }

    <?php echo ('.object_' . $classname . ' .noto-sans-hk-900') ?> {
        font-family: "Noto Sans HK", serif;
        font-optical-sizing: auto;
        font-weight: 900;
        font-style: normal;
        color: #f0f8ffc9;
    }

    * {
        overflow: hidden;
    }

    <?php echo ('.object_' . $slidebar . "_") ?> {
        overflow-y: scroll !important;
        /* Enable vertical scrolling */
        height: 300px;
        /* Set a height for the scrollable area */
    }

    /* Custom Scrollbar */
    <?php echo ('.object_' . $slidebar . "_") ?>::-webkit-scrollbar {
        width: 5px !important;
        /* Width of the scrollbar */
    }

    <?php echo ('.object_' . $slidebar . "_") ?>::-webkit-scrollbar-track {
        background: #f0f0f0 !important;
        /* Background of the scrollbar track */
        border-radius: 10px !important;
        /* Rounded corners for the track */
    }

    <?php echo ('.object_' . $slidebar . "_") ?>::-webkit-scrollbar-thumb {
        background: #888 !important;
        /* Color of the scrollbar thumb */
        border-radius: 10px !important;
        /* Rounded corners for the thumb */
    }

    <?php echo ('.object_' . $slidebar . "_") ?>::-webkit-scrollbar-thumb:hover {
        background: #555 !important;
        /* Darker color on hover */
    }

    <?php echo ('.object_' . $classname . ' .button-tool') ?> {
        display: flex !important;
        justify-content: space-between !important;
        padding: 10px 17px;
        text-decoration: none !important;
        font-size: 2vh !important;
        color: #818181 !important;
        transition: 0.3s !important;
        align-items: center;
    }

    <?php echo ('#object_' . $theme_block_container) ?> {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        /* Creates one equal columns */
        gap: 16px;
        /* Space between grid items */
        padding: 25px;
        /* Space around the container */
    }

    .register-template {
        /* flex: 1; */
        padding: 10px;
        background: #1919195e;
        overflow-y: auto;
        border: 2px solid #000000;
        border-radius: 12px;
    }

    .register-template .draggable {
        padding: 20px;
        background: #f9f9f9;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: grab;
    }

    .register-template .draggable:hover {
        background: #f1f1f1;
    }

    #canvas_builder {
        overflow: auto !important;
        width: 100% !important;
        height: 100%;
        min-height: 4rem;
        margin: 0 !important;
        cursor: url("assets/cursor.png"), auto;
    }

    .edit-mode {
        border: 2px dashed #6934b7;
        transition: transform;
        margin: 10px;
        padding: 1rem;
        transform: scale(0.7);
    }

    .edit-mode:focus {
        outline: none;
    }

    .actions {
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .actions button {
        padding: 10px 15px;
        margin: 0 5px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .actions button:hover {
        background: #45a049;
    }

    .control_block_distro {
        overflow: hidden;
        border-style: outset;
        border-color: #6934b7 #00000073;
        border-width: 0.5vh 0px 0px 0px;
    }

    .control_block_distro .grip_icon {
        border-style: outset;
        border-color: #6934b7 #00000073;
        border-width: 0.2vh 0px 0px 0px;
        cursor: grab;
        width: 14rem;
        margin: auto;
        display: block;
        background-color: #6934b7;
    }

    .control_block_distro .tools {
        transition: transform .2s;
        transform: scale(1.1);
        width: 0px;
    }

    .control_block_distro .tools {
        width: fit-content;
        background: #343a40;
        color: #6934b7;
        display: block;
        margin: -3rem auto auto auto;
        padding: 0.4rem;
        border-style: groove;
        border-color: #6934b7 #00000073;
        border-width: 5px 0px 5px 0rem;
        cursor: grab;
        border-radius: 15px 15px 10px 10px;
    }

    .control_block_distro .tools .w {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .control_block_distro .tools .w .u {
        font-size: 9px;
        color: #aa9dbd;
    }

    .control_block_distro .tools .w .uf {
        font-size: 15px;
        color: aliceblue;
    }

    .content_editable {
        border: none;
        /* Remove border */
        outline: none;
    }

    .content_editable:hover {
        outline: none;
        outline: none;
        border: 2px dashed #6934B6 !important;
        background: linear-gradient(180deg, #6934b72b, #0000002e 90vh);
    }
</style>

<div id="<?php echo ('object_' . $slidebar . "_") ?>" class="<?php echo ('object_' . $slidebar . "_") ?> <?php echo ('object_' . $classname) ?>">
    <div class="noto-sans-hk-900 overlay-content">
        <a><img onclick="close_block_pallet()" style="width:2rem; filter:grayscale(1);padding: 1rem 0rem 0rem 1rem;" src="https://img.icons8.com/?size=256&id=11997&format=png"></a>
        <a style="font-size: 2rem !important; font-weight: bold; color: #ffffff3b; text-align: center; display: block; margin: 0px 0px 50px 0px;">
            <i class="fa-solid fa-cubes-stacked"></i> Block Palette
        </a>
        <div class="button-tool">
            <a style="display: flex; align-items: center;"><img src="https://img.icons8.com/?size=256w&id=46264&format=png" style="width: 1.4rem;filter: contrast(0.1);"> Theme Block</a>
            <a style="display: flex; align-items: center;"><img style="width: 1.3rem; filter: grayscale(1);" src="https://img.icons8.com/?size=256&id=26089&format=png"> Saved Blocks</a>
        </div>
        <div>
            <div id="<?php echo ('object_' . $theme_block_container) ?>">
                <?php echo ($theme_block_data) ?>
                <div onclick="add_block()" style="margin: auto;text-align: center;color: #818181;width: 100%; border-radius: 1rem;">
                    <img src="assets/blank-block.png" style="border-radius:9px; aspect-ratio: 18 / 10; object-fit: contain; width: 100%; height: auto;">
                    <h3 style="margin:0px 0 10px 0; padding:0; font-size:15px; font-weight:700;  ">Blank Block</h3>
                </div>

            </div>
        </div>

    </div>
</div>


<style>
    .block_indicator {
        background-color: #343a40;
        color: #f8fcff8a;
        z-index: (1);
        width: 10rem;
        padding: 10px;
        margin: 2px 5px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: flex-start;

    }

    .block-header {
        position: relative;
        z-index: 1;
        padding: 0.2rem 0rem 0rem 0rem;
        width: 100%;
        display: flex;
        flex-direction: row-reverse;
        flex-wrap: wrap;
        margin: 0rem 0rem -3rem 0rem;
        max-height: 4rem;
    }


    .section {
        padding: 10px;
        margin-bottom: 10px;
        gap: 1px;
    }

    .section:hover {
        border: 1px solid #6934b7;
        margin-bottom: 10px;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
        background: repeating-linear-gradient(180deg, #0000006b, transparent 50vw);
    }

    .container {
        transition: all 0.15s;
        transition-timing-function: ease;
        padding: 9px 0px 20px 0px;
        overflow: visible;
    }

    .container:focus,
    .container:active,
    .container:target,
    .container:hover {
        border-style: dashed;
        border-width: 2px;
        border-color: #6934b7ad;
        background: linear-gradient(20deg, #00000080, #00000080);
        position: relative;
        min-width: 150px;
        flex-grow: 1;
        padding: 9px 0px 20px 0px;
    }

    .block {
        position: absolute;
        border: 1px dashed gray;
        padding: 5px;
        resize: both;
        overflow: auto;
        min-width: 30px;
        min-height: 30px;
        cursor: move;
        /* Indicate draggability */
    }

    .block.dragging {
        opacity: 0.7;
        /* Visual feedback during dragging */
    }

    .drag-handle {
        position: relative;
        top: 3rem;
        right: calc(2rem - 100%);
        background-color: #6934b7;
        color: white;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        border-radius: 50%;
        cursor: grab;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .add_element_block {
        border-radius: 0px 0px 10px 10px;
        margin: 2px auto -3rem auto;
        padding: 0.3rem 2rem 0.3rem 2rem;
        position: relative;
        top: -0.7rem;
        right: 0rem;
        background-color: #6934b799;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: grab;
        width: fit-content;
    }

    .add_container_button {
        margin: -1rem 0rem 6px -1rem;
        border-radius: 0px 0px 10px 10px;
        /* margin: 2px auto -3rem auto; */
        padding: 0.5rem 2rem 0.5rem 2rem;
        position: static;
        /* top: 7.3rem; */
        /* right: 0rem; */
        background-color: #6934b799;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: grab;
        outline: none;
        border: none;
        font-size: 10px;
        width: fit-content;
    }

    .toolbar_button_icon {
        font-size: 1rem;
        padding-right: 5px;
        font-weight: 900;
        color: #ffffff;
    }

    button:focus {
        outline: none;
        border: none;
    }

    .button_delete_icon {
        top: -2rem;
        left: 0rem;
        margin: -1px -1px -3rem 1rem;
        padding: 0rem;
        border-radius: 5px;
    }

    .button_delete_icon i {
        padding: 0.4rem 0.6rem;
    }

    .button_divider_hider {
        width: 100%;
        overflow: visible;
    }

    .overview {
        opacity: 1;
        transition: all 0.8s;
    }

    .delete_container_button {
        top: -3.3rem;
        right: 3.9rem;
        padding: 0.3rem 0.8rem;
        border: none;
    }

    .style_container_button {
        top: -1.99rem;
        right: -4.1rem;
        padding: 0.3rem 0.8rem;
        border: none;
    }

    .button-divider-container {
        overflow: visible;
        width: 100%;
        height: max-content;
        padding: 4px 0px 0px 1px;
    }
</style>

<div id="canvas_builder">
</div>
<div class="register-template">
    <p>Add More Blocks</p>
</div>

<script>
    function addSection() {
        const section = document.createElement('div');
        section.classList.add('section');
        const y = document.getElementById('inner-header-block-template-2');
        y.appendChild(section);

        //document.body.appendChild(section);

        const addContainerButton = document.createElement('div');
        //addContainerButton.textContent = "Add Container";
        addContainerButton.classList.add('add_container_button');
        addContainerButton.classList.add('overview');
        addContainerButton.innerHTML = "<span style=\"font-size: 1rem;margin: 0px 5px 1px 0px;\"><i class=\"fa-solid fa-paint-roller\"></i></span><i class=\"fa-solid toolbar_button_icon fa-object-ungroup\"></i> Add Container";
        addContainerButton.onclick = () => addContainer(section);


        const button_divider = document.createElement('div');
        button_divider.className = "button_divider_hider";
        button_divider.appendChild(addContainerButton);

        section.appendChild(button_divider);
        register_overview();
    }

    function remove_element(element) {
        element.parentNode.parentNode.remove();
        //Remove The Current Element Beign Edited 
    }

    function addContainer(section) {
        const container = document.createElement('div');
        container.classList.add('container');
        section.appendChild(container);


        const button_container = document.createElement('div');
        button_container.classList.add('button-divider-container');

        const deletecontainerbutton = document.createElement('button');
        deletecontainerbutton.classList.add('delete_container_button');
        deletecontainerbutton.classList.add('overview');
        deletecontainerbutton.classList.add('add_element_block');
        deletecontainerbutton.innerHTML = "<i class=\"fa-solid fa-trash-can\"></i>";
        deletecontainerbutton.onclick = () => remove_element(deletecontainerbutton);

        const stylecontainerbutton = document.createElement('button');
        stylecontainerbutton.classList.add('style_container_button');
        stylecontainerbutton.classList.add('overview');
        stylecontainerbutton.classList.add('add_element_block');
        stylecontainerbutton.innerHTML = "<i class=\"fa-solid fa-brush\"></i>";
        stylecontainerbutton.onclick = () => remove_element(stylecontainerbutton);

        const addBlockButton = document.createElement('button');
        addBlockButton.classList.add('add_element_block');
        //addBlockButton.textContent = "<i class=\"fa-solid fa-square-plus\"></i>";
        addBlockButton.innerHTML = "<i class=\"fa-solid fa-square-plus\"></i>";
        addBlockButton.onclick = () => addBlock(container);

        button_container.appendChild(deletecontainerbutton);
        button_container.appendChild(stylecontainerbutton);
        button_container.appendChild(addBlockButton);

        container.appendChild(button_container);
        register_overview();
    }


    let zIndexCounter = 1;

    function addBlock(container, type = "text") {

        const element = document.createElement('h2');
        element.innerHTML = "Double Click To Edit Text";
        element.contentEditable = true;
        element.className = 'content_editable';

        // Add draggable tooltip handle
        const dragHandle = document.createElement('div');
        dragHandle.classList.add('overview');
        dragHandle.classList.add('drag-handle');
        dragHandle.title = 'Drag to rearrange';
        dragHandle.innerHTML = '<i class="fa-solid fa-palette"></i>';
        //container.appendChild(dragHandle);

        //Delete Tooltip 
        const delete_icon = document.createElement('button')
        delete_icon.classList.add('button_delete_icon');
        delete_icon.classList.add('overview');
        delete_icon.classList.add('add_element_block');
        delete_icon.title = "Remove Element";
        delete_icon.innerHTML = '<i onclick="remove_element(this)" class="fa-solid fa-trash-can"></i>';

        const block = document.createElement('div');
        block.classList.add('text-content');
        block.style.zIndex = 10; // zIndexCounter++;
        block.style.left = '10px';
        block.style.top = '10px';
        block.style.display = 'contents';
        //block.innerHTML = "New Block";

        block.appendChild(dragHandle);
        block.appendChild(element);
        block.appendChild(delete_icon);
        container.appendChild(block);

        makeDraggable(block);
        register_overview();
    }


    function makeDraggable(element) {
        let isDragging = false;
        let offsetX, offsetY;

        element.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - element.offsetLeft;
            offsetY = e.clientY - element.offsetTop;
            element.classList.add('dragging'); // Add visual feedback
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                element.style.left = (e.clientX - offsetX) + 'px';
                element.style.top = (e.clientY - offsetY) + 'px';
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            element.classList.remove('dragging'); // Remove visual feedback
        });
    }
</script>

<script>
    function close_block_pallet() {
        let x = document.getElementById('<?php echo ('object_' . $slidebar . "_") ?>');
        x.style.display = "none";
    }

    async function fetchHTMLByBlockCodes(blockCodes, endpoint) {
        // Helper function to make XHR requests
        const fetchBlock = (blockCode) => {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', endpoint, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            resolve(xhr.responseText);
                        } else {
                            reject(`Failed to load block "${blockCode}": ${xhr.status} ${xhr.statusText}`);
                        }
                    }
                };
                xhr.send(`blockCode=${encodeURIComponent(blockCode)}`); // Send block code as form parameter
            });
        };

        try {
            // Fetch all blocks in parallel using Promise.all
            const htmlResponses = await Promise.all(
                blockCodes.map((blockCode) => fetchBlock(blockCode))
            );

            // Combine all HTML responses into a single string
            return htmlResponses.join('\n');
        } catch (error) {
            console.error('Error fetching HTML blocks:', error);
            throw error; // Re-throw the error for handling by the caller
        }
    }

    async function retrieve_block_component(block_id = "blank_page_0") {
        const blockCodes = [block_id];
        const end_file = "bin/get-block.php";
        try {
            const output_blocks = await fetchHTMLByBlockCodes(blockCodes, end_file);
            return output_blocks;
            console.log('Output Block:', output_blocks);
        } catch (error) {
            console.error('Failed to get block:', error);
        }
    }

    async function add_block(block_code = "blank_page_0") {
        block_data = await retrieve_block_component(block_code);
        let canvas_builder = document.getElementById('canvas_builder');
        //await canvas_builder.appendChild(block_data)

        canvas_builder.innerHTML += '<div class="control_block_distro"><div class="grip_icon"></div> <div class="block-header"><div class="block_indicator"><span onclick="remove_element(this)"><i class="fa-solid fa-xmark" style="margin:0px 5px; "></i></span> Block Name</div></div> ' + block_data + '<div class="tools"><div class="w"><p class="uf" style="margin-right: 9px;"><i class="fa-solid fa-palette"></i></p><p class="u"><i class="fa-solid fa-hand-pointer"></i> Block Section</p><p class="uf" style="margin-left: 9px;"><i onclick="addSection()" class="fa-solid fa-puzzle-piece"></i></p></div></div></div>';
    }

    // Initialize the workspace as a SortableJS container
    new Sortable(document.getElementById("canvas_builder"), {
        animation: 150,
        ghostClass: "edit-mode",
        handle: ".control_block_distro", // Allow dragging of all elements
    });

    // Add event listeners to make tools draggable into the workspace
    const toolbox = document.querySelectorAll(".tool");
    const workspace = document.getElementById("canvas_builder");

    toolbox.forEach((tool) => {
        tool.addEventListener("dragstart", (e) => {
            e.dataTransfer.setData("type", tool.dataset.type);
        });
    });

    workspace.addEventListener("dragover", (e) => {
        e.preventDefault();
    });

    workspace.addEventListener("drop", (e) => {
        e.preventDefault();
        const type = e.dataTransfer.getData("type");
        if (type) {
            const new_element = add_block(type);
            //const newElement = createComponent(type);
            //workspace.appendChild(newElement);
        }
    });

    // Function to create a new component
    function createComponent(type) {
        const element = document.createElement("div");
        element.classList.add("draggable");
        element.setAttribute("contenteditable", "true");

        switch (type) {
            case "text":
                element.textContent = "Double-click to edit text";
                break;
            case "image":
                element.innerHTML = '<img src="https://via.placeholder.com/300" alt="Placeholder Image">';
                break;
            case "button":
                element.innerHTML = '<button>Click Me!</button>';
                break;
            case "container":
                element.innerHTML = `
            <div style="padding: 10px; border: 1px solid #ccc; background: #f5f5f5;">
              <p>Container</p>
              <p>Drag elements into me</p>
            </div>
          `;
                // Make the container itself a SortableJS container
                new Sortable(element, {
                    group: "nested",
                    animation: 150,
                });
                break;
        }

        // Allow inline editing on double-click
        element.addEventListener("dblclick", () => {
            element.contentEditable = true;
            element.classList.add("edit-mode");
            element.focus();
        });

        // Remove edit mode on blur
        element.addEventListener("blur", () => {
            element.contentEditable = false;
            element.classList.remove("edit-mode");
        });

        return element;
    }


    function register_overview() {
        const overviewElements = document.querySelectorAll('.overview');

        document.addEventListener('mousemove', (event) => {
            overviewElements.forEach(overview => {
                const rect = overview.getBoundingClientRect();
                const distanceX = Math.abs(event.clientX - (rect.left + rect.width / 2));
                const distanceY = Math.abs(event.clientY - (rect.top + rect.height / 2));

                // Check if the cursor is within 8rem (128px) of the overview element
                if (distanceX < 60 && distanceY < 60) {
                    const activeElement = document.activeElement;

                    // Check if the active element shares the same parent as the overview
                    if (activeElement && activeElement.parentNode === overview.parentNode) {
                        //console.log(`Cursor close to ${overview.innerText}`);
                        // You can add additional actions here, like changing styles or showing a message
                        //overview.style.opacity = '1'; // Example action
                    }

                    overview.style.opacity = '1';
                } else {
                    // Reset the style if not close
                    overview.style.opacity = '0';
                }
            });
        });

    }
</script>
</script>