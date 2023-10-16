<?php
include("../include/db_connection.php");
include '../include/session.php';

$sessionId = $_SESSION['current_user_id'];
$folder_id = $_SESSION['mediafolder_id'];
$foldername = $_SESSION['media_foldername'];
// echo $foldername;
// exit;
$type = $_REQUEST['type'];

$get_media = "select * from mst_media where status='L' and file_extension in ('jpeg','jpg','gif','png') and folder_id =$folder_id order by uploaded_on desc";
$result_media = pg_query($db, $get_media);
$images_count = pg_num_rows($result_media);


$get_document = "select media_id,title,alt_filename,uploaded_on,filesize from mst_media where status='L' and file_extension in ('pdf') and folder_id =$folder_id order by uploaded_on desc";
$result_document = pg_query($db, $get_document);
$documents_count = pg_num_rows($result_document);

$get_video = "select media_id,title,alt_filename,uploaded_on,filesize from mst_media where status='L' and file_extension in ('mp4','mp3') and folder_id =$folder_id order by uploaded_on desc";
$result_video = pg_query($db, $get_video);
$video_counts = pg_num_rows($result_video);

if ($type == 'images') {

    if ($images_count == 0) {
?>
        <div class="text-center">
            <h5> No Data Found ! Please Add New Images </h5s>
        </div>
        <?php  } else
        // echo $get_media ;
        while (
            $row = pg_fetch_array(
                $result_media
            )
        ) {
            if ($row['filename'] == '') {
                $empty_pdf = "assets/images/pdf_image1.png";
                $empty_image = "assets/images/empty_images.png";
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
                $imgurl = 'uploads/media/' . $foldername . '/' . $row['alt_filename'] . '';
                $copy_clip = '' . $foldername . '/' . $row['alt_filename'] . '';
            } {
        ?>

            <div class="col-lg-2 col-md-4 col-sm-12 wrap">
                <div class="file_card">
                    <div class="file">

                        <!-- <a  rel="noopener" href="#"> -->
                        <div class="mediaimg pull-right">
                            <button type="button" class="btn btn-icon btn-warning" title="copy to clipboard" onclick="copy_clip('<?Php echo $copy_clip ?>');">
                                <i class="fa fa-copy"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-success" title="Edit Here" data-toggle="modal" data-target="#editmediaModal" onclick="editbtn(<?Php echo $row['media_id'] ?>,'<?php echo $row['title'] ?>');">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" title="Delete Here" onclick="deletebtn(<?Php echo $row['media_id'] ?>);">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="icon">
                            <!-- <div class="card-wrapper"> -->
                            <img src="<?php echo $imgurl ?>" alt="<?php echo $alt_name; ?>" />
                            <!-- </div> -->
                        </div>

                        <div class="file-name">
                            <p class="m-b-5 text-center" style="font-weight:600"><?Php echo $row['title'] ?></p>
                            <small>Size: <?Php echo $row['filesize'] ?> <span class="date "><?php echo date('M d , Y ', strtotime($row['uploaded_on'])) ?></span></small>
                        </div>

                        <!-- </a> -->
                    </div>
                </div>
            </div>
    <?php }
        } ?>
    <?php
} else if ($type == 'documents') {


    if ($documents_count == 0) {
    ?>
        <div class="text-center">
            <h3> No Data Found ! Please Add New Documents </h3>
        </div>
    <?php  } else { ?>

        <table class="example table table-hover table-striped" datatable="" width="100%" cellspacing="0" data-page-length="33" data-scroll-x="true" scroll-collapse="false">
            <thead style="background:#fff">
                <tr>
                    <th>#</th>
                    <th>Filename</th>
                    <th>Date</th>
                    <th>Used Categories</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Filename</th>
                    <th>Date</th>
                    <th>Used Categories</th>
                    <th>Action</th>

                </tr>
            </tfoot>

            <tbody>

                <?php
                $i = 0;

                while (
                    $row = pg_fetch_array(
                        $result_document
                    )
                ) {
                    $filetitle;

                    if ($row["title"] != '') {
                        $filetitle = $row["title"];
                    } else {
                        $filetitle = "Please Update Title";
                    }
                ?>
                    <tr>
                        <td><?php echo  ++$i; ?></td>
                        <td><a rel="noopener" style="font-weight:500" href="uploads/media/<?Php echo $foldername . '/' . $row["alt_filename"] ?> " target="_blank"><?php echo $filetitle;  ?></a></td>
                        <td><?php echo date('d-m-Y H-i-s', strtotime($row['uploaded_on'])) ?></td>
                        <td>Events,Photo Gallery</td>
                        <td id="tblEnTitle" <?php echo $row['media_id']  ?>><button type="button" class="btn btn-success btnpadding notika-btn-success" data-toggle="modal" data-target="#editmediaModal" onclick="editbtn(<?php echo $row['media_id'] ?>,'<?php echo $row['title'] ?>');" title="Edit Here"><i class="fa fa-edit"></i></button>
                            &nbsp;&nbsp;<button class="btn btn-danger btnpadding notika-btn-success" title="Delete Here" onclick=deletebtn(<?Php echo $row['media_id'] ?>)><i class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    <?Php } ?>


    <?php

} else if ($type == 'videos') {
    if ($video_counts == 0) {
    ?>
        <div class="text-center">
            <h3> No Data Found ! Please Add New Videos </h3>
        </div>
    <?php  } else { ?>

        <table class="example table table-hover table-striped" datatable="" width="100%" cellspacing="0" data-page-length="33" data-scroll-x="true" scroll-collapse="false">
            <thead style="background:#fff">
                <tr>
                    <th>#</th>
                    <th>Filename</th>
                    <th>Date</th>
                    <th>Used Categories</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tfoot>
                <tr>

                    <th>#</th>
                    <th>Filename</th>
                    <th>Date</th>
                    <th>Used Categories</th>
                    <th>Action</th>

                </tr>
            </tfoot>

            <tbody>

                <?php
                $i = 0;

                while (
                    $row_video = pg_fetch_array(
                        $result_video
                    )
                ) {
                    if ($row_video["title"] != '') {
                        $filetitle = $row_video["title"];
                    } else {
                        $filetitle = "Please Update Title";
                    } ?>
                    <tr>
                        <td><?php echo  ++$i; ?></td>
                        <td>
                            <!-- <video width="400" controls>
                                <source src="../uploads/media/<?Php echo $foldername . '/' . $row_video["alt_filename"] ?> " type="video/mp4">
                                Your browser does not support the video tag.
                            </video> -->
                            <video width="400" controls autoplay>
                                <source class="video__media" src="uploads/media/<?Php echo $foldername . '/' . $row_video["alt_filename"] ?> " type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <!-- <video class="video__container" autoplay muted loop>
                                <source class="video__media" src="https://player.vimeo.com/external/332588783.sd.mp4?s=cab1817146dd72daa6346a1583cc1ec4d9e677c7&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
                            </video> -->
                        </td>
                        <td><?php echo date('d-m-Y H-i-s', strtotime($row_video['uploaded_on'])) ?></td>
                        <td>Events,Photo Gallery</td>
                        <td id="tblEnTitle" <?php echo $row_video['media_id']  ?>><button type="button" class="btn btn-success btnpadding notika-btn-success" data-toggle="modal" data-target="#editmediaModal" onclick="editbtn(<?php echo $row_video['media_id'] ?>,'<?php echo $row_video['title'] ?>');" title="Edit Here"><i class="fa fa-edit"></i></button>
                            &nbsp;&nbsp;<button class="btn btn-danger btnpadding notika-btn-success" title="Delete Here" onclick=deletebtn(<?Php echo $row_video['media_id'] ?>)><i class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    <?Php } ?>


<?php

}

?>

<script>
    var table;
    $(document).ready(function() {

        table = $('.example').DataTable({
            scrollY: 300,
            "responsive": true,
            paging: false,
            retrieve: true,
        });
        table.columns.adjust().draw();
        var images_counts = '<?php echo $images_count; ?>';
        var documents_counts = '<?php echo $documents_count; ?>';
        var video_counts = '<?php echo $video_counts; ?>';

        $('#images_counts').text(images_counts);
        $('#documents_counts').text(documents_counts);
        $('#video_counts').text(video_counts);
    });
</script>

<?php

exit;
$status = $_POST['status'];
if ($status == '') {
    $get_media = "select * from mst_media where status='L' order by uploaded_on desc";
} else {
    $get_media = "select * from mst_media where status='L' and file_extension ='$status' order by uploaded_on desc";
}
$result_media = pg_query($db, $get_media);
$count = pg_num_rows($result_media);
if ($count == 0) {
?>

    <div class="text-center">
        <h3> No Data Found ! Please Add New Media </h3>
    </div>
    <?php  } else
    // echo $get_media ;
    while (
        $row = pg_fetch_array(
            $result_media
        )
    ) {
        if ($row['filename'] == '') {
            $empty_pdf = "assets/images/pdf_image1.png";
            $empty_image = "assets/images/empty_images.png";
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
            $imgurl = 'uploads/media/' . $row['alt_filename'] . '';
        } {
    ?>

        <div class="col-lg-2 col-md-4 col-sm-12 wrap">
            <div class="file_card">
                <div class="file">
                    <a rel="noopener" href="niot_mediadetails.php">
                        <div class="icon">
                            <!-- <div class="card-wrapper"> -->
                            <img src="<?php echo $imgurl ?>" alt="<?php echo $alt_name; ?>" />
                            <!-- </div> -->
                        </div>
                        <div class="hover">
                            <button type="button" class="btn btn-icon btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-info">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                        <div class="file-name">
                            <p class="m-b-5 " style="font-weight:600"><?Php echo $row['alt_filename'] ?></p>
                            <small>Size: <?Php echo $row['filesize'] ?> <span class="date "><?php echo date('M d , Y ', strtotime($row['uploaded_on'])) ?></span></small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
<?php }
    } ?>