<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
// include '../include/server_validation.php';


$operation = $_POST['operation'];
// echo $_POST['link'];
// exit;
$title = $_POST['title'];
$title = chkbadchar($title);
$service_id = $_POST['service_id'];
$service_id = chkbadchar($service_id);
$link = $_POST['link'];
$link = chkbadcharlink($link);
$filename = $_POST['filename'];
$media_id = $_POST['mediaid'];
$short_title = $_POST['short_title'];
$short_title = chkbadchar($short_title);
$sessionId = $_SESSION['current_user_id'];
$currdate = date('Y-m-d h:i:s');
$mas_id = $_POST['mas_id'];
$tablename = $_POST['pagename'];
$tablename = chkbadchar($tablename);
$announcedate = date('Y-m-d', strtotime($end_date));

// echo json_encode($title);
//  $value= json_decode(checkstring($title),true);
// $files_arr['error'] = $value['error']; 
// $files_arr['status'] =  $value['status'];
// echo json_encode($files_arr);
// //  exit;
if ($operation ==  'save') {
    if (
        empty($title)  || ((empty($filename) || empty($media_id) || empty($short_title)) &&  empty($link)) ||  empty($service_id)
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
        } else {
            if ($link) {

                $length_link = chklen200($link);
                $check_url = url($link);
                if (empty($length_link) ||  empty($check_url)) {
                    $error = 1;
                }
            }
        }

        if ($service_id) {
            $char_service_id = chkint($service_id);
            if (empty($char_service_id)) {
                $error = 1;
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
        if ($mas_id) {
            $char_mas_id = chkint($mas_id);
            if (empty($char_mas_id)) {
                $error = 1;
            }
        }
        if ($lang) {
            $char_lang = chklang($lang);
            if (empty($char_lang)) {
                $error = 1;
            }
        }
    }


    if ($error != 1) {

        // if ($lang == 'en') {
        $query = "insert into mst_supporting_documents (title,filename,media_id,short_title,ad_link,inserted_by,uploaded_on,updated_on,service_id) values('$title','$filename','$media_id','$short_title','$link','$sessionId','$currdate','$currdate',$service_id)";
        $result = pg_query($db, $query);
        // } else {
        //     $query = "insert into mst_" . $tablename . "_" . $lang . " (title,announce_dt,filename,media_id,short_title,ad_link,inserted_by,uploaded_on,updated_on,mas_docid) values('$title','$announcedate','$filename','$media_id','$short_title','$link','$sessionId','$currdate','$currdate',$mas_id)";
        //     $result = pg_query($db, $query);
        // }

        if ($result) {
            // $userData = pg_fetch_assoc($result);
            $files_arr['status'] = 'ok';
            $files_arr['result'] = $query;
        } else {
            // $userData = pg_fetch_assoc($result);
            $files_arr['status'] = 'error';
            // $data['result'] = '';
            $files_arr['result'] = $query;
        }
    } else {
        $files_arr['status'] = 'error';
        // $data['result'] = '';
        $files_arr['result'] = $error;
    }

    echo json_encode($files_arr);
} else if ($operation == "get_edit") {
    $doc_id = $_REQUEST['doc_id'];
    $service_id = $_REQUEST['service_id'];
    if (
        empty($doc_id) || empty($service_id)
    ) {

        $error = 1;
    } else {
        if ($doc_id) {
            $char_doc_id = chkint($doc_id);
            if (empty($char_doc_id)) {
                $error = 1;
            }
        }

        if ($service_id) {
            $char_service_id = chkint($service_id);
            if (empty($char_service_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "select * from mst_supporting_documents where doc_id = $doc_id and service_id = $service_id";
        $edit_result = pg_query($db, $edit_query);
        $edit_value = pg_fetch_array($edit_result);

        // echo $edit_value['doc_id'];
        if ($edit_value) {
            $files_arr['status'] = 'ok';
            $files_arr['result'] = $edit_value;
        } else {
            $files_arr['status'] = 'error';
            $files_arr['result'] = $edit_query;
        }
    } else {
        $files_arr['status'] = 'error';
        $files_arr['result'] = $error;
    }
    echo json_encode($files_arr);
} else if ($operation == "edit") {

    if (
        empty($title)  && ((empty($filename) || empty($media_id) || empty($short_title)) || empty($link)) || empty($service_id) || empty($mas_id)
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
                if ($filename) {
                    $char_filename = chktitle($filename);
                    $length_filename = chklen200($filename);
                    if (empty($char_filename) || empty($length_filename)) {
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
        } else {
            if ($link) {

                $length_link = chklen200($link);
                $check_url = url($link);
                if (empty($length_link) ||  empty($check_url)) {
                    $error = 1;
                }
            }
        }



        if ($mas_id) {
            $char_mas_id = chkint($mas_id);
            if (empty($char_mas_id)) {
                $error = 1;
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

        if ($service_id) {
            $char_service_id = chkint($service_id);
            if (empty($char_service_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update mst_supporting_documents set title ='$title' , filename = '$filename',media_id= '$media_id',short_title ='$short_title' ,ad_link ='$link' ,updated_by ='$sessionId' ,updated_on='$currdate'  where doc_id = $mas_id and service_id = $service_id";
        $edit_result = pg_query($db, $edit_query);


        //  $edit_value = pg_fetch_array($edit_result);

        // echo $edit_value['doc_id'];
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
} else if ($operation == "status_change") {
    $doc_id = $_REQUEST['doc_id'];
    $service_id = $_REQUEST['service_id'];
    $get_status = $_REQUEST['status'];
    if (
        empty($doc_id) || empty($service_id)
    ) {

        $error = 1;
    } else {
        if ($doc_id) {
            $char_doc_id = chkint($doc_id);
            if (empty($char_doc_id)) {
                $error = 1;
            }
        }

        if ($service_id) {
            $char_service_id = chkint($service_id);
            if (empty($char_service_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mst_supporting_documents set status= '$get_status' where doc_id = $doc_id and service_id = $service_id";
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
