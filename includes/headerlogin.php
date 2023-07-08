<?php
include "dbconnection.php"; // include the file that connects to the database
if (isset($_SESSION['bpmsuid']) && strlen($_SESSION['bpmsuid']) > 0) {
    $userId = $_SESSION['bpmsuid'];
    $query = "SELECT FirstName FROM tbluser WHERE ID = '$userId'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['FirstName'];
        $welcomeMessage = "<span>$firstName</span> ";
    }
} else {
    $welcomeMessage = "";
}
?>


    <?php if (!isset($_SESSION['bpmsuid']) || strlen($_SESSION['bpmsuid']) == 0) { ?>
            
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <span href="#" class="logo d-flex align-items-center">




        <h1 id="Ema-Ark-Logo" class="d-flex align-items-center">Ema-Ark Redbyrå</h1>



        </span>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>


          
                    <li><a href="index.php">Hem</a></li>
                    <li><a href="about.php">Page</a></li>
                    <li><a href="signup.php">Bli Medlem</a></li>
                    <li><a href="login.php">Logga in</a></li>





            </ul>
        </nav>
    </div>
</header>

                
                <?php } else { ?>
                    <div class="sidebar
                    animate__animated animate__fadeInLeft
                    animate__delay-0s animate__faster
                    " id="sidebar">

       
              
                    
          <div class="sidebar-header">
            <div class="app-icon">

<img height="24" width="20" src="./assets/img/logo.png" alt="logo" srcset="">
          </div>
          </div>
          <ul class="sidebar-list">
            <li class="sidebar-list-item" id="profileitem">
              <a href="profile.php">
              <i class="fa-regular fa-user"></i>
                <span>Profile</span>
              </a>
            </li>

            <li class="sidebar-list-item" id="serviceactive">
              <a href="serviceslogin.php">
              <i class="fa-solid fa-dollar-sign"></i>
              <span>Tjänster</span>
              </a>
            </li>


            <li class="sidebar-list-item " id="book-appointmen" >
              <a href="book-appointment.php">
              <i class="fa-solid fa-calendar-days"></i>
              <span>Book appointment</span>
              </a>
            </li>
            <li class="sidebar-list-item" id="bookhistore">
              <a href="booking-history.php">
              <i class="fa-solid fa-clock-rotate-left"></i>
              <span>Bokningshistorik</span>
              </a>
            </li>
            <li class="sidebar-list-item" id="invoicehistore">
              <a href="invoice-history.php">
              <i class="fa-solid fa-file-invoice"></i>
              <span>Faktureringshistorik</span>
              </a>
            </li>
            <li class="sidebar-list-item" id="fileview"> 
              <a href="fileview.php">
              <i class="fa-regular fa-file-lines"></i>
              <span>Visa Filer</span>
              </a> 
            </li>

            <li class="sidebar-list-item" id="setting">
              <a href="change-password.php">
              <i class="fa-solid fa-gear"></i>
              <span>setting</span>
              </a> 
            </li>

    

       
          </ul>

          <li class="sidebar-list-item account-info">
              <a href="logout.php">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span>Logga Ut</span>
              </a> 
            </li>



          </a> 
        </div>
          

                <?php } ?>








<!-- <?php echo $welcomeMessage; ?></p> -->
