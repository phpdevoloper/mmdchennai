<?php
include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
// var_dump($_POST);die;

$title = $_POST['title'];
$media_id = $_POST['title'];
$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
// echo $sessionId;
// exit;
$currdate = date('Y-m-d h:i:s');
$folder_id = $_POST['folder_id'];
$doc_type = $_POST['doc_type'];
$title = $_REQUEST['title'];

if ($operation == 'edit_category') {
    $title = $_POST['title'];
    $media_id = $_POST['media_id'];
    // $folder_id = $_POST['folder_id'];
    if (empty($title) || empty($media_id)) {
        $error = 1;
    } else {
        if ($title) {
            $char_title = chktitle($title);
            $length_title = chklen100($title);
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
    }

    redirect_error($error);
    if ($error != 1) {
        $edit_query = "update mst_photogallery set title = '$title',updated_by = '$sessionId',updated_on = '$currdate' where doc_id = $media_id";
        // echo $edit_query;exit;
        $result_media = pg_query($db, $edit_query);

        if ($result_media) {
            $data['status'] = 'ok';
            $data['result'] = $edit_query;
        } else {
            $data['status'] = 'ok';
            $data['result'] = $edit_query;
        }
    } else {
        $data['status'] = 'ok';
        $data['result'] = $error;
    }
    echo json_encode($data);
    exit;

} else if ($operation == 'delete_media') {

    
    $media_id = $_POST['media_id'];
    if (empty($media_id)) {
        $error = 1;
    } else {
        if ($media_id) {
            $char_media_id = chkint($media_id);
            if (empty($char_media_id)) {
                $error = 1;
            }
        }
    }
    redirect_error($error);
    if ($error != 1) {
        $delete_query = "update mst_media set status='N',updated_by = '$sessionId',updated_on = '$currdate' where media_id = $media_id";
        $result_media = pg_query($db, $delete_query);
        if ($result_media) {
            $data['status'] = 'ok';
            $data['result'] = $delete_query;
        } else {
            $data['status'] = 'err';
            $data['result'] = $delete_query;
        }
    } else {
        $data['status'] = 'err';
        $data['result'] = $error;
    }
    echo json_encode($data);
    exit;
    $get_previous = "select foldername from mst_mediafolder where status='L' and folder_id = $folder_id";
    $result_old = pg_query($db, $get_previous);
    $get_oldname = pg_fetch_array($result_old);
    // $oldoutput_dir = '../uploads/media/' . $get_oldname['foldername'] . '/';
    // $newoutput_dir = '../uploads/media/deleted_media/' . $get_oldname['foldername'] . '/';
    $delete_name = date('YmdHis');

    $source_file = '../uploads/media/' . $get_oldname['foldername'] . '/';
    $destination_path = '../uploads/media/' . $get_oldname['foldername'] . '/' . $filename . '';
    if (rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME))) {

        $delete_query = "update mst_media set status='N',updated_by = '$sessionId',updated_on = '$currdate' where media_id = $media_id";
        $result_media = pg_query($db, $delete_query);
        if ($result_media) {
            $data['status'] = 'ok';
            $data['result'] = $delete_query;
        } else {
            $data['status'] = 'err';
            $data['result'] = $delete_query;
        }
    } else {

        $data['status'] = 'err';
        $data['result'] =  $destination_path;
    }
    echo json_encode($data);

    exit;
    if (move_uploaded_file($delete_name, $oldoutput_dir)) {

        // Moving file to New directory 
        if (rename(realpath($oldoutput_dir) . '/' . $folder_name, realpath($newoutput_dir) . '/' . $delete_name)) {
        } else {
            $data['status'] = 'err';
            // $data['result'] = $delete_query;
        }
    } else {
        $data['status'] = 'err';
        $data['result'] = $delete_name;
    }
    echo json_encode($data);
} else if ($operation == 'media_session') {
    session_start();
    if (isset($_POST['id'])) {
        $_SESSION['mediafolder_id'] = $_POST['id'];
        $_SESSION['media_foldername'] = $_POST['media_foldername'];
        // $_SESSION['alt_mediafoldername'] = $_POST['alt_mediafoldername'];
        // $_SESSION['currentlang'] = $_POST['lang'];
        $result['valid'] = TRUE;
    }
    $result['mediafolder_id']  = $_SESSION['mediafolder_id'];
    $result['media_foldername']  = $_SESSION['media_foldername'];
    // $result['alt_mediafoldername']  = $_SESSION['alt_mediafoldername'];
    // $result['alt_foldername']  = $_SESSION['alt_foldername'];
    // $result['lang']  = $_SESSION['currentlang'];
    // echo  json_encode($_SESSION['session_empcode']);
    echo json_encode($result);
    exit();
}
