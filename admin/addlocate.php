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
    Add Location
</div>
<br><br><br><br>

<form action="admincontrol\locate.php" method="post">
    <div class="mb-3">
        <label class="fw-bold">Add Location Name</label><br>
        <input type="text" class="form-control" placeholder="Location Name" name="locate" required>

    </div>
    <button type="submit" class="btn btn-outline-secondary" name="submite">Add</button>
</form>



<br><br><br><br><br><br><br><br><br><br>
<div class="col-md-12 fw-bold fs-3">
    Location
</div>
<br><br>


<div class="card-body">
    <div class="table-responsive">

    <?php

if (isset($_GET['delete'])) {
    $locate_id = $_GET['delete'];

    $query = "DELETE FROM location WHERE locat_id=$locate_id";

    $delete_locat = mysqli_query($connection, $query);
}

?>


        <?php
        $query = "SELECT *  FROM  location";
        $select_locate = mysqli_query($connection, $query);
        ?>

        <table id="example" class="table table-striped data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Location Name</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>


                <?php
                while ($row = mysqli_fetch_assoc($select_locate)) {
                    $locate_id = $row['locat_id'];
                    $locate_name = $row['locat_name'];


                    echo "<tr>";
                    echo "<td> {$locate_id} </td>";
                    echo "<td> {$locate_name} </td>";

                    echo "<td><a href='addlocate.php?delete=$locate_id'>Delete</a></td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>


        <?php

        include 'footer.php';
        ?>