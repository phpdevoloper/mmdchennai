<?php include 'include/db_connection.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Who's Who</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include 'include/sourcelink_css.php'; ?>

</head>

<body>

    <?php include 'include/header.php'; ?>

    <?php include 'include/sidebar.php'; ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Who's Who</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">About Us</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Who's Who</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <!-- <div class="pd-20">
                            <h4 class="text-blue h4">Data Table Simple</h4>
                            <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
                        </div> -->
                        <div class="pd-20">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 text-left">
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal">
                                        Add Department <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-12" style="text-align:right">
                                    <label for="cars">Choose Status :</label>
                                </div>
                                <div class="col-lg-4 col-sm-12" style="padding-left:2px;">
                                    <div class="form-group">
                                        <select class="custom-select2 form-control" id="sltgetstatus" style="width: 100%" onchange="get_dept();">
                                            <option value="">All</option>
                                            <option value="L">Published</option>
                                            <option value="A">Archived</option>
                                            <option value="D">Deleted</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="get_records">
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="addModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Department</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>
                    <span hidden id="set_operation"></span>
                    <form id="add_dept-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="en_txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_dept(this.value);" id="subLang">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->
    <!-- Edit Modal popup Start-->

    <div class="modal animated fade" id="editModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Department</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                    <span hidden id="editId"></span>
                    <span hidden id="StatusType"></span>
                </div>

                <div class="modal-body" style="padding-top:10px;">
                    <form id="editdept-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Edit Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="editen_txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " onclick="edit_dept();">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include 'include/sourcelink_js.php'; ?>


    <script>
        $(document).ready(function() {
            get_dept();

        });

        function get_dept() {
            var status = $('#sltgetstatus').val();

            data = {
                status: status,
                operation: 'get_department'
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_whoswho.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    console.log(response);
                    $("#get_records").html(response);
                    table = $('.data-table').DataTable();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }

        function editBtn(id) {
            var datavalue = {
                dept_id: JSON.parse(id),
                operation: 'get_edit_dept'
            }
            // console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_whoswho.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    //  return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['dept_id']);

                        $('#editen_txtTitle').val(data.result['title']);

                    } else {
                        swal("Error !", "Please try again", "error");
                    }
                    // $('.text').text(JSON.stringify(data));
                },
                error: function(xhr, status, error) {
                    swal("Error !", "Please try again", "error");
                }

            });

            // edit Modal popup
        }


        function add_dept(value) {
            if ($('#add_dept-form').parsley().validate() != true) {
                return false;

            } else {
                var title, filename, mediaid, link, short_title,
                    title = $('#en_txtTitle').val();

                var data = {
                    title: title,
                    operation: 'save_dept',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_whoswho.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'notvalid') {
                            swal("Error !", "File Extension Not Valid", "error");
                        } else if (data.status == 'ok') {
                            get_dept();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Created", "success")
                            // });

                            $('#en_txtTitle').val('');

                            $('#addModal').modal('hide');
                            // $('.wrapper').css("opacity", "0");
                            // $("#data-table-basic").dataTable().fnReloadAjax();
                        } else {

                            swal("Error !", "Please try again", "error");
                            // $('.wrapper').css("opacity", ".5");
                        }

                        // $('.text').text(JSON.stringify(data));
                    },

                });
            }
        }

        function edit_dept(value) {
            if ($('#editdept-form').parsley().validate() != true) {
                return false;

            } else {
                var edittitle, editfilename, editmediaid, editshort_title, editId;
                edittitle = $('#editen_txtTitle').val();
                editId = $('#editId').text();
                var data = {
                    title: edittitle,
                    dept_id: JSON.parse(editId),
                    operation: 'edit_dept',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_whoswho.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        if (data.status == 'ok') {
                            get_dept();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Updated", "success")
                            // });

                            $('#editen_txtTitle').val('');
                            $('#editModal').modal('hide');
                            // $('.wrapper').css("opacity", "0");
                            // $("#data-table-basic").dataTable().fnReloadAjax();
                        } else {

                            swal("Error !", "Please try again", "error");
                            // $('.wrapper').css("opacity", ".5");
                        }

                        // $('.text').text(JSON.stringify(data));
                    },

                });
            }
        }


        function status_change(dept_id, status) {
            var status_text;
            if (status == 'L') {
                status_text = 'Publish';
            } else if (status == 'D') {
                status_text = 'Delete';
            } else if (status == 'A') {
                status_text = 'Archive';
            }
            var data = {
                dept_id: dept_id,
                status: status,
                operation: 'status_change_dept'
            }

            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, " + status_text + " it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "webservice/add_whoswho.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'ok') {
                                    // $('#tblStatus' + id + '').append(status);
                                    swal("Done!", "It was succesfully " + status_text + "!", "success");

                                    // statusAppend();
                                    get_dept();
                                } else {
                                    swal("Error :" + status_text + "!", "Please try again", "error");

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error :" + status_text + "!", "Please try again", "error");
                            }


                        });
                    } else if (result.dismiss === 'cancel') {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });

        }


        function redirect_divison(id) {

            var data = {
                dept_id: id,
                operation: 'set_session_dept'
            }
            //console.log(data);
            $.ajax({
                url: "webservice/add_whoswho.php",
                type: 'POST',
                dataType: 'json',
                data: data
            }).done(function(res) {
                // console.log(res);
                // return false;
                if (res.valid) {
                    document.location.href = 'mmd_whoswho_division.php';
                }
            });
        }
    </script>
</body>

</html>