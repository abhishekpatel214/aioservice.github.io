<?php

$mysqli = new mysqli('localhost','root','','aioservice');

// output any connection error
if($mysqli->connect_error)
{
    die('Error : ('. $mysqli->connect_error .') '. $mysqli->connect_error);
}

session_start();

$curr_user_id = $_SESSION['username']['user_id'];

 // value to be inserted
$name = '"'.$mysqli->real_escape_string($_POST["username"]).'"';
$email = '"'.$mysqli->real_escape_string($_POST["email"]).'"';
$mobile = '"'.$mysqli->real_escape_string($_POST["mobile"]).'"';
$address = '"'.$mysqli->real_escape_string($_POST["address"]).'"';
 $category = '"'.$mysqli->real_escape_string($_POST["category"]).'"';
 $location = '"'.$mysqli->real_escape_string($_POST["location"]).'"';


 // mysql query
 $insert_row = $mysqli->query("UPDATE users SET (user_name, user_email, user_mobile, user_address, user_cate, user_locat) VALUES($name, $email, $mobile, $address, $category, $location) WHERE user_id = $curr_user_id");
  
 if($insert_row)
 {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Register');
    window.location.href='../profile.php';
    </script>");
 
 }
 else
 {
  die('Error : ('. $mysqli->errno .') '. $mysqli->error);
 }

?>