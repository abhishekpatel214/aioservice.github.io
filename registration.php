
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIOservice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php require 'other/nav.php' ?>


         

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration</h2>
                </div>
                
                <form action="" method="post">

                    <div class="form-group">
                        
                        <input type="text" name="c_name" placeholder="Name" class="form-control" value="" maxlength="50" required="">
                        
                    </div> <br>

                    <div class="form-group ">
                        
                        <input type="email" name="c_email" placeholder="Email" class="form-control" value="" maxlength="30" required="">
                        
                    </div> <br>

                    <div class="form-group">
                        
                        <input type="text" name="c_mobile" placeholder="Mobile Number" class="form-control" value="" maxlength="12" required="">
                        
                    </div> <br>

                    <div class="form-group">
                        
                        <input type="text" name="c_address" placeholder="Address" class="form-control" value=""  required="">
                        
                    </div>  <br> 

                    <div class="form-group">
                       
                        <input type="password" name="c_password" placeholder="Password" class="form-control" value="" maxlength="8" required="">
                       
                    </div>   <br>
 
                    <div class="form-group">
                        
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" value="" maxlength="8" required="">
                        
                    </div>
                    <br>
                    <div>
                    <input type="submit" class="btn btn-primary" name="signup" value="submit">
                    </div>
                    Already have a account?<a href="login.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
