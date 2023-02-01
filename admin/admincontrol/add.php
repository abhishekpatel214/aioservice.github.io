<?php

$mysqli = new mysqli('localhost','root','','aioservice');

// output any connection error
if($mysqli->connect_error)
{
    die('Error : ('. $mysqli->connect_error .') '. $mysqli->connect_error);
}
 // value to be inserted
$name = '"'.$mysqli->real_escape_string($_POST["username"]).'"';
$email = '"'.$mysqli->real_escape_string($_POST["email"]).'"';
$mobile = '"'.$mysqli->real_escape_string($_POST["mobile"]).'"';

$password = '"'.$mysqli->real_escape_string($_POST["password"]).'"';
$cfpassword = '"'.$mysqli->real_escape_string($_POST["cpassword"]).'"';

 
$query1 = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$email' or `user_mobile` = '$mobile'");

if(mysqli_num_rows($query1)>0){
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('Email or Mobile Arledy Register');
  window.location.href='../admin.php';
  </script>");
  
die();
}
else{
 // mysql query
 $insert_row = $mysqli->query("INSERT INTO users (user_name, user_email, user_mobile, user_password, user_role, user_config) VALUES($name, $email, $mobile, $password, 'admin', 'valid')");
  
 if($insert_row)
 {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added !!');
    window.location.href='../admin.php';
    </script>");
 
 }
 else
 {
  die('Error : ('. $mysqli->errno .') '. $mysqli->error);
 }
}
?>
