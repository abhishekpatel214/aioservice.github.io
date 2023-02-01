<?php
session_start();
include "../includes/db.php";
?>
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_name'], $myitems)) {

                echo ("<script LANGUAGE='JavaScript'>
    window.alert('Service Alredy Added');
    window.location.href='cart.php';
    </script>");
            } else {

                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('category_name' => $_POST['category_name'], 'item_id' => $_POST['item_id'], 'item_pic' => $_POST['item_pic'], 'item_name' => $_POST['item_name'], 'item_price' => $_POST['item_price']);
                echo ("<script LANGUAGE='JavaScript'>
            window.alert('Service Added');
            window.location.href='cart.php';
            </script>");
            }
        } else {
            $_SESSION['cart'][0] = array('category_name' => $_POST['category_name'], 'item_id' => $_POST['item_id'], 'item_pic' => $_POST['item_pic'], 'item_name' => $_POST['item_name'], 'item_price' => $_POST['item_price']);
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Service Added');
    window.location.href='cart.php';
    </script>");
        }
    }
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


            <a class="navbar-brand fw-bold" href="../servicecat.php"> &nbsp;&nbsp;<i class="fas fa-arrow-circle-left fa-2x"></i></a>
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

    <!-- end nav  -->


    <!-- offcanvas -->


    <br><br><br><br>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">View Feedbacks</button>
  </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  
  <?php


    $query = "SELECT *  FROM  feedback";
    $select_feedback = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($select_feedback)) {
        $feed_id = $row['feed_id'];
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_mobile = $row['user_mobile'];
        $categorie_id = $row['categorie_id'];
        $categorie_tittle = $row['categorie_tittle'];
        $feed_image = $row['feed_image'];
        $feed_rating = $row['feed_rating'];
        $feed_message = $row['feed_message'];
    
    ?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="uploads/feedback_uploads/<?php echo $feed_image  ?>" class="img-fluid rounded-start" alt="Not-Available">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $user_name  ?></h5>
        <p class="card-text"><?php  echo $feed_message ?></p>
        
      </div>
    </div>
  </div>
</div>


<?php
}
?>
















</div>

    <div class="col-md-12 fw-bold fs-3">
        &nbsp;&nbsp; <?php //echo $_SESSION['category']['cate_name'];
                        ?>
    </div>
    <hr class="divider" />
    <div class="caintainer py-0">
        <div class="row mt-2">





            <?php



            if (isset($_SESSION['category'])) {
                foreach ($_SESSION['category'] as $k => $v) {

                    $v['id'];
                    $v['name'];
                }
            }



            $category_id =  $v['id'];
            $category_name =  $v['name'];






            $query = "SELECT * FROM servicecart WHERE Categorie_tittle = '$category_name'";
            $query_run = mysqli_query($connection, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            if ($check_category) {

                while ($row = mysqli_fetch_array($query_run)) {



            ?>
                    &nbsp;&nbsp; <div class="col-md-3 mt-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <form action="" method="POST">
                                <img class="card-img-top" src="../uploads/service_uploads/<?php echo $row['scart_image']; ?>" class="img-sm" height="120px" width="120px" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['scart_name']; ?></h5>
                                    <p class="card-price">Offer Price:&nbsp;₹<?php echo $row['scart_price']; ?> </p><br>
                                    <p class="card-price">Price:<del>&nbsp;₹&nbsp;<?php echo $row['scart_discount']; ?> </del></p>

                                    <button type="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>

                                    <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                                    <input type="hidden" name="category_name" value="<?php echo $category_name ?>">

                                    <input type="hidden" name="item_id" value="<?php echo $row['scart_id']; ?>">
                                    <input type="hidden" name="item_pic" value="<?php echo $row['scart_image']; ?>">
                                    <input type="hidden" name="item_name" value="<?php echo $row['scart_name']; ?>">
                                    <input type="hidden" name="item_price" value="<?php echo $row['scart_price']; ?>">

                                </div>
                            </form>
                        </div>
                    </div>

            <?php

                }
            } else {
                echo ("<script LANGUAGE='JavaScript'>
window.alert('NO Records Found');
</script>");
            }

            ?>


        </div>
    </div>









    <nav class="navbar  fixed-bottom navbar-light bg-light justify-content-between">
        <a class="navbar-brand fw-bold">&nbsp;&nbsp;&nbsp;My Cart</a>

        <form class="form-inline">
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
            }
            ?>
            <a href="navcart.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Continue ( <?php echo $count ?>)</a>&nbsp;&nbsp;&nbsp;
        </form>
    </nav>


</body>

</html>