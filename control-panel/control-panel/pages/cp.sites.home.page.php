<div style="width:100%; max-width:100vw; height:100%; max-height:100vh; padding:20px; overflow-y: scroll;">
    <br>
    <div class="anim" style="--delay: 0s; text-align: center; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-between;">
        <div style="text-align: left;">
            <h1>Registered Websites </h1><span>Home > <span onclick="window.location = '<?php echo change_page('websites') ?>'">Website</span></span>
        </div>
    </div>

    <div class="video anim" style="--delay: .4s; margin:1rem 0px; ">
        <div class="video-wrapper"></div>
        <div style="padding:15px;">
            <div class="small-header anim" style="--delay: .3s; display: flex; justify-content: space-between;">
                <div>
                    Websites Available
                </div>
                <button onclick="window.location = '<?php echo change_page('create-website') ?>'">Create Site</button>
            </div>

            <style>
                /* From Uiverse.io by Rodrypaladin */
                .card {
                    font-family: "Courier New", Courier, monospace;
                    border-top-left-radius: 12px;
                    border-top-right-radius: 12px;
                    border-bottom-left-radius: 4px;
                    border-bottom-right-radius: 4px;
                    overflow: hidden;
                    background-color: #6934b7;
                    color: black;
                    font: inherit;
                }

                .card__title {
                    color: white;
                    font-weight: bold;
                    padding: 5px 10px;
                    border-bottom: 1px solid rgb(167, 159, 159);
                    font-size: 0.95rem;
                }

                .card__data {
                    font-size: 0.8rem;
                    display: flex;
                    justify-content: space-between;
                    border-right: 0.1px solid rgb(203, 203, 203);
                    border-left: 0.1px solid rgb(203, 203, 203);
                    border-bottom: 1px solid rgb(203, 203, 203);
                }

                .card__right {
                    width: 100%;
                    border-right: 1px solid rgb(203, 203, 203);
                }

                .card__left {
                    width: 100%;
                    max-width: 2rem;
                    text-align: end;
                }

                .item {
                    padding: 3px 0;
                    background-color: white;
                    height: 100%;
                }

                .card__right .item {
                    padding-left: 0.8em;
                }

                .card__left .item {
                    padding-right: 0.8em;
                }

                .item:nth-child(even) {
                    background: rgb(234, 235, 234);
                }
            </style>


            <!-- From Uiverse.io by Rodrypaladin -->
            <?php
            // Example PHP array of websites
            $websites = [
                [
                    'id' => 'XYZD',
                    'name' => 'Site One',
                    'domain' => 'site-one.co.za',
                    'date' => '2024-06-01 10:00:00',
                    'active' => true,
                    'state' => 'active',
                ],
                [
                    'id' => 'XYZD',
                    'name' => 'Site One',
                    'domain' => 'site-one.co.za',
                    'date' => '2024-06-01 10:00:00',
                    'active' => true,
                    'state' => 'active',
                ]
            ];

            // Filter active websites
            $active_websites = array_filter($websites, function ($site) {
                return !empty($site['active']);
            });

            foreach ($active_websites as $site): ?>
                <div class="card">
                    <div class="card__title"><?php echo htmlspecialchars($site['name']); ?></div>
                    <div class="card__data">
                        <div class="card__left">
                            <div class="item">1.</div>
                        </div>
                        <div class="card__right">
                            <div class="item"><?php echo htmlspecialchars($site['domain']); ?></div>
                        </div>
                        <div class="card__right">
                            <div class="item">
                                <button style="background-color: #252936ed;"><?php echo htmlspecialchars($site['state']); ?></button>
                            </div>
                        </div>
                        <div class="card__right">
                            <div class="item" style="display: flex; align-items: stretch; flex-direction: row; justify-content: space-evenly;">
                                <button onclick="window.location = '<?php echo change_page('website-manager',htmlspecialchars($site['id'])) ?>'">
                                    Manage Site
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <!-- 

    <div class="video anim" style="--delay: .4s; margin:4rem 0px; ">
        <div class="video-wrapper"></div>
        <div class="video-name">
            <div class="small-header anim" style="--delay: .3s">
                <span style="font-size:10px; ">Create a new website in 5 mins</span><br>
                Register Website
            </div>



            <div style="background-image: url('http://127.0.0.1:8000/rescources/theme/oaklyn/undraw_warning_cyit.png'); height: 100%; position-area: center; height: auto; width: 100%; background-position: center; object-fit: cover; aspect-ratio: 10/10; background-size: contain; border-radius: 15px;">

            </div>
        </div>

    </div> 

    -->
</div>