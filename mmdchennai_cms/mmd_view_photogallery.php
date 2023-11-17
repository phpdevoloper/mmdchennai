<?php include("include/db_connection.php");
include 'include/session.php';
$pagename = 'public_information';
  
$images_query ="SELECT * FROM mmd_photogallery where mas_doc_id='".$_SESSION['gallery_id']."' and status='L' order by uploaded_on desc";
$result_images = pg_query($db, $images_query);
$count_images = pg_fetch_all($result_images);

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
                            <label for="title">File (Images)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="addFiles();" id="selectedmedia" name="info_image" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
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
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success subLang" onclick="add_gallery(this.value);">Submit</button>
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
        $(document).ready(function() {
            get_slider();
            $('#fileDiv').hide();
            // $('#linkDiv').hide();
        });

        function get_slider() {
            var status = $('#sltgetstatus').val();

            data = {
                status: status
            }
            $.ajax({
                type: 'POST',
                // contentType: "application/json",
                // dataType: "json",
                url: 'webservice/get_gallery.php',
                data: data,
                success: function(response, textStatus, xhr) {
                    console.log(response);
                    $("#get_records").html(response);
                    // table = $('.data-table').DataTable();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error !", "Please try again", "error");

                }
            });
        }
        function addFiles() {
            $('#set_operation').text('save_photo');
            get_newmedia();
            $('#uploadmodal').modal('show');
            // $('#fileDiv').show();
            $('#short_title').attr('required', 'required');
        }
        
        function get_mediavalue(media_filename, media_shorttitle, media_id) {
            var checkedValue = $('.subject-list:checked').val();
            var get_operation = $('#set_operation').text();
          
            var ext = media_filename.split('.').pop();
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'mp4' || ext == 'mp3') {
                if (get_operation == 'save_photo') {
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
        function add_gallery(value) {
            if ($('#demo-form').parsley().validate() != true) {
                return false;

            } else {
                var title, filename, mediaid, link, short_title,
                    title = $('#txtTitle').val();
                filename = $('#selectedmedia').val();
                mediaid = $('#selectedmediaid').text();
                short_title = $('#short_title').val();
                var data = {
                    title: title,
                    filename: filename,
                    mediaid: mediaid,
                    short_title: short_title,
                    operation: 'save_photo',
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_gallery.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                     
                        // return false;
                        if (data.status == 'notvalid') {
                            swal("Error !", "File Extension Not Valid", "error");
                        } else if (data.status == 'ok') {
                            swal('', "Successfully Created", "success")
                            $('#txtTitle').val('');
                            $('#selectedmedia').val('');
                            $('#short_title').val('');
                            $('#addModal').modal('hide');
                            get_slider();

                        } else {
                            swal("Error !", "Please try again", "error");
                        }
                    },

                });
            }
        }

        // function editbtn(media_id, title) {
        //     $('#media_id').text(media_id);
        //     $('#edittxtTitle').val(title);
        // }

        // function edit_media() {
        //     if ($('#editmedia-form').parsley().validate() != true) {
        //         return false;

        //     } else {
        //         var edittitle, editmedia_id;
        //         edittitle = $.trim($('#edittxtTitle').val());
        //         editmedia_id = JSON.parse($('#media_id').text());
        //         console.log(edittitle,editmedia_id);
        //         var editdata = {
        //             title: edittitle,
        //             media_id: editmedia_id,
        //             operation: 'edit_category'
        //         }

        //         $.ajax({
        //             url: "webservice/add_gallery.php",
        //             type: 'post',
        //             data: editdata,
        //             dataType: 'json',

        //             success: function(data) {

        //                 if (data.status = "ok") {
                            
        //                     swal('', "Successfully Created", "success");
        //                     $('#editmediaModal').modal('hide');
        //                     get_records();

        //                 } else {

        //                     swal("Error :Publish!", "Please try again", "error");
        //                 }
        //             },

        //         });
        //     }
        // }

    </script>

</body>

</html>