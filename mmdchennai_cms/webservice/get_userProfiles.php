<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';


$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
var_dump($sessionId);die;
$get_status = $_POST['status'];
$get_status = chkbadchar($get_status);
if ($get_status == '') {
    $get_slider = "select * from mst_slider order by position_order asc ";
} else {
    $get_slider = "select * from mst_slider where status='$get_status' order by position_order asc ";
}

$result_slider = pg_query($db, $get_slider);
$row_slider_count = pg_num_rows($result_slider);



?>


