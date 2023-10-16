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
$type = $_REQUEST['type'];
$type = chkbadchar($type);
$sessionId = $_SESSION['current_user_id'];
$checkrowcount = $_REQUEST['checkrowcount'];
$checkrowcount = chkbadchar($checkrowcount);
$service_id = $_REQUEST['service_id'];
$service_id = chkbadchar($service_id);
$category = $_REQUEST['category'];

$get_services = "select * from mmd_services where category = $category  and service_id =$service_id  limit 1";
$result_services = pg_query($db, $get_services);
$row_services = pg_fetch_array($result_services);
$row_sevices_count = pg_num_rows($result_services);
if (empty($content) || empty($service_id) || empty($category) || empty($sessionId)) {
     $error = 1;
} else {
     if ($service_id) {
          $char_service_id = chkint($service_id);
          if (empty($char_service_id)) {
               $error = 1;
          }
     }
}

if ($error != 1) {

     if ($row_sevices_count == 0) {

          $sql = "INSERT INTO mmd_services(contents, service_id,category,inserted_by) VALUES('$content',$service_id,$category,'$sessionId' )";
     } else {
          $sql = "update mmd_services set contents = '$content' where service_id = $service_id and category = $category ";
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
