<?php include("include/db_connection.php");
include 'include/session.php';
$page_id = 3;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Vision Mission & Policy</title>


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
                                    <h4>Vision Mission & Policy</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">About Us</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Vision Mission & Policy</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div id="get_contents_<?Php echo $page_id ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        $(document).ready(function() {

            get_records(<?Php echo $page_id ?>)
            tynymce();
        });

        function savedata(page_id) {
            var value, checkrowcount;
            value = tinyMCE.get('save_' + page_id + '').getContent().replace(/'/g, "");
            // value = tinyMCE.get('savevision_hi').getContent().replace(/'/g, "");
            checkrowcount = <?php echo $row_sevices_count; ?>


            data = {
                value: value,
                operation: 'save_contents',
                page_id: page_id,
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                dataType: "json",
                url: 'webservice/add_aboutus.php',
                data: data,
                success: function(response, textStatus, xhr) {

                    if (response.status == 'ok') {
                        swal({
                            title: "",
                            text: "Successfully Saved!",
                            type: "success",
                            buttons: [
                                'NO',
                                'YES'
                            ],
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            } else {
                                //if no clicked => do something else
                            }
                        });
                    } else {
                        swal("Error !", "Please try again", "error");
                    }
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }

        function edit_tab(page_id) {

            data = {
                operation: 'edit_contents',
                page_id: page_id,
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/add_aboutus.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#edit_' + page_id + '').html(response);
                    $('#get_' + page_id + '').hide();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }

        function get_edit(operation, page_id) {

            if (operation == 'open') {
                $('#edit_' + page_id + '').show();
                $('#get_' + page_id + '').hide();
                tynymce();

            } else if (operation == 'closed') {
                $('#get_' + page_id + '').show();
                $('#edit_' + page_id + '').hide();
                tynymce();
            }
            tynymce();
        }

        function get_records(page_id) {
            get_edit('closed', page_id);
            var get_status = $('#slt_status').val();
            data = {

                page_id: page_id,
                operation: 'get_contents'
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_aboutus.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#get_contents_' + page_id + '').html(response);


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