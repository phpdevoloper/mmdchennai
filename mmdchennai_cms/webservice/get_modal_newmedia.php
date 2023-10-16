<?php
include("../include/db_connection.php");
include '../include/session.php';
$admin_id = $_SESSION['admin_id'];
$get_media = "SELECT * FROM mst_mediafolder ms

WHERE   ms.status='L' order by ms.folder_id desc";
$result_query = pg_query($db, $get_media);
$get_row = pg_num_rows($result_query);

?>

<div class="">
    <div class="card card-mediafolders">
        <div class="card-header">
            <div class="row align-items-center" style="padding:20px;">
                <div class="col-lg-10">
                    <!-- <div class="col mr-auto" id="add_btn">

                    </div> -->
                </div>
                <div class="col-lg-2">
                    <div class="col col-auto pr-2">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-secondary" id="btn-list"><i class="fa fa-th-list fa-lg"></i></button>
                            <button class="btn btn-sm btn-outline-secondary outline-none active" id="btn-grid"><i class="fa fa-th-large fa-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mediafolders Container -->
        <div class="card-body" id="mediafoldersGroup">
            <!-- <ol class="breadcrumb"> -->
                <span hidden id="selectfolder_id"></span>
                <!-- <li class="breadcrumb-item active"><i class="far fa-mediafolder"></i>&nbsp; mediafolders</li> -->
            <!-- </ol> -->
            <?Php if ($get_row == 0) { ?>
                <h3 class="text-center"> No Data Found! Please Add New Folder </h3>

            <?Php } ?>
            <div id="main-folders" class="folderflex align-items-stretch flex-wrap">
                <?php while (
                    $row = pg_fetch_array(
                        $result_query
                    )
                ) { ?>
                    <div class="d-inline-flex">
                        <div class="mediafolder-container">
                            <!-- <div class="row folder-action">
                                <div class="col-lg-12 pull-right media_btn" style="text-align:right">
                                    <i class="fa fa-edit edit " data-toggle="modal" data-target="#editfolderModal" onclick="editbtn(<?Php echo $row['folder_id'] ?>,'<?php echo $row['foldername'] ?>');"></i>
                                    <i class="fa fa-trash delete" onclick="deletebtn(<?Php echo $row['folder_id'] ?>,'<?Php echo $row['foldername'] ?>')"></i>
                                </div>
                            </div> -->
                            <div class="media-action" onclick="get_file(<?Php echo $row['folder_id'] ?>);">
                                <div class="mediafolder-icon">
                                    <i class="fa fa-folder mediafolder-icon-color "></i>
                                </div>

                                <div class="mediafolder-name text-center"><?Php echo $row['foldername'] ?></div>
                            </div>
                        </div>
                    </div>
                <?Php } ?>
                <!-- <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name-large</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name-large</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name-extra-large<buttonv>
                            </buttonv>
                        </div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name-hyper-extra-large-1235445684121384513</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div>
                <div class="d-inline-flex">
                    <button class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-folder mediafolder-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">mediafolder-name</div>
                    </button>
                </div> -->
            </div>
        </div>
        <!-- End mediafolders Container -->
        <!-- Files Container -->
        <div id="get_file"></div>

        <!-- End Files Container -->
    </div>

</div>
<br>

<script>
    $(document).ready(function() {
        // Grid or list selection

        $('#add_btn').empty().append('<button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#addfolderModal" style="margin-left:10px;"><i class="icofont icofont-plus"> </i>Add New Folder</button>');
        $('#btn-list').on('click', function() {
            $('#main-folders').addClass('flex-column');
            $('#main-folders').removeClass('folderflex');
            $('#btn-grid').removeClass('active')
            $(this).addClass('active')
        });
        $('#btn-grid').on('click', function() {
            $('#main-folders').removeClass('flex-column');
            $('#main-folders').addClass('folderflex');
            $('#btn-list').removeClass('active')
            $(this).addClass('active')
        });
        $('#btn-list').on('click', function() {
            $('#main-files').addClass('flex-column');
            $('#main-files').removeClass('folderflex');
            $('#btn-grid').removeClass('active')
            $(this).addClass('active')
        });
        $('#btn-grid').on('click', function() {
            $('#main-files').removeClass('flex-column');
            $('#main-files').addClass('folderflex');
            $('#btn-list').removeClass('active')
            $(this).addClass('active')
        });

        // Open mediafolder and see files
        $('.media-action').on('click', function() {

            $('#mas_foldid').text();
            $('#filesGroup').removeClass('d-none');
            $('#mediafoldersGroup').addClass('d-none')
        });
        // $('a#backTofolders').on('click', function() {
        //     $('#mediafoldersGroup').removeClass('d-none');
        //     $('#filesGroup').addClass('d-none')
        // });
    });

    // function add_newbtn() {

    //     $('#add_btn').empty().append('<button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#addfolderModal" style="margin-left:10px;"><i class="icofont icofont-plus"> </i>Add New Folder</button>');
    // }

    function get_file(folder_id) {

        $('#get_file').show();
        $('#selectfolder_id').text(folder_id);
        $('#add_btn').empty().append('<button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#addfileModal" style="margin-left:10px;"><i class="icofont icofont-plus"> </i>Add New File</button>');
        var status = $('#sltgetstatus').val();

        data = {
            folder_id: folder_id
        }
        $.ajax({
            type: 'POST',
            // url: 'webservice/get_modalmediafile.php',
            url: 'webservice/get_modal_media.php',
            data: data,
            success: function(response, textStatus, xhr) {

                console.log(response);

                $('#get_file').html(response);
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
</script>