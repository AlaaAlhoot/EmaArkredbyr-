<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsuid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $uid = $_SESSION['bpmsuid'];
        $adate = $_POST['adate'];
        $atime = $_POST['atime'];
        $msg = $_POST['message'];
        $aptnumber = mt_rand(100000000, 999999999);

        $query = mysqli_query($con, "insert into tblbook(UserID,AptNumber,AptDate,AptTime,Message) value('$uid','$aptnumber','$adate','$atime','$msg')");

        if ($query) {
            $ret = mysqli_query($con, "select AptNumber from tblbook where tblbook.UserID='$uid' order by ID desc limit 1;");
            $result = mysqli_fetch_array($ret);
            $_SESSION['aptno'] = $result['AptNumber'];
                  echo '<script>alert("The appointment has been booked successfully. We are happy to serve you")</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ema-Ark redbyrå</title>

    <link rel="stylesheet" href="./dashboard/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- <link rel="stylesheet" href="../assets/css/style-starter.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="icon" href="./assets/img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<div class="app-container">
<?php include_once 'includes/headerlogin.php'; ?>



  <div class="app-content">
    <div class="app-content-header">
    <p class="app-content-headerText">Book Appointment<br><br>Welcome | <span style="color: red;"><?php echo $row['FirstName']; ?></span></p>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>

      <i id="openmenu" class="fa-solid fa-bars"></i>

      <!-- <button  class="app-content-headerButton">Add Product</button> -->
    </div>

       <div class="app-content-actions">
            <div class="app-content-actions-wrapper">
              <div class="filter-button-wrapper">
                <button style="visibility: hidden;" class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
              
                <div class="filter-menu">
                  <label>Category</label>
                  <select>
                    <option>All Categories</option>
                    <option>Furniture</option>                     <option>Decoration</option>
                    <option>Kitchen</option>
                    <option>Bathroom</option>
                  </select>
                  <label>Status</label>
                  <select>
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                  </select>
                  <div class="filter-menu-buttons">
                    <button class="filter-button reset">
                      Reset
                    </button>
                    <button class="filter-button apply">
                      Apply
                    </button>
                  </div>
                </div>
              </div>
              <button style="visibility: hidden;" class="action-button list active" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
              </button>
              <button style="visibility: hidden;" class="action-button grid" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              </button>
            </div>
          </div>



    <div class="map-content-9 mt-lg-0 mt-4" style="overflow-y: scroll;">
                        <form    method="post" id="profileform" name="signup" onsubmit="return checkpass();">


                        
                            <?php
$uid = $_SESSION['bpmsuid'];
    $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {

        ?>
                                
                            

                            <div class="formdiv" class="formdiv">
                                <br>

                                <br><br>
                                <label>Utnämningsdagen</label>
                          
                                    <input type="date" class="form-control appointment_date" placeholder="Datum"
                                    name="adate" id='adate' required="true">
                            </div>
                            <!-- <div class="formdiv" class="formdiv" style="padding-top: 30px;">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lastname"
                                    value="<?php echo $row['LastName']; ?>" required="true">
                            </div> -->
                            <div class="formdiv" style="padding-top: 30px;">
                                <label>Mötestid</label>
                                <input  type="time" class="form-control appointment_time" placeholder="Tid" name="atime"
                                    id='atime' required="true">
                            </div>
                            <div class="formdiv" style="padding-top: 30px;">
                                <label>Message</label>
                       

                                <textarea style="width: 400px; height: 200px;" class="form-control" id="message"  name="message" placeholder="Meddelande"
                                    required=""></textarea>
                            </div>
                     

                                <button type="submit" class="btn btn-contact" style="float: left;" name="submit">Boka
                                tid</button>

                            <?php }?>

                        </form>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>




    
  </div>
</div>


<script>

document.getElementById("book-appointmen").classList.toggle("active");


</script>


<script src="../script.js"></script>
        <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
        <!-- Vendor JS Files -->
        <!-- <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/vendor/aos/aos.js"></script>
        <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> -->

        <script src="./assets/js/main.js"></script>
      <script src="./dashboard/script.js"></script>
</body>
</html><?php }?>