
<script>
          function setmenu_option(section = "main_menu") {
            const localstorage_container = "menu_container";
            localStorage.setItem(localstorage_container, section);
          }

          function display_menu(section = "main_menu") {
            switch (section) {
              case "ïnventory_menu":
                document.getElementById("main_menu").style.display = "none";
                document.getElementById("ïnventory_menu").style.display =
                  "block";
                document.getElementById("market_menu").style.display = "none";
                document.getElementById(
                  "complimentary_site_menu"
                ).style.display = "none";

                document.getElementById("mobile_main_menu").style.display =
                  "none";
                document.getElementById("mobile_ïnventory_menu").style.display =
                  "block";
                document.getElementById("mobile_market_menu").style.display =
                  "none";
                break;

              case "market_menu":
                document.getElementById("main_menu").style.display = "none";
                document.getElementById("ïnventory_menu").style.display =
                  "none";
                document.getElementById("market_menu").style.display = "block";
                document.getElementById(
                  "complimentary_site_menu"
                ).style.display = "none";

                document.getElementById("mobile_main_menu").style.display =
                  "none";
                document.getElementById("mobile_ïnventory_menu").style.display =
                  "none";
                document.getElementById("mobile_market_menu").style.display =
                  "block";
                break;
              case "complimentary_site_menu":
                document.getElementById("main_menu").style.display = "none";
                document.getElementById("ïnventory_menu").style.display =
                  "none";
                document.getElementById("market_menu").style.display = "none";
                document.getElementById(
                  "complimentary_site_menu"
                ).style.display = "block";

                document.getElementById("mobile_main_menu").style.display =
                  "none";
                document.getElementById("mobile_ïnventory_menu").style.display =
                  "none";
                document.getElementById("mobile_market_menu").style.display =
                  "block";
                break;
              default:
                document.getElementById("market_menu").style.display = "none";
                document.getElementById("main_menu").style.display = "block";
                document.getElementById("ïnventory_menu").style.display =
                  "none";
                document.getElementById(
                  "complimentary_site_menu"
                ).style.display = "none";

                document.getElementById("mobile_main_menu").style.display =
                  "block";
                document.getElementById("mobile_ïnventory_menu").style.display =
                  "none";
                document.getElementById("mobile_market_menu").style.display =
                  "none";
                break;
            }

            setmenu_option(section);
          }

          function oncreate_menu_option() {
            const localstorage_container = "menu_container";
            const available_data = localStorage.getItem(localstorage_container);

            display_menu(available_data);
          }

          oncreate_menu_option();

          function detect_premium_container() {
            let file_path = "php/detect_premium_status.php";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                var data_handle = this.responseText;
                if (document.getElementById("defect_container")) {
                  document.getElementById("defect_container").innerHTML =
                    data_handle;
                }
              }
            };
            xhttp.open("GET", file_path, true);
            xhttp.send();
          }

          setInterval(detect_premium_container, 2000);

          //const lock = await navigator.wakeLock.request('screen');
        </script>