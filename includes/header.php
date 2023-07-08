<?php
include "dbconnection.php"; // include the file that connects to the database

// set session duration to 1 hour
$session_duration = 3600;

// start session


// check if session exists and has not expired
if (isset($_SESSION['bpmsuid']) && time() - $_SESSION['last_activity'] < $session_duration) {
    // update last activity time
    $_SESSION['last_activity'] = time();

    $userId = $_SESSION['bpmsuid'];
    $query = "SELECT FirstName FROM tbluser WHERE ID = '$userId'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['FirstName'];
        $welcomeMessage = "<span>$firstName</span> ";
    }

    // Redirect logged-in users to their profile page if they try to access a page other than index.php or about.php
    $allowedPages = array("index.php", "about.php");
    if (in_array(basename($_SERVER['PHP_SELF']), $allowedPages)) {
        header("Location: profile.php");
        exit();
    }
} else {
    // destroy session
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['last_activity'] = time();

    $welcomeMessage = "";

    // Redirect non-logged-in users to the home page if they try to access a page other than index.php, about.php, signup.php, or login.php
    $allowedPages = array("index.php", "about.php", "signup.php", "login.php");
    if (!in_array(basename($_SERVER['PHP_SELF']), $allowedPages)) {
        header("Location: index.php");
        exit();
    }
}
?>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <span href="#" class="logo d-flex align-items-center">
            <h1 id="Ema-Ark-Logo" class="d-flex align-items-center">Ema-Ark Redbyrå</h1>
        </span>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <?php if (!isset($_SESSION['bpmsuid']) || strlen($_SESSION['bpmsuid']) == 0) { ?>
                    <li><a href="index.php">Hem</a></li>
                    <li><a href="about.php">Page</a></li>
                    <li><a href="signup.php">Bli Medlem</a></li>
                    <li><a href="login.php">Logga in</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
<?php if (isset($_SESSION['bpmsuid']) && strlen($_SESSION['bpmsuid']) > 0) { ?>
    <p><?php echo $welcomeMessage; ?></p>
<?php } ?>