<div class="sticky-header header-section ">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="12" x2="20" y2="12"></line>
                <line x1="4" y1="6" x2="20" y2="6"></line>
                <line x1="4" y1="18" x2="20" y2="18"></line>
            </svg></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
            <a href="index.php">
                <h1>Ema-Ark</h1>
                <span>AdminPanel</span>
            </a>
        </div>
        <!--//logo-->


        <div class="clearfix"> </div>
    </div>
    <div class="header-right">
        <div class="profile_details_left">
            <!--notifications of menu start -->
            <ul class="nofitications-dropdown">



                <?php
                $ret1 = mysqli_query($con, "select tbluser.FirstName,tbluser.LastName,tblbook.ID as bid,tblbook.AptNumber from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.Status is null");
                $num = mysqli_num_rows($ret1);

                ?>
                <li class="dropdown head-dpdn">

                    <!-- <a style="text-decoration: none;" onclick="fullscreen()" href="javascript:void(0);">


                        <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 3H5a2 2 0 0 0-2 2v3"></path>
                            <path d="M21 8V5a2 2 0 0 0-2-2h-3"></path>
                            <path d="M3 16v3a2 2 0 0 0 2 2h3"></path>
                            <path d="M16 21h3a2 2 0 0 0 2-2v-3"></path>
                        </svg>

                    </a> -->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>



                        <span class="badge blue"><?php echo $num; ?></span></a>




                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have <?php echo $num; ?> new notification</h3>
                            </div>
                        </li>
                        <li>

                            <div class="notification_desc">
                                <?php if ($num > 0) {
                                    while ($result = mysqli_fetch_array($ret1)) {
                                ?>
                                        <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['bid']; ?>">New appointment
                                            received from <?php echo $result['FirstName']; ?> <?php echo $result['LastName']; ?>
                                            (<?php echo $result['AptNumber']; ?>)</a>
                                        <hr />
                                    <?php }
                                } else { ?>
                                    <a class="dropdown-item" href="all-appointment.php">No New Appointment Received</a>
                                <?php } ?>

                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>


                        <li>
                            <div class="notification_bottom">
                                <a href="new-appointment.php">See all notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">
            <?php
            $adid = $_SESSION['bpmsaid'];
            $ret = mysqli_query($con, "select AdminName from tbladmin where ID='$adid'");
            $row = mysqli_fetch_array($ret);
            $name = $row['AdminName'];

            ?>
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="./images/logo2-removebg-preview.png" alt="" width="50" height="50"> </span>
                            <div class="user-name">
                                <p><?php echo $name; ?></p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu" style="border:1px solid #b1c6cd ;     border-radius: 10px;">
                        <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li>
                        <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li>
                        <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>

<script>
    function fullscreen() {
        var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
            (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
            (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
            (document.msFullscreenElement && document.msFullscreenElement !== null);

        var docElm = document.documentElement;
        if (!isInFullScreen) {
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            } else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            } else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            } else if (docElm.msRequestFullscreen) {
                docElm.msRequestFullscreen();
            }
        } else {
            if (docElm.exitFullscreen) {
                docElm.exitFullscreen();
            } else if (docElm.webkitExitFullscreen) {
                docElm.webkitExitFullscreen();
            } else if (docElm.mozCancelFullScreen) {
                docElm.mozCancelFullScreen();
            } else if (docElm.msExitFullscreen) {
                docElm.msExitFullscreen();
            }
            alert('exit fullscreen, doesnt work');
        }
    }
</script>