<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';


$operation = $_POST['operation'];
$operation = chkbadchar($_POST['operation']);
$sessionId = $_SESSION['current_user_id'];
$user_name = $_POST['user_name'];
$user_name = chkbadchar($user_name);
$user_password = $_POST['pass'];
$user_password = chkbadchar($user_password);


if ($operation == "get_user") {
    $get_user = "select * from mst_login where user_id='$sessionId'";
    $result = pg_query($db, $get_user);
    $current_user = pg_fetch_assoc($result);
    echo json_encode(['status'=>true,'result'=>$current_user]);
           
}elseif ($operation == "update_user") {
    if (empty($user_name) || empty($user_password)) {
        echo $error = 500;
    }else {

        $user_password = hash('sha512', $user_password);

        $update_user = "UPDATE mst_login SET username = '$user_name',password='$user_password' where user_id='$sessionId'";
        $result = pg_query($db, $update_user);
        if (!$result){
            echo json_encode(['status'=>false,'msg'=>'Something went wrong in the database!']);
        }
        else
        {
            echo json_encode(['status'=>true,'msg'=>'User profile updated successfully :)']);
        }
    }
}




?>


