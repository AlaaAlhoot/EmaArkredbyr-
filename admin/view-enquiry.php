<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    $vid = $_GET['viewid'];
    $isread = 1;
    $query = mysqli_query($con, "update   tblcontact set IsRead ='$isread' where ID='$vid'");

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>View customer</title>
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
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>
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
        <!--left-fixed -navigation-->
        <?php include_once 'includes/sidebar.php'; ?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include_once 'includes/header.php'; ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <!-- <h3 class="title1">View Enquiry</h3> -->



                    <div class="table-responsive bs-example widget-shadow">

                        <?php

                            $ret = mysqli_query($con, "select * from tbluser where ID=$vid");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>
                        <table class="table table-bordered mg-b-0" style="font-size: 20px;">

                            <tr style="color: blue;font-size: 30px;text-align: center;">
                                <td colspan="4" style="

color: #0f0f0f;
    font-weight: 600;
    opacity: 80%;

                                ">View Enquiry</td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td><?php echo $row['FirstName'] . " " . $row['LastName']; ?></td>

                                <th>Email</th>
                                <td><?php echo $row['Email']; ?></td>

                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php echo $row['MobileNumber']; ?></td>
                                <th>Registration Date</th>
                                <td><?php echo $row['RegDate']; ?></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td colspan="4"><?php echo $row['message']; ?></td>
                            </tr>
                            <tr>
                                <th>Action File</th>
                                <?php
                                        $filename = $row['filename'];
                                        if (!empty($filename)) {
                                            echo "<td style='display: flex; gap: 16px;'>
          <a class='btn btn-primary' href='../uploads/$filename' target='_blank'>
            <i class='fa fa-eye' aria-hidden='true'></i>
          </a>
          <a class='btn btn-primary' href='../uploads/$filename' download>
            <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
              <path d='M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4'></path>
              <polyline points='7 10 12 15 17 10'></polyline>
              <line x1='12' y1='15' x2='12' y2='3'></line>
            </svg>
          </a>
        </td>";
                                        } else {
                                            echo "<td><span style='color:red; font-weight:bold;'>The user did not upload any file when registering</span></td>";
                                        }
                                        ?>


                            </tr>

                        </table>


                        <?php $cnt = $cnt + 1;
                            } ?>


                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <?php include_once 'includes/footer.php'; ?>
        <!--//footer-->
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
    </script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php } ?>