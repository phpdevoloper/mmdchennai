<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';
$operation = $_POST['operation'];
$title = $_POST['title'];
$title = chkbadchar($title);
$dept_id = $_POST['dept_id'];
$dept_id = chkbadchar($dept_id);
$division_id = $_POST['division_id'];
$division_id = chkbadchar($division_id);
$sessionId = $_SESSION['current_user_id'];
$sessionId = chkbadchar($sessionId);
$currdate = date('Y-m-d h:i:s');

$name = $_POST['name'];
$name = chkbadchar($name);
$designation = $_POST['designation'];
$designation = chkbadchar($designation);
$email = $_POST['email'];
$email = chkbadchar($email);
$phone = $_POST['phone'];
$phone = chkbadchar($phone);

$cont_id = $_POST['cont_id'];
$cont_id = chkbadchar($cont_id);

if ($operation == 'save_dept') {
    if (
        empty($title)
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
    }
    if ($error != 1) {
        $query = "insert into mst_whoswho_dept(title,inserted_by,uploaded_on,updated_on) values('$title','$sessionId','$currdate','$currdate')";
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
} elseif ($operation == 'get_edit_dept') {
    if (empty($dept_id)) {
        $error = 1;
    } else {
        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mst_whoswho_dept where dept_id = $dept_id";
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
} elseif ($operation == 'edit_dept') {
    if (
        empty($title) ||
        empty($dept_id)
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

        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "update mst_whoswho_dept set title ='$title', updated_by ='$sessionId' ,updated_on='$currdate'  where dept_id = $dept_id";
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
} elseif ($operation == 'swipe_dept') {
    $position = $_POST['position'];
    $position = chkbadchar($position);

    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mst_whoswho_dept SET position_order=' .
            $i .
            ' WHERE dept_id=' .
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
} else if ($operation == "status_change_dept") {
    $status = $_POST['status'];
    $status = chkbadchar($status);
    if (
        empty($dept_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mst_whoswho_dept set status= '$status' where dept_id = $dept_id ";
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
} else if ($operation == "set_session_dept") {

    if (
        empty($dept_id)

    ) {
        $error = 1;
    } else {
        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {
        $_SESSION['session_dept_id'] = $dept_id;
        $files_arr['valid'] = true;
    } else {
        $files_arr['valid'] = false;
    }
    echo json_encode($files_arr);
} else if ($operation == 'save_division') {
    if (
        empty($title) || empty($dept_id)
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
        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $query = "insert into mst_whoswho_division (div_title,mas_dept_id,inserted_by,uploaded_on,updated_on) values('$title',$dept_id,'$sessionId','$currdate','$currdate')";
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
} elseif ($operation == 'get_edit_divsion') {
    if (empty($division_id) || empty($dept_id)) {
        $error = 1;
    } else {
        if ($division_id) {
            $char_division_id = chkint($division_id);
            if (empty($char_division_id)) {
                $error = 1;
            }
        }
        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mst_whoswho_division where mas_dept_id = $dept_id and div_id =$division_id ";
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
} elseif ($operation == 'edit_division') {
    if (
        empty($title) ||
        empty($dept_id) || empty($division_id)
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

        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
        if ($division_id) {
            $char_division_id = chkint($division_id);
            if (empty($char_division_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "update mst_whoswho_division set div_title ='$title', updated_by ='$sessionId' ,updated_on='$currdate'  where mas_dept_id = $dept_id and div_id =$division_id";
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
} elseif ($operation == 'swipe_division') {
    $position = $_POST['position'];
    $position = chkbadchar($position);

    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mst_whoswho_division SET position_order=' .
            $i .
            ' WHERE div_id=' .
            $v;

        $result = pg_query($db, $sql);

        $i++;
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    }
    echo json_encode($files_arr);
} else if ($operation == "status_change_division") {
    $status = $_POST['status'];
    $status = chkbadchar($status);
    if (
        empty($division_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($division_id) {
            $char_division_id = chkint($division_id);
            if (empty($char_division_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mst_whoswho_division set status= '$status' where div_id = $division_id ";
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
} else if ($operation == 'save_division_contents') {
    if (
        empty($name) || empty($designation)  || empty($dept_id)  || empty($division_id)
    ) {

        $error = 1;
    } else {
        if ($name) {
            $char_name = checkrtidoctitle($name);
            $length_name = chklen500($name);
            if (empty($char_name) || empty($length_name)) {
                
                $error = 1;
            }
        }
        if ($designation) {
            $char_designation = checkrtidoctitle($designation);
            $length_designation = chklen100($designation);
            if (empty($char_designation) || empty($length_designation)) {
               
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

        if ($dept_id) {
            $char_dept_id = chkint($dept_id);
            if (empty($char_dept_id)) {
                $error = 1;
            }
        }
        if ($division_id) {
            $char_division_id = chkint($division_id);
            if (empty($char_division_id)) {
                $error = 1;
            }
        }
        if ($phone) {
            $length_phone = chklen10($phone);
            $valid_phone = chkint($phone);
            if (empty($length_phone) || empty($valid_phone)) {

                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $query = "insert into mst_whoswho_contents (name,designation,email,phone,mas_dept_id,mas_division_id,inserted_by,uploaded_on,updated_on) values('$name','$designation','$email','$phone',$dept_id,$division_id,'$sessionId','$currdate','$currdate')";
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
} elseif ($operation == 'get_edit_division_contents') {
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
        $edit_query = "select * from mst_whoswho_contents where cont_id = $cont_id";
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
} elseif ($operation == 'edit_division_contents') {
    if (
        empty($name) || empty($designation)  || empty($cont_id)
    ) {
        $error = 1;
    } else {
        if ($name) {
            $char_name = checkrtidoctitle($name);
            $length_name = chklen500($name);
            if (empty($char_name) || empty($length_name)) {
                $error = 1;
            }
        }
        if ($designation) {
            $char_designation = checkrtidoctitle($designation);
            $length_designation = chklen100($designation);
            if (empty($char_designation) || empty($length_designation)) {
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
            $length_phone = chklen10($phone);
            $valid_phone = chkint($phone);
            if (empty($length_phone) || empty($valid_phone)) {
                $error = 1;
            }
        }
        if ($cont_id) {
            $char_cont_id = chkint($cont_id);
            if (empty($char_cont_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {
        $edit_query = "update mst_whoswho_contents set name ='$name',designation='$designation',email='$email',phone='$phone', updated_by ='$sessionId' ,updated_on='$currdate'  where  cont_id=$cont_id";
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
} elseif ($operation == 'swipe_division_contents') {
    $position = $_POST['position'];
    $position = chkbadchar($position);

    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mst_whoswho_contents SET position_order=' .
            $i .
            ' WHERE cont_id=' .
            $v;

        $result = pg_query($db, $sql);

        $i++;
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    }
    echo json_encode($files_arr);
} else if ($operation == "status_change_division_contents") {

    if (
        empty($cont_id)
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

        $edit_query = "update  mst_whoswho_contents set status= 'D' where cont_id = $cont_id ";
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
