<?php include 'include/db_connection.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Contact Us</title>


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
                                    <h4>Contact Us</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcontentModal">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-12" style="text-align:right">
                                    <label for="cars">Choose Status :</label>
                                </div>
                                <div class="col-lg-4 col-sm-12" style="padding-left:2px;">
                                    <div class="form-group">
                                        <select class="custom-select2 form-control" id="sltgetstatus" style="width: 100%" onchange="get_contactus();">
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

    <div class="modal animated fade modal-popout-bg" id="addcontentModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Contact Us</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="set_division_id"></span>
                    <form id="add_contactus-form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Title<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" id="txttitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                               
                                <div class="form-group">
                                    <label for="title">Name<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" id="txtname" name="title" placeholder="Enter Name" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Designation</label>
                                    <input type="text" class="form-control" id="txtdesignation" name="title" placeholder="Enter Designation" data-parsley-length="[2, 100]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Address<span class="mandatory"> *</span></label>
                                    <textarea type="text" class="form-control" id="txtaddress" name="title" placeholder="Enter Address" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change"></textarea>
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Telephone <span class="mandatory"> *</span> </label>
                                    <input type="text" class="form-control" name="title" id="txtphone" required="" data-parsley-length="[5, 50]" placeholder="Enter TelePhone Number" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Fax </label>
                                    <input type="text" class="form-control" name="title" id="txtfax" data-parsley-length="[5, 50]" placeholder="Enter fax Number" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="date"> Email <span class="mandatory"> *</span></label>
                                    <input type="email" class="form-control" name="title" id="txtemail" required="" placeholder="Enter Email" data-parsley-type="email" data-parsley-length="[10,100]" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_contactus(this.value);">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->
    <!-- Edit Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="editcontentsModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Contact Us</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="editId"></span>
                    <form id="edit_contactus-form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Edit Title<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" id="edittxttitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Edit Designation</label>
                                    <input type="text" class="form-control" id="edittxtdesignation" name="title" placeholder="Enter Designation" data-parsley-length="[2, 100]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Edit Name<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" id="edittxtname" name="title" placeholder="Enter Name" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Edit Address<span class="mandatory"> *</span></label>
                                    <textarea type="text" class="form-control" id="edittxtaddress" name="title" placeholder="Enter Address" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change"></textarea>
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Edit Telephone </label>
                                    <input type="text" class="form-control" name="title" id="edittxtphone" data-parsley-length="[5, 50]" placeholder="Enter Phone Number" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="title">Edit Fax <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" name="title" id="edittxtfax" data-parsley-length="[5, 50]" placeholder="Enter Fax Number" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="date"> Edit Email </label>
                                    <input type="email" class="form-control" name="title" id="edittxtemail" placeholder="Enter Email" data-parsley-type="email" data-parsley-length="[10,100]" data-parsley-trigger="keyup change keypress">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="edit_contactus(this.value);">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal popup End-->
    <!-- js -->
    <!-- js -->
    <?php include 'include/sourcelink_js.php'; ?>


    <script>
        $(document).ready(function() {
            get_contactus();

        });

        function get_contactus() {
            var status = $('#sltgetstatus').val();

            data = {
                status: status
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_contactus.php',
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
                cont_id: JSON.parse(id),
                operation: 'get_edit'
            }
            console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_contactus.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    //  return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['cont_id']);
                        $('#edittxttitle').val(data.result['title']);
                        $('#edittxtname').val(data.result['name']);
                        $('#edittxtaddress').val(data.result['address']);
                        $('#edittxtemail').val(data.result['email']);
                        $('#edittxtphone').val(data.result['phone']);
                        $('#edittxtfax').val(data.result['fax']);
                        $('#edittxtdesignation').val(data.result['designation']);



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

        function add_contactus(value) {
            if ($('#add_contactus-form').parsley().validate() != true) {
                return false;

            } else {
                var title, name, address, email, phone, designation,fax;
                title = $('#txttitle').val();
                name = $('#txtname').val();
                address = $('#txtaddress').val();
                email = $('#txtemail').val();
                phone = $('#txtphone').val();
                designation = $('#txtdesignation').val();
                fax = $('#txtfax').val();

                var data = {
                    title: title,
                    name: name,
                    address: address,
                    email: email,
                    phone: phone,
                    designation:designation,
                    fax:fax,
                    operation: 'save',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_contactus.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'notvalid') {
                            swal("Error !", "File Extension Not Valid", "error");
                        } else if (data.status == 'ok') {
                            get_contactus();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Saved", "success")
                            // });
                            $('#txttitle').val('');
                            $('#txtname').val('');
                            $('#txtaddress').val('');
                            $('#txtemail').val('');
                            $('#txtphone').val('');
                            $('#txtdesignation').val('');
                            $('#txtfax').val('');
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


        function edit_contactus(value) {
            if ($('#edit_contactus-form').parsley().validate() != true) {
                return false;

            } else {
                var title, name, address, email, phone, designation,fax, cont_id;
                cont_id = $('#editId').text();
                title = $('#edittxttitle').val();
                name = $('#edittxtname').val();
                address = $('#edittxtaddress').val();
                email = $('#edittxtemail').val();
                phone = $('#edittxtphone').val();
                designation = $('#edittxtdesignation').val();
                fax = $('#edittxtfax').val();

                var data = {
                    title: title,
                    name: name,
                    address: address,
                    email: email,
                    phone: phone,
                    designation:designation,
                    fax:fax,
                    cont_id: JSON.parse(cont_id),
                    operation: 'edit',
                }

                $.ajax({
                    url: "webservice/add_contactus.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'notvalid') {
                            swal("Error !", "File Extension Not Valid", "error");
                        } else if (data.status == 'ok') {
                            get_contactus();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Updated", "success")
                            // });
                            $('#edittxttitle').val('');
                            $('#edittxtname').val('');
                            $('#edittxtaddress').val('');
                            $('#edittxtemail').val('');
                            $('#edittxtphone').val('');
                            $('#edittxtdesignation').val('');
                            $('#edittxtfax').val('');
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

        function status_change(cont_id, status) {
            var status_text;
            if (status == 'L') {
                status_text = 'Publish';
            } else if (status == 'D') {
                status_text = 'Delete';
            } else if (status == 'A') {
                status_text = 'Archive';
            }
            var data = {
                cont_id: cont_id,
                status: status,
                operation: 'status_change'
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
                            url: "webservice/add_contactus.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'ok') {
                                    // $('#tblStatus' + id + '').append(status);
                                    swal("Done!", "It was succesfully " + status_text + "!", "success");

                                    // statusAppend();
                                    get_contactus();
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
    </script>
</body>

</html>