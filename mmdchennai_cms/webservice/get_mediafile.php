<?php 
include("../include/db_connection.php");
include '../include/session.php';
$folder_id = $_POST['folder_id'];
$get_title = "select * from mst_mediafolder where folder_id =$folder_id ";
$result_title = pg_query($db, $get_title);
$row_title = pg_fetch_array($result_title);

$get_file = "select * from mst_media where status='L' and folder_id =$folder_id order by media_id desc";
$result_file = pg_query($db, $get_file);
$get_rowfile = pg_num_rows($result_file);

?>

<div class="card-body d-none" id="filesGroup">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  rel="noopener" href="#" id="backTofolders" onclick="add_newbtn();"><i class="fa fa-folder"></i>&nbsp;Back</a></li>
        <li class="breadcrumb-item active"><?Php echo $row_title['foldername'] ?></li>
    </ol>
    <?Php if ($get_rowfile == 0) { ?>
        <h3 class="text-center"> No Data Found! Please Add New File </h3>

    <?Php } ?>
    <div id="main-files" class="folderflex align-items-stretch flex-wrap">

        <?php while (
            $filerow = pg_fetch_array(
                $result_file
            )
        ) { ?>
            <div class="d-inline-flex">
                <div class="mediafolder-container">
                    <div class="row folder-action">
                        <div class="col-lg-12 pull-right media_btn" style="text-align:right">
                            <i class="fa fa-edit edit " data-toggle="modal" data-target="#editfileModal" onclick="editfile(<?Php echo $filerow['folder_id'] ?>,<?Php echo $filerow['media_id'] ?>,'<?php echo $filerow['title'] ?>','<?php echo $filerow['alt_title'] ?>');"></i>
                            <i class="fa fa-trash delete" onclick="deletefile(<?Php echo $filerow['folder_id'] ?>,<?Php echo $filerow['media_id'] ?>,'<?Php echo $filerow['alt_filename'] ?>')"></i>
                        </div>
                    </div>
                    <div class="mediafolder-icon">
                        <i class="fa fa-file file-icon-color"></i>
                    </div>
                    <div class="mediafolder-name"><?Php echo $filerow['title'] ?></div>
                </div>
            </div>
        <?php } ?>
        <!-- <div class="d-inline-flex">
                    <div class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-file file-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">File-name-hyper-extra-large-1235445684121384513</div>
                    </div>
                </div>
                <div class="d-inline-flex">
                    <div class="mediafolder-container">
                        <div class="mediafolder-icon">
                            <i class="fa fa-file file-icon-color"></i>
                        </div>
                        <div class="mediafolder-name">File-name</div>
                    </div>
                </div> -->
    </div>
</div>
<!-- End Files Container -->

<script>
    $(document).ready(function() {

        $('#filesGroup').removeClass('d-none');
        $('#mediafoldersGroup').addClass('d-none')
        // Grid or list selection
        // $('#btn-list').on('click', function() {
        //     $('#main-folders').addClass('flex-column');
        //     $('#main-folders').removeClass('folderflex');
        //     $('#btn-grid').removeClass('active')
        //     $(this).addClass('active')
        // });
        // $('#btn-grid').on('click', function() {
        //     $('#main-folders').removeClass('flex-column');
        //     $('#main-folders').addClass('folderflex');
        //     $('#btn-list').removeClass('active')
        //     $(this).addClass('active')
        // });
        // $('#btn-list').on('click', function() {
        //     $('#main-files').addClass('flex-column');
        //     $('#main-files').removeClass('folderflex');
        //     $('#btn-grid').removeClass('active')
        //     $(this).addClass('active')
        // });
        // $('#btn-grid').on('click', function() {
        //     $('#main-files').removeClass('flex-column');
        //     $('#main-files').addClass('folderflex');
        //     $('#btn-list').removeClass('active')
        //     $(this).addClass('active')
        // });

        // Open mediafolder and see files
        $('.media-action').on('click', function() {

        });
        $('a#backTofolders').on('click', function() {
            $('#mediafoldersGroup').removeClass('d-none');
            $('#filesGroup').addClass('d-none')
        });
    });
</script>