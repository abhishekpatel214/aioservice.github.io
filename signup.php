<?php
session_start()
?>
<?php

require_once 'includes/db.php';

 /*
  $query = "SELECT * FROM `users` WHERE user_email=$email and user_mobile=$mobile ";
  $select_users = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_users)) {
    $uemail = $row['user_email'];
    $umobile = $row['user_mobile'];
  }

  if ($email = $uemail) {
    $err = 'Mobile Alre';
  } elseif ($mobile = $umobile) {
    
  } else {
*/


if (isset($_POST['signup'])) {
  //echo "registered";
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $password = $_POST['password'];



  
$query1 = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_email` = '$email' or `user_mobile` = '$mobile'");

if(mysqli_num_rows($query1)>0){
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('Email or Mobile Arledy Register');
  window.location.href='signup.php';
  </script>");
  
die();
}





  if (strlen($mobile)!=10){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Number');
   
    </script>");
    

  }
  
  else{


  $query = "INSERT INTO users(user_name, user_email, user_mobile, user_address, user_password, user_role, user_config) VALUES('$username', '$email', '$mobile', '$address', '$password', 'customer', 'valid') ";

  $register_user = mysqli_query($connection, $query);

  if (!$register_user) {
    die("Query Failed" . mysqli_error($connection));
  }


  $to = "$email";
  $subject = "Thank You For Joining Us";
  $message = "
  Hi $username ,

  Thanks for chhosing AIOservice!
  
  We can’t wait for you to start using AIOservice .
  
  
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
     window.alert('Registered Successfully!!');
     window.location.href='login.php';
     </script>");
  } else {
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Error While Sending Email Please Try Again!!');
     window.location.href='signup.php';
     </script>");
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




  <div class="container">
    <div class="row">




      <div class="col"></div>
      <div class="col">

        <div class="signup_form">
          <form action="" method="post">
            <div>
              <?php
              if (isset($err) && $err !== "") {
                echo "<p> $err </p>";
              }
              // <p></p>
              ?>
            </div>
            <div class="mb-3">

              <input type="text" class="form-control" placeholder="Name*" name="username" required value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">

            </div>
            <div class="mb-3">

              <input type="email" class="form-control checking_email" placeholder="Email*" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
            </div>
            <div class="mb-3">

              <input type="number" class="form-control checking_mobile" placeholder="Mobile Number*" name="mobile" required value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile'];?>">

            </div>
            <div class="mb-3">

              <input type="address" class="form-control" placeholder="Address*" name="address" required value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>">
            </div>
            <div class="mb-3">

              <input type="password" id="psw" class="form-control" placeholder="Password*" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();' required>
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

              <input type="password" class="form-control" placeholder="Confirm Password*" id="cpsw" name="cpassword" onkeyup='check();' require />
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

            <button type="submit" class="btn btn-primary form_btn" name="signup">Signup</button>

          </form>
          <br>
          <p>Alrady have an account?<a href="login.php">Login</a></p>
        </div>


      </div>
      <div class="col"></div>
    </div>
  </div>

  </div><br><br><br><br><br><br><br><br><br>

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
<script src="includes/check.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>