<?php include("include/db_connection.php");
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Add Menu</title>

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
                                    <h4>Add Menu</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Portal Content</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Menu</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addmainModal">
                                    Add New <i class="fa fa-plus"></i>
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
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8" id="get_menu">

                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="addmainModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Main Menu</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <span hidden id="editId"></span>
                <span hidden id="set_mainid"></span>
                <span hidden id="set_language"></span>
                <span hidden id="set_mas_subid"></span>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>
                    <form id="mainmenu-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">English Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="add_name" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="email1">Link</label>
                            <input type="text" class="form-control input-sm" id="add_link" name="url" placeholder="Enter Link" data-parsley-trigger="change">
                        </div>

                        <!-- <div class="form-group">
                            <label for="date"> <span class="addDate"> </span> <span class="mandatory">*</span></label>
                            <div class="input-group date ">
                                <span class="input-group-addon " data-provide="datepicker"> <span class="fa fa-calendar"></span></span>
                                <input type="text" class="form-control" readonly id="endDate" name="date" value='' placeholder="Enter Date" required="" data-parsley-trigger="change">
                            </div>
                          
                        </div> -->

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_mainmenu();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fade modal-popout-bg" id="add_submenu" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Sub Menu</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="main_menuid"></span>
                    <form id="submenu-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="add_subname" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="email1">Link<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control input-sm" id="add_sublink" name="url" required="" placeholder="Enter Link" data-parsley-trigger="change">
                        </div>

                        <!-- <div class="form-group">
                            <label for="date"> <span class="addDate"> </span> <span class="mandatory">*</span></label>
                            <div class="input-group date ">
                                <span class="input-group-addon " data-provide="datepicker"> <span class="fa fa-calendar"></span></span>
                                <input type="text" class="form-control" readonly id="endDate" name="date" value='' placeholder="Enter Date" required="" data-parsley-trigger="change">
                            </div>
                          
                        </div> -->

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_submenu();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->

    <div class="modal animated fade modal-popout-bg" id="edit_menu" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Menu</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="edit_id"></span>
                    <form id="editmenu-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Edit Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="edit_name" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="email1">Edit Link<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control input-sm" id="edit_link" name="url" placeholder="Enter Link" data-parsley-trigger="change">
                        </div>

                        <!-- <div class="form-group">
                            <label for="date"> <span class="addDate"> </span> <span class="mandatory">*</span></label>
                            <div class="input-group date ">
                                <span class="input-group-addon " data-provide="datepicker"> <span class="fa fa-calendar"></span></span>
                                <input type="text" class="form-control" readonly id="endDate" name="date" value='' placeholder="Enter Date" required="" data-parsley-trigger="change">
                            </div>
                          
                        </div> -->

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updatemenu();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->

    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        $(document).ready(function() {
            get_records();
        });

        function get_records() {

            $.ajax({
                url: 'webservice/get_menu.php',
                type: 'POST',
                // contentType: "application/json",
                // dataType: "JSON",

                success: function(data) {
                    // alert(data);
                    console.log(data);
                    $("#get_menu").html(data);
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error :Archive!", "Please try again", "error");

                }
            });
        }

        function submenu(id) {
            $('#main_menuid').val(id);
        }

        function set_menuid(menu_id) {

            $('#set_mainid').text(menu_id);
            // $('#addsubModal').appendTo("body").modal('show');
        }

        function set_sub_menuid(menu_id, mas_menu_id) {

            $('#set_mainid').text(menu_id);
            $('#set_mas_subid').text(mas_menu_id);

            // $('#addsubModal').appendTo("body").modal('show');
        }



        function add_mainmenu() {
            if ($('#mainmenu-form').parsley().validate() != true) {
                return false;

            } else {

                var mainname = $("#add_name").val();
                var menu_link = $("#add_link").val();
                var mainmenu_id = $('#set_mainid').text();

                cur_tab = $('#set_language').text();
                if (cur_tab == '') {
                    cur_tab = 'en';
                }
                //  console.log(old_json[0].getdata[0].menu);
                //  return false;
                var maindata = {
                    menu_title: mainname,
                    menu_link: menu_link,
                    
                    main_menu_id: mainmenu_id,
                    operation: 'mainmenu_save'
                }
                $.ajax({
                    url: "webservice/add_menu.php",
                    type: "POST",
                    dataType: 'JSON',
                    data: maindata,
                    // dataType: "html",
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        if (data.status == 'ok') {

                            swal("", "Successully Saved", "success");
                            $('#addmainModal').modal('hide');
                            $('#add_name').val('');
                            $('#add_link').val('');
                            get_records();

                        } else {
                            swal("Error!", "Please try again", "error");

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error:", "Please try again", "error");
                    }


                });
            }
        }



        function add_submenu() {
            if ($('#submenu-form').parsley().validate() != true) {
                return false;

            } else {

                var submainname = $("#add_subname").val();
                var submenu_link = $("#add_sublink").val();
                var submenu_id = $('#set_mainid').text();
                var mas_submenu_id = $('#set_mas_subid').text();
                if (mas_submenu_id == '') {
                    mas_submenu_id = 0;
                }
                cur_tab = $('#set_language').text();
                //  console.log(old_json[0].getdata[0].menu);
                //  return false;

                var maindata = {
                    menu_title: submainname,
                    menu_link: submenu_link,
                    submenu_id: submenu_id,
                    mas_submenu_id: mas_submenu_id,
                    
                    operation: 'submenu_save'
                }

                $.ajax({
                    url: "webservice/add_menu.php",
                    type: "POST",
                    dataType: 'JSON',
                    data: maindata,
                    // dataType: "html",
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        if (data.status == 'ok') {

                            swal("", "Successully Saved", "success");
                            $('#add_submenu').modal('hide');
                            $('#add_subname').val('');
                            $('#add_sublink').val('');
                            get_records();


                        } else {
                            swal("Error!", "Please try again", "error");

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error:", "Please try again", "error");
                    }


                });
            }
        }

        function editmenu(menu_id, menuname, menulink) {
            $('#edit_id').text(menu_id);
            $('#edit_name').val(menuname);
            $('#edit_link').val(menulink);
        }

        function updatemenu() {
            if ($('#editmenu-form').parsley().validate() != true) {
                return false;

            } else {

                var edit_name = $("#edit_name").val();
                var edit_link = $("#edit_link").val();
                var edit_id = $('#edit_id').text();
                //  console.log(old_json[0].getdata[0].menu);
                //  return false;
                var maindata = {
                    menu_title: edit_name,
                    menu_link: edit_link,
                    menu_id: JSON.parse(edit_id),
                    operation: 'editmenu'
                }
                $.ajax({
                    url: "webservice/add_menu.php",
                    type: "POST",
                    dataType: 'JSON',
                    data: maindata,
                    // dataType: "html",
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'ok') {

                            swal("", "Successully Updated", "success");
                            $('#edit_menu').modal('hide');
                            get_records();


                        } else {
                            swal("Error!", "Please try again", "error");

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error:", "Please try again", "error");
                    }


                });
            }
        }

        function updateOrder(maindata, operation) {

            swal({
                title: "Are you sure?",
                text: "Do You Want To Order Change ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "webservice/add_menu.php",
                        type: 'post',
                        datatype: 'JSON',
                        data: {
                            position: maindata,
                            operation: operation
                        },
                        success: function(data) {
                            var parsedata = JSON.parse(data);
                            if (parsedata.status == 'ok') {

                                swal("", "Successully Order Changed", "success");

                                get_records();


                            } else {
                                swal("Error!", "Please try again", "error");

                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error:", "Please try again", "error");
                        }
                    })
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    get_records();
                }
            });

        }
        /***************************************/


        function deletebtn(menu_id, operation) {

            var data = {
                menu_id: menu_id,
                
                operation: operation
            }
            // console.log(data);
            // return false;
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "webservice/add_menu.php",
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        success: function(data) {
                            // console.log(data);
                            // return false;
                            if (data.status == 'ok') {
                                // $('#tblStatus' + id + '').append(status);
                                swal("Done!", "It was succesfully Moved !", "success");
                                get_records();
                            } else {
                                swal("Error !", "Please try again", "error");

                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error !", "Please try again", "error");
                        }


                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");

                }
            });


        }
    </script>
</body>

</html>