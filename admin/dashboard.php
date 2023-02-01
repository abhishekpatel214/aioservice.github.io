<?php
include 'header_nav.php';
include '../includes/db.php';
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
<!-- dashboard -->

<div class="col-md-12 fw-bold fs-3">
  Dashboard
</div>
<br><br>

<?php
if (isset($_SESSION['username'])) {
  if ($_SESSION['username']['user_role'] == 'admin') {
?>
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3">




            <!-- total admin -->

            <?php

            $query = "SELECT * FROM users WHERE user_role= 'admin'";
            $get_users = mysqli_query($connection, $query);
            $total_users = mysqli_num_rows($get_users);

            ?>


            <!-- total vender -->

            <?php

            $query = "SELECT * FROM users WHERE user_role= 'vender'";
            $get_users = mysqli_query($connection, $query);
            $total_vender = mysqli_num_rows($get_users);

            ?>


            <!-- total vender -->

            <?php

            $query = "SELECT * FROM users WHERE user_role= 'customer'";
            $get_users = mysqli_query($connection, $query);
            $total_cust = mysqli_num_rows($get_users);

            ?>




            <!-- total category -->

            <?php

            $query = "SELECT * FROM categories ";
            $get_users = mysqli_query($connection, $query);
            $total_cate = mysqli_num_rows($get_users);

            ?>


            <!-- total location -->

            <?php

            $query = "SELECT * FROM location";
            $get_users = mysqli_query($connection, $query);
            $total_locate = mysqli_num_rows($get_users);

            ?>

 <!-- total Booking -->

 <?php

$query = "SELECT * FROM oderdetail ";
$booking = mysqli_query($connection, $query);
$total_booking = mysqli_num_rows($booking);

?>


<!-- total Booking -->

<?php

$query = "SELECT * FROM feedback ";
$get_feed = mysqli_query($connection, $query);
$total_feedback = mysqli_num_rows($get_feed);

?>













            <center>Total Admins</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3 fw-bold fs-3">
              <center><?php echo $total_users; ?></center>
            </h5>

          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3">
            <center>Total Venders</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_vender; ?></center>
            </h5>

          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3">
            <center>Total Customers</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_cust; ?></center>
            </h5>

          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3 ms-center">
            <center>Total Categorys</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_cate; ?></center>
            </h5>

          </div>
        </div>
      </div>
      <br>
      <hr class="dropdown-divider" />

      <br>
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3 ms-center">
            <center>Total Location</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_locate; ?></center>
            </h5>

          </div>
        </div>
      </div>
      <!-- row end -->

      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3 ms-center">
            <center>Total Bookings</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_booking; ?></center>
            </h5>

          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card text-white bg-dark mb-3 h-100">
          <div class="card-header fw-bold fs-3 ms-center">
            <center>Total Feedback</center>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold fs-3">
              <center><?php echo $total_feedback; ?></center>
            </h5>

          </div>
        </div>
      </div>

      <!-- row end -->
    </div>
<?php }
}  ?>
</div>
</main>




<?php
include 'footer.php';
?>