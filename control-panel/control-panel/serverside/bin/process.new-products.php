<?php 

#Search The Database For The Tokens 
$data_set = [
    "username" => strtoupper(github_credentials()),
    "image" => "http://localhost/online-store.varsitymarket.package/control-panel/favicon.png",
    "repository" => "VM-STORE",
    "tokens" => "*******************SEYG",
    "link" => "https://github.com/levidoc/vm-store/", 
]; 

$page_ = '        
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Github Control
        </div>

        <div class="main-blog anim" style="--delay: 0.1s; width: 100%; height: max-content; background-color: bisque; background: linear-gradient(181deg, #8e8e8f, transparent); margin: 1rem 0rem;">
            <div class="main-blog__author">
                <div class="author-img__wrapper">
                    <img class="author-img" src="[USERNAME_IMAGE]">
                </div>
                <div class="author-detail">
                    <div class="author-name">[USERNAME_PLACEHOLDER]</div>
                    <div class="author-info">[GITHUB_LINK]</div>
                </div>
            </div>


            <div class="main-blog__time">Github Signature</div>
        </div>

        <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
            <div class="video-wrapper"></div>
            <div class="video-name">
                <div class="small-header anim" style="--delay: .3s">Github Configuration</div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">Username</div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%;">
                    <input value="[USERNAME_PLACEHOLDER]" type="text" placeholder="Username" id="edt_blog_username" style="background-image: none; max-width: 100%;">
                </div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">Project Repository</div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%;">
                    <input value="[REPOSITORY]" type="text" id="edt_blog_image" placeholder="https://link-to-image.com" style="background-image: none;">
                </div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">Github Tokens</div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%;">
                    <input value="[TOKENS]" type="text" id="edt_blog_image" placeholder="[TOKENS]" style="background-image: none;">
                </div>
            </div>

            <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px; ">
                <button style="margin: 12px 20px 0;">
                    Reconfigure Account
                </button>
            </div>

            <div class="video-view"></div>
        </div>
';

echo ($page_); 
?>