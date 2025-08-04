<body class="animsitionss">
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop" style="background-color: #121317;">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="images/logo.png">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop" style="width: 100%;">

						<div class="dis-none panel-search w-full p-t-10 p-b-15" style="display: block; width:100%; ">
							<div class="dis-flex p-l-15">
								<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
									<i class="zmdi zmdi-search"></i>
								</button>

								<input style="background-color: inherit; color:white; " class="mtext-107 cl2" type="text" name="search-product" placeholder="Search">
							</div>	
						</div>


					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-25 " id="data_cart_icon">
							<a href="wishlist/">
								<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11">
									<i class="fa-solid fa-heart"></i>
								</div>
							</a>

							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11   js-show-cart">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>

							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11" onclick="toggle_account_navbar()">
								<i class="fa-solid fa-user-large"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href=""><img src="images/favicon.png" alt="Varsity Market Logo"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-cart">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="hamburger hamburger--squeeze js-show-sidebar">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">

			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<form class="container-search-header">
				<div class="wrap-search-header">
					<input class="plh0" type="text" name="search" placeholder="Search...">

					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
				</div>
			</form>
		</div>
	</header>


	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class=" js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13" onclick="toggle_account_navbar()">
						<a class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
						<a class="stext-102 cl2 hov-cl1 trans-04 p-l-30">
							<i class="fa-solid fa-chevron-right"></i>
						</a>
					</li>

					<li class="p-b-13">
						<a href="wishlist.php" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="shop.php" class="stext-102 cl2 hov-cl1 trans-04">
							Shop
						</a>
					</li>

					<li class="p-b-13">
						<a href="collection.php" class="stext-102 cl2 hov-cl1 trans-04">
							Collection
						</a>
					</li>

					<li class="p-b-13">
						<a href="vendor.php?reference=ZGZjb20yZTAvRWQxWk9XL3pNZjRuN3l4RGc5Nk85VE5Ld1BKbmJzblR2eHBSNWsrLzhyT2FLQ1c0aUsvRlBIZg==:cad283a7b4b4af7ddc442e395a8a1dea76cce013ee15f0bd47a25f78387d8c09" class="stext-102 cl2 hov-cl1 trans-04">
							Store Bio
						</a>
					</li>

					<li class="p-b-13">
						<a href="help_center.php" class="stext-102 cl2 hov-cl1 trans-04">
							Support
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@CROSS-X-GEN
					</span>

					<?php /*
					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper1.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper1.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper3.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper3.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper4.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper4.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper5.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper5.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper2.jpg" data-lightbox="gallery" style="background-image: url('http://192.168.101.107/WEBSITES/LIVE/CROSSGEN/images/wallpaper2.jpg');"></a>
						</div>

					</div>
					*/ ?>

				</div>

			</div>
		</div>
	</aside>


	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class=" js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll" id="widget_cart_data">
				<ul class="header-cart-wrapitem w-full">

				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $0.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style>
		@media (max-width: 990px) {
			.wrap-sidebar {
				display: contents;
			}


			.case_collection .box {
				width: 100%;
				max-width: 30rem;

				min-width: 20rem;
				height: 11.875em;
				padding: 1rem;
				background-color: #6c7ae029;
				border: 3px solid #9749fd;
				-webkit-backdrop-filter: blur(20px);
				backdrop-filter: blur(20px);
				border-radius: 0.7rem;
				transition: all ease 0.3s;
			}


		}

		@media (min-width: 990px) {
			.wrap-sidebar {
				display: none;
			}


			.case_collection .box {
				width: 100%;
				max-width: 11.875em;
				height: 11.875em;
				padding: 1rem;
				background-color: #6c7ae029;
				border: 3px solid #9749fd;
				-webkit-backdrop-filter: blur(20px);
				backdrop-filter: blur(20px);
				border-radius: 0.7rem;
				transition: all ease 0.3s;
			}
		}

		@media screen and (min-width: 990px) {
			.navconfig {
				padding: 2.8rem;
				background-color: #121317;
				transition: all 0.4s;
			}

			.case_collection {
				min-width: 12rem;
				width: min-content !important;
				display: block;
			}

		}

		.vendor_product_container {
			width: fit-content;
			padding: 12px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: start;
			border-radius: 1rem;
			border: 1px solid #282828;
			box-shadow: 5px 5px 15px -3px #282828;
		}

		.vendor_product_container img {
			width: 2rem;
			object-fit: cover;
			margin: 0rem 1rem 0rem 0rem;
		}

		.vendor_product_container p {
			font-size: 15px;
			color: #555;
			line-height: 1.8;
		}

		.product_error {
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			max-width: 20rem;
			width: 100%;
			padding: 12px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: start;
			background: #EF665B;
			border-radius: 8px;
			box-shadow: 0px 0px 5px -3px #111;
		}

		.product_error_title {
			font-weight: 500;
			font-size: 14px;
			color: #fff;
		}

		.case_collection {
			color: #222222;
			position: relative;
			font-family: sans-serif;
			margin: 0.5rem;
			width: -webkit-fill-available;
			max-width: none;
		}

		.case_collection::before,
		.case_collection::after {
			content: "";
			background-color: white;
			position: absolute;
		}

		.case_collection::before {
			border-radius: 50%;
			width: 6rem;
			height: 6rem;
			top: 30%;
			right: 7%;
		}

		.case_collection::after {
			content: "";
			position: absolute;
			height: 3rem;
			top: 8%;
			right: 5%;
			border: 1px solid;
		}


		.case_collection .box {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.case_collection .box .title {
			font-size: 2rem;
			font-weight: 700;
			letter-spacing: 0.1em;
		}

		.case_collection .box div strong {
			display: block;
			margin-bottom: 0.5rem;
		}

		.case_collection .box div p {
			margin: 0;
			font-size: 0.9em;
			font-weight: 300;
			letter-spacing: 0.1em;
		}

		.case_collection .box div span {
			font-size: 0.7rem;
			font-weight: 300;
		}

		.case_collection .box div span:nth-child(3) {
			font-weight: 500;
			margin-right: 0.2rem;
		}

		.case_collection .box:hover {
			box-shadow: 0px 0px 20px 1px #222222;
			border: 1px solid #222222;
		}
	</style>
	<div class="navconfig"></div>

	<div class="lazy_system_loader" id="lazy_system_loader">
		<div class="lazy_loader_wrapper">
			<div class="lazy_loader_circle"></div>
			<div class="lazy_loader_circle"></div>
			<div class="lazy_loader_circle"></div>
			<div class="shadow"></div>
			<div class="shadow"></div>
			<div class="shadow"></div>
		</div>
	</div>
