<?Php
include("include/db_connection.php");

$get_value = "select * from mmd_rti_faq where status ='L' order by position_order asc";
$result_value = pg_query($db, $get_value);
$get_Count = pg_num_rows($result_value);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | RTI FAQ</title>
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
                    <li class="breadcrumb-item "><a class="" href="index.php"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a class="" href="#">RTI</a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">RTI FAQ</a></li>
                </ol>
            </nav>
        </div>
        <!-- <div class="py-1 px-5">
            <div class="one ">
                <h1 class="justify-content-left">RTI FAQ </h1>
            </div>
        </div> -->
    </div>
    <div class="container-fluid main_title">
        <div class=" py-3 px-5">
            <div class="one ">
                <h1 class="justify-content-left">RTI FAQ </h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-4">
        <div class="py-3 px-5">
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
                            <div class="col-lg-2">

                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <!-- <h2 class="aboutus-title">RTI FAQ</h2> -->
                                <div class="accordion accordion-flush faq" id="accordionFlushExample">
                                    <?Php if ($get_Count != 0) {
                                        $i=0;
                                        while ($row = pg_fetch_array($result_value)) {
                                    ?>
                                            <div class="accordion-item card faq_card_align">
                                                <h2 class="accordion-header card-header" id="flush-headingOne<?Php echo $row['ques_id'] ?>">
                                                    <button class="accordion-button collapsed faq-title" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?Php echo $row['ques_id'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <span class="badge"><?Php echo ++$i?></span><?Php echo $row['question']?>
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne<?Php echo $row['ques_id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body faq-accordian-body"><?Php echo $row['answer']?></div>
                                                </div>
                                            </div>
                                    <?Php }
                                    } ?>

                                </div>
                            </div>
                            <div class="col-lg-2">

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