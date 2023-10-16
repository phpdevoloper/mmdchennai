<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
$operation = $_POST['operation'];
$title = $_POST['title'];
$title = chkbadchar($title);
$name = $_POST['name'];
$name = chkbadchar($name);
$address = $_POST['address'];
$address = chkbadchar($address);
$email = $_POST['email'];
$email = chkbadchar($email);
$phone = $_POST['phone'];
$phone = chkbadchar($phone);
$designation = $_POST['designation'];
$designation = chkbadchar($designation);
$fax = $_POST['fax'];
$fax = chkbadchar($fax);

$sessionId = $_SESSION['current_user_id'];
$sessionId = chkbadchar($sessionId);
$currdate = date('Y-m-d h:i:s');
$cont_id = $_POST['cont_id'];
$cont_id = chkbadchar($cont_id);


if ($operation == 'save') {
    if (
        empty($title) || empty($name) || empty($address) || empty($email) || empty($phone)
    ) {

        $error = 1;
    } else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen500($title);
            if (empty($char_title) || empty($length_title)) {

                $error = 1;
            }
        }
        if ($name) {
            $char_name = checkrtidoctitle($name);
            $length_name = chklen500($name);
            if (empty($char_name) || empty($length_name)) {

                $error = 1;
            }
        }
        if ($address) {
            $char_address = checkrtidoctitle($address);
            $length_address = chklen5000($address);
            if (empty($char_address) || empty($length_address)) {

                $error = 1;
            }
        }
        if ($email) {
            $char_email = chktitle($email);
            $length_email = chklen200($email);
            $valid_email = isValidEmailFormat($email);

            if (
                empty($char_email) ||
                empty($length_email) ||
                empty($valid_email)
            ) {

                $error = 1;
            }
        }
        if ($phone) {
            $length_phone = chklen50($phone);
            $valid_phone = checkrtidoctitle($phone);
            if (empty($length_phone) || empty($valid_phone)) {
                $error = 1;
            }
        }
        if ($designation) {
            $char_designation = checkrtidoctitle($designation);
            $length_designation = chklen500($designation);
            if (empty($char_designation) || empty($length_designation)) {

                $error = 1;
            }
        }
        if ($fax) {
            $length_fax= chklen50($fax);
            $valid_fax = checkrtidoctitle($fax);
            if (empty($length_fax) || empty($valid_fax)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $query = "insert into mst_contactus (title,name,address,email,phone,designation,fax,inserted_by,uploaded_on,updated_on) 
        values('$title','$name','$address','$email','$phone','$designation','$fax','$sessionId','$currdate','$currdate')";
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
    if (empty($cont_id)) {
        $error = 1;
    } else {
        if ($cont_id) {
            $char_cont_id = chkint($cont_id);
            if (empty($char_cont_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mst_contactus where cont_id = $cont_id";
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
        empty($title) || empty($name) || empty($address) || empty($email) || empty($phone)
    ) {

        $error = 1;
    } else {
        if ($title) {
            $char_title = checkrtidoctitle($title);
            $length_title = chklen500($title);
            if (empty($char_title) || empty($length_title)) {

                $error = 1;
            }
        }
        if ($name) {
            $char_name = checkrtidoctitle($name);
            $length_name = chklen500($name);
            if (empty($char_name) || empty($length_name)) {

                $error = 1;
            }
        }
        if ($address) {
            $char_address = checkrtidoctitle($address);
            $length_address = chklen5000($address);
            if (empty($char_address) || empty($length_address)) {

                $error = 1;
            }
        }
        if ($email) {
            $char_email = chktitle($email);
            $length_email = chklen200($email);
            $valid_email = isValidEmailFormat($email);

            if (
                empty($char_email) ||
                empty($length_email) ||
                empty($valid_email)
            ) {

                $error = 1;
            }
        }
        if ($phone) {
            $length_phone = chklen50($phone);
            $valid_phone = checkrtidoctitle($phone);
            if (empty($length_phone) || empty($valid_phone)) {
                $error = 1;
            }
        }
        if ($designation) {
            $char_designation = checkrtidoctitle($designation);
            $length_designation = chklen500($designation);
            if (empty($char_designation) || empty($length_designation)) {

                $error = 1;
            }
        }
        if ($fax) {
            $length_fax= chklen50($fax);
            $valid_fax = checkrtidoctitle($fax);
            if (empty($length_fax) || empty($valid_fax)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "update mst_contactus set title='$title',name ='$name',address='$address',
        email='$email',phone='$phone', designation ='$designation',fax='$fax',  updated_by ='$sessionId' ,updated_on='$currdate'  where  cont_id=$cont_id";
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
            'Update mst_contactus SET position_order=' .
            $i .
            ' WHERE cont_id=' .
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
        empty($cont_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($cont_id) {
            $char_cont_id = chkint($cont_id);
            if (empty($char_cont_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {
        $edit_query = "update  mst_contactus set status= '$status' where cont_id = $cont_id ";
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
