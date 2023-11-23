<?php include("include/db_connection.php");
include 'include/session.php';
$pagename = 'feedback';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Forms</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include "include/sourcelink_css.php" ?>

</head>

<body>

    <?php include "include/header.php" ?>

    <?php include "include/sidebar.php" ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Feedback</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <div id="getrecords">

                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->
    
    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        var page_name;
        $(document).ready(function() {
            // get_records();
            $('#fileDiv').hide();
            $('#linkDiv').hide();
            page_name = '<?Php echo $pagename ?>';
        });

        function get_records() {

            var cur_lang = $('#getLang').text();
            var status = $('#slt_status').val();

            data = {
                status: status,
                page_name: '<?Php echo $pagename ?>'
            }


            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",    
                url: 'webservice/get_feedback.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#getrecords').html(response);
                    $('.tbl-en-draft').DataTable();
                    table.columns.adjust().draw();
                    $(".select2").select2();
                    statusAppend();
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