<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['bpmsaid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details.";
    }
}
?>
<!DOCTYPE HTML>
<html lang="sv">

<head>
    <title>Login Page </title>
    <link rel="icon" type="png/jpg" href="../assets/images/logo.png">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
    <link rel="./css/sass.css" type="" href="">
</head>

<body class="cbp-spmenu-push">


    <style>
        #preloader {
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: #e3f4fd url(../assets/images/load.gif) no-repeat center;
            background-size: 30%;
        }
    </style>

    <script>
        var loader = document.getElementById('preloader');

        window.addEventListener('load', function() {

            loader.style.display = "none";


        });
    </script>

    <div class="main-content">
        <canvas id="gradient-canvas" style="height: 100vh;">
        </canvas>

        <!-- main content start-->
        <div style="
    height: 100vh;
    width: 100vw;
    justify-content: center;
    display: flex;
    align-items: center;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    margin: auto;
background:#EFFBFF;
border:8px solid #000;
    ">
            <div class="main-page login-page ">
                <!-- <h3 class="title1">SignIn Page</h3> -->
                <div id="mainlogin" style="

    background-size:cover;
    border-radius: 12px;
                ">
                    <div class="login-top">
                        <img loading="lazy" height="120" width="120" style="object-fit: contain; opacity:81%" src="../assets/images/logo.png" alt="">
                        <!-- <h4>Ema-Ark AdminPanel </h4> -->
                    </div>
                    <div class="login-body">
                        <form role="form" method="post" action="">
                            <p style="font-size:16px; color:#ef4565" align="center"> <?php if ($msg) {
                                                                                            echo $msg;
                                                                                        } ?> </p>
                            <input type="text" class="user" name="username" placeholder="Username" required="true">
                            <input type="password" name="password" class="lock" placeholder="Password" required="true">
                            <input id="signinbutton" type="submit" name="login" value="Enter" style="background: #aed96a;
    font-weight: 500;
    transition: all 0.3s ease 0;
    border-radius: 8px;">
                            <div class="forgot-grid">

                                <div class="forgot">
                                    <a href="../index.php" style="
        color: #000;
                                    ">

                                        ● Back To Website

                                    </a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="forgot-grid">

                                <div class="forgot">
                                    <!-- <a href="forgot-password.php">forgot password?</a> -->
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }


        document.querySelector("Invalid Details.").style.color = "red"
    </script>


    <style>
        #gradient-canvas {
            width: 100%;
            height: 100%;
            --gradient-color-1: #60a4ff;
            --gradient-color-2: #60a4ff;
            --gradient-color-3: #60a4ff;
            --gradient-color-4: #8affb3;
            z-index: 0;
        }

        * {
            overflow: hidden;
        }

        #signinbutton {
            transition: all 0.3s ease 0s;
            text-transform: uppercase;
            color: #000;
            font-weight: bold;
        }

        #signinbutton:hover {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            transition: all 0.3s ease 0s;
            letter-spacing: 2px;
        }

        .icon-tabler-arrow-back-up {
            background: #000;
            border-radius: 50%;
            padding: 7px;
        }

        .forgot {
            position: fixed;
            top: 20px;
            left: 20px;
            transition: all 0.3s ease 0s;
        }


        .forgot a {
            transition: all 0.3s ease 0s;

        }

        .forgot a:hover {

            transition: all 0.3s ease 0s;

            color: #555 !important;

        }
    </style>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>



    <script>

    </script>
    </script>

</body>

</html>