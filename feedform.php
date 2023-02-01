<?php session_start() ?>



<?php


include 'includes/db.php';







$curre_user_id = $_SESSION['username']['user_id'];


$query = "SELECT * FROM users WHERE user_id = $curre_user_id ";
$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users)) {
  $user_id = $row['user_id'];
  $user_name = $row['user_name'];
  $user_email = $row['user_email'];
  $user_mobile = $row['user_mobile'];
  $user_address = $row['user_address'];
}

if (isset($_POST['submit'])) {
  $feed_rating = $_POST['ratting'];
  $feed_message = $_POST['message'];

  $feed_image = $_FILES['feed_image']['name'];
  $tmp_cat = $_FILES['feed_image']['tmp_name'];
  $feed_image_size = $_FILES['feed_image']['size'];
  $feed_image_type = $_FILES['feed_image']['type'];

  move_uploaded_file($tmp_cat, "uploads/feedback_uploads/" . $feed_image);




  $query = "INSERT INTO feedback (user_id, user_name, user_email, user_mobile, categorie_id, categorie_tittle, feed_rating, feed_image, feed_message) VALUES ('$user_id', '$user_name', '$user_email', '$user_mobile', '', '', '$feed_rating', '$feed_image', '$feed_message')";

  $create_category = mysqli_query($connection, $query);

  if (!$create_category) {
    die("Query Failed");
  } else {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Thank You For Your Feedback!!');
    window.location.href='index.php';
    </script>");
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AIOservice - Feedback</title>
  <!-- Bootstrap CSS -->
  <link rel="shortcut icon" href="../assets/images/logo-121x84.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/password.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c8f0b82c86.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!--

-->
</head>

<body class="bg-dark">
  <br><br><br>
  <div class="container shadow-lg p-3 mb-5 bg-body rounded border ">
    <div class="row ">


      <div class="col">

        <div class="signup_form ">








          <form action="" method="post" enctype="multipart/form-data">

            <div class=" mb-3 ">
              <label for="customRange2" class="form-label">Rate Our Service 😁</label><br>
              <input type="range" class="form-range" min="0" max="5" name="ratting" id="customRange2">
            </div><br>
            <div class=" mb-3">
              <label>Share Your Service Experience</label><br>
              <input type="file" name="feed_image" class="form-control">

            </div><br>
            <div class="mb-3">

              <textarea type="email" name="message" class="form-control" placeholder="Share Your Experience Or Suggestions "></textarea>

            </div>


            <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>










</body>

</html>