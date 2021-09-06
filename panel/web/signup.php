<?php
$fetch_branches = new Branch();
$config = config();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register :: <?=$config['site']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
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
                                <h3>Quality Support For every One.</h3>
                                <p>Register now and meet with our Finest Support Team.</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-left">
                        <div class="top">
                            <a href="index.html" class="brand-logo"><?=$config['site']; ?></a>
                            <a href="login" class="sign-in">Sign In </a>
                        </div>
                        <div class="middle" style="margin-top:40px;">
                            <h4>Join Us</h4>
                            <p>Create Your Account, It's Free.</p>
                        </div>
                        <form action="/authorize" method="post" class="signin-form">
                            <input type="text" name="action" value="register" hidden/>
                            <div class="form-input">
                                <label>User Name</label>
                                <input type="text" name="user" placeholder="eg. john" class="form-control" required />
                            </div>
                            <div class="form-input">
                                <label>Country<label>
                                <select name="branch" class="form-control form-select" gloss="select country" required>
                                    <option value="" hidden>Select Country</option>
                                    <?php
                                        $branches = $fetch_branches->fetch_branches();
                                        foreach($branches as $branch){
                                            if($branch['id']!=0){ ?>
                                                <option value="<?=$branch['id'];?>"><?=$branch['country'];?></option>
                                                <?php
                                            }
                                        }
                                    ?> 
                                </select>
                            </div>
                            <div class="search-box form-input">
                                <label>Organization</label>
                                <input type="text" name="organization" list="organization" autocomplete="off" placeholder="Search organization..." required>
                                <datalist id="organization" class="result"></datalist>
                            </div>
                            <div class="form-input">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="eg. johndoe@gmail.com" class="form-control" required />
                            </div>
                            <div class="form-input">
                                <label>phone</label>
                                <input type="number" name="phone" placeholder="eg. 255682XXXXXX" class="form-control" required />
                            </div>
                            <div class="form-input">
                                <label>Password</label>
                                <input type="password" name="pass" placeholder="password" class="form-control" required />
                            </div>

                            <label class="container">Registering to this platform means you agree to Conditions of Use and Privacy</label>
                            <button class="btn">Create account</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.search-box input[type="text"]').on("keyup input", function(){
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if(inputVal.length){
                        $.get("/search/oranization", {term: inputVal}).done(function(data){
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else{
                        resultDropdown.empty();
                    }
                });
                
                // Set search input value on click of result item
                $(document).on("click", ".result p", function(){
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });
        </script>
    </body>
</html>