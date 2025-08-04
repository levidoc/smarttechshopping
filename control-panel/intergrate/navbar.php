
<body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ &#39;overflow-hidden&#39;: isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <div id="ïnventory_menu" style="display: none">
            <ul class="mt-1">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu()"
                >
                  <i class="fa-solid fa-left-long" style="color: #6934b7"></i>
                  <span class="ml-4">Main Menu</span>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <i class="fa-solid fa-warehouse" style="color: #6934b7"></i>
                  <span class="ml-4">Inventory Management</span>
                </a>
              </li>
              <div>
                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Product Manager</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-inventory-product-add`)"
                          ><i class="fa-solid fa-plus"></i> New Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-inventory-product-edit`)"
                          ><i class="fa-solid fa-file-pen"></i> Edit Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`inventory-product-remove`)"
                          ><i class="fa-solid fa-trash"></i> Delete Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`inventory-product-list`)"
                          ><i class="fa-solid fa-rectangle-list"></i> Product
                          List</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-inventory-stock`)"
                          ><i class="fa-solid fa-people-carry-box"></i> Manage
                          Stock</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Category</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-category")'
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-boxes-stacked"></i>
                              Collection</span
                            >
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Suppliers</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-supplier-inventory-create")'
                          ><i class="fa-solid fa-plus"></i> Add Supplier</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-store-supplier-contacts")'
                          ><i class="fa-solid fa-rectangle-list"></i> Contact
                          List</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-store-supplier-records")'
                          ><i class="fa-solid fa-book-open"></i> Supplier
                          History</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-global-suppliers")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-earth-africa"></i> Global
                          Supplier</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Analytics and Reports</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-wishlist-report-analytics")'
                        >
                          <i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-heart-circle-bolt"></i> Wishlist
                          Report</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-cart-report-analytics")'
                        >
                          <i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-cart-flatbed"></i> Cart
                          Report</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-product-statistics-analytics")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-chart-line"></i> Product
                          Statistics</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-trends-analytics")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-chart-area"></i> Market Trends
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </ul>
          </div>

          <div id="complimentary_site_menu" style="display: none">
            <ul class="mt-1">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu()"
                >
                  <i class="fa-solid fa-left-long" style="color: #6934b7"></i>
                  <span class="ml-4">Main Menu</span>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <i class="fa-solid fa-gift" style="color: #6934b7"></i>
                  <span class="ml-4">Complimentary Store</span>
                </a>
              </li>
              <div>
                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Analytics</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="window.open(`store-inventory-category.php`, `_self`);"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-chart-line"></i> Site
                              Analytics</span
                            >
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Apps &amp; More</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          onclick="window.open(&#39;http://localhost/VARSITYMARKET/SKYNET_BUILDER/&#39;, &#39;_blank&#39;, &#39;fullscreen=yes,location=no,titlebar=yes,scrollbars=yes,width=1000000000,height=1000000000&#39;);"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-robot"></i> Website Builder
                              <br /><span style="font-size: 8px"
                                >SKYNET BUILDER</span
                              ></span
                            >
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Customization</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`complimentary_site_themes.php`)"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-paint-roller"></i>
                              Themes</span
                            >
                          </span>
                        </a>
                      </li>

                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="window.open(`complimentary_site_plugins.php`, `_self`);"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-boxes-stacked"></i>
                              Plugins</span
                            >
                          </span>
                        </a>
                      </li>

                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`complimentary_site_menu.php`)"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-layer-group"></i>
                              Menu</span
                            >
                          </span>
                        </a>
                      </li>

                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="window.open(`complimentary_site_pages.php`, `_self`);"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-file-lines"></i>
                              Pages</span
                            >
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Domain Configuration</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-inventory-product-add`)"
                          ><i class="fa-solid fa-sitemap"></i> Domain
                          Settings</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </ul>
          </div>

          <div id="market_menu" style="display: none">
            <ul class="mt-1">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu()"
                >
                  <i class="fa-solid fa-left-long" style="color: #6934b7"></i>
                  <span class="ml-4">Main Menu</span>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <i class="fa-solid fa-shop" style="color: #6934b7"></i>
                  <span class="ml-4">Marketplace</span>
                </a>
              </li>

              <li class="relative px-6">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <p class="text-xs">Store Activity</p>
                </a>
              </li>

              <ul class="mt-1">
                <li class="relative px-6">
                  <ul
                    style="
                      display: block;
                      margin-block: 1em;
                      margin-inline: 0px;
                    "
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu"
                  >
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="feedback_report(&#39;error&#39;,&#39;Package Not Available For Your Region&#39;);"
                        ><i
                          class="fa-solid fa-lock"
                          style="color: #6934b8; font-size: 0.6rem"
                        ></i>
                        <i class="fa-solid fa-chart-simple"></i> Analytics</a
                      >
                    </li>

                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="refine_page(&#39;store-marketplace-shipping&#39;)"
                        ><i class="fa-solid fa-truck-fast"></i> Shipping</a
                      >
                    </li>

                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="refine_page(&#39;store-marketplace-manage-orders&#39;)"
                        ><i class="fa-solid fa-file-invoice-dollar"></i> Store
                        Orders</a
                      >
                    </li>
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="refine_page(&#39;store-marketplace-discounts&#39;)"
                        ><i class="fa-solid fa-tags"></i> Discount</a
                      >
                    </li>
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="refine_page(&#39;store-marketplace-sales-and-promo&#39;)"
                        ><i class="fa-solid fa-sack-dollar"></i> Promotional
                        Sales</a
                      >
                    </li>
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a
                        class="w-full"
                        @click="refine_page(&#39;store-marketplace-delivery-services&#39;)"
                        ><i class="fa-solid fa-route"></i> Delivery Service</a
                      >
                    </li>
                  </ul>
                </li>
              </ul>

              <div>
                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Products</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-marketplace-products`)"
                          ><i class="fa-solid fa-person-dots-from-line"></i>
                          Banned Products</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Store Wallet</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-pending-income`)"
                          ><i class="fa-solid fa-hand-holding-dollar"></i>
                          Pending Income</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-store-earnings`)"
                          ><i class="fa-solid fa-money-bills"></i> My
                          Earnings</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-store-payments`)"
                          ><i class="fa-solid fa-piggy-bank"></i> Store
                          Payments</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-store-payment-configuration`)"
                          ><i class="fa-solid fa-wallet"></i> Wallet Settings</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Customer Support</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-contacts&#39;)"
                          ><i class="fa-solid fa-address-card"></i> Contact
                          Forms</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-support-tickets&#39;)"
                          ><i class="fa-solid fa-person-circle-question"></i>
                          Support Tickets</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-support-frequently-asked-questions&#39;)"
                          ><i class="fa-solid fa-file-circle-question"></i>
                          Frequently Asked Questions</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-product-reviews&#39;)"
                          ><i class="fa-solid fa-people-robbery"></i> Product
                          Reviews</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Store Profile</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-location&#39;)"
                          ><i class="fa-solid fa-location-dot"></i> Store
                          Location</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-policies&#39;)"
                          ><i class="fa-solid fa-file-lines"></i> Store
                          Policies</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-hours&#39;)"
                          ><i class="fa-solid fa-clock"></i> Trading Hours</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-profile&#39;)"
                          ><i class="fa-solid fa-screwdriver-wrench"></i>
                          Profile Setup</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </ul>
          </div>

          <div id="main_menu" style="display: block">
            <a onclick="refine_page(`home/`)">
              <img
                aria-hidden="true"
                class="dark:hidden"
                style="margin: 10px auto; width: 50%; aspect-ratio: 10/9"
                src="./Store Products_files/favicon.png"
              />
              <img
                aria-hidden="true"
                class="hidden dark:block"
                style="margin: 10px auto; width: 50%; aspect-ratio: 10/9"
                src="./Store Products_files/favicon_white.png"
              />

              <h2
                style="text-align: center; font-weight: 900; font-size: 18px"
                class="text-sm text-gray-700 dark:text-gray-200"
              >
                Varsity Market
              </h2>
              <h2
                style="text-align: center; font-weight: 600; font-size: 8px"
                class="mb-6 text-sm text-gray-700 dark:text-gray-200"
              >
                Vendor Trading Console
              </h2>
            </a>
            <ul class="mt-6">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  onclick="refine_page(`home/`)"
                >
                  <i
                    class="fa-solid fa-house-chimney"
                    style="color: #6934b7"
                  ></i>
                  <span class="ml-4">Home</span>
                </a>
              </li>
            </ul>
            <ul class="mt-1">
              <li class="relative px-6">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <p class="text-xs">Channels</p>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  @click="display_menu(&#39;market_menu&#39;); refine_page(&#39;marketplace-dashboard&#39;)"
                >
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i class="fa-solid fa-shop" style="color: #6934b7"></i>
                      <span class="ml-4">Marketplace</span>
                    </span>
                  </button>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a @click="refine_page(&#39;online-stores/&#39;)">
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i class="fa-solid fa-globe" style="color: #6934b7"></i>
                      <span class="ml-4"
                        >Online Store <i class="fa-solid fa-lock"></i
                      ></span>
                    </span>
                  </button>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a @click="refine_page(&#39;sales-counter/&#39;)">
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i
                        class="fa-solid fa-cash-register"
                        style="color: #6934b7"
                      ></i>
                      <span class="ml-4"
                        >Sales Counter <i class="fa-solid fa-lock"></i
                      ></span>
                    </span>
                  </button>
                </a>
              </li>
            </ul>

            <ul class="mt-1">
              <li class="relative px-6">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <p class="text-xs">General</p>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu(&#39;ïnventory_menu&#39;)"
                >
                  <i class="fa-solid fa-warehouse" style="color: #6934b7"></i>
                  <span class="ml-4">Inventory Management</span>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <button
                  class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="open_menu(&#39;team&#39;)"
                  aria-haspopup="true"
                >
                  <span class="inline-flex items-center">
                    <i
                      style="color: #6934b7; font-size: 1rem"
                      class="fa-solid fa-users"
                    ></i>
                    <span class="ml-4">Store Team </span>
                  </span>
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul
                  id="team_navbar"
                  style="
                    display: none;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                  "
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;team-announcements&#39;)"
                      ><i class="fa-solid fa-bullhorn"></i> Announcement</a
                    >
                  </li>

                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;team-members&#39;)"
                      ><i class="fa-solid fa-users"></i> Members</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;recruit-team-member&#39;)"
                      ><i class="fa-solid fa-user-plus"></i> Recruit Memebers</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;active-teams&#39;)"
                      ><i class="fa-solid fa-person-through-window"></i> Switch
                      Teams</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" onclick="confirm_user_resign()"
                      ><i class="fa-solid fa-person-walking-arrow-right"></i>
                      Leave Teams</a
                    >
                  </li>

                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-chatroom&#39;)"
                      ><i class="fa-solid fa-message"></i> Chatroom</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-video-meetings&#39;)"
                    >
                      <i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-video"></i> Video Mettings</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-task-manager&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-list-check"></i> Task Manager</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-file-manager&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-folder-open"></i> File Manager</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-calender&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-calendar-days"></i> Calendar</a
                    >
                  </li>
                </ul>
              </li>

              <li class="relative px-6 py-3">
                <button
                  class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="open_menu(`admin_control`)"
                  aria-haspopup="true"
                >
                  <span class="inline-flex items-center">
                    <i class="fa-solid fa-user" style="color: #6934b7"></i>
                    <span class="ml-4">Store Admin</span>
                  </span>
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul
                  id="store_admin_navbar"
                  style="
                    display: none;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                  "
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-trading-keys`)"
                    >
                      <i class="fa-solid fa-key"></i>
                      license Keys
                    </a>
                  </li>

                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(`remove-store-members`)"
                    >
                      <i class="fa-solid fa-user-minus"></i> Remove Member</a
                    >
                  </li>

                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(`transfer-store-ownership`)"
                    >
                      <i class="fa-solid fa-arrows"></i> Transfer Role</a
                    >
                  </li>
                </ul>
              </li>
              <li class="relative px-6 py-3">
                <button
                  class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="open_menu(&#39;settings&#39;)"
                  aria-haspopup="true"
                >
                  <span class="inline-flex items-center">
                    <i class="fa-solid fa-gear" style="color: #6934b7"></i>
                    <span class="ml-4">Settings</span>
                  </span>
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul
                  id="settings_navbar"
                  style="
                    display: none;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                  "
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-currency-exchange`)"
                    >
                      <i class="fa-solid fa-coins"></i> Currency
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" onclick="refine_page(`store-owner`)">
                      <i class="fa-solid fa-crown"></i>
                      Store Ownership
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-notifications`)"
                    >
                      <i class="fa-solid fa-bell"></i>
                      Notifications
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="display: none"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
        style="display: none"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <div id="mobile_market_menu" style="display: none">
            <ul class="mt-1">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu()"
                >
                  <i class="fa-solid fa-left-long" style="color: #6934b7"></i>
                  <span class="ml-4">Main Menu</span>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <i class="fa-solid fa-shop" style="color: #6934b7"></i>
                  <span class="ml-4">Marketplace</span>
                </a>
              </li>

              <div>
                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Products</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`inventory-product-list`)"
                          ><i class="fa-solid fa-boxes-stacked"></i> Manage
                          Products</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-marketplace-products.php`)"
                          ><i class="fa-solid fa-truck-ramp-box"></i>
                          Blacklisted Products</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Store Wallet</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-marketplace-unverified-orders.php`)"
                          ><i class="fa-solid fa-hand-holding-dollar"></i>
                          Pending Income</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-marketplace-withdraw-portal.php`)"
                          ><i class="fa-solid fa-money-bills"></i> My
                          Earnings</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-store-payments`)"
                          ><i class="fa-solid fa-piggy-bank"></i> Wallet
                          History</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-store-payment-configuration`)"
                          ><i class="fa-solid fa-wallet"></i> Wallet Settings</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Customer Support</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-contacts&#39;)"
                          ><i class="fa-solid fa-address-card"></i> Contact
                          Forms</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-support-tickets&#39;)"
                          ><i class="fa-solid fa-person-circle-question"></i>
                          Support Tickets</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-support-frequently-asked-questions&#39;)"
                          ><i class="fa-solid fa-file-circle-question"></i>
                          Frequently Asked Questions</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-product-reviews&#39;)"
                          ><i class="fa-solid fa-people-robbery"></i> Product
                          Reviews</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p class="text-xs">Store Profile</p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-location&#39;)"
                          ><i class="fa-solid fa-location-dot"></i> Store
                          Location</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-policies&#39;)"
                          ><i class="fa-solid fa-file-lines"></i> Store
                          Policies</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-hours&#39;)"
                          ><i class="fa-solid fa-clock"></i> Trading Hours</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(&#39;marketplace-store-profile&#39;)"
                          ><i class="fa-solid fa-screwdriver-wrench"></i>
                          Profile Setup</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </ul>
          </div>

          <div id="mobile_main_menu" style="display: block">
            <a onclick="refine_page(`home`)">
              <img
                aria-hidden="true"
                class="dark:hidden"
                style="margin: 10px auto; width: 75%"
                src="./Store Products_files/LOGO_dark.png"
              />
              <img
                aria-hidden="true"
                class="hidden dark:block"
                style="margin: 10px auto; width: 75%"
                src="./Store Products_files/LOGO_dark.png"
              />
            </a>

            <ul class="mt-6">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  onclick="refine_page(`home`)"
                >
                  <i
                    class="fa-solid fa-house-chimney"
                    style="color: #6934b7"
                  ></i>
                  <span class="ml-4">Home</span>
                </a>
              </li>
            </ul>
            <ul class="mt-1">
              <li class="relative px-6">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <p class="text-xs">Channels</p>
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a @click="display_menu(&#39;market_menu&#39;)">
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i class="fa-solid fa-shop" style="color: #6934b7"></i>
                      <span class="ml-4">Marketplace</span>
                    </span>
                  </button>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a @click="refine_page(&#39;online-stores&#39;)">
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i class="fa-solid fa-globe" style="color: #6934b7"></i>
                      <span class="ml-4"
                        >Online Store <i class="fa-solid fa-lock"></i
                      ></span>
                    </span>
                  </button>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a @click="refine_page(&#39;sales-counter&#39;)">
                  <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                  >
                    <span class="inline-flex items-center">
                      <i
                        class="fa-solid fa-cash-register"
                        style="color: #6934b7"
                      ></i>
                      <span class="ml-4"
                        >Sales Counter <i class="fa-solid fa-lock"></i
                      ></span>
                    </span>
                  </button>
                </a>
              </li>
            </ul>

            <ul class="mt-1">
              <li class="relative px-6">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <p class="text-xs">General</p>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu(&#39;ïnventory_menu&#39;)"
                >
                  <i class="fa-solid fa-warehouse" style="color: #6934b7"></i>
                  <span class="ml-4">Inventory Management</span>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <button
                  class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="open_menu(&#39;team&#39;)"
                  aria-haspopup="true"
                >
                  <span class="inline-flex items-center">
                    <i
                      style="color: #6934b7; font-size: 1rem"
                      class="fa-solid fa-users"
                    ></i>
                    <span class="ml-4">Store Team </span>
                  </span>
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul
                  id="mobile_team_navbar"
                  style="
                    display: none;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                  "
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;team-announcements&#39;)"
                      ><i class="fa-solid fa-bullhorn"></i> Announcement</a
                    >
                  </li>

                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;team-members&#39;)"
                      ><i class="fa-solid fa-users"></i> Members</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;recruit-team-member&#39;)"
                      ><i class="fa-solid fa-user-plus"></i> Recruit Memebers</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;remove-store-members&#39;)"
                    >
                      <i class="fa-solid fa-user-minus"></i> Remove Member</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-chatroom&#39;)"
                      ><i class="fa-solid fa-message"></i> Chatroom</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-video-meetings&#39;)"
                    >
                      <i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-video"></i> Video Mettings</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-task-manager&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-list-check"></i> Task Manager</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-file-manager&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-folder-open"></i> File Manager</a
                    >
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      @click="refine_page(&#39;store-team-calender&#39;)"
                      ><i
                        class="fa-solid fa-lock"
                        style="color: #6934b8; font-size: 0.6rem"
                      ></i>
                      <i class="fa-solid fa-calendar-days"></i> Calendar</a
                    >
                  </li>
                </ul>
              </li>

              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="refine_page(&#39;varsity-buddy&#39;)"
                >
                  <i class="fa-solid fa-robot" style="color: #6934b7"></i>
                  <span class="ml-4"
                    >Varsity Buddy <i class="fa-solid fa-lock"></i
                  ></span>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="refine_page(&#39;store-support&#39;)"
                >
                  <i class="fa-solid fa-circle-info" style="color: #6934b7"></i>
                  <span class="ml-4">Support Center</span>
                </a>
              </li>

              <li class="relative px-6 py-3">
                <button
                  class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="open_menu(&#39;settings&#39;)"
                  aria-haspopup="true"
                >
                  <span class="inline-flex items-center">
                    <i class="fa-solid fa-gear" style="color: #6934b7"></i>
                    <span class="ml-4">Settings</span>
                  </span>
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul
                  id="mobile_settings_navbar"
                  style="
                    display: none;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                  "
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" onclick="refine_page(`account-profile`)">
                      <i class="fa-solid fa-user"></i> User Profile
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-license-key.php`)"
                    >
                      <i class="fa-solid fa-key"></i>
                      license Keys
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-currency-exchange`)"
                    >
                      <i class="fa-solid fa-coins"></i> Currency
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" onclick="refine_page(`subscription`)">
                      <i class="fa-solid fa-people-pulling"></i>
                      Subscription
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a
                      class="w-full"
                      onclick="refine_page(`store-notifications`)"
                    >
                      <i class="fa-solid fa-bell"></i>
                      Notifications
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

          <div id="mobile_ïnventory_menu" style="display: none">
            <ul class="mt-1">
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  @click="display_menu()"
                >
                  <i class="fa-solid fa-left-long" style="color: #6934b7"></i>
                  <span
                    class="ml-4 mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >Main Menu</span
                  >
                </a>
              </li>
              <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                  <i class="fa-solid fa-warehouse" style="color: #6934b7"></i>
                  <span
                    class="ml-4 mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >Inventory Management</span
                  >
                </a>
              </li>
              <div>
                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p
                      class="mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >
                      Product Manager
                    </p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-inventory-product-add`)"
                          ><i class="fa-solid fa-plus"></i> New Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`store-inventory-product-edit`)"
                          ><i class="fa-solid fa-file-pen"></i> Edit Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`inventory-product-remove`)"
                          ><i class="fa-solid fa-trash"></i> Delete Product</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`inventory-product-list`)"
                          ><i class="fa-solid fa-rectangle-list"></i> Product
                          List</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="refine_page(`marketplace-inventory-stock`)"
                          ><i class="fa-solid fa-people-carry-box"></i> Manage
                          Stock</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p
                      class="mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >
                      Category
                    </p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click="window.open(`store-inventory-category.php`, `_self`);"
                        >
                          <span class="inline-flex items-center">
                            <span
                              ><i class="fa-solid fa-boxes-stacked"></i>
                              Category</span
                            >
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p
                      class="mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >
                      Suppliers
                    </p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-supplier-inventory-create")'
                          ><i class="fa-solid fa-plus"></i> Add Supplier</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-store-supplier-contacts")'
                          ><i class="fa-solid fa-rectangle-list"></i> Supplier
                          List</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-store-supplier-records")'
                          ><i class="fa-solid fa-book-open"></i> Supplier
                          History</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-global-suppliers")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-earth-africa"></i> Global
                          Supplier</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>

                <li class="relative px-6">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <p
                      class="mb-2 mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    >
                      Analytics and Reports
                    </p>
                  </a>
                </li>

                <ul class="mt-1">
                  <li class="relative px-6">
                    <ul
                      style="
                        display: block;
                        margin-block: 1em;
                        margin-inline: 0px;
                      "
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                    >
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-wishlist-report-analytics")'
                        >
                          <i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-heart-circle-bolt"></i> Wishlist
                          Report</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-cart-report-analytics")'
                        >
                          <i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-cart-flatbed"></i> Cart
                          Report</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-product-statistics-analytics")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-chart-line"></i> Product
                          Statistics</a
                        >
                      </li>
                      <li
                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      >
                        <a
                          class="w-full"
                          @click='refine_page("marketplace-inventory-trends-analytics")'
                          ><i
                            class="fa-solid fa-lock"
                            style="color: #6934b8; font-size: 0.6rem"
                          ></i>
                          <i class="fa-solid fa-chart-area"></i> Market Trends
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </ul>
          </div>
        </div>
      </aside>