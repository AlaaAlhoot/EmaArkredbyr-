<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if ($_GET['delid']) {
        $sid = $_GET['delid'];
        mysqli_query($con, "delete from tbluseruplod where userid ='$sid'");
        // echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='useruplod.php'</script>";
    }

    ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Uplode File To Users</title>
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
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php include_once 'includes/sidebar.php';?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include_once 'includes/header.php';?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <!-- <h3 class="title1">Manage Read Enquiry</h3> -->



                    <div class="table-responsive bs-example widget-shadow">
                        <h4>Uplode File To Users:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Id</th>
                                    <th>Full Name</th>
                                    <th>Message</th>
                                    <th>Reg Date </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$ret = mysqli_query($con, "select tbluseruplod.ID,tbluseruplod.userid,tbluseruplod.Message,tbluseruplod.RegDate,tbluseruplod.fileuplod,
                        tbluser.ID,tbluser.FirstName,tbluser.LastName from tbluseruplod,tbluser
                        WHERE tbluseruplod.userid = tbluser.ID ORDER BY `tbluseruplod`.`RegDate` DESC ");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {

        ?>

                                <tr class="gradeX">
                                    <td><?php echo $cnt; ?></td>

                                    <td><?php echo $row['userid']; ?></td>
                                    <td><?php echo $row['FirstName'] . " " . $row['LastName'] ?></td>
                                    <td><?php echo $row['Message']; ?></td>
                                    <td>
                                        <span class="badge badge-primary"><?php echo $row['RegDate']; ?></span>
                                    </td>
                                    <td><a href="../admin/uploaduser/<?php echo $row['fileuplod']; ?>" target="_blank"
                                            class="btn btn-primary">View</a>
                                        <a href="useruplod.php?delid=<?php echo $row['userid']; ?>"
                                            class="btn btn-danger"
                                            onClick="return confirm('Are you sure you want to delete?')"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            </svg></a>
                                    </td>




                                </tr> <?php
$cnt = $cnt + 1;
    }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <?php include_once 'includes/footer.php';?>
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
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
</body>

</html>
<?php }?>