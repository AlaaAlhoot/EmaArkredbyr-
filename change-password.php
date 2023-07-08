<?php
session_start();

include 'includes/dbconnection.php';

if (empty($_SESSION['bpmsuid'])) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_POST['change'])) {
        $userid = $_SESSION['bpmsuid'];
        $cpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        // Check if current password matches
        $query1 = "SELECT Password FROM tbluser WHERE ID='$userid'";
        $result = mysqli_query($con, $query1);
        $row = mysqli_fetch_assoc($result);
        $passwordHash = $row['Password'];
        if (!password_verify($cpassword, $passwordHash)) {
            $er_message = "Ditt nuvarande lösenord är felaktigt.";
        }
        
        // Check if new password and confirm password match
        else if ($newpassword !== $confirmpassword) {
            $er_message = "Det nya lösenordet och det bekräftade lösenordet matchar inte.";
        }
        
        // Update password
        else {
            $newpasswordHash = password_hash($newpassword, PASSWORD_DEFAULT);
            $query2 = "UPDATE tbluser SET Password='$newpasswordHash' WHERE ID='$userid'";
            $result = mysqli_query($con, $query2);
            if (!$result) {
                $er_message = "Något gick fel. Försök igen senare.";
            } else {
                $su_message = "Ditt lösenord har ändrats.";
            }
        }
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


        <link rel="icon" href="./assets/img/favicon.ico">

        <link rel="stylesheet" href="./dashboard/style.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <!-- <link rel="stylesheet" href="../assets/css/style-starter.css"> -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    </head>

    <body>
        <div class="app-container">
            <?php include_once 'includes/headerlogin.php'; ?>

            <div class="app-content">
                <div class="app-content-header">
          
<h1 class="
app-content-headerText

">
<p class="app-content-headerText">Settings<br><br>Welcome | <span style="color: red;"><?php echo $row['FirstName']; ?></span></p>
</h1>

                    <button class="mode-switch" title="Switch Theme">
                        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                            <defs></defs>
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                        </svg>
                    </button>

          <i id="openmenu" class="fa-solid fa-bars"></i>

                    <!-- <button class="app-content-headerButton">Add Product</button> -->
                </div>
                <div class="app-content-actions">
                    <!-- <input class="search-bar" placeholder="Search..." type="text"> -->
                    <div class="app-content-actions-wrapper">
                        <div class="filter-button-wrapper">
                            <button style="visibility: hidden;" class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                </svg></button>
                            <div class="filter-menu">
                                <label>Category</label>
                                <select>
                                    <option>All Categories</option>
                                    <option>Furniture</option>
                                    <option>Decoration</option>
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
                                    <button style="visibility: hidden;" class="filter-button reset">
                                        Reset
                                    </button>
                                    <button class="filter-button apply">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button style="visibility: hidden;" class="action-button list active" title="List View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6" />
                                <line x1="8" y1="12" x2="21" y2="12" />
                                <line x1="8" y1="18" x2="21" y2="18" />
                                <line x1="3" y1="6" x2="3.01" y2="6" />
                                <line x1="3" y1="12" x2="3.01" y2="12" />
                                <line x1="3" y1="18" x2="3.01" y2="18" />
                            </svg>
                        </button>
                        <button style="visibility: hidden;" class="action-button grid" title="Grid View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="products-area-wrapper tableView">


                <div class="container">
                <div class="d-grid contact-view">
                
                    <div class="map-content-9 mt-lg-0 mt-4">
               


<form method="post" id="profileform" name="signup" onsubmit="return checkpass();">
    <?php if (isset($er_message)) : ?>
                                <p class="animate__animated animate__fadeInDown" style="background-color: red; color: white; padding: 10px; border-radius: 20px;">
                                    <?php echo $er_message; ?></p>
                            <?php endif; ?>

                            <?php if (isset($su_message)) : ?>
                                <p style="background-color: green; color: black;"><?php echo $su_message; ?></p>
                            <?php endif; ?>

  <div class="formdiv">
    <label>Nuvarande lösenord</label>
    <input type="password" class="form-control" placeholder="Nuvarande lösenord"
                                    id="currentpassword" name="currentpassword" value="" required>
  </div>

  <div class="formdiv" style="padding-top: 30px;">
    <label>Nytt lösenord</label>
    <input type="password" class="form-control" placeholder="Nytt lösenord" id="newpassword"
                                    name="newpassword" value="" required>
  </div>
  <div class="formdiv" style="padding-top: 30px;">
    <label>Bekräfta lösenord</label>
    <input type="password" class="form-control" placeholder="Bekräfta lösenord"
                                    id="confirmpassword" name="confirmpassword" value="" required>
  </div>
  <button type="submit" class="btn btn-contact" style="float: left;" name="change">Ändra lösenord</button>

</form>

                    </div>
                </div>
            </div>

        </div>
        </div>

        <script>
            document.getElementById("setting").classList.toggle("active");
        </script>
        <!-- move top -->

        <script src="../script.js"></script>
        <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
 
        <script src="./assets/js/main.js"></script>
        <script src="./dashboard/script.js"></script>
    </body>

    </html>

<?php ?>
