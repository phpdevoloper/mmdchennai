<?php include("include/db_connection.php");
include 'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Scrolling Text</title>


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
                                    <h4>Scrolling Text</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Portal Content</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Scrolling Text</li>
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
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal" onclick="addNew();">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-12" style="text-align:right">
                                    <label for="cars">Choose Status :</label>
                                </div>
                                <div class="col-lg-4 col-sm-12" style="padding-left:2px;">
                                    <div class="form-group">
                                        <select class="custom-select2 form-control" id="slt_status" style="width: 100%" onchange="get_records();">
                                            <option value="">All</option>
                                            <option value="L">Published</option>
                                            <option value="A">Archived</option>
                                            <option value="D">Deleted</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="getrecords">
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
                                <h3 class="text-center"><span id="modalHeader"></span></h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_scrollid"></span>
                    <form id="demo-form" data-parsley-validate="">
                        <div class="form-group limited-length">
                            <label for="title"><span class="addTitle"> </span><span class="mandatory"> *</span></label>
                            <input type="text" class="form-control input-sm inputlength" id="txtTitle" name="title" maxlength="500" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-trigger="keyup change keypress">

                            <div class="pull-right" style="font-weight:500"><span class="counter"></span><span class="max-length"></span></div>
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>



                        <!-- <div class="form-group">
                            <label for="title"> Scrolling Start & End <span class="mandatory"> *</span></label>
                            <div class="input-daterange input-group " id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" id="start_date" readonly required="" data-parsley-trigger=" change" />
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" name="end" id="end_date" readonly required="" data-parsley-trigger=" change " />
                            </div>
                           
                        </div> -->


                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-2">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="fileCheck" onclick="showFile();" name="checkbox" required="" data-parsley-trigger="keyup change keypress" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="linkCheck" name="checkbox" onchange="showLink();" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label>No Need <input type="checkbox" class="" id="notneedCheck" name="checkbox" onchange="notneed('save');" /> <i></i> </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" id="fileDiv">
                                <div class="form-group">
                                    <label for="email1">Selected media :</label>
                                    <span hidden id="selectedmediaid"></span>
                                    <span id="selectedmedia"></span>
                                    <!--  <input type="file" class="form-control input-sm" id="ad_file" accept="application/pdf" name="file" data-parsley-trigger="change"> -->
                                </div>
                                
                            </div>
                            <!-- <div class="col-lg-1" style="padding-top:30px;">
                            <b> or </b>
                             </div> -->
                            <div class="col-lg-12" id="linkDiv">
                                <div class="form-group limited-length">
                                    <label for="email1"><span class="addURl"> </span><span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm inputlength" id="add_link" maxlength="100" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="change">
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success subLang" onclick="add_scrolling_text(this.value);">Submit</button>
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
                                <h3 class="text-center"><span id="editModalHeader"></span></h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>

                    <span hidden id="editId"></span>
                    <span hidden id="StatusType"></span>
                    <span hidden id="set_operation"></span>
                </div>

                <div class="modal-body" style="padding-top:10px;">
                    <form id="editdemo-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="title"><span id="editTitle"> </span><span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" name="title" maxlength="500" data-parsley-length="[2, 500]" id="editTxtTitle" placeholder="Enter Title" required="">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>

                        <!-- <div class="form-group">
                            <label for="title"> Edit Start & End Date<span class="mandatory"> *</span></label>
                            <div class="input-daterange input-group date" id="datepicker">
                                <input type="text" class="input-sm form-control" name="edit_start" id="editstart_date" required="" data-parsley-trigger="change" />
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" name="edit_end" id="editend_date" required="" data-parsley-trigger="change" />
                            </div>
                           
                        </div> -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-2">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="editfileCheck" onclick="editshowFile();" name="checkbox" required="" data-parsley-trigger="change" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="editlinkCheck" name="checkbox" onchange="editshowLink();" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="fm-checkbox form-group">
                                        <label>No Need <input type="checkbox" class="" id="editnotneedcheck" name="checkbox" onchange="notneed('edit');" /> <i></i> </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" id="editfileDiv">
                                <div class="form-group">
                                    <label for="email1">Selected media :</label>
                                    <span hidden id="editselectedmediaid"></span>
                                    <span id="editselectedmedia"></span>
                                    <!--  <input type="file" class="form-control input-sm" id="ad_file" accept="application/pdf" name="file" data-parsley-trigger="change"> -->
                                </div>
                                
                            </div>
                            <!-- <div class="col-lg-1" style="padding-top:30px;">
                            <b> or </b>
                             </div> -->
                            <div class="col-lg-12" id="editlinkDiv">
                                <div class="form-group">
                                    <label for="email1"><span class="addURl"> </span><span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" id="edit_link" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="keyup change keypress">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success  subLang" onclick="edit_publications(this.value);" class="">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>

    <script>
        var label = {
            "en_label": {
                "header": "Scrolling Text",
                "editHeader": "Edit Scrolling Text",
                "title": 'Title',
                "date": "Dated On",
                "file": "File (PDF only)",
                "lang": "en",
                "url": "Link"
            },
        }

        $(document).ready(function() {
            get_records();
            $('#fileDiv').hide();
            $('#linkDiv').hide();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            // $('#start_date').datepicker({
            //     language: 'en',
            //     autoClose: true,
            //     dateFormat: 'dd-mm-yyyy',
            //     setDate:today
            // });
            // $('#end_date').datepicker({
            //     autoClose: true,
            //     dateFormat: 'dd-mm-yyyy',
            //     setDate:today
            // });
            // $('#editstart_date').datepicker({
            //     autoClose: true,
            //     dateFormat: 'dd-mm-yyyy',
            //     setDate:today
            // });
            // $('#editend_date').datepicker({
            //     autoClose: true,
            //     dateFormat: 'dd-mm-yyyy',
            //     setDate:today
            // });
            // currDate = $('#start_date').datepicker('setDate', today);
            // currDate = $('#end_date').datepicker('setDate', today);
            // $('#editstart_date').datepicker('setDate', today);
            // $('#editend_date').datepicker('setDate', today);
        });

        function get_records() {

            var cur_lang = $('#getLang').text();
            var status = $('#slt_status').val();

            data = {
                status: status,
                page_name: 'scrolling_text'
            }


            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",    
                url: 'webservice/get_scrolling_text.php',
                data: data,
                success: function(response, textStatus, xhr) {

                    console.log(response);
                    // return false;
                    //  statusAppend();
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

        function addNew() {

            // return false;

            $('#row_scrollid').text();

            $('#modalHeader').text(label.en_label.header);
            $('#editModalHeader').text(label.en_label.header);
            $('.addTitle').text(label.en_label.title);
            $('.addFile').text(label.en_label.file);
            $('.addURl').text(label.en_label.url);
            $('.addDate').text(label.en_label.date);

        }

        function editBtn(id, editlang) {
            // console.log(id,editlang);
            // return false;
            language = $('#getLang').text();
            // console.log(language, datatype);
            $('.subLang').val(editlang);
            // return false;
            var editId, editTitle, editDate, editFilename, tblLink;
            // console.log(language);
            var editLabel = {
                "en_label": {
                    "header": "Edit Scrolling Text",
                    "preview": "Preview Scrolling Text",
                    "title": "Edit Title",
                    "date": "Edit Date",
                    "file": "Edit File Name",
                    "url": "Edit Link"
                },
                "hi_label": {
                    "header": "प्रेस विज्ञप्ति संपादित करें (Edit Scrolling Text)",
                    "preview": "पूर्वावलोकन प्रेस विज्ञप्ति (Preview Scrolling Text)",
                    "title": "शीर्षक संपादित करें (Edit Title)",
                    "date": "संपादन की तारीख (Edit Date)",
                    "file": " फ़ाइल का नाम संपादित करें (Edit File Name)",
                    "url": "लिंक संपादित करें (Edit Link)"
                },
                "ta_label": {
                    "header": "பத்திரிகை வெளியீட்டைத் திருத்தவும் (Edit Scrolling Text)",
                    "preview": "முன்னோட்டம் பத்திரிகை வெளியீடு (Preview Scrolling Text)",
                    "title": "தலைப்பைத் திருத்து (Edit Title)",
                    "date": "தேதியைத் திருத்தவும்(Edit Date)",
                    "file": "கோப்பு பெயரைத் திருத்தவும்(Edit File Name)",
                    "url": "இணைப்பைத் திருத்தவும் (Edit Link)"
                }

            }


            if (language == 'en') {

                $('#editModalHeader').text(editLabel.en_label.header);
                $('#previewModalHeader').text(editLabel.en_label.preview);
                $('#editTitle').text(editLabel.en_label.title);
                $('#editFile').text(editLabel.en_label.file);
                $('#editDate').text(editLabel.en_label.date);

                $('#editLink').text(editLabel.en_label.date);

                $('.addTitle').text(label.en_label.title);
                $('.addFile').text(label.en_label.file);
                $('.addDate').text(label.en_label.date);
                // append the data

                editTitle = $('#tblEnTitle' + id + '').text();
                editDate = $('#tblEnDate' + id + '').text();
                tblFileName = $('#tblEnFileName' + id + '').text();
                tblLink = $('#tblEnLink' + id + '').text();

            } else if (language == 'hi') {
                $('#modalHeader').text(editLabel.hi_label.header);
                $('#editModalHeader').text(editLabel.hi_label.header);
                $('#previewModalHeader').text(editLabel.hi_label.preview);
                $('#editTitle').text(editLabel.hi_label.title);
                $('#editFile').text(editLabel.hi_label.file);
                $('#editDate').text(editLabel.hi_label.date);
                $('#editLink').text(editLabel.hi_label.url);

                $('.addTitle').text(label.hi_label.title);
                $('.addFile').text(label.hi_label.file);
                $('.addDate').text(label.hi_label.date);

                editTitle = $('#tblHiTitle' + id + '').text();
                editDate = $('#tblHiDate' + id + '').text();
                tblFileName = $('#tblHiFileName' + id + '').text();
                tblLink = $('#tblHiLink' + id + '').text();

                // $('#subLang').val(label.hi_label.lang);
            } else {
                $('#modalHeader').text(editLabel.ta_label.header);
                $('#editModalHeader').text(editLabel.ta_label.header);
                $('#previewModalHeader').text(editLabel.ta_label.preview);
                $('#editTitle').text(editLabel.ta_label.title);
                $('#editFile').text(editLabel.ta_label.file);
                $('#editDate').text(editLabel.ta_label.date);
                $('#editLink').text(editLabel.ta_label.url);

                $('.addTitle').text(label.ta_label.title);
                $('.addFile').text(label.ta_label.file);
                $('.addDate').text(label.ta_label.date);

                editTitle = $('#tblTaTitle' + id + '').text();
                editDate = $('#tblTaDate' + id + '').text();
                tblFileName = $('#tblTaFileName' + id + '').text();
                tblLink = $('#tblTaLink' + id + '').text();
                // $('#subLang').val(label.ta_label.lang);s
            }

            //  console.log(editTitle, editDate, editFilename, tblLink);

            var datavalue = {
                scroll_id: JSON.parse(id),
                pagename: 'scrolling_text',
                lang: editlang,
                operation: 'get_edit'
            }
            // console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_scrolling_text.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    // return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['scroll_id']);
                        $('#StatusType').text();
                        $('#editTxtTitle').val(data.result['title']);
                        if (data.result['ad_link'] != '') {

                            $('#editlinkCheck').prop('checked', true);
                            $('#editfileCheck').prop('checked', false);
                            $('#edit_link').attr('required', 'required');

                            $('#editlinkDiv').show();
                            $('#editfileDiv').hide();
                            $('#edit_link').val(data.result['ad_link']);
                        } else if (data.result['media_id'] == '' && data.result['ad_link'] == '') {
                            $('#editlinkCheck').prop('checked', false);
                            $('#editfileCheck').prop('checked', false);
                            $('#editnotneedcheck').prop('checked', true);
                            $('#edit_link').removeAttr('required');

                            $('#editlinkDiv').hide();
                            $('#editfileDiv').hide();

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
                        $('#editslt_page').val(data.result['page_id']).trigger('change');
                        $('#editstart_date').val(data.result['start_dt']);
                        $('#editend_date').val(data.result['end_date']);

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


            // Preview Modal popup
            $('#previewId').text(id);
            $('#prevTitle').text(editTitle);
            $('#prevFileName').text(tblFileName);
            $('#prevDate').text(editDate);
        }

        function editBtn(id, editlang) {
            // console.log(id,editlang);
            // return false;
            language = $('#getLang').text();
            // console.log(language, datatype);
            $('.subLang').val(editlang);
            // return false;
            var editId, editTitle, editDate, editFilename, tblLink;
            // console.log(language);
            var editLabel = {
                "en_label": {
                    "header": "Edit Scrolling Text",
                    "preview": "Preview Scrolling Text",
                    "title": "Edit Title",
                    "date": "Edit Date",
                    "file": "Edit File Name",
                    "url": "Edit Link"
                },
                "hi_label": {
                    "header": "प्रेस विज्ञप्ति संपादित करें (Edit Scrolling Text)",
                    "preview": "पूर्वावलोकन प्रेस विज्ञप्ति (Preview Scrolling Text)",
                    "title": "शीर्षक संपादित करें (Edit Title)",
                    "date": "संपादन की तारीख (Edit Date)",
                    "file": " फ़ाइल का नाम संपादित करें (Edit File Name)",
                    "url": "लिंक संपादित करें (Edit Link)"
                },
                "ta_label": {
                    "header": "பத்திரிகை வெளியீட்டைத் திருத்தவும் (Edit Scrolling Text)",
                    "preview": "முன்னோட்டம் பத்திரிகை வெளியீடு (Preview Scrolling Text)",
                    "title": "தலைப்பைத் திருத்து (Edit Title)",
                    "date": "தேதியைத் திருத்தவும்(Edit Date)",
                    "file": "கோப்பு பெயரைத் திருத்தவும்(Edit File Name)",
                    "url": "இணைப்பைத் திருத்தவும் (Edit Link)"
                }

            }


            if (language == 'en') {

                $('#editModalHeader').text(editLabel.en_label.header);
                $('#previewModalHeader').text(editLabel.en_label.preview);
                $('#editTitle').text(editLabel.en_label.title);
                $('#editFile').text(editLabel.en_label.file);
                $('#editDate').text(editLabel.en_label.date);

                $('#editLink').text(editLabel.en_label.date);

                $('.addTitle').text(label.en_label.title);
                $('.addFile').text(label.en_label.file);
                $('.addDate').text(label.en_label.date);
                // append the data

                editTitle = $('#tblEnTitle' + id + '').text();
                editDate = $('#tblEnDate' + id + '').text();
                tblFileName = $('#tblEnFileName' + id + '').text();
                tblLink = $('#tblEnLink' + id + '').text();

            } else if (language == 'hi') {
                $('#modalHeader').text(editLabel.hi_label.header);
                $('#editModalHeader').text(editLabel.hi_label.header);
                $('#previewModalHeader').text(editLabel.hi_label.preview);
                $('#editTitle').text(editLabel.hi_label.title);
                $('#editFile').text(editLabel.hi_label.file);
                $('#editDate').text(editLabel.hi_label.date);
                $('#editLink').text(editLabel.hi_label.url);

                $('.addTitle').text(label.hi_label.title);
                $('.addFile').text(label.hi_label.file);
                $('.addDate').text(label.hi_label.date);

                editTitle = $('#tblHiTitle' + id + '').text();
                editDate = $('#tblHiDate' + id + '').text();
                tblFileName = $('#tblHiFileName' + id + '').text();
                tblLink = $('#tblHiLink' + id + '').text();

                // $('#subLang').val(label.hi_label.lang);
            } else {
                $('#modalHeader').text(editLabel.ta_label.header);
                $('#editModalHeader').text(editLabel.ta_label.header);
                $('#previewModalHeader').text(editLabel.ta_label.preview);
                $('#editTitle').text(editLabel.ta_label.title);
                $('#editFile').text(editLabel.ta_label.file);
                $('#editDate').text(editLabel.ta_label.date);
                $('#editLink').text(editLabel.ta_label.url);

                $('.addTitle').text(label.ta_label.title);
                $('.addFile').text(label.ta_label.file);
                $('.addDate').text(label.ta_label.date);

                editTitle = $('#tblTaTitle' + id + '').text();
                editDate = $('#tblTaDate' + id + '').text();
                tblFileName = $('#tblTaFileName' + id + '').text();
                tblLink = $('#tblTaLink' + id + '').text();
                // $('#subLang').val(label.ta_label.lang);s
            }

            //  console.log(editTitle, editDate, editFilename, tblLink);

            var datavalue = {
                scroll_id: JSON.parse(id),
                pagename: 'scrolling_text',
                lang: editlang,
                operation: 'get_edit'
            }
            // console.log(datavalue);
            //   return false;
            $.ajax({
                url: "webservice/add_scrolling_text.php",
                type: "POST",
                // contentType: 'application/json; charset=utf-8;',
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
                    console.log(data);
                    //    var get_data=  $.parseJSON(data.result);
                    // return false;
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['scroll_id']);
                        $('#StatusType').text();
                        $('#editTxtTitle').val(data.result['title']);
                        if (data.result['ad_link'] != '') {

                            $('#editlinkCheck').prop('checked', true);
                            $('#editfileCheck').prop('checked', false);
                            $('#edit_link').attr('required', 'required');

                            $('#editlinkDiv').show();
                            $('#editfileDiv').hide();
                            $('#edit_link').val(data.result['ad_link']);
                        } else if (data.result['media_id'] == '' && data.result['ad_link'] == '') {
                            $('#editlinkCheck').prop('checked', false);
                            $('#editfileCheck').prop('checked', false);
                            $('#editnotneedcheck').prop('checked', true);
                            $('#edit_link').removeAttr('required');

                            $('#editlinkDiv').hide();
                            $('#editfileDiv').hide();

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
                        $('#editslt_page').val(data.result['page_id']).trigger('change');
                        $('#editstart_date').val(data.result['start_dt']);
                        $('#editend_date').val(data.result['end_date']);

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


            // Preview Modal popup
            $('#previewId').text(id);
            $('#prevTitle').text(editTitle);
            $('#prevFileName').text(tblFileName);
            $('#prevDate').text(editDate);
        }
        $('input[type="checkbox"]').click(function() {
            $('input[type="checkbox"]').not(this).prop('checked', false);
        });

        function showFile() {
            $('#set_operation').text('save');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#uploadmodal').modal('show');

        }

        function notneed(value) {
            if (value == 'save') {

                $('#selectedmedia').text('');
                $('#selectedmediaid').val('');
                $('#linkDiv').hide();
                $('#fileDiv').hide();
                $("#fileCheck").prop('checked', false);
                $("#linkCheck").prop('checked', false);
                $('#add_link').removeAttr('required');

            } else {
                $('#editselectedmedia').text('');
                $('#editselectedmediaid').val('');
                $('#editlinkDiv').hide();
                $('#editfileDiv').hide();
                $("#editfileCheck").prop('checked', false);
                $("#editlinkCheck").prop('checked', false);
                $('#editadd_link').removeAttr('required');
            }
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
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'pdf') {
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

        function add_scrolling_text(value) {


            if ($('#demo-form').parsley().validate() != true) {
                return false;

            } else {
                var title, end_date, start_date, filename, mediaid, link, page_id, short_title,

                    title = $('#txtTitle').val();
                // start_date = $('#start_date').val();
                // end_date = $('#end_date').val();

                var mas_scrollid = $('#row_scrollid').text();
                // if (value == 'en') {
                //     mas_scrollid = '';
                // } else {
                //     mas_scrollid = JSON.parse(mas_scrollid)
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
                    // start_date: start_date,
                    // end_date: end_date,
                    filename: filename,
                    mediaid: mediaid,
                    link: link,
                    short_title: short_title,
                    operation: 'save',
                    pagename: 'scrolling_text',
                    mas_id: mas_scrollid
                }
                console.log(data);

                $.ajax({
                    url: "webservice/add_scrolling_text.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);

                        if (data.status == 'ok') {
                            get_records();

                            swal('', "Successfully Created", "success");
                            $('#txtTitle').val('');
                            $('#ad_file').val('');
                            $('#addModal').modal('hide');

                        } else {
                            swal("Error !", "Please try again", "error");
                        }
                    },

                });
            }
        }

        function edit_publications(value) {

            if ($('#editdemo-form').parsley().validate() != true) {
                return false;

            } else {
                var title, end_date, start_date, filename, mediaid, link, short_title,
                    title = $('#editTxtTitle').val();
                // start_date = $('#editstart_date').val();
                // end_date = $('#editend_date').val();


                var scrollid = $('#editId').text();
                scrollid = JSON.parse(scrollid);
                if ($("#editfileCheck").is(':checked')) {
                    link = ""
                    filename = $('#editselectedmedia').text();
                    mediaid = $('#editselectedmediaid').text();
                    short_title = $('#editshort_title').val();
                } else if ($("#editnotneedcheck").is(':checked')) {
                    link = ""
                    filename = '';
                    mediaid = '';

                } else {
                    filename = '';
                    mediaid = ''
                    link = $('#edit_link').val();
                    short_title = '';
                }

                var data = {
                    title: title,
                    // start_date: start_date,
                    // end_date: end_date,
                    filename: filename,
                    mediaid: mediaid,
                    link: link,
                    short_title: short_title,
                    operation: 'edit',
                    pagename: 'scrolling_text',
                    mas_id: scrollid
                }

                $.ajax({
                    url: "webservice/add_scrolling_text.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        //return false;
                        if (data.status == 'ok') {
                            get_records();
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

        function status_change(id, status) {

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
                scrollid: id,
                operation: 'status_change'
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
                        url: "webservice/add_scrolling_text.php",
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        success: function(data) {

                            if (data.status == 'ok') {
                                swal("Done!", "It was succesfully " + status_text + "!", "success");
                                get_records();
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
            });

        }
    </script>
</body>

</html>