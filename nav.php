<section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-u">

    <nav class="navbar navbar-expand-lg navbar-light bg-light  navbar-dropdown navbar-fixed-top ">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/logo-121x84.png" alt="AIOservice" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="index.php">AIOservice</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span class="class="navbar-toggler-icon></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">



                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">


                    <!-- show when userole = admin -->
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username']['user_role'] == 'admin') {
                    ?>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="admin\dashboard.php"><i class="fas fa-user-shield"></i>&nbsp;Admin</a></li>
                    <?php }
                    } ?>

                    <!-- show when userole = vender -->
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username']['user_role'] == 'vender') {
                    ?>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="admin\dashboard.php"><i class="fas fa-user-shield"></i>&nbsp;Vender</a></li>
                    <?php }
                    }  ?>

                    <!-- show when userole = vender -->

                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['username']['user_role'] == 'customer') {
                    ?>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="pregister.php"><i class="fas fa-briefcase"></i>&nbsp;Register As Profesional</a></li>

                    <?php }
                    }  ?>



                    <?php
                    if (!isset($_SESSION['username'])) {

                    ?>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="pregister.php"><i class="fas fa-briefcase"></i>&nbsp;Register As Profesional</a></li>


                    <?php
                    } ?>

                    <?php
                    if (!isset($_SESSION['username'])) {

                    ?>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="signup.php"><i class="fas fa-user-plus"></i>&nbsp;SignUp</a></li>

                    <?php
                    } ?>


                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="about.php"><i class="fas fa-address-card"></i>&nbsp;About Us</a></li>





                    <?php if (!isset($_SESSION['username'])) {
                    ?>

                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;LogIn</a></li>


                    <?php
                    }
                    ?>

                    <!-- profile section -->

                    <?php if (isset($_SESSION['username'])) {
                    ?>

                        <div class="dropdown">
                            <button class="dropbtn"><i class="fas fa-cog fa-pulse"></i><?php if (isset($_SESSION['username']))
                                                                                            echo ucfirst($_SESSION['username']['user_name']); ?></button>
                            <div class="dropdown-content">
                                <a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>LogOut</a>

                            </div>
                        </div>

                    <?php
                    }
                    ?>



                </ul>








            </div>


        </div>
        </div>
    </nav>

</section>

