<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchPlus - Construction & Design | Login</title>

    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-touch-icon-ipad-retina.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-iphone-retina.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-ipad.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-touch-icon-iphone.png"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css"/>


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
<div id="wrapper" class="login">

    <div id="top">
        <div id="topBar" class="clearfix widget-content pad10">
            <a class="logo" href="index.html">
                <img src="images/logo.png" rel="logo">
            </a>

            <!--            <div class="topNav clearfix">-->
            <!--                <ul class="tNav clearfix">-->
            <!--                    <li>-->
            <!--                        <a data-toggle="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-gear icon-white"></i></a>-->
            <!--                        <ul class="dropdown-menu pull-right">-->
            <!--                            <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>-->
            <!--                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>-->
            <!--                            <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>-->
            <!--                            <li class="divider"></li>-->
            <!--                            <li><a href="#"> Other actions</a></li>-->
            <!--                        </ul>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!-- /topNav -->
        </div>
        <!-- /topBar -->

    </div>
    <!-- /top -->

    <div class="widget-content pad20 clearfix">
        <!--<div class="userImg">-->
        <!--<img src="images/user.jpg" rel="user">-->
        <!--</div>-->
        <!--<h3 class="center">Michael Williams</h3>-->
        <!--<span class="center light">Login</span>-->
        <span class="center light">Login</span>

        <form id="formLogin">
            <input name="user" type="text" class="input-text" placeholder="Username"/>
            <input name="pass" type="password" class="input-text" placeholder="Password"/>
			<span class="custom-input center">
                <button id="btn-login" class="btn btn-blue btn-full btn-login">Sign In</button>
<!--                <a class="btn btn-blue btn-full">Login</a>-->
                <input type="checkbox" id="chkbx-1"><label for="chkbx-1">Remember me</label>
            </span>
        </form>
    </div>
    <!-- /widget-content -->


</div>
<!-- /wrapper -->

<div id="footer-html"></div>

<script type="text/javascript" src="js/libs/prefixfree.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="js/libs/excanvas.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.flot.js"></script>
<script type="text/javascript" src="js/libs/jquery.flot.resize.js"></script>


<script type="text/javascript" src="js/controller/login.js"></script>


</body>

</html>