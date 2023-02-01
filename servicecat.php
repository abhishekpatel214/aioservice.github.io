<?php
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html>

<head>
   
    <link rel="shortcut icon" href="assets/images/logo-121x84.png" type="image/x-icon">
    


    <title>Service Category</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
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
</head>

<body>

<?php include "nav.php" ?><br>
<br><br>
<div class="container">

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
} else{

?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong> Book Service At Your DoorStap In <?php echo "$city"  ?></strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<?php
/*
if ($result='Ahemedabad'){


    ?>
    <div class="alert alert-danger" role="alert">
    Our Service is Not Available in <?php echo "$city" ?> !! Sorry for this!!
</div>


<?php
}
if (!$result='Gandhinagar'){ ?>

    <div class="alert alert-danger" role="alert">
    Our Service is Not Available in <?php echo "$city" ?> !! Sorry for this!!
</div>

<?php
}*/
?>
</div>
















  

    <div class="caintainer py-5">
        <div class="row mt-4">

            <?php


   unset($_SESSION['cate']);
unset($_SESSION['cat']);
            
            require 'includes\db.php';
            
            $query = "SELECT * FROM categories ";
            $query_run = mysqli_query($connection, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            if ($check_category) {

                while ($row = mysqli_fetch_array($query_run)) {
                    
            ?>

                    <div class="col-md-3 mt-3 mb-4">
                        <div class="card">
                        <img src="uploads/category_uploads/<?php  echo $row['cate_image']; ?>" alt="service categories" width="300px" height="300px">
                            <div class="card-body">
                                
                                <h2 class="card-tittle"><?php   echo $row['categorie_tittle']; ?></h2>
                                <p class="card-text" ><?php   echo $row['cate_subtittle']; ?></p>
                                <br>
                                <form action="cart/cate.php" method="POST">
                                <div class="mbr-section-btn item-footer mt-4 ">
                                <button type="submit" name="go_to_cart" class="btn item-btn btn-black display-7">Go To Service</button>
                                   </div>
                                <input type="hidden" name="name" value="<?php echo $row['categorie_tittle']; ?>">
                                <input type="hidden" name="id" value="<?php echo $row['categorie_id']; ?>">
                                </form>
                            </div>
                            
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
    <div>
        <section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
            <p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/m" style="color:#aaa;"></a></p>
        </section>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/smoothscroll/smooth-scroll.js"></script>
        <script src="assets/ytplayer/index.js"></script>
        <script src="assets/dropdown/js/navbar-dropdown.js"></script>
        <script src="assets/embla/embla.min.js"></script>
        <script src="assets/embla/script.js"></script>
        <script src="assets/theme/js/script.js"></script>
    </div>

</body>

</html>