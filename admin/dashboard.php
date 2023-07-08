<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Dashboard</title>
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
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->

    <!--Calender-->
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!--End Calender-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push" id="body-dash">

    <style>
        #preloader {
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: #e3f4fd url(../assets/images/load.gif) no-repeat center;
            background-size: 30%;
        }
    </style>

    <script>
        var loader = document.getElementById('preloader');

        window.addEventListener('load', function() {

            loader.style.display = "none";


        });
    </script>
    <div class="main-content">

        <?php include_once 'includes/sidebar.php'; ?>

        <?php include_once 'includes/header.php'; ?>
        <!-- main content start-->
        <div id="page-wrapper" class="row calender ">
            <div class="main-page">


                <div class="row calender ">
                    <div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1 = mysqli_query($con, "Select * from tbluser");
                            $totalcust = mysqli_num_rows($query1);
                            ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Customer</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalcust; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query2 = mysqli_query($con, "Select * from tblbook");
                            $totalappointment = mysqli_num_rows($query2);
                            ?>
                            <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Appointment</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalappointment; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>





                        <div class="col-md-4 widget states-last">
                            <?php $query3 = mysqli_query($con, "Select * from tblbook where Status='Selected'");
                            $totalaccapt = mysqli_num_rows($query3);
                            ?>
                            <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Accepted</h4>
                            </div>
                            <div class="stats-right">
                                <label><?php echo $totalaccapt; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>

                <div class="row calender ">
                    <div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query4 = mysqli_query($con, "Select * from tblbook where Status='Rejected'");
                            $totalrejapt = mysqli_num_rows($query4);
                            ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Declined</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalrejapt; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query5 = mysqli_query($con, "Select * from  tblservices");
                            $totalser = mysqli_num_rows($query5);
                            ?>
                            <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Services</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalser; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-last">
                            <?php
                            //todays sale
                            $query6 = mysqli_query($con, "select tblinvoice.ServiceId as ServiceId, tblservices.Cost
 from tblinvoice
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
                            while ($row = mysqli_fetch_array($query6)) {
                                $todays_sale = $row['Cost'];
                                $todysale += $todays_sale;
                            }
                            ?>
                            <div class="stats-left">
                                <h5>Today</h5>
                                <h4>Sales</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php
                                        if ($todysale == "") :
                                            echo "0";
                                        else :
                                            echo $todysale;
                                        endif;
                                        ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>


                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4  states-mdl">
                <?php
                //Last Sevendays Sale
                $query8 = mysqli_query($con, "select tblinvoice.ServiceId as ServiceId, tblservices.Cost
 from tblinvoice
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                while ($row8 = mysqli_fetch_array($query8)) {
                    $sevendays_sale = $row8['Cost'];
                    $tseven += $sevendays_sale;
                }
                ?>
                <!-- <div class="stats-left">
                                <h5>Last Sevendays</h5>
                                <h4>Sale</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php

                                        if ($tseven == "") :
                                            echo "0";
                                        else :
                                            echo $tseven;
                                        endif; ?></label> -->
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-4  states-last">
            <?php
            //Total Sale
            $query9 = mysqli_query($con, "select tblinvoice.ServiceId as ServiceId, tblservices.Cost
 from tblinvoice
  join tblservices  on tblservices.ID=tblinvoice.ServiceId");
            while ($row9 = mysqli_fetch_array($query9)) {
                $total_sale = $row9['Cost'];
                $totalsale += $total_sale;
            }
            ?>
            <!-- <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Sales</h4>
                            </div>
                            <div class="stats-right">
                                <label><?php

                                        if ($totalsale == "") :
                                            echo "0";
                                        else :
                                            echo $totalsale;
                                        endif;
                                        ?></label>
                            </div> -->
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    </div>
    </div>
    <div class="clearfix"> </div>
    </div>
    </div>
    <!-- Styles -->
    <!-- <style>
    #chartdiv {
        width: 68vw;
        height: 500px;
        /* padding: 0 5vh 0 5vh; */
        right: 120px;
        position: absolute;
    }
    </style> -->

    <!-- Resources -->
    <!-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> -->

    <!-- Chart code -->
    <script>
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "country",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5
            });
            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


            // Set data
            var data = [{
                country: "USA",
                value: 2025
            }, {
                country: "China",
                value: 1882
            }, {
                country: "Japan",
                value: 1809
            }, {
                country: "Germany",
                value: 1322
            }, {
                country: "UK",
                value: 1122
            }, {
                country: "France",
                value: 1114
            }, {
                country: "India",
                value: 984
            }, {
                country: "Spain",
                value: 711
            }, {
                country: "Netherlands",
                value: 665
            }, {
                country: "South Korea",
                value: 443
            }, {
                country: "Canada",
                value: 441
            }];

            xAxis.data.setAll(data);
            series.data.setAll(data);


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>

    <!-- HTML -->
    <div id="chartdiv"></div>

    <style>
        #body-dash {
            height: 100vh;

        }
    </style>
    <!--footer-->
    <?php include_once 'includes/footer.php'; ?>
    <!--//footer-->
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
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>