<?php include 'include/db_connection.php'; ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>National Institute of Ocean Technology</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'include/sourcelink-css.php'; ?>
</head>
<style>
    table {
        border-collapse: collapse
    }

    table td,
    table th {
        padding: 1px;
        border: none;
        text-align: none;
        font-size: 13px;
    }
</style>

<body>
    <?php
    include 'include/header.php';

    $get_query = "select * FROM mst_formerdirectors WHERE  status='L' order by start_dt desc";

    $result_directors = pg_query($db, $get_query);

    $directors_count = pg_num_rows($result_directors);
    ?>
    <!-- bradcam_area_start  -->
    <!-- <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3></h3>
                        <h2 class="text-center" style="color:#041E42"><strong>News / Announcements</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="bradcam_area_img breadcam_bg">
        <!-- <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3></h3>
                        <h2 class="text-center" style="color:#041E42"><strong>News / Announcements</strong></h2>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- bradcam_area_end  -->

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3></h3>
                    <p><a rel="noopener" href="index.php"><i class="fa fa-home "> </i> / </a> Niot search</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center contenttitle"><strong>Niot search</strong></h3>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10" style="border:1px solid #041e42;border-radius:15px;">
                    <script async src="https://cse.google.com/cse.js?cx=d2f5731a4fb96456a">
                    </script>
                    <div class="gcse-search"></div>
                    <!-- <div class="gcse-searchresults-only"></div> -->

                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>


    </div>

    <?php include 'include/bottomfooter.php'; ?>

    <?php include 'include/sourcelink-js.php'; ?>
</body>

</html>
<script>
    $(document).ready(function() {

        // $("table").attr("border", "0");
        // $("table").removeAttr("border");
    });
</script>