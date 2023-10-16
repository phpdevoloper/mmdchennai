<?php include_once '../include/db_connection.php';
include '../include/checkval.php';
session_start();
$currdate = date('Y-m-d H:i:s');
// ini_set("session.cookie_path", "/niot_admin/");
$ip_address = $_SERVER['REMOTE_ADDR'];
$browser_name = getBrowser();
$get_login_trial1 = "select * from mmd_login_trial where ip_address = '$ip_address' and  login_time > NOW() - INTERVAL '30 minutes' and status='failed'";
// echo $get_login_trial1;/

$result_login_trial1 = pg_query($db, $get_login_trial1);
$get_failed_count1 = pg_num_rows($result_login_trial1);
$myusername = pg_escape_string($_REQUEST['username']);
$mypassword = pg_escape_string($_REQUEST['password']);
// echo $get_failed_count1;
// exit;
if ($get_failed_count1 < 3) {

    $checkusername = "SELECT user_id, password  FROM mst_login WHERE username = '$myusername' and status ='L' ";

    $result_username = pg_query($db, $checkusername);
    $username_count = pg_num_rows($result_username);
    $row = pg_fetch_array($result_username);

    //print_r($row['password']);

    $serverpassword = $row['password'];
    $clientmd5password = $_REQUEST['randompassword'];
    $randomnumber = $_REQUEST['randomnumber'];

    $le2passowrd = $randomnumber . $row['password'];

    $lastpass = hash('sha512', $le2passowrd);

    if ($lastpass == $clientmd5password) {
        $get_login_trial5 = "select * from mmd_login_trial where ip_address = '$ip_address' and  login_time > NOW() - INTERVAL '30 minutes' and status='failed'";
        // echo $get_login_trial1;/

        $result_login_trial5 = pg_query($db, $get_login_trial5);
        $get_failed_count5 = pg_num_rows($result_login_trial5);
        // echo $get_failed_count5;
        // echo 'exit';
        // exit;
        if ($get_failed_count5 < 3) {
            $insert_login  = "insert into mmd_login_trial(admin_username,ip_address,browser_name,login_time) values('$myusername','$ip_address','$browser_name','$currdate')";
            $result_trial = pg_query($db, $insert_login);

            if ($result_trial) {

                $error['status'] = 'ok';
                $error['count'] = $count;
                $_SESSION['current_user_id'] = $row['user_id'];
                $_SESSION['admin_username'] = $myusername;
                $_SESSION['logged_in'] = true;
                $_SESSION['notify'] = 1;
                $_SESSION['session_random_id_after'] = session_id();
            }
        } else {
            $insert_login6  = "insert into mmd_login_trial(admin_username,ip_address,browser_name,login_time,status) values('$myusername','$ip_address','$browser_name','$currdate','failed')";
            $result_trial6 = pg_query($db, $insert_login6);
            // echo $insert_login;
            if ($result_trial6) {
                $error['err_content'] = 'Your Account Has been Blocked , Please Try again After 30 Minutes';
                $error['status'] = 'invalid';
            }
        }
        echo json_encode($error);
    } else {
        $get_login_trial2 = "select * from mmd_login_trial where ip_address = '$ip_address' and  login_time > NOW() - INTERVAL '30 minutes' and status='failed'";
        $result_login_trial2 = pg_query($db, $get_login_trial2);
        $get_failed_count2 = pg_num_rows($result_login_trial2);
        if ($get_failed_count2 >= 3) {

            $error['err_content'] = 'Your Account Has been Blocked , Please Try again After 30 Minutes';
            $error['status'] = 'invalid';
        } else {
            $insert_login3  = "insert into mmd_login_trial(admin_username,ip_address,browser_name,login_time,status) values('$myusername','$ip_address','$browser_name','$currdate','failed')";
            $result_trial3 = pg_query($db, $insert_login3);
            // echo $insert_login;
            if ($result_trial3) {
                $error['err_content'] = 'Invalid Credentials! Please try again';
                $error['status'] = 'invalid';
                // $error['count'] = $username_count;

            }
        }
        echo json_encode($error);
    }
} else {
    $insert_login7  = "insert into mmd_login_trial(admin_username,ip_address,browser_name,login_time,status) values('$myusername','$ip_address','$browser_name','$currdate','failed')";
    $result_trial7 = pg_query($db, $insert_login7);
    // echo $insert_login;
    if ($result_trial7) {
        $error['err_content'] = 'Your Account Has been Blocked , Please Try again After 30 Minutes';
        $error['status'] = 'invalid';
    }
    echo json_encode($error);
}
