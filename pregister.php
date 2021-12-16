
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AIOservice</title>
    
</head>
<body>
<?php require 'other/nav.php' ?> 

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
     <div>
     <input type="text" name="city" list="servicelist" placeholder="Select Your Service Field">
      <datalist id="servicelist">
      <option value="Computer">
      <option value="Mobile">
      <option value="Beauty">
      <option value="Garden">
      <option value="Servant">
      <option value="Driver">
      <option value="Seef">
      </datalist> <br>
      </div><br>
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
                    
                </form>

</body>
</html>
