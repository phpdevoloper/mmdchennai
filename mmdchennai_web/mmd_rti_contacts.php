<?Php
include 'include/db_connection.php';
$get_services = "select * from mmd_rti where status='L' limit 1";
$result_services = pg_query($db, $get_services);
$row_services = pg_fetch_array($result_services);
$row_sevices_count = pg_num_rows($result_services); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | RTI Contacts</title>
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
                    <li class="breadcrumb-item"><a class="" href="#">RTI</a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">RTI Contacts</a></li>
                </ol>
            </nav>
        </div>
        <!-- <div class="py-1 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Subordinate Offices </h1>
            </div>
        </div> -->
    </div>
    <div class="container-fluid main_title">
        <div class="py-3 px-5">
            <div class="one">
                <h1 class="justify-content-left">RTI Contacts </h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg ">
        <div class="py-3 px-5">
            <?Php echo html_entity_decode(
                $row_services['contents']
            ); ?>
        </div>
    </div>
    <!-- About End -->



    <?Php include "include/bottom_footer.php";
    include "include/sourcelink_js.php"
    ?>
    <script>
        $(document).ready(function() {
            get_records();

        });
    </script>
</body>

</html>