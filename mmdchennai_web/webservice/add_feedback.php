<?php
session_start();
include('../include/db_connection.php');
include '../include/checkval.php';
$currdate = date('Y-m-d h:i:s');



// $operation = $_REQUEST['operation'];

      
    // print_r($_FILES['file_can_cheque']);
    // exit;
   
    $txt_name = $_POST['name'];
    $txt_name = chkbadchar($txt_name);
    $txt_comments = $_POST['message'];
    $txt_comments = chkbadchar($txt_comments);
    // $txt_phone = $_POST['txt_phone'];
    // $txt_phone = chkbadchar($txt_phone);
    $txt_email = $_POST['email'];
    $txt_email = chkbadchar($txt_email);
    $token = chkbadchar($_POST['captcha_code']);
    // $txt_org_name = $_POST['txt_org_name'];
    // $txt_org_name = chkbadchar($txt_org_name);
    // $txt_address = $_POST['txt_address'];
    // $txt_address = chkbadchar($txt_address);
    if (empty($txt_name) || empty($txt_comments) || empty($txt_email)) {
        $error = 1;
    } else {
        if ($txt_name) {
            $char_txt_name = chkchar($txt_name);
            $length_txt_name = chklen200($txt_name);
            // var_dump($length_txt_name);die;
            
            if (empty($char_txt_name) || empty($length_txt_name)) {
                $error = 1;
            }
        }
        if ($txt_comments) {
            $char_txt_comments = chkchar($txt_comments);
            $length_txt_comments = chklen5000($txt_comments);
            // $special_txt_comments = specialcharacter_limit($txt_comments);
            // $validate_txt_comments = address($txt_comments);
            // var_dump($char_txt_comments,$length_txt_comments,$special_txt_comments,$validate_txt_comments);die;
            if (empty($char_txt_comments) || empty($length_txt_comments)) {
                $error = 1;
            }
        }
        // if ($txt_phone) {
        //     $length_txt_phone = chklen10($vendor_txt_phone);
        //     $valid_txt_phone = chkmobilephoneNumber($vendor_txt_phone);
        //     if (empty($length_txt_phone) ||  empty($valid_txt_phone)) {
        //         $error = 1;
        //     }
        // }
        if ($txt_email) {
            // $char_txt_email = chkchar($txt_email);
            
            // $length_txt_email = chklen200($txt_email);
            $valid_txt_email = isValidEmailFormat($txt_email);
            
            // var_dump($valid_txt_email);die;
            if (empty($valid_txt_email)) {
                $error = 1;
            }
        }
        // if ($txt_org_name) {
        //     $char_org_name = chkchar($txt_org_name);
        //     $length_org_name = chklen200($txt_org_name);
    
        //     if (empty($char_org_name) || empty($length_org_name)) {
        //         $error = 1;
        //     }
        // }
        // if ($txt_address) {
        //     $char_txt_address = chkchar($txt_address);
        //     $length_txt_address = chklen5000($txt_address);
        //     $special_txt_address = specialcharacter_limit($txt_address);
        //     $validate_txt_address = address($txt_address);
        //     if (empty($char_txt_address) || empty($length_txt_address) ||  empty($special_txt_address)  ||  empty($validate_txt_address)) {
        //         $error = 1;
        //     }
        // }
        // var_dump($token);die;
    
    if ($error != 1) {
            // $userData = pg_fetch_assoc($result);
            // var_dump($_SESSION['captcha_token']==$token);die;    
            if (isset($_SESSION['captcha_token']) && $_SESSION['captcha_token'] === $token) {

              
                $insert_feedback = "insert into mmd_feedback (user_name,user_email,feedback_msg,created_at) 
                values('$txt_name','$txt_email','$txt_comments','$currdate')";
                // echo $insert_feedback;die;
                $result_insert = pg_query($db, $insert_feedback);
                if ($result_insert) {
                    $files_arr['status'] = 'ok';
                    $files_arr['data'] = $insert_feedback;
                } else {
                    $files_arr['status'] = 'error';
                    $files_arr['data'] = $insert_feedback;
                }
            }else {
                $files_arr['status'] = 'cap_error';
            }
        
        } else {
            $files_arr['status'] = 'error';
            $files_arr['result'] = $error;
        }
       
    }
    echo json_encode($files_arr);

