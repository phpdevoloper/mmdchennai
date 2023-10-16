<?php 
include("../include/db_connection.php");
include '../include/session.php';
$sessionId = $_SESSION['current_user_id'];
$folder_id = $_POST['folder_id'];
$status = $_POST['status'];
$status_condition;
if ($status == 'images') {
    $status_condition = "'jpeg','jpg','png','gif'";
} else if ($status == 'documents') {
    $status_condition = "'pdf'";
} else if ($status == 'videos') {
    $status_condition = "'mp4'";
}


if ($status == '') {
    $get_media = "select * from mst_media ms 
    inner join mst_mediafolder  me on ms.folder_id = me.folder_id
    where ms.status='L' and me.folder_id = $folder_id order by ms.uploaded_on desc";
} else {
    $get_media = "select * from mst_media ms 
    inner join mst_mediafolder  me on ms.folder_id = me.folder_id
    where ms.status='L' and file_extension in ($status_condition) and me.folder_id = $folder_id order by ms.uploaded_on desc";
}

$result_media = pg_query($db, $get_media);

$count = pg_num_rows($result_media);

if ($count == 0) {
?>
    <hr>
    <div class="text-center">
        <h3> No Data Found ! Please Add New  </h3>
    </div>
<?php  } else
?>

<div id="main-files" class="folderflex align-items-stretch flex-wrap">

    <?Php
// echo $get_media ;
while (
    $row = pg_fetch_array(
        $result_media
    )
) {
    if ($row['filename'] == '') {
        $empty_pdf = "assets/images/pdf_image1.png";
        $empty_image = "../assets/images/empty_images.png";
    }
    if ($row['alt_title'] == '') {
        $alt_name = $row['alt_filename'];
    } else {
        $alt_name = $row['alt_title'];
    }
    $date  = $row['uploaded_on'];
    $filesize = $row['filesize'];
    $round_silsize = round($filesize);
    if ($row['file_extension'] == 'pdf') {
        $imgurl = 'assets/images/pdf_image.png';
    } else {
        $imgurl = 'uploads/media/' . $row['foldername'] . '/' . $row['alt_filename'] . '';
    } {
    ?>

            <div class="col-lg-3">
                <!-- <div class="image-card__image"> -->
                <input type="checkbox" value="<?php echo $row['media_id'] ?>" class="subject-list" id="myCheckbox<?php echo $row['media_id'] ?>" onchange="get_mediavalue('<?php echo $row['alt_filename'] ?>','<?php echo $row['title'] ?>','<?php echo $row['media_id'] ?>');" />
                <label class="img-label " for="myCheckbox<?php echo $row['media_id'] ?>"><img src="<?php echo $imgurl; ?>" />
                    <p class="m-b-5 mediamodal-content text-center"><?php echo $row['title'] ?></p>
                </label>
                <!-- <div class="image-card__text text-center">
                                     
                                    </div> -->
                <!-- </div> -->
            </div>

    <?php }
} ?>
</div>

<script type="text/javascript">
    

    $('#filesGroup').removeClass('d-none');
    $('#mediafoldersGroup').addClass('d-none')
    $('.subject-list').on('change', function() {
        $('.subject-list').not(this).prop('checked', false);
    });
    $('a#backTofolders').on('click', function() {
        $('#get_file').hide();
        $('#mediafoldersGroup').removeClass('d-none');
        $('#filesGroup').addClass('d-none')
    });
</script>