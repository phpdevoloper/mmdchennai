<?php
include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';

$operation = $_POST['operation'];
$title = $_POST['title'];
$title = chkbadchar($title);
$footer_link = $_POST['footerlink'];
$footer_link = chkbadchar($footer_link);
$filename = $_POST['filename'];
$filename = chkbadchar($filename);
$media_id = $_POST['media_id'];
$media_id = chkbadchar($media_id);
$tablename = $_POST['pagename'];
$tablename = chkbadchar($tablename);
$sessionId = $_SESSION['current_user_id'];
$currdate = date('Y-m-d h:i:s');
$mas_id = $_POST['mas_id'];
$mas_id = chkbadchar($mas_id);
$doc_id = $_REQUEST['doc_id'];
$doc_id = chkbadchar($doc_id);
if ($operation == 'link_save') {
    $query =
        'insert into mst_' .
        $tablename .
        "(title,footer_link,inserted_by,uploaded_on,updated_on) values('$title','$footer_link','$sessionId','$currdate','$currdate')";
    $result = pg_query($db, $query);

    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }

    echo json_encode($files_arr);
} elseif ($operation == 'footer_save') {

    $query =
        'insert into mst_' .
        $tablename .
        "(title,filename,footer_link,media_id,inserted_by,uploaded_on,updated_on) values('$title','$filename','$footer_link','$media_id','$sessionId','$currdate','$currdate')";
    $result = pg_query($db, $query);


    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }

    echo json_encode($files_arr);
} elseif ($operation == 'get_edit') {

    $edit_query =
        'select * from mst_' .
        $tablename .
        " where doc_id = $doc_id";
    $edit_result = pg_query($db, $edit_query);
    $edit_value = pg_fetch_array($edit_result);


    if ($edit_value) {
        $files_arr['status'] = 'ok';
        $files_arr['result'] = $edit_value;
        $files_arr['type'] = $tablename;
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'link_edit') {
    $edit_query =
        'update mst_' .
        $tablename .
        " set title ='$title' , footer_link = '$footer_link',updated_by ='$sessionId' ,updated_on='$currdate'  where doc_id = $doc_id";
    $edit_result = pg_query($db, $edit_query);

    if ($edit_result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'footerslider_edit') {
    $edit_query =
        'update mst_' .
        $tablename .
        " set title ='$title' , footer_link = '$footer_link',  filename = '$filename',media_id= '$media_id',updated_by ='$sessionId' ,updated_on='$currdate'  where doc_id = $doc_id";
    $edit_result = pg_query($db, $edit_query);

    if ($edit_result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'swipe') {
    $position = $_POST['position'];

    $i = 1;

    foreach ($position as $k => $v) {
        $sql =
            'Update mst_' .
            $tablename .
            ' SET position_order=' .
            $i .
            ' WHERE doc_id=' .
            $v;

        $result = pg_query($db, $sql);

        $i++;
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'err';
        }
    }

    echo json_encode($files_arr);
} else if ($operation == "status_change") {
    $doc_id = $_REQUEST['doc_id'];
    $get_status = $_REQUEST['status'];

    if (
        empty($doc_id) || empty($get_status) || empty($tablename)
    ) {

        $error = 1;
    } else {
        if ($doc_id) {
            $char_doc_id = chkint($doc_id);
            if (empty($char_doc_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = 'update mst_' .
            $tablename .
            "  set status= '$get_status' where doc_id = $doc_id";
        $edit_result = pg_query($db, $edit_query);

        if ($edit_result) {
            $files_arr['status'] = 'ok';
            $files_arr['result'] = $edit_query;
        } else {
            $files_arr['status'] = 'error';
            $files_arr['result'] = $edit_query;
        }
    } else {
        $files_arr['status'] = 'error';
        $files_arr['result'] = $error;
    }
    echo json_encode($files_arr);
}
