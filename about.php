<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
<link rel="shortcut icon" href="assets/images/logo-121x84.png" type="image/x-icon">
   


    <title>AIOservice</title>
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
    
<!---google fonts -->

<!---google fonts -->
    <script src="https://kit.fontawesome.com/c8f0b82c86.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include "nav.php" ?><br><br>
    <section  class="people5 mbr-embla cid-sSfam927Cp">





        <div class="position-auto text-center">
            <h3 class="mb-4 mbr-fonts-style display-flex">
                <strong>What Our Fantastic Team&nbsp;</strong>
            </h3>

            



            <?php
            
            require 'includes\db.php';
            
            $query = "SELECT * FROM about ";
            $query_run = mysqli_query($connection, $query);
            $check_about = mysqli_num_rows($query_run) > 0;

            if ($check_about) {

                while ($row = mysqli_fetch_array($query_run)) {

            ?>
            
            <div class="caintainer">
        <div class="row mt-4 ">
&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    <div class="col-md-3 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="uploads/about_uploads/<?php  echo $row['about_image']; ?>"  width="300px" height="300px">
                            <div class="card-body">
                            <h1 class="card-tittle  mb-3 fw-bold "><?php   echo $row['about_name']; ?></h1>
                                <h4 class="card-tittle "><?php   echo $row['about_tittle']; ?></h4>
                                
            <hr class="divider" />

         
                                <h5 class="card-text text-wrap"><?php   echo $row['about_desc']; ?></h5>
                                <br>
                                <h5 class="card-text"><?php   echo $row['about_email']; ?></h5>
                                <br>
                                <div class="mbr-section-btn item-footer mt-2">
                                    <a href="<?php   echo $row['about_insta']; ?>" class=" display-7">
                                <i class="fab fa-instagram fa-3x"></i></a>  
                                <a href="<?php   echo $row['about_fb']; ?>" class="display-7">
                                &nbsp; &nbsp;  &nbsp; &nbsp;<i class="fab fa-facebook fa-3x"></i></a></div></div>
                                
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



        </div>
    </section>

   
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
    </section>
    <section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
        <p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/p" style="color:#aaa;"></a></p>
    </section>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/embla/embla.min.js"></script>
    <script src="assets/embla/script.js"></script>
    <script src="assets/theme/js/script.js"></script>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>