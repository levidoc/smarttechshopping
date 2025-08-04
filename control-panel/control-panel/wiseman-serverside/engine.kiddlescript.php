<!-- Engine Header Section -->

<style>
    :root {
        --body-font: "Inter", sans-serif;
        --theme-bg: #1f1d2b;
        --body-color: #808191;
        --button-bg: #353340;
        --border-color: rgb(128 129 145 / 24%);
        --video-bg: #252936;
        --delay: 0s;

    }

    .wsm-builder-header {
        padding: 10px 0px 0px 0px !important;
        min-height: 2.5rem;
        width: 100% !important;
        position: fixed !important;
        z-index: 1000000 !important;
        top: 0 !important;
        left: calc(0% - 0rem) !important;
        background-color: rgb(20 19 26) !important;
        overflow-x: hidden !important;
        transition: 0.5s !important;
        max-width: 100% !important;
        opacity: 1 !important;
        pointer-events: all !important;
        border-radius: 0rem 0rem 10px 10px;
    }

    .wsm-builder-header .wsm-container {
        display: flex;
        flex-wrap: wrap;
        margin: 4px 8px 10px 10px;
        justify-content: flex-end;
    }

    .wsm-builder-header .wsm-container button {
        display: flex;
        align-items: center;
        background-color: var(--button-bg);
        color: #fff;
        border: 0;
        font-family: var(--body-font);
        border-radius: 8px;
        padding: 10px 16px;
        font-size: 14px;
        cursor: pointer;
    }

    .wsm-builder-header .wsm-container .tool-option {
        align-items: center;
        text-decoration: none;
        padding: 10px 14px;
        width: fit-content;
        height: fit-content;
        color: var(--body-color);
        font-family: var(--body-font);
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div>
    <div class="wsm-builder-header">
        <div class="wsm-container">
            <div class="tool-option" title="Undo Last Action">
                <i class="fa-solid fa-laptop"></i> Frame
            </div>

            <div onclick="open_element()" class="tool-option" title="Undo Last Action">
                <i class="fa-solid fa-cubes-stacked"></i> Elements Pallete
            </div>
            <div onclick="open_block()" class="tool-option" title="Open Block Pallete">
                <i class="fa-solid fa-shapes"></i> Block Pallete
            </div>
            <div class="tool-option" title="Undo Last Action">
                <i class="fa-solid fa-gear"></i> Settings
            </div>
            <div class="tool-option" title="Undo Last Action">
                <i class="fa-solid fa-arrow-rotate-left"></i> Undo Changes
            </div>
            <div class="tool-option" title="Redo Last Action">
                Redo Changes <i class="fa-solid fa-arrow-rotate-right"></i>
            </div>
            <button>Save Changes</button>
        </div>
    </div>
</div>

<!-- Engine Header Section -->


<!-- Engine Block Pallete Section -->
<style>
    .wsm_element_block_pallete {
        padding: 10px 0px 0px 0px !important;
        min-height: 100%;
        width: 100% !important;
        position: fixed !important;
        z-index: 1000000 !important;
        top: 0 !important;
        left: calc(0% - 0rem) !important;
        background-color: rgb(31 29 43) !important;
        overflow-x: hidden !important;
        transition: 0.5s !important;
        max-width: 100% !important;
        opacity: 1 !important;
        pointer-events: all !important;
        border-radius: 0rem 0rem 10px 10px;
        display: none;
    }

    .wsm_element_block_pallete .wsm-container .grid {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(4, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
    }

    .wsm_element_block_pallete .wsm-container .grid .blocks {
        margin: auto;
        text-align: center;
        color: #818181;
        width: 100%;
        border-radius: 0.4rem;
        background-color: #ffffff17;
        padding: 3px 0px;
    }

    .wsm_element_block_pallete .wsm-container .grid .blocks .html_content {
        background-color: white;
        border-width: 1px;
        border-color: #2c42f7b3;
        border-style: solid;
        border-radius: 5px;
        padding: 2rem 1rem;
    }

    .wsm_element_block_pallete .tag {
        color: #818181;
        font-family: var(--body-font);
    }

    .wsm_element_content_title {
        font-size: 0.6rem;
        font-weight: bolder;
        font-family: var(--body-font);
    }

    .wsm_element_block_pallete .wsm-container .pallete {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px 0px 0px;
    }
</style>
<div class="wsm_element_block_pallete" id="wsm_block_pallete">
    <div class="wsm-container">
        <div class="pallete">
            <h2 class="tag">Block Pallete</h2>

            <h2 onclick="close_block()" class="tag"><i class="fa-solid fa-xmark"></i></h2>
        </div>
        <h2 class="tag">Theme Block</h2>
        <div class="grid">
            <div class="blocks" onclick="add_block(); close_block(); ">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-2" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-3" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-4" x="0" y="0" width="22" height="22"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="L-to-R" transform="translate(-58.000000, -447.000000)">
                                <g id="Group-5" transform="translate(58.000000, 447.000000)">
                                    <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                    <g id="Group-10" transform="translate(5.000000, 24.000000)">
                                        <g id="Group-6">
                                            <g id="Group-21">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <g id="Group-21" transform="translate(50.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <g id="Group-21" transform="translate(75.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="5" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="30" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="55" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="80" y="25" width="12" height="1"></rect>
                                            <g id="Group-21" transform="translate(25.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="18" height="18"></rect>
                            <rect id="path-2" x="0" y="0" width="18" height="18"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="L-to-R" transform="translate(-58.000000, -365.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-15" transform="translate(0.000000, 129.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <g id="Group-21" transform="translate(8.000000, 26.000000)">
                                            <g id="Rectangle">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="17" height="17"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.10037841 8.28357339 8.23167991 9.42369344 10.8010893 5.72727273 14.4755245 11.4545455 4.90909091 11.4545455"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="6.73426573" cy="5.91608392" r="1.00699301"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="30" y="28" width="15" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="30" y="36" width="20" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="30" y="41" width="20" height="1"></rect>
                                        <g id="Group-21" transform="translate(57.000000, 26.000000)">
                                            <g id="Rectangle">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="17" height="17"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.10037841 8.28357339 8.23167991 9.42369344 10.8010893 5.72727273 14.4755245 11.4545455 4.90909091 11.4545455"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="6.73426573" cy="5.91608392" r="1.00699301"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="80" y="28" width="15" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="80" y="36" width="20" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="80" y="41" width="20" height="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="44" height="26"></rect>
                            <rect id="path-2" x="0" y="0" width="44" height="34"></rect>
                            <rect id="path-3" x="0" y="0" width="44" height="34"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="winner-copy-5" transform="translate(-174.000000, -283.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-14" transform="translate(116.000000, 47.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="11" y="51" width="39" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="11" y="59" width="39" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="15" y="64" width="30" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="59" y="59" width="39" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="63" y="64" width="30" height="1"></rect>
                                        <g id="Group-4" transform="translate(8.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-1"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="25"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 13.4633821 19.6563122 15.4540679 24.0304259 9 30.2857143 19 14 19"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="8.71428571" r="1.71428571"></circle>
                                        </g>
                                        <g id="Group-4" transform="translate(8.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-2"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                        </g>
                                        <g id="Group-4" transform="translate(56.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-3"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="59" y="51" width="39" height="2"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="44" height="34"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="winner-copy-5" transform="translate(-58.000000, -283.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-13" transform="translate(0.000000, 47.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <g id="Group-4" transform="translate(8.000000, 20.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-1"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="57" y="23" width="39" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="31" width="43" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="36" width="43" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="41" width="22.5599995" height="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
        </div>
        <h2 class="tag">Content Block</h2>
        <div class="grid">
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="24" height="24"></rect>
                            <rect id="path-2" x="0" y="0" width="24" height="24"></rect>
                            <rect id="path-3" x="0" y="0" width="24" height="24"></rect>
                            <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="rect-1"></path>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="winner-copy-5" transform="translate(-174.000000, -365.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-17" transform="translate(116.000000, 129.000000)">
                                        <g id="Rectangle-47">
                                            <use fill-opacity="0" fill="#FFFFFF" fill-rule="evenodd" xlink:href="#rect-1"></use>
                                        </g>
                                        <g id="Group-3" transform="translate(8.000000, 13.000000)">
                                            <g id="Rectangle-122">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="23" height="23"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="8.67824028 12.1243675 10.0609421 13.5178475 13.2013314 9 17.6923077 16 6 16"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="8.46153846" cy="8.23076923" r="1.23076923"></circle>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="8" y="43" width="24" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="8" y="51" width="24" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="8" y="56" width="24" height="1"></rect>
                                        <g id="Group-3" transform="translate(42.000000, 13.000000)">
                                            <g id="Rectangle-122">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="23" height="23"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="8.67824028 12.1243675 10.0609421 13.5178475 13.2013314 9 17.6923077 16 6 16"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="8.46153846" cy="8.23076923" r="1.23076923"></circle>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="42" y="43" width="24" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="42" y="51" width="24" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="42" y="56" width="24" height="1"></rect>
                                        <g id="Group-3" transform="translate(76.000000, 13.000000)">
                                            <g id="Rectangle-122">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="23" height="23"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="8.67824028 12.1243675 10.0609421 13.5178475 13.2013314 9 17.6923077 16 6 16"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="8.46153846" cy="8.23076923" r="1.23076923"></circle>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="76" y="43" width="24" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="76" y="51" width="24" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="76" y="56" width="24" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="11" y="61" width="18" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="45" y="61" width="18" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="79" y="61" width="18" height="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-2" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-3" x="0" y="0" width="22" height="22"></rect>
                            <rect id="path-4" x="0" y="0" width="22" height="22"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="L-to-R" transform="translate(-58.000000, -447.000000)">
                                <g id="Group-5" transform="translate(58.000000, 447.000000)">
                                    <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                    <g id="Group-10" transform="translate(5.000000, 24.000000)">
                                        <g id="Group-6">
                                            <g id="Group-21">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <g id="Group-21" transform="translate(50.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <g id="Group-21" transform="translate(75.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="5" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="30" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="55" y="25" width="12" height="1"></rect>
                                            <rect id="Rectangle-2" fill="#9E9E9E" x="80" y="25" width="12" height="1"></rect>
                                            <g id="Group-21" transform="translate(25.000000, 0.000000)">
                                                <g id="Rectangle">
                                                    <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="21" height="21"></rect>
                                                </g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.67824028 10.1243675 9.06094211 11.5178475 12.2013314 7 16.6923077 14 5 14"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="7.23076923" cy="7.23076923" r="1.23076923"></circle>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="18" height="18"></rect>
                            <rect id="path-2" x="0" y="0" width="18" height="18"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="L-to-R" transform="translate(-58.000000, -365.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-15" transform="translate(0.000000, 129.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <g id="Group-21" transform="translate(8.000000, 26.000000)">
                                            <g id="Rectangle">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="17" height="17"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.10037841 8.28357339 8.23167991 9.42369344 10.8010893 5.72727273 14.4755245 11.4545455 4.90909091 11.4545455"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="6.73426573" cy="5.91608392" r="1.00699301"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="30" y="28" width="15" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="30" y="36" width="20" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="30" y="41" width="20" height="1"></rect>
                                        <g id="Group-21" transform="translate(57.000000, 26.000000)">
                                            <g id="Rectangle">
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="17" height="17"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="7.10037841 8.28357339 8.23167991 9.42369344 10.8010893 5.72727273 14.4755245 11.4545455 4.90909091 11.4545455"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="6.73426573" cy="5.91608392" r="1.00699301"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="80" y="28" width="15" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="80" y="36" width="20" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="80" y="41" width="20" height="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="44" height="26"></rect>
                            <rect id="path-2" x="0" y="0" width="44" height="34"></rect>
                            <rect id="path-3" x="0" y="0" width="44" height="34"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="winner-copy-5" transform="translate(-174.000000, -283.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-14" transform="translate(116.000000, 47.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="11" y="51" width="39" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="11" y="59" width="39" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="15" y="64" width="30" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="59" y="59" width="39" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="63" y="64" width="30" height="1"></rect>
                                        <g id="Group-4" transform="translate(8.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-1"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="25"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 13.4633821 19.6563122 15.4540679 24.0304259 9 30.2857143 19 14 19"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="8.71428571" r="1.71428571"></circle>
                                        </g>
                                        <g id="Group-4" transform="translate(8.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-2"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                        </g>
                                        <g id="Group-4" transform="translate(56.000000, 10.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-3"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                            <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="59" y="51" width="39" height="2"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <svg width="108px" height="74px" viewBox="0 0 108 74" version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path-1" x="0" y="0" width="44" height="34"></rect>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="winner-copy-5" transform="translate(-58.000000, -283.000000)">
                                <g id="Group-11" transform="translate(58.000000, 236.000000)">
                                    <g id="Group-13" transform="translate(0.000000, 47.000000)">
                                        <path d="M0,0.990129262 C0,0.44329597 0.446521291,0 1.00019413,0 L106.999806,0 C107.552198,0 108,0.453369457 108,0.990129262 L108,73.0098707 C108,73.556704 107.553479,74 106.999806,74 L1.00019413,74 C0.447802166,74 0,73.5466305 0,73.0098707 L0,0.990129262 Z" id="Rectangle-47"></path>
                                        <g id="Group-4" transform="translate(8.000000, 20.000000)">
                                            <g id="Rectangle-122">
                                                <use fill="#FDFDFD" fill-rule="evenodd" xlink:href="#path-1"></use>
                                                <rect stroke-opacity="0.2" stroke="#979797" stroke-width="1" x="0.5" y="0.5" width="43" height="33"></rect>
                                            </g>
                                            <g>
                                                <polygon id="Rectangle-624" fill="#666666" fill-rule="evenodd" points="17.7304061 16.4633821 19.6563122 18.4540679 24.0304259 12 30.2857143 22 14 22"></polygon>
                                                <circle id="Oval-10" fill="#666666" fill-rule="evenodd" cx="17.4285714" cy="11.7142857" r="1.71428571"></circle>
                                            </g>
                                        </g>
                                        <rect id="Rectangle-122" fill="#9E9E9E" x="57" y="23" width="39" height="2"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="31" width="43" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="36" width="43" height="1"></rect>
                                        <rect id="Rectangle-122" fill="#E0E0E0" x="57" y="41" width="22.5599995" height="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div>
                    <h2 class="wsm_element_content_title">3 Content </h2>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function close_block() {
        let x = document.getElementById('wsm_block_pallete');
        x.style.display = "none";
    }

    function open_block() {
        let x = document.getElementById('wsm_block_pallete');
        x.style.display = "block";
    }
</script>
<!-- Engine Block Pallete Section -->

<!-- Engine Element Pallete Section -->
<style>

</style>
<div class="wsm_element_block_pallete" id="wsm_element_pallete">
    <div class="wsm-container">
        <div class="pallete">
            <h2 class="tag">Element Pallete</h2>

            <h2 onclick="close_element()" class="tag"><i class="fa-solid fa-xmark"></i></h2>
        </div>
        <div class="grid">
            <div class="blocks">
                <div class="html_content">
                    <img width="108px" height="108px" src="https://img.icons8.com/carbon-copy/100/image.png" alt="image" />
                </div>
                <div>
                    <h2 class="wsm_element_content_title">Image </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <img width="100" height="100" src="https://img.icons8.com/forma-bold-filled/100/text.png" alt="text" />
                </div>
                <div>
                    <h2 class="wsm_element_content_title">Text </h2>
                </div>
            </div>
            <div class="blocks">
                <div class="html_content">
                    <img width="100" height="100" src="https://img.icons8.com/ios-filled/100/button2.png" alt="button2" />
                </div>
                <div>
                    <h2 class="wsm_element_content_title">Button </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function close_element() {
        let x = document.getElementById('wsm_element_pallete');
        x.style.display = "none";
    }

    function open_element() {
        let x = document.getElementById('wsm_element_pallete');
        x.style.display = "block";
    }
</script>
<!-- Engine Element Pallete Section -->

<!-- Canvas Block -->
<style>
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

    #application_canvas {
        overflow: auto !important;
        width: 100% !important;
        height: 100%;
        min-height: 4rem;
        margin: 0 !important;
        cursor: url("assets/cursor.png"), auto;
        scale: 0.96;
        padding: 4rem 0rem 0rem 0rem;

        background-color: #212228;
        background-image: linear-gradient(#292a30 0.1em, transparent .1em),
            linear-gradient(90deg, #292a30 .1em, transparent .1em);
        background-size: 2em 2em;
    }

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
        background: repeating-linear-gradient(180deg, #0000001c, transparent 50vw);
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
        background: linear-gradient(20deg, #0000001c, #0000001c);
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

    .object_323652434960224443604438263641394343 {
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

    .object_323652434960224443604438263641394343 .noto-sans-hk-900 {
        font-family: "Noto Sans HK", serif;
        font-optical-sizing: auto;
        font-weight: 900;
        font-style: normal;
        color: #f0f8ffc9;
    }

    * {
        overflow: hidden;
    }

    .object_3236524349602244505835413238235834465542473638_ {
        overflow-y: scroll !important;
        /* Enable vertical scrolling */
        height: 300px;
        /* Set a height for the scrollable area */
    }

    /* Custom Scrollbar */
    .object_3236524349602244505835413238235834465542473638_::-webkit-scrollbar {
        width: 5px !important;
        /* Width of the scrollbar */
    }

    .object_3236524349602244505835413238235834465542473638_::-webkit-scrollbar-track {
        background: #f0f0f0 !important;
        /* Background of the scrollbar track */
        border-radius: 10px !important;
        /* Rounded corners for the track */
    }

    .object_3236524349602244505835413238235834465542473638_::-webkit-scrollbar-thumb {
        background: #888 !important;
        /* Color of the scrollbar thumb */
        border-radius: 10px !important;
        /* Rounded corners for the thumb */
    }

    .object_3236524349602244505835413238235834465542473638_::-webkit-scrollbar-thumb:hover {
        background: #555 !important;
        /* Darker color on hover */
    }

    .object_323652434960224443604438263641394343 .button-tool {
        display: flex !important;
        justify-content: space-between !important;
        padding: 10px 17px;
        text-decoration: none !important;
        font-size: 2vh !important;
        color: #818181 !important;
        transition: 0.3s !important;
        align-items: center;
    }

    #object_323652434960225847543440265436384544 {
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

    .wsm-builder-engine-block {
        background-color: #ffffff;
        min-height: 20rem;
        height: fit-content;
        max-height: 100vh;
        background-image: linear-gradient(#292a300f 0.1em, transparent .1em), linear-gradient(90deg, #292a300f .1em, transparent .1em);
        background-size: 1.2rem 1.2rem;
        padding: 0px;
        margin: 10px;
        border: 2px dashed #6934b7;
        position: relative;

    }

    .engine-element-cell {
        position: unset;
        width: fit-content;
        height: max-content;
        border: 2px dashed rgb(0 0 0);
        padding: 5px;
        margin: 0px;
        border-radius: 0px;
        overflow: visible;
    }

    /* Top left corner */
    .engine-element-cell::before {
        top: -5px;
        left: -5px;
    }

    /* Top right corner */
    .engine-element-cell::after {
        top: -5px;
        right: -5px;
    }

    .engine-element {
        z-index: 1;
        position: relative;
        overflow: visible;
        /* border: 2px solid black; */
        margin: 10px;
        border-radius: 10px;
        display: inline-block;
        padding: 0px;
    }

    .engine-element::before,
    .engine-element::after,
    .engine-element .dot {
        /*content: ''; */
        position: absolute;
        width: 10px;
        /* Size of the dot */
        height: 10px;
        /* Size of the dot */
        background-color: black;
        /* Dot color */
        border-radius: 50%;
        /* Make it circular */
    }

    /* Top left corner */
    .engine-element::before {
        /* top: -5px; */
        /* left: -5px; */
    }

    /* Top right corner */
    .engine-element::after {
        /* top: -5px; */
        /*right: -5px; */
    }

    /* Bottom left corner */
    .dot.bottom-left {
        bottom: -5px;
        left: -5px;
        cursor: sw-resize;

    }

    /* Bottom right corner */
    .dot.bottom-right {
        bottom: -5px;
        right: -5px;
        cursor: se-resize;
    }

    .dot.top-right {
        top: -5px;
        right: -5px;
        cursor: ne-resize;
    }

    .dot.top-left {
        top: -5px;
        left: -5px;
        cursor: nw-resize;
    }

    .element-control {
        overflow: auto;
        display: block;
        position: absolute;
    }
</style>

</style>
<div id="application_canvas">
    <div class="wsm-builder-engine-block">

        <div class="element-control">
            <div class="engine-element">
                <div class="dot bottom-left"></div>
                <div class="dot top-left"></div>
                <div class="engine-element-cell">
                    <h1 contenteditable="true">Some Dummy Text</h1>
                </div>
                <div class="dot top-right"></div>
                <div class="dot bottom-right"></div>
            </div>
        </div>


        <div class="element-control" style="display: none;">
            <div class="engine-element">
                <div class="dot bottom-left"></div>
                <div class="engine-element-cell">
                    <p>Some Dummy Text</p>
                </div>
                <div class="dot bottom-right"></div>
            </div>
        </div>

        <div class="element-control" style="display: none;">
            <div class="engine-element">
                <div class="dot bottom-left"></div>
                <div class="engine-element-cell">
                    <a contenteditable="true" href="about.html" class="filled-button">Read More</a>
                </div>
                <div class="dot bottom-right"></div>
            </div>
        </div>

        <div class="element-control" style="display: none;">

            <div class="engine-element">
                <div class="dot bottom-left"></div>
                <div class="engine-element-cell"><img src="http://localhost/SKYNET/theme/templatemo_546_sixteen_clothing/assets/images/feature-image.jpg" width="100%" height="100%"></div>
                <div class="dot bottom-right"></div>
            </div>

        </div>


    </div>
</div>
<script>
    const boxes = document.querySelectorAll('.element-control');
    const dots = document.querySelectorAll('.dot');

    boxes.forEach(box => {
        dragElement(box);


        // Get all containers
        const containers = document.querySelectorAll('.element-control');

        containers.forEach(container => {
            const dot = container.querySelector('.dot');
            dot.parentNode.dragElement = false;
            const resizableDiv = container.querySelector('.engine-element-cell');

            let isDragging = false;
            let initialX, initialY;
            let initialWidth, initialHeight;

            dot.addEventListener('mousedown', (e) => {
                dot.parentNode.dragElement = false;
                isDragging = true;
                initialX = e.clientX;
                initialY = e.clientY;
                initialWidth = resizableDiv.offsetWidth;
                initialHeight = resizableDiv.offsetHeight;

                const divRect = resizableDiv.getBoundingClientRect();
                //dot.style.left = divRect.right - container.offsetLeft + 'px'; // Adjust for container offset
                //dot.style.top = divRect.bottom - container.offsetTop+ 'px'; // Adjust for container offset
            });


            container.addEventListener('mousemove', (e) => {
                dot.parentNode.dragElement = false;
                if (isDragging) {
                    const deltaX = e.clientX - initialX;
                    const deltaY = e.clientY - initialY;

                    const newWidth = initialWidth + deltaX;
                    const newHeight = initialHeight + deltaY;

                    resizableDiv.style.width = newWidth + 'px';
                    resizableDiv.style.height = newHeight + 'px';

                    const divRect = resizableDiv.getBoundingClientRect();
                    //dot.style.left = divRect.right - container.offsetLeft + 'px'; // Adjust for container offset
                    //dot.style.top = divRect.bottom - container.offsetTop + 'px'; // Adjust for container offset
                }

                dot.parentNode.dragElement = false;
            });

            container.addEventListener('mouseup', () => {
                isDragging = false;
            });
        });


    });

    dots.forEach(dot => {
        resize_element(dot);
    });

    function resize_element(element) {
        const box = element;
        var x, y, h, w;


    }

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            // if present, the header is where you move the DIV from:
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            // otherwise, move the DIV from anywhere inside the DIV:
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.ondrag = closeDragElement;

            elmnt.style.cursor = "grab";

            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
            document.ondrag = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

            //elmnt.style.left = (elmnt.offsetLeft - 1 ) + "px"; 

            //console.log('X1: ',pos1,' X2: ',elmnt.offsetLeft); 
            //device_storage(elmnt.id + '_top', elmnt.style.top);
            //device_storage(elmnt.id + '_left', elmnt.style.left);

            elmnt.style.cursor = "grabbing";

        }

        function closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
            document.dragElement = false;

            elmnt.style.cursor = "default";
        }
    }
</script>

<style>
    .wsm-builder-block {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
    }

    a.filled-button {
        background-color: #f33f3f;
        color: #fff;
        font-size: 14px;
        text-transform: capitalize;
        font-weight: 300;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        transition: all 0.3s;
    }


    a.filled-button:hover {
        background-color: #121212;
        color: #fff;
    }
</style>
<template>
    <div class="wsm-builder-block">
        <div class="wsm-builder-section">
            <img src="https://img.icons8.com/carbon-copy/100/image.png">
        </div>
        <div class="wsm-builder-section">
            <h2>Click To Change Text</h2>
            <p>Lorem Isup And All That Hood Placeholder Text</p>
        </div>
    </div>
</template>
<script>
    function undo_changes() {}

    function redo_changes() {}

    function add_block(block_id = 'blank') {
        //This Function Will Add Blocks to the application block
        block_templates = document.getElementsByTagName("template");
        block_template = block_templates[0];
        let block = block_template.content.cloneNode(true);
        let canvas = document.getElementById('application_canvas');
        canvas.appendChild(block);
    }
</script>
<!-- Canvas Block -->