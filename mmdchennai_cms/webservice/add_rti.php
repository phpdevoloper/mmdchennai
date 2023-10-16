<?php
include('../include/db_connection.php');
include '../include/session.php';
include '../include/checkval.php';
// $host     = 'localhost';
// $db       = 'mst';
// $user     = 'postgres';
// $password = 'postgress';
// $dsn = "pgsql:host=$host;dbname=$db;port=5432;";

$content_value = $_REQUEST['value'];
$content = htmlentities($content_value);
$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$question = $_POST['question'];
$question = chkbadchar($question);
$answer = $_POST['answer'];
$answer = chkbadchar($answer);
$ques_id = $_POST['ques_id'];
$ques_id = chkbadchar($ques_id);
$currdate = date('Y-m-d h:i:s');
if ($operation == 'save_rti') {
    $get_services = "select * from mmd_rti where status='L' limit 1";
    $result_services = pg_query($db, $get_services);
    $row_services = pg_fetch_array($result_services);
    $row_sevices_count = pg_num_rows($result_services);
    if (empty($content)   || empty($sessionId)) {

        $error = 1;
    } else {
        if ($sessionId) {
            $char_sessionId = chkint($sessionId);
            if (empty($char_sessionId)) {

                $error = 1;
            }
        }
    }

    if ($error != 1) {

        if ($row_sevices_count == 0) {
            $sql = "INSERT INTO mmd_rti(contents,inserted_by) VALUES('$content','$sessionId' )";
        } else {
            $sql = "update mmd_rti set contents = '$content' where status ='L'";
        }

        $result = pg_query($db, $sql);
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'error';
        }
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} else if ($operation == 'save_rti_faq') {
    if (
        empty($question) ||  empty($answer)
    ) {
        $error = 1;
    } else {
        if ($question) {
            $char_question = checkrtidoctitle($question);
            $length_question = chklen500($question);
            if (empty($char_question) || empty($length_question)) {
                $error = 1;
            }
        }
        if ($answer) {
            $char_answer = checkrtidoctitle($answer);
            $length_answer = chklen5000($answer);
            if (empty($char_answer) || empty($length_answer)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $query = "insert into mmd_rti_faq(question,answer,inserted_by,uploaded_on,updated_on) values('$question','$answer','$sessionId','$currdate','$currdate')";
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
} elseif ($operation == 'get_edit_rti_faq') {
    if (empty($ques_id)) {
        $error = 1;
    } else {
        if ($ques_id) {
            $char_ques_id = chkint($ques_id);
            if (empty($char_ques_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "select * from mmd_rti_faq where ques_id = $ques_id";
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
} elseif ($operation == 'edit_rti_faq') {
    if (
        empty($question) ||  empty($answer) ||
        empty($ques_id)
    ) {
        $error = 1;
    } else {
        if ($question) {
            $char_question = checkrtidoctitle($question);
            $length_question = chklen500($question);
            if (empty($char_question) || empty($length_question)) {
                $error = 1;
            }
        }
        if ($answer) {
            $char_answer = checkrtidoctitle($answer);
            $length_answer = chklen5000($answer);
            if (empty($char_answer) || empty($length_answer)) {
                $error = 1;
            }
        }

        if ($ques_id) {
            $char_ques_id = chkint($ques_id);
            if (empty($char_ques_id)) {
                $error = 1;
            }
        }
    }
    if ($error != 1) {
        $edit_query = "update mmd_rti_faq set question ='$question',answer='$answer', updated_by ='$sessionId' ,updated_on='$currdate'  where ques_id = $ques_id";
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
} elseif ($operation == 'swipe_rti_faq') {
    $position = $_POST['position'];
    $position = chkbadchar($position);

    $i = 1;
    foreach ($position as $k => $v) {
        $sql =
            'Update mmd_rti_faq SET position_order=' .
            $i .
            ' WHERE ques_id=' .
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
} else if ($operation == "status_change_rti_faq") {
    $status = $_POST['status'];
    $status = chkbadchar($status);
    if (
        empty($ques_id) ||
        empty($status)
    ) {
        $error = 1;
    } else {
        if ($ques_id) {
            $char_ques_id = chkint($ques_id);
            if (empty($char_ques_id)) {
                $error = 1;
            }
        }
    }

    if ($error != 1) {

        $edit_query = "update  mmd_rti_faq set status= '$status' where ques_id = $ques_id ";
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
