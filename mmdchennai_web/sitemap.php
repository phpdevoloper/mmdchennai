<?php include("include/db_connection.php"); ?>
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
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">SITE MAP</a></li>
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
                <h1 class="justify-content-left">SITE MAP</h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-4">
        <div class="py-3 px-5">
            <div class="site-map">
            <?Php 
                $menu_query = "select * FROM mst_mmd_menu WHERE mainmenu_status='L'  and submenu_id=0 order by mainmenu_order asc";
                $menuresult = pg_query($db, $menu_query);
                while ($menuRow = pg_fetch_row($menuresult)) {

                    $get_menu_length = "select * from mst_mmd_menu  where submenu_id =$menuRow[0] and submenu_status='L'  ";
                    $result_length = pg_query($db, $get_menu_length);
                    $total_length = pg_num_rows($result_length);
                    
                ?>
                    <?Php if ($total_length == 0) {  ?>
                        <li class="">
                            <a href="<?Php echo $menuRow[2] ?>"><?Php echo $menuRow[1];  ?> <?Php if ($total_length != 0) { ?> <i class="ti-angle-down"></i> <?php } ?></a>
                        </li>
                    <?Php } else { ?>
                        <li>
                            <a href="<?Php echo $menuRow[2] ?>"><?Php echo $menuRow[1];  ?> </a>
                            <?Php
                            $sub = "select * FROM mst_mmd_menu WHERE mainmenu_status='L' and  submenu_status = 'L' and submenu_id=$menuRow[0] order by submenu_order asc";
                            $subResult = pg_query($db, $sub);
                            $sub_result_count = pg_num_rows($subResult);
                            if ($sub_result_count != 0) { ?>

                                <ul>
                                    <?Php
                                    while ($subRow = pg_fetch_row($subResult)) { ?>
                                        <li><a href="<?Php echo $subRow[2]; ?>"><?Php echo $subRow[1]; ?></a></li>
                                    <?Php } ?>
                                </ul>
                            <?Php } ?>
                        </li>
                <?Php }
                } ?>
            </div>
        </div>
    </div>
    <!-- About End -->



    <?Php include "include/bottom_footer.php";
    include "include/sourcelink_js.php"
    ?>
</body>

</html>