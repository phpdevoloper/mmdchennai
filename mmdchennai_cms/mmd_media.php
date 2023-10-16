<?php include 'include/db_connection.php';
include 'include/session.php';

// echo $_SESSION['current_user_id'];
// exit;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Media</title>


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
                                    <h4>Media</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Media</li>
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
                            <!-- <div class="container"> -->
                            <div class="col-lg-12" style="padding-top:10px;" id="get_records">

                            </div>

                            <!-- </div>d -->
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fade modal-popout-bg" id="addfileModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12" style="padding-bottom:10px;">
                        <div class="col-lg-2">
                            <img src="vendors/images/logo.gif" alt="MMD Logo" class="pull-right">
                        </div>
                        <div class="col-lg-9" style="padding-top:10px;">
                            <h2 class="text-center">Add Media</h2>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>

                    <div class="col-lg-12">
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
                    <form id="demo-form" data-parsley-validate="">
                        <div clas="row" id="fileDiv">
                            <div class="form-group">
                                <label for="title">Short Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="txtTitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            </div>
                            <!-- <div class="form-group">
                                <label for="title">Alternative Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="alt_title" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 5000]" data-parsley-group="block1" data-parsley-trigger="change">
                              
                            </div> -->

                            <div class="col-lg-12">
                                <div class="form-group" id="singleinput_file">
                                    <label for="email1">File<span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="ad_file" accept=".jpg, .jpeg, .png,.pdf,.doc,.docxvideo/*" name="file" data-parsley-trigger="change">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="multiple_form" data-parsley-validate="">
                        <div class="row">
                            <div class="col-lg-12" id="linkDiv">
                                <div class="form-group" id="multipleinput_file">
                                    <label for="email1">File<span class="mandatory"> *</span></label><input type="file" class="form-control input-sm" id="multi_file" accept=".jpg, .jpeg, .png,.pdf,.doc,.docxvideo/*" multiple name="file[]" required="" data-parsley-trigger="change" />
                                </div>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="add_recruitment();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fade modal-popout-bg" id="addfolderModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Add New Folder</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="row_docid"></span>

                    <form id="folder-form" data-parsley-validate="">
                        <div clas="row">
                            <div class="form-group">
                                <label for="title">Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="txtfolder" name="title" placeholder="Enter Title" required="" data-parsley-length="[3, 100]" data-parsley-checkmediatitle='' data-parsley-trigger="keyup change keypress">
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
                    <button type="button" class="btn btn-success" onclick="add_folder();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animated fade modal-popout-bg" id="editfolderModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit Folder</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="folderid"></span>

                    <form id="editfolder-form" data-parsley-validate="">
                        <div clas="row">
                            <div class="form-group">
                                <label for="title">Edit Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="edittxtfolder" name="title" placeholder="Enter Title" required="" data-parsley-length="[3, 100]" data-parsley-checkmediatitle='' data-parsley-trigger="keyup change keypress">
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
                    <button type="button" class="btn btn-success" onclick="update_folder();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animated fade modal-popout-bg" id="editfileModal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="vendors/images/logo.gif" alt="MMD Logo">
                            </div>
                            <div class="col-lg-9">
                                <h3 class="text-center">Edit File</h3>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding-top:10px;">
                    <span hidden id="media_id"></span>
                    <form id="editfile-form" data-parsley-validate="">
                        <div clas="row">
                            <div class="form-group">
                                <label for="title">Edit Title<span class="mandatory"> *</span></label>
                                <input type="text" class="form-control" id="editfiletitle" name="title" placeholder="Enter Title" required="" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
                                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
                            </div>
                            <div class="form-group">
                                <label for="title">Edit Alternative Title</label>
                                <input type="text" class="form-control" id="editfilealt" name="title" placeholder="Enter alt Title" data-parsley-length="[2, 500]" data-parsley-group="block1" data-parsley-trigger="change">
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
                    <button type="button" class="btn btn-success" onclick="update_file();">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php include 'include/sourcelink_js.php'; ?>
    <script>
        $(document).ready(function() {
            get_records();
            // Grid or list selection
            $('#btn-list').on('click', function() {
                $('#main-folders').addClass('flex-column');
                $('#btn-grid').removeClass('active')
                $(this).addClass('active')
            });
            $('#btn-grid').on('click', function() {
                $('#main-folders').removeClass('flex-column');
                $('#btn-list').removeClass('active')
                $(this).addClass('active')
            });
            $('#btn-list').on('click', function() {
                $('#main-files').addClass('flex-column');
                $('#btn-grid').removeClass('active')
                $(this).addClass('active')
            });
            $('#btn-grid').on('click', function() {
                $('#main-files').removeClass('flex-column');
                $('#btn-list').removeClass('active')
                $(this).addClass('active')
            });

            // Open folder and see files
            $('button.folder-container').on('click', function() {
                $('#filesGroup').removeClass('d-none');
                $('#foldersGroup').addClass('d-none')
            });
            $('a#backToFolders').on('click', function() {
                $('#foldersGroup').removeClass('d-none');
                $('#filesGroup').addClass('d-none')
            });
        });



        function get_records() {

            var status = $('#sltgetstatus').val();

            data = {
                type: ''
            }
            $.ajax({
                type: 'POST',
                url: 'webservice/get_newmedia.php',
                data: data,
                success: function(response, textStatus, xhr) {

                    console.log(response);

                    $('#get_records').html(response);
                    //  table.columns.adjust().draw();
                },
                complete: function(xhr) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;
                    swal("Error :Archive!", "Please try again", "error");

                }
            });
        }

        function add_folder() {
            if ($('#folder-form').parsley().validate() != true) {
                return false;

            } else {
                var foldername = $.trim($('#txtfolder').val());

                var data = {
                    foldername: foldername,
                    operation: 'add_folder'
                }
                // console.log(data);
                $.ajax({
                    url: "webservice/add_media.php",
                    type: "POST",
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'ok') {
                            get_records();

                            swal('', "Successfully Created", "success")

                            $('#txtfolder').val('');
                            $('#addfolderModal').modal('hide');

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
        }

        function editbtn(folder_id, foldername) {

            $('#folderid').text(folder_id);
            $('#edittxtfolder').val(foldername);
        }



        function update_folder() {
            if ($('#editfolder-form').parsley().validate() != true) {
                return false;

            } else {
                var foldername = $.trim($('#edittxtfolder').val());
                var folder_id = $('#folderid').text();
                var data = {
                    foldername: foldername,
                    folder_id: JSON.parse(folder_id),
                    operation: 'edit_folder'
                }
                // console.log(data);
                // return false;
                $.ajax({
                    url: "webservice/add_media.php",
                    type: "POST",
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        // return false;
                        if (data.status == 'ok') {
                            $('#editfolderModal').modal('hide');
                            get_records();
                            swal('', "Successfully Created", "success")

                            $('#txtfolder').val('');


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

        }

        function deletebtn(id, foldername) {
            var data = {
                folder_id: id,
                foldername: foldername,
                operation: 'delete_folder'
            }

            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, " + status + " it!",
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
                                    swal("Done!", "It was succesfully " + status + "!", "success");

                                    // statusAppend();
                                    get_records();
                                } else {
                                    swal("Error :" + status + "!", "Please try again", "error");

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error :" + status + "!", "Please try again", "error");
                            }


                        });
                    } else if (result.dismiss === 'cancel') {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });

        }

        function redirect_file_url(id, media_foldername) {

            var data = {
                id: id,
                media_foldername: media_foldername,
                operation: 'media_session'
            }
            // console.log(data);
            // return false;
            $.ajax({
                url: "webservice/add_media.php",
                type: 'POST',
                dataType: 'json',
                data: data
            }).done(function(res) {
                // console.log(res);
                // return false;
                if (res.valid) {
                    document.location.href = 'mmd_mediafile.php';
                } else {
                    swal("Error ", "Please try again", "error");
                }
            });
        }
    </script>
</body>

</html>