
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
    <div class="col"></div>
    <div class="col">
     
    <div class="signup_form"><form>
  <div class="mb-3">
    
    <input type="email" class="form-control" placeholder="Name">
    
  </div>
  <div class="mb-3">
    
    <input type="email" class="form-control" placeholder="Email" >
  </div>
  <div class="mb-3">
    
    <input type="tel" class="form-control" placeholder="Mobile" >
  </div>
  <div class="mb-3">
    
    <input type="address" class="form-control" placeholder="Address" >
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" placeholder="Password" >
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" placeholder="Confirme Password" >
  </div>



  <button type="submit" class="btn btn-primary form_btn">Signup</button>
</form>
<br>
<p>Alrady have an account?<a href="login.php">Login</a></p>
</div>
    
    </div>
    <div class="col"></div>
  </div>
</div>
</body>
</html>
