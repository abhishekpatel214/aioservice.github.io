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

<div class="col-md-12 fw-bold fs-3">
    Add Category
</div>
<br><br>


<?php

if (isset($_GET['delete'])) {
    $cat_del_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE categorie_id=$cat_del_id";

    $delete_cat = mysqli_query($connection, $query);
}

?>




<?php
if (isset($_POST['submit'])) {

    $cat_title = $_POST['cat_title'];
    $cat_subtitle = $_POST['cat_subtitle'];

    


    $cat_image = $_FILES['cat_image']['name'];
    $tmp_cat = $_FILES['cat_image']['tmp_name'];
    $cat_image_size = $_FILES['cat_image']['size'];
    $cat_image_type = $_FILES['cat_image']['type'];

    move_uploaded_file($tmp_cat,"../uploads/category_uploads/".$cat_image);


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

   

    $query = "INSERT INTO categories (`categorie_tittle`, `cate_subtittle`, `cate_image`) VALUES ('$cat_title','$cat_subtitle','$cat_image')";

    $create_category = mysqli_query($connection, $query);

    if (!$create_category) {
        die("Query Failed");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="fw-bold" for="cat_tite">Add Categories*</label>
        <input class="form-control" type="text" name="cat_title" require />
        <br>
        <label class="fw-bold" for="cat_subtite">Add Subtittle*</label>
        <input class="form-control" type="text" name="cat_subtitle" require />
        <br>
        <label class="fw-bold" for="cat_image">Add image*</label><br>
        <input class="" type="file" name="cat_image" require />
        
    </div><br>
    <div class="form-group">
        <input class="btn btn-outline-secondary" id="button-addon2" type="submit" name="submit" value="Add Categories">
    </div>
</form>
</div> <br><br>

<div class="col-md-12 fw-bold fs-3">
    Category
</div>


<div class="col-xs-6">

    <?php
    $query = "SELECT *  FROM  categories";
    $select_categories = mysqli_query($connection, $query);
    ?>

    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Title</th>
                <th>Category Subtittle</th>
                <th>Category image</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['categorie_id'];
                $cat_title = $row['categorie_tittle'];
                $cat_subtittle = $row['cate_subtittle'];
                $cate_image = $row['cate_image'];
               

                echo "<tr>";
                echo "<td> {$cat_id} </td>";
                echo "<td> {$cat_title} </td>";
                echo "<td> {$cat_subtittle} </td>";
                echo "<td> <img src='../uploads/category_uploads/".$cate_image. "'  width='150px' height='150px'> </td>";
               
                echo "<td><a href='../admin/category.php?delete=$cat_id'>Delete</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>


<?php
include 'footer.php';
?>