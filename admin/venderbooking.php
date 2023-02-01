<?php

include 'header_nav.php';
?>



<div class="col-xs-6">


    <?php


    $curr_user_id = $_SESSION['username']['user_id'];
    $curr_user_name = $_SESSION['username']['user_name'];
    $curr_user_email = $_SESSION['username']['user_email'];
    $curr_user_mobile = $_SESSION['username']['user_mobile'];
    $curr_user_locate = $_SESSION['username']['user_locat'];
    $curr_user_cat = $_SESSION['username']['user_cate'];




    $query = "SELECT * FROM `booked_service` WHERE `vender_id` = '$curr_user_id' AND `status` = 'pending' AND `trash` = '1'";
    $select_services = mysqli_query($connection, $query);



    ?>


    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>

                <th>booking Id</th>
                <th>order Id</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Mobile</th>
                <th>Customer Location</th>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Service Name</th>
                <th>Service image</th>
                <th>Cetegory</th>
                <th>Vender Id</th>
                <th>Vender Name</th>
                <th>Vender Email</th>
                <th>Vender Mobile</th>
                <th>PayMode</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Mark As Done</th>


            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_services)) {
                $book_id = $row['book_id'];
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $user_mobile = $row['user_mobile'];
                $user_address = $row['user_address'];
                $user_locat = $row['user_location'];
                $order_date = $row['order_date'];
                $order_time = $row['order_time'];
                $item_name = $row['item_name'];
                $item_image = $row['item_image'];
                $item_cate = $row['item_cate'];
                $vender_id = $row['vender_id'];
                $vender_name = $row['vender_name'];
                $vender_email = $row['vender_email'];
                $vender_mobile = $row['vender_mobile'];
                $paymode = $row['paymode'];
                $item_price = $row['item_price'];
                $status = $row['status'];







                echo "<tr>";




                echo "<td> $book_id </td>";

                echo "<td> $order_id </td>";


                echo "<td> $user_id </td>";
                echo "<td> $user_name </td>";
                echo "<td>  $user_email </td>";
                echo "<td> $user_mobile </td>";
                echo "<td> $user_address </td>";

                echo "<td> $order_date </td>";
                echo "<td> $order_time </td>";
                echo "<td> $item_name </td>";
                echo "<td> <img src='../uploads/service_uploads/" . $item_image . "'  width='150px' height='150px'> </td>";
                echo "<td> $item_cate </td>";
                echo "<td> $vender_id </td>";
                echo "<td> $vender_name </td>";
                echo "<td>  $vender_email </td>";
                echo "<td> $vender_mobile </td>";
                echo "<td> $paymode  </td>";
                echo "<td> $item_price  </td>";
                echo "<td> $status  </td>";






                echo "<td><a href='../admin/venderbooking.php?confirm=$book_id'><span><i class='fas fa-check-circle'></i></span></a></td>";

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>


<?php



















$date = date('m/d/Y h:i:s', time());

if (isset($_GET['confirm'])) {
    $book_id = $_GET['confirm'];
    $query = "UPDATE booked_service SET `status` = 'Done at $date' WHERE book_id = '$book_id'";

    $bookindone = mysqli_query($connection, $query);

    if (!$bookindone) {
        die("Query Failed" . mysqli_error($connection));
    }



    if ($bookindone) {

        $to = "$user_email";
        $subject = "Thanks For Takking Our Service";
        $message = "


Hi $user_name ,




Thanks for Takking AIOservice!


Service Details:

Vendar Name : $curr_user_name 
Vendar Email : $curr_user_email
Vendar Mobile :$curr_user_mobile
Your location : $user_address 
date : $order_date 
Time : $order_time .

Your total Payable amount is $item_price .

Please Give us Your Feedback To Improve Our Service.
 
Click this Link for Feedback 
https://http://localhost/aioservice/feedform.php

If you Have Any Query Contact Us Via Our Chat Service At Home Page 
https://http://localhost/aioservice/index.php

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
    }
}
?>



<?php

include 'footer.php';

?>