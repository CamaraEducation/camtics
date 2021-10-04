<?php

$config = config();
?>
<!DOCTYPE html>
<html lang="en">

	<!-- Added by HTTrack -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<!-- /Added by HTTrack -->

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login :: <?=$config['site']; ?></title>
		<meta name="description" content="camara education ticketing and customer support system">
		<meta name="keywords" content="camara, education">
		<meta name="robots" content="index, follow">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="English">
		<meta name="revisit-after" content="10 days">
		<meta name="author" content="Abdulbasit Rubeiyya">
		<link rel="icon" href="/assets/img/logo.png" type="image/x-icon">		
		<link rel="stylesheet" href="/assets/css/style-freedom.css">
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<meta name="robots" content="noindex">
	</head>
	<body>
		<section class="w3l-login-6">
			<div class="login-hny">
				<div class="form-content">

					<div class="form-right">
						<div class="overlay">
							<div class="grid-info-form">
								<h5><?=$config['site']; ?></h5>
								<h3>You're Close More than Ever.</h3>
								<p>Login and let our Support Team Help you with your Problem</p>
							</div>
						</div>
					</div>
					<div class="form-left">
						<div class="top">
							<a href="index.html" class="brand-logo"><?=$config['site']; ?></a>
							<a href="/register" class="sign-in">Sign Up </a>
						</div>
						<div class="middle">
							<h4>Login now</h4>
							<p>Welcome! Please enter your credentials to login.</p>
						</div>
						<form action="/authorize" method="post" class="signin-form">
							<input type="text" name="action" value="login" hidden>
							<div class="form-input">
								<label>Username</label>
								<input type="user" name="user" placeholder="username, email or phone" required />
							</div>
							<div class="form-input">
								<label>Password</label>
								<input type="password" name="pass" placeholder="password" required />
							</div>
							<label class="container">Keep Me Logged In
						<input type="checkbox" name="concrete">
						<span class="checkmark"></span>
					</label>
							<button class="btn">Login</button>
						</form>
					</div>
				</div>
			</div>
		</section>