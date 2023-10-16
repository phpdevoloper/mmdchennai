<?Php
include("db_connection.php");
 session_start();


 $user_check = $_SESSION['admin_username'];
 
 $ses_sql = "SELECT user_id,username FROM mst_login WHERE username = '$user_check'";

 $res = pg_query($db,$ses_sql);
 
 $row = pg_fetch_assoc($res);
 
 $login_session = $row['username'];
 // $login_userId = $row['userId'];
 $_SESSION['userId'] = $row['user_id'];
 
 if (!isset($_SESSION['admin_username'])) {
     header('location:login.php');
     die();
    }
