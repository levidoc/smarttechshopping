<div class="container">
  <div class="mobile-sidebar">
    <div class="header">
      <div onclick="change_page(`profile`)" class="user-settings">
        <img class="user-img"
          style="filter: contrast(0.2)"
          src="trash/profile.png" alt="Profile" />
        <div class="user-name">Black Sheep</div>
      </div>
    </div>
  </div>

  <div class="inverse-large-mobile-options"> 
  <a class="logo-expand-top" style="z-index: 900; position: fixed;">
    <div onclick="document.getElementById('sidebar').style.display = 'block'" style=" background-color: #6c2bd9;
              padding: 0.7rem;
              border-radius: 1rem;
              width: 100%;
              max-width: fit-content;
              margin: 2rem 0rem 0px 0.7rem;">
      <img src="/@rescources/icons/menu/" style="max-width: 2rem; height: 100%">
    </div>
  </a>
</div>

  <div class="sidebar" id="sidebar">
    <div class="mobile-options large-mobile-options">
      <div style="  display: flex; flex-direction: row-reverse; margin-top: 1rem;">
        <svg style="max-width:2.5rem; filter:contrast(0);  " onclick="document.getElementById('sidebar').style.display = 'none'" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="#292D32"></path>
          </g>
        </svg>
      </div>
    </div>

    <a class="logo-expand-top" style="z-index: 1000; position: fixed;">
      Cloud Host
      <div
        style="
              background-color: #6c2bd9;
              padding: 4px 12px;
              border-radius: 2rem;
              width: 100%;
              max-width: fit-content;
            ">
        <span
          style="
                font-variant: small-caps;
                font: menu;
                font-sie: 8px;
                color: #ffffff;
              ">levidoc</span>
      </div>
    </a>

    <div class="side-wrapper">
      <div style="
              display: flex;
              flex-direction: column;
              align-items: center;
              padding: 0px 5px 20px 5px;
            ">
        <img src="<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . "/@rescources/site/favicon/" ?>" style="max-width:8rem;padding: 8vh 0px 1vh 0px;">


        <div class="side-title" style="margin-bottom: 5px; font-size:1rem;"></div>
        <span style="
                font-size: 0.7rem;
                font-weight: 900;
                color: #ffffff33;
                text-align: center;
              ">Control Panel</span>
        <div class="side-title"></div>
      </div>

      <div id="main_menu_section_holder" style="display: block;">
        <div class="side-title">Main Menu</div>

        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('media') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Media Library
          </a>
        </div>
        <br>


        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('inventory') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Inventory
          </a>
        </div>
        <br>

        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('category') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Categories
          </a>
        </div>
        <br>

        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('contact-form') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Contact Form
          </a>
        </div>

        <br />
        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('faq') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            FAQ
          </a>
        </div>
        <br />

        <div class="side-menu">
          <a
            onclick="window.location = '<?php echo change_page('settings') ?>'"
            class="sidebar-link trending"
            href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Settings
          </a>
        </div>
        <br>

      </div>
    </div>

    <div class="side-wrapper">
      <br>
      <div class="side-title"> <!-- Title Menu --> </div>
      <div class="side-menu">
        <a class="sidebar-link" onclick="window.location = '<?php echo change_page('quit') ?>'">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.33 2h9.34c3.4 0 5.32 1.93 5.33 5.33v9.34c0 3.4-1.93 5.33-5.33 5.33H7.33C3.93 22 2 20.07 2 16.67V7.33C2 3.93 3.93 2 7.33 2zm4.72 15.86c.43 0 .79-.32.83-.75V6.92a.815.815 0 00-.38-.79.84.84 0 00-1.28.79v10.19c.05.43.41.75.83.75zm4.6 0c.42 0 .78-.32.83-.75v-3.28a.839.839 0 00-1.28-.79.806.806 0 00-.38.79v3.28c.04.43.4.75.83.75zm-8.43-.75a.827.827 0 01-.83.75c-.43 0-.79-.32-.83-.75V10.2a.84.84 0 01.39-.79c.27-.17.61-.17.88 0s.42.48.39.79v6.91z" />
          </svg>
          Quit
        </a>

        <div onclick="window.location = '<?php echo change_page('profile') ?>'" style="margin: 0px; padding:1rem 0px; " class="user-settings">
          <!-- <img class="user-img"
                    style="filter: contrast(0.2)"
                    src="trash/profile.png" alt="Profile" /> -->

          <img class="user-img" alt="Reiddrop" src="/@media/3b1a2a3950a9d068bf62ac47efbb584027e4e579100f157f580e1571fba295a5/">
          <div class="user-name">Reiddrop</div>
        </div>

      </div>
    </div>

  </div>

  <div>

  </div>