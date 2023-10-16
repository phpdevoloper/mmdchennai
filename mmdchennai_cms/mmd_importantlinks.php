<?php include("include/db_connection.php");
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Important Links</title>


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
                                    <h4>Important Links</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Portal Content</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Important Links</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- <div class="col-md-6 col-sm-12 text-right">
                                <a class="btn btn-primary" href="#" role="button">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <!-- <div class="pd-20">
                            <h4 class="text-blue h4">Data Table Simple</h4>
                            <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
                        </div> -->
                        <div class="pd-20">
                            <div class="col-lg-12">
                                <!-- Row start -->
                                <div class="row" style="background:#fff">
                                    <div class="col-lg-12" style="padding-top:10px;">
                                        <div class="card" style="background:#eeeeee">
                                            <div class="media-contant  box-style b-l-s-blue">
                                                <div class="row">
                                                    <div class="col-lg-9 ">
                                                        <h5> Footer Slider - <span id="footer_counts"></span></h5>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <!-- <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#sliderModal" style="margin-left:10px;" onclick="get_accordian('1');"><i class="icofont icofont-plus"> </i> Add New</button> -->
                                                    </div>
                                                    <div class="col-lg-1 " onclick="get_accordian('1');">
                                                        <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-footerslider1"></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block file_manager grid-container collapse " id="toggle-footerslider1" class="">
                                                <div class="row clearfix">
                                                    <div class="table-responsive" id="get_footerslider">

                                                    </div>
                                                </div>
                                                <!-- <a href="#" id="loadMore">Load More</a> -->
                                            </div>
                                        </div>
                                        <span hidden id="editId"></span>
                                        <span hidden id="StatusType"></span>
                                        <div class="card" style="background:#eeeeee">
                                            <div class="media-contant  box-style b-l-s-blue">
                                                <div class="row">
                                                    <div class="col-lg-9 ">
                                                        <h5>Quick Links - <span id="quicklinks"></span> </h5>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <!-- <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#linkModal" style="margin-left:10px;" onclick="get_accordian('2');"><i class="icofont icofont-plus"> </i> Add New</button> -->
                                                    </div>
                                                    <div class="col-lg-1 " onclick="get_accordian('2');">
                                                        <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-quicklinks2"></i>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-block file_manager grid-container collapse " id="toggle-quicklinks2" class="">
                                                <div class="row clearfix">
                                                    <div class="table-responsive" id="get_quicklinks">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card" style="background:#eeeeee">
                                            <div class="media-contant  box-style b-l-s-blue">
                                                <div class="row">
                                                    <div class="col-lg-9 ">
                                                        <h5> Useful Links - <span id="usefullinks"></span> </h5>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <!-- <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#linkModal" style="margin-left:10px;" onclick="get_accordian('3');"><i class="icofont icofont-plus"> </i> Add New</button> -->
                                                    </div>
                                                    <div class="col-lg-1" onclick="get_accordian('3');">
                                                        <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-usefullinks3"></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block file_manager grid-container collapse" id="toggle-usefullinks3" class="">
                                                <div class="row clearfix scroll-content">
                                                    <div id="get_usefullinks">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="sliderModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add Footer Slider</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>
                    <span hidden id="imagestatus"></span>

                    <form id="slider-form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label for="email1"><span class="addFile"> </span> - width:340 and height:160<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" id="selectedmedia" name="file" onclick="addFiles();" placeholder="Choose images" required data-parsley-trigger="change">
                                    <span hidden id="selectedmediaid"></span>
                                </div>

                                <div class="form-group " id="fileDiv">
                                    <label for="email1"><span class="addTitle"></span> <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" maxlength="20" placeholder="Enter Title" id="footerslidertitle" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-specialcharacter>
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                                <div class="form-group">
                                    <label for="email1"><span class="addURl"></span></label>
                                    <input type="text" class="form-control input-sm" id="footersliderlink" placeholder="Enter URL" name="link" data-parsley-trigger="change" data-parsley-type="url">
                                </div>
                                <br />
                                <div id="preview">

                                </div>
                                <!-- <label for="email1" style="color:#40c4ff">Add More File <i class="fa fa-plus" onclick="addmorefile();"></i></label> -->
                            </div>

                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success" onclick="add_footerslider();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animated fade modal-popout-bg" id="editsliderModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Footer Slider</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>

                    <span hidden id="editget_foldername"></span>
                    <form id="editslider-form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email1"><span class="editFile"> </span> - width:340 and height:160<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" id="editselectedmedia" name="file" onclick="editFiles();" placeholder="Choose images" required data-parsley-trigger="change">
                                    <span hidden id="editselectedmediaid"></span>
                                </div>
                                <div class="form-group " id="editfileDiv">
                                    <label for="email1"><span class="editTitle"></span> <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" maxlength="20" placeholder="Enter Title" id="editfooterslidertitle" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-specialcharacter>
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                                <div class="form-group">
                                    <label for="email1"><span class="editURl"></span></label>
                                    <input type="text" class="form-control input-sm" id="editfootersliderlink" placeholder="Enter URL" name="link" data-parsley-trigger="change">
                                </div>
                                <br />
                                <div id="editpreview">

                                </div>
                                <!-- <label for="email1" style="color:#40c4ff">Add More File <i class="fa fa-plus" onclick="addmorefile();"></i></label> -->
                            </div>

                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success" onclick="edit_footerslider();">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->

    <!-- Add Modal popup Start-->

    <div class="modal animated fade modal-popout-bg" id="linkModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h2 class="text-center"><span class="modalHeader"></span></h2>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">

                    <span hidden id="footer_type"></span>
                    <span hidden id="set_operation"></span>
                    <form id="footerlink_form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title"><span class="addTitle"></span><span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" name="title" id="footertitle" placeholder="Enter Title" required="" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="email1"><span class="addURl"></span></label>
                                    <input type="text" class="form-control input-sm" id="footerlink" placeholder="Enter URL" name="link" data-parsley-trigger="change" data-parsley-type="url">
                                </div>

                                <!-- <label for="email1" style="color:#40c4ff">Add More File <i class="fa fa-plus" onclick="addmorefile();"></i></label> -->
                            </div>

                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success" onclick="add_implinks();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fade modal-popout-bg" id="editlinkModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h2 class="text-center"><span class="editmodalHeader"></span></h2>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="editfooter_type"></span>
                    <form id="editfooterlink_form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title"><span class="editTitle"></span><span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" name="title" id="editfootertitle" placeholder="Enter Title" required="" data-parsley-trigger="change">
                                    <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="email1"><span class="editURl"></span></label>
                                    <input type="text" class="form-control input-sm" id="editfooterlink" placeholder="Enter URL" name="link" data-parsley-trigger="change">
                                </div>

                                <!-- <label for="email1" style="color:#40c4ff">Add More File <i class="fa fa-plus" onclick="addmorefile();"></i></label> -->
                            </div>

                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success" onclick="edit_implinks();">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->
    <!-- Edit Modal popup Start-->

    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        var label = {
            "en_label": {
                "useful_header": "Add Useful Links",
                "quick_header": "Add Quick Links",
                "footer_header": "Add Footer Slider",
                "edit_useful_Header": "Edit Useful Links",
                "edit_quick_Header": "Edit Quick Links",
                "edit_footer_Header": "Edit Footer Slider",
                "title": 'Title',
                "file": "File (JPG,JPEG)",
                "lang": "en",
                "url": "Link"
            },

        }
        $(document).ready(function() {
            get_accordian('3');
        });

        function addnew(lang, type, links_id) {
            // cur_tab =  lang;
            lang_status = lang;

            $('#row_docid').text(links_id);
            if (type == 'usefullinks' || type == 'quicklinks') {

                if (type == 'usefullinks') {

                    $('.modalHeader').text(label.en_label.useful_header);

                } else {
                    $('.modalHeader').text(label.en_label.quick_header);

                }
                $('.addTitle').text(label.en_label.title);
                $('.addFile').text(label.en_label.file);
                $('.addURl').text(label.en_label.url);
                $('.addDate').text(label.en_label.date);


            } else {


                $('.modalHeader').text(label.en_label.footer_header);
                $('.editModalHeader').text(label.en_label.edit_footer_header);
                $('.addTitle').text(label.en_label.title);
                $('.addFile').text(label.en_label.file);
                $('.addURl').text(label.en_label.url);
                $('.addDate').text(label.en_label.date);


            }

        }

        function get_accordian(i) {

            // toggle collapse
            // $('.example  tr').css('display', 'table-row');
            // $('.example th, .example td').css('display', 'table-cell');

            var type, accept;
            if (i == 1) {
                type = 'footerslider';

                //  table.columns.adjust().draw();
            } else if (i == 2) {
                type = 'quicklinks';
                $('#linkHeading').text('Quick Links');
                // table.columns.adjust().draw();
            } else if (i == 3) {
                type = 'usefullinks';
                $('#linkHeading').text('Useful Links');
            }
            // alert(type);
            $("#toggle-" + type + i + "").collapse('toggle');
            $('#footer_type').val(type);
            //   alert("#toggle-" +cur_tab+"-"+ type +  + i + "");
            //   toggle-footerslider
            // $('#singleinput_file').html('<label for="email1">File<span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="ad_file" accept="' + accept + '" name="file" data-parsley-trigger="change">');
            // $('#multipleinput_file').html(' <label for="email1">File<span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="multi_file" accept="' + accept + '" multiple name="file[]" required="" data-parsley-trigger="change" />');
            get_records(type);

        }

        function get_records(type) {
            // alert(type);
            var status = $('#sltgetstatus').val();

            data = {
                type: type,
            }
            // console.log(data);
            // return false;
            $.ajax({
                type: 'POST',
                url: 'webservice/get_importantlinks.php',
                data: data,
                success: function(response, textStatus, xhr) {

                    console.log(response);

                    $('#get_' + type + '').html(response);
                   
                    table.columns.adjust().draw();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error ", "Please try again", "error");

                }
            });
        }

        function editBtn(edittype, id, foldername) {
            var editId, editTitle, editDate, editFilename, tblLink;
            // console.log(language);

            var editLabel = {
                "en_label": {
                    "useful_Header": "Edit Useful Links",
                    "quick_Header": "Edit Quick Links",
                    "footer_Header": "Edit Footer Slider",
                    "title": "Edit Title",
                    "date": "Edit Date",
                    "file": "Edit File",
                    "url": "Edit Link"
                },


            }
            if (edittype == 'usefullinks' || edittype == 'quicklinks') {

                if (edittype == 'usefullinks') {
                    $('.editmodalHeader').text(editLabel.en_label.useful_Header);
                } else {
                    $('.editmodalHeader').text(editLabel.en_label.quick_Header);
                }
                $('.editTitle').text(editLabel.en_label.title);
                $('.editFile').text(editLabel.en_label.file);
                $('#editDate').text(editLabel.en_label.date);
                $('.editURl').text(editLabel.en_label.date);

            } else {

                $('.editmodalHeader').text(editLabel.en_label.footer_Header);
                $('.editTitle').text(editLabel.en_label.title);
                $('.editFile').text(editLabel.en_label.file);
                $('#editDate').text(editLabel.en_label.date);
                $('.editURl').text(editLabel.en_label.url);


                $('#get_foldername').text(foldername);

            }
            // console.log(editTitle, editDate, editFilename, tblLink);
            // edit Modal popup
            // $('#editId').text(id);
            // $('#StatusType').text(datatype);
            // $('#editTxtTitle').val(editTitle);
            // $('#editad_file').text(tblFileName);
            // $('#editTxtDate').val(editDate);
            // $('#editTxtlink').val(tblLink);

            var editdata = {
                doc_id: id,
                pagename: edittype,
                operation: 'get_edit'
            }

            $.ajax({
                url: "webservice/add_importantlinks.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: editdata,
                success: function(data) {

                    if (data.status == 'ok') {
                        if (data.type == 'usefullinks' || data.type == 'quicklinks') {
                            $('#editfootertitle').val(data.result.title);
                            $('#editfooterlink').val(data.result.footer_link);

                        } else {
                            $('#editfooterslidertitle').val(data.result.title);
                            $('#editfootersliderlink').val(data.result.footer_link);
                            $('#editselectedmedia').val(data.result.filename);
                            $('#editselectedmediaid').text(data.result.media_id);
                            editpreview_slider(data.result.filename);
                        }
                        $('#editId').text(data.result['doc_id']);
                        $('#editfooter_type').val(data.type);

                        $('#editen_txtTitle').val(data.result['en_title']);
                        $('#edithi_txtTitle').val(data.result['hi_title']);
                        $('#editta_txtTitle').val(data.result['ta_title']);
                        $('#editselectedmedia').val(data.result['filename']);
                        $('#editshort_title').val(data.result['short_title']);
                        $('#editselectedmediaid').text(data.result['media_id']);
                        $('#editshort_title').attr('required', 'required');


                    } else {
                        swal("Error !", "Please try again", "error");
                    }
                    // $('.text').text(JSON.stringify(data));
                },
                error: function(xhr, status, error) {
                    swal("Error !", "Please try again", "error");
                }

            });
            // Preview Modal popup
            // $('#previewId').text(id);
            // $('#prevTitle').text(editTitle);
            // $('#prevFileName').text(tblFileName);
            // $('#prevDate').text(editDate);
        }

        function addFiles() {
            $('#set_operation').text('save');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#fileDiv').show();
            $('#footerslidertitle').attr('required', 'required');
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
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png') {
                if (get_operation == 'save') {
                    $('#fileDiv').show();
                    $('#selectedmedia').val(media_filename);
                    $('#selectedmediaid').text(media_id);
                    $('#footerslidertitle').val(media_shorttitle);
                    addpreview_slider(media_filename);
                } else {

                    $('#editfileDiv').show();
                    $('#editselectedmedia').val(media_filename);
                    $('#editselectedmediaid').text(media_id);
                    $('#editfooterslidertitle').val(media_shorttitle);
                    editpreview_slider(media_filename);
                }
                $('#uploadmodal').modal('hide');

            } else {
                swal("Error !", "Images Only Allowed", "error");
                get_newmedia();
            }

        }

        var _URL = window.URL || window.webkitURL;

        function addpreview_slider(media_filename) {

            var foldername = $('#get_foldername').text();

            var img = new Image();
            img.src = "uploads/media/" + foldername + '/' + media_filename + '';
            console.log(img);
            // var imgHeight = img.height;
            // var imgWidth = img.width;
            // alert("image height = " + imgHeight + ", image width = " + imgWidth);

            // return false;
            // var file = $(this)[0].files[0];

            // img = new Image();

            var maxwidth = 340;
            var maxheight = 160;

            // img.src = _URL.createObjectURL(file);
            img.onload = function() {
                // imgwidth = this.width;
                // imgheight = this.height;
                var imgwidth = img.width;
                var imgheight = img.height;
                // $("#width").text(imgwidth);
                // $("#height").text(imgheight);

                if (imgwidth == maxwidth && imgheight == maxheight) {
                    toastr.success('You Picked Correct Format');
                    $('#imagestatus').text('success');
                } else {
                    //  toastr.error('Exceed Height and width ! Please Select Correct Format 340*160');
                    swal("Error :Exceed Height and width!", "Please try again", "error");
                    $('#imagestatus').text('failed');
                    // return false;
                }
                $('#preview').empty().append('<img src=' + img.src + ' id="prev_img" width="340px" height="160px"> <br/>Width:' + imgwidth + '</span><br/>Height:' + imgheight + '</span>');
                $('#preview').show();
            }
        }

        function editpreview_slider(media_filename) {

            var foldername = $('#get_foldername').text();

            var img = new Image();
            img.src = "uploads/media/" + foldername + '/' + media_filename + '';
            // var imgHeight = img.height;
            // var imgWidth = img.width;
            // alert("image height = " + imgHeight + ", image width = " + imgWidth);

            // return false;
            // var file = $(this)[0].files[0];

            // img = new Image();

            var maxwidth = 340;
            var maxheight = 160;

            // img.src = _URL.createObjectURL(file);
            img.onload = function() {
                // imgwidth = this.width;
                // imgheight = this.height;
                var imgwidth = img.width;
                var imgheight = img.height;
                // $("#width").text(imgwidth);
                // $("#height").text(imgheight);
                if (imgwidth <= maxwidth && imgheight <= maxheight) {
                    toastr.success('You Picked Correct Format');
                    $('#imagestatus').text('success');
                } else {
                    //  toastr.error('Exceed Height and width ! Please Select Correct Format 340*160');
                    swal("Error :Exceed Height and width!", "Please try again", "error");
                    $('#imagestatus').text('failed');
                    // return false;
                }
                $('#editpreview').empty().append('<img src=' + img.src + ' id="prev_img" width="340px" height="160px"> <br/>Width:' + imgwidth + '</span><br/>Height:' + imgheight + '</span>');
                $('#editpreview').show();
            }
        }

        function add_implinks() {

            // return false;
            if ($('#footerlink_form').parsley().validate() != true) {
                return false;

            } else {

                var footertitle, footerlink, lang, language, mas_docid;
                footertitle = $.trim($('#footertitle').val());
                footerlink = $('#footerlink').val();
                footertype = $('#footer_type').val();
                var mas_docid = $('#row_docid').text();
                if (lang_status == 'en') {
                    mas_docid = '';
                } else {
                    mas_docid = JSON.parse(mas_docid)
                }
                if (footerlink == '') {
                    footerlink = '#';
                }
                var data = {
                    title: footertitle,
                    footerlink: footerlink,
                    mas_id: mas_docid,
                    pagename: footertype,
                    operation: 'link_save'
                }
                console.log(data);

                $.ajax({
                    url: "webservice/add_importantlinks.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    // beforeSend: function() {
                    //     $('#subLang').attr("disabled", "disabled");
                    //     // $('.wrapper').css("opacity", ".5");
                    // },
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        if (data.status == 'ok') {

                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Created", "success")
                            // });

                            $('#footertitle').val('');
                            $('#footerlink').val('');
                            $('#linkModal').modal('hide');
                            get_records(footertype);
                            // $('.wrapper').css("opacity", "0");
                            // $("#data-table-basic").dataTable().fnReloadAjax();
                        } else {

                            swal("Error !", "Please try again", "error");
                            // $('.wrapper').css("opacity", ".5");
                        }

                        // $('.text').text(JSON.stringify(data));
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error !", "Please try again", "error");
                    }

                });
            }

            // console.log();
        }

        function add_footerslider() {

            // return false;
            if ($('#slider-form').parsley().validate() != true) {
                return false;

            } else {
                var img_status = $('#imagestatus').text();
                if (img_status == 'success') {
                    var footertitle, footerlink, filename, short_title, media_id, footertype;
                    short_title = $.trim($('#footerslidertitle').val());
                    footerlink = $('#footersliderlink').val();
                    filename = $('#selectedmedia').val();
                    media_id = $('#selectedmediaid').text();
                    footertype = $('#footer_type').val();
                    var mas_docid = $('#row_docid').text();
                    if (lang_status == 'en') {
                        mas_docid = '';
                    } else {
                        mas_docid = JSON.parse(mas_docid)
                    }
                    if (footerlink == '') {
                        footerlink = '#';
                    }

                    var data = {
                        title: short_title,
                        footerlink: footerlink,
                        filename: filename,
                        media_id: media_id,
                        mas_id: mas_docid,
                        pagename: footertype,
                        operation: 'footer_save'
                    }
                    // console.log(data);
                    // return false;
                    $.ajax({
                        url: "webservice/add_importantlinks.php",
                        type: "POST",
                        dataType: 'json',
                        data: data,
                        // beforeSend: function() {
                        //     $('#subLang').attr("disabled", "disabled");
                        //     // $('.wrapper').css("opacity", ".5");
                        // },
                        success: function(data) {
                            // console.log(data);
                            // return false;
                            if (data.status == 'ok') {

                                //Success Message
                                //  $('#sa-success').on('click', function() {
                                swal('', "Successfully Created", "success")
                                // });

                                $('#footerslidertitle').val('');
                                $('#footersliderlink').val('');
                                $('#selectedmedia').val('');
                                $('#preview').hide();
                                $('#sliderModal').modal('hide');
                                get_records(footertype);
                                // $('.wrapper').css("opacity", "0");
                                // $("#data-table-basic").dataTable().fnReloadAjax();
                            } else {

                                swal("Error !", "Please try again", "error");
                                // $('.wrapper').css("opacity", ".5");
                            }

                            // $('.text').text(JSON.stringify(data));
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error !", "Please try again", "error");
                        }

                    });
                } else {
                    swal("Error : Exceed Height and width!", "Please try again", "error");
                }
            }

            // console.log();
        }

        function edit_implinks() {

            // return false;
            if ($('#editfooterlink_form').parsley().validate() != true) {
                return false;

            } else {

                var editfootertitle, editfooterlink, edit_id, lang, language, mas_docid, editfootertype;
                editfootertitle = $.trim($('#editfootertitle').val());
                editfooterlink = $('#editfooterlink').val();
                editfootertype = $('#editfooter_type').val();
                edit_id = $('#editId').text();
                if (editfooterlink == '') {
                    editfooterlink = '#';
                }
                var data = {
                    title: editfootertitle,
                    footerlink: editfooterlink,
                    doc_id: JSON.parse(edit_id),
                    pagename: editfootertype,
                    operation: 'link_edit'
                }
                console.log(data);

                $.ajax({
                    url: "webservice/add_importantlinks.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    // beforeSend: function() {
                    //     $('#subLang').attr("disabled", "disabled");
                    //     // $('.wrapper').css("opacity", ".5");
                    // },
                    success: function(data) {

                        if (data.status == 'ok') {

                            //Success Message
                            //  $('#sa-success').on('click', function() {
                            swal('', "Successfully Updated", "success")
                            // });

                            $('#editfootertitle').val('');
                            $('#editfooterlink').val('');
                            $('#editlinkModal').modal('hide');
                            get_records(editfootertype);
                            // $('.wrapper').css("opacity", "0");
                            // $("#data-table-basic").dataTable().fnReloadAjax();
                        } else {

                            swal("Error !", "Please try again", "error");
                            // $('.wrapper').css("opacity", ".5");
                        }

                        // $('.text').text(JSON.stringify(data));
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error !", "Please try again", "error");
                    }

                });
            }

            // console.log();
        }

        function edit_footerslider() {

            // return false;
            if ($('#editslider-form').parsley().validate() != true) {
                return false;

            } else {
                var img_status = $('#imagestatus').text();
                if (img_status == 'success') {
                    var editfootertitle, editfooterlink, editfilename, editshort_title, editmedia_id, editfootertype, edit_id;
                    editshort_title = $.trim($('#editfooterslidertitle').val());
                    editfooterlink = $('#editfootersliderlink').val();
                    editfilename = $('#editselectedmedia').val();
                    editmedia_id = $('#editselectedmediaid').text();
                    editfootertype = $('#editfooter_type').val();
                    edit_id = $('#editId').text();
                    if (editfooterlink == '') {
                        editfooterlink = '#';
                    }

                    var data = {
                        title: editshort_title,
                        footerlink: editfooterlink,
                        filename: editfilename,
                        media_id: editmedia_id,
                        doc_id: edit_id,
                        pagename: editfootertype,
                        operation: 'footerslider_edit'
                    }

                    $.ajax({
                        url: "webservice/add_importantlinks.php",
                        type: "POST",
                        dataType: 'json',
                        data: data,
                        // beforeSend: function() {
                        //     $('#subLang').attr("disabled", "disabled");
                        //     // $('.wrapper').css("opacity", ".5");
                        // },
                        success: function(data) {

                            if (data.status == 'ok') {

                                //Success Message
                                //  $('#sa-success').on('click', function() {
                                swal('', "Successfully Updated", "success")
                                // });

                                $('#editfooterslidertitle').val('');
                                $('#editfootersliderlink').val('');
                                $('#editselectedmedia').val('');
                                $('#editpreview').hide();
                                $('#editsliderModal').modal('hide');
                                get_records(editfootertype);
                                // $('.wrapper').css("opacity", "0");
                                // $("#data-table-basic").dataTable().fnReloadAjax();
                            } else {

                                swal("Error !", "Please try again", "error");
                                // $('.wrapper').css("opacity", ".5");
                            }

                            // $('.text').text(JSON.stringify(data));
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error !", "Please try again", "error");
                        }

                    });
                } else {
                    swal("Error : Exceed Height and width!", "Please try again", "error");
                }
            }

            // console.log();
        }

        function status_change(id, status, pagename) {

            // var language = $('#getLang').text();
            //  console.log(language);
            //   return false;
            var status_text;
            if (status == 'L') {
                status_text = 'Publish';
            } else if (status == 'D') {
                status_text = 'Delete';
            } else if (status == 'A') {
                status_text = 'Archive';
            }
            var data = {
                status: status,
                doc_id: id,
                pagename: pagename,
                operation:'status_change'
            }
            // console.log(data);
            // return false;
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
                }).then((result) => {
                if (result.value) {
                        $.ajax({
                            url: "webservice/add_importantlinks.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {

                                if (data.status == 'ok') {
                                    $('#tblStatus' + pagename + id + '').append(status);
                                    swal("Done!", "It was succesfully " + status_text + "!", "success");

                                   
                                    get_records(pagename);
                                } else {
                                    swal("Error :" + status_text + "!", "Please try again", "error");

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error :" + status_text + "!", "Please try again", "error");
                            }


                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                }
            );

        }
    </script>
</body>

</html>