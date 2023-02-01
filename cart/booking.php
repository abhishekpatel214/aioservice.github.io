<?php

session_start();



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$result = json_decode($result);

if ($result->status == 'success') {
    $result->country;
    $result->regionName;
    $city = $result->city;

    $result->query;
}


$connection = mysqli_connect("localhost",'root','','aioservice');

if(!$connection) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong');
    window.location.href='navcart.php';
    
    </script>");


}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['purchase'])) {

$query1 = "INSERT INTO oderdetail(`user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_location`, `paymode`, `order_date`, `order_time`, `alert`) VALUES('$_POST[userid]', '$_POST[username]', '$_POST[useremail]', '$_POST[usermobile]', '$_POST[address]', '$city', 'COD', '$_POST[servicedate]', '$_POST[servicetime]', '1')";

if(mysqli_query($connection,$query1))
{

$order_id=mysqli_insert_id($connection);

    $query2 = "INSERT INTO user_order( `order_id`, `item_name`, `item_image`, `item_cate`, `item_price`) VALUES(?, ?, ?, ?, ?)";

    $stmt=mysqli_prepare($connection,$query2);

    if($stmt){
        mysqli_stmt_bind_param($stmt,"isssi",$order_id,$name,$image,$cate,$price);

foreach($_SESSION['cart'] as $key => $value);
{
    $name = $value['item_name'];
    $image = $value['item_pic'];
    $cate = $value['category_name'];
    $price = $value['item_price'];
    


mysqli_stmt_execute($stmt);

}
unset($_SESSION['cart']);
echo ("<script LANGUAGE='JavaScript'>
window.alert('Service Booked');
window.location.href='../index.php';

</script>");
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('SQL Query Prepare ERROR');
        window.location.href='navcart.php';
        
        </script>");
    }
}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('SQL ERROR');
    window.location.href='navcart.php';
    
    </script>");
}


    }
}












/*
 
*/









 
?>