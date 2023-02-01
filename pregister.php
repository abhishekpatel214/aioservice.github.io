<?php
session_start()
?>
<?php include "includes\db.php" ?>

<?php

$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);



if (isset($_POST['apply'])) {
  //echo "registered";
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $category = $_POST['category'];
  $location = $_POST['location'];
  $password = $_POST['password'];


 
  $query1 = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_email` = '$email' or `user_mobile` = '$mobile'");

  if(mysqli_num_rows($query1)>0){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Email or Mobile Arledy Register');
    
    </script>");
    
  die();
  }
  
  if (strlen($mobile)!=10){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Number');
   
    </script>");

  }else{

  // adhar upload
  $adhar = $_FILES['vadhar']['name'];
  $tmp_adhar = $_FILES['vadhar']['tmp_name'];
  $adhar_size = $_FILES['vadhar']['size'];
  $adhar_type = $_FILES['vadhar']['type'];

  move_uploaded_file($tmp_adhar, "uploads/vender_uploads/" . $adhar);


  // adhar upload
  $Vpan = $_FILES['vpan']['name'];
  $tmp_vpan = $_FILES['vpan']['tmp_name'];
  $Vpan_size = $_FILES['vpan']['size'];
  $Vpan_type = $_FILES['vpan']['type'];

  move_uploaded_file($tmp_vpan, "uploads/vender_uploads/" . $Vpan);





  // adhar upload
  $certi = $_FILES['vcerti']['name'];
  $tmp_certi = $_FILES['vcerti']['tmp_name'];
  $certi_size = $_FILES['vcerti']['size'];
  $certi_type = $_FILES['vcerti']['type'];

  move_uploaded_file($tmp_certi, "uploads/vender_uploads/" . $certi);


    $query = "INSERT INTO users(user_name, user_email, user_mobile, user_address, user_cate, user_locat, user_adhar, user_pan, user_certi, user_password, user_role, user_config) VALUES('$username', '$email', '$mobile', '$address', '$category', '$location', '$adhar', '$Vpan', '$certi', '$password', 'vender', 'not') ";

    $register_user = mysqli_query($connection, $query);

    if (!$register_user) {
      die("Query Failed" . mysqli_error($connection));
    } else {

      // email

      $to = "$email";
      $subject = "Profesional Registration Details";
      $message = "
  
  
  Hi $username ,




Thanks for chhosing AIOservice!
  
 You will receive Confermation Email After we very your details. 

 Then you can login in our website as Profesional Vender.
  
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
     window.alert('Applyed Successfully & you will Recive confermation Email after verification!!');
     window.location.href='login.php';
     </script>");
      } else {
        echo ("<script LANGUAGE='JavaScript'>
     window.alert('Error While Sending Email Please Try Again!!');
     
     </script>");
      }
      // end email

    }
  }
}








/*
if(isset($_FILES['vadhar'])){
  $adhar_name = $_FILES['vadhar']['name'];
  $adhar_size = $_FILES['vadhar']['size'];
  $adhar_tmp = $_FILES['vadhar']['tmp_name'];
  $adhar_type = $_FILES['vadhar']['type'];

  move_uploaded_file($adhar_tmp,"../uploads/vender_uploads/".$adhar_name);
}*/
?>



<!DOCTYPE html>
<html lang="en">

<head>







  <title>AIOservice</title>
  <link rel="shortcut icon" href="../assets/images/logo-121x84.png" type="image/x-icon">
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




  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col">

        <div class="signup_form">
          <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">

              <input type="text" class="form-control" placeholder="Name*" name="username" required value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">

            </div>
            <div class="mb-3">

              <input type="email" class="form-control" placeholder="Email*" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
            </div>
            <div class="mb-3">

              <input type="number" class="form-control" placeholder="Mobile*" name="mobile" minlength="10" maxlength="10" required value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile'];?>">
            </div>
            <div class="mb-3">

              <input type="address" class="form-control" placeholder="Address*" name="address" required value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>">
            </div>

            <div class="mb-3">
              <label><small>Select Category*</small></label>

              <select list="category" class="form-control" name="category" required>

                <datalist id="category">

                  <!-- category selection       -->

                  <?php
                  $query = "SELECT *  FROM  categories";
                  $select_categories = mysqli_query($connection, $query);
                  ?>

                  <?php
                  while ($row = mysqli_fetch_assoc($select_categories)) {

                    $cat_title = $row['categorie_tittle'];



                    echo "<option> $cat_title </option>";
                  }

                  ?>

                </datalist>
              </select>
            </div>



            <div class="mb-3">
              <label><small>Select location*</small></label>

              <select list="location" class="form-control" name="location" required>

                <datalist id="location">

                  <!-- location selection       -->

                  <?php
                  $query = "SELECT *  FROM  location";
                  $select_location = mysqli_query($connection, $query);
                  ?>

                  <?php
                  while ($row = mysqli_fetch_assoc($select_location)) {

                    $location_t = $row['locat_name'];



                    echo "<option> $location_t </option>";
                  }

                  ?>

                </datalist>
              </select>
            </div>



            <div class="mb-3">
              <label><small>Adhar-Card*</small></label>
              <input type="file" class="form-control" placeholder="Adhar-Card*" name="vadhar" accept="image/*" required>
              <small>Upload only jpg/jpeg/png file </small>

            </div>

            <div class="mb-3">
              <label><small>Pan-Card*</small></label>
              <input type="file" class="form-control" placeholder="Pan-Card*" name="vpan" accept="image/*" required>
              <small>Upload only jpg/jpeg/png file</small>

            </div>

            <div class="mb-3">
              <label><small>Shoep Registration Certificate*</small></label>
              <input type="file" class="form-control" placeholder="Registration Certificate*" name="vcerti" accept="image/*" required>

              <small>Upload only jpg/jpeg/png file </small>
            </div>

            <div class="mb-3">

              <input type="password" id="psw" class="form-control" placeholder="Password*" name="password" require pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
            </div>

            <div id="message">
              <small>Password must contain the following:</small>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>


            <script>
              var myInput = document.getElementById("psw");
              var letter = document.getElementById("letter");
              var capital = document.getElementById("capital");
              var number = document.getElementById("number");
              var length = document.getElementById("length");

              // When the user clicks on the password field, show the message box
              myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
              }

              // When the user clicks outside of the password field, hide the message box
              myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
              }

              // When the user starts to type something inside the password field
              myInput.onkeyup = function() {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                  letter.classList.remove("invalid");
                  letter.classList.add("valid");
                } else {
                  letter.classList.remove("valid");
                  letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                  capital.classList.remove("invalid");
                  capital.classList.add("valid");
                } else {
                  capital.classList.remove("valid");
                  capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                  number.classList.remove("invalid");
                  number.classList.add("valid");
                } else {
                  number.classList.remove("valid");
                  number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                  length.classList.remove("invalid");
                  length.classList.add("valid");
                } else {
                  length.classList.remove("valid");
                  length.classList.add("invalid");
                }
              }
            </script>

            <div class="mb-3">

              <input type="password" class="form-control" placeholder="Confirm Password*" id="cpsw" onkeyup='check();' required>
              <label><span id="smessage"></span></label>

              <script>
                var check = function() {
                  if (document.getElementById('psw').value ==
                    document.getElementById('cpsw').value) {
                    document.getElementById('smessage').style.color = 'green';
                    document.getElementById('smessage').innerHTML = 'matching';
                  } else {
                    document.getElementById('smessage').style.color = 'red';
                    document.getElementById('smessage').innerHTML = 'not matching';
                  }
                }
              </script>
            </div>

            <button type="submit" class="btn btn-primary form_btn" name="apply">Apply</button>
          </form>

        </div>

      </div>
      <div class="col"></div>
    </div>
  </div>
  <br><br><br><br><br><br>
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