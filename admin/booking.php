<?php

include 'header_nav.php';
?>



<div class="col-xs-6">

   
    <?php
    $curr_user_locate = $_SESSION['username']['user_locat'];


    $query = "SELECT * FROM `oderdetail` WHERE `alert` = '1' or `user_location` = '$curr_user_locate' ";
    $select_services = mysqli_query($connection, $query);





    ?>


    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>

                <th>Order Id</th>

                <th>User Id</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Mobile</th>
                <th>User Address</th>
                <th>Location</th>
                <th>Payment Mode</th>
                <th>Booking Date</th>
                <th>Bookin Time</th>


            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_services)) {

                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $username = $row['user_name'];
                $user_email = $row['user_email'];
                $user_mobile = $row['user_mobile'];
                $user_address = $row['user_address'];
                $user_location = $row['user_location'];
                $paymode = $row['paymode'];
                $order_date = $row['order_date'];
                $order_time = $row['order_time'];


                echo "<tr>";


                echo "<td> {$order_id} </td>";
                echo "<td> $user_id </td>";
                echo "<td> $username </td>";
                echo "<td> $user_email </td>";
                echo "<td> $user_mobile </td>";
                echo "<td> $user_address </td>";
                echo "<td> $user_location </td>";
                echo "<td> $paymode </td>";
                echo "<td> $order_date </td>";
                echo "<td> $order_time </td>";
                echo "<td> 

                <table class='table table-striped data-table'>
                <thead>
            <tr>

                

              
                <th>Service Name</th>
                <th>Image</th>
                <th>Service Cate</th>
                
                <th>Price</th>
                <th>Date</th>
                <th>Confirm</th>
                <th>Decline</th>
                

            </tr>
        </thead>
        <tbody>   
        ";

                $Order = "SELECT * FROM `user_order` WHERE order_id = '$order_id' and `trash` = '1'";
                $order_sele = mysqli_query($connection, $Order);
                while ($row = mysqli_fetch_assoc($order_sele)) {

                    $s_price  = $row['item_price'];
                    $s_name = $row['item_name'];
                    $s_image = $row['item_image'];
                    $s_cate = $row['item_cate'];
                    echo "
        <tr>
        <td> $row[item_name]  </td>
        <td> <img src='../uploads/service_uploads/" . $row['item_image'] . "'  width='100px' height='100px'> </td> 
        <td> $row[item_cate]  </td>     
        <td>$row[item_price]  </td>   
        <td> $row[order_at]  </td> 
        <td><a href='../admin/booking.php?confirm=$order_id'>confirm</a></td>
        <td><a href='../admin/booking.php?decline=$order_id'>Decline</a></td>
                
            ";
                }

                echo "
        </tbody>
        </table>
    
                
                
                </td>";



                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>
<?php

$curr_user_id = $_SESSION['username']['user_id'];
$curr_user_name = $_SESSION['username']['user_name'];
$curr_user_email = $_SESSION['username']['user_email'];
$curr_user_mobile = $_SESSION['username']['user_mobile'];



if (isset($_GET['decline'])) {

$order1_id = $_GET['decline'];
$query1 = "UPDATE `user_order` SET `trash` = '$curr_user_id' WHERE order_id = '$order_id'";

$bookindone1 = mysqli_query($connection, $query1);

if (!$bookindone1) {
    die("Query Failed" . mysqli_error($connection));
}
}





// email section

if (isset($_GET['confirm'])) {



    $to = "$user_email";
    $subject = "Thanks For Booking Our Service";
    $message = "


Hi $username ,




Thanks for chhosing AIOservice!

Our vender $curr_user_name came at your location $user_address on the date of  $order_date between$order_time .

Your total Payable amount is $s_price .

vendar Contact Details:

Vendar Name : $curr_user_name 
Vendar Email : $curr_user_email
Vendar Mobile :$curr_user_mobile

Have a great day!
AIOservice

";
    $from = "bpccs.abhipatel007@gmail.com";
    $headers = "FROM : $from";

    mail($to, $subject, $message, $headers);

    if (mail($to, $subject, $message, $headers)) {
        echo ("<script LANGUAGE='JavaScript'>
window.alert('Successfully Email Sent');

</script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
window.alert('Error While Sending Email Please Try Again!!');

</script>");
    }
    // end email




    // save to bookings details



    $query4 = "INSERT INTO `booked_service`(`order_id`, `user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_location`, `order_date`, `order_time`, `item_name`, `item_image`, `item_cate`, `paymode`, `item_price`, `vender_id`, `vender_name`, `vender_email`, `vender_mobile`, `status`) VALUES('$order_id', '$user_id', '$username', '$user_email', '$user_mobile', '$user_address', '$user_location', '$order_date', '$order_time', '$s_name', '$s_image', '$s_cate', '$paymode', '$s_price', '$curr_user_id', '$curr_user_name', '$curr_user_email', '$curr_user_mobile', 'pending')";
    $bookedw = mysqli_query($connection, $query4);

    if (!$bookedw) {
        die("Query Failed" . mysqli_error($connection));
    }
     else {
        $order_id = $_GET['confirm'];
        $query = "UPDATE `oderdetail` SET `alert` = '2' WHERE order_id = '$order_id'";

        $bookindone = mysqli_query($connection, $query);

        if (!$bookindone) {
            die("Query Failed" . mysqli_error($connection));
        }


        
    }
}



?>





<?php

include 'footer.php';

?>