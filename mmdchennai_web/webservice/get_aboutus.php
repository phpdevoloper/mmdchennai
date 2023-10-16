<?php
include '../include/db_connection.php';
include_once '../include/checkval.php';
// var_dump($db);die;

$page_id = $_POST['page_id'];
$page_id = chkbadchar($page_id);
if (empty($page_id)) {
    $error = 1;
} else {
    if ($page_id) {
        $char_page_id = chkint($page_id);
        if (empty($char_page_id)) {
            $error = 1;
        }
    }
}

if ($error != 1) {
    $get_page_id = "select * from mmd_aboutus where page_id = $page_id and status='L' limit 1";
    $result_page_id = pg_query($db, $get_page_id);
    $row_aboutus = pg_fetch_array($result_page_id);
    $row_aboutus_count = pg_num_rows($result_page_id);
    if ($row_aboutus_count != 0) {
?>
        <div class="row ">
            <div class="col-md-12 col-sm-6 col-xs-12">
            <?php echo html_entity_decode(
                    stripslashes($row_aboutus['contents'])
                ); ?>
            </div>
        </div>
    <?Php } else { ?>
        <h5 class="text-center">No Data Found!</h5>
    <?Php }
} else { ?>
     <h5 class="text-center">Something Went Wrong!</h5>
<?Php 

 } ?>
