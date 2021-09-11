<!--
                    Author     : Abdulbasit Rubeiyya
                    Author URL : httpS://actech.cc
                    Client     : Camara Education
                    Client Url : camara.org, camara.co.tz
-->
<?php 
    $config = config();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$config['site'];?> ::<?php echo str_replace("/"," ", $_SERVER['REQUEST_URI'])?></title>
        <link rel="icon" href="/assets/img/logo.png" type="image/x-icon">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <!-- QuillJs stylesheet -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">        
        <!-- ajax stylesheet -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- CSS stylesheets -->
        <link rel="stylesheet" href="/assets/css/style-starter.css">
        <link rel="stylesheet" href="/assets/css/custom.css">
        <!-- google fonts -->
        <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <body class="sidebar-menu-collapsed">
        <div class="se-pre-con"></div>
        <section>
        <!-- sidebar menu start -->
        <div class="sidebar-menu sticky-sidebar-menu">
            <!-- logo start
                <div class="logo">
                  <h1><a href="index.html">Collective</a></h1>
                </div -->
            <!-- if logo is image enable this -->
            <!-- image logo -->
            <div class="logo">
                <a href="index.html">
                <img src="/assets/img/logo-big.png" alt="Camara Education Tanzania" title="Camara Education Tanzania" class="img-fluid" style="height:50px;" />
                </a>
            </div>
            <!-- //image logo -->
            <div class="logo-icon text-center">
                <a href="/" title="logo"><img src="/assets/img/logo.png" alt="logo-icon"> </a>
            </div>
            <!-- //logo end -->
            <div class="sidebar-menu-inner">
                <!-- sidebar nav start -->
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li ><a href="/"><i class="fas fa-tachometer"></i><span> Dashboard</span></a>
                    </li>
                    <li class="menu-list">
                        <a href="#"><i class="fas fa-paper-plane"></i>
                        <span>Tickets</span></a>
                        <ul class="sub-menu-list">
                            <li>
                                <a href="/open/ticket">
                                    <i class="fa fa-circle text-primary"></i>
                                    Open
                                </a> 
                            </li>
                            <li>
                                <a href="/pending/ticket">
                                    <i class="fa fa-circle text-secondary"></i>
                                    Pending
                                </a> 
                            </li>
                            <li>
                                <a href="/closed/ticket">
                                    <i class="fa fa-circle text-danger"></i>
                                    Closed
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        switch(ROLE){
                            case 1:
                                include('admin.php');
                                break;
                            case 2:
                                break;
                            case 3:include('department.php');
                                break;
                            case 4:
                                include('agent.php');
                                break;
                            case 5:
                                break;
                            default:
                                include('client.php');
                        }
                    ?>
                </ul>
                <!-- //sidebar nav end -->
                <!-- toggle button start -->
                <a class="toggle-btn">
                <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
                <i class="fa fa-angle-double-right menu-collapsed__right"></i>
                </a>
                <!-- //toggle button end -->
            </div>
        </div>
        <!-- //sidebar menu end -->
        <!-- header-starts -->
        <div class="header sticky-header">
            <!-- notification menu start -->
            <div class="menu-right">
                <div class="navbar user-panel-top">
                    <div class="search-box">
                        <form action="#search-results.html" method="get">
                            <input class="search-input" placeholder="Search Here..." type="search" id="search">
                            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                    <div class="user-dropdown-details d-flex">
                        <!-- div class="profile_details_left">
                            <ul class="nofitications-dropdown">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                        class="fa fa-bell-o"></i><span class="badge blue">3</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 3 new notifications</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="odd">
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar2.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>New customer registered </p>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar3.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Lorem ipsum dolor sit amet </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#all" class="bg-primary">See all notifications</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                        class="fa fa-comment-o"></i><span class="badge blue">4</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 4 new messages</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="odd">
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar2.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>New customer registered </p>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar3.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Lorem ipsum dolor sit amet </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="grid">
                                                <div class="user_img"><img src="/assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#all" class="bg-primary">See all messages</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div -->
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="profile_img">
                                            <img src="<?=PHOTO?>" class="rounded-circle" alt="" />
                                            <div class="user-active">
                                                <span></span>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                                        <li class="user-info">
                                            <h5 class="user-name"><?=USER?></h5>
                                            <span class="status ml-2">Available</span>
                                        </li>
                                        <li> 
                                            <a href="/profile"> <i class="lnr lnr-user"> </i>My Profile</a> 
                                        </li>
                                        <li> 
                                            <a href="/setting"><i class="lnr lnr-cog"></i>Setting</a> 
                                        </li>
                                        <li class="logout"> 
                                            <a href="/logout"><i class="fa fa-power-off"></i> Logout</a> 
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--notification menu end -->
        </div>