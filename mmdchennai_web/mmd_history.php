<?Php $page_id = 1; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | History</title>
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
                    <li class="breadcrumb-item"><a class="" href="#">About Us</a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">History</a></li>
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
                <h1 class="justify-content-left">History </h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg ">
        <div class="py-3 px-5">
            <div id="get_records">
            </div>
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

        function get_records() {
            var page_id = <?Php echo $page_id ?>;

            data = {
                page_id: page_id,

            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_aboutus.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    console.log(response);
                    $("#get_records").html(response);

                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }
    </script>
</body>

</html>