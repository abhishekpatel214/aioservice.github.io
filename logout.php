<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
 //to redirect back to "index.php" after logging out
 echo ("<script LANGUAGE='JavaScript'>
 window.alert('Logout Successfully!!');
 window.location.href='login.php';
 </script>");
exit();
?>