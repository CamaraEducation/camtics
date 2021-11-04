<?php

$config = config();
?>
<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Reset Pass :: <?=$config['site']; ?></title>
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
								<h3>Forgot your Password.</h3>
								<p>Reset it here to gain control of your account again</p>
							</div>
						</div>
					</div>
					<div class="form-left">
						<div class="top">
							<a href="index.html" class="brand-logo"><?=$config['site']; ?></a>
							<a href="/login" class="sign-in">Login</a>
						</div>
						<div class="middle">
							<h4>Reset Password</h4>
							<p>Please enter your credentials to reset your pass.</p>
						</div>
						<form action="/authorize" method="post" class="signin-form">
							<input type="text" name="action" value="reset" hidden>
							<div class="form-input">
								<label>Enter your Username</label>
								<input type="user" name="user" placeholder="username" required />
							</div>
                            <br>
							<button class="btn">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</section>