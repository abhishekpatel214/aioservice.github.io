<?php
include 'header_nav.php';



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
<?php

if (isset($_GET['delete'])) {
    $about_del_id = $_GET['delete'];

    $query = "DELETE FROM about WHERE about_id=$about_del_id";

    $delete_about = mysqli_query($connection, $query);
}

?>































<?php
if (isset($_POST['submite'])) {
// value to be inserted
$name = $_POST["name"];
$tittle = $_POST["tittle"];
$desc = $_POST["desc"];
$email = $_POST["email"];
$insta = $_POST["insta"];
$fb = $_POST["fb"];
    
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];
$image_size = $_FILES['image']['size'];
$image_type = $_FILES['image']['type'];

move_uploaded_file($tmp_image,"../uploads/about_uploads/".$image);



  

/*
    if ($cat_title == "" || empty($cat_title)) {
        echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Add category');
                                    </script>");
    }

    if ($cat_subtitle == "" || empty($cat_subtitle)) {
        echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Add Subtittle');
                                    </script>");
    }

    if ($cat_image == "" || empty($cat_image)) {
        echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Add Image');
                                    </script>");
    }

    if ($cat_url == "" || empty($cat_url)) {
        echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Add Url');
                                    </script>");
    }*/

    $query = "INSERT INTO about (`about_image`, `about_name`, `about_tittle`, `about_desc`, `about_email`, `about_insta`, `about_fb`) VALUES('$image', '$name', '$tittle', '$desc', '$email', '$insta', '$fb')";

    $create_about = mysqli_query($connection, $query);

    if (!$create_about) {
        die("Query Failed");
    }
}
?>
<div class="col-md-12 fw-bold fs-3">
   Add About 
</div>

<div class="signup_form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label class="fw-bold" for="cat_image">Name*</label><br>
            <input type="text" class="form-control"  name="name" required>

        </div>
        <div class="mb-3">
            <label class="fw-bold" for="cat_image">Add image*</label><br>
            <input class="" type="file" name="image" require />
        </div>
        <div class="mb-3">
            <label class="fw-bold" for="cat_image">Tittle*</label><br>

            <input type="text" class="form-control"  name="tittle" required>

        </div>
        <div class="mb-3">
        <label class="fw-bold" for="cat_image">Description*</label><br>
            <input type="text" class="form-control"  name="desc" required>

        </div>
        <div class="mb-3">
            <label class="fw-bold" for="cat_image">Email*</label><br>

            <input type="text" class="form-control"  name="email" required>

        </div>
        <div class="mb-3">
            <label class="fw-bold" for="cat_image">Instagram Id*</label><br>

            <input type="text" class="form-control"  name="insta" required>

        </div>
        <div class="mb-3">
            <label class="fw-bold" for="cat_image">Facebook Id*</label><br>

            <input type="text" class="form-control"  name="fb" required>

        </div>


        <button type="submit" class="btn btn-outline-secondary" name="submite">Add About</button>
    </form><br>
</div><br>
<hr class="divider">
<div class="col-md-12 fw-bold fs-3">
    About Data
</div>
<form class="my-3" action=""  method="POST">
<div class="input-group ">

<input type="text" class="form-control" placeholder="Name/Mobile/Email/Service/Category/Id" name="searchbar">
<button class="btn btn-outline-secondary" name="search" type="submit"><i class="fas fa-search"></i></button>
</div>
</form>
<br><br>
<hr class="divider">
















<div class="col-xs-6">

    <?php
 
 if (isset($_POST['search']))


{
    $search = $_POST['searchbar'];
    $query = "SELECT * FROM about WHERE MATCH(`about_image`, `about_name`, `about_tittle`, `about_desc`, `about_email`, `about_insta`, `about_fb`) AGAINST ('$search')";
    $select_about = mysqli_query($connection, $query);
} else
{
    
    $query = "SELECT *  FROM  about";
    $select_about = mysqli_query($connection, $query);
}
    ?>

    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Tittle</th>
                <th>Description</th>
                <th>Email</th>
                <th>Instagram Id</th>
                <th>Facebook Id</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_about)) {
                $about_id = $row["about_id"];
                $about_name = $row["about_name"];
                $about_image = $row["about_image"];
                $about_tittle = $row["about_tittle"];
                $about_desc = $row["about_desc"];
                $about_email = $row["about_email"];
                $about_insta = $row["about_insta"];
                $about_fb = $row["about_fb"];

                echo "<tr>";
                echo "<td> {$about_id} </td>";
                echo "<td> {$about_name} </td>";
                echo "<td> <img src='../uploads/about_uploads/".$about_image. "'  width='150px' height='150px'> </td>";
                echo "<td> {$about_tittle} </td>";
                echo "<td> {$about_desc} </td>";
                echo "<td> {$about_email} </td>";
                echo "<td> {$about_insta} </td>";
               
                echo "<td> {$about_fb} </td>";
                echo "<td><a href='../admin/addabout.php?delete=$about_id'>Delete</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>
<?php
include 'footer.php';
?>