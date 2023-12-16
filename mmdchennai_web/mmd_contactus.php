<?Php
include("include/db_connection.php");

$get_value = "select * from mst_contactus where status ='L' order by position_order asc";
$result_value = pg_query($db, $get_value);
$get_Count = pg_num_rows($result_value);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | Contact Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?Php include "include/sourcelink_css.php" ?>
</head>

<body>
    <?Php include "include/header.php" ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-1 wow fadeIn" data-wow-delay="0.1s">

    </div>
    <!-- Page Header End -->
    <div class="container-fluid breadcrum_bg">
        <div class=" py-1 px-5">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb breadcrumb_font justify-content-right mb-0">
                    <li class="breadcrumb-item "><a class="" href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">Contact Us</a></li>
                </ol>
            </nav>
        </div>
        <!-- <div class="py-1 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Contact Us </h1>
            </div>
        </div> -->
    </div>
    <div class="container-fluid main_title">
        <div class=" py-3 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Contact Us </h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-4">
        <div class="py-3">
            <div class="row g-5">
                <div class="aboutus-section">
                    <div class="">
                        <div class="row">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="aboutus">
                                    <h2 class="aboutus-title">About Us</h2>
                                    <p class="aboutus-text">The Mercantile Marine Department, Chennai was set up in 1929 to implement the first SOLAS Convention and Load Line Conventions. This Department was working directly under the Ministry till the establishment of the Directorate General of Shipping at Mumbai in 1949 This department revise powers under section 8 of the Merchant Shipping Act, 1958.</p>
                                    
                                </div>
                            </div> -->

                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <!-- <h2 class="aboutus-title">Contact Us</h2> -->
                                <div class="feature">
                                    <?Php if ($get_Count != 0) {
                                        while ($row = pg_fetch_array($result_value)) {
                                    ?>
                                            <div class="feature-box wow fadeInUp" data-wow-delay="0.1s">
                                                <div class="clearfix">
                                                    <div class="iconset">
                                                        <i class="fa fa-cog icon"></i>
                                                    </div>
                                                    <div class="feature-content">
                                                        <h4><?Php echo $row['title'] ?></h4>
                                                        <span><?Php echo $row['name'] ?></span>
                                                        <br>
                                                        <?Php
                                                        $designation = $row['designation'];
                                                        if ($designation) { ?>
                                                            <span><?Php echo $designation ?></span><br>
                                                        <?Php } ?>
                                                        <i class="fa fa-map-marker"></i> <span><?Php echo $row['address'] ?></span><br>
                                                        <i class="fa fa-phone"></i> <span><?Php echo $row['phone'] ?></span><br>
                                                        <?Php
                                                        $fax = $row['fax'];
                                                        if ($fax) { ?>
                                                           <i class="fa fa-fax"></i> <span> <span><?Php echo $fax ?></span><br>
                                                        <?Php } ?>
                                                        <i class="fa fa-envelope"></i> <span><?Php echo $row['email'] ?></span><br>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                    <?Php }
                                    } ?>
                                
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="img-border">
                                    <img class="img-fluid" src="img/mmdchennai_1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <?Php include "include/bottom_footer.php";
    include "include/sourcelink_js.php"
    ?>
</body>

</html>