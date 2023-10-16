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
$page_id = $_POST['page_id'];
$page_id = chkbadchar($page_id);
$short_title = $_POST['short_title'];
$short_title = chkbadchar($short_title);
$sessionId = $_SESSION['current_user_id'];
$currdate = date('Y-m-d h:i:s');
$mas_id = $_POST['mas_id'];
$mas_id = chkbadchar($mas_id);
$tablename = $_POST['pagename'];
$tablename = chkbadchar($tablename);
if ($operation == 'save') {
    
    $query = "insert into mst_scrolling_text(title,filename,media_id,ad_link,inserted_by,uploaded_on,updated_on) values('$title','$filename','$media_id','$link','$sessionId','$currdate','$currdate')";
    $result = pg_query($db, $query);

    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }

    echo json_encode($files_arr);
} elseif ($operation == 'get_edit') {
    $scroll_id = $_REQUEST['scroll_id'];
    $scroll_id = chkbadchar($scroll_id);
    $edit_query = "select * from mst_scrolling_text where scroll_id = $scroll_id";
    $edit_result = pg_query($db, $edit_query);
    $edit_value = pg_fetch_array($edit_result);

    if ($edit_value) {
        $files_arr['status'] = 'ok';
        $files_arr['result'] = $edit_value;
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'edit') {
    $edit_query = "update mst_scrolling_text set title ='$title' , start_dt = '$start_date', end_date = '$end_date', filename = '$filename',media_id= '$media_id' ,ad_link ='$link' ,updated_by ='$sessionId' ,updated_on='$currdate'  where scroll_id = $mas_id";
    $edit_result = pg_query($db, $edit_query);
    if ($edit_result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
}
