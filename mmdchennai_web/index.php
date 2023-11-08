<?php include("include/db_connection.php");
$slider = "select * from mst_slider where status= 'L' order by position_order ";
$resultslider = pg_query($db, $slider);
$slider_count = pg_num_rows($resultslider);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MMD-Chennai</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <?Php include "include/sourcelink_css.php" ?>
</head>

<body>

    <?Php include "include/header.php" ?>
    <?Php


    if ($slider_count != 0) { ?>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-2 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="img/mmdchennai_1.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="Image">
                </button>
            </div> -->
                <div class="carousel-inner">
                    <?php
                    $j = 1;
                    while ($slider_row = pg_fetch_array($resultslider)) {
                        $media_id = $slider_row['media_id'];
                        $get_file = "select me.foldername from mst_media ms 
                inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                where ms.media_id = $media_id
                ";
                          


                        $result_media = pg_query($db, $get_file);
                        $row_media = pg_fetch_array($result_media);
                        $userfile_extn = substr($slider_row['filename'], strrpos($slider_row['filename'], '.') + 1);
                        $smallcase_extn  = strtolower($userfile_extn);

                        if ($j == 1) {

                            $active = 'active';
                        } else {
                            $active = '';
                        }

                    ?>
                        <div class="carousel-item <?Php echo $active ?>">
                            <?Php if ($smallcase_extn == 'jpg' || $smallcase_extn == 'jpeg' || $smallcase_extn == 'png') { ?>
                                <img class="w-100 carousal_img" src="<?Php echo $media . $row_media['foldername'] ?>/<?php echo $slider_row['filename'] ?>" alt="<?php echo $slider_row['short_title'] ?>" />
                            <?Php } else {

                            ?>
                                <video autoplay loop muted poster="<?Php echo $media . $row_media['foldername'] ?>/<?php echo $slider_row['filename'] ?>" class="slideAnimationVideo" preload>
                                    <source src="<?Php echo $media . $row_media['foldername'] ?>/<?php echo $slider_row['filename'] ?>" type="video/mp4" media="all and (min-width: 1024 px)">
                                </video>
                            <?Php } ?>
                            <div class="carousel-caption">
                                <div class="p-1" style="max-width: 900px">
                                    <h4 class="text-white text-uppercase mb-1 animated zoomIn">
                                        <?Php echo  $slider_row['title'] ?>
                                    </h4>
                                    <!-- <h1 class="display-1 text-white mb-0 animated zoomIn">Creative & Innovative Digital
                                        Solution
                                    </h1> -->
                                </div>
                            </div>
                        </div>
                    <?Php
                        ++$j;
                    } ?>
                    <!-- <div class="carousel-item active">
                        <img class="w-100 carousal_img" src="img/mmdchennai_2.jpg" alt="Image" />
                        <div class="carousel-caption">
                            <div class="p-1" style="max-width: 900px">
                                <h4 class="text-white text-uppercase mb-1 animated zoomIn">
                                    We Are Leader In
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 carousal_img" src="img/mmdchennai_3.jpg" alt="Image" />
                        <div class="carousel-caption">
                            <div class="p-1" style="max-width: 900px">
                                <h4 class="text-white text-uppercase mb-1 animated zoomIn">
                                    We Are Leader In
                                </h4>

                            </div>
                        </div>
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    <?Php } ?>

    <!-- About Start -->
    <div class="container-fluid py-2">
        <div class="px-5">
            <div class="about_us">
                <div class="row g-3 service_area">
                    <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/mmdchennai_3.jpg" alt="">
                    </div>
                </div> -->
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <h6 class="section-title bg-white text-start text-primary pe-3">
                                MMD Chennai
                            </h6>
                            <!-- <h1 class="display-6 mb-4">#1 Digital Solution With <span class="text-primary">10
                                Years</span>
                            Of Experience</h1> -->
                            <!-- <div class="row">
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="">
                                        <img class="img-fluid img-thumbnail " src="img/mmdchennai_2.jpg" alt="">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>
                                        The Mercantile Marine Department, Chennai was set up in 1929 to
                                        implement the first SOLAS Convention and Load Line Conventions.
                                        This Department was working directly under the Ministry till the
                                        establishment of the Directorate General of Shipping at Mumbai
                                        in 1949 This department revise powers under section 8 of the
                                        Merchant Shipping Act, 1958.
                                    </p>
                                </div>
                            </div>

                            <!-- <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est
                            diam
                            rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit
                            sanctus
                            dolor eos.</p> -->
                            <!-- <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="img/team-1.jpg" alt=""
                                style="width: 50px; height: 50px;">
                            <div class="ps-4">
                                <h6>Jhon Doe</h6>
                                <small>SEO & Founder</small>
                            </div>
                        </div> -->
                            <div class="article__footer">
                                <a rel="noopener" href="mmd_history.php" class="hover-underline-animation">More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp publication_card" data-wow-delay="0.5s">
                        <div class="single_service">
                            <div class="col-lg-12 text-center">
                                <h3>Whats New</h3>
                            </div>
                            <!-- 
                            <div class="col-lg-12 icon">

                                <i class="fa fa-id-card"></i>&nbsp;
                                <h3>Whats New</h3>
                            </div> -->
                            <div class="page">
                                <div class="container-center">
                                    <div class="box tgg2 tgg1">

                                        <marquee onMouseOver="this.stop()" loop="" scrollamount="3" onMouseOut="this.start()" class="" width="100%" direction="up" height="100%">
                                            <ul class="bulletstyle" onclick="set_session_home_menu('','','announce_details.php')">
                                                <li>
                                                    <a rel="noopener" href="#" target="_blank"> The Mercantile Marine Department, Chennai was set up in 1929 to implement </a>
                                                </li>
                                                <li>
                                                    <a rel="noopener" href="#" target="_blank"> Chennai was set up in 1929 to implement </a>
                                                </li>
                                                <!-- <li>
                                                    <a rel="noopener" href="#" target="_blank"> test </a>
                                                </li>
                                                <li>
                                                    <a rel="noopener" href="#" target="_blank"> test </a>
                                                </li> -->

                                            </ul>
                                        </marquee>
                                    </div>
                                </div>

                            </div>
                            <div class="article__footer">
                                <a rel="noopener" href="#" class="hover-underline-animation " style="color:#fff" onclick="set_session_home_menu('','','pressrelease_details.php')">More <i class="fa fa-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <section class="posts">
                            <div class="row">
                                <div class="col-lg-6 col-sm-">
                                    <article class="post post-2">
                                        <div class="thumbnail">
                                            <img class="img-fluid img-thumbnail" src="img/leaders/leader1.png" />
                                        </div>
                                        <strong class="author">Shri Sarbananda Sonowal</strong>
                                        <small class="time">Honorable Cabinet Minister</small>
                                        <!-- <span class="content">Something something politics</span> -->
                                    </article>
                                </div>
                                <div class="col-lg-6">
                                    <article class="post post-2">
                                        <div class="thumbnail">
                                            <img class="img-fluid img-thumbnail" src="img/leaders/leader2.jpg" />
                                        </div>
                                        <strong class="author">Shri Shripad Naik</strong>
                                        <small class="time">Honorable Minister of State</small>
                                        <!-- <span class="content">Something something family</span> -->
                                    </article>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <article class="post post-2">
                                        <div class="thumbnail">
                                            <img class="img-fluid img-thumbnail" src="img/leaders/leader3.jpg" />
                                        </div>
                                        <strong class="author">Shri Shantanu Thakur</strong>
                                        <small class="time">Honorable Minister of State</small>
                                        <!-- <span class="content">Something something software development</span> -->
                                    </article>
                                </div>
                                <div class="col-lg-6">
                                    <article class="post post-2">
                                        <div class="thumbnail">
                                            <img class="img-fluid img-thumbnail" src="img/leaders/DG.png" />
                                        </div>
                                        <strong class="author">Shri Shyam Jagannathan, IAS</strong>
                                        <small class="time">Director General of Shipping</small>
                                        <!-- <span class="content">Something something politics</span> -->
                                    </article>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
                        <h1 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam
                            amet
                            diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo
                            magna
                            dolore erat amet</p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Digital Marketing</p>
                                        <p class="mb-2">85%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">SEO & Backlinks</p>
                                        <p class="mb-2">90%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Design & Development</p>
                                        <p class="mb-2">95%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/mmdchennai_4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Feature End -->
    <!-- Facts Start -->
    <!-- <div class="row"> -->
    <div class="col-lg-12 services_bg">
        <!-- <div class="row"> -->
        <div class="container-xxl py-3">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                    <h6 class="section-title  text-white text-center text-primary px-3">
                        Services
                    </h6>
                </div>
                <div class="row g-4">
                    <?php $get_services = "SELECT * FROM mst_mmd_menu WHERE submenu_id = 11 AND submenu_status = 'L' order by menu_id ASC";
                        //   var_dump($servicess); die;
                          $res      = pg_query($db,$get_services);
                          $results  = pg_fetch_all($res);
                          $iconMapping = array(
                            0 => 'fa-certificate',
                            1 => 'fa-users-cog',
                            2 => 'fa-users',
                            3 => 'fa-check',
                            4 => 'fa-globe',
                            5 => 'fa-universal-access',
                            // Add more mappings as needed
                        );
                          $i = 0; 
                            foreach ($results as $servicess) {
                    ?>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="<?php echo  $servicess['menu_link']; ?>">
                            <div class="fact-item service-bg rounded text-center h-100 p-6">
                                <i class="fa <?php echo  $iconMapping[$i]; ?> fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3"><?php echo  $servicess['menu_title']; ?></h5>
                            </div>
                        </a>
                    </div>
                    <?php $i++; } ?>
                    <!-- <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="#">
                            <div class="fact-item service-bg rounded text-center h-100 p-5">
                                <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3">Seafares Examination</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="#">
                            <div class="fact-item service-bg rounded text-center h-100 p-5">
                                <i class="fa fa-users fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3">Ship Survery</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a href="#">
                            <div class="fact-item service-bg rounded text-center h-100 p-5">
                                <i class="fa fa-check fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3">Other Services</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a href="#">
                            <div class="fact-item service-bg rounded text-center h-100 p-5">
                                <i class="fa fa-globe fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3">Online Services</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a href="#">
                            <div class="fact-item service-bg rounded text-center h-100 p-5">
                                <i class="fas fa-universal-access fa-4x text-primary mb-4"></i>
                                <h5 class="mb-3">GSO,SWO & SCO Services</h5>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <!-- Facts End -->
    <!-- link Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Public Information
                </h6>
            
            </div>
            <div class="row g-4">
                <div class="traineeship">
                    <div class="process-row">
                        <div class="activity animate-from-bottom__0">
                            <div class="relative-block">
                                <div class="inactive">
                                    <div class="title">EXAM/ONLINE SEAT BOOKING</div>
                                </div>
                                <div class="active">
                                    <div class="title">EXAM/ONLINE SEAT BOOKING</div>
                                    <ul class="sub-title">
                                        <li>
                                            Customer interactions, study and analysis of company
                                            branding through creative briefs. Creation of mock-up
                                            designs by using UI tools that simulate actions and
                                            pre-visualize the reactions.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="activity animate-from-bottom__1">
                            <div class="relative-block">
                                <div class="inactive">
                                    <div class="title">CIRCULARS/ NOTIFICATIONS</div>
                                </div>
                                <div class="active">
                                    <div class="title">CIRCULARS/ NOTIFICATIONS</div>
                                    <ul class="sub-title">
                                        <li>
                                            Customer interactions, study and analysis of company
                                            branding through creative briefs. Creation of mock-up
                                            designs by using UI tools that simulate actions and
                                            pre-visualize the reactions.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="activity animate-from-bottom__2">
                            <div class="relative-block">
                                <div class="inactive">
                                    <div class="title">NEWS & EVENTS</div>
                                </div>
                                <div class="active">
                                    <div class="title">NEWS & EVENTS</div>
                                    <ul class="sub-title">
                                        <li>
                                            Customer interactions, study and analysis of company
                                            branding through creative briefs. Creation of mock-up
                                            designs by using UI tools that simulate actions and
                                            pre-visualize the reactions.
                                        </li>
                                    </ul>
                                    <div class="aligntechright">
                                        <a rel="noopener" href="#"
                                            onclick="set_session_home_menu('','','annualreports_details.php')"
                                            class="inside-page__btn inside-page__btn--ski">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="activity animate-from-bottom__3">
                            <div class="relative-block">
                                <div class="inactive">
                                    <div class="title">ONLINE SERVICES</div>
                                </div>
                                <div class="active">
                                    <div class="title">ONLINE SERVICES</div>
                                    <ul class="sub-title">
                                        <li>
                                            Customer interactions, study and analysis of company
                                            branding through creative briefs. Creation of mock-up
                                            designs by using UI tools that simulate actions and
                                            pre-visualize the reactions.
                                        </li>
                                    </ul>
                                    <div class="aligntechright">
                                        <a rel="noopener" href="#"
                                            onclick="set_session_home_menu('','','annualreports_details.php')"
                                            class="inside-page__btn inside-page__btn--ski">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- link end -->
    <!-- <div class="col-lg-12 ">
        <div class="container">
            <div class="grid-1-of-3">

                <div class="box">
                    <img src="http://www.greggant.com/emerge/codepen/helens.jpg">
                    <div class="overlay">
                        <div class="category">Mt Saint Helens</div>
                        <h4>View from the Summit</h4>
                    </div>
                    <div class="hover">
                        <div class="vert-center-outer">
                            <div class="vert-center-inner">
                                <a class="btn"
                                    href="http://www.oregonhikers.org/field_guide/Mount_Saint_Helens_Hike">More
                                    Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-1-of-3">
                <div class="box">
                    <img src="http://www.greggant.com/emerge/codepen/hood.jpg">
                    <div class="overlay">
                        <div class="category">Mt Hood</div>
                        <h4>View of Summit</h4>
                    </div>
                    <div class="hover">
                        <div class="vert-center-outer">
                            <div class="vert-center-inner">
                                <a class="btn" href="http://www.oregonhikers.org/field_guide/Mount_Hood_Hikes">More
                                    Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-1-of-3">
                <div class="box">
                    <img src="http://www.greggant.com/emerge/codepen/adams.jpg">
                    <div class="overlay">
                        <div class="category">Mt Adams</div>
                        <h4>View of Summit</h4>
                    </div>
                    <div class="hover">
                        <div class="vert-center-outer">
                            <div class="vert-center-inner">
                                <a class="btn" href="http://www.oregonhikers.org/field_guide/Mount_Adams">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-lg-12">
        <div class=" py-5">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Public Information
                </h6>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="news-slider" class="owl-carousel ">
                            <div class="post-slide wow fadeInUp" data-wow-delay="0.1s">
                                <div class="post-img">
                                    <img src="img/slider/slider2.png" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Certificates issued to Ships</a>
                                    </h3>

                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide wow fadeInUp" data-wow-delay="0.1s">
                                <div class="post-img">
                                    <img src="img/slider/slider3.png" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#"> PSC Detention List</a>
                                    </h3>

                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide wow fadeInUp" data-wow-delay="0.1s">
                                <div class="post-img">
                                    <img src="img/slider/slider4.png" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#"> Rights to Information</a>
                                    </h3>

                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide wow fadeInUp" data-wow-delay="0.1s">
                                <div class="post-img">
                                    <img src="img/slider/slider1.png" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">List of Ship Registered</a>
                                    </h3>

                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Start -->
    <div class="col-lg-12  services_bg">
        <div class=" py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                    <h6 class="section-title text-white text-center text-primary px-3">
                        Gallery
                    </h6>
                </div>
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_1.jpg" alt="" />
                        </a>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h4 class="gallery_title">Gallery Group 1</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.3s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_2.jpg" alt="" />
                            <h4 class="mb-0 gallery_title">Gallery Group 2</h4>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.5s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_3.jpg" alt="" />
                            <h4 class="mb-0 gallery_title">Gallery Group 3</h4>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_4.jpg" alt="" />
                            <h4 class="mb-0 gallery_title ">Gallery Group 4</h4>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.3s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_1.jpg" alt="" />
                            <h4 class="mb-0 gallery_title">Gallery Group 5</h4>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3 " data-wow-delay="0.5s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="">
                            <img class="custom-gallery rounded mb-4" src="img/mmdchennai_3.jpg" alt="" />
                            <h4 class="mb-0 gallery_title">Gallery Group 6</h4>
                        </a>
                    </div>
                    <!-- <div class="featuredPropBox"> -->
                    <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="effect effect-four">
                            <img src="https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="img-fluid">
                            <div class="tab-text">
                                <h2>Three column 4</h2>
                                <p>Designed to help you complete your layout designing</p>
                                <div class="icons-block"> <a href="#" class="social-icon-1"><i class="fa fa-facebook-official"></i></a> <a href="#" class="social-icon-2"><i class="fa fa-twitter-square"></i></a> <a href="#" class="social-icon-3"><i class="fa fa-youtube-square"></i></a> </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Service End -->

    <div class="col-lg-12 ">
        <div class=" py-5">
            <div class="text-center mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Links
                </h6>
            </div>
            <div class="col-lg-12">

                <section class="publication_cards">

                    <div class="flipbox wow fadeInUp" data-wow-delay="0.1s">
                        <div class="back">
                            <p>Exam Schedule</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Exam Schedule</h2>
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.2s">
                        <div class="back">
                            <p>FAQ</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>FAQ</h2>
                            <i class="fas fa-question-circle"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.3s">
                        <div class="back">
                            <p>Career</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Career</h2>
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.4s">
                        <div class="back">
                            <p>MMD Holidays</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>MMD Holidays</h2>
                            <i class="fa fa-person-hiking"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.5s">
                        <div class="back">
                            <p>Tender Notice</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Tender Notice</h2>
                            <i class="fa fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.6s">
                        <div class="back">
                            <p>Help Desk</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Help Desk</h2>
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="flipbox wow fadeInUp" data-wow-delay="0.7s">
                        <div class="back">
                            <p>Notice Board</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Notice Board</h2>
                            <i class="fa fa-bullhorn"></i>
                        </div>
                    </div>

                    <div class="flipbox wow fadeInUp" data-wow-delay="0.8s">
                        <div class="back">
                            <p>Citizen Forum</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Citizen Forum</h2>
                            <i class="fa fa-users"></i>
                        </div>
                    </div>

                    <div class="flipbox wow fadeInUp" data-wow-delay="0.9s">
                        <div class="back">
                            <p>Rules & Regulations</p>
                            <a href="" target="_blank">Enter!</a>
                        </div>
                        <div class="front">
                            <h2>Rules & Regulations</h2>
                            <i class="fa fa-scale-balanced"></i>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!--End Row-->

    </div>
    </div>

    <!-- <div class="services">
                <div class="services__box">
                    <figure class="services__icon">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </figure>
                   
                    <a href="">Exam Schedule</a>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#fd6494">
                        <ion-icon name="code-slash-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Desenvolvimento Front-End
                        </h2>
                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#43f390">
                        <ion-icon name="search-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            SEO
                        </h2>

                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#ffb508">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Marketing Digital
                        </h2>

                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#37ba82">
                        <ion-icon name="videocam-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Edição de Vídeos
                        </h2>

                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#cd57ff">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Desenvolvimento de Jogos
                        </h2>

                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#cd57ff">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Desenvolvimento de Jogos
                        </h2>

                    </div>
                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#cd57ff">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Desenvolvimento de Jogos
                        </h2>

                    </div>

                </div>
                <div class="services__box">
                    <figure class="services__icon" style="--i:#cd57ff">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </figure>
                    <div class="services__content">
                        <h2 class="services__title">
                            Desenvolvimento de Jogos
                        </h2>
                    
    </div>

    </div>

    </div> -->
    </div>
    </div>


    <!-- Project Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
                <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-item border rounded h-100 p-4" data-dot="01">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-1.jpg" alt="">
                        <a href="img/project-1.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="02">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-2.jpg" alt="">
                        <a href="img/project-2.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="03">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-3.jpg" alt="">
                        <a href="img/project-2.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="04">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-4.jpg" alt="">
                        <a href="img/project-4.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="05">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-5.jpg" alt="">
                        <a href="img/project-5.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="06">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-6.jpg" alt="">
                        <a href="img/project-6.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="07">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-7.jpg" alt="">
                        <a href="img/project-7.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="08">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-8.jpg" alt="">
                        <a href="img/project-8.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="09">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-9.jpg" alt="">
                        <a href="img/project-9.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="10">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="img/project-10.jpg" alt="">
                        <a href="img/project-10.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Project End -->

    <!-- Team Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>
                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-1.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-2.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-3.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->

    <?Php include "include/footer.php";
    include "include/sourcelink_js.php"
    ?>


    <script>
        $(document).ready(function() {
            $(".customer-logos").slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                fade: false,
                fadeSpeed: 1000,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4,
                        },
                    },
                    {
                        breakpoint: 321,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                    {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                ],
            });
            $("#news-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 3],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoplay: true,
                autoPlaySpeed: 1000,
                autoPlayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        loop: true
                    },
                    480: {
                        items: 2,
                        loop: true
                    },
                    768: {
                        items: 2,
                        loop: true
                    },
                    992: {
                        items: 3,
                        loop: true
                    },
                    1024: {
                        items: 3,
                        loop: true
                    },
                    1440: {
                        items: 4,
                        loop: true
                    }
                },
            });
            $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
            $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
        });
        // search-box open close js code
        let navbar = document.querySelector(".navbar");
        let searchBox = document.querySelector(".search-box .bx-search");
        // let searchBoxCancel = document.querySelector(".search-box .bx-x");

        searchBox.addEventListener("click", () => {
            navbar.classList.toggle("showInput");
            if (navbar.classList.contains("showInput")) {
                searchBox.classList.replace("bx-search", "bx-x");
            } else {
                searchBox.classList.replace("bx-x", "bx-search");
            }
        });

        // sidebar open close js code
        let navLinks = document.querySelector(".nav-links");
        let menuOpenBtn = document.querySelector(".navbar .bx-menu");
        let menuCloseBtn = document.querySelector(".nav-links .bx-x");
        menuOpenBtn.onclick = function() {
            navLinks.style.left = "0";
        };
        menuCloseBtn.onclick = function() {
            navLinks.style.left = "-100%";
        };

        // sidebar submenu open close js code
        let htmlcssArrow = document.querySelector(".htmlcss-arrow");
        htmlcssArrow.onclick = function() {
            navLinks.classList.toggle("show1");
        };
        let moreArrow = document.querySelector(".more-arrow");
        moreArrow.onclick = function() {
            navLinks.classList.toggle("show2");
        };
        let jsArrow = document.querySelector(".js-arrow");
        jsArrow.onclick = function() {
            navLinks.classList.toggle("show3");
        };
    </script>
</body>

</html>