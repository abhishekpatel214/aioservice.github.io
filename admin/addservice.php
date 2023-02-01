<?php
include 'header_nav.php'
?>



<?php



if (isset($_POST['submit'])) {

    $sname = $_POST['sname'];
    $scate = $_POST['scate'];

   
    $sprice = $_POST['sprice'];
    $sdiscount = $_POST['sdiscount'];





    $simage = $_FILES['simage']['name'];
    $tmp_cat = $_FILES['simage']['tmp_name'];
    $simage_size = $_FILES['simage']['size'];
    $simage_type = $_FILES['simage']['type'];

    move_uploaded_file($tmp_cat, "../uploads/service_uploads/" . $simage);


/*
    $query = "SELECT * FROM `categories` WHERE `categorie_tittle` = $cat_title";

    $select_cate = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $catid = $row['categorie_id'];
    }*/

    $query = "INSERT INTO servicecart (`Categorie_tittle`, `scart_name`, `scart_image`, `scart_price`, `scart_discount`) VALUES ('$scate', '$sname', '$simage', '$sprice', '$sdiscount')";

    $create_category = mysqli_query($connection, $query);

    if (!$create_category) {
        die("Query Failed");
    }
}
?>









<div class="col-md-12 fw-bold fs-3">
    Add Service
</div>
<br><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">

        <input type="text" class="form-control" placeholder="Service name*" name="sname" required>

    </div>
    <div class="mb-3">

        <label><small>Select Category*</small></label>

        <select list="category" class="form-control" name="scate" required>

            <datalist id="category">

                <!-- category selection       -->

                <?php
                $query = "SELECT *  FROM  categories";
                $select_categories = mysqli_query($connection, $query);
                ?>

                <?php
                while ($row = mysqli_fetch_assoc($select_categories)) {

                    $cat_title = $row['categorie_tittle'];
                 




                    echo "<option> $cat_title </option>";
                }



                ?>

            </datalist>
        </select>
    </div>

    <input type="hidden" name="cate_id" value=""> 
    <div class="mb-3">
        <label for="">Add Service image*</label>
        <input type="file" class="form-control" name="simage" required>

    </div>
    
    <div class="mb-3">

        <input type="text" class="form-control" placeholder="Discounted Price*" name="sprice" required>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Max Price" name="sdiscount" >

    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Service</button>
</form>

<br><br>
<br>
<div class="my-4">
    <hr class="divider" />
</div>
<div class="col-md-12 fw-bold fs-3">
    Added Service
</div>


<div class="col-xs-6">

    <?php




    if (isset($_GET['delete'])) {
        $sid = $_GET['delete'];

        $query = "DELETE FROM servicecart WHERE scart_id=$sid";

        $delete_cart = mysqli_query($connection, $query);
    }

    ?>
    <?php
    $query = "SELECT *  FROM  servicecart";
    $select_services = mysqli_query($connection, $query);
    ?>

    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>
                <th>Service Id</th>
               
                <th>Category Title</th>
                <th>Service Name</th>
                <th>Service Image</th>
               
                <th>Service Price</th>
                <th>Service Discount</th>
                <th>Crated At</th>

            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_services)) {


                $sid = $row['scart_id'];
               
                $cat_title = $row['Categorie_tittle'];
                $s_name = $row['scart_name'];
                $s_image = $row['scart_image'];
            
                $s_price = $row['scart_price'];
                $s_discount = $row['scart_discount'];
                $date = $row['crated_at'];


                echo "<tr>";
                echo "<td> {$sid} </td>";
                
                echo "<td> {$cat_title} </td>";
                echo "<td> {$s_name} </td>";
                echo "<td> <img src='../uploads/service_uploads/" . $s_image . "'  width='150px' height='150px'> </td>";
       
                echo "<td> {$s_price} </td>";
                echo "<td> {$s_discount} </td>";
                echo "<td> {$date} </td>";
                echo "<td><a href='../admin/addservice.php?delete=$sid'>Delete</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>

<?php
include 'footer.php'
?>