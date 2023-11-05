<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';

$operation = $_POST['operation'];
$title = $_POST['title'];
$title = chkbadchar($title);
// $start_date = date('Y-m-d', strtotime($_POST['start_date']));
// $start_date = chkbadchar($start_date);
// $end_date = date('Y-m-d', strtotime($_POST['end_date']));
// $end_date = chkbadchar($end_date);
$link = $_POST['link'];
$link = chkbadchar($link);
$filename = $_POST['filename'];
$filename = chkbadchar($filename);
$media_id = $_POST['mediaid'];
$media_id = chkbadchar($media_id);
$short_title = $_POST['short_title'];
$short_title = chkbadchar($short_title);
$sessionId = $_SESSION['current_user_id'];
$currdate = date('Y-m-d h:i:s');
$mas_id = $_POST['mas_id'];
$mas_id = chkbadchar($mas_id);
$doc_id = $_POST['doc_id'];
$doc_id = chkbadchar($doc_id);
$tablename = $_POST['pagename'];
$tablename = chkbadchar($tablename);

if ($operation == 'save') {
   

    // if ($error != 1) {
    //     $query = "insert into mst_".$tablename."(title,filename,media_id,short_title,ad_link,inserted_by,uploaded_on,updated_on) values('$title','$filename','$media_id','$short_title','$link','$sessionId','$currdate','$currdate')";

    //     $result = pg_query($db, $query);
    //     if ($result) {
    //         $files_arr['status'] = 'ok';
    //     } else {
    //                   $files_arr['status'] = 'error';
    //     }
    // } else {
       
    //     $files_arr['status'] = 'error';
    // }

    echo json_encode($files_arr);
} elseif ($operation == 'get_edit') {

    
} elseif ($operation == 'edit') {
    
} 
