<?php include("include/db_connection.php");
include 'include/session.php';
$pagename = 'public_information';

$images_query ="SELECT * FROM mst_photogallery where status='L' order by uploaded_on desc";
$result_images = pg_query($db, $images_query);
$count_images = pg_fetch_all($result_images);
// var_dump($count_images);die;
// $folder_id = $_SESSION['mediafolder_id'];
// $foldername = $_SESSION['media_foldername'];

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Forms</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include "include/sourcelink_css.php" ?>
    <style>

    .gallery-box{
        text-align: center;
    box-shadow: 7px 3px 10px 10px #ab9d9d;
    }
    .gallery-box a img{
        padding: 10px 10px;
    }
    .gallery-box .mediaimg{
        opacity: 0;
    }
    .gallery-box:hover .mediaimg {
        opacity: 1;
    }
    .info-box h5{
        padding: 5px 5px;
    }

    </style>

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
                                    <h4>Photo Gallery</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                       
                        <div class="pd-20">
                         <div class="row">
                            <div class="col-lg-4">
                                <div class="gallery-box">
                                    <div class="mediaimg pull-right">
                                        <button type="button" class="btn btn-icon btn-warning" title="copy to clipboard" onclick="copy_clip('<?Php echo $copy_clip ?>');">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-success" title="Edit Here" data-toggle="modal" data-target="#editmediaModal" onclick="editbtn(<?Php echo $row['media_id'] ?>,'<?php echo $row['title'] ?>');">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-danger" title="Delete Here" onclick="deletebtn(<?Php echo $row['media_id'] ?>);">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    <a href="" class="info-box">
                                        <img src="https://i.redd.it/a90376enwvg91.jpg" alt="">
                                        <h5>Testing</h5>
                                    </a>
                                </div>
                            </div>
                         </div>
                            <!-- <div class="gallery sets">
                                <a class="all Bollywood"><img src="https://iili.io/y7W4t4.md.webp"/>
                                        <p>Image 1<br>more Text ...</p>
                                </a>

                                <a class="all Bollywood"><img src="https://i.redd.it/a90376enwvg91.jpg"/></a>

                                <a class="all Bollywood"><img src="https://iili.io/y7waOg.md.jpg"/></a>
                                
                                <a class="all Bollywood"><img src="https://iili.io/y7WrNf.webp"/></a>
                                
                                <a class="all Hollywood"><img src="https://i.redd.it/wh6hbexev2v91.jpg"/></a>
                                
                                <a class="all Hollywood"><img src="https://i.redd.it/4b6s83hss9p91.jpg"/></a>
                                
                                <a class="all tv"><img src="https://i.redd.it/2s7w09k01ol91.jpg"/></a>
                                <a class="all tv"><img src="https://i.redd.it/2s7w09k01ol91.jpg"/></a>
                                <a class="all tv"><img src="https://i.redd.it/2s7w09k01ol91.jpg"/></a>
                                
                            </div> -->

                            <!-- <div id="getrecords">

                            </div> -->
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
                                <h3 class="text-center">Add Information</h3>
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
                            <input type="text" class="form-control input-sm inputlength" id="txtTitle" name="title" maxlength="500" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-trigger="keyup change keypress">

                            <div class="pull-right" style="font-weight:500"><span class="counter"></span><span class="max-length"></span></div>
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                        </div>
                        <div class="form-group ">
                            <label for="title">File (Images and Video)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="addImages();" id="SelectedmediaImage" name="info_image" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            <span hidden id="SelectedmediaImageid"></span>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="fileCheck" onclick="showFile();" name="checkbox" required="" data-parsley-trigger="keyup change keypress" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="linkCheck" name="checkbox" onchange="showLink();" /> <i></i> </label>
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
                                    <label for="email1">Link<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm inputlength" id="add_link" maxlength="100" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="change">
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success subLang" onclick="add_info(this.value);">Submit</button>
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
                                <h3 class="text-center">Edit Forms</h3>
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
                        </div>
                        <div class="form-group ">
                            <label for="title">File (Images and Video)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="editImage();" id="edmediaImage" name="info_image" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
                            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            <span hidden id="edmediaImageid"></span>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4" style="padding-top:10px;">
                                    <label>Document Type<span class="mandatory">*</span> </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fm-checkbox form-group">
                                        <label> File <input type="checkbox" class="" id="editfileCheck" onclick="editshowFile();" name="checkbox" required="" data-parsley-trigger="change" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fm-checkbox form-group">
                                        <label>Link <input type="checkbox" class="" id="editlinkCheck" name="checkbox" onchange="editshowLink();" /> <i></i> </label>
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
                                </div>
                                <div class="form-group limited-textarea">
                                    <label for="email1">Short Title <span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm textarea" maxlength="20" id="editshort_title" data-parsley-length="[2, 20]" data-parsley-trigger="keyup change keypress" data-parsley-checktitle>
                                    <div class="pull-right" style="font-weight:500"><span class="counter"></span></span><span class="max-length"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="editlinkDiv">
                                <div class="form-group">
                                    <label for="email1">Edit Link<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control input-sm" id="edit_link" name="url" placeholder="Enter Link" data-parsley-type="url" data-parsley-trigger="keyup change keypress">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success  subLang" onclick="edit_info(this.value);" class="">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animated fade modal-popout-bg" id="editmediaModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Media</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="media_id"></span>


                    <form id="editmedia-form" data-parsley-validate="">
                        <div clas="row" id="fileDiv">
                            <div class="form-group">
                                <label for="title">Edit Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="edittxtTitle" name="title" placeholder="Enter Title" required="" ddata-parsley-length="[3,100]" required data-parsley-checkmediatitle='' data-parsley-trigger="keyup change keypress">
                                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            </div>
                            <!-- <div class="form-group">
                                <label for="title">Alternative Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="alt_title" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                              
                            </div> -->


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="edit_media();">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
        
    
        // function add_info(value) {
        //     if ($('#demo-form').parsley().validate() != true) {
        //         return false;

        //     } else {
        //         var title, end_date, start_date, info_image,filename, mediaimgid,mediaid, link, page_id, short_title;

        //         title = $('#txtTitle').val();
        //         var mas_docid = $('#row_docid').text();
        //         info_image = $('#SelectedmediaImage').val();
        //         mediaimgid = $('#SelectedmediaImageid').text();

        //         if ($("#fileCheck").is(':checked')) {
        //             link = ""
        //             filename = $('#selectedmedia').text();
        //             mediaid = $('#selectedmediaid').text();
        //             short_title = $('#short_title').val();
        //         } else {
        //             filename = '';
        //             mediaid = ''
        //             link = $('#add_link').val();
        //             short_title = '';
        //         }

        //         var data = {
        //             title: title,
        //             info_image : info_image,
        //             filename: filename,
        //             mediaid: mediaid,
        //             mediaimgid:mediaimgid,
        //             link: link,
        //             short_title: short_title,
        //             operation: 'save',
        //             pagename: '<?Php echo $pagename ?>'
        //         }


        //         $.ajax({
        //             url: "webservice/add_info.php",
        //             type: "POST",
        //             dataType: 'json',
        //             data: data,
        //             success: function(data) {
        //                 console.log(data);

        //                 if (data.status == 'ok') {
        //                     get_records();

        //                     swal('', "Successfully Created", "success");
        //                     $('#txtTitle').val('');
        //                     $('#ad_file').val('');
        //                     $('#addModal').modal('hide');

        //                 } else {
        //                     swal("Error !", "Please try again", "error");
        //                 }
        //             },

        //         });
        //     }
        // }
        // function edit_info(value) {
        //     if ($('#editdemo-form').parsley().validate() != true) {
        //         return false;

        //     } else {
        //         var title, end_date, start_date, info_image,filename, mediaimgid,mediaid, link, page_id, short_title;
        //         title = $('#editTxtTitle').val();
        //         info_image = $('#edmediaImage').val();
        //         mediaimgid = $('#edmediaImageid').text();
        
        //         var docid = $('#editId').text();

        //         docid = JSON.parse(docid);
        //         if ($("#editfileCheck").is(':checked')) {
        //             link = ""
        //             filename = $('#editselectedmedia').text();
        //             mediaid = $('#editselectedmediaid').text();
        //             short_title = $('#editshort_title').val();
        //         } else if ($("#editnotneedcheck").is(':checked')) {
        //             link = ""
        //             filename = '';
        //             mediaid = '';

        //         } else {
        //             filename = '';
        //             mediaid = ''
        //             link = $('#edit_link').val();
        //             short_title = '';
        //         }

        //         var data = {
        //             title: title,
        //             // start_date: start_date,
        //             // end_date: end_date,
        //             info_image : info_image,
        //             filename: filename,
        //             mediaid: mediaid,
        //             mediaimgid:mediaimgid,
        //             link: link,
        //             short_title: short_title,
        //             operation: 'edit',
        //             pagename: '<?Php echo $pagename ?>',
        //             mas_id: docid
        //         }

        //         $.ajax({
        //             url: "webservice/add_info.php",
        //             type: "POST",
        //             dataType: 'json',
        //             data: data,
        //             success: function(data) {
              
        //                 if (data.status == 'ok') {
        //                     get_records();
                            
        //                     swal('', "Successfully Created", "success")
        //                     $('#edittxtTitle').val('');
        //                     $('#editad_file').val('');
        //                     $('#editModal').modal('hide');
                        
        //                 } else {
        //                     swal("Error !", "Please try again", "error");
        //                 }

                       
        //             },

        //         });
        //     }
        // }
        // function editBtn(id) {

      
        //     var editId, editTitle, editDate, editFilename, tblLink;
        //     var editLabel = {

        //         "en_label": {
        //             "header": "Edit Scrolling Text",
        //             "preview": "Preview Scrolling Text",
        //             "title": "Edit Title",
        //             "date": "Edit Date",
        //             "file": "Edit File Name",
        //             "url": "Edit Link"
        //         },

        //     }

        //     $('#editModalHeader').text(editLabel.en_label.header);
        //     $('#previewModalHeader').text(editLabel.en_label.preview);
        //     $('#editTitle').text(editLabel.en_label.title);
        //     $('#editFile').text(editLabel.en_label.file);
        //     $('#editDate').text(editLabel.en_label.date);
        //     $('#editLink').text(editLabel.en_label.date);


        //     // append the data

        //     editTitle = $('#tblEnTitle' + id + '').text();
        //     editDate = $('#tblEnDate' + id + '').text();
        //     tblFileName = $('#tblEnFileName' + id + '').text();
        //     tblLink = $('#tblEnLink' + id + '').text();


        //     var datavalue = {
        //         doc_id: JSON.parse(id),
        //         pagename: '<?Php echo $pagename ?>',
        //         operation: 'get_edit'
        //     }

        //     $.ajax({
        //         url: "webservice/add_info.php",
        //         type: "POST",
        //         dataType: 'JSON',
        //         data: datavalue,
        //         success: function(data) {
        //             console.log(data.result['info_image']);
               
        //             if (data.status == 'ok') {

        //                 $('#editId').text(data.result['info_id']);
        //                 $('#StatusType').text();
        //                 $('#editTxtTitle').val(data.result['title']);
        //                 if (data.result['ad_link'] != '') {

        //                     $('#editlinkCheck').prop('checked', true);
        //                     $('#editfileCheck').prop('checked', false);
        //                     $('#edit_link').attr('required', 'required');

        //                     $('#editlinkDiv').show();
        //                     $('#editfileDiv').hide();
        //                     $('#edit_link').val(data.result['ad_link']);
        //                 } else if (data.result['media_id'] == '' && data.result['ad_link'] == '') {
        //                     $('#editlinkCheck').prop('checked', false);
        //                     $('#editfileCheck').prop('checked', false);
        //                     $('#editnotneedcheck').prop('checked', true);
        //                     $('#edit_link').removeAttr('required');

        //                     $('#editlinkDiv').hide();
        //                     $('#editfileDiv').hide();

        //                 } else {
        //                     $('#editfileCheck').prop('checked', true);
        //                     $('#editlinkCheck').prop('checked', false);
        //                     $('#editshort_title').attr('required', 'required');
        //                     $('#editlinkDiv').hide();
        //                     $('#editfileDiv').show();
        //                     $('#editselectedmedia').text(data.result['filename']);
        //                 }
        //                 $('#editshort_title').val(data.result['short_title']);
        //                 $('#editselectedmediaid').text(data.result['media_id']);
        //                 $('#edmediaImage').val(data.result['info_image']);
        //                 $('#edmediaImageid').text(data.result['mediaimgid']);

        //                 $('#editslt_page').val(data.result['page_id']).trigger('change');
        //                 $('#editstart_date').val(data.result['start_dt']);
        //                 $('#editend_date').val(data.result['end_date']);

        //             } else {
        //                 swal("Error !", "Please try again", "error");
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             swal("Error !", "Please try again", "error");
        //         }

        //     });

        //     // edit Modal popup


        //     // Preview Modal popup
        //     $('#previewId').text(id);
        //     $('#prevTitle').text(editTitle);
        //     $('#prevFileName').text(tblFileName);
        //     $('#prevDate').text(editDate);
        // }

       



        // function showFile() {
        //     $('#set_operation').text('save');
        //     get_newmedia();
        //     $('#uploadmodal').modal('show');
        //     // $('#uploadmodal').modal('show');

        // }
        // function showLink() {
        //     $('#selectedmedia').text('');
        //     $('#selectedmediaid').val('');
        //     $('#linkDiv').show();
        //     $('#fileDiv').hide();
        //     $("#fileCheck").prop('checked', false);
        //     $('#short_title').removeAttr('required');
        //     $('#add_link').attr('required', 'required');
        //     var checked = $("input[type=checkbox]:checked").length;
        //     if (checked == 0) {
        //         $("#linkCheck").prop('checked', true);
        //     }

        //     exactSize = 0;
        //     ad_files = "";
        // }

        // function addImages() {
        //     $('#set_operation').text('addInfo');
        //     get_mediaImages();
        //     $('#uploadImage').modal('show');
        //     $('#short_title').attr('required', 'required');
        // }
        // function editImage() {
        //     $('#set_operation').text('addInfo');
        //     get_mediaImages();
        //     $('#uploadImage').modal('show');
        //     // $('#fileDiv').show();
        //     $('#editshort_title').attr('required', 'required');
        // }


        // function get_mediaImages() {   

        //     $.ajax({
        //         type: 'POST',
        //         url: 'webservice/get_modal_newmediaImage.php',
        //         success: function(response, textStatus, xhr) {
        //             $("#get_mediaImage").html(response);

        //         },
        //         complete: function(xhr) {

        //         },
        //         error: function(XMLHttpRequest, textStatus, errorThrown) {
        //             var response = XMLHttpRequest;
        //             swal("Error !", "Please try again", "error");

        //         }
        //     });
        // }

        // function get_mediavalueImages(media_filename, media_shorttitle, media_id) {
        //     var checkedValue = $('.subject-list:checked').val();
        //     var get_operation = $('#set_operation').text();
          
        //     var ext = media_filename.split('.').pop();
        //     if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'mp4' || ext == 'mp3') {
        //         if (get_operation == 'addInfo') {
        //             $('#SelectedmediaImage').val(media_filename);
        //             $('#SelectedmediaImageid').text(media_id);
        //             // $('#short_title').val(media_shorttitle);
        //         } else {

        //             // $('#editfileDiv').show();
        //             $('#editselectedmedia').val(media_filename);
        //             $('#editselectedmediaid').text(media_id);
        //             $('#editshort_title').val(media_shorttitle);
        //         }

        //         $('#uploadImage').modal('hide');
        //     } else {
        //         swal("Error !", "Images and Video Only Allowed", "error");
        //         get_mediaImages();
        //     }
        // }
        // function get_mediavalue(media_filename, media_shorttitle, media_id) {
        //     var checkedValue = $('.subject-list:checked').val();
        //     var get_operation = $('#set_operation').text();
        //     var ext = media_filename.split('.').pop();
        //     if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'pdf') {
        //         if (get_operation == 'save') {
        //             $('#fileDiv').show();
        //             $('#linkDiv').hide();
        //             $('#selectedmedia').text(media_filename);
        //             $('#selectedmediaid').text(media_id);
        //             $('#short_title').val(media_shorttitle);
        //             $("#linkCheck").prop('checked', false);
        //             $('#add_link').removeAttr('required');
        //             $('#short_title').attr('required', 'required');

        //             var checked = $("input[type=checkbox]:checked").length;
        //             if (checked == 0) {
        //                 $("#fileCheck").prop('checked', true);
        //             }

        //         } else {

        //             $('#editfileDiv').show();
        //             $('#editselectedmedia').text(media_filename);
        //             $('#editselectedmediaid').text(media_id);
        //             $('#editshort_title').val(media_shorttitle);
        //             $("#editlinkCheck").prop('checked', false);
        //             $('#edit_link').removeAttr('required');
        //             $('#editshort_title').attr('required', 'required');

        //             var checked = $("input[type=checkbox]:checked").length;
        //             if (checked == 0) {
        //                 $("#editfileCheck").prop('checked', true);
        //             }
        //         }
        //         $('#uploadmodal').modal('hide');

        //     } else {
        //         swal("Error !", "Images and Documents Only Allowed", "error");
        //         get_newmedia();
        //     }

        // }

        function editbtn(media_id, title) {
            $('#media_id').text(media_id);
            $('#edittxtTitle').val(title);
        }

    </script>

</body>

</html>