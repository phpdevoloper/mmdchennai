<?php include 'include/db_connection.php';
include 'include/session.php';

$set_service_id = 3;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Ship Registration & Certification</title>
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
                                    <h4>Ship Registration & Certification</h4>
                                </div>

                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Services</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ship Registration & Certification</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pd-20 card-box mb-30">
                        <div class="tab">
                            <span hidden id="service_id"></span>
                            <!-- parameter 1st is service_id, 2nd paramter for service_category -->
                            <ul class="nav nav-tabs justify-content-end" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true" onclick="get_tab('get_editor',<?Php echo $set_service_id ?>,1);">For Whom</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false" onclick="get_tab('get_editor',<?Php echo $set_service_id ?>,2);">Fees</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#contact" role="tab" aria-selected="false" onclick="get_tab('get_documents',<?Php echo $set_service_id ?>,3);">Supporting Documents</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div id="get_tabship_services_<?Php echo $set_service_id ?>_1">
                                    </div>
                                    <!-- <div class="pd-20">
                                        <div id="getship_services_1_1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                </div>
                                                <div class="col-md-6 col-sm-12 text-right">
                                                    <a class="btn btn-primary" href="#" role="button" onclick="get_edit('open',1,1);">
                                                        Edit <i class="fa fa-edit"></i>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php echo html_entity_decode(
                                                    stripslashes(
                                                        $row_services['contents']
                                                    )
                                                ); ?>
                                            </div>
                                        </div>
                                        <div id="editship_services_1_1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                </div>
                                                <div class="col-md-6 col-sm-12 text-right">
                                                    <button class="btn btn-primary" type="button" onclick="savedata('ship_services',1,1)">Save</button>
                                                    <a class="btn btn-danger" href="#" role="button" onclick="get_edit('closed',1,1);">
                                                        Close <i class="fa fa-window-close"></i>
                                                    </a>
                                                </div>

                                            </div>
                                            <br>
                                            <form data-parsley-validate="">
                                                <div class="form-group ">
                                                    <textarea class="tinymce" id="save_ship_services1"><?php echo $row_services['contents']; ?></textarea>
                                                    </br>
                                                </div>
                                            </form>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel">
                                    <div id="get_tabship_services_<?Php echo $set_service_id ?>_2">
                                    </div>
                                    <!-- <div class="pd-20">
                                        <div id="getship_services_1_2">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                </div>
                                                <div class="col-md-6 col-sm-12 text-right">
                                                    <a class="btn btn-primary" href="#" role="button" onclick="get_edit('open',1,2);">
                                                        Edit <i class="fa fa-edit"></i>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php echo html_entity_decode(
                                                    stripslashes(
                                                        $row_services['contents']
                                                    )
                                                ); ?>
                                            </div>
                                        </div>
                                        <div id="editship_services_1_2">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                </div>
                                                <div class="col-md-6 col-sm-12 text-right">
                                                    <button class="btn btn-primary" type="button" onclick="savedata('ship_services',1,2)">Save</button>
                                                    <a class="btn btn-danger" href="#" role="button" onclick="get_edit('closed',1,2);">
                                                        Close <i class="fa fa-window-close"></i>
                                                    </a>
                                                </div>

                                            </div>
                                            <br>
                                            <form data-parsley-validate="">
                                                <div class="form-group ">
                                                    <textarea class="tinymce" id="save_ship_services2"><?php echo $row_services['contents']; ?></textarea>
                                                    </br>
                                                  
                                                </div>
                                            </form>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="tab-pane fade" id="contact" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="row">
                                            <!-- <div class="col-md-6 col-sm-12">
            </div> -->
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
                                                    <select class="custom-select2 form-control" id="slt_status" style="width: 100%" onchange="get_records('get_documents',<?Php echo $set_service_id ?>,3);">
                                                        <option value="">All</option>
                                                        <option value="L">Published</option>
                                                        <!-- <option value="N">Draft</option> -->
                                                        <option value="A">Archived</option>
                                                        <option value="D">Deleted</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="get_tabship_services_<?Php echo $set_service_id ?>_3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <form data-parsley-validate="" id="setship_services">
                            <div class="form-group ">
                           
                                <textarea class="tinymce" id="savevision_ta"></textarea>
                                </br>
                                <div class=" text-center">
                                    <button class="btn btn-primary mt-4" type="button" onclick="savedata('vision_ta','tamil')">Submit</button>
                                </div>
                             
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <h3 class="text-center">Add Ship Services</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>
                    <form id="demo-form" data-parsley-validate="">
                        <div class="form-group limited-length">
                            <label for="title">Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control input-sm inputlength" id="txtTitle" name="title" maxlength="1500" placeholder="Enter Title" required="" data-parsley-length="[2, 1500]" data-parsley-trigger="keyup change keypress" data-parsley-checkrtidoctitle>
                            <div class="pull-right" style="font-weight:500"><span class="counter"></span><span class="max-length"></span></div>
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="fileCheck" onclick="showFile();" name="checkbox" data-parsley-errors-container="#check-document" required="" data-parsley-trigger="keyup change keypress" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="linkCheck" name="checkbox" onchange="showLink();" data-parsley-errors-container="#check-document" data-parsley-trigger="keyup change keypress" /> <i></i> </label>
                                    </div>
                                </div>
                            </div>
                            <span id="check-document"></span>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" id="fileDiv">
                                <div class="form-group">
                                    <label for="email1">Selected media :</label>
                                    <span hidden id="selectedmediaid"></span>
                                    <span id="selectedmedia"></span>

                                </div>
                                <div class="form-group limited-length">
                                    <label for="email1">Short Title <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm inputlength" maxlength="20" id="short_title" required="" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-checktitle>
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-1" style="padding-top:30px;">
                            <b> or </b>
                             </div> -->
                            <div class="col-lg-12" id="linkDiv">
                                <div class="form-group limited-length">
                                    <label for="email1">link <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm inputlength" id="add_link" maxlength="200" data-parsley-length="[2, 200]" name="url" placeholder="Enter Link" data-parsley-trigger="keyup change keypress" data-parsley-type="url">
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success subLang" onclick="add_services();">Submit</button>
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
                                <h3 class="text-center">Edit Ship Services</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 ">
                        <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12" style="padding-right: 240px;padding-bottom:5px;">
                         
                            <img src="img/niotHeader.png" alt="MMD Logo" class="pull-right">
                        </div>

                    </div>
                    <h2 class="text-center"><span id="editModalHeader"></span></h2> -->
                    <span hidden id="editId"></span>
                    <span hidden id="StatusType"></span>
                    <span hidden id="set_operation"></span>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <form id="editdemo-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title">Edit Title<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" name="title" id="editTxtTitle" placeholder="Enter Title" required="" data-parsley-length="[2, 1500]" data-parsley-trigger="keyup change keypress" data-parsley-checkrtidoctitle>
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="editfileCheck" onclick="editshowFile();" name="checkbox" data-parsley-errors-container="#editcheck-document" required="" data-parsley-trigger="keyup change keypress" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="editlinkCheck" data-parsley-errors-container="#editcheck-document" name="checkbox" onchange="editshowLink();" data-parsley-trigger="keyup change keypress" /> <i></i> </label>
                                    </div>
                                </div>
                            </div>
                            <span id="editcheck-document"></span>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" id="editfileDiv">
                                <div class="form-group">
                                    <label for="email1">Selected media :</label>
                                    <span hidden id="editselectedmediaid"></span>
                                    <span id="editselectedmedia"></span>
                                    <!--  <input type="file" class="form-control input-sm" id="ad_file" accept="application/pdf" name="file" data-parsley-trigger="keyup change keypress"> -->
                                </div>
                                <div class="form-group limited-textarea">
                                    <label for="email1">Short Title <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm textarea" maxlength="20" id="editshort_title" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-checktitle>
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-1" style="padding-top:30px;">
                            <b> or </b>
                             </div> -->
                            <div class="col-lg-12" id="editlinkDiv">
                                <div class="form-group">
                                    <label for="email1">Edit Link<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" data-parsley-length="[2, 200]" id="edit_link" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="keyup change keypress">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success  subLang" onclick="edit_publications();" class="">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include 'include/sourcelink_js.php'; ?>
    <script>
        var currDate, table, previewId, archiveId, language, filesize, exactSize, ad_files, form_data, ad_filepath, get_service_id;

        var table, cur_tab;
        $(document).ready(function() {
            get_service_id = <?Php echo $set_service_id ?>;
            get_tab('get_editor', get_service_id, 1);
            get_edit('closed', get_service_id, 1);
            tynymce();
            $('#fileDiv').hide();
            $('#linkDiv').hide();
        });


        function get_tab(operation, service_id, category) {
            get_edit('closed', service_id, category);

            data = {

                operation: operation,
                type: 'ship_services',
                service_id: service_id,
                category: category
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_services.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#get_tabship_services_' + service_id + '_' + category + '').html(response);
                    if (operation == 'get_editor') {
                        $('#editship_services_' + service_id + '_' + category + '').hide();
                        tynymce();
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

        function get_records(operation, service_id, category) {
            get_edit('closed', service_id, category);
            var get_status = $('#slt_status').val();
            data = {

                operation: operation,
                type: 'ship_services',
                service_id: service_id,
                category: category,
                status: get_status
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_services.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#get_tabship_services_' + service_id + '_' + category + '').html(response);
                    if (operation == 'get_editor') {
                        $('#editship_services_' + service_id + '_' + category + '').hide();
                        tynymce();
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

        function savedata(opertaion, service_id, category) {

            var value, checkrowcount;
            value = tinyMCE.get('save_ship_services_' + category + '').getContent().replace(/'/g, "");
            // value = tinyMCE.get('savevision_hi').getContent().replace(/'/g, "");
            checkrowcount = <?php echo $row_sevices_count; ?>


            data = {
                value: value,
                type: 'ship_services',
                operation: 'save',
                service_id: service_id,
                category: category,
                checkrowcount: checkrowcount
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                dataType: "json",
                url: 'webservice/texteditorsave.php',
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

        function edit_tab(service_id, category) {

            data = {
                value: value,
                operation: 'edit',
                service_id: service_id,
                category: category
            }

            // console.log(editdata[0].edit);
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_services.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    $('#editship_services_' + service_id + '_' + category + '').html(response);
                    $('#getship_services_' + service_id + '_' + category + '').hide();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }

        function editBtn(id, service_id) {

            // return false;
            var editId, editTitle, editDate, editFilename, tblLink;
            var datavalue = {
                doc_id: JSON.parse(id),
                service_id: service_id,
                operation: 'get_edit'
            }
            // console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_services.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    // return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['doc_id']);
                        $('#service_id').text(data.result['service_id']);
                        $('#editTxtTitle').val(data.result['title']);
                        if (data.result['ad_link'] != '') {

                            $('#editlinkCheck').prop('checked', true);
                            $('#editfileCheck').prop('checked', false);
                            $('#edit_link').attr('required', 'required');

                            $('#editlinkDiv').show();
                            $('#editfileDiv').hide();
                            $('#edit_link').val(data.result['ad_link']);
                        } else {
                            $('#editfileCheck').prop('checked', true);
                            $('#editlinkCheck').prop('checked', false);
                            $('#editshort_title').attr('required', 'required');
                            $('#editlinkDiv').hide();
                            $('#editfileDiv').show();
                            $('#editselectedmedia').text(data.result['filename']);
                        }
                        $('#editshort_title').val(data.result['short_title']);
                        $('#editselectedmediaid').text(data.result['media_id']);

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

        function get_edit(operation, service_id, category) {

            if (operation == 'open') {
                $('#editship_services_' + service_id + '_' + category + '').show();
                $('#getship_services_' + service_id + '_' + category + '').hide();
                tynymce();

            } else if (operation == 'closed') {
                $('#getship_services_' + service_id + '_' + category + '').show();
                $('#editship_services_' + service_id + '_' + category + '').hide();
                tynymce();
            }
            tynymce();
        }


        function showFile() {
            $('#set_operation').text('save');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#uploadmodal').modal('show');

        }

        function showLink() {

            $('#selectedmedia').text('');
            $('#selectedmediaid').val('');
            $('#linkDiv').show();
            $('#fileDiv').hide();
            $("#fileCheck").prop('checked', false);
            $('#short_title').removeAttr('required');
            $('#add_link').attr('required', 'required');
            var checked = $("input[type=checkbox]:checked").length;
            if (checked == 0) {
                $("#linkCheck").prop('checked', true);
            }

            exactSize = 0;
            ad_files = "";
        }

        function editshowFile() {
            $('#set_operation').text('edit');
            get_newmedia();
            $('#uploadmodal').modal('show');
            $('#editfileDiv').show();
            $('#editlinkDiv').hide();
            // $('#uploadmodal').modal('show');
        }

        function editshowLink() {

            $('#editselectedmedia').text('');
            $('#editselectedmediaid').val('');
            $('#editlinkDiv').show();
            $('#editfileDiv').hide();
            $("#editfileCheck").prop('checked', false);
            $('#editshort_title').removeAttr('required');
            $('#edit_link').attr('required', 'required');
            var checked = $("input[type=checkbox]:checked").length;
            if (checked == 0) {
                $("#editlinkCheck").prop('checked', true);
            }

            exactSize = 0;
            ad_files = "";
        }


        function get_mediavalue(media_filename, media_shorttitle, media_id) {
            var checkedValue = $('.subject-list:checked').val();
            var get_operation = $('#set_operation').text();
            var ext = media_filename.split('.').pop();
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'pdf' || ext == 'docx') {
                if (get_operation == 'save') {
                    $('#fileDiv').show();
                    $('#linkDiv').hide();
                    $('#selectedmedia').text(media_filename);
                    $('#selectedmediaid').text(media_id);
                    $('#short_title').val(media_shorttitle);
                    $("#linkCheck").prop('checked', false);
                    $('#add_link').removeAttr('required');
                    $('#short_title').attr('required', 'required');

                    var checked = $("input[type=checkbox]:checked").length;
                    if (checked == 0) {
                        $("#fileCheck").prop('checked', true);
                    }

                } else {

                    $('#editfileDiv').show();
                    $('#editselectedmedia').text(media_filename);
                    $('#editselectedmediaid').text(media_id);
                    $('#editshort_title').val(media_shorttitle);
                    $("#editlinkCheck").prop('checked', false);
                    $('#edit_link').removeAttr('required');
                    $('#editshort_title').attr('required', 'required');

                    var checked = $("input[type=checkbox]:checked").length;
                    if (checked == 0) {
                        $("#editfileCheck").prop('checked', true);
                    }
                }
                $('#uploadmodal').modal('hide');

            } else {
                swal("Error !", "Images and Documents Only Allowed", "error");
                get_newmedia();
            }

        }

        function add_services() {

            if ($('#demo-form').parsley().validate() != true) {
                return false;

            } else {
                var title, end_date, filename, mediaid, link, short_title,

                    title = $('#txtTitle').val();


                var mas_docid = $('#row_docid').text();
                // if (value == 'en') {
                //     mas_docid = '';
                // } else {
                //     mas_docid = JSON.parse(mas_docid)
                // }

                if ($("#fileCheck").is(':checked')) {
                    link = ""
                    filename = $('#selectedmedia').text();
                    mediaid = $('#selectedmediaid').text();
                    short_title = $('#short_title').val();
                } else {
                    filename = '';
                    mediaid = ''
                    link = $('#add_link').val();
                    short_title = '';
                }

                var data = {
                    title: title,
                    filename: filename,
                    mediaid: mediaid,
                    link: link,
                    short_title: short_title,
                    operation: 'save',
                    service_id: get_service_id,
                    mas_id: mas_docid
                }
                console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_services.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        //  return false;
                        if (data.status == 'ok') {
                            get_records('get_documents', get_service_id, 3);
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Created", "success")
                            // });

                            $('#txtTitle').val('');
                            $('#ad_file').val('');
                            $('#addModal').modal('hide');
                            // $('.wrapper').css("opacity", "0");
                            // $("#data-table-basic").dataTable().fnReloadAjax();
                        } else {

                            swal("Error :Publish!", "Please try again", "error");
                            // $('.wrapper').css("opacity", ".5");
                        }

                        // $('.text').text(JSON.stringify(data));
                    },

                });
            }
        }

        function edit_publications(value) {

            if ($('#editdemo-form').parsley().validate() != true) {
                return false;

            } else {
                var title, end_date, filename, mediaid, link, short_title, service_id

                title = $('#editTxtTitle').val();
                end_date = $('#editTxtDate').val();
                var docid = $('#editId').text();
                docid = JSON.parse(docid);
                service_id = $('#service_id').text();
                service_id = JSON.parse(service_id);
                if ($("#editfileCheck").is(':checked')) {
                    link = ""
                    filename = $('#editselectedmedia').text();
                    mediaid = $('#editselectedmediaid').text();
                    short_title = $('#editshort_title').val();
                } else {
                    filename = '';
                    mediaid = ''
                    link = $('#edit_link').val();
                    short_title = '';
                }

                var data = {

                    title: title,
                    filename: filename,
                    mediaid: mediaid,
                    link: link,
                    short_title: short_title,
                    operation: 'edit',
                    service_id: service_id,
                    mas_id: docid
                }
                console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_services.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        //  return false;
                        if (data.status == 'ok') {
                            get_records('get_documents', get_service_id, 3);
                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Created", "success")
                            // });

                            $('#edittxtTitle').val('');
                            $('#editad_file').val('');
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

        function status_change(doc_id, service_id, status) {
            var status_text;
            if (status == 'L') {
                status_text = 'Publish';
            } else if (status == 'D') {
                status_text = 'Delete';
            } else if (status == 'A') {
                status_text = 'Archive';
            }
            var data = {
                doc_id: doc_id,
                service_id: service_id,
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
                            url: "webservice/add_services.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'ok') {
                                    // $('#tblStatus' + id + '').append(status);
                                    swal("Done!", "It was succesfully " + status_text + "!", "success");

                                    // statusAppend();
                                    get_records('get_documents', get_service_id, 3);
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