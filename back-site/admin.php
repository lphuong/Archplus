<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/25/2015
 * Time: 10:51 AM
 */
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

require_once("php/commons/DBSingleton.php");
$pDatabase = Database::getInstance();

$sql = "SELECT * FROM users WHERE user_id LIKE '" . mysql_real_escape_string($_SESSION['user']) . "'";
$res = $pDatabase->query($sql);
$userRow = mysql_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novus Admin Theme</title>

    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-touch-icon-ipad-retina.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-iphone-retina.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-ipad.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-touch-icon-iphone.png"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="css/toastr.css">

    <link href="css/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div id="loading">
    <div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div id="wrapper" class="container">

    <div id="top">
        <div id="topBar">
            <div class="wrapper20">
                <a class="logo" href="#" title="">
                    <img src="images/logo.png" rel="logo">
                </a>

                <div class="topNav clearfix">
                    <input class="topSearch" type="text" placeholder="Search...">
                    <ul class="tNav clearfix">
                        <li><a href="#" onclick="return false;"><i class="fa fa-search icon-white"></i></a></li>
                        <li>
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle"><i
                                    class="fa fa-gear icon-white"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"> Other actions</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="messages.html"><i class="fa fa-comment icon-white"></i></a>
                            <span class="badge badge-tNav">4</span>
                        </li>
                        <li><a href="php/logout.php?logout"><i class="fa fa-times icon-white"></i></a></li>
                    </ul>
                </div>
                <!-- /topNav -->
            </div>
        </div>
        <!-- /topBar -->

        <div id="profile">
            <div class="wrapper20">
                <div class="userInfo">
                    <div class="userImg">
                        <img src="images/user.jpg" rel="user">
                    </div>
                    <div class="userTxt">
                        <span class="fullname">ArchPlus Admin</span> <i class="fa fa-chevron-right"></i><br>
                        <span class="username">@<?php echo $userRow['username']; ?></span>
                    </div>
                </div>
                <!-- /userInfo -->
                <div class="userStats">
                    <div class="uStat">
                        <div class="stat-name">
                            Users
                            <div class="stat-badge">+14</div>
                        </div>
                        <div class="stat-number">218k</div>
                    </div>
                    <div class="uStat">
                        <div class="stat-name">
                            Orders
                            <div class="stat-badge">+27</div>
                        </div>
                        <div class="stat-number">1857</div>
                    </div>
                    <div class="uStat graph">
                        <div id="stats_visits" class="stat-chart" values="7,18,34,29,20,18,22,31,32,18,13,23,34"></div>
                        <div class="stat-name">
                            Visits
                            <div class="stat-badge">+109</div>
                        </div>
                        <div class="stat-number">749</div>

                    </div>
                    <div class="uStat graph">
                        <div id="stats_balance" class="stat-chart" values="7,18,34,29,20,18,22,31,32,18,13,23,34"></div>
                        <div class="stat-name">
                            Balance
                        </div>
                        <div class="stat-number">$26.425</div>
                    </div>
                </div>

                <i class="fa fa-bars icon-nav-mobile"></i>

            </div>
        </div>
        <!-- /profile -->
    </div>
    <!-- /top -->

    <div id="sidebar">
        <ul class="mainNav">
            <li id="dashboard" class="active">
                <a href=""><i class="fa fa-bar-chart-o"></i><br>Dashboard</a>
            </li>
            <li id="post">
                <a href=""><i class="fa fa-user"></i><br>About</a>
            </li>
            <li>
                <a href=""><i class="fa fa-tasks"></i><br>Form stuff</a>
            </li>
            <li>
                <a href=""><i class="fa fa-comments"></i><br>Messages</a>
                <span class="badge badge-mNav">4</span>
            </li>
            <li>
                <a href=""><i class="fa fa-paperclip"></i><br>Statistics</a>
            </li>
            <li>
                <a href=""><i class="fa fa-th"></i><br>Grids</a>
            </li>
            <li>
                <a href=""><i class="fa fa-frown-o"></i><br>404</a>
            </li>
            <li>
                <a href=""><i class="fa fa-key"></i><br>Login</a>
            </li>
        </ul>
    </div>
    <!-- /sidebar -->

    <div id="main" class="clearfix">
        <div class="mainPage"><?php include 'page/dashboard.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/about.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
        <div class="mainPage" style="display: none;"><?php include 'page/comming.php'; ?></div>
    </div>
    <!-- /main -->

</div>
<!-- /wrapper -->


<div id="footer-html"></div>

<script type="text/javascript" src="js/libs/prefixfree.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.hashchange.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="js/libs/excanvas.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.flot.js"></script>
<script type="text/javascript" src="js/libs/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/libs/toastr.min.js"></script>

<script type="text/javascript" src="js/controller/main.js"></script>
<script type="text/javascript" src="js/controller/dashboard.js"></script>
<!--<script type="text/javascript" src="js/controller/ui.js"></script>-->
<script type="text/javascript" src="js/controller/charts.js"></script>
<script type="text/javascript" src="js/controller/posts.js"></script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
//    setTimeout(function () {
//        toastr.info('<span style="color:#333;">Welcome to Novus! The new flat Admin Theme.</span>');
//    }, 2000);
//
//    setTimeout(function () {
//        toastr.warning('<span style="color:#333;">You could navigate the different sections to discover it...</span>');
//    }, 4500);
</script>

</body>

</html>