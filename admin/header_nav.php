<?php session_start();
include "../includes/db.php";

?>

<?php
if (isset($_SESSION['username'])) {
  if ($_SESSION['username']['user_role'] == 'customer') {
    header("Location: ../index.php");
  }
} else {
  if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <?php
  if (isset($_SESSION['username'])) {
    if ($_SESSION['username']['user_role'] == 'vender') {
  ?>

      <title>AIOservice - Vender</title>

  <?php }
  }  ?>



  <?php
  if (isset($_SESSION['username'])) {
    if ($_SESSION['username']['user_role'] == 'admin') {
  ?>

      <title>AIOservice - Admin</title>

  <?php }
  }  ?>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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

<body>
  <!-- Navbaar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    < <!-- offcanvas button -->

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
      </button>


      <!-- offcanvas button -->


      <a class="navbar-brand fw-bold" href="../index.php"> &nbsp;&nbsp;AIOservice</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container-fluid ">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <form action="Report.php" method="$_GET" class="d-flex ms-auto">
            <div class="input-group ">

              <input type="text" class="form-control" placeholder="Name/Mobile/Email/Service/Category/Id" name="search">
              <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
            </div>




            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <!-- profile section -->


            <?php if (isset($_SESSION['username'])) {
            ?>
              <div class="d-flex input-group me-end my-3 my-lg-0">
                <div class="dropdown me-1">
                  <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                    <i class="fas fa-cog fa-pulse"></i>&nbsp;&nbsp;<?php if (isset($_SESSION['username']))
                                                                      echo ucfirst($_SESSION['username']['user_name']); ?>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <li><a class="dropdown-item" href="../profile.php"><i class="fa fa-fw fa-user"></i>&nbsp;Profile</a></li>
                    <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;LogOut</a></li>

                  </ul>
                </div>
              <?php
            }
              ?>
              <!-- End profile section -->
          </form>
        </div>
      </div>
  </nav>

  <!-- End Navbaar -->

  <!-- profile section -->







  <!-- offcanvas -->





  <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <div class="text-muted small fw-bold text-upercase px-3 ">CORE </div>







            <div>
              <ul class="navbar-nav ps-3">


                <?php
                if (isset($_SESSION['username'])) {
                  if ($_SESSION['username']['user_role'] == 'vender') {
                ?>


                    <li>
                      <a href="booking.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Bookings</span>
                      </a>
                    </li>
                    <li>
                      <a href="venderbooking.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Pending Bookings</span>
                      </a>
                    </li>
                    <li>
                      <a href="pay.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Payments</span>
                      </a>
                    </li>

                <?php }
                }  ?>



                <?php
                if (isset($_SESSION['username'])) {
                  if ($_SESSION['username']['user_role'] == 'admin') {
                ?>




                    <li>
                      <a href="dashboard.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-tachometer-alt"></i></span><span>Dashboard</span>
                      </a>
                    </li>
                    <li>
                      <a href="category.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-th-large"></i></span><span>Category</span>
                      </a>
                    </li>

                    <li>
                      <a href="addlocate.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-map-marked-alt"></i></span><span>Location</span>
                      </a>
                    </li>

                    <li>
                      <a href="addadmin.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-user-cog"></i></span><span>Add Admin</span>
                      </a>
                    </li>

                    <li>
                      <a href="addabout.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-address-card"></i></span><span>Add About</span>
                      </a>
                    </li>

                    <li>
                      <a href="addservice.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-briefcase"></i></span><span>Add Services</span>
                      </a>
                    </li>


                <?php }
                }  ?>



                <?php
                if (isset($_SESSION['username'])) {
                  if ($_SESSION['username']['user_role'] == 'admin') {
                ?>


                    <li>
                      <a href="bookedservice.php" class="nav-link px-3">
                        <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Bookings</span>
                      </a>
                    </li>

                <?php }
                }  ?>



















              </ul>
            </div>

          </li>

          <hr class="divider">


          <?php
          if (isset($_SESSION['username'])) {
            if ($_SESSION['username']['user_role'] == 'admin') {
          ?>





              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">USER SECTION</div>



              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collap" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span><i class="fas fa-users"></i></span>
                  &nbsp;Users
                  <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span>
                </a>


                <div class="collapse" id="collap">
                  <div>
                    <ul class="navbar-nav ps-3">
                      <li>
                        <a href="admin.php" class="nav-link px-3">
                          <span class="me-2"><i class="fas fa-user-cog"></i></span><span>Admin</span>
                        </a>
                      </li>
                      <li>
                        <a href="venderdata.php" class="nav-link px-3">
                          <span class="me-2"><i class="fas fa-briefcase"></i></span><span>Vender</span>
                        </a>
                      </li>
                      <li>
                        <a href="userdata.php" class="nav-link px-3">
                          <span class="me-2"><i class="fas fa-user"></i></span><span>Customer</span>
                        </a>
                      </li>
                    </ul>

                  </div>
                </div>

                <hr class="divider">


                <BR>
              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">PENDING VENDERS </div>
              </li>

              <li>
                <a href="venderconfig.php" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-user-edit"></i></span><span>Confirme Venders</span>
                </a>
              </li>



              <hr class="divider">




              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">FEEDBACK </div>
              </li>

              <li>
                <a href="fedback.php" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Feedback</span>
                </a>
              </li>



              <!--
              <hr class="divider">


              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">REPORT</div>
              </li>

              <li>
                <a href="Report.php" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-file-invoice"></i></span><span>Generate Report</span>
                </a>
              </li>

            -->
              <hr class="divider">




              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">CHAT SERVICE </div>
              </li>

              <li>
                <a href="https://dashboard.tawk.to" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Chat Dashboard</span>
                </a>
              </li>

              <hr class="divider">




              <li>
                <div class="text-muted small fw-bold text-upercase px-3 ">Search & Report </div>
              </li>

              <li>
                <a href="serchbooking.php" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Search Users</span>
                </a>
              </li>
              <li>
                <a href="date.php" class="nav-link px-3">
                  <span class="me-2"><i class="fas fa-check-circle"></i></span><span>Search Booking by date</span>
                </a>
              </li>
          <?php }
          }  ?>

        </ul>

      </nav>

    </div>
  </div>
  <!-- end offcanvas -->


  <main class="mt-5 pt-3 bg-fade">

    <div class="container-fluid">
      <div class="row">