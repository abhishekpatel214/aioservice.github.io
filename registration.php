<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIOservice</title>
    
</head>
<body>

<?php require 'other/nav.php' 
?>


         

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration</h2>
                </div>

                <?php
                if(isset($_SESSION['status']))
                {
                        echo "h4".$_SESSION['status']."/h4>";
                        unset($_SESSION['status']);
                }
                
                ?>

                <form action="customer\insert.php" method="post">

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
                        
                        <input type="password"  placeholder="Confirm Password">
                        
                    </div>
                    <br>
                    <div>
                    <input type="submit" class="btn btn-primary" name="savedata" value="submit">
                    </div>
                    Already have a account?<a href="login.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
