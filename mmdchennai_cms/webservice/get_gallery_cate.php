<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';



$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$get_slider = "select * from mst_photogallery ORDER BY doc_id DESC";
$result_slider = pg_query($db, $get_slider);
$row_slider_count = pg_num_rows($result_slider);


?>
<div class="row">
    <?php 
        foreach (pg_fetch_all($result_slider) as $cate) {   
        $media_id = $cate['media_id'];
        $get_file = "select me.foldername,ms.filesize,ms.alt_filename as filename  from mst_media ms 
                inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                where ms.media_id = $media_id";
        $result_media = pg_query($db, $get_file);
        $row_media = pg_fetch_array($result_media);
    ?>
    <div class="col-lg-4">
        <div class="gallery-box">
            <div class="mediaimg">
                <button type="button" class="btn btn-icon btn-warning" title="copy to clipboard" onclick="copy_clip('<?Php echo $copy_clip ?>');">
                    <i class="fa fa-copy"></i>
                </button>
                <button type="button" class="btn btn-icon btn-success" title="Edit Here" data-toggle="modal" data-target="#editmediaModal" onclick="editbtn(<?Php echo $cate['sub_doc_id'] ?>,'<?php echo $cate['title'] ?>');">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-icon btn-danger" title="Delete Here" onclick="deletebtn(<?Php echo $cate['sub_doc_id'] ?>);">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            <a rel="noopener" href="#" class="info-box">
                <?php ?>
                <img src="uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>" alt="">
                <h5><?php echo $cate['title'];?></h5>
            </a>
        </div>
    </div>
    <?php } ?>
</div>