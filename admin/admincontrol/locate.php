<?php

$mysqli = new mysqli('localhost','root','','aioservice');

// output any connection error
if($mysqli->connect_error)
{
    die('Error : ('. $mysqli->connect_error .') '. $mysqli->connect_error);
}
 // value to be inserted
$locate = '"'.$mysqli->real_escape_string($_POST["locate"]).'"';



 // mysql query
 $insert_row = $mysqli->query("INSERT INTO location (locat_name) VALUES($locate)");
  
 if($insert_row)
 {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added !!');
    window.location.href='../addlocate.php';
    </script>");
 
 }
 else
 {
  die('Error : ('. $mysqli->errno .') '. $mysqli->error);
 }

?>