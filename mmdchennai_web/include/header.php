<?Php
include("db_connection.php");

$menu_query = "select * FROM mst_mmd_menu WHERE mainmenu_status='L'  and submenu_id=0 order by mainmenu_order asc";
$menuresult = pg_query($db, $menu_query);
?>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem" role="status">
    </div>
    <i class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid  toolbar_bg px-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-lg-flex">
        <div class="col-lg-6 px-5 text-start toottop_title">
            Mercantile Marine Department,Chennai
            <!-- <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>
                </ol> -->
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="short_contact_list toolbar-dropdown">
                <!-- <small>Follow us:</small>
               <div class="h-100 d-inline-flex align-items-center">
                   <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
                   <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
                   <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a>
                   <a class="btn-square text-primary pe-0" href=""><i class="fab fa-instagram"></i></a>
               </div> -->
                <ul>
                    <li><a rel="noopener" href="#mainsection" title="Skip to main content"> <i class="fa fa-share-square"></i></a></li>
                    <li><span class="toolbarline"></span></li>
                    <li><a href="#" class="searchBox">
                            <input class="searchInput" type="text" name="" placeholder="Search" id="txt_search" required>
                            <button class="searchButton" onclick="google_search();" href="#">
                                <i class="fa fa-search"></i>
                            </button>
                        </a>
                    </li>
                    <li><span class="toolbarline"></span></li>
                    <li><a rel="noopener" href="sitemap.php"><i class="fa fa-sitemap"></i></a></li>
                    <li><span class="toolbarline"></span></li>
                    <li class="dropdown-submenu">
                        <a href="#" class="subhover" tabindex="-1"> <i class=" fa fa-wheelchair"></i></a>
                        <ul class="tooldropdown-menu">
                            <li><a rel="noopener" href="#" id="btn-decrease" onclick="set_font_size('decrease');">A-</a></li>
                            <li><a rel="noopener" href="#" id="btn-orig" onclick="set_font_size('');">A</a></li>
                            <li><a rel="noopener" href="#" id="btn-increase" onclick="set_font_size('increase');"></i>A+</a></li>
                            <li><a rel="noopener" href="javascript:void(0);" style="color:#fff;background-color:#111;display: block; padding-left: 3px;
                                 border-radius: 4px;" class="dark" onclick="myFunction('dark');">A<sup>&nbsp;</sup></a></li>
                            <li> <a rel="noopener" href="javascript:void(0);" class="light" style="color:#000;background-color:#fff;display: block; padding-left: 3px;
                                 border-radius: 4px;" onclick="myFunction('light');">A<sup>&nbsp;</sup></a></li>
                        </ul>
                    </li>
                    <li><span class="toolbarline"></span></li>
                    <li><a rel="noopener" href="screenreader.php" title="Screen Reader Access"> <i class="fa fa-volume-up"></i></a></li>
                    <li><span class="toolbarline"></span></li>
                    <!-- <li>
                       <form id='form_lang'>
                           <select class=" langselect" id="slt_langsession" onchange="changeLang();" style="width: 100%">

                               <option value='en' <?php if (
                                                        isset($_SESSION['lang']) &&
                                                        $_SESSION['lang'] == 'en'
                                                    ) {
                                                        echo 'selected';
                                                    } ?>>English</option>
                               <option value='hi' <?php if (
                                                        isset($_SESSION['lang']) &&
                                                        $_SESSION['lang'] == 'hi'
                                                    ) {
                                                        echo 'selected';
                                                    } ?>>Hindi</option>
                               <option value='ta' <?php if (
                                                        isset($_SESSION['lang']) &&
                                                        $_SESSION['lang'] == 'ta'
                                                    ) {
                                                        echo 'selected';
                                                    } ?>>தமிழ்</option>
                           </select>
                       </form>
                   </li> -->
                    <li><span class="toolbarline"></span></li>
                    <li class="dropdown-submenu">
                        <a href="#" class="subhover" tabindex="-1"> <i class="fa fa-globe"></i></a>
                        <ul class="tooldropdown-menu">
                            <li><a rel="noopener" href="https://www.facebook.com/MoESNIOT" target="blank" class="external_link " title="Facebook"> <i class="fa fa-facebook social-icons"></i></a></li>
                            <li><a rel="noopener" href="https://www.twitter.com/MoESNIOT" title="Twitter" target="blank" class="external_link"><i class="fa fa-twitter social-icons"></i></a></li>
                            <li><a rel="noopener" href="https://in.linkedin.com/MoESNIOT" target="blank" class="external_link" title="linkedIn"><i class="fa fa-linkedin social-icons"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Brand & Contact Start -->
<div class="container-fluid  wow fadeIn header_bg" data-wow-delay="0.1s">
    <div class="px-4 m-1">
        <div class="row align-items-center top-bar">
            <div class="col-lg-1 col-md-12 text-center text-lg-end logo">
                <!-- <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="fw-bold text-primary m-0"><i class="fa fa-laptop-code me-3"></i>DGcom</h1>
                </a> -->
                <a href="index.php" class="navbar-brand m-0 p-0">
                    <img src="img/logo.gif" alt="" />
                </a>
            </div>
            <div class="col-lg-6 col-md-12 text-center text-lg-start transport d-none d-lg-block">
                <div class="head1">Mercantile Marine Department,Chennai</div>
                <div class="h-2">Directorate General of Shipping</div>
                <div class="head2">
                    <p>
                        Ministry of Ports, Shipping & Waterways <br />
                        Government of India
                    </p>
                </div>
            </div>

            <div class="col-lg-5 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-2">
                        <!-- <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-clock text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Opening Hour</p>
                                <h6 class="mb-0">Mon - Fri, 8:00 - 9:00</h6>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-2">
                        <!-- <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Call Us</p>
                                <h6 class="mb-0">+012 345 6789</h6>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-8" style="
                display: flex;
                align-items: baseline;
                justify-content: flex-end;
              ">
                        <?Php $get_logos = "select * from mst_logo where status ='L' order by position_order limit 3";
                        $result_logs = pg_query($db, $get_logos);
                        while ($row_logo = pg_fetch_array($result_logs)) {
                            $logo_media_id = $row_logo['media_id'];
                            $get_logo_file = "select me.foldername,ms.alt_filename from mst_media ms 
                        inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                        where ms.media_id = $logo_media_id
                        ";

                            $result_logo_media = pg_query($db, $get_logo_file);
                            $row_logo_media = pg_fetch_array($result_logo_media);
                            $title = $row_logo['en_title'];
                        ?>
                            <div class="d-flex align-items-center justify-content-end add-logo">
                                <a rel="noopener" href="<?Php echo $row_logo['ad_link'] ?>" target="blank" class="external_link">
                                    <img src="<?Php echo $media . $row_logo_media['foldername'] ?>/<?php echo $row_logo_media['alt_filename'] ?>" alt="<?Php echo $row_logo['short_title']; ?>" />
                                </a>
                            </div>
                        <?Php } ?>
                        <!-- <div class="d-flex align-items-center justify-content-end add-logo">
                            <img src="img/g2o.png" alt="g2o" />
                        </div>
                        <div class="d-flex align-items-center justify-content-end add-logo">
                            <img src="img/azadika.jpg" alt="azadika" />
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand & Contact End -->

<!-- Navbar Start -->
<div id="menu_area" class="menu-area menu_flex">
    <div class="px-6">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <?Php while ($menuRow = pg_fetch_row($menuresult)) {

                            $get_menu_length = "select * from mst_mmd_menu  where submenu_id =$menuRow[0] and submenu_status='L'  ";
                            $result_length = pg_query($db, $get_menu_length);
                            $total_length = pg_num_rows($result_length);

                        ?>
                            <?Php if ($total_length == 0) {  ?>
                                <li class="">
                                    <a href="<?Php echo $menuRow[2] ?>"><?Php echo $menuRow[1];  ?> <?Php if ($total_length != 0) { ?> <i class="ti-angle-down"></i> <?php } ?></a>
                                </li>
                            <?Php } else { ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" ria-haspopup="true" aria-expanded="false" href="<?Php echo $menuRow[2] ?>"><?Php echo $menuRow[1];  ?> </a>
                                    <?Php
                                    $sub = "select * FROM mst_mmd_menu WHERE mainmenu_status='L' and  submenu_status = 'L' and submenu_id=$menuRow[0] order by submenu_order asc";
                                    $subResult = pg_query($db, $sub);
                                    $sub_result_count = pg_num_rows($subResult);
                                    if ($sub_result_count != 0) { ?>

                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?Php
                                            while ($subRow = pg_fetch_row($subResult)) { ?>
                                                <li><a href="<?Php echo $subRow[2]; ?>"><?Php echo $subRow[1]; ?></a></li>
                                            <?Php } ?>
                                        </ul>
                                    <?Php } ?>
                                </li>
                        <?Php }
                        } ?>
                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="mmd_history.php">History</a></li>
                                <li><a href="mmd_overview_activities.php">Overview of Activities</a></li>
                                <li><a href="mmd_vision_mission.php">Vision Mission & Policy</a></li>
                                <li><a href="mmd_organisation_structure.php">Organization Structure</a></li>
                                <li><a href="whoswhobk.php">Who's Who</a></li>
                                <li><a href="mmd_subordianate_offices.php">Subordinate Offices</a></li>
                                <li><a href="mmd_customers.php">Our Customers</a></li>
                         
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICES</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="mmd_shipregistration.php">Ship Registration & Certification</a></li>
                                <li><a href="mmd_ship_survey.php">Ship Survey & Inspection</a></li>
                                <li><a href="mmd_seafarers.php">Seafarers Examination & Certification</a></li>
                                <li><a href="#">Other Services</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTS/RULES</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="mmd_acts_rules.php">ACTS/RULES</a></li>
                                <li><a href="mmd_circulars.php">Circulars</a></li>
                            </ul>
                        </li> -->
                        <!-- <li><a href="#">ACTS/RULES</a></li> -->
                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DOWNLOADS</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="mmd_forms.php">Forms</a></li>
                                <li><a href="mmd_checklists.php">CheckLists</a></li>
                            </ul>
                        </li>
                        <li><a href="#">CONTACT US</a></li> -->
                </div>
                <!-- <li class="hamburger">
                    <a><i class="fa fa-bars "></i></a>
                </li> -->
                </ul>
                <!-- <form class="navbar-form navbar-right navbar-form-search" role="search">
                           <div class="search-form-container hdn" id="search-input-container">
                               <div class="search-input-group">
                                   <button type="button" class="btn btn-default" id="hide-search-input-container"><span class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                   <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Search for...">
                                   </div>
                               </div>

                           </div>

                           <button type="submit" class="btn btn-default" id="search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                       </form> -->
        </div>
        </nav>
    </div>
</div>
</div>
<!-- <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: salmon;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Coding Yaar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item dropend">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li class="nav-item dropend">
                                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <p class="mt-5 text-center">Get a step-by-step written explanation here: <a
            href="https://codingyaar.com/bootstrap-dropdown-submenu-on-hover" target="_blank">Bootstrap 5 Dropdown
            Submenu</a> </p>

    <p class="mt-5 text-center">Get a step-by-step video explanation here: <a href="https://youtu.be/sqwk7xXBhFk"
            target="_blank">Bootstrap 5 Dropdown Submenu</a> </p> -->
<!-- <nav class="navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn">
        <div class="navbar">
            <i class='fa fa-bars'></i>
            <div class="logo"><a href="#">Logo</a></div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo-name">Logo</span>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="#">HOME</a></li>
                    <li>
                        <a href="#">HTML & CSS</a>
                        <i class='fa fa-chevron-down htmlcss-arrow arrow  '></i>
                        <ul class="htmlCss-sub-menu sub-menu">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Login Forms</a></li>
                            <li><a href="#">Card Design</a></li>
                            <li class="more">
                                <span><a href="#">More</a>
                                    <i class='fa fa-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="#">Neumorphism</a></li>
                                    <li><a href="#">Pre-loader</a></li>
                                    <li><a href="#">Glassmorphism</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">JAVASCRIPT</a>
                        <i class='fa fa-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li><a href="#">Dynamic Clock</a></li>
                            <li><a href="#">Form Validation</a></li>
                            <li><a href="#">Card Slider</a></li>
                            <li><a href="#">Complete Website</a></li>
                        </ul>
                    </li>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
                </ul>
            </div>
            <div class="search-box">
                <i class='fa fa-search'></i>
                <div class="input-box">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
        </div>
    </nav> -->
<!-- <nav class="navmenu navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn">
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="#">HTML <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li>
                        <a href="#">Introduction to HTML <i class="fa fa-caret-right"></i></a>
                        <ul>
                            <li><a href="#">Metadata</a></li>
                            <li><a href="#">Text Fundamentals</a></li>
                            <li><a href="#">Hyperlinks</a></li>
                            <li>
                                <a href="#">more <i class="fa fa-caret-right"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">and more <i class="fa fa-caret-right"></i></a>
                                        <ul>
                                            <li><a href="#">and even more</a></li>
                                            <li><a href="#">and even more</a></li>
                                            <li><a href="#">and even more</a></li>
                                            <li><a href="#">and even more</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">and more</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Multimedia and Embedding</a></li>
                    <li><a href="#">HTML Tables</a></li>
                </ul>
            </li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a>
                <ul>
                    <li><a href="#">JavaScript Objects</a></li>
                    <li><a href="#">Asynchronous JavaScript</a></li>
                    <li><a href="#">Client-side web APIs</a></li>

                </ul>
            </li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav> -->
<!-- <nav class="navmenu navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li class="has-children"><a href="#">Gallery <i class="fa fa-caret-down"></i></a>

                <ul class="sub-menu">
                    <li id="I"><a href="#">Gallery: carousel</a></li>
                    <li id="image-has-children"><a href="#">Gallery: images <i class="fa fa-caret-right"></i></a>
                        <ul class="dx-menu">
                            <li><a href="#">nature</a></li>
                            <li><a href="#">animals</a></li>
                            <li><a href="#">urban</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gallery: animations</a></li>
                    <li><a href="#">Gallery: videos</a></li>
            </li>
        </ul>

        <li><a href="#">services</a></li>
        <li><a href="#">contacts</a></li>
        </ul>

    </nav> -->
<!-- <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About Us</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="project.html" class="nav-item nav-link">Projects</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-caret-right"></i></a>
                        
                        <a href="404.html" class="dropdown-item">404 Page <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
            <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Get Started</a>
        </div>
    </nav> -->
<!-- <nav class="navmenu navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li class="has-children"><a href="#">Gallery <i class="fa fa-caret-down"></i></a>

                <ul class="sub-menu">
                    <li id="I"><a href="#">Gallery: carousel</a></li>
                    <li id="image-has-children"><a href="#">Gallery: images <i class="fa fa-caret-right"></i></a>
                        <ul class="dx-menu">
                            <li><a href="#">nature</a></li>
                            <li><a href="#">animals</a></li>
                            <li><a href="#">urban</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gallery: animations</a></li>
                    <li><a href="#">Gallery: videos</a></li>
            </li>
        </ul>

        <li><a href="#">services</a></li>
        <li><a href="#">contacts</a></li>
        </ul>

    </nav> -->
<!-- Navbar End -->