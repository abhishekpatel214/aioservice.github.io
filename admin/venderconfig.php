<?php
include 'header_nav.php';
?>


<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['username']['user_role'] == 'customer') {
        header("Location: ../index.php");
    }
} else {
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
    }
}
?>
<div class="col-md-12 fw-bold fs-3">
    Pendding Venders
</div>
<br><br>
<div class="card-body">
    <div class="table-responsive">





        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = "";
        }

        switch ($source) {
            case 'update_user':
                include "admincontrol\update_user.php";
                break;

            default: ?>
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
                            <th>Delete</th>

                            <th>Confirm Vender</th>



                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT *  FROM  users WHERE user_config='not' and user_role='vender'";
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


                                <td><?php echo "<a href='venderconfig.php?delete=$user_id'>Delete</a>"; ?>
                                </td>

                                <td><?php echo "<a href='venderconfig.php?confirm=$user_id'>Confirm</a>"; ?>
                                </td>




                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        <?php
                break;
        }
        ?>

        <?php

        if (isset($_GET['delete'])) {

            $user_id = $_GET['delete'];

            $query =  "DELETE FROM `users` WHERE `users`.user_id = {$user_id} ";

            $delete_query = mysqli_query($connection, $query);

            if (!$delete_query) {
                die("Query Failed" . mysqli_error($connection));
            }
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Successfully Deleted');
            
            </script>");
        }

        ?>

        <!-- making admin -->

        <?php

        if (isset($_GET['confirm'])) {
            $user_id = $_GET['confirm'];
            $query = "UPDATE users SET user_config = 'valid' WHERE user_id = '$user_id'";

            $add_admin = mysqli_query($connection, $query);

            if (!$add_admin) {
                die("Query Failed" . mysqli_error($connection));
            }
            // email

            $to = "$user_email";
            $subject = "Confirmetion Email";
            $message = "
  
  
  Hi $username ,




Thanks for chhosing AIOservice!
  
 We verifyed Your details and you can login on our website as Profesional Vender.. 

Click this Link To Login : 
https://http://localhost/aioservice/login.php

  
  If you have any query regarding our service and etc. 
  
  You can contact us using our chat support system avalable at home page.
  
  
  
  Have a great day!
  AIOservice
  
  ";
            $from = "bpccs.abhipatel007@gmail.com";
            $headers = "FROM : $from";

            mail($to, $subject, $message, $headers);

            if (mail($to, $subject, $message, $headers)) {
                echo ("<script LANGUAGE='JavaScript'>
     window.alert('Successfully confirmed');
     
     </script>");
            } else {
                echo ("<script LANGUAGE='JavaScript'>
     window.alert('Error While Sending Email Please Try Again!!');
    
     </script>");
            }
            // end email




        }

        ?>


        <!-- making vender -->


    </div>


</div>

<?php
include 'footer.php';
?>