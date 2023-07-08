<?php
session_start();

include 'includes/dbconnection.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="./style.css" />
    <title>Ema-Ark redbyrå</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="icon" href="./assets/img/favicon.ico">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Nova - v1.3.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    <?php include_once 'includes/header.php'; ?>








    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h2 style="    font-size: 2rem;" data-aos="fade-up">
                        Redovisningskonsult Hässleholm
                        Välkommen till Ema-ark redbyrå!</h2>

                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p> Vi är en redovisningsbyrå som förenklar ert företagande, oavsett om ni driver ett mindre
                            eller ett större företag i Sverige. Som redovisningskonsult i Hässleholm bistår vi med allt
                            från löpande bokföring till årsavslut, deklaration, årsredovisning och rådgivning.
                            Kontakta oss för hjälp och mer information om våra tjänster! </p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#contact" class="btn-get-started">Kontakta oss</a>
                        <!-- <a href="" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Why Choose Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Why Choose Us</h2>

                </div>

                <div class="row g-0" style="
    background: #eeffff; display: flex;
justify-content: center;
align-items: center;

        
        " data-aos="fade-up" data-aos-delay="200">

                    <div class="col-xl-5 img-bg" style="    background-image: url(assets/img/why-us-bg.png);
    background-size: contain;
    background-repeat: no-repeat;
    object-fit: contain;
          
          "></div>
                    <div class="col-xl-7 slides  position-relative">

                        <div class="slides-1 swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                                        <h4 class="mb-3">Optio reiciendis accusantium iusto architecto at quia minima
                                            maiores quidem, dolorum.</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, ipsam
                                            perferendis asperiores explicabo vel tempore velit totam, natus nesciunt
                                            accusantium dicta quod quibusdam ipsum maiores nobis non, eum. Ullam
                                            reiciendis dignissimos laborum aut, magni voluptatem velit doloribus quas
                                            sapiente optio.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                                        <h4 class="mb-3">Amet cumque nam sed voluptas doloribus iusto. Dolorem eos
                                            aliquam quis.</h4>
                                        <p>Dolorem quia fuga consectetur voluptatem. Earum consequatur nulla maxime
                                            necessitatibus cum accusamus. Voluptatem dolorem ut numquam dolorum delectus
                                            autem veritatis facilis. Et ea ut repellat ea. Facere est dolores fugiat
                                            dolor.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                                        <h4 class="mb-3">Necessitatibus voluptatibus explicabo dolores a vitae
                                            voluptatum.</h4>
                                        <p>Neque voluptates aut. Soluta aut perspiciatis porro deserunt. Voluptate ut
                                            itaque velit. Aut consectetur voluptatem aspernatur sequi sit laborum.
                                            Voluptas enim dolorum fugiat aut.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>


                                        <h4 class="mb-3">Tempora quos est ut quia adipisci ut voluptas. Deleniti laborum
                                            soluta nihil est. Eum similique neque autem ut.</h4>
                                        <p>Ut rerum et autem vel. Et rerum molestiae aut sit vel incidunt sit at
                                            voluptatem. Saepe dolorem et sed voluptate impedit. Ad et qui sint at qui
                                            animi animi rerum.</p>
                                    </div>
                                </div><!-- End slide item -->

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Choose Us Section -->

        <!-- ======= Our Services Section ======= -->
        <section id="services-list" class="services-list">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Våra tjänster</h2>

                </div>

                <div class="row gy-5">

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Årsbokslut och årsredovisning
                                </span></h4>
                            <p class="description">

                                Alla företag ska varje räkenskapsår avsluta den löpande bokföringen med ett bokslut.
                                Bokslutet kan vara antingen i form av en årsredovisning, ett årsbokslut eller ett
                                förenklat årsbokslut. Reglerna skiljer sig åt mellan olika företagsformer, men även
                                storleken på verksamheten har betydelse.




                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist" style="color: #15a04a;"></i>
                        </div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Skattedeklarationer
                                </span></h4>
                            <p class="description">


                                Den månatliga deklarationen för moms- och arbetsgivaravgiften kallas också för
                                skattedeklaration. Skattedeklarationen måste du som är företagare, med eller utan
                                anställda, lämna in till Skatteverket månadsvis och där redovisa företagets skatte-,
                                moms- och arbetsgivaravgifter. Skattedeklarationen ska inte blandas ihop med
                                inkomstdeklarationen, skattedeklaration är endast för den som bedriver
                                näringsverksamhet.



                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon flex-shrink-0"><i class="bi bi-bar-chart" style="color: #d90769;"></i></div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Fakturering
                                </span></h4>
                            <p class="description">

                                Det bästa med företagande är att få betalt, men hur går det till i praktiken?
                                Fakturering är ett måste vid alla affärer mellan företag, men det kan gå till på olika
                                sätt och det finns viktiga lagar och regler att ta hänsyn till. Här reder vi ut
                                begreppen och förklarar allt du behöver veta om fakturor och fakturering.


                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon flex-shrink-0"><i class="bi bi-binoculars" style="color: #15bfbc;"></i></div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Lönehantering</span></h4>
                            <p class="description">


                                Lönehantering kan lätt bli mer komplicerat än man kan tro. Samtidigt har du som
                                arbetsgivare ett ansvar att betala ut löner och annan ersättning på rätt sätt. Genom att
                                anlita oss slipper du begå vanliga misstag. Vi sköter utbetalningen av löner,
                                ersättningar och förmåner och är uppdaterade på lagar, regler och kollektivavtal. Då kan
                                du känna dig trygg och får tid att göra det du gör bäst.


                            </p>
                        </div>
                    </div><!-- End Service Item -->


                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
                        <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week" style="color: #1335f5;"></i>
                        </div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Kvalificerad rådgivning och
                                    redovisning</span></h4>
                            <p class="description">När ni behöver ekonomisk rådgivning är det skönt att ha en
                                redovisningskonsult i Hässleholm att falla tillbaka på. Vi är ett professionellt stöd
                                och samarbetspartner i er företagsverksamhet. Med mångårig erfarenhet och kompetens tar
                                vi som redovisningskonsult i Hässleholm fram en plan som tar ert företag framåt och
                                uppfyller era uppsatta mål.
                            </p>
                        </div>
                    </div><!-- End Service Item -->



                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i>
                        </div>
                        <div>
                            <h4 class="title"><span class="stretched-link">Deklaration </span></h4>
                            <p class="description">
                                Deklaration, även kallad inkomstdeklaration eller självdeklaration, är en årlig handling
                                där inkomsttagare, både fysiska och juridiska personer, redovisar hur mycket som
                                intjänats under föregående år och hur mycket skatt som ska betalas.

                            </p>
                        </div>
                    </div><!-- End Service Item -->



                </div>

            </div>
        </section><!-- End Our Services Section -->


        <!-- ======= Features Section ======= -->


        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">


                <section class="w3l-call-to-action_9" style="    padding: 0 !important;">
                    <div class="call-w3 ">
                        <div class="container">
                            <div class="grids">
                                <div class="main-timeline">
                                    <div class="timeline">
                                        <div class="icon"></div>
                                        <div class="date-content">
                                            <div class="date-outer">
                                                <span class="date" data-aos="zoom-out">
                                                    <span class="month">2 år</span>
                                                    <span class="year">2013</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="timeline-content">
                                            <h5 class="title">Lorem, ipsum.&amp; Lorem, ipsum.</h5>
                                            <p class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur
                                                ex sit amet
                                                massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum
                                                finibus
                                                efficitur. Praesent dapibus dolor felis, eu ultrices elit molestie.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end experience section-->
                                    <!-- start experience section-->
                                    <div class="timeline">
                                        <div class="icon"></div>
                                        <div class="date-content">
                                            <div class="date-outer">
                                                <span class="date" data-aos="zoom-out">
                                                    <span class="month">1 år</span>
                                                    <span class="year">2015</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="timeline-content">
                                            <h5 class="title">Lorem, ipsum.</h5>
                                            <p class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur
                                                ex sit amet
                                                massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum
                                                finibus
                                                efficitur. Praesent dapibus dolor felis, eu ultrices elit molestie.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline">
                                        <div class="icon"></div>
                                        <div class="date-content">
                                            <div class="date-outer">
                                                <span class="date" data-aos="zoom-out">
                                                    <span class="month">2 år</span>
                                                    <span class="year">2016</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="timeline-content">
                                            <h5 class="title">Lorem, ipsum.</h5>
                                            <p class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur
                                                ex sit amet
                                                massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum
                                                finibus
                                                efficitur. Praesent dapibus dolor felis, eu ultrices elit molestie.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline">
                                        <div class="icon"></div>
                                        <div class="date-content">
                                            <div class="date-outer">
                                                <span class="date" data-aos="zoom-out">
                                                    <span class="month">2 år</span>
                                                    <span class="year">2018</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="timeline-content">
                                            <h5 class="title">Lorem, ipsum.</h5>
                                            <p class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur
                                                ex sit amet
                                                massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum
                                                finibus
                                                efficitur. Praesent dapibus dolor felis, eu ultrices elit molestie.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->

    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php include_once 'includes/footer.php'; ?>


    <span id="contact"></span>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="./script.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>




</body>

</html>