<?php
session_start();
include '../include/db_connection.php';
// include '../include/session.php';
// include '../include/checkval.php';



$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$get_slider = "select * from mmd_photogallery where mas_doc_id='".$_SESSION['gallery_id']."'";
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
    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3 filter-app" data-wow-delay="0.3s">
        <a href="uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>" data-gallery="portfolioGallery" class="service-item d-block rounded text-center h-100 p-4 portfolio-lightbox">
            <img class="custom-gallery rounded mb-4" src="uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>" alt="" />
            <h4 class="mb-0 gallery_title"><?php echo $cate['title'];?></h4>
        </a>
    </div>
    <?php } ?>
</div>