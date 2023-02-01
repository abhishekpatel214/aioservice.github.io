<?php 
require_once '../includes/db.php';

if(isset($_GET['search'])){
   $search = $_GET['search'];
   echo $_GET['search'];
//    $search = "%$search%";

   if(strlen($search) > 2){
       //$sql = "SELECT * FROM users WHERE  user_name LIKE '%$search%' or user_email LIKE '%$search%' or user_mobile LIKE '%$search%' or user_id LIKE '%$search%' or user_address LIKE '%$search%' or user_locat LIKE '%$search%'";
     

       $sql = "SELECT * FROM `booked_service` WHERE `book_id` LIKE '%$search%' or `order_id` LIKE '%$search%' or `user_id` LIKE '%$search%' or `user_name` LIKE '%$search%' or `user_email` LIKE '%$search%' or `user_mobile` LIKE '%$search%' or `user_address` LIKE '%$search%' or `user_location` LIKE '%$search%' or `order_date` LIKE '%$search%' or `order_time` LIKE '%$search%' or `item_name` LIKE '%$search%' or `item_image` LIKE '%$search%' or `item_cate` LIKE '%$search%' or `paymode` LIKE '%$search%' or `item_price` LIKE '%$search%' or `vender_id` LIKE '%$search%' or `vender_name` LIKE '%$search%' or `vender_email` LIKE '%$search%' or `vender_mobile` LIKE '%$search%' or `status` LIKE '%$search%'";
       $select_users = mysqli_query($connection, $sql);
       
    //    mysqli_stmt_execute($stmt);
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
    


<table id="example" class="table table-striped data-table" style="width: 100%">
<thead>
    <tr>
    
    <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>

                            <th>Cetegory</th>
                            <th>Location</th>
                            <th>adhar Card</th>
                            <th>Pan Card</th>
                            <th>Registration Certi.</th>
                            <th>User_role</th>
                            <th>Joined At</th>
                
        

    </tr>
</thead>
<tbody>


<?php
   $query = "SELECT *  FROM  users WHERE `user_id` LIKE '%$search%' or `user_name` LIKE '%$search%' or `user_email` LIKE '%$search%' or `user_mobile` LIKE '%$search%' or `user_address` LIKE '%$search%' or `user_cate` LIKE '%$search%' or `user_locat` LIKE '%$search%' or `user_adhar` LIKE '%$search%' or `user_pan` LIKE '%$search%' or `user_certi` LIKE '%$search%' or `user_role` LIKE '%$search%'";
   $select_users = mysqli_query($connection, $query);

   while ($row = mysqli_fetch_assoc($select_users)) {
       $user_id = $row['user_id'];
       $username = $row['user_name'];
       $user_email = $row['user_email'];
       $user_mobile = $row['user_mobile'];
       $user_address = $row['user_address'];
       $user_category = $row['user_cate'];
       $user_locat = $row['user_locat'];
       $user_adhar = $row['user_adhar'];
       $user_pan = $row['user_pan'];
       $user_certi = $row['user_certi'];
       $user_role = $row['user_role'];
       $user_date = $row['created_at'];
        


   }
   ?>
 <tr>
                                <td><?php echo $user_id ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_mobile ?></td>

                                <td><?php echo $user_category ?></td>
                                <td><?php echo $user_locat ?></td>



                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_adhar ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_pan ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_certi ?>"></td>
                                <td><?php echo $user_role ?></td>
                                <td><?php echo $user_date ?></td>
<?php


  


        

       }
    }


?>
</tbody>
</table>

</body>
</html>