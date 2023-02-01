<?php
if (isset($_POST['submit'])) {
// value to be inserted
$name = $_POST["name"];

$tittle = $_POST["tittle"];
$desc = $_POST["desc"];
$email = $_POST["email"];
$insta = $_POST["insta"];
$fb = $_POST["fb"];

$$image = $_FILES['image']['name'];
$tmp_cat = $_FILES['image']['tmp_name'];
$cat_image_size = $_FILES['image']['size'];
$cat_image_type = $_FILES['image']['type'];

move_uploaded_file($tmp_cat,"../uploads/about_uploads/".$image);

 // mysql query
 $insert_row = $mysqli->query("INSERT INTO about (about_image, about_name, about_tittle, about_desc, about_email, about_insta, about_fb) VALUES($image, $name, $tittle, $desc, $email, $insta, $fb)");
  
 if($insert_row)
 {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added !!');
    window.location.href='../addabout.php';
    </script>");
 
 }
 else
 {
  die('Error : ('. $mysqli->errno .') '. $mysqli->error);
 }
}
 ?>