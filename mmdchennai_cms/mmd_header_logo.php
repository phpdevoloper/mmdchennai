<?php include 'include/db_connection.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | NIOT Header Logo</title>


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
                                    <h4>NIOT Header Logo</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Portal Content</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">NIOT Header Logo</li>
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
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-12" style="text-align:right">
                                    <label for="cars">Choose Status :</label>
                                </div>
                                <div class="col-lg-4 col-sm-12" style="padding-left:2px;">
                                    <div class="form-group">
                                        <select class="custom-select2 form-control" id="sltgetstatus" style="width: 100%" onchange="get_logo();">
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
                                <h3 class="text-center">Add Header Logo</h3>
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
                    <form id="addslider-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="en_txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="form-group ">
                            <label for="title">File (Images and Video)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="addFiles();" id="selectedmedia" name="title" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            <span hidden id="selectedmediaid"></span>
                        </div>
                        <div class="" id="fileDiv">
                            <div class="form-group limited-length">
                                <label for="email1">Short Title <span class="mandatory"> *</span></label>
                                <input type="text" class="form-control input-sm inputlength" maxlength="20" id="short_title" required="" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-specialcharacter>
                                <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                            </div>
                        </div>
                        <div class="" >
                            <div class="form-group limited-length">
                                <label for="email1">URL </span></label>
                                <input type="text" class="form-control input-sm inputlength" id="add_link" maxlength="100" name="url" placeholder="Enter Logo Link" data-parsley-type="url" data-parsley-trigger="change">
                                <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                            </div>
                        </div>

                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_logo(this.value);" id="subLang">Submit</button>
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
                                <h3 class="text-center">Edit Slider</h3>
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
                    <form id="editslider-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" id="editen_txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="form-group ">
                            <label for="title">Edit File (Images and Video)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="editFiles();" id="editselectedmedia" name="title" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            <span hidden id="editselectedmediaid"></span>
                        </div>
                        <div class="" id="editfileDiv">
                            <div class="form-group limited-length">
                                <label for="email1">Edit Short Title <span class="mandatory"> *</span></label>
                                <input type="text" class="form-control input-sm inputlength" maxlength="20" id="editshort_title" required="" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-specialcharacter>
                                <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                            </div>
                        </div>
                        <div class="" id="editlinkDiv">
                            <div class="form-group">
                                <label for="email1">Edit Link</label>
                                <input type="text" class="form-control input-sm" id="edit_link" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="keyup change keypress">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " onclick="edit_logo();">Update</button>
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
            get_logo();
            $('#fileDiv').hide();
            $('#linkDiv').hide();
        });

        function get_logo() {
            var status = $('#sltgetstatus').val();

            data = {
                status: status
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_logo.php',
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
                logo_id: JSON.parse(id),
                operation: 'get_edit'
            }
            // console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_logo.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    //  return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['logo_id']);

                        $('#editen_txtTitle').val(data.result['title']);
                        $('#editselectedmedia').val(data.result['filename']);
                        $('#editshort_title').val(data.result['short_title']);
                        $('#editselectedmediaid').text(data.result['media_id']);
                       $('#editshort_title').attr('required', 'required');
                       $('#edit_link').val(data.result['ad_link']);


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

        function addFiles() {
            $('#set_operation').text('save');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#fileDiv').show();
            $('#short_title').attr('required', 'required');
        }

        function editFiles() {
            $('#set_operation').text('edit');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#fileDiv').show();
            $('#editshort_title').attr('required', 'required');
        }

        function get_mediavalue(media_filename, media_shorttitle, media_id) {
            var checkedValue = $('.subject-list:checked').val();
            var get_operation = $('#set_operation').text();
            var ext = media_filename.split('.').pop();
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'mp4' || ext == 'mp3') {
                if (get_operation == 'save') {
                    $('#fileDiv').show();
                    $('#selectedmedia').val(media_filename);
                    $('#selectedmediaid').text(media_id);
                    $('#short_title').val(media_shorttitle);
                } else {

                    $('#editfileDiv').show();
                    $('#editselectedmedia').val(media_filename);
                    $('#editselectedmediaid').text(media_id);
                    $('#editshort_title').val(media_shorttitle);
                }

                $('#uploadmodal').modal('hide');
            } else {
                swal("Error !", "Images and Video Only Allowed", "error");
                get_newmedia();
            }
        }

        function showLink() {
            $('#linkDiv').show();
            $('#fileDiv').hide();
            $("#fileCheck").prop('checked', false);
            $('#ad_file').removeAttr('required');
            $('#add_link').attr('required', 'required');
            var checked = $("input[type=checkbox]:checked").length;
            if (checked == 0) {
                $("#videoCheck").prop('checked', true);
            }

            exactSize = 0;
            ad_files = "";
        }

        function add_logo(value) {
            if ($('#addslider-form').parsley().validate() != true) {
                return false;

            } else {
                var title, filename, mediaid, link, short_title, link;
                title = $('#en_txtTitle').val();
                filename = $('#selectedmedia').val();
                mediaid = $('#selectedmediaid').text();
                short_title = $('#short_title').val();
                link = $('#edit_link').val();
                var data = {
                    title: title,
                    filename: filename,
                    mediaid: mediaid,
                    short_title: short_title,
                    ad_link: link,
                    operation: 'save',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_logo.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'notvalid') {
                            swal("Error !", "File Extension Not Valid", "error");
                        } else if (data.status == 'ok') {
                            get_logo();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Created", "success")
                            // });

                            $('#en_txtTitle').val('');
                            $('#hi_txtTitle').val('');
                            $('#hi_txtTitle').val('');
                            $('#selectedmedia').val('');
                            $('#short_title').val('');
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

        function edit_logo(value) {
            if ($('#editslider-form').parsley().validate() != true) {
                return false;

            } else {
                var edittitle, editfilename, editmediaid, editshort_title, editId;
                edittitle = $('#editen_txtTitle').val();

                editfilename = $('#editselectedmedia').val();
                editmediaid = $('#editselectedmediaid').text();
                editshort_title = $('#editshort_title').val();
                editlink = $('#edit_link').val();
                editId = $('#editId').text();
                var data = {
                    title: edittitle,
                    filename: editfilename,
                    mediaid: editmediaid,
                    short_title: editshort_title,
                    ad_link: editlink,
                    logo_id: JSON.parse(editId),
                    operation: 'edit',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_logo.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        if (data.status == 'ok') {
                            get_logo();
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Updated", "success")
                            // });

                            $('#editen_txtTitle').val('');
                            $('#edithi_txtTitle').val('');
                            $('#edithi_txtTitle').val('');
                            $('#editselectedmedia').val('');
                            $('#editshort_title').val('');
                            $('#edit_link').val('');
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


        function status_change(logo_id, status) {
            var status_text;
            if (status == 'L') {
                status_text = 'Publish';
            } else if (status == 'D') {
                status_text = 'Delete';
            } else if (status == 'A') {
                status_text = 'Archive';
            }
            var data = {
                logo_id: logo_id,
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
                            url: "webservice/add_logo.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'ok') {
                                    // $('#tblStatus' + id + '').append(status);
                                    swal("Done!", "It was succesfully " + status_text + "!", "success");

                                    // statusAppend();
                                    get_logo();
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