<?php

include 'includes/dbconnection.php';
session_start();

if (!isset($_SESSION['bpmsuid']) || strlen($_SESSION['bpmsuid']) === 0) {
    header("Location: login.php");
    exit();
}

 $ID = $_SESSION['bpmsuid'];

// Retrieve user data from database
$stmt = mysqli_prepare($con, "SELECT * FROM tbluser WHERE ID = ?");
mysqli_stmt_bind_param($stmt, "i",  $ID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    // Sanitize input
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $phone = clean_input($_POST['phone']);
    $email = clean_input($_POST['email']);
    $message = clean_input($_POST['message']);

    // Check if an image file is uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] != 4) {
        $image = $_FILES["image"];

        // Validate file size
        $max_size = 15 * 1024 * 1024;
        if ($image["size"] > $max_size) {
            http_response_code(400);
            die("File size should not exceed 15 MB.");
        }

        // Validate file type
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf", "txt", "doc", "docx");
        $file_type = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
        if (!in_array($file_type, $allowed_types)) {
            http_response_code(400);
            $er_message = "Invalid format. Only (jpg/jpeg/png/gif/pdf/txt/doc/docx) format allowed.";
        }

        // Upload file
        $new_image_name = $fname . "_" . $lname . "_" . time() . "." . $file_type;
        $upload_path = "uploads/" . $new_image_name;
        if (!move_uploaded_file($image["tmp_name"], $upload_path)) {
            http_response_code(500);
            $er_message = "Failed to upload file.";
        }

        // Delete old image file
        if (!empty($row['filename'])) {
            $old_file_path = "uploads/" . $row['filename'];
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }
    } else {
        // No image file uploaded
        $new_image_name = $row['filename'];
    }

    // Update data in database
    $stmt = mysqli_prepare($con, "UPDATE tbluser SET FirstName=?, LastName=?, MobileNumber=?, Email=?, Message=?, filename=? WHERE ID=?");
    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $phone, $email, $message, $new_image_name,  $ID);
    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
        $su_message = "successfully updated";
    } else {
        http_response_code(500);
        $er_message = "Something went wrong. Please try again.";
    }
}

function clean_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="./assets/img/favicon.ico">

  </head>

  <body>
    <div class="app-container">
      <?php include_once 'includes/headerlogin.php'; ?>



      <div class="app-content">
        <div class="app-content-header">
            
<p class="app-content-headerText">Användarprofil<br><br>Welcome | <span style="color: red;"><?php echo $row['FirstName']; ?></span></p>

 


          
          <button class="mode-switch" title="Switch Theme">

            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>

          <i id="openmenu" class="fa-solid fa-bars"></i>
          

    
        </div>

        

        <div class="app-content-actions">
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



        <div class="map-content-9 mt-lg-0 mt-4">
 <?php
 $ID = $_SESSION['bpmsuid'];
$ret = mysqli_query($con, "SELECT * FROM tbluser WHERE ID='$ID'");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {
?>
    <form method="post" enctype="multipart/form-data">
       <?php if (isset($er_message)) : ?>
                                <p class="animate__animated animate__fadeInDown" style="background-color: red; color: white; padding: 10px; border-radius: 20px;">
                                    <?php echo $er_message; ?></p>
                            <?php endif; ?>

                            <?php if (isset($su_message)) : ?>
                                <p style="background-color: green; color: black;"><?php echo $su_message; ?></p>
                            <?php endif; ?>

      <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name"    value="<?php echo $row['FirstName']; ?>">
        </div>
         </div>
         <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name"    value="<?php echo $row['LastName']; ?>">
        </div></div>
        <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
            <label for="phone">Phone</label> 
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number"     value="<?php echo $row['MobileNumber']; ?>">
        </div></div>
        <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address"   value="<?php echo $row['Email']; ?>">
        </div></div>
       
<div class="formdiv" style="padding-top: 30px;">
    <div class="form-group">
        <label for="message">Message</label> 
        <textarea class="form-control" name="message" id="message" placeholder="Enter your message" ><?php echo $row['message']; ?></textarea>
    </div>
</div>
        <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
          <label >View File | </label> 
<?php
                                        $filename = $row['filename'];
                                        if (!empty($filename)) {
                                            echo "<td style='display: flex; gap: 16px;'>
          <a class='btn btn-primary' href='./uploads/$filename' target='_blank'>
            <i class='fa fa-eye' aria-hidden='true'></i>
          </a>
          <a class='btn btn-primary' href='./uploads/$filename' download>
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
        </div></div>

        <div class="formdiv" style="padding-top: 30px;">
        <div class="form-group">
             <label for="image">Upload File:</label>
            <input type="file" class="form-control-file" name="image" id="image"  >
        </div></div>
        <button type="submit" class="btn btn-contact" name="submit">skicka</button>
    </form>
<?php
}
?>


                    </div>
      </div>
    </div>
    </div>
    </div>





    </div>
    </div>


    <script>
      document.getElementById("profileitem").classList.toggle("active");
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

  </html>