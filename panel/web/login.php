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
    <link rel="stylesheet" href="assets/css/style-freedom.css">
</head>

<body>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
            }
        })();
    </script>
    <!--<script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/w3layouts_V2/vdo.ai.js?vdo=34");</script>-->
    <div id="codefund">
        <!-- fallback content -->
    </div>
    <script src="http://codefund.io/properties/441/funder.js" async="async"></script>


    <meta name="robots" content="noindex">

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