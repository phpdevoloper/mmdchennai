<?php include("include/db_connection.php");
include 'include/session.php';
$page_id = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | RTI Contacts</title>

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
                                    <h4>RTI Contacts</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">RTI</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">RTI Contacts</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div id="get_contents_contacts">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        $(document).ready(function() {

            get_records()
            tynymce();
        });

        function savedata() {

            var value, checkrowcount;
            value = tinyMCE.get('save_contacts').getContent().replace(/'/g, "");
            // value = tinyMCE.get('savevision_hi').getContent().replace(/'/g, "");
            checkrowcount = <?php echo $row_sevices_count; ?>


            data = {
                value: value,
                operation: 'save_rti',
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                dataType: "json",
                url: 'webservice/add_rti.php',
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

        function edit_tab() {

            data = {
                operation: 'edit_contacts',
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/add_rti.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#edit_contacts').html(response);
                    $('#get_contacts').hide();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }

        function get_edit(operation) {

            if (operation == 'open') {
                $('#edit_contacts').show();
                $('#get_contacts').hide();
             
                tynymce();

            } else if (operation == 'closed') {
              
                $('#get_contacts').show();
                $('#edit_contacts').hide();
                tynymce();
            }
            tynymce();
        }

        function get_records() {
            get_edit('closed');
            var get_status = $('#slt_status').val();
            data = {
                operation: 'get_contents'
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_rti.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#get_contents_contacts').html(response);


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