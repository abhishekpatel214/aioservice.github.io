<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AIOservice</title>

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../assets/images/logo-121x84.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/style.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c8f0b82c86.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="cart.js" async></script>
    <!--

-->
</head>

<body>
    <div>
        <!-- Navbaar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">


            <!-- offcanvas button -->


            <!-- offcanvas button -->


            <a class="navbar-brand fw-bold" href="cart.php"> &nbsp;&nbsp;<i class="fas fa-arrow-circle-left fa-2x"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid ">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="d-flex ms-auto">


                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <!-- profile section -->


                        <?php if (isset($_SESSION['username'])) {
                        ?>
                            <div class="d-flex input-group me-end my-3 my-lg-0">
                                <div class="dropdown me-1">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                        <i class="fas fa-cog fa-pulse"></i>&nbsp;&nbsp;<?php if (isset($_SESSION['username']))
                                                                                            echo ucfirst($_SESSION['username']['user_name']); ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <li><a class="dropdown-item" href="../profile.php"><i class="fa fa-fw fa-user"></i>&nbsp;Profile</a></li>
                                        <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;LogOut</a></li>

                                    </ul>
                                </div>
                            <?php
                        }
                            ?>
                            <!-- End profile section -->
                    </form>
                </div>
            </div>
        </nav>

    </div>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-4">
                <h2>Cart</h2>
            </div>

            <div class="col-lg-9">

                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Service Image</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Service Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">





                        <?php



                        if (isset($_POST['remove_item'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                if ($value['item_name'] == $_POST['item_name']) {
                                    unset($_SESSION['cart'][$key]);
                                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Service Removed');
                     window.location.href='navcart.php';
                      </script>");
                                }
                            }
                        }

                        ?>













                        <?php




                        $total = 0;

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                $total = $total + $value['item_price'];
                                echo "
    <tr>
      <th>$sr</th>
      <td><img src='../uploads/service_uploads/" . $value['item_pic'] . "'  width='150px' height='150px'></td>
      <td>$value[item_name]</td>
      <td>₹$value[item_price]</td>
      
    <td>
    <form action='' method='POST'>
    <button name='remove_item' class='btn btn-sm btn-outline-danger'>Remove</button>
    <input type='hidden' name='item_name' value='$value[item_name]'>
    </form>
    </td>
      </tr>";
                            }
                        }

                        ?>

                    </tbody>
                </table>


            </div>







            <div class="col-lg-3 ">
                <div class="border bg-light rounded p-4">
                    <h5>Total:&nbsp;<i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $total ?></h5>
                    <br>



                    <?php

                    include '../includes/db.php';
                    $curr_user_id = $_SESSION['username']['user_id'];


                    $query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
                    $select_users = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_users)) {
                        $user_id = $row['user_id'];
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
                    ?>
                    <form action="booking.php" method="POST">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="cas" id="cash" checked>
                            <label for="cash" class="form-check-label">Cash After Service</label>
                        </div>
                        <br>
                        <label for="birthdaytime">Select Date</label><br>
                        <input type="date" id="birthdaytime" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'));?> name="servicedate" required><br><br>

                        <select class="form-select" name="servicetime" required>
                            <option selected>Select Time</option>
                            <option value="10:00 AM To 12:00 PM">10:00 AM To 12:00 PM</option>
                            <option value="12:00 PM To 02:00 PM">12:00 PM To 02:00 PM</option>
                            <option value="02.00 PM To 04:00 PM">02.00 PM To 04:00 PM</option>
                            <option value="04.00 PM To 06:00 PM">04.00 PM To 06:00 PM</option>
                            <option value="06.00 PM To 08:00 PM">06.00 PM To 08:00 PM</option>
                        </select><br>
                  
                      


                        <input type="hidden" value="<?php echo "$value[item_name]" ?>" name="itemname">
                        <input type="hidden" value="<?php echo "$value[item_pic]" ?>" name="itempic">
                       
                        <br>

                        <input type="hidden" value="<?php echo $city ?>" name="location">

                        <input type="hidden" value="<?php echo  $user_id ?>" name="userid">
                        <input type="hidden" value="<?php echo  $username ?>" name="username">
                        <input type="hidden" value="<?php echo  $email  ?>" name="useremail">
                        <input type="hidden" value="<?php echo  $mobile  ?>" name="usermobile">
                        <input type="hidden" value="<?php echo  $address  ?>" name="address">
                        <br>

                        

                        <?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$result = json_decode($result);

if ($result->status == 'success') {
    $result->country;
    $result->regionName;
    $city = $result->city;

   

}

$query1 = mysqli_query($connection, "SELECT * FROM `location` WHERE `locat_name` = '$city'");

if(mysqli_num_rows($query1)<1){
    ?>
<div class="alert alert-danger" role="alert">
    Our Service is Not Available in <?php echo "$city" ?> !! Sorry for this!!
</div>
<?php
}
else{
?>


<button name="purchase" type="submit" class="btn btn-primary btn-block"> Book Service Now</button>
<?php
}
?>






   




                        

                    </form>
                </div>
            </div>
        </div>
    </div>








</body>

</html>