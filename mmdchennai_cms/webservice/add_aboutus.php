<?php
include('../include/db_connection.php');
include '../include/session.php';
include '../include/checkval.php';
// $host     = 'localhost';
// $db       = 'mst';
// $user     = 'postgres';
// $password = 'postgress';
// $dsn = "pgsql:host=$host;dbname=$db;port=5432;";

$content_value = $_REQUEST['value'];
$content = htmlentities($content_value);
$operation = $_POST['operation'];
$page_id = $_REQUEST['page_id'];
$page_id = chkbadchar($page_id);
$sessionId = $_SESSION['current_user_id'];


$get_services = "select * from mmd_aboutus where page_id = $page_id";
$result_services = pg_query($db, $get_services);
$row_services = pg_fetch_array($result_services);
$row_sevices_count = pg_num_rows($result_services);
if (empty($content) || empty($page_id)  || empty($sessionId)) {

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

    if ($row_sevices_count == 0) {
        $sql = "INSERT INTO mmd_aboutus(contents, page_id,inserted_by) VALUES('$content',$page_id,'$sessionId' )";
    } else {
        $sql = "update mmd_aboutus set contents = '$content' where page_id = $page_id ";
    }

    $result = pg_query($db, $sql);
    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }
} else {
    $files_arr['status'] = 'error';
}
echo json_encode($files_arr);
