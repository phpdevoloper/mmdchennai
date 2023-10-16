<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
$operation = $_POST['operation'];
$title = $_POST['title'];
$title = chkbadchar($title);
$filename = $_POST['filename'];
$media_id = $_POST['mediaid'];
$media_id = chkbadchar($media_id);
$short_title = $_POST['short_title'];
$short_title = chkbadchar($short_title);
$link = $_POST['ad_link'];
$link = chkbadchar($link);
$sessionId = $_SESSION['current_user_id'];
$sessionId = chkbadchar($sessionId);
$currdate = date('Y-m-d h:i:s');
$logo_id = $_POST['logo_id'];
$logo_id = chkbadchar($logo_id);


if ($operation == 'save') {
    if (
        empty($title) ||
        empty($filename) ||
        empty($media_id) ||
        empty($short_title)
    ) {
        $error = 1;
    } else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen1500($title);
            if (empty($char_title) || empty($length_title)) {
                $error = 1;
            }
        }

        if ($media_id) {
            $char_media_id = chkint($media_id);
            if (empty($char_media_id)) {
                $error = 1;
            }
        }
        if ($filename) {
            $char_filename = chktitle($filename);
            $length_filename = chklen200($filename);
            $check_filename = chkfileslider($filename);
            if (
                empty($char_filename) ||
                empty($length_filename) ||
                empty($check_filename)
            ) {
                $error = 1;
            }
        }
        if ($short_title) {
            $char_short_title = chktitle($short_title);
            $length_short_title = chklen20($short_title);
            if (empty($char_short_title) || empty($length_short_title)) {
                $error = 1;
            }
        }
        if ($link) {
            $length_link = chklen200($link);
            $check_url = url($link);
            if (empty($length_link) ||  empty($check_url)) {

                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $query = "insert into mst_logo(title,filename,media_id,short_title,ad_link,inserted_by,uploaded_on,updated_on) values('$title','$filename','$media_id','$short_title','$link','$sessionId','$currdate','$currdate')";
        $result = pg_query($db, $query);

        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'get_edit') {
    if (empty($logo_id)) {
        $error = 1;
    } else {
        if ($logo_id) {
            $char_logo_id = chkint($logo_id);
            if (empty($char_logo_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mst_logo where logo_id = $logo_id";
        $edit_result = pg_query($db, $edit_query);
        $edit_value = pg_fetch_array($edit_result);
        if ($edit_value) {
            $files_arr['status'] = 'ok';
            $files_arr['result'] = $edit_value;
        } else {
            $files_arr['status'] = 'error';
        }
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'edit') {
    if (
        empty($title) ||
        empty($filename) ||
        empty($media_id) ||
        empty($short_title)
    ) {
        $error = 1;
    } else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen1500($title);
            if (empty($char_title) || empty($length_title)) {
                $error = 1;
            }
        }

        if ($media_id) {
            $char_media_id = chkint($media_id);
            if (empty($char_media_id)) {
                $error = 1;
            }
        }
        if ($filename) {
            $char_filename = chktitle($filename);
            $length_filename = chklen200($filename);
            $check_filename = chkfileslider($filename);
            if (
                empty($char_filename) ||
                empty($length_filename) ||
                empty($check_filename)
            ) {
                $error = 1;
            }
        }
        if ($short_title) {
            $char_short_title = chktitle($short_title);
            $length_short_title = chklen20($short_title);
            if (empty($char_short_title) || empty($length_short_title)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "update mst_logo set title ='$title' ,filename = '$filename',media_id= '$media_id',short_title ='$short_title',ad_link ='$link',updated_by ='$sessionId' ,updated_on='$currdate'  where logo_id = $logo_id";
        $edit_result = pg_query($db, $edit_query);
        if ($edit_result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'swipe') {
    $position = $_POST['position'];
    $position = chkbadchar($position);

    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mst_logo SET position_order=' .
            $i .
            ' WHERE logo_id=' .
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
    $status = $_POST['status'];
    $status = chkbadchar($status);
    if (
        empty($logo_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($logo_id) {
            $char_logo_id = chkint($logo_id);
            if (empty($char_logo_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mst_logo set status= '$status' where logo_id = $logo_id ";
        $edit_result = pg_query($db, $edit_query);

        if ($edit_result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    } else {
        $files_arr['status'] = 'error';
        $files_arr['result'] = $error;
    }
    echo json_encode($files_arr);
}
