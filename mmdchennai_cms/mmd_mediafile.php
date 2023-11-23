<?php
include 'include/db_connection.php';
include 'include/session.php';
$images_query =
    "select * from mst_media where status='L' and file_extension in ('jpeg','jpg','gif','png') order by uploaded_on desc";

$result_images = pg_query($db, $images_query);
$count_images = pg_num_rows($result_images);
$folder_id = $_SESSION['mediafolder_id'];
$foldername = $_SESSION['media_foldername'];
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Media File</title>


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
                                    <h4>Media File</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="mmd_media.php">Media</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Media File</li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <div class="col-lg-12 text-center" style="border-radius:0px;padding-bottom:0px;">
                                <h2 style="color:#111"><?php echo $foldername; ?></h2>
                            </div>
                            <div class="col-lg-12">
                                <div class="row" style="background:#fff">
                                    <div class="col-lg-12" style="padding-top:10px;">
                                        <span hidden id="myInput"></span>
                                        <div id="accordion">

                                            <div class="card" style="background:#eeeeee">
                                                <div class=" card-header media-contant  box-style b-l-s-pink">
                                                    <div class="row">
                                                        <div class="col-lg-9 ">
                                                            <h5> Videos / Audios (Mp4) - <span id="video_counts"></span> </h5>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button class="btn btn-primary pull-left" role="button" data-toggle="modal" data-target="#addmediaModal" style="margin-left:10px;" onclick="get_accordian('1');"><i class="fa fa-plus"> </i> Add New</button>
                                                        </div>
                                                        <div class="col-lg-1 " onclick="get_accordian('1');">
                                                            <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-example1"></i>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-block file_manager grid-container collapse " id="toggle-example1">
                                                    <div class="table-responsive" id="get_recordsvideos">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" style="background:#eeeeee">
                                                <div class=" card-header media-contant  box-style b-l-s-pink">
                                                    <div class="row">
                                                        <div class="col-lg-9 ">
                                                            <h5> Documents (pdf) - <span id="documents_counts"></span> </h5>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button class="btn btn-primary pull-left" role="button" data-toggle="modal" data-target="#addmediaModal" style="margin-left:10px;" onclick="get_accordian('2');"><i class="fa fa-plus"> </i> Add New</button>
                                                        </div>
                                                        <div class="col-lg-1 " onclick="get_accordian('2');">
                                                            <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-example2"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-block file_manager grid-container collapse " id="toggle-example2">
                                                    <div class="row clearfix">
                                                        <div class="table-responsive" id="get_recordsdocuments">

                                                        </div>
                                                    </div>
                                                    <!-- <a  rel="noopener" href="#" id="loadMore">Load More</a> -->
                                                </div>

                                            </div>

                                            <div class="card" style="background:#eeeeee">
                                                <div class="card-header media-contant  box-style b-l-s-pink">
                                                    <div class="row">
                                                        <div class="col-lg-9 ">
                                                            <h5> Images (jpeg / jpg / gif / png) - <span id="images_counts"></span> </h5>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button class="btn btn-primary pull-left" role="button" data-toggle="modal" data-target="#addmediaModal" style="margin-left:10px;" onclick="get_accordian('3');"><i class="fa fa-plus"> </i> Add New</button>
                                                        </div>
                                                        <div class="col-lg-1" onclick="get_accordian('3');">
                                                            <i class=" fa fa-chevron-down " data-toggle="collapse" data-target="#toggle-example3"></i>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-block file_manager grid-container collapse" id="toggle-example3">
                                                    <div class="row clearfix scroll-content">

                                                        <div id="get_recordsimages" class="file_images">

                                                        </div>

                                                    </div>
                                                    <!-- <a  rel="noopener" href="#" id="loadMore">Load More</a> -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal animated fade modal-popout-bg" id="addmediaModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add New File</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>

                    <div class="col-lg-12">
                        <div class="row">
                            <!-- <div class="col-lg-4" style="padding-top:10px;">
								<label>Document Type<span class="mandatory">*</span> </label>
							</div> -->
                            <div class="col-lg-6">
                                <div class="fm-checkbox form-group">
                                    <label> Single File Upload <input type="checkbox" class="" id="fileCheck" onclick="showFile();" name="checkbox" required="" data-parsley-trigger="change" data-parsley-group="block1" data-parsley-mincheck="1" /> <i></i> </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fm-checkbox form-group">
                                    <label>Multiple file Upload <input type="checkbox" class="" id="linkCheck" name="checkbox" onchange="showLink();" /> <i></i> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="demo-form" data-parsley-validate="">
                        <div clas="row" id="fileDiv">
                            <div class="form-group">
                                <label for="title">Short Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[3,100]" required data-parsley-checkmediatitle='' data-parsley-trigger="keyup change keypress">
                                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            </div>
                            <!-- <div class="form-group">
                                <label for="title">Alternative Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="alt_title" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                              
                            </div> -->

                            <!-- <div class="col-lg-12"> -->
                            <div class="form-group" id="singleinput_file">

                            </div>
                            <!-- </div> -->
                        </div>
                    </form>
                    <form id="multiple_form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12" id="linkDiv">
                                <div class="form-group" id="multipleinput_file">

                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_media(this.value);" id="media_type">Submit</button>
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
    <!-- js -->
    <?php include 'include/sourcelink_js.php'; ?>

    <script>
        var table;
        var type, accept;
        var folder_id = <?php echo $folder_id; ?>;
        $(document).ready(function() {
            // $('#fileDiv').hide();
            $('#linkDiv').hide();
            $(".select2").select2();
            $("#fileCheck").prop('checked', true);
            //  get_records('images');
            get_accordian('3');
            // table = $('.example').DataTable({
            //     scrollY: 300,
            //     "responsive": true,
            //     paging: false
            // });
            // table.columns.adjust().draw();
            // var table1 = $('.example1').DataTable({
            //     scrollY: 300,
            //     "responsive": true,
            //     paging: false
            // });

            // $('.example1').css('display', 'block');
            // table.columns.adjust().draw();
            //  jQuery('.example1').wrap('<div class="dataTables_scroll" />');
            $(".accordion-title").click(function(e) {
                var accordionitem = $(this).attr("data-tab");
                $("#" + accordionitem).slideToggle().parent().siblings().find(".accordion-content").slideUp();

                $(this).toggleClass("active-title");
                $("#" + accordionitem).parent().siblings().find(".accordion-title").removeClass("active-title");

                $("i.fa-chevron-down", this).toggleClass("chevron-top");
                $("#" + accordionitem).parent().siblings().find(".accordion-title i.fa-chevron-down").removeClass("chevron-top");
            });

        });
        $('.js-accordion-title').on('click', function() {

            $(this).next().slideToggle(200);

            $(this).toggleClass('open', 200);
        });

        function addNew(lang, docid) {
            console.log(lang, docid);
            // return false;
            $('#subLang').val(lang);
            $('#row_docid').text(docid);


        }


        function get_accordian(i) {

            $("#toggle-example" + i + "").collapse('toggle'); // toggle collapse



            if (i == 1) {
                type = 'videos';
                accept = '.mp4,.mp3'

            } else if (i == 2) {
                type = 'documents';
                accept = '.pdf'

            } else if (i == 3) {
                type = 'images';
                accept = '.png, .jpg, .jpeg ,.gif'
            }
            // alert(type);
            $('#media_type').val(type);
            $('#singleinput_file').empty().append('<label for="email1">File (Maximum size 5MB)<span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="ad_file" data-parsley-max-file-size="5120" data-parsley-trigger="keyup change keypress" accept="' + accept + '" name="file" required>');
            $('#multipleinput_file').empty().append(' <label for="email1">File (Maximum size 5MB) <span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="multi_file" accept="' + accept + '" data-parsley-max-file-size="5120" data-parsley-trigger="keyup change keypress"  multiple name="file[]" required=""  />');
            get_records(type);

        }

        function showFile() {
            $('#fileDiv').show();
            $('#linkDiv').hide();

            $("#linkCheck").prop('checked', false);
            $('#add_link').removeAttr('required');
            $('#ad_file').attr('required', 'required');

            var checked = $("input[type=checkbox]:checked").length;
            if (checked == 0) {
                $("#fileCheck").prop('checked', true);
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
                $("#linkCheck").prop('checked', true);
            }

            exactSize = 0;
            ad_files = "";
        }

        function get_records(type) {

            var status = $('#sltgetstatus').val();

            data = {
                type: type
            }
            $.ajax({
                type: 'POST',
                url: 'webservice/get_mediagallery.php',
                data: data,
                success: function(response, textStatus, xhr) {

                    console.log(response);

                    $('#get_records' + type + '').html(response);
                    table.columns.adjust().draw();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error :Archive!", "Please try again", "error");

                }
            });
        }

        function add_media(value) {

            if ($("#fileCheck").is(':checked')) {

                if ($('#demo-form').parsley().validate() != true) {
                    return false;

                } else {

                    var title, alt_title, end_date, cand_path, description, ad_desc, link, lang;
                    title = $('#txtTitle').val();

                    alt_title = $('#alt_title').val();

                    form_data = new FormData();

                    ad_filepath = $('#ad_file').prop("files")[0];
                    form_data.append("file", ad_filepath);

                    // var filesize = $('#ad_file')[0].files[0].size;
                    form_data.append('title', title);
                    form_data.append('alt_title', alt_title);
                    form_data.append('folder_id', folder_id);
                    form_data.append('doc_type', value);
                    form_data.append('operation', 'save');
                    form_data.append('type', 'single');
                    data = form_data;

                    $.ajax({
                        url: "webservice/add_media.php",
                        type: "POST",
                        data: form_data,
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {

                            if (data.status == 'ok') {
                                get_records(value);

                                swal('', "Successfully Created", "success")

                                $('#txtTitle').val('');
                                $('#alt_title').val('');
                                $('#ad_file').val('');
                                $('#addmediaModal').modal('hide');

                            } else {

                                swal("Error :Publish!", "Please try again", "error");

                            }


                        },

                    });
                }
            } else {
                if ($('#multiple_form').parsley().validate() != true) {
                    return false;

                } else {

                    var form_data_new = new FormData();

                    // Read selected files
                    var totalfiles = document.getElementById('multi_file').files.length;
                    for (var index = 0; index < totalfiles; index++) {
                        form_data_new.append("files[]", document.getElementById('multi_file').files[index]);
                    }
                    var myfiles = document.getElementById("multi_file");
                    var files = myfiles.files;
                    var form_data = new FormData();

                    for (i = 0; i < files.length; i++) {
                        form_data.append('multiple_upload' + i, files[i]);
                    }
                    form_data_new.append('folder_id', folder_id);
                    form_data_new.append('doc_type', value);
                    form_data_new.append('type', 'multiple');
                    form_data_new.append('operation', 'save');

                    $.ajax({
                        url: "webservice/add_media.php",
                        type: 'post',
                        data: form_data_new,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data) {

                            if (data.status == "ok") {
                                get_records(value);
                                //Success Message
                                //  $('#sa-success').on('click', function() {
                                swal('', "Successfully Created", "success")
                                // });

                                $('#txtTitle').val('');
                                $('#ad_file').val('');
                                $('#addmediaModal').modal('hide');
                                // $("#data-table-basic").dataTable().fnReloadAjax();
                            } else {

                                swal("Error !", "Please try again", "error");
                            }

                            // $('.text').text(JSON.stringify(data));
                        },

                    });


                }

            }

            // console.log();
        }


        function editbtn(media_id, title) {

            $('#media_id').text(media_id);
            $('#edittxtTitle').val(title);

        }

        function copy_clip(copy_clip) {
            CopyToClipboard(copy_clip);

        }

        function CopyToClipboard(value, showNotification, notificationText) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();

            if (typeof showNotification === 'undefined') {
                showNotification = true;
            }
            if (typeof notificationText === 'undefined') {
                notificationText = "Copied to clipboard";
            }

            var notificationTag = $("div.copy-notification");
            if (showNotification && notificationTag.length == 0) {
                notificationTag = $("<div/>", {
                    "class": "copy-notification",
                    text: notificationText
                });
                $("body").append(notificationTag);

                notificationTag.fadeIn("slow", function() {
                    setTimeout(function() {
                        notificationTag.fadeOut("slow", function() {
                            notificationTag.remove();
                        });
                    }, 1000);
                });
            }
        }

        function edit_media() {
            if ($('#editmedia-form').parsley().validate() != true) {
                return false;

            } else {
                var edittitle, editmedia_id;
                edittitle = $.trim($('#edittxtTitle').val());
                editmedia_id = JSON.parse($('#media_id').text());
                var editdata = {
                    title: edittitle,
                    media_id: editmedia_id,
                    operation: 'edit_media'
                }

                $.ajax({
                    url: "webservice/add_media.php",
                    type: 'post',
                    data: editdata,
                    dataType: 'json',

                    success: function(data) {

                        if (data.status = "ok") {
                            get_records(type);

                            swal('', "Successfully Created", "success")

                            $('#editmediaModal').modal('hide');

                        } else {

                            swal("Error :Publish!", "Please try again", "error");
                        }
                    },

                });
            }
        }

        function deletebtn(media_id) {
            var data = {
                media_id: media_id,
                operation: 'delete_media'
            }

            // swal({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     type: 'warning',
            //     showCancelButton: true,
            //     confirmButtonClass: 'btn btn-success',
            //     cancelButtonClass: 'btn btn-danger',
            //     confirmButtonText: 'Yes, it!',
            //     cancelButtonText: "No, cancel!",
            //     closeOnConfirm: false,
            //     closeOnCancel: false
            // }).then(function(isConfirm) {
            //     if (isConfirm) {
            //         $.ajax({
            //             url: "webservice/add_media.php",
            //             type: "POST",
            //             data: data,
            //             dataType: "JSON",
            //             success: function(data) {
            //                 console.log(data);
            //                 if (data.status == 'ok') {
            //                     // $('#tblStatus' + id + '').append(status);
            //                     swal("Done!", "It was succesfully Deleted !", "success");

            //                     // statusAppend();
            //                     get_records(type);
            //                 } else {
            //                     swal("Error !", "Please try again", "error");

            //                 }
            //             },
            //             error: function(xhr, ajaxOptions, thrownError) {
            //                 swal("Error !", "Please try again", "error");
            //             }

            //         });
            //     } else {
            //         swal("Cancelled", "Your imaginary file is safe :)", "error");
            //     }

            // })
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "webservice/add_media.php",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'ok') {
                                    // $('#tblStatus' + id + '').append(status);
                                    swal("Done!", "It was succesfully Deleted !", "success");

                                    // statusAppend();
                                    get_records(type);
                                } else {
                                    swal("Error !", "Please try again", "error");

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error !", "Please try again", "error");
                            }


                        });
                    } else if (result.dismiss === 'cancel') {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                })

        }
    </script>
</body>

</html>