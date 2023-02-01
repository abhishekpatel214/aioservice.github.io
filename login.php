<?php

include_once('database.php');
$err = '';

if (isset($_SESSION['username'])) {
    $role = $_SESSION['username']['user_role'];
    
    if ($role == 'vender') {

        header('Location: admin/dashboard.php');
        
    } else if ($role == 'admin') {
        header('Location: admin/dashboard.php');
    } else {

        header('Location: servicecat.php');
    }
}
if (isset($_POST["username"]) && isset($_POST["password"])) {

    // $query = "SELECT *  FROM  users where user_email= abhi@gmail.com and user_password=admin@123A";
    // $select_categories = mysqli_query($connection, $query);

    // $row = mysqli_fetch_assoc($select_categories);
    // print_r($select_categories);
    $query = "select * from users where user_email=:email or user_mobile=:email and user_password=:password and user_config='valid' ";
    $statement = $dbh->prepare($query);
    $statement->execute(array(
        "email" => $_POST["username"],
        "password" => $_POST["password"]
    ));

    $res = $statement->rowCount();
    //    print_r($res);
    if ($res > 0) {
        $err = '';
        $user = $statement->fetchAll()[0];
        $_SESSION['username'] = $user;
        

        // print_r($user);
        if ($user['user_role'] == 'vender') {
            header('Location: admin/dashboard.php');
        } else if ($user['user_role'] == 'admin') {
            header('Location: admin/dashboard.php');
        } else if($user['user_role'] == 'customer') {

            header('Location: servicecat.php');
        }
        
        // echo 'this is correct';
    } else {
        // echo 'not correct';
        $err = 'Please Enter correct username and password';
    }
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
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes\profilecss.css">
    <script src="https://kit.fontawesome.com/c8f0b82c86.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include "nav.php" ?>


    <div class="container">
        <div class="row">




            <div class="col"></div>
            <div class="col">

                <div class="signup_form">
                    <form action="" method="POST">
                        <div>
                            <?php
                            if (isset($err) && $err !== "") {
                                echo "<p> $err </p>";
                            }
                            // <p></p>
                            ?>
                        </div>

                        <div class="mb-3 form-group">

                            <input type="text" class="form-control" placeholder="Email or Mobile" name="username" required>
                        </div><br>

                        <div class="mb-3">

                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div><br>





                        <button type="submit" class="btn btn-primary form_btn" name="submit">LogIn</button>

                    </form>
                    <br>
                    <p>Don't have an account?<a href="signup.php">SignUP</a></p>
                </div>


            </div>
            <div class="col"></div>
        </div>
    </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div>

        <section data-bs-version="5.1" class="footer7 cid-sSfHtr6wBk" once="footers" id="footer7-10">





            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="col-12">
                        <p class="mbr-text mb-0 mbr-fonts-style display-7">
                            © Copyright 2021 AIOservice - All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>