<?php session_start();
include "includes\db.php";
?>

<?php

$curr_user_id = $_SESSION['username']['user_id'];


$query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users)) {
    $username = $row['user_name'];
    $email = $row['user_email'];
    $mobile = $row['user_mobile'];
    $address = $row['user_address'];
    $category = $row['user_cate'];
    $location = $row['user_locat'];
    $user_adhar = $row['user_adhar'];
    $user_pan = $row['user_pan'];
    $user_certi = $row['user_certi'];
    $password = $row['user_password'];
}

if (isset($_POST['update-user'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $location = $_POST['location'];




    $query = "UPDATE `users` SET `user_name`='$username', `user_email`='$email', `user_mobile`='$mobile', `user_address`='$address', `user_cate`='$category', `user_locat`='$location' WHERE user_id = $curr_user_id";

    //echo $title . " " . $admin;

    $update_user = mysqli_query($connection, $query);

    if (!$update_user) {
        die("Query Failed" . mysqli_error($connection));
    }

    echo ("<script LANGUAGE='JavaScript'>
    window.alert(' Successfully Updated!!');
    window.location.href='profile.php';
    </script>");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="shortcut icon" href="assets/images/logo-121x84.png" type="image/x-icon">



    <title>AIOservice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\data.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="css\password.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes\profilecss.css">
</head>

<body>
    <?php include "nav.php" ?>

    <div class="container-xl px-4 mt-4">




        <div class="row">

            <?php
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username']['user_role'] == 'vender') {
            ?>
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">

                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile  mb-2" src="uploads/vender_uploads/<?php echo $user_adhar ?>" width='300px' height='300px' alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Adhar Card </div>
                                <!-- Profile picture upload button-->

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">

                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile  mb-2" src="uploads/vender_uploads/<?php echo $user_pan ?>" width='300px' height='300px' alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4"> PAN Card </div>
                                <!-- Profile picture upload button-->

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">

                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile  mb-2" src="uploads/vender_uploads/<?php echo $user_certi ?>" width='300px' height='300px' alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4"> Shop Registration Certificate</div>
                                <!-- Profile picture upload button-->

                            </div>
                        </div>
                    </div>



                    <hr class="mt-0 mb-4">
            <?php }
            }  ?>







            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">

                        <form action="" method="post">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1">Your name (how your name will appear on the site)</label>
                                <input class="form-control" name="username" type="text" value="<?php echo $username; ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control" name="email" type="text" value="<?php echo $email ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Mobile Number</label>
                                    <input class="form-control" name="mobile" type="text" value="<?php echo $mobile ?>">
                                </div>
                            </div>


                            <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username']['user_role'] == 'vender') {
                    ?>


                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">

                                    <label><small>Category</small></label>

                                    <select list="category" class="form-control" name="category">

                                        <datalist id="category">
                                            <option>&nbsp;<?php echo $category ?></option>
                                            <!-- category selection       -->

                                            <?php
                                            $query = "SELECT *  FROM  categories";
                                            $select_categories = mysqli_query($connection, $query);
                                            ?>

                                            <?php
                                            while ($row = mysqli_fetch_assoc($select_categories)) {

                                                $cat_title = $row['categorie_tittle'];



                                                echo

                                                "<option> $cat_title </option>";
                                            }

                                            ?>

                                        </datalist>
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label><small>location</small></label>

                                    <select list="category" class="form-control" name="location">

                                        <datalist id="category">

                                            <option>&nbsp;<?php echo $location ?></option>
                                            <!-- location selection       -->

                                            <?php
                                            $query = "SELECT *  FROM  location ";
                                            $select_location = mysqli_query($connection, $query);
                                            ?>

                                            <?php
                                            while ($row = mysqli_fetch_assoc($select_location)) {

                                                $locat_name = $row['locat_name'];



                                                echo

                                                "<option> $locat_name </option>";
                                            }

                                            ?>

                                        </datalist>
                                    </select>
                                </div>
                            </div>

<?php

                                        }}
?>

                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1">Address</label>
                                <input class="form-control" type="address" name="address" value="<?php echo $address ?>">
                            </div>
                            <!-- Form Row-->


                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit" name="update-user">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>