<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
$operation  = $_POST['operation'];
$title      = $_POST['title'];
$title      = chkbadchar($title);
$filename   = $_POST['filename'];
$media_id   = $_POST['mediaid'];
$media_id   = chkbadchar($media_id);
$short_title = $_POST['short_title'];
$short_title = chkbadchar($short_title);
$sessionId      = $_SESSION['current_user_id'];
$sessionId      = chkbadchar($sessionId);
$currdate       = date('Y-m-d h:i:s');
$slider_id      = $_POST['slider_id'];
$slider_id      = chkbadchar($slider_id);



if ($operation == 'save') {
    // var_dump($title);die;
    if (empty($title) || empty($filename) || empty($media_id) || empty($short_title)) {
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
        $query = "insert into mst_photogallery(title,short_title,filename,media_id,inserted_by,uploaded_on,updated_on) 
        values('$title','$filename','$short_title','$media_id','$sessionId','$currdate','$currdate')";
        // echo $query;die;
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
}elseif ($operation == 'save_photo') {
    if (empty($title) || empty($filename) || empty($media_id) || empty($short_title)) {
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
        $query = "insert into mmd_photogallery(title,filename,short_title,mas_doc_id,media_id,inserted_by,uploaded_on,updated_on) 
        values('$title','$filename','$short_title','".$_SESSION['gallery_id']."','$media_id','$sessionId','$currdate','$currdate')";
        // echo $query;die;
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
    
}elseif ($operation == 'get_edit') {
    if (empty($slider_id)) {
        $error = 1;
    } else {
        if ($slider_id) {
            $char_slider_id = chkint($slider_id);
            if (empty($char_slider_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mst_slider where slider_id = $slider_id";
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
        $edit_query = "update mst_slider set title ='$title' ,filename = '$filename',media_id= '$media_id',short_title ='$short_title' ,updated_by ='$sessionId' ,updated_on='$currdate'  where slider_id = $slider_id";
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
    echo $operation;
    exit;
    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mst_slider SET position_order=' .
            $i .
            ' WHERE slider_id=' .
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
        empty($slider_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($slider_id) {
            $char_slider_id = chkint($slider_id);
            if (empty($char_slider_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mst_slider set status= '$status' where slider_id = $slider_id ";
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
