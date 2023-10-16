<?php include 'include/db_connection.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Who's Who Division</title>


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
                                    <h4>Who's Who Division</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">About Us</a></li>
                                        <li class="breadcrumb-item"><a href="mmd_whos_who.php">Who's Who Department</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Who's Who Division</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal">
                                    Add Division <i class="fa fa-plus"></i>
                                </a>
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

                                <!-- <div class="col-lg-2 col-sm-12" style="text-align:right">
                                    <label for="cars">Choose Status :</label>
                                </div>
                                <div class="col-lg-4 col-sm-12" style="padding-left:2px;">
                                    <div class="form-group">
                                        <select class="custom-select2 form-control" id="sltgetstatus" style="width: 100%" onchange="get_division();">
                                            <option value="">All</option>
                                            <option value="L">Published</option>
                                            <option value="A">Archived</option>
                                            <option value="D">Deleted</option>
                                        </select>
                                    </div>
                                </div> -->
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
                                <h3 class="text-center">Add Division</h3>
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
                    <form id="add_division-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="en_txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_division(this.value);">Submit</button>
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

    <!-- Add Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="addcontentModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Content</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="set_division_id"></span>
                    <form id="add_contents-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Name<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="txtname" name="title" placeholder="Enter Name" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="title">Designation<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="txtdesignation" name="title" placeholder="Enter Designation" required="" data-parsley-length="[2, 100]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="date"> Email </label>
                            <input type="email" class="form-control" name="title" id="txtemail" placeholder="Enter Email"  data-parsley-type="email" data-parsley-length="[10,100]" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="title">Phone </label>
                            <input type="number" class="form-control" name="title" id="txtphone" maxlength="10" placeholder="Enter Phone Number"  data-parsley-validate="number" data-parsley-type="digits" data-parsley-length="[10,10]" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_contents(this.value);">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->
    <!-- Edit Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="editcontentsModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Content</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="set_cont_id"></span>
                    <form id="edit_contents-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Edit Name<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="edittxtname" name="title" placeholder="Enter Name" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="title">Edit Designation<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="edittxtdesignation" name="title" placeholder="Enter Designation" required="" data-parsley-length="[2, 100]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="date"> Edit Email </label>
                            <input type="email" class="form-control" name="title" id="edittxtemail" placeholder="Enter Email"  data-parsley-type="email" data-parsley-length="[10,100]" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="title">Edit Phone </label>
                            <input type="text" class="form-control" name="title" id="edittxtphone" maxlength="10" placeholder="Enter Phone Number"  data-parsley-validate="number" data-parsley-type="digits" data-parsley-length="[10,10]" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="edit_contents(this.value);">Update</button>
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
            get_division();

        });

        function get_division() {
            var status = $('#sltgetstatus').val();

            data = {
                operation: 'get_department'
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_whoswho_divisions.php',
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

        function get_division_contents() {
            var status = $('#sltgetstatus').val();

            data = {
                operation: 'get_department'
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_whoswho_divisions_contents.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    console.log(response);
                    $("#get_records_contents").html(response);
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


        function add_division(value) {
            if ($('#add_division-form').parsley().validate() != true) {
                return false;

            } else {
                var title, filename, mediaid, link, short_title,
                    title = $('#en_txtTitle').val();

                var data = {
                    title: title,
                    dept_id: <?Php echo $_SESSION['session_dept_id'] ?>,
                    operation: 'save_division',
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
                            get_division();
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
                            get_division();
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
                                    get_division();
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

        function set_contents_id(division_id) {
            $('#set_division_id').text(division_id);
        }
        function add_contents(value) {
            if ($('#add_contents-form').parsley().validate() != true) {
                return false;

            } else {
                var name, designation, email, phone, division_id;
                name = $('#txtname').val();
                designation = $('#txtdesignation').val();
                email = $('#txtemail').val();
                phone = $('#txtphone').val();
                division_id = $('#set_division_id').text();
                var data = {
                    name: name,
                    designation: designation,
                    email: email,
                    phone: phone,
                    dept_id: <?Php echo $_SESSION['session_dept_id'] ?>,
                    division_id: JSON.parse(division_id),
                    operation: 'save_division_contents',
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
                            get_division_contents(division_id);
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Saved", "success")
                            // });

                            $('#txtname').val('');
                            $('#txtdesignation').val('');
                            $('#txtemail').val('');
                            $('#txtphone').val('');
                            $('#addcontentModal').modal('hide');
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
        function editBtn_contents(division_id,id) {
            $('#set_division_id').text(division_id);
            var datavalue = {
                cont_id: JSON.parse(id),
                operation: 'get_edit_division_contents'
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

                        $('#set_cont_id').text(data.result['cont_id']);
                        $('#edittxtname').val(data.result['name']);
                        $('#edittxtdesignation').val(data.result['designation']);
                        $('#edittxtemail').val(data.result['email']);
                        $('#edittxtphone').val(data.result['phone']);


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

        function edit_contents(value) {
            if ($('#edit_contents-form').parsley().validate() != true) {
                return false;

            } else {
                var name, designation, email, phone, division_id;
                division_id =  $('#set_division_id').text();
                name = $('#edittxtname').val();
                designation = $('#edittxtdesignation').val();
                email = $('#edittxtemail').val();
                phone = $('#edittxtphone').val();

                cont_id = $('#set_cont_id').text();
                var data = {
                    name: name,
                    designation: designation,
                    email: email,
                    phone: phone,
                    dept_id: <?Php echo $_SESSION['session_dept_id'] ?>,
                    cont_id: JSON.parse(cont_id),
                    operation: 'edit_division_contents',
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
                            get_division_contents(division_id);
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Updated", "success")
                            // });

                            $('#txtname').val('');
                            $('#txtdesignation').val('');
                            $('#txtemail').val('');
                            $('#txtphone').val('');
                            $('#editcontentsModal').modal('hide');
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

        function status_contents_change(cont_id, division_id) {
            var data = {
                cont_id: cont_id,
                operation: 'status_change_division_contents'
            }
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes Delete it!",
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
                                    swal("Done!", "It was succesfully Deleted!", "success");

                                    // statusAppend();
                                    get_division_contents(division_id);
                                } else {
                                    swal("Error : Delete!", "Please try again", "error");

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error :Delete!", "Please try again", "error");
                            }


                        });
                    } else if (result.dismiss === 'cancel') {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
        }
    </script>
</body>

</html>