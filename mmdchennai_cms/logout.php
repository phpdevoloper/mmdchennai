<?php
session_start();
//echo "Logout Successfully ";
//  exit;
session_unset();
session_destroy(); // function that Destroys Session
header('Location: signin.php');
?>
