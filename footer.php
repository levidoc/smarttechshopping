	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32" style="background-color: #121317;">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Smarttech Shopping
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="policy/privacy-policy/" class="stext-107 cl7 hov-cl1 trans-04">
								About Us
							</a>
						</li>

						<li class="p-b-10">
							<a href="policy/terms-and-conditions/" class="stext-107 cl7 hov-cl1 trans-04">
								FAQ
							</a>
						</li>
						
						<li class="p-b-10">
							<a href="policy/user-security/" class="stext-107 cl7 hov-cl1 trans-04">
								Contact Us
							</a>
						</li>

						<li class="p-b-10">
							<a href="policy/user-security/" class="stext-107 cl7 hov-cl1 trans-04">
								Account
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						More
					</h4>

					
					<ul>
						<li class="p-b-10">
							<a href="policy/privacy-policy/" class="stext-107 cl7 hov-cl1 trans-04">
								Privacy Policy
							</a>
						</li>

						<li class="p-b-10">
							<a href="policy/terms-and-conditions/" class="stext-107 cl7 hov-cl1 trans-04">
								Terms & Condition
							</a>
						</li>
						
						<li class="p-b-10">
							<a href="policy/user-security/" class="stext-107 cl7 hov-cl1 trans-04">
								User Security
							</a>
						</li>
					</ul>

					<ul>

						
						<li class="p-b-10">
							<a href="help/support/" class="stext-107 cl7 hov-cl1 trans-04">
								Help Center
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Why Us ?
					</h4>

					<p class="stext-107 cl7 size-201">
						With our dedication to quality, innovation, and sustainability, we invite you to join us on a journey where fashion meets artistry.
					</p>


				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form onsubmit="return false;">
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" id="newsletter_email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button onclick="record_wishlist()" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>


				</div>
			</div>

			<div class="p-t-40">

				<div style="display: flex; justify-content: flex-end; padding:2rem 1rem;">
					<img src="https://flagcdn.com/84x63/za.png" style="width:2rem; height:auto; ">
					<p class="p-l-15">R (ZAR)</p>
				</div>
				<div style="display: flex; justify-content: flex-end;">
					<div class="p-b-27">
						<a onclick="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa-brands fa-whatsapp"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa-brands fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa-brands fa-square-x-twitter"></i>
						</a>
					</div>

				</div>

				<div style="display: flex; justify-content: flex-end;">
					<p class="p-l-15"><i class="fa-solid fa-circle-check"></i> Authorised Stores</p>
					<i class="fa-solid fa-sort-down" style="margin:0 1rem;"></i>
				</div>

				<p class="stext-107 cl6 txt-center" style="font-size: 0.2px;">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved |Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>

				<p class="stext-107 cl6 txt-center">Powered By vMTECH<br><span style="font-size: 10px;">Helping You Lead With Tech</span></p>
			</div>
		</div>
	</footer>

	<style>
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
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			width: 320px;
			padding: 12px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: start;
			background: #EF665B;
			border-radius: 8px;
			box-shadow: 0px 0px 5px -3px #111;
		}

		.global_feedback_container .feedback_align .warning {
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			width: 320px;
			padding: 12px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: start;
			background: #F7C752;
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
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			width: 320px;
			padding: 12px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: start;
			background: #84D65A;
			border-radius: 8px;
			box-shadow: 0px 0px 5px -3px #111;
		}

		@keyframes notification-fade-in {
			from {
				opacity: 0;
				transform: translateX(-100%);
			}

			to {
				opacity: 1;
				transform: translateX(0);
			}
		}

		@keyframes notification-fade-out {
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
			animation: notification-fade-out 0.5s ease-in-out forwards;
		}

		.animate_in {
			animation: notification-fade-in 0.5s ease-in-out forwards;
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
	</style>

	<!-- Feedback Container -->
	<div class="global_feedback_container none" id="global_feedback_container">
		<div class="feedback_align">
			<!-- Error Notification div -->
			<div class="error prepare_error" id="feedback_error">
				<div class="feedback__icon">
					<i class="fa-solid fa-triangle-exclamation"></i>
					<p class="feedback__title" id="feedback_error_text"> lorem ipsum dolor sit amet</p>
				</div>
			</div>
			<!-- Error Notification Div -->

			<!-- Success Notification Div -->
			<div class="success prepare_error" id="feedback_success">
				<div class="feedback__icon">
					<i class="fa-solid fa-circle-check"></i>
					<p class="feedback__title" id="feedback_successful_text"> lorem ipsum dolor sit amet</p>
				</div>
			</div>
			<!-- Success Notification Div -->

			<!-- Warning Notification Div -->
			<div class="warning prepare_error" id="feedback_warning">
				<div class="feedback__icon">
					<i class="fa-solid fa-triangle-exclamation"></i>
					<p class="feedback__title" id="feedback_warning_text"> lorem ipsum dolor sit amet</p>
				</div>
			</div>
			<!-- Warning Notification Div -->


		</div>
	</div>


	<!-- Back to top -->
	<div style="display: none;">
		<div class="btn-back-to-top" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="zmdi zmdi-chevron-up"></i>
			</span>
		</div>
	</div>

	<div id="account_navbar_" style="display: none;">
		<?php
		include_once "function.php";
		$account_code = account_code();
		print($account_code);

		if ($account_code == FALSE) {
			$output = '
		<div class="sidebar flex-col-l p-t-22 p-b-25" style="right:0">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04" onclick="toggle_account_navbar()">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll ps ps--active-y" style="position: relative; overflow: hidden;">
				<ul class="sidebar-link w-full">
					<div class="sidebar-gallery w-full p-b-30">
						<span class="mtext-101 cl5">
							<img width="50" height="50" src="https://img.icons8.com/ios-filled/100/user-male-circle.png" alt="user-male-circle" /> Profile
						</span>
					</div>

					<li class="p-b-13">
						<a href="signin.php" class="stext-102 cl2 hov-cl1 trans-04">
							Connect Account
						</a>
					</li>

					<li class="p-b-13">
						<a href="signup.php" class="stext-102 cl2 hov-cl1 trans-04">
							Create Account
						</a>
					</li>

					<li class="p-b-13">
						<a href="account.php?section=order history" class="stext-102 cl2 hov-cl1 trans-04">
							Forgot Password
						</a>
					</li>

				</ul>


				<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
					<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps__rail-y" style="top: 0px; right: 0px; height: 526px;">
					<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 452px;"></div>
				</div>
			</div>
		</div>
			';
		} else {
			$user = api_validate_account_code(LICENSE_KEY, account_code());
			if (isset($user['META_INFO'])) {
				$username = ' @ ' . strtoupper($user['META_INFO']['USERNAME']);
			} else {
				$username = ' USER MENU';
			}

			$output = '
		<div class="sidebar flex-col-l p-t-22 p-b-25" style="right:0">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04" onclick="toggle_account_navbar()">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll ps ps--active-y" style="position: relative; overflow: hidden;">
				<ul class="sidebar-link w-full">
					<div class="sidebar-gallery w-full p-b-30">
						<span class="mtext-101 cl5">
							<img width="50" height="50" src="https://img.icons8.com/ios-filled/100/user-male-circle.png" alt="user-male-circle" />' . $username . '
						</span>
					</div>

					<li class="p-b-13">
						<a href="account.php?section=profile" class="stext-102 cl2 hov-cl1 trans-04">
							Account Dashboard
						</a>
					</li>

					<li class="p-b-13">
						<a href="account.php?section=order history" class="stext-102 cl2 hov-cl1 trans-04">
							My Orders
						</a>
					</li>

					<li class="p-b-13">
						<a href="account.php?section=billing details" class="stext-102 cl2 hov-cl1 trans-04">
							Billing & Shipping
						</a>
					</li>

					<li class="p-b-13">
						<a href="account.php?section=payment settings" class="stext-102 cl2 hov-cl1 trans-04">
							Payment Settings
						</a>
					</li>
					
					<li class="p-b-13">
						<a href="account.php?section=withhold payout" class="stext-102 cl2 hov-cl1 trans-04">
							Withhold Payout
						</a>
					</li>

					<li class="p-b-13">
						<a href="account.php?section=withhold payout" class="stext-102 cl2 hov-cl1 trans-04">
							Notifications
						</a>
					</li>

					<li class="p-b-13">
						<a href="collection.php" class="stext-102 cl2 hov-cl1 trans-04">
							Support Tickets
						</a>
					</li>

					<li class="p-b-13">
						<a href="logout.php" class="stext-102 cl2 hov-cl1 trans-04">
							Logout
						</a>
					</li>
				</ul>


				<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
					<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps__rail-y" style="top: 0px; right: 0px; height: 526px;">
					<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 452px;"></div>
				</div>
			</div>
		</div>';
		}

		echo ($output);
		?>

	</div>

	<script>
		setInterval(cart_interval, 2000);

		function operate_loader(status = "spin") {
			var lazy_loader = window.document.getElementById('lazy_system_loader');
			if (status == "spin") {
				//window.document.getElementById('lazy_system_loader').style.display = "block"; 
				lazy_loader.style.display = "block";
			} else {
				lazy_loader.style.display = "none";
			} 
		}

		operate_loader(); 

			setTimeout(() => {
				operate_loader("stop"); 
			}, 5500);

		document.onloadeddata(()=>{
			operate_loader("stop"); 
		})
	</script>
	<script src="javascript/main_script.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	</body>

	</html>