<style>
            .fade-box {
              position: absolute;
              z-index: 99999999;
              opacity: 1; /* Initially hidden */
              animation: fadeInOut 2s forwards; /* Apply the animation */
              animation-delay: calc(
                0s + var(--delay, 0s)
              ); /* Optional delay using CSS variables */
            }

            @keyframes fadeInOut {
              0% {
                opacity: 1;
              }
              50% {
                opacity: 1;
              } /* Fade in to full opacity at 50% (halfway) */
              100% {
                opacity: 0;
                display: none;
              } /* Fade out back to transparent */
            }

            /* Example of applying a delay to a specific element */
            #delayed-box {
              --delay: 1s; /* 2-second delay for this element */
            }

            .prevent-container-select {
              -webkit-user-select: none; /* Safari */
              -ms-user-select: none; /* IE 10 and IE 11 */
              user-select: none; /* Standard syntax */
            }
          </style>

          <!-- Cover Branding Letter -->
          <div class="fade-box prevent-container-select" id="delayed-box">
            <div
              style="
                display: block;
                position: fixed;
                z-index: 999999999;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(26 28 35 / 95%);
              "
            >
              <div
                class="min-w-0 p-4 rounded-lg shadow-xs"
                style="
                  width: 90%;
                  max-width: 400px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                "
              >
                <div style="margin: 1.5rem">
                  <div
                    class="animate__animated animate__zoomIn mb-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  >
                    <img
                      draggable="false"
                      style="max-width: 13rem; width: 100%; margin: auto"
                      src="./Store Products_files/favicon.png"
                    />
                    <h2
                      style="
                        font-size: 10px;
                        text-align: center;
                        font-weight: 400;
                        color: #b7b1c1;
                      "
                      class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4"
                    >
                      Powered By VARSITYMARKET<br />
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            id="delete_confirmation_switch_teams"
            style="
              display: none;
              position: fixed;
              z-index: 22;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            "
          >
            <div
              class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              style="
                width: 90%;
                max-width: 400px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              "
            >
              <div style="margin: 1.5rem">
                <div
                  class="flex mb-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  style="
                    justify-content: space-between;
                    align-items: self-start;
                  "
                >
                  <h4
                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  >
                    Delete Quick Link
                  </h4>
                  <i class="fa-solid fa-xmark" @click="remove_team()"></i>
                </div>
                <input
                  type="hidden"
                  id="edt_delete_confirmation_switch_teams"
                />
                <p
                  class="text-gray-700 dark:text-gray-200"
                  style="font-size: 12px"
                >
                  You Wont be able to quickly join in to the store team. This
                  quick link will then be removed from your team history.
                </p>

                <button
                  onclick="proceed_remove_team()"
                  style="
                    display: block;
                    margin: 10px auto;
                    background-color: #6934b7;
                  "
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                >
                  Confirm
                </button>
              </div>
            </div>
          </div>

          <div
            id="confirmation_switch_teams"
            style="
              display: none;
              position: fixed;
              z-index: 22;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            "
          >
            <div
              class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              style="
                width: 90%;
                max-width: 400px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              "
            >
              <div style="margin: 1.5rem">
                <div
                  class="flex mb-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  style="
                    justify-content: space-between;
                    align-items: self-start;
                  "
                >
                  <h4
                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  >
                    Switch Teams
                  </h4>
                  <i class="fa-solid fa-xmark" @click="switch_teams()"></i>
                </div>
                <input type="hidden" id="edt_confirmation_switch_teams" />
                <p
                  class="text-gray-700 dark:text-gray-200"
                  style="font-size: 12px"
                >
                  Are you sure you want to use the quick link to switch store
                  teams.
                </p>

                <button
                  onclick="switch_teams_proceedure()"
                  style="
                    display: block;
                    margin: 10px auto;
                    background-color: #6934b7;
                  "
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                >
                  Confirm
                </button>
              </div>
            </div>
          </div>

          <div
            id="result_switch_teams"
            style="
              display: none;
              position: fixed;
              z-index: 22;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            "
          >
            <div
              class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              style="
                width: 90%;
                max-width: 400px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              "
            >
              <div style="margin: 1.5rem">
                <div
                  class="flex mb-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  style="
                    justify-content: space-between;
                    align-items: self-start;
                  "
                >
                  <h4
                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  >
                    Operation Completed
                  </h4>
                  <i class="fa-solid fa-xmark" @click="message_display_k()"></i>
                </div>
                <p
                  class="text-gray-700 dark:text-gray-200"
                  style="font-size: 12px"
                >
                  You have successfully switched teams, continue exploring and
                  collaborating the team with new data and ideas.
                </p>
              </div>
            </div>
          </div>

          <p
            class="text-gray-700 dark:text-gray-200"
            style="
              font-size: 12px;
              text-align: center;
              padding-top: 50px;
              padding-bottom: 50px;
            "
          >
            <span style="font-size: 8px"
              >This is An authorised Trading Pivot of VarsityMarket
              Technologies<br />
              © VARSITYMARKET, PVT LTD. 2024</span
            ><br /><br />
            Powered by
            <a class="text-purple-600 dark:text-purple-400">VARSITYMARKET </a>
          </p>

          <div id="meta_data_set_container"></div>

          <style>
            body {
              margin: 0;
              overflow: hidden;
              /* Prevent scrolling when dragging */
              position: relative;
            }

            .icon {
              width: 50px;
              height: 50px;
              background-color: #6934b7;
              top: 90vh;
              left: 90vw;
              border-radius: 50%;
              position: absolute;
              cursor: pointer;
              display: flex;
              align-items: center;
              justify-content: center;
              color: white;
              font-size: 24px;
              z-index: 1000000;
              /* Ensure the main icon is above the options */
            }

            .options {
              position: absolute;
              top: 50%;
              /* Center vertically */
              left: 50%;
              /* Center horizontally */
              display: flex;
              justify-content: center;
              align-items: center;
              transform: translate(-50%, -50%);
              /* Center the options */
              opacity: 0;
              /* Initially hidden */
              transition: opacity 0.3s ease;
            }

            .option-icon {
              width: 30px;
              height: 30px;
              background-color: #28a745;
              border-radius: 50%;
              margin: 0 10px;
              /* Space between options */
              display: none;
              align-items: center;
              justify-content: center;
              color: white;
              cursor: pointer;
              position: absolute;
              /* Position for orbiting */
            }

            .menu_options_info_container {
              width: 200px;
              /* background-color: rgba(36, 40, 50, 1);
background-image: linear-gradient(135deg, rgba(36, 40, 50, 1) 0%, rgba(36, 40, 50, 1) 40%, rgba(37, 28, 40, 1) 100%); */

              background-color: rgba(36, 40, 50, 1);
              background-image: linear-gradient(
                139deg,
                rgba(36, 40, 50, 1) 0%,
                rgba(36, 40, 50, 1) 0%,
                rgba(37, 28, 40, 1) 100%
              );

              border-radius: 10px;
              padding: 15px 0px;
              display: flex;
              flex-direction: column;
              gap: 10px;
            }

            .menu_options_info_container .separator {
              border-top: 1.5px solid #42434a;
            }

            .menu_options_info_container .list {
              list-style-type: none;
              display: flex;
              flex-direction: column;
              gap: 8px;
              padding: 0px 10px;
            }

            .menu_options_info_container .list .element {
              display: flex;
              align-items: center;
              color: #7e8590;
              gap: 10px;
              transition: all 0.3s ease-out;
              padding: 4px 7px;
              border-radius: 6px;
              cursor: pointer;
            }

            .menu_options_info_container .list .element svg {
              width: 19px;
              height: 19px;
              transition: all 0.3s ease-out;
            }

            .menu_options_info_container .list .element .label {
              font-weight: 600;
            }

            .menu_options_info_container .list .element:hover {
              background-color: #6934b7;
              color: #ffffff;
              transform: translate(1px, -1px);
            }

            .menu_options_info_container .list .delete:hover {
              background-color: #8e2a2a;
            }

            .menu_options_info_container .list .element:active {
              transform: scale(0.99);
            }

            .menu_options_info_container
              .list:not(:last-child)
              .element:hover
              svg {
              stroke: #ffffff;
            }

            .menu_options_info_container .list:last-child svg {
              stroke: #bd89ff;
            }

            .menu_options_info_container .list:last-child .element {
              color: #bd89ff;
            }

            .menu_options_info_container .list:last-child .element:hover {
              background-color: rgba(56, 45, 71, 0.836);
            }
          </style>

          <div class="icon" id="mainIcon"><i class="fa-solid fa-bell"></i></div>
          <div class="options" id="iconOptions" style="opacity: 0">
            <div
              class="option-icon"
              id="menu_options_info_container_marketplace_notifications"
              style="transform: translate(-5rem, -7rem)"
            >
              <div class="menu_options_info_container">
                <ul class="list">
                  <li class="element">
                    <i class="fa-solid fa-truck-fast"></i>
                    <p class="label">
                      <span style="font-size: 12px">Shipping</span>
                    </p>
                  </li>
                </ul>
                <div class="separator"></div>
                <ul class="list">
                  <li class="element">
                    <i class="fa-solid fa-shop"></i>
                    <p class="label">
                      <span style="font-size: 10px">Marketplace</span>
                    </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <script>
            const mainIcon = document.getElementById("mainIcon");
            const iconOptions = document.getElementById("iconOptions");
            const optionIcons = document.querySelectorAll(".option-icon");

            const menu_options_info_container_marketplace_notifications =
              document.getElementById(
                "menu_options_info_container_marketplace_notifications"
              );

            let offsetX, offsetY;
            let isDragging = false;

            mainIcon.addEventListener("mousedown", (e) => {
              isDragging = true;
              offsetX = e.clientX - mainIcon.getBoundingClientRect().left;
              offsetY = e.clientY - mainIcon.getBoundingClientRect().top;
              iconOptions.style.opacity = "1"; // Show options on click
              positionOptions(); // Position options around main icon
            });

            document.addEventListener("mousemove", (e) => {
              if (isDragging) {
                let x = e.clientX - offsetX;
                let y = e.clientY - offsetY;

                // Restrict dragging within window bounds
                const minX = 0;
                const minY = 0;
                const maxX = window.innerWidth - mainIcon.offsetWidth;
                const maxY = window.innerHeight - mainIcon.offsetHeight;

                x = Math.max(minX, Math.min(maxX, x));
                y = Math.max(minY, Math.min(maxY, y));

                mainIcon.style.left = `${x}px`;
                mainIcon.style.top = `${y}px`;

                menu_options_info_container_marketplace_notifications.style.left = `calc(${x}px - 55vw)`;
                menu_options_info_container_marketplace_notifications.style.top = `calc(${y}px - 65vh)`;
                menu_options_info_container_marketplace_notifications.style.display =
                  "flex";

                menu_options_info_container_marketplace_notifications.style.transform = `translate(-24rem, -13rem)`;
                positionOptions(); // Update option positions
              }
            });

            document.addEventListener("mouseup", () => {
              isDragging = false;
              iconOptions.style.opacity = "0"; // Hide options on mouse up
            });

            mainIcon.addEventListener("click", (e) => {
              iconOptions.style.display = "block";
              e.stopPropagation(); // Prevent mouseup event from hiding options
              iconOptions.style.opacity =
                iconOptions.style.opacity === "1" ? "0" : "1";
              positionOptions(); // Position options when toggled
            });

            function positionOptions() {
              const radius = 70; // Distance from the main icon
              const angleStep = (2 * Math.PI) / optionIcons.length;

              optionIcons.forEach((icon, index) => {
                const angle = angleStep * index;
                const x = Math.cos(angle) * radius;
                const y = Math.sin(angle) * radius;
                icon.style.transform = `translate(${x}px, ${y}px)`;
              });
            }
          </script>
          <div id="user_setup"></div>
          <style>
            .invite_container {
              position: fixed;
              z-index: 163;
              top: calc(70% - 3rem);
              left: calc(96% - 320px);
              margin: auto;
              display: block;
            }

            .invitation_card {
              max-width: 320px;
              padding: 1rem;
              background-color: #fff;
              border-radius: 10px;
              box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.05);
            }

            .invitation_card_title {
              font-weight: 600;
              color: rgb(31 41 55);
              display: flex;
              justify-content: space-between;
            }

            .invitation_card_description {
              margin-top: 1rem;
              font-size: 0.875rem;
              line-height: 1.25rem;
              color: rgb(75 85 99);
            }

            .invitation_card_description a {
              --tw-text-opacity: 1;
              color: rgb(59 130 246);
            }

            .invitation_card_description a:hover {
              -webkit-text-decoration-line: underline;
              text-decoration-line: underline;
            }

            .actions {
              display: flex;
              align-items: center;
              justify-content: space-between;
              margin-top: 1rem;
              -moz-column-gap: 1rem;
              column-gap: 1rem;
              flex-shrink: 0;
            }

            .pref {
              font-size: 0.75rem;
              line-height: 1rem;
              color: rgb(31 41 55);
              -webkit-text-decoration-line: underline;
              text-decoration-line: underline;
              transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
              border: none;
              background-color: transparent;
            }

            .pref:hover {
              color: rgb(156 163 175);
            }

            .pref:focus {
              outline: 2px solid transparent;
              outline-offset: 2px;
            }

            .accept {
              font-size: 0.75rem;
              line-height: 1rem;
              background-color: #6934b7;
              font-weight: 500;
              border-radius: 0.5rem;
              color: #fff;
              padding-left: 1rem;
              padding-right: 1rem;
              padding-top: 0.625rem;
              padding-bottom: 0.625rem;
              border: none;
              transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .accept:hover {
              background-color: rgb(55 65 81);
            }

            .accept:focus {
              outline: 2px solid transparent;
              outline-offset: 2px;
            }

            .l {
              font-size: 1rem;
              padding: 0.3rem 0px;
            }

            .lazy_loader_wrapper {
              width: 200px;
              height: 60px;
              position: relative;
              z-index: 1;
              top: calc(55% - 3rem);
              margin: auto;
              display: block;
            }

            .lazy_loader_circle {
              width: 20px;
              height: 20px;
              position: absolute;
              border-radius: 50%;
              background-color: #fff;
              left: 15%;
              transform-origin: 50%;
              animation: circle7124 0.5s alternate infinite ease;
            }

            @keyframes circle7124 {
              0% {
                top: 60px;
                height: 5px;
                border-radius: 50px 50px 25px 25px;
                transform: scaleX(1.7);
              }

              40% {
                height: 20px;
                border-radius: 50%;
                transform: scaleX(1);
              }

              100% {
                top: 0%;
              }
            }

            .lazy_loader_circle:nth-child(2) {
              left: 45%;
              animation-delay: 0.2s;
            }

            .lazy_loader_circle:nth-child(3) {
              left: auto;
              right: 15%;
              animation-delay: 0.3s;
            }

            .shadow {
              width: 20px;
              height: 4px;
              border-radius: 50%;
              background-color: #6934b8;
              position: absolute;
              top: 62px;
              transform-origin: 50%;
              z-index: -1;
              left: 15%;
              filter: blur(1px);
              animation: shadow046 0.5s alternate infinite ease;
            }

            @keyframes shadow046 {
              0% {
                transform: scaleX(1.5);
              }

              40% {
                transform: scaleX(1);
                opacity: 0.7;
              }

              100% {
                transform: scaleX(0.2);
                opacity: 0.4;
              }
            }

            .shadow:nth-child(4) {
              left: 45%;
              animation-delay: 0.2s;
            }

            .shadow:nth-child(5) {
              left: auto;
              right: 15%;
              animation-delay: 0.3s;
            }

            #lazy_system_loader {
              display: block;
              position: fixed;
              z-index: 25;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            }

            .global_feedback_container {
              display: block;
              /* Hidden by default */
              position: fixed;
              /* Stay in place */
              z-index: 100000;
              /* Sit on top */
              left: 0;
              top: 0;
              width: 100%;
              /* Full width */
              height: 100%;
              /* Full height */
              overflow: auto;
              /* Enable scroll if needed */
              background-color: rgb(0, 0, 0);
              /* Fallback color */
              background-color: rgba(0, 0, 0, 0.4);
              /* Black w/ opacity */
            }

            .global_feedback_container .feedback_align {
              display: flex;
              flex-direction: row-reverse;
              padding: 20px;
            }

            .global_feedback_container .feedback_align .error {
              font-family: system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
                "Helvetica Neue", sans-serif;
              width: 320px;
              padding: 12px;
              display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: start;
              background: #ef665b;
              border-radius: 8px;
              box-shadow: 0px 0px 5px -3px #111;
            }

            .global_feedback_container .feedback_align .warning {
              font-family: system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
                "Helvetica Neue", sans-serif;
              width: 320px;
              padding: 12px;
              display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: start;
              background: #f7c752;
              border-radius: 8px;
              box-shadow: 0px 0px 5px -3px #111;
            }

            .feedback__title {
              font-weight: 500;
              font-size: 14px;
              color: white;
              padding-left: 5px;
            }

            .close {
              width: 20px;
              height: 20px;
              margin-left: auto;
              cursor: pointer;
            }

            .global_feedback_container .feedback_align .success {
              font-family: system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
                "Helvetica Neue", sans-serif;
              width: 320px;
              padding: 12px;
              display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: start;
              background: #84d65a;
              border-radius: 8px;
              box-shadow: 0px 0px 5px -3px #111;
            }

            @keyframes fade-in {
              from {
                opacity: 0;
                transform: translateX(-100%);
              }

              to {
                opacity: 1;
                transform: translateX(0);
              }
            }

            @keyframes fade-out {
              from {
                opacity: 1;
                transform: translateX(0);
              }

              to {
                opacity: 0;
                transform: translateX(-100%);
              }
            }

            .prepare_error {
              transform-origin: bottom right;
              position: fixed;
              opacity: 0;
            }

            .animate_out {
              animation: fade-out 0.5s ease-in-out forwards;
            }

            .animate_in {
              animation: fade-in 0.5s ease-in-out forwards;
            }

            .feedback__icon {
              font-weight: 500;
              font-size: 20px;
              color: white;
              display: flex;
            }

            .none {
              display: none;
            }

            .overlay {
              display: block;
              width: 100%;
              height: 100%;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              z-index: 10;
              cursor: pointer;
            }

            .overlay .overlay_container {
              position: absolute;
              top: 15%;
              left: calc(100% - 300px);
            }

            .overlay .overlay_container .message_widget {
              background: #353535;
              border-radius: 20px;
              display: flex;
              align-items: center;
              justify-content: left;
              backdrop-filter: blur(10px);
              transition: 0.5s ease-in-out;
              width: 100%;
              padding: 1px 25px 5px 1px;
              min-width: 290px;

              min-height: 70px;
            }

            .overlay .overlay_container .message_widget:hover {
              cursor: pointer;
              transform: scale(1.05);
            }

            .overlay .overlay_container .message_widget .img {
              width: 50px;
              height: 50px;
              margin-left: 10px;
              border-radius: 10px;
            }

            .overlay .overlay_container .message_widget:hover > .img {
              transition: 0.5s ease-in-out;
            }

            .notification_container_animation {
              transition: 0.5s ease-in-out;
            }

            .textBox {
              width: calc(100% - 90px);
              margin-left: 10px;
              color: white;
              font-family: "Poppins" sans-serif;
            }

            .textContent {
              display: grid;
              align-items: center;
              justify-content: space-between;
            }

            .span {
              font-size: 10px;
            }

            .h1 {
              font-size: 16px;
              font-weight: bold;
            }

            .p {
              font-size: 12px;
              font-weight: lighter;
            }

            .fade-in {
              opacity: 0;
              animation: fade-in-animation 1s ease-in forwards;
            }

            @keyframes fade-in-animation {
              0% {
                opacity: 0;
              }

              100% {
                opacity: 1;
              }
            }

            .notificationCard {
              width: 220px;
              height: 280px;
              background: rgb(245, 245, 245);
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: center;
              padding: 20px 35px;
              gap: 10px;
              box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.123);
              border-radius: 20px;
            }

            .bellIcon {
              width: 50px;
              margin: 20px 0px;
            }

            .bellIcon path {
              fill: rgb(168, 131, 255);
            }

            .notificationHeading {
              color: black;
              font-weight: 600;
              font-size: 0.8em;
            }

            .notificationPara {
              color: rgb(133, 133, 133);
              font-size: 0.6em;
              font-weight: 600;
              text-align: center;
            }

            .buttonContainer {
              display: flex;
              flex-direction: column;
              gap: 5px;
            }

            .AllowBtn {
              width: 120px;
              height: 25px;
              background-color: rgb(168, 131, 255);
              color: white;
              border: none;
              border-radius: 20px;
              font-size: 0.7em;
              font-weight: 600;
              cursor: pointer;
            }

            .NotnowBtn {
              width: 120px;
              height: 25px;
              color: rgb(168, 131, 255);
              border: none;
              background-color: transparent;
              font-weight: 600;
              font-size: 0.7em;
              cursor: pointer;
              border-radius: 20px;
            }

            .NotnowBtn:hover {
              background-color: rgb(239, 227, 255);
            }

            .AllowBtn:hover {
              background-color: rgb(153, 110, 255);
            }

            .leave_container {
              display: block;
              position: fixed;
              z-index: 21;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            }

            .leave_container .section_start {
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
            }

            .button_notification {
              min-width: 200px;
              min-height: 40px;
              display: flex;
              align-items: center;
              justify-content: flex-start;
              gap: 10px;
              padding: 0px 15px;
              background-color: rgb(66, 66, 66);
              border-radius: 10px;
              color: white;
              border: none;
              position: relative;
              cursor: pointer;
              transition-duration: 0.2s;
            }

            .dot {
              position: absolute;
              left: 0;
              top: 0;
              transform: translate(-50%, -50%);
              width: 15px;
              height: 15px;
              background-color: rgb(194, 3, 3);
              border-radius: 100%;
            }

            .arrow {
              position: absolute;
              right: 0;
              width: 30px;
              height: 100%;
              font-size: 18px;
              display: flex;
              align-items: center;
              justify-content: center;
            }

            .button_notification:hover {
              background-color: rgb(77, 77, 77);
              transition-duration: 0.2s;
            }

            .button_notification:hover .arrow {
              animation: slide-right 1s infinite;
            }

            /* arrow animation */
            @keyframes slide-right {
              0% {
                transform: translateX(0);
              }

              50% {
                transform: translateX(-5px);
              }
            }

            .button_notification:active {
              transform: translate(1px, 1px);
              transition-duration: 0.2s;
            }

            .notification_small {
              padding: 1px 10px;
              font-size: smaller;
            }
          </style>

          <div id="lazy_system_loader" style="display: none">
            <div class="lazy_loader_wrapper">
              <div class="lazy_loader_circle"></div>
              <div class="lazy_loader_circle"></div>
              <div class="lazy_loader_circle"></div>
              <div class="shadow"></div>
              <div class="shadow"></div>
              <div class="shadow"></div>
            </div>
          </div>

          <div
            class="global_feedback_container none"
            id="notification_widget_update"
            style="background-color: transparent; display: none"
          >
            <div class="feedback_align">
              <div id="notification_section">
                <button class="button_notification">
                  <p class="notification_small">
                    <i class="fa-solid fa-bell fa-shake"></i>
                    <span id="notification_widget_text">New Information</span>
                  </p>
                  <div class="arrow">›</div>
                  <div class="dot"></div>
                </button>
              </div>
            </div>
          </div>

          <div
            class="global_feedback_container none"
            id="global_feedback_container"
          >
            <div class="feedback_align">
              <!-- Error Notification div -->
              <div class="error prepare_error" id="feedback_error">
                <div class="feedback__icon">
                  <i class="fa-solid fa-triangle-exclamation"></i>
                  <p class="feedback__title" id="feedback_error_text">
                    lorem ipsum dolor sit amet
                  </p>
                </div>
              </div>
              <!-- Error Notification Div -->

              <!-- Success Notification Div -->
              <div class="success prepare_error" id="feedback_success">
                <div class="feedback__icon">
                  <i class="fa-solid fa-circle-check"></i>
                  <p class="feedback__title" id="feedback_successful_text">
                    lorem ipsum dolor sit amet
                  </p>
                </div>
              </div>
              <!-- Success Notification Div -->

              <!-- Warning Notification Div -->
              <div class="warning prepare_error" id="feedback_warning">
                <div class="feedback__icon">
                  <i class="fa-solid fa-triangle-exclamation"></i>
                  <p class="feedback__title" id="feedback_warning_text">
                    lorem ipsum dolor sit amet
                  </p>
                </div>
              </div>
              <!-- Warning Notification Div -->
            </div>
          </div>

          <div
            id="primary_notification_widget"
            class="notification_container_animation"
            style="display: contents"
          ></div>

          <div id="messages_widget_container"></div>

          <div
            id="leave_team_dialog"
            style="
              display: none;
              position: fixed;
              z-index: 21;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgba(0, 0, 0, 0.74);
            "
          >
            <div
              class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              style="
                width: 90%;
                max-width: 400px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              "
            >
              <div style="margin: 1.5rem">
                <div
                  class="flex mb-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  style="
                    justify-content: space-between;
                    align-items: self-start;
                  "
                >
                  <h4
                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
                  >
                    Confirm Action
                  </h4>
                  <i
                    class="fa-solid fa-xmark"
                    @click="confirm_user_resign()"
                  ></i>
                </div>
                <p
                  class="text-gray-700 dark:text-gray-200"
                  style="font-size: 12px"
                >
                  Renouncing your Roles or Post will result in you relinquishing
                  your status as a member of the business and team. All
                  connecting transactions, chats and forms of work will be
                  cleared as well.
                </p>

                <button
                  onclick="leave_user_team()"
                  style="
                    display: block;
                    margin: 10px auto;
                    background-color: #6934b7;
                  "
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                >
                  Confirm
                </button>
              </div>
            </div>
          </div>

          <script>
            function snooze_primary_notification() {
              const container = document.getElementById(
                "primary_notification_widget"
              );

              if (container.style.display == "none") {
                container.style.display = "contents";
              } else {
                container.style.display = "none";
              }
            }

            function confirm_user_resign() {
              var conf_resign = document.getElementById("leave_team_dialog");
              if (conf_resign.style.display == "none") {
                conf_resign.style.display = "block";
              } else {
                conf_resign.style.display = "none";
              }
            }

            function leave_user_team() {
              operate_loader();
              let path = "php/proc_resign_from_business.php";
              // Create an instance of the XMLHttpRequest object
              var xhr = new XMLHttpRequest();

              // Open a connection to the PHP file
              xhr.open("GET", path);

              // Set the onload event handler
              xhr.onload = function () {
                // Get the data received from the PHP file
                var data = xhr.responseText;
                operate_loader("stop");
                // Update the output element with the data
                if (data !== "true") {
                  console.log(data);
                  feedback_report("error", "Could Not Exit The Team");

                  //Load the Error Page
                } else {
                  feedback_report("successful", "You have exited the Team");
                  confirm_user_resign();

                  document.getElementById("user_setup").innerHTML = "";
                }
              };
              xhr.send();
            }

            function feedback_report(
              state = "warning",
              description = "could not process request"
            ) {
              let feedback_container = document.getElementById(
                "global_feedback_container"
              );
              let feedback_error = document.getElementById("feedback_error");
              let feedback_error_text = document.getElementById(
                "feedback_error_text"
              );

              let feedback_success =
                document.getElementById("feedback_success");
              let feedback_successful_text = document.getElementById(
                "feedback_successful_text"
              );

              let feedback_warning =
                document.getElementById("feedback_warning");
              let feedback_warning_text = document.getElementById(
                "feedback_warning_text"
              );

              switch (state) {
                case "error":
                  feedback_container.classList.remove("none");

                  feedback_error.classList.toggle("animate_in");
                  feedback_error_text.innerHTML = " " + description;
                  setTimeout(() => {
                    feedback_error.classList.toggle("animate_out");
                    if (
                      feedback_error.classList.contains("animate_out") == true
                    ) {
                      setTimeout(() => {
                        feedback_container.classList.add("none");
                        feedback_error.classList.toggle("animate_in");
                        feedback_error.classList.toggle("animate_out");
                      }, 500);
                    }
                  }, 3000);

                  break;
                case "successful":
                  feedback_container.classList.remove("none");

                  feedback_success.classList.toggle("animate_in");
                  feedback_successful_text.innerHTML = " " + description;
                  setTimeout(() => {
                    feedback_success.classList.toggle("animate_out");
                    if (
                      feedback_success.classList.contains("animate_out") == true
                    ) {
                      setTimeout(() => {
                        feedback_success.classList.toggle("animate_in");
                        feedback_success.classList.toggle("animate_out");
                        feedback_container.classList.add("none");
                      }, 500);
                    }
                  }, 1500);

                  break;
                default:
                  feedback_container.classList.remove("none");

                  feedback_warning.classList.toggle("animate_in");
                  feedback_warning_text.innerHTML = " " + description;
                  setTimeout(() => {
                    feedback_warning.classList.toggle("animate_out");
                    if (
                      feedback_warning.classList.contains("animate_out") == true
                    ) {
                      setTimeout(() => {
                        feedback_container.classList.add("none");
                        feedback_warning.classList.toggle("animate_out");
                        feedback_warning.classList.toggle("animate_in");
                      }, 500);
                    }
                  }, 2000);

                  break;
              }
            }

            function operate_loader(status = "spin") {
              var lazy_loader =
                window.document.getElementById("lazy_system_loader");
              if (status == "spin") {
                //window.document.getElementById('lazy_system_loader').style.display = "block";
                lazy_loader.style.display = "block";
              } else {
                lazy_loader.style.display = "none";
              }
            }

            function retrieve_user_setupt() {
              var user_setup = document.getElementById("user_setup");
              var file_path = "php/get_user_setup.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;

                  let container_len = user_setup.innerHTML;
                  if (container_len.length <= 1) {
                    user_setup.innerHTML = data_handle;
                    if (data_handle !== "") {
                      select_create_business();
                    }
                  }

                  retrieve_team_name();
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            const invite_timer = setInterval(function () {
              let x = document.getElementById("invite_widget");
              if (typeof x != "undefined" && x != null) {
                const widget_invite_status = setTimeout(function () {
                  if (x.innerHTML.length > 0) {
                    clear_invite();
                    clearTimeout(widget_invite_status);
                  } else {
                    track_invites();
                    retrieve_widget_primary_notification();
                  }
                }, 7000);
              } else {
                track_invites();
                retrieve_widget_primary_notification();
              }
            }, 3000); // Run the function every 1 second (1000 milliseconds)

            function track_invites() {
              var file_path = "php/chech_store_invites.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;
                  if (document.getElementById("invite_widget")) {
                    document.getElementById("invite_widget").innerHTML =
                      data_handle;
                  } else {
                    // create a new div and set its attributes
                    let div = document.createElement("div");
                    div.id = "invite_widget";

                    // add div to the document
                    document.body.appendChild(div);
                    /*
                    const statusDiv = document.getElementById('invite_widget');

                    statusDiv.addEventListener('mouseenter', prolong_invite());

                    function prolong_invite() {
                        clearInterval(invite_timer);
                    }*/

                    div.innerHTML = data_handle;
                  }
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            function clear_invite() {
              const x = document.getElementById("invite_widget");
              x.innerHTML = null;
            }

            function decide_invite(code, state) {
              const file_path = "./php/accept_invitation.php";
              operate_loader();

              const formData = new FormData();
              formData.append("code", code);
              formData.append("state", state);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  // success
                  var _info = this.responseText;
                  operate_loader("stop");
                  if (_info.trim() == "PROCEED_DECLINE") {
                    feedback_report(
                      "successful",
                      "Invite response has been made"
                    );
                    refine_page("vm.php?context=home");
                  } else if (_info.trim() == "PROCEED_ACCEPT") {
                    feedback_report(
                      "successful",
                      "You are now participating in a new store team."
                    );
                    refine_page("vm.php?context=home");
                  } else {
                    feedback_report();
                    //console.log(_info);
                  }
                  retrieve_user_setupt();
                }
              };
              xhr.send(formData);
            }

            function track_online_users() {
              var file_path = "php/set_ping_users.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;
                  if (document.getElementById("online_users_container")) {
                    let current_data = document.getElementById(
                      "online_users_container"
                    ).innerHTML;
                    if (current_data !== data_handle) {
                      document.getElementById(
                        "online_users_container"
                      ).innerHTML = data_handle;
                    }
                  }
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            setInterval(track_online_users, 3000);

            function select_create_business(section = 0) {
              let basic_business_setup_container = document.getElementById(
                "basic_business_setup_container"
              );
              let business_setup_container = document.getElementById(
                "business_setup_container"
              );
              let join_business_team_container = document.getElementById(
                "join_business_team_container"
              );
              let business_contacts_container = document.getElementById(
                "business_contacts_container"
              );
              let select_subscription_container = document.getElementById(
                "select_subscription_container"
              );
              let confirmation_join_message = document.getElementById(
                "confirmation_join_message"
              );
              let recent_participating_store = document.getElementById(
                "participating_setup_container"
              );

              let payment_section = "";
              //CONTINUE HERE
              switch (section) {
                case -2:
                  confirmation_join_message.style.display = "block";
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;
                case -1:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "block";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;
                case 0:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "block";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;
                case 1:
                  basic_business_setup_container.style.display = "block";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;
                case 2:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "block";
                  select_subscription_container.style.display = "none";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;
                case 3:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "block";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";
                  //functions
                  break;

                case 5:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "block";
                  //functions
                  break;
                default:
                  basic_business_setup_container.style.display = "none";
                  business_setup_container.style.display = "none";
                  join_business_team_container.style.display = "none";
                  business_contacts_container.style.display = "none";
                  select_subscription_container.style.display = "none";
                  document.getElementById(
                    "confirmation_create_message"
                  ).style.display = "block";
                  confirmation_join_message.style.display = "none";
                  recent_participating_store.style.display = "none";

                  //functions
                  break;
              }
            }

            function request_autocomplete() {
              let x = document.getElementById("edtbusiness_name");
              let y = document.getElementById("edtbusiness_team");
              let i = document.getElementById("edtbusiness_industry");
              let j = document.getElementById("btn_generate");
              let r = document.getElementById("edtbusiness_description");
              if (r.value == "") {
                if (x.value !== "" && y.value !== "" && i.value !== "") {
                  j.style.display = "block";
                }
                //consider
              }
            }

            function generate_description() {
              let business_name =
                document.getElementById("edtbusiness_name").value;
              let business_team =
                document.getElementById("edtbusiness_team").value;
              let business_industry = document.getElementById(
                "edtbusiness_industry"
              ).value;
              const file_path =
                "./php/request_auto_generate_business_description.php";

              const formData = new FormData();
              formData.append("business_name", business_name);
              formData.append("business_team", business_team);
              formData.append("business_industry", business_industry);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  // success
                  var _info = this.responseText;
                  document.getElementById(
                    "edtbusiness_description"
                  ).disabled = false;
                  quick_writters_action(_info, "edtbusiness_description");
                  document.getElementById(
                    "edtbusiness_description"
                  ).disabled = true;
                  document.getElementById("btn_generate").style.display =
                    "none";
                }
              };
              xhr.send(formData);
            }

            retrieve_user_setupt();

            setInterval(retrieve_user_setupt, 1000); // Run the function every 1 second (1000 milliseconds)

            function create_business(subscription_type) {
              if (subscription_type == "free") {
                let business_name =
                  document.getElementById("edtbusiness_name").value;
                let business_team =
                  document.getElementById("edtbusiness_team").value;
                let business_industry = document.getElementById(
                  "edtbusiness_industry"
                ).value;
                let business_description = document.getElementById(
                  "edtbusiness_description"
                ).value;
                let business_email =
                  document.getElementById("edtbusiness_email").value;
                let business_phone =
                  document.getElementById("edtbusiness_phone").value;

                const file_path = "./php/record_business_info_quick_setup.php";

                const formData = new FormData();
                formData.append("business_name", business_name);
                formData.append("business_team", business_team);
                formData.append("business_industry", business_industry);
                formData.append("business_description", business_description);
                //First Section

                formData.append("business_email", business_email);
                formData.append("business_phone", business_phone);
                //Second Section

                formData.append("subscription_type", subscription_type);
                //Last Section

                const xhr = new XMLHttpRequest();
                xhr.open("POST", file_path, true);
                xhr.onload = function () {
                  if (this.status === 200) {
                    var _info = this.responseText;
                    if (_info.trim() !== "PROCEED") {
                      feedback_report("error");
                      document.getElementById(
                        "create_business_error"
                      ).style.display = "block";
                      document.getElementById(
                        "create_business_error_text"
                      ).innerHTML = _info;
                    } else {
                      select_create_business(4);
                    }
                  }
                };
                xhr.send(formData);
              } else {
                feedback_report(
                  "error",
                  "Version unavailable for your region."
                );
                //document.getElementById('create_business_error').style.display = "block";
                //document.getElementById('create_business_error_text').innerHTML = "";
              }
            }

            function open_menu(panel) {
              const team_menu = document.getElementById("team_navbar");
              const settings_menu = document.getElementById("settings_navbar");

              if (panel == "team") {
                team_menu.style.display = "block";
                document.getElementById("mobile_team_navbar").style.display =
                  "block";
              } else {
                team_menu.style.display = "none";
                document.getElementById("mobile_team_navbar").style.display =
                  "none";
              }

              if (panel == "settings") {
                settings_menu.style.display = "block";
                document.getElementById(
                  "mobile_settings_navbar"
                ).style.display = "block";
              } else {
                settings_menu.style.display = "none";
                document.getElementById(
                  "mobile_settings_navbar"
                ).style.display = "none";
              }

              if (document.getElementById("store_admin_navbar")) {
                let store_admin_navbar =
                  document.getElementById("store_admin_navbar");
                if (panel == "admin_control") {
                  store_admin_navbar.style.display = "block";
                } else {
                  store_admin_navbar.style.display = "none";
                }
              }
            }

            function join_business() {
              let license_key = document.getElementById(
                "edtlicense_key_search"
              ).value;
              let file_path = "./php/join_business_key.php";

              const formData = new FormData();
              formData.append("license_key", license_key);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  if (_info.trim() !== "PROCEED") {
                    //document.getElementById('join_business_error').style.display = "block";
                    //document.getElementById('join_business_error_text').innerHTML = _info;

                    console.log(_info);
                    feedback_report("error", _info);
                  } else {
                    select_create_business(-2);
                    feedback_report(
                      "successful",
                      "You have joined a business using the license key"
                    );
                  }
                }
              };
              xhr.send(formData);
            }

            function retrieve_widget_messages() {
              var file_path = "php/retrieve_message_widget.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;
                  if (document.getElementById("messages_widget_container")) {
                    document.getElementById(
                      "messages_widget_container"
                    ).innerHTML = data_handle;
                  }
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            function retrieve_widget_primary_notification() {
              var file_path = "php/retrieve_store_notification_widget.php";

              const j = document.getElementById("primary_notification_widget");
              if (j) {
                let k = j.innerHTML;

                if (k.length <= 0) {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      var data_handle = this.responseText;
                      if (
                        document.getElementById("primary_notification_widget")
                      ) {
                        let x = document.getElementById(
                          "primary_notification_widget"
                        ).innerHTML;
                        if (x.length <= 0) {
                          document.getElementById(
                            "primary_notification_widget"
                          ).innerHTML = data_handle;
                        }
                      }
                    }
                  };
                  xhttp.open("GET", file_path, true);
                  xhttp.send();
                }
              }
            }

            function clear_primary_notification_widget() {
              document.getElementById("primary_notification_widget").innerHTML =
                null;
            }

            setInterval(function () {
              let x = document.getElementById(
                "messages_widget_container"
              ).innerText;
              if (x.length <= 0) {
                retrieve_widget_messages();
              } else {
                const widget_status = setTimeout(function () {
                  document.getElementById(
                    "messages_widget_container"
                  ).innerHTML = null;
                  clearTimeout(widget_status);
                }, 5000);
              }
            }, 1000); // Run the function every 1 second (1000 milliseconds)

            /*
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('java/service-worker.js')
      .then(function(registration) {
        console.log('Service Worker registered with scope:', registration.scope);
      })
      .catch(function(error) {
        console.error('Service Worker registration failed:', error);
      });
  }
  */

            function refine_page(url) {
              let state = "offline";
              const page_info = {
                "store-logout.php": "/logout/",
                "manage_subscription.php": "/settings/subscription/",
                "support_center.php": "/support/",
                "store-notifications.php": "/settings/notification/",
                "store-currency-exchange.php": "/settings/currency/",
                "store-license-key.php": "/settings/license_keys/",
                "store-user-profile.php": "/settings/profile/",
                //The Settings Pages

                "store-varsity-buddy.php": "/varsity_buddy/",

                "store-team-switch.php": "/team/switch/",
                "store-team-calender.php": "/team/calendar/",
                "store-team-file-manager.php": "/team/file_manager/",
                "store-team-task-manager.php": "/team/task_manager",
                "store-team-video-meetings.php": "/team/meeting/",
                "store-team-chatbox.php": "/team/chatroom/",
                "remove_member.php": "/team/remove/",
                "store-team-recruit-members.php": "/team/recruit/",
                "store-team-members.php": "/team/members/",
                "store-team-announcements.php": "/team/announcements/",
                //The Team Pages

                "market_trends.php": "/warehouse/analytics/trends/",
                "product_statistics.php": "/warehouse/analytics/statistics/",
                "cart_report.php": "/warehouse/analytics/cart/",
                "store-inventory-wishlist-report-analytics.php":
                  "/warehouse/analytics/wishlist/",
                "store-inventory-global-suppliers.php":
                  "/warehouse/supplier/global",
                "store-inventory-suppliers-records.php":
                  "/warehouse/supplier/history/",
                "store-inventory-suppliers-contacts.php":
                  "/warehouse/supplier/list/",
                "store-inventory-suppliers-add.php": "/warehouse/supplier/new/",
                "store-inventory-category.php": "/warehouse/collection/",
                "store-inventory-product-stock-management.php":
                  "/warehouse/product/stock/",
                "store-inventory-product-manage.php":
                  "/warehouse/product/list/",
                "store-inventory-product-delete.php":
                  "/warehouse/product/delete/",
                "store-inventory-product-edit.php": "/warehouse/product/edit/",
                "store-inventory-product-add.php": "/warehouse/product/add/",
                //The Warehouse Pages

                "store-inventory-dashboard.php": "/warehouse/",
                "marketplace.php": "/marketplace/",
                "store-sales-counter.php": "/POS/",
                "online_store.php": "/Online_Store/",
                "profile.php": "/user_profile/",

                "business-profile.php": "/marketplace/profile/setup/",
                "store_hours.php": "/marketplace/profile/hours/",
                "policies.php": "/marketplace/profile/policies/",
                "location_setup.php": "/marketplace/profile/location/",
                "manage_delivery.php": "/marketplace/activity/delivery/",
                "manage_sales.php": "/marketplace/activity/sales/",
                "manage_discount.php": "/marketplace/activity/discount/",
                "manage_orders.php": "/marketplace/activity/orders/",
                "manage_shipping.php": "/marketplace/activity/shipping/",
                "manage_reviews.php": "/marketplace/support/reviews/",
                "manage_faq.php": "/marketplace/support/faq/",
                "manage_ticket.php": "/marketplace/support/tickets/",
                "manage_contact.php": "/marketplace/support/contacts/",
                "payment_setup.php": "/marketplace/wallet/settings/",
                "manage_payments.php": "/marketplace/wallet/history/",
                "unverified_orders.php": "/marketplace/wallet/pending/",
                "marketplace_products.php": "/marketplace/products/blacklist/",
                "home.php": "/",
              };

              if (state == "offline") {
                var link = url;
              } else {
                var link = page_info[url];
              }

              operate_loader();
              window.open(link, `_self`);
              operate_loader("stop");
            }

            function retrieve_team_name() {
              let file_path = "php/get_navbar_team_name.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;
                  if (document.getElementById("navbar_team_name")) {
                    document.getElementById("navbar_team_name").innerHTML =
                      ": " + data_handle;
                  }
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            function retrieve_widget_qrcode_share() {
              let file_path = "php/share_qr_code_widget.php";

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var data_handle = this.responseText;
                  if (document.getElementById("share_team_widget_qr_code")) {
                    document.getElementById(
                      "share_team_widget_qr_code"
                    ).innerHTML = data_handle;
                  }
                }
              };
              xhttp.open("GET", file_path, true);
              xhttp.send();
            }

            retrieve_widget_qrcode_share();

            function display_help_notes_card() {
              if (!document.getElementById("page-help-and-support-container")) {
                feedback_report(
                  "warning",
                  `Cannot Locate Page's Help & Support`
                );
                return null;
              }

              let j = document.getElementById(
                "page-help-and-support-container"
              );
              if (j.style.display == "none") {
                toggle_release_notes(1);
                j.style.display = "block";
              } else {
                j.style.display = "none";
              }
            }

            function display_participants_profile(user_id = false) {
              let container = document.getElementById(
                "meta_data_set_container"
              );
              if (user_id == false) {
                container.innerHTML = null;
                return null;
              }
              const file_path = "./php/fetch_business_participants_details.php";
              operate_loader();

              const formData = new FormData();
              formData.append("user", user_id);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  // success
                  var _info = this.responseText;
                  operate_loader("stop");
                  container.innerHTML = _info;
                }
              };
              xhr.send(formData);
            }

            function share_page() {
              if (navigator.share) {
                navigator
                  .share({
                    title: document.title,
                    text: "Check out this webpage!",
                    url: window.location.href,
                  })
                  .then(() => console.log("Shared successfully"))
                  .catch((error) => console.log("Error sharing:", error));
              }
            }

            function share_link(caption, data_text, link_address) {
              if (navigator.share) {
                navigator
                  .share({
                    title: caption,
                    text: data_text,
                    url: link_address,
                  })
                  .then(() => console.log("Shared successfully"))
                  .catch((error) => console.log("Error sharing:", error));
              }
            }

            function quick_writters_action(text_description, elementid) {
              var sentance_info = text_description;
              let container = document.getElementById(elementid);

              var output = "";

              let j = sentance_info.length;
              let x = -1;
              let c = 1; //(100 - (100/j));

              setInterval(() => {
                if (sentance_info.length > output.length) {
                  x++;
                  output = output + sentance_info[x];
                  container.value = output;

                  container.scrollTop = container.scrollHeight;

                  //container.Height = container.scrollHeight ;

                  c++;
                } else {
                  c = false;
                  //console.log('Closing Script');

                  return c;
                }
              }, c);
            }

            document.addEventListener("DOMContentLoaded", function () {
              operate_loader();
            });

            window.addEventListener("load", function () {
              operate_loader("stop");
            });

            function retrieve_switch_teams() {
              let container = document.getElementById("container_data");
              let file_path = "./php/get_switch_teams_data.php";
              operate_loader();
              const formData = new FormData();
              formData.append("order", "default");

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  operate_loader("stop");
                  container.innerHTML = _info;
                }
              };
              xhr.send(formData);
            }

            function retrieve_switch_teams_login() {
              if (
                !document.getElementById("inner_participating_setup_container")
              ) {
                return null;
              }

              let container = document.getElementById(
                "inner_participating_setup_container"
              );
              let file_path = "./php/get_switch_teams_data.php";
              operate_loader();
              const formData = new FormData();
              formData.append("order", "default");

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  operate_loader("stop");
                  container.innerHTML = _info;
                }
              };
              xhr.send(formData);
            }

            function remove_team(index = false) {
              const container = document.getElementById(
                "delete_confirmation_switch_teams"
              );
              const edt_container = document.getElementById(
                "edt_delete_confirmation_switch_teams"
              );

              if (index !== false) {
                container.style.display = "block";
              } else {
                container.style.display = "none";
              }
              edt_container.value = index;
            }

            function proceed_remove_team() {
              let index = document.getElementById(
                "edt_delete_confirmation_switch_teams"
              ).value;
              let file_path = "./php/confirmation_team_history_delete.php";
              operate_loader();
              const formData = new FormData();
              formData.append("id", index);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  remove_team();
                  operate_loader("stop");
                  retrieve_switch_teams_login();
                  retrieve_switch_teams();
                }
              };
              xhr.send(formData);
            }

            function switch_teams(index = false) {
              const container = document.getElementById(
                "confirmation_switch_teams"
              );
              const edt_container = document.getElementById(
                "edt_confirmation_switch_teams"
              );

              if (index !== false) {
                container.style.display = "block";
              } else {
                container.style.display = "none";
              }
              edt_container.value = index;
            }

            function message_display_k(state = false) {
              let container = document.getElementById("result_switch_teams");

              if (state == false) {
                container.style.display = "none";
              } else {
                container.style.display = "block";
              }
            }

            function switch_teams_proceedure() {
              let index = document.getElementById(
                "edt_confirmation_switch_teams"
              ).value;
              let file_path = "./php/confirmation_team_history_switch.php";
              operate_loader();
              const formData = new FormData();
              formData.append("id", index);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  operate_loader("stop");

                  if (_info == "PROCEED") {
                    retrieve_team_name();
                    feedback_report(
                      "successful",
                      "You now have changed Store Teams"
                    );
                    if (document.getElementById("user_setup")) {
                      document.getElementById("user_setup").innerHTML = "";
                      window.location = "#";
                      retrieve_switch_teams_login();
                    }

                    retrieve_switch_teams();
                    //message_display_k(true);
                  } else if (_info == "INVALID_CODE") {
                    feedback_report(
                      "warning",
                      "Quick Link is now invalid. License key has changed from last participation"
                    );
                    retrieve_switch_teams();
                    retrieve_switch_teams_login();
                  } else {
                    feedback_report();
                  }
                  switch_teams();
                }
              };
              xhr.send(formData);
            }

            async function media_server_fallback(image, image_element) {
              document.getElementById(image_element).src =
                "https://media.varsitymarket.shop/broken_img.png";
              let file_path = "./php/media_server_fallback.php";
              const formData = new FormData();
              formData.append("image", image);

              const xhr = new XMLHttpRequest();
              xhr.open("POST", file_path, true);
              xhr.onload = function () {
                if (this.status === 200) {
                  var _info = this.responseText;
                  document.getElementById(image_element).src = _info;
                }
              };
              xhr.send(formData);
            }

            async function image_media_server_fallback(img) {
              function extractInnerLink(url) {
                const parts = url.split("https://");
                if (parts.length > 2) {
                  return "https://" + parts[2].split(" ")[0];
                }
                return url;
              }

              const originalUrl = img.src;
              const cleanedUrl = extractInnerLink(originalUrl);
              if (cleanedUrl !== img.src) {
                img.src = cleanedUrl;
                return; // Exit early if cleaned URL is different
              }

              img.src = "https://media.varsitymarket.shop/broken_img.png";
              let file_path = "./php/media_server_fallback.php";
              const formData = new FormData();
              formData.append("image", originalUrl);

              try {
                const response = await fetch(file_path, {
                  method: "POST",
                  body: formData,
                });

                if (!response.ok) {
                  // throw new Error(`HTTP error! status: ${response.status}`);
                }

                const _info = await response.text();
                img.src = _info;
              } catch (error) {
                console.error("Error during media fallback:", error);
                // Optionally, handle the error by setting a default image:
                // img.src = 'path/to/default/image.png';
              }
            }

            // Select all images on the page
            const images = document.querySelectorAll("img");

            // Loop through each image
            images.forEach((img) => {
              // Add an event listener to detect errors (broken images)
              img.addEventListener("error", () => {
                // Set the src to your broken image URL

                image_media_server_fallback(img);
                /*
    function generateUniqueId() {
        const timestamp = Date.now();
        const randomNum = Math.floor(Math.random() * 1000);
        return `img-${timestamp}-${randomNum}`;
    }
    img.id = generateUniqueId();    
    media_server_fallback(img.src,img.id); 
    //img.src = 'https://media.varsitymarket.shop/broken_img.png';
    */

                // Optionally, add a class for styling
                img.classList.add("broken-image");
              });
            });
          </script>
        </main>
      </div>
    </div>
    <div id="invite_widget"></div>
  </body>
</html>
