<?php include("include/db_connection.php");
include 'include/session.php';
$pagename = 'feedback';
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
                                    <h4>Profiles</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profiles</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addModal">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <div class="profile-photo">
                                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                            class="fa fa-pencil"></i></a>
                                    <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body pd-5">
                                                    <div class="img-container">
                                                        <img id="image" src="vendors/images/photo2.jpg" alt="Picture">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Update" class="btn btn-primary">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-center h5 mb-0">Ross C. Lopez</h5>
                                <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
                                <!-- <div class="profile-info">
                                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                    <ul>
                                        <li>
                                            <span>Email Address:</span>
                                            FerdinandMChilds@test.com
                                        </li>
                                        <li>
                                            <span>Phone Number:</span>
                                            619-229-0054
                                        </li>
                                        <li>
                                            <span>Country:</span>
                                            America
                                        </li>
                                        <li>
                                            <span>Address:</span>
                                            1807 Holden Street<br>
                                            San Diego, CA 92115
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                            <div class="card-box height-100-p overflow-hidden">
                                <div class="profile-tab height-100-p">
                                    <div class="tab height-100-p">
                                        <ul class="nav nav-tabs customtab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#setting"
                                                    role="tab">Settings</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Setting Tab start -->
                                            <div class="tab-pane fade height-100-p active show" id="setting" role="tabpanel">
                                                <div class="profile-setting">
                                                    <form>
                                                        <ul class="profile-edit-list row">
                                                            <li class="weight-500 col-md-6">
                                                                <h4 class="text-blue h5 mb-20">Edit Your Personal
                                                                    Setting</h4>
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="email">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Old Password</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>New password</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text">
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <input type="submit" class="btn btn-primary"
                                                                        value="Update Information">
                                                                </div>
                                                            </li>
                                                            <li class="weight-500 col-md-6">
                                                                <h4 class="text-blue h5 mb-20">Edit Social Media links
                                                                </h4>
                                                                <div class="form-group">
                                                                    <label>Facebook URL:</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text" placeholder="Paste your link here">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Twitter URL:</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text" placeholder="Paste your link here">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Linkedin URL:</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text" placeholder="Paste your link here">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Instagram URL:</label>
                                                                    <input class="form-control form-control-lg"
                                                                        type="text" placeholder="Paste your link here">
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <input type="submit" class="btn btn-primary"
                                                                        value="Save & Update">
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Setting Tab End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal popup End-->

    <!-- Edit Modal popup End-->
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script>
    var page_name;
    $(document).ready(function() {
        // get_user();
        $('#fileDiv').hide();
        $('#linkDiv').hide();
        page_name = '<?Php echo $pagename ?>';
    });

    function get_user() {

        var cur_lang = $('#getLang').text();
        var status = $('#slt_status').val();

        data = {
            status: status,
            page_name: '<?Php echo $pagename ?>'
        }


        $.ajax({
            type: 'POST',
            // contentType: "application/json",
            // dataType: "json",    
            url: 'webservice/get_userProfiles.php',
            data: data,
            success: function(response, textStatus, xhr) {
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
    </script>

</body>

</html>