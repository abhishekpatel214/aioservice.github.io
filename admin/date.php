<?php
include 'header_nav.php';
?>
<form action="" method="GET">
<div class="row">
<div class="col">
            
            <input type="text" class="form-control" name="search" placeholder="Name/Mobile/Email/Service/Category/Id">
        </div>
    
        <div class="col">
            

            <input type="date" class="form-control" name="1date">
        </div>
        <div class="col">
            
            <input type="date" class="form-control" name="2date">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
   
</div>
</form>
<br><br>

<?php


























if (isset($_GET['1date']) && isset($_GET['2date']) && isset($_GET['search'])) {

    $date1 = $_GET['1date'];
    $date2 = $_GET['2date'];
    $search = $_GET['search'];





?>


<form method="post" id="frm">
    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>
            <th>Download</th>
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



            </tr>
        </thead>
        <tbody>


        <?php

        $sql = "SELECT * FROM `booked_service` WHERE `book_id` LIKE '%$search%' or `order_id` LIKE '%$search%' or `user_id` LIKE '%$search%' or `user_name` LIKE '%$search%' or `user_email` LIKE '%$search%' or `user_mobile` LIKE '%$search%' or `user_address` LIKE '%$search%' or `user_location` LIKE '%$search%' or `order_date` LIKE '%$search%' or `order_time` LIKE '%$search%' or `item_name` LIKE '%$search%' or `item_image` LIKE '%$search%' or `item_cate` LIKE '%$search%' or `paymode` LIKE '%$search%' or `item_price` LIKE '%$search%' or `vender_id` LIKE '%$search%' or `vender_name` LIKE '%$search%' or `vender_email` LIKE '%$search%' or `vender_mobile` LIKE '%$search%' or `status` LIKE '%$search%' or `created_at` BETWEEN '$date1' AND '$date2'";
        $select_users = mysqli_query($connection, $sql);

      



            while ($row = mysqli_fetch_assoc($select_users)) {
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






                


                if (isset($_POST['ddd'])){
                    $dataid = $_POST['dataid'];

                }


echo "<td>

<form action='admin/pdf.php' method='post'>
<input type='hidden' name='dataid' value='$book_id'>

<button type='submit' name='ddd' ><i class='bi bi-arrow-down-circle'></i></button>
</form>


</td>";
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


                echo "</tr>";
            }
        }
   
    

        ?>
        </tbody>
    </table>
    </form>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  ></script>


<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 30%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#frm{
	margin-top:10px;
}
.link_delete{
	font-size: 20px;
    color: black;
    font-family: arial;
}
</style>



    <?php
    include 'footer.php';
    ?>