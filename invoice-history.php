



<?php
session_start();

include "includes/dbconnection.php";
if (strlen($_SESSION["bpmsuid"] == 0)) {
    header("location:logout.php");
} else {
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
    <style type="text/css">
.container {
  width: 100%;
  padding: 10px;
}

.products-table {
  width: 100%;
  border-collapse: collapse;
  display: table;
}

.products-table thead {
  display: table-header-group;
}

.products-table tbody {
  display: table-row-group;
}

.products-table th,
.products-table td {
  padding: 10px;
  text-align: center;
  border: solid 1px ;
}

.products-table th {
  font-weight: bold;
}
#total-cost {
    text-align: center;
    font-size: 25px;
     
     z-index:0.9;
 }
        
#total-cost strong {
    font-weight: bold;
    font-size: 25px;
        }
@media all and (max-width: 767px) {
  .products-table th,
  .products-table td {
    font-size: 12px;
    padding: 5px;
  }
}


    </style>

</head>
<body>
    <div class="app-container">
    <?php include_once "includes/headerlogin.php"; ?>
  
        <div class="app-content">
          <div class="app-content-header">
            <p class="app-content-headerText">Book History<br><br>Welcome | <span style="color: red;"><?php echo $row['FirstName']; ?></span></p>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
              </button>
              <button style="visibility: hidden;" class="action-button grid" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              </button>
            </div>
          </div>
          <div class="products-area-wrapper tableView">
            <?php
            $userid = $_SESSION["bpmsuid"];
$sqll = "SELECT SUM(tblservices.Cost) AS total_cost 
        FROM tblinvoice 
        INNER JOIN tblservices ON tblinvoice.ServiceId = tblservices.ID 
        WHERE tblinvoice.Userid = '$userid'";
$resultt = mysqli_query($con, $sqll);
if (!$result || mysqli_num_rows($resultt) == 0) {
    echo "No results found.";
    exit();
}
$row = mysqli_fetch_assoc($resultt);
    $total_cost = $row['total_cost'];
    echo "<div id='total-cost'><strong>Total cost:</strong> $ $total_cost </div>";
mysqli_free_result($resultt);
?>



<div class="container">
  <table class="products-table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Message</th>
        <th>Reg Date</th>
        <th>Service Name</th>
        <th>Service Description</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $userid = $_SESSION["bpmsuid"];
       $query = mysqli_query($con, "SELECT tblinvoice.BillingId, tblinvoice.PostingDate, tblservices.ServiceName, tblservices.ServiceDescription, tblservices.Cost 
        FROM tblinvoice 
        INNER JOIN tblservices ON tblinvoice.ServiceId = tblservices.ID 
        WHERE tblinvoice.Userid = '$userid' ORDER BY tblinvoice.PostingDate DESC");
    if (!$query) {
    die('Query failed: ' . mysqli_error($con));
      }else{

        $cnt = 0;
        while ($row = mysqli_fetch_array($query)) {
          $cnt = $cnt + 1;
          ?>
          <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row["BillingId"]; ?></td>
            <td><?php echo $row["PostingDate"]; ?></td>
            <td><?php echo $row['ServiceName']; ?></td>
            <td><?php echo $row['ServiceDescription']; ?></td>
            <td><?php echo $row['Cost']; ?></td>
          </tr>
        <?php
        }}
      ?>
    </tbody>
  </table>
</div>
</div>
 </div>
</div>
</div>
</div>} 
</div>


      <script>

document.getElementById("invoice-history").classList.toggle("active");



</script>
        <!-- move top -->

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