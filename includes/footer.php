<section class="w3l-footer-29-main" style="  


color           : #1b2f45 !important;

padding: 0 !important;">
    <div class="footer-29 py-5">
        <div class="container py-lg-4">
            <div class="row footer-top-29">
                <div class="col-lg-4 col-md-6 col-sm-8 footer-list-29 footer-1">
                    <h6 class="footer-title-29">Kontakta oss</h6>
                    <ul id="footerUl">
                        <?php
                        $ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {

                        ?>
                            <li>
                                <a href="https://www.google.se/maps/place/Kanslihusv%C3%A4gen+13A,+281+35+H%C3%A4ssleholm,+%D8%A7%D9%84%D8%B3%D9%88%D9%8A%D8%AF%E2%80%AD/data=!4m2!3m1!1s0x4653fd6891a2201b:0x40a43624b24cb61?sa=X&ved=2ahUKEwiP5qTO4pz7AhXDRfEDHURoB_wQ8gF6BAgQEAE" target="_blank">
                                    <!-- <img loading="lazy" src="https://img.icons8.com/ios-filled/24/ffffff/marker.png" /> -->
                                    <span>●<?php echo $row['PageDescription']; ?>.</span>
                                </a>
                            </li>
                            <li>
                                <!-- <img loading="lazy" src="https://img.icons8.com/ios-filled/24/ffffff/phone.png" /> -->
                                </span><a href="tel:+0046-720108004">● +<?php echo $row['MobileNumber']; ?></a>
                            </li>
                            <li>
                                <!-- <img loading="lazy" src="https://img.icons8.com/ios-filled/24/ffffff/new-post.png" /> -->
                                <a href="mailto:saljaf@hotmail.com" class="mail">
                                    ● <?php echo $row['Email']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 footer-list-29 footer-2 ">
                <h6 class="footer-title-29">Användbara länkar</h6>

                    <ul>
                        <li id="hemFotter" ><a href="index.php">Hem</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.php"> Tjänster</a></li>
                        <li><a href="signup.php">Bli Medlem</a></li>
                        <li><a href="admin/">Admin</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4">
                    <?php
                    $ret = mysqli_query($con, "select * from tblpage where PageType='aboutus' ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {

                    ?>
                        <h6 class="footer-title-29">
                            <img id="logo3" src="./assets/images/logo2-removebg-preview.png" alt="logo">
                            <h1 id="About-h1">About Us</h1>
                        </h6>

                        <ul>

                     <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="w3l-footer-29-main w3l-copyright" style="">
    <div class="container">
        <div class="row bottom-copies">
            <p class="col-lg-8 copy-footer-29" id="logowithtext">
                © <?php echo date("Y"); ?> Ema-Ark
            </p>

            <br>
            <p class="" id="madeBy">
                ▶ made by <a href="mailto:alsher.info@gmail.com">Baraa</a>
            </p>


            <!-- <div class="col-lg-4 main-social-footer-29">
                <a target="_blank" href="#facebook" class="facebook"><img src="https://img.icons8.com/ios-filled/24/null/facebook-new.png" /></span></a>
                <a target="_blank" href="mailto:saljaf@hotmail.com" class="gmail"><img src="https://img.icons8.com/ios-filled/24/null/new-post.png" /></span></a>
                <a target="_blank" href="https://wa.me/0046720108004/?text=urlencodedtext"" class=" whatsapp"><img src="https://img.icons8.com/ios-filled/24/null/whatsapp--v1.png" /></span></a>

            </div> -->
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>



<style>
    footter li a {

        color: #1b2f45 !important;


    }

    #madeBy {
        display: flex;
        justify-content: start;
        align-items: start;
        flex-direction: row;
        gap: 10px;
    }

ul{
    margin:  0 !important;
    padding: 0 !important;
}

#logo3{
    height: 200px  !important;
    width: 200px !important;
}

#About-h1{
font-size: 1rem !important;
text-align: center;
width: max-content !important;
}

#sometextabout{
    font-size: 0.8rem !important;
text-align: center;
width: max-content !important;

}

</style>
