<?php include '../include/session.php';
include("../include/db_connection.php");
include '../include/checkval.php';
$currentyear = date("Y");
$previousyear = $currentyear - 1;

$sessionId = $_SESSION['userId'];


$feedback_id = $_POST['doc_id'];
$feedback_id = chkbadchar($feedback_id);
$operation = $_POST['operation'];
$operation = chkbadchar($operation);
$status = $_POST['status'];
$status = chkbadchar($status);
$pagename = $_POST['pagename'];
$pagename = chkbadchar($pagename);

if (empty($feedback_id) || empty($operation)) {
    $error = "something went wrong!";
}else {
    if ($operation == "status_change") {
        if ($feedback_id) {
            $feedb_id = chkint($feedback_id);
            if (empty($feedb_id)) {
                $error = 1;
            }
        }
        if ($error != 1) {
           
            $mainitems = "UPDATE mmd_feedback SET feedback_status = '$status',updated_by ='$sessionId'  WHERE feedback_id = '$feedback_id'";
            echo $mainitems;exit;   
            $resultcurrent = pg_query($db, $mainitems); 
            if ($resultcurrent) {
                $result['status'] = 'ok'; 
            }else {
                $result['status'] = 'error'; 
            }
            
            
        }

    }
}




?>
    
