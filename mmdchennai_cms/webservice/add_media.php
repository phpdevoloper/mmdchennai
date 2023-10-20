<?php
include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
// echo $sessionId;
// exit;
$currdate = date('Y-m-d h:i:s');
$folder_id = $_POST['folder_id'];
$doc_type = $_POST['doc_type'];
$title = $_REQUEST['title'];


if ($operation ==  'save') {
    $get_mst = "select * from mst_mediafolder where folder_id =$folder_id ";
    $result_mst = pg_query($db, $get_mst);
    $mst_row = pg_fetch_array($result_mst);

    $countfiles = $_FILES['file']['name'];
    
    
    if ($countfiles !== "") {
        $filename = $_FILES['file']['name'];
        
        
        // var_dump($countfiles == 0);die;
        if ($countfiles == "" || empty($title)) {
            $error = 1;
        } else {
            if ($title) {
                $char_title = chktitle($title);
                $length_title = chklen100($title);

                if (empty($char_title) || empty($length_title)) {
                    $error = 1;
                }
            }
            if ($doc_type == 'images') {
                if ($filename) {
                    $check_img = chkfilepdf_img($filename);
                    $length_img = chklen100($filename);
                    if (empty($check_img) || empty($length_img)) {
                        $error = 1;
                    }
                }
            }

            if ($doc_type == 'documents') {
                if ($filename) {
                    $check_pdf = chkfilepdf($filename);
                    $length_filename = chklen100($filename);
                    if (empty($check_pdf) || empty($length_filename)) {
                        $error = 1;
                    }
                }
            }

            if ($doc_type == 'videos') {
                if ($filename) {
                    $check_video = chkfilepdf_video($filename);
                    $length_video = chklen100($filename);
                    if (empty($check_video) || empty($length_video)) {
                        $error = 1;
                    }
                }
            }
        }
    } else {

        $countfiles = $_FILES['files']['name'];

        if ($countfiles == "") {
            $error = 1;
        } else {

            $doc_type = $_POST['doc_type'];

            if ($title) {
                $char_title = chktitle($title);
                $length_title = chklen100($title);

                if (empty($char_title) || empty($length_title)) {
                    $error = 1;
                }
            }
            if ($doc_type == 'images') {
                for ($index = 0; $index < $countfiles; $index++) {
                    // if ($filename) {
                    $check_img = chkfilepdf_img($_FILES['files']['name'][$index]);
                    $length_img = chksize($_FILES['files']['size'][$index]);
                    if (empty($check_img) || empty($length_img)) {
                        $error = 1;
                        break;
                    }
                    // }
                }
            }

            if ($doc_type == 'documents') {

                for ($index = 0; $index < $countfiles; $index++) {
                    $check_pdf = chkfilepdf($_FILES['files']['name'][$index]);
                    $length_pdf = chksize($_FILES['files']['size'][$index]);
                    if (empty($check_pdf) || empty($length_pdf)) {
                        $error = 1;
                        break;
                    }
                }
            }

            if ($doc_type == 'videos') {
                for ($index = 0; $index < $countfiles; $index++) {
                    $check_video = chkfilepdf_video($_FILES['files']['name'][$index]);
                    $length_video = chksize($_FILES['files']['size'][$index]);
                    if (empty($check_video) || empty($length_video)) {
                        $error = 1;
                    }
                }
            }
        }
    }
    // echo $error;
    // exit;
    if ($_POST['type'] == "single") {
        redirect_error($error);
        if ($error != 1) {
            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                // File name
                if ($mst_row['foldername'] == '') {
                    $upload_location = "../uploads/media/";
                } else {
                    $upload_location = '../uploads/media/' . $mst_row['foldername'] . '/';
                }

                $name = $_FILES['file']['name'];
                $filename = $_FILES['file']['name'];
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $fileName =  basename(pathinfo($filename)['filename']) . date('YmdHis') . '.' . $ext;

                // $new_filename =   pathinfo($filename)['filename'];
                // $random_name = $new_filename . $currdate;

                $filesize = $_FILES['file']['size'] / 1024;
                $exact_filesize = round($filesize) . "Kb";
                //   $new_name =  $random_name . '.' . $ext;

                $title = $_REQUEST['title'];
                $alt_title = $_REQUEST['alt_title'];
                $folder_id = $_REQUEST['folder_id'];
                //         $random_name = $filename . $currdate;
                // Get extension
                //$files_arr = $title;
                // Valid image extension
                $valid_ext = array("png", "jpeg", "jpg", "pdf", "mp4", "mp3");

                // Check extension
                if (in_array($ext, $valid_ext)) {

                    // File path
                    $path = $upload_location . $fileName;

                    // Upload file
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

                        $sql = "insert into mst_media(title,alt_title,filename,alt_filename,filesize,file_extension,folder_id,inserted_by,uploaded_on,updated_on) values('$title','$alt_title','$name','$fileName','$exact_filesize','$ext',$folder_id,'$sessionId','$currdate','$currdate')";
                        // exit;
                        $result = pg_query($db, $sql);

                        if ($result) {
                            // $userData = pg_fetch_assoc($result);
                            $files_arr['status'] = 'ok';
                            $files_arr['result'] = $sql;
                        } else {
                            // $userData = pg_fetch_assoc($result);
                            $files_arr['status'] = 'error';
                            // $data['result'] = '';
                            $files_arr['result'] = $sql;
                        }
                    }
                } else {
                    $files_arr['status'] = 'error';
                }
            }
        } else {
            $files_arr['status'] = 'error';
            $files_arr['data'] = $error;
        }

        // exit;
    } else {
        redirect_error($error);
        if ($error != 1) {
            $countfiles = count($_FILES['files']['name']);

            // Upload Location
            if ($mst_row['foldername'] == '') {
                $upload_location = "../uploads/media/";
            } else {
                $upload_location = '../uploads/media/' . $mst_row['foldername'] . '/';
            }

            // To store uploaded files path
            $files_arr = array();

            // Loop all files
            for ($index = 0; $index < $countfiles; $index++) {

                if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
                    // File name
                    $name = $_FILES['files']['name'][$index];
                    $fileName =  date('YmdHis') . basename($_FILES['files']['name'][$index]);
                    $filename = $_FILES['files']['name'][$index];
                    $alt_filename = $_FILES['files']['name'][$index];
                    $new_filename =   pathinfo($filename)['filename'];
                    $random_name = $new_filename . $currdate;
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $filesize = $_FILES['files']['size'][$index] / 1000;
                    $exact_filesize = round($filesize) . "Kb";
                    $new_name =  $random_name . '.' . $ext;
                    $folder_id = $_REQUEST['folder_id'];
                    //         $random_name = $filename . $currdate;
                    // Get extension

                    // Valid image extension
                    $valid_ext = array("png", "jpeg", "jpg", "pdf", "mp4", "mp3");

                    // Check extension
                    if (in_array($ext, $valid_ext)) {

                        // File path
                        $alt_path = $upload_location . $alt_filename;
                        $path = $upload_location . $fileName;
                        $alt_filename1 = basename($alt_path);         // $file is set to "index.php"
                        $alt_title = basename($alt_path, '.' . $ext); // $file is set to "index"
                        // Upload file
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {

                            $sql = "insert into mst_media(title,alt_title,filename,alt_filename,filesize,file_extension,folder_id,inserted_by,uploaded_on,updated_on) values('$alt_title','','$name','$fileName','$exact_filesize','$ext',$folder_id,'$sessionId','$currdate','$currdate')";
                            // exit;
                            $result = pg_query($db, $sql);

                            if ($result) {
                                // $userData = pg_fetch_assoc($result);
                                $files_arr['status'] = 'ok';
                                $files_arr['result'] = $sql;
                                $files_arr['type'] = $_POST['type'];
                            } else {
                                // $userData = pg_fetch_assoc($result);
                                $files_arr['status'] = 'error';
                                // $data['result'] = '';
                                $files_arr['result'] = $sql;
                                $files_arr['type'] = $_POST['type'];
                            }
                        }
                    } else {
                        $files_arr['status'] = 'error';
                    }
                }
            }
        } else {
            $files_arr['status'] = 'error';
            $files_arr['data'] = $error;
        }
    }
    echo json_encode($files_arr);
    exit;
} else if ($operation == 'add_folder') {

    $folder_name = trim($_POST['foldername']);
    $folder_name = chkbadchar($folder_name);
    if (
        empty($folder_name)
    ) {

        $error = 1;
    } else {
        if ($folder_name) {
            $length_folder_name = chklen100($folder_name);
            $check_folder_name = chkmediatitle($folder_name);
            if (empty($length_folder_name) || empty($check_folder_name)) {
                $error = 1;
            }
        }
    }
    redirect_error($error);
    if ($error != 1) {
        $output_dir = '../uploads/media/';
        if (!file_exists($output_dir . $folder_name))/* Check folder exists or not */ {
            if (@mkdir($output_dir . $folder_name, 0777)) {
                chown($output_dir . $folder_name, "niot");
                $media_query = "insert into mst_mediafolder(foldername,inserted_by,uploaded_on) values('$folder_name',$sessionId,'$currdate')";
                $result_media = pg_query($db, $media_query);
                if ($result_media) {
                    $data['status'] = 'ok';
                    $data['data'] = $media_query;
                } else {
                    $data['status'] = 'err';
                    $data['data'] = $media_query;
                }
            } else {
                $data['status'] = 'err';
            }
        }
    } else {
        $data['status'] = 'err';
        $data['data'] = $error;
    }
    echo json_encode($data);/* Success Message */
} else if ($operation == 'edit_folder') {

    $newfolder_name = trim($_POST['foldername']);
    $newfolder_name = chkbadchar($newfolder_name);
    $folder_id = $_POST['folder_id'];
    if (
        empty($newfolder_name) || empty($folder_id)
    ) {

        $error = 1;
    } else {
        if ($newfolder_name) {
            $length_newfolder_name = chklen100($newfolder_name);
            $check_newfolder_name = chkmediatitle($newfolder_name);
            //echo $check_newfolder_name;
            if (empty($length_newfolder_name) || empty($check_newfolder_name)) {
                $error = 1;
            }
        }

        if ($folder_id) {
            $char_folder_id = chkint($folder_id);
            if (empty($char_folder_id)) {
                $error = 1;
            }
        }
    }
    redirect_error($error);
    if ($error != 1) {


        $get_previous = "select foldername from mst_mediafolder where status='L' and folder_id = $folder_id";
        $result_old = pg_query($db, $get_previous);
        $get_oldname = pg_fetch_array($result_old);

        $output_dir = '../uploads/media';
        if (rename(realpath($output_dir) . '/' . $get_oldname['foldername'], realpath($output_dir) . '/' . $newfolder_name)) {
            $edit_query = "update mst_mediafolder set foldername = '$newfolder_name',updated_by = $sessionId,updated_on = '$currdate' where folder_id = $folder_id";
            $result_media = pg_query($db, $edit_query);

            if ($result_media) {
                $data['status'] = 'ok';
                $data['result'] = $edit_query;
            } else {
                $data['status'] = 'error';
                $data['result'] = $edit_query;
            }
        } else {
            $data['status'] = 'err';
            $data['result'] = $get_oldname['foldername'];
        }
    } else {
        $data['status'] = 'error';
        $data['result'] = $error;
    }
    echo json_encode($data);
} else if ($operation == 'delete_folder') {

    $folder_id = $_POST['folder_id'];
    $folder_name = $_POST['foldername'];
    if (
        empty($folder_name) || empty($folder_id)
    ) {
        $error = 1;
    } else {
        if ($folder_name) {
            $length_folder_name = chklen100($folder_name);
            $check_folder_name = chkmediatitle($folder_name);
            //echo $check_newfolder_name;
            if (empty($length_folder_name) || empty($check_folder_name)) {
                $error = 1;
            }
        }

        if ($folder_id) {
            $char_folder_id = chkint($folder_id);
            if (empty($char_folder_id)) {
                $error = 1;
            }
        }
    }
    redirect_error($error);
    if ($error != 1) {
        if ($folder_name) {
            $lengthfolder_name = chklen100($folder_name);
            $check_folder_name = chkmediatitle($folder_name);
            //echo $check_newfolder_name;
            if (empty($length_folder_name) || empty($check_folder_name)) {
                $error = 1;
            }
        }

        if ($folder_id) {
            $char_folder_id = chkint($folder_id);
            if (empty($char_folder_id)) {
                $error = 1;
            }
        }
    }

    redirect_error($error);
    if ($error != 1) {


        // $get_previous = "select foldername from mst_mediafolder where status='L' and folder_id = $folder_id";
        // $result_old = pg_query($db, $get_previous);
        // $get_oldname = pg_fetch_array($result_old);
        $oldoutput_dir = '../uploads/media/';
        $newoutput_dir = '../uploads/media/deleted_media/';
        $delete_name = date('YmdHis');

        $source_file = '../uploads/media/' . $folder_name;
        $destination_path = '../uploads/media/deleted_media/' . $delete_name . '';
        if (rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME))) {

            $delete_query = "update mst_mediafolder set status='N',updated_by = '$sessionId',updated_on = '$currdate' where folder_id = $folder_id";
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
        }
    } else {
        $data['status'] = 'err';
        $data['data'] = $error;
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
} else if ($operation == 'edit_media') {

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
        $edit_query = "update mst_media set title = '$title',updated_by = '$sessionId',updated_on = '$currdate' where media_id = $media_id";
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

    // $folder_id = $_POST['folder_id'];
    // $filename = $_POST['filename'];
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
