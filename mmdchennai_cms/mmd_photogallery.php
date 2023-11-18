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

    .col-lg-4{
        margin-bottom: 30px;
    }
    .gallery-box{
        text-align: center;
        box-shadow: 7px 3px 10px 10px #ab9d9d;
        padding:20px;
    }
    .gallery-box a img{
        /* padding: 10px 10px; */
        height: 250px;
        width: 350px;
    }
    /* .gallery-box .mediaimg{
        opacity: 0;
    }
    .gallery-box:hover .mediaimg {
        opacity: 1;
    }
    .info-box h5{
        padding: 5px 5px;
    } */

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
                            <div class="container">   
                                <div class="row">
                                <?php 
                                foreach ($count_images as $cate) {
                                    $media_id = $cate['media_id'];
                                    $get_file = "select me.foldername,ms.filesize,ms.alt_filename as filename  from mst_media ms 
                                            inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                                            where ms.media_id = $media_id";
                                    $result_media = pg_query($db, $get_file);
                                    $row_media = pg_fetch_array($result_media);
                                ?>
                                    <div class="col-lg-4">
                                        <div class="gallery-box">
                                            <button type="button" class="btn btn-icon btn-warning" title="copy to clipboard" onclick="copy_clip('<?Php echo $copy_clip ?>');">
                                                <i class="fa fa-copy"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-success" title="Edit Here" data-toggle="modal" data-target="#editModal" onclick="editbtn(<?Php echo $cate['doc_id'] ?>,'<?php echo $cate['title'] ?>');">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-danger" title="Delete Here" onclick="deletebtn(<?Php echo $cate['doc_id'] ?>);">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a href="#" class="info-box" onclick="redirect_url_front_gal(<?Php echo $cate['doc_id'] ?>)">
                                                <img src="uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>" class="custom-gallery" alt="">
                                                <h5><?php echo $cate['title'];?></h5>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
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
                                <h3 class="text-center">Add Category</h3>
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
                            <label for="title"><span id="editTitle">Title</span><span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" name="title" maxlength="500" data-parsley-length="[2, 500]" id="editen_txtTitle" placeholder="Enter Title" required="">
                        </div>
                        <div class="form-group ">
                            <label for="title">File (Images)<span class="mandatory"> * </span></label>
                            <input type="text" class="form-control input-sm inputlength" onclick="editFiles();" id="editselectedmedia" name="info_image" readonly maxlength="100" placeholder="Select Image" required="" data-parsley-trigger="keyup change keypress">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success  subLang" onclick="edit_gallery(this.value);" class="">Update</button>
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
            // get_slider();
            $('#fileDiv').hide();
            // $('#linkDiv').hide();
        });
        function editbtn(id) {
            var datavalue = {
                doc_id: JSON.parse(id),
                operation: 'get_edit'
            }
            $.ajax({
                url: "webservice/add_gallery.php",
                type: "POST",
                dataType: 'JSON',
                data: datavalue,
                success: function(data) {
         
                    if (data.status == 'ok') {

                        $('#editId').text(data.result['doc_id']);
                        $('#editen_txtTitle').val(data.result['title']);
                        $('#editselectedmedia').val(data.result['filename']);
                        $('#editshort_title').val(data.result['short_title']);
                        $('#editselectedmediaid').text(data.result['media_id']);
                        $('#editshort_title').attr('required', 'required');


                    } else {
                        swal("Error !", "Please try again", "error");
                    }
                },
                error: function(xhr, status, error) {
                    swal("Error !", "Please try again", "error");
                }

            });

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
                    operation: 'save',
                }
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
        function edit_gallery(value) {
            if ($('#editdemo-form').parsley().validate() != true) {
                return false;

            } else {
                var edittitle, editfilename, editmediaid, editshort_title, editId;
                edittitle = $('#editen_txtTitle').val();

                editfilename = $('#editselectedmedia').val();
                editmediaid = $('#editselectedmediaid').text();
                editshort_title = $('#editshort_title').val();
                editId = $('#editId').text();
                console.log(editId);
                var data = {
                    title: edittitle,
                    filename: editfilename,
                    mediaid: editmediaid,
                    short_title: editshort_title,
                    doc_id: JSON.parse(editId),
                    operation: 'edit',
                }

                $.ajax({
                    url: "webservice/add_gallery.php",
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        if (data.status == 'ok') {
                            swal('', "Successfully Updated", "success") 
                            $('#editen_txtTitle').val('');
                            $('#edithi_txtTitle').val('');
                            $('#edithi_txtTitle').val('');
                            $('#editselectedmedia').val('');
                            $('#editshort_title').val('');
                            $('#editModal').modal('hide');
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
        function redirect_url_front_gal(id) {
            var data = {
                id: id,
                //lang: currentLang,
                // pagename: 'gallery',
                // get_pagename: pagename
            }

            $.ajax({
                url: "webservice/gallery_session.php",
                type: 'POST',
                dataType: 'json',
                data: data
            }).done(function(res) {

                if (res.valid == true) {
                        document.location.href = 'mmd_view_photogallery.php';
                }
            });
        }

    </script>

</body>

</html>