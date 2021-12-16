<?php


session_start();

include('db.php');

if(isset($_POST['save-data']))
{
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_mobile = $_POST['c_mobile'];
    $c_address = $_POST['c_address'];
    $c_password = $_POST['c_password'];

    $postData = [
        'c_name' => $c_name,
        'c_email' => $c_email,
        'c_mobile' => $c_mobile,
        'c_address' => $c_address,
        'c_password' => $c_password,
    ];
    $ref_table = "customer";
$postRef = $database->getReference($ref_table)->push($postData);

 if($postRef)
 {
    $_SESSION['status'] = "Data Inserted successfully!!";
    header("location: index.php");
 }
 else
 {
    $_SESSION['status'] = "Data Not Inserted!!";
    header("location: registration.php");
 }
}

?>