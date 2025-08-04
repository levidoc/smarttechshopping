<body>
  <!-- System Loader -->
  <div>
    <div
      id="system_loader"
      style="width: 100%; height: 100%; background-color: rgb(32 33 36); display:none; ">
      <div
        class="modal"
        style="
            display: block;
            z-index: 1000000000;
            transform: translate(-50%, -50%);
          ">
        <div class="ui-abstergo">
          <div class="abstergo-loader">
            <div></div>
            <div></div>
            <div></div>
          </div>
          <div class="ui-text">
            Processing Request
            <div class="ui-dot"></div>
            <div class="ui-dot"></div>
            <div class="ui-dot"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- System Loader -->

  <!-- Error Report -->
  <div id="error_container" style="display: none">
    <div class="error">
      <div class="error__icon">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          viewBox="0 0 24 24"
          height="24"
          fill="none">
          <path
            fill="#393a37"
            d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
        </svg>
      </div>
      <div id="error__title">Something</div>
      <div class="error__close" onclick="clear_error_dialog();">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          viewBox="0 0 20 20"
          height="20">
          <path
            fill="#393a37"
            d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
        </svg>
      </div>
    </div>
  </div>
  <!-- Error Reporting -->

  <!-- Modal Content -->
  <div id="myModal" class="notification_modal">
    <div class="modal-content">
      <span class="modal-close" onclick="closeModal()">&times;</span>
      <h2 id="modalHeader">Modal Header</h2>
      <p id="modalDetails">Some text in the Modal..</p>
    </div>
  </div>
  <!-- Modal Content -->


  <script>
    "use strict";
    const application_endpoint = <?php _e("'http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . "/serverside/application.php'"); ?>;
    const process_endpoint = <?php _e("'http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . "/serverside/process.php'"); ?>;


    async function sendAndReceiveData(dataToSend, LINK) {
      try {
        const response = await fetch(LINK, {
          method: "POST", // Or 'GET'
          headers: {
            "Content-Type": "application/x-www-form-urlencoded", // Or 'application/json'
          },
          body: dataToSend,
        });

        if (!response.ok) {
          throw new Error(`HTTP error ${response.status}`);
        }
        // Example: Assuming JSON response

        try {
          return response.text();
        } catch (error) {
          return response.json();
        }
        //const data = await response.json(); // Or response.text() for plain text
        //return data;
      } catch (error) {
        error_feedback('Failed To Commuincate With Service');
        console.error("Error:", error);
        // Handle the error (e.g., re-throw, return a default value, show an error message)
        throw error; // Re-throwing allows the calling function to handle the error as well.
      }
    }

    //Function for System Loader 
    function operate_loader(state = "open") {
      let loader_container = document.getElementById('system_loader');

      if (state == "open") {
        loader_container.style.visibility = 'visible';
        loader_container.style.display = "block";
        //Show The Visibility Of The Modal 
      } else {
        loader_container.style.display = "none";
        loader_container.style.visibility = 'hidden';
        //Hide the Visibility of the modal 
      }
    }

    function error_feedback(contents = "Could Not Process Request") {
      const error_container = document.getElementById('error_container');
      const error__title = document.getElementById('error__title');

      error_container.style.display = "flex";
      error__title.innerText = contents;
    }

    function clear_error_dialog() {
      let k = document.getElementById('error_container');
      setTimeout(function() {
        k.style.display = "none";
      }, 500);
    }

    async function change_page(page,data_=false){
      await operate_loader(); 
      const data = new URLSearchParams();
      data.append("page_request",page);
      data.append("page_data",data_);
      data.append("page","menu"); 
      let response = await sendAndReceiveData(data,application_endpoint); 

      if (response.trim() == "PROCEED"){
          
          const gotolink = window.location.href;
          //alert(gotolink); 
          window.location.href = gotolink; 

          window.location.reload(true);

      }else{
        const gotolink = window.location; 
        window.location = gotolink; 


      }

      window.location.reload(true);
      
    }

    function change_menu(potion){
      let exec = device_storage(`<?php echo(base64_encode("MENU_CONFIG")) ?>`,potion,"INSERT");
      let menu_section = document.getElementById("main_menu_section_holder"); 
      let shop_section = document.getElementById("shop_menu_section_holder");
      let advanced_section = document.getElementById("advanced_menu_section_holder");
      let pages_section = document.getElementById('pages_menu_section_holder'); 
      
      shop_section.style.display = "none"; 
      menu_section.style.display = "none";
      advanced_section.style.display = "none";
      pages_section.style.display = "none";  
      
      switch (potion) {
        case "pages":
          pages_section.style.display = "contents";
          break;
        case "shop":
          shop_section.style.display = "contents";
          break;  
      
        default:
          menu_section.style.display = "contents";
          break;
      }

      /* 
      if (potion == "home"){
            shop_section.style.display = "none"; 
            menu_section.style.display = "contents";
            advanced_section.style.display = "none";  
        }else if (potion == "shop"){
            shop_section.style.display = "contents"; 
            menu_section.style.display = "none"; 
            advanced_section.style.display = "none";
        }else if (potion == "advanced"){
            shop_section.style.display = "none"; 
            menu_section.style.display = "none"; 
            advanced_section.style.display = "contents";
        }else{

            //Lost Menu Section

            shop_section.style.display = "none"; 
            menu_section.style.display = "contents";
            advanced_section.style.display = "none";
        }

        */
         
    }
    
    function device_storage(index,data=false,mode="READ"){
        if (mode == "READ"){
            return sessionStorage.getItem(index);
        }else if(mode == "INSERT"){
            if (sessionStorage.setItem(index,data)){
                return true; 
            }else{
                return false; 
            }
        }else if (mode == "DELETE"){
            if (sessionStorage.removeItem(index)){
                return true; 
            }else{
                return false; 
            }
        }
    }

    function reload_menu(){
      let menu_data = device_storage(`<?php echo(base64_encode("MENU_CONFIG")) ?>`);
      if (menu_data == null){
        change_menu('home'); 
      }

      if (((menu_data !== false) || (menu_data !== null)) && (menu_data.length >3)){
        change_menu(menu_data); 
      }else{
        change_menu('home'); 
      }
    }

    function on_window_load(){
      //Configuration For The Main Menu 
      reload_menu(); 
    }

    window.onload = function() {
      on_window_load(); 
    }

  </script>