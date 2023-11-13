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
$info_image = $_POST['info_image'];
$info_image = chkbadchar($info_image);
$filename = $_POST['filename'];
$filename = chkbadchar($filename);
$mediaimgid = $_POST['mediaimgid'];
$mediaimgid = chkbadchar($mediaimgid);
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
   
    if (empty($title) || ((empty($filename) || empty($media_id) || empty($short_title)) && empty($info_image) &&  empty($link))) {
        $error = 1;
    }else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen1500($title);
            if (empty($char_title) || empty($length_title)) {
                $error = 1;  
            }
        }
        if ($info_image) {
            $char_info_filename = chktitle($info_image);
            $length_info_filename = chklen200($info_image);
            $check_info_filename = chkallfile($info_image);
            if (empty($char_info_filename) || empty($length_info_filename) || empty($check_info_filename)) {  
                $error = 1;
            }
        }
        if (empty($link)) {

            if (empty($filename) || empty($media_id) || empty($short_title)) {            
                $error = 1;
            } else {
                if ($media_id) {
                    $char_media_id = chkint($media_id);
                    if (empty($char_media_id)) {
                        $error = 1;
                    }
                }
                if ($mediaimgid) {
                    $char_mediaimgid = chkint($mediaimgid);
                    if (empty($char_mediaimgid)) {
                        $error = 1;
                    }
                }
                if ($filename) {
                    $char_filename = chktitle($filename);
                    $length_filename = chklen200($filename);
                    $check_filename = chkallfile($filename);
                    if (empty($char_filename) || empty($length_filename) || empty($check_filename)) {
                        
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
        }else {
            if ($link) {
                $length_link = chklen200($link);
                $check_url = url($link);
                if (empty($length_link) ||  empty($check_url)) {
                    $error = 1;
                }
            }
        }
        if ($sessionId) {
            $char_sessionId = chkint($sessionId);
            if (empty($char_sessionId)) {               
                $error = 1;
            }
        }
        if ($currdate) {
            $check_currdate = check_datetime($currdate);
            if (empty($check_currdate)) {               
                $error = 1;
            }
        }
        
    }  
    
    if ($error != 1) {

        $query = "insert into mst_".$tablename."(title,info_image,filename,media_id,mediaimgid,short_title,ad_link,
        inserted_by,uploaded_on,updated_on) values('$title','$info_image','$filename','$media_id','$mediaimgid','$short_title',
        '$link','$sessionId','$currdate','$currdate')";

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
    if (empty($doc_id) || empty($tablename)) {
       
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
        $edit_query = "select * from mst_" . $tablename . " where info_id = $doc_id";
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

    if (empty($title) || ((empty($filename) || empty($media_id) || empty($short_title)) && empty($info_image) &&  empty($link))) {
        $error = 1;
    }else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen1500($title);
            if (empty($char_title) || empty($length_title)) {
                $error = 1;  
            }
        }
        if ($info_image) {
            $char_info_filename = chktitle($info_image);
            $length_info_filename = chklen200($info_image);
            $check_info_filename = chkallfile($info_image);
            if (empty($char_info_filename) || empty($length_info_filename) || empty($check_info_filename)) {  
                $error = 1;
            }
        }
        if (empty($link)) {

            if (empty($filename) || empty($media_id) || empty($short_title)) {            
                $error = 1;
            } else {
                if ($media_id) {
                    $char_media_id = chkint($media_id);
                    if (empty($char_media_id)) {
                        $error = 1;
                    }
                }
                if ($mediaimgid) {
                    $char_mediaimgid = chkint($mediaimgid);
                    if (empty($char_mediaimgid)) {
                        $error = 1;
                    }
                }
                if ($filename) {
                    $char_filename = chktitle($filename);
                    $length_filename = chklen200($filename);
                    $check_filename = chkallfile($filename);
                    if (empty($char_filename) || empty($length_filename) || empty($check_filename)) {
                        
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
        }else {
            if ($link) {
                $length_link = chklen200($link);
                $check_url = url($link);
                if (empty($length_link) ||  empty($check_url)) {
                    $error = 1;
                }
            }
        }
        if ($sessionId) {
            $char_sessionId = chkint($sessionId);
            if (empty($char_sessionId)) {               
                $error = 1;
            }
        }
        if ($currdate) {
            $check_currdate = check_datetime($currdate);
            if (empty($check_currdate)) {               
                $error = 1;
            }
        }
        
    }  
    
    if ($error != 1) {

       $edit_query = "update mst_" . $tablename . " set title ='$title' ,info_image = '$info_image', filename = '$filename',media_id= '$media_id' ,
       mediaimgid = '$mediaimgid', short_title = '$short_title',ad_link ='$link' ,updated_by ='$sessionId' ,updated_on='$currdate'  where info_id = $mas_id";
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
} 
