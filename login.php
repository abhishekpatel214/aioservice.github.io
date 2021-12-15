<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIOservice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<<?php require 'other/nav.php' ?>
         
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Login</h2>
                </div>
    
                <form action="" method="post">

                    <div class="form-group ">
                        
                        <input type="email" name="email" placeholder="Email" class="form-control" value="" maxlength="30" required="">
                        
                    </div> <br>
                    
                    <div class="form-group">
                        
                        <input type="password" name="password" placeholder="Password" class="form-control" value="" maxlength="8" required="">
                        
                    <div>
                    <input type="submit" class="btn btn-primary" name="login" value="Login">
                    </div>
                    <br>
                    You don't have account?<a href="registration.php" class="mt-3">Click Here</a>
                    
                    
                </form>
            </div>
        </div>     
    </div>
</body>
</html>
