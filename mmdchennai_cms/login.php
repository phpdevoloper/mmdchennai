<?Php
include("include/db_connection.php");
session_start();
$_SESSION['session_random_id_before'] = session_id();

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>MMD-Chennai | Login</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php include "include/sourcelink_css.php" ?>
</head>

<body class="login-page" style="background: url(vendors/images/mmdchennai_1.jpg) no-repeat;background-size: cover;">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<!-- <div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div> -->
			<!-- <div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center justify-content-center">

				<div class="col-md-12 col-lg-5 ">
					<div class="login-box bg-white box-shadow border-radius-10 ">
						<div class="row justify-content-center login-logo">
							<a href="index.html" class="justify-content-center">
								<img src="vendors/images/logo.gif" alt="" class="light-logo">
							</a>
						</div>
						<div class="login-title p-2">
							<div class="row justify-content-center">
								<h2 class="text-center text-primary">SignIn</h2>
							</div>
						</div>
						<div class="text-center" id="errordiv">
							<span id="invalid_error"></span>
						</div>
						<br>
						<form id="signin-form" data-parsley-validate="" autocomplete="off">
							<!-- <div class="select-role"> -->

							<!-- </div>d q	 -->
							<div class="row">
								<div class="col-md-12">
									<div class="input-group custom">
										<input type="text" id="username" class="form-control form-control-lg" placeholder="Username" required="required" autofocus data-parsley-errors-container="#error_username">
										<div class="input-group-append custom">
											<span class="input-group-text"></span>
										</div>
									</div>
									<span id="error_username"></span>
								</div>
								<div class="col-md-12">
									<div class="input-group custom">
										<input type="password" id="password" class="form-control form-control-lg" placeholder="**********" required="required" data-parsley-errors-container="#error_password">
										<div class="input-group-append custom">
											<span class="input-group-text"></span>
										</div>
									</div>
									<span id="error_password"></span>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-lg-10 text-center " style="padding-bottom:10px;">
											<div class="col-lg-12">
												<!-- <div id="captcha" class="canvacaptcha text-center" style="border:2px solid #eeeeee;background:#eeeeee;padding-top:15px;">
                                                </div> -->
												<div style="background:#eeeeee;border-radius:7px;">
													<canvas id="captcha"></canvas>
												</div>
												<!-- <img src="include/captcha.php" alt="CAPTCHA" id="captcha"class="captcha-image"><i class="fas fa-redo refresh-captcha"></i> -->
											</div>
										</div>
										<div class="col-lg-2">
											<div style="padding-top:2px;font-size:20pt;">
												<i class="fa fa-refresh cap_refresh" title="Refresh Captcha" onclick=" createCaptcha();"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="input-group custom">
										<input type="text" id="captchaTextBox" class="form-control form-control-lg" placeholder="Captcha" required="required" data-parsley-errors-container="#error_captcha">
										<div class="input-group-append custom">
											<span class="input-group-text"></span>
										</div>
									</div>
									<span id="error_captcha"></span>
									<span id="captchaerror"></span>
								</div>
								<!-- <div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							    </div> -->
								<div class="col-md-12 ">
									<div class="row justify-content-center">
										<div class="col-md-5 ">
											<div class="input-group mb-5 ">
												<a class="btn btn-primary btn-lg btn-block" href="#" onclick="login();">Sign In</a>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
									</div> -->
							</div>

					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- js -->
	<?Php include "include/sourcelink_js.php" ?>
	<script>
		var code, captcha_code;
		$(document).ready(function() {
			// Generate captcha on page load
			createCaptcha();
			// // Handle captcha refresh button click
			// $("#refresh-captcha").click(function() {
			// 	generateCaptcha();
			// 	$("#captcha-input").val("");
			// });
			// // Handle form submit
			// $("#captcha-form").submit(function(event) {
			// 	event.preventDefault();

			// 	// Validate captcha
			// 	var captchaInput = $("#captcha-input").val();
			// 	var captchaCode = sessionStorage.getItem("captchaCode");
			// 	if (captchaInput != captchaCode) {
			// 		alert("Invalid captcha code. Please try again.");
			// 		generateCaptcha();
			// 		$("#captcha-input").val("");
			// 		return;
			// 	}
			// 	// Form validation successful, submit form
			// 	alert("Form submitted successfully.");
			// 	$("#captcha-form").trigger("reset");
			// 	generateCaptcha();
			// });

			// // Define the function generateCaptcha()
			// function generateCaptcha() {
			// 	// Get the canvas element with ID captcha and create an instance of its canvas rendering context
			// 	var a = $("#captcha")[0],
			// 		b = a.getContext("2d");
			// 	// Clear the canvas
			// 	b.clearRect(0, 0, a.width, a.height);
			// 	// Define the string of characters that can be included in the captcha
			// 	var f = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
			// 		e = "",
			// 		g = -45,
			// 		h = 45,
			// 		i = h - g,
			// 		j = 20,
			// 		k = 30,
			// 		l = k - j;
			// 	// Generate each character of the captcha
			// 	for (var m = 0; m < 6; m++) {
			// 		// Select random letter from the pool to be part of the captcha
			// 		var n = f.charAt(Math.floor(Math.random() * f.length));
			// 		e += n;

			// 		// Set up the text formatting
			// 		b.font = j + Math.random() * l + "px Arial";
			// 		b.textAlign = "center";
			// 		b.textBaseline = "middle";

			// 		// Set the color of the text
			// 		b.fillStyle = "rgb(" + Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256) + ")";

			// 		// Add the character to the canvas
			// 		var o = g + Math.random() * i;
			// 		b.translate(20 + m * 30, a.height / 2);
			// 		b.rotate(o * Math.PI / 180);
			// 		b.fillText(n, 0, 0);
			// 		b.rotate(-1 * o * Math.PI / 180);
			// 		b.translate(-(20 + m * 30), -1 * a.height / 2);
			// 	}
			// 	// Set the captcha code in session storage
			// 	sessionStorage.setItem("captchaCode", e);
			// }


		})

		function createCaptcha() {

			let showNum = [];
			let canvasWinth = 180;
			let canvasHeight = 50;
			let canvas = document.getElementById('captcha');
			let context = canvas.getContext('2d');
			canvas.width = canvasWinth;
			canvas.height = canvasHeight;
			let sCode = 'A,B,C,D,E,F,G,H,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9';
			let saCode = sCode.split(',');
			let saCodeLen = saCode.length
			for (let i = 0; i <= 5; i++) {
				let sIndex = Math.floor(Math.random() * saCodeLen);
				let sDeg = (Math.random() * 30 * Math.PI) / 180;
				let cTxt = saCode[sIndex];
				showNum[i] = cTxt;
				// showNum[i] = cTxt.toLowerCase();
				let x = 10 + i * 20;
				let y = 20 + Math.random() * 8;
				context.font = 'bold 30px Microsoft YaHei';
				context.translate(x, y);
				context.rotate(sDeg);

				context.fillStyle = randomColor();
				context.fillText(cTxt, 0, 0);

				context.rotate(-sDeg);
				context.translate(-x, -y);
			}
			for (let i = 0; i <= 5; i++) {
				context.strokeStyle = randomColor();
				context.beginPath();
				context.moveTo(
					Math.random() * canvasWinth,
					Math.random() * canvasHeight
				);
				context.lineTo(
					Math.random() * canvasWinth,
					Math.random() * canvasHeight
				);
				context.stroke();
			}
			for (let i = 0; i < 30; i++) {
				context.strokeStyle = randomColor();
				context.beginPath();
				let x = Math.random() * canvasWinth;
				let y = Math.random() * canvasHeight;
				context.moveTo(x, y);
				context.lineTo(x + 1, y + 1);
				context.stroke();
			}
			rightCode = showNum.join('');
			captcha_code = showNum.join('');

		}

		function randomColor() {
			let r = Math.floor(Math.random() * 256);
			let g = Math.floor(Math.random() * 256);
			let b = Math.floor(Math.random() * 256);
			return 'rgb(' + r + ',' + g + ',' + b + ')';
		}

		function login() {
			// var captcha;
			// function generate() {
			//     $('#password').text(Math.floor(Math.random() * 6) + 1);
			// }
			// setInterval(generate, 1000);
			$('#invalid_error').text('');
			if ($('#signin-form').parsley().validate() != true) {
				return false;
			} else {
				if (document.getElementById("captchaTextBox").value == captcha_code) {
					$('#captchaerror').text('');
					$('#user_error').text('');
					$('#pass_error').text('');
					$('#invalid_error').text('');
					var username, password, encrypt_password;
					username = $('#username').val();
					password = $('#password').val();
					//$("#password").val(sha512(password));
					// encrypt_password = $('#password').val();
					var randomnumber = Math.floor((Math.random() * 1000000) + 1);
					var randompassword = randomnumber + sha512(password);
					var md5password = sha512(randompassword);

					// alert(Math.floor(Math.random() * 1000000));
					//  return false;
					$('#password').val(md5password);

					// alert(md5password);
					var data = {
						username: username,
						randompassword: md5password,
						randomnumber: randomnumber
					}
					// console.log(data);
					$.ajax({
						url: "webservice/check_login.php",
						type: "POST",
						dataType: 'json',
						data: data,
						success: function(data) {
							console.log(data.status);

							if (data.status == 'invalid') {
								$('#errordiv').show();
								$('#invalid_error').text(data.err_content);
								$('#captchaTextBox').val('');
								createCaptcha();
							} else {
								$('#errordiv').hide();
								$('#invalid_error').text('');
								$(location).attr('href', 'index.php');

							}
						},

					});

				} else {
					$('#captchaTextBox').val('');
					$('#captchaerror').text('InValid Captcha! Please try again.');
					createCaptcha();
				}
			}
		}
	</script>
</body>

</html>