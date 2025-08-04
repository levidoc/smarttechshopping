<?php 

#Search The Database For The Tokens 
$data_set = [
    "domain" => "immoralclothes.penease.digital",
]; 

$page_ = '        
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Domain Settings
        </div>

        <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
            <div class="video-wrapper"></div>
            <div class="video-name">
                <div class="small-header anim" style="--delay: .3s">
                    <span style="font-size:10px; ">Configure Your Domain</span><br>
                    Website Domain
                </div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">Domain</div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%;">
                    <input value="[DOMAIN]" type="text" placeholder="website.com" id="edt_domain" style="background-image: none; max-width: 100%;">
                </div>
            </div>
            <div class="video-view" style="padding: 10px 20px 0px;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 0px; ">
                    <button>
                        Save Record
                    </button>
                    <button onclick="reset_records()">
                        Reset Records
                    </button>
                </div>
            </div>

            <div class="video-view" style="padding: 10px 20px 0px;">
                For Custom Domains, please use the following DNS records on your system<br>CNAME RECORD
            </div>
            <div class="video-name">
                <div class="search-bar" style="max-width: 100%;">
                    <input value="levidoc.github.io" type="text" id="edt_blog_image" placeholder="https://link-to-image.com" style="background-image: none;">
                </div>
            </div>

            <div class="video-view"></div>
        </div>
';

$output = str_ireplace(
    ['[DOMAIN]'],
    [$data_set['domain']],
    $page_
); 
echo ($output);

?>