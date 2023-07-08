<?php
session_start();
include 'includes/dbconnection.php';


if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    $vid = $_GET['delid'];
    $isread = 1;
    $query = mysqli_query($con, "SELECT tbluser where ID='$vid'");
    ?>
<?php
if (isset($_POST['accept'])) {
    $message = $_POST['message'];
    $id = $_POST['id_hidden'];
    // $image = $_POST['image'];

        $image = $_FILES["image"]["name"];
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif", ".pdf", ".txt", ".doc", ".docx");
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only (jpg /jpeg/png/gif/pdf/txt/doc/docx) format allowed');</script>";
        } else {
            $a= time();
            $newimage =$vid."_".$a . $extension;
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploaduser/" . $newimage);
            $query = mysqli_query($con, "insert into tbluseruplod(userid,fileuplod,Message) value('$id','$newimage','$message')");
            echo($query);
                if ($query) {
                    echo "<script>alert('Your message was sent successfully!.');</script>";
                    $url = "readenq.php";
                    header("refresh:2; Location: $url"); 
                    
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again")</script>';
                  
                }
        }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Manage Read Enquiry</title>
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
                        <h4>Upload files to the user:</h4>

                        <?php
                    $ret = mysqli_query($con, "select * from tbluser where ID=".$vid);
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {

        ?>

                        <tr class="gradeX">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID:</label>
                                    <input type="text" class="form-control" name="id" value=<?php echo $row['ID'] ; ?>
                                        disabled>
                                    <input type="hidden" class="form-control" name="id_hidden"
                                        value=<?php echo $row['ID'] ; ?>>
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" value=<?php echo $row['FirstName'] ; ?>
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" value=<?php echo $row['LastName'] ; ?>
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" value=<?php echo $row['Email'] ; ?>
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number:</label>
                                    <input type="text" class="form-control" value=<?php echo $row['MobileNumber'] ; ?>
                                        disabled>
                                </div>
                                <textarea class="form-control" id="message" name="message" placeholder="Message"
                                    required=""></textarea>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="image" name="image" value=""
                                        required="">
                                </div>
                                <button type="submit" class="btn btn-primary" name="accept">Submit</button>
                            </form>


                        </tr> <?php
$cnt = $cnt + 1;
    }?>
                        </tbody>
                        </table>
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
    </script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
</body>

</html>
<?php }?>