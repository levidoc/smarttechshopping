
<main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Online Store <i class="fa-solid fa-lock"></i>
            </h2>
            <style>
              .supplier_container {
                display: block;
                margin: 20px 0px;
                background-position: center;
                background-blend-mode: overlay;
                background-image: url(http://localhost/VARSITYMARKET/assets/img/timeline/aplasticplant.jpeg);
                border-radius: 31px;
                min-height: 8rem;
                background-size: contain;
                filter: hue-rotate(0.05);
              }

              .notification {
                display: flex;
                flex-direction: column;
                isolation: isolate;
                position: relative;
                width: 100%;
                height: fit-content;
                background: #29292c;
                border-radius: 1rem;
                overflow: hidden;
                font-family: "Gill Sans", "Gill Sans MT", Calibri,
                  "Trebuchet MS", sans-serif;
                font-size: 16px;
                --gradient: linear-gradient(to bottom, #ffffff, #6934b7);
                --color: #6934b7;
              }

              .notification:before {
                position: absolute;
                content: "";
                inset: 0.0625rem;
                border-radius: 0.9375rem;
                background: #18181b;
                z-index: 2;
              }

              .notification:after {
                position: absolute;
                content: "";
                width: 0.25rem;
                inset: 0.65rem auto 0.65rem 0.5rem;
                border-radius: 0.125rem;
                background: var(--gradient);
                transition: transform 300ms ease;
                z-index: 4;
              }

              .notification:hover:after {
                transform: translateX(0.15rem);
              }

              .notititle {
                color: var(--color);
                padding: 0.65rem 0.25rem 0.4rem 1.25rem;
                font-weight: 500;
                font-size: 1.1rem;
                transition: transform 300ms ease;
                z-index: 5;
              }

              .notification:hover .notititle {
                transform: translateX(0.15rem);
              }

              .notibody {
                color: #99999d;
                padding: 0 1.25rem;
                transition: transform 300ms ease;
                z-index: 5;
              }

              .notification:hover .notibody {
                transform: translateX(0.25rem);
              }

              .notiglow,
              .notiborderglow {
                position: absolute;
                width: 20rem;
                height: 20rem;
                transform: translate(-50%, -50%);
                background: radial-gradient(
                  circle closest-side at center,
                  white,
                  transparent
                );
                opacity: 0;
                transition: opacity 300ms ease;
              }

              .notiglow {
                z-index: 3;
              }

              .notiborderglow {
                z-index: 1;
              }

              .notification:hover .notiglow {
                opacity: 0.1;
              }

              .notification:hover .notiborderglow {
                opacity: 0.1;
              }

              .note {
                color: var(--color);
                position: fixed;
                top: 80%;
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
                font-size: 0.9rem;
                width: 75%;
              }
            </style>

            <div class="notification">
              <div class="notiglow"></div>
              <div class="notiborderglow"></div>
              <div class="notititle">
                <i class="fa-solid fa-crown"></i> Premium Section
              </div>
              <div class="notibody">
                This section has been reserved for the premium experience
              </div>
              <br />
            </div>

            <div class="w-full overflow-hidden">
              <div class="w-full overflow-x-auto">
                <div style="display: grid; grid-auto-flow: column">
                  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                    <div
                      class="supplier_container flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                      <div style="opacity: 0.9">
                        <h2
                          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                        >
                          <i class="fa-solid fa-globe"></i> Online Store
                        </h2>
                        <p class="my-6 text-gray-700 dark:text-gray-200 text-s">
                          Introducing our powerful online store management page,
                          designed to streamline your store operations and
                          maximize your business's potential.
                          <br />
                          With our comprehensive online store management page,
                          you can focus on what you excel at – expanding your
                          business.
                          <br />
                          Join us today and revolutionize the way you manage
                          your online store. Unlock the full potential of your
                          online store with us.
                        </p>
                      </div>
                    </div>

                    <div
                      class="p-4 supplier_container bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                      <h4
                        class="text-lg font-semibold text-gray-600 dark:text-gray-300"
                      >
                        Unlock Premium
                      </h4>
                      <p
                        class="text-lg font-semibold text-gray-600 dark:text-gray-300"
                        style="font-size: x-large"
                      >
                        R 400.00
                      </p>

                      <div style="font-size: small">
                        <ul class="text-gray-600 dark:text-gray-400">
                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Access To Marketplace
                          </li>

                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Inventory Management
                          </li>

                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Website Builder
                          </li>

                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Website Management
                          </li>

                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Video Conferencing
                          </li>

                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Supports 30 Members
                          </li>
                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            A.I Business Support
                          </li>
                          <li>
                            <i
                              class="fa-solid fa-circle-check"
                              style="color: #169500"
                            ></i>
                            Website CMS
                          </li>
                          <li>And More...</li>
                        </ul>
                      </div>
                      <button
                        onclick="create_business(`premium`)"
                        style="
                          display: block;
                          background-color: grey;
                          margin: 10px auto;
                          background-color: grey;
                        "
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                      >
                        <i class="fa-solid fa-crown"></i> Unlock Pro
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
