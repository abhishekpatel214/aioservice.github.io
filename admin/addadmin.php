<?php
include 'header_nav.php'
?>
<?php
if (isset($_SESSION['username'])) {
  if ($_SESSION['username']['user_role'] == 'customer') {
    header("Location: ../index.php");
  }
}
else{
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}}
?>




<div class="signup_form">
  <form action="admincontrol\add.php" method="post">
    <div class="mb-3">

      <input type="text" class="form-control" placeholder="Name*" name="username" required>

    </div>
    <div class="mb-3">

      <input type="email" class="form-control" placeholder="Email*" name="email" required>
    </div>
    <div class="mb-3">

      <input type="number" class="form-control" placeholder="Mobile Number*" name="mobile" minlength="10" maxlength="10" required>

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

    <button type="submit" class="btn btn-outline-secondary" name="signup">Signup</button>

  </form>

</div>



<?php
include 'footer.php'
?>