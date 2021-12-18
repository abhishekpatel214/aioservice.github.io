
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIOservice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\data.css">
</head>
<body>

<?php require 'other/nav.php' ?>
<div class="container">
  <div class="row">

  <?php 
  if(isset($_POST['signup']))
  {
     extract($_POST);
     if(strlen($cust_name)<3)
     {
         $error[]= 'please enter name using 3 character atleast!!';
     }

     if(strlen($cust_name)>30)
     {
         $error[]= 'More than 30 character not allowed!!';
     }
     if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z]*$/", $cust_name)){
         $error[] = 'Enter name properly';
     }


  }
  
  ?>


    <div class="col"></div>
    <div class="col">

    <?php
    if(isset($error))
    {
        foreach($error as $error)
        {
            echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
        }
    }
    ?>
     
    <div class="signup_form">
        <form action="" method="POST">
  <div class="mb-3">
    
    <input type="text" class="form-control" placeholder="Name" name="cust_name">
    
  </div>
  <div class="mb-3">
    
    <input type="email" class="form-control" placeholder="Email" name="cust_email" >
  </div>
  <div class="mb-3">
    
    <input type="tel" class="form-control" placeholder="Mobile" name="cust_mobile">
  </div>
  <div class="mb-3">
    
    <input type="address" class="form-control" placeholder="Address" name="cust_address">
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" placeholder="Password" name="cust_password" >
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" placeholder="Confirme Password" name="confirmpassword">
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
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
