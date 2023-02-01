<?php
include 'header_nav.php';



?>
<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['username']['user_role'] == 'admin') {
?>

        <div class="container my-3">

            <div class="result">

                <h1>
                    Result Between
                    <?php echo $_GET['betweena'];  ?>
                    To
                    <?php echo $_GET['betweenb'];  ?>
                </h1>
                <hr class="divider">
                <div class="col-md-12 fw-bold small fs-3">
                    FROM USERS TABLE
                </div>


                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>

                            <th>Cetegory</th>
                            <th>Location</th>
                            <th>adhar Card</th>
                            <th>Pan Card</th>
                            <th>Registration Certi.</th>
                            <th>User_role</th>
                            <th>Joined At</th>
                            <th>TIME</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $a = $_GET['betweena'];
                        $b = $_GET['betweenb'];

                        $sql = "SELECT * FROM users WHERE created_at BETWEEN $a AND $b order by user_id";
                        $select_users = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_assoc($select_users)) {
                            $user_id = $row['user_id'];
                            $username = $row['user_name'];
                            $user_email = $row['user_email'];
                            $user_mobile = $row['user_mobile'];
                            $user_address = $row['user_address'];
                            $user_category = $row['user_cate'];
                            $user_locat = $row['user_locat'];
                            $user_adhar = $row['user_adhar'];
                            $user_pan = $row['user_pan'];
                            $user_certi = $row['user_certi'];
                            $user_role = $row['user_role'];
                            $user_date = $row['created_at'];
                            $utime = $row['time'];

                        ?>
                            <tr>

                                <td><?php echo $user_id ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_mobile ?></td>

                                <td><?php echo $user_category ?></td>
                                <td><?php echo $user_locat ?></td>

                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_adhar ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_pan ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $user_certi ?>"></td>



                                <td><?php echo $user_role ?></td>
                                <td><?php echo $user_date ?></td>
                                <td><?php echo $utime ?></td>



                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <br>
            <hr class="divider">
            <div class="col-md-12 fw-bold small fs-3">
                From Category Table
            </div>
            <div class="col-xs-6">

                <?php


                $a = $_GET['betweena'];
                $b = $_GET['betweenb'];

                $queryq = "SELECT *  FROM  categories WHERE crated_at BETWEEN $a AND $b";
                $select_categories = mysqli_query($connection, $queryq);
                ?>

                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Title</th>
                            <th>Category Subtittle</th>
                            <th>Category image</th>
                            <th>created_at</th>
                            <th>TIME</th>


                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        while ($row = mysqli_fetch_assoc($select_categories)) {
                            $cat_id = $row['categorie_id'];
                            $cat_title = $row['categorie_tittle'];
                            $cat_subtittle = $row['cate_subtittle'];
                            $cate_image = $row['cate_image'];
                            $datec = $row['crated_at'];
                            $ctime = $row['time'];
                        ?>

                            <tr>

                                <td><?php echo $cat_id ?></td>
                                <td><?php echo $cat_title ?></td>
                                <td><?php echo $cat_subtittle ?></td>
                                <td> <img src="../uploads/category_uploads/<?php echo $cate_image ?>" width='150px' height='150px'> </td>
                                <td><?php echo $datec?></td>
                                <td><?php echo $ctime?></td>



                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>

            </div>
            <br>
            <hr class="divider">
            <div class="col-md-12 fw-bold small fs-3">
                Result From Booking Table
            </div>
            <div class="col-xs-6">

                <?php




                ?>
                <?php




                $a = $_GET['betweena'];
                $b = $_GET['betweenb'];


                $querya = "SELECT *  FROM  booking WHERE booked_at BETWEEN $a AND $b";
                $select_services = mysqli_query($connection, $querya);


                ?>
                <br>

                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <tr>

                            <th>Booking Id</th>
                            <th>servicecart Id</th>
                            <th>Category Name</th>


                            <th>Service Name</th>
                            <th>Service Image</th>

                            <th>Service Price</th>
                            <th>Location</th>
                            <th>Booking Date</th>
                            <th>Bookin Time</th>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Mobile</th>
                            <th>User Address</th>
                            <th>Booked at</th>
                            <th>TIME</th>


                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        while ($row = mysqli_fetch_assoc($select_services)) {


                            $sid = $row['book_id'];
                            $cartid = $row['scart_id'];
                            $cat_title = $row['caterorie_name'];
                            $s_name = $row['scart_name'];
                            $s_image = $row['scart_image'];
                            $s_price = $row['scart_price'];
                            $location = $row['location_name'];
                            $sdate = $row['service_date'];
                            $time = $row['service_time'];
                            $user_id = $row['user_id'];
                            $username = $row['user_name'];
                            $user_email = $row['user_email'];
                            $user_mobile = $row['user_mobile'];
                            $user_address = $row['user_address'];
                            $book = $row['booked_at'];
                            $btime = $row['time'];

                        ?>
                            <tr>


                                <td><?php echo $sid ?></td>
                                <td><?php echo $cartid ?></td>
                                <td><?php echo $cat_title ?></td>

                                <td><?php echo $s_name ?></td>
                                <td><img src="../uploads/service_uploads/<?php echo $s_image ?>" width='150px' height='150px'> </td>

                                <td><?php echo $s_price ?></td>
                                <td><?php echo $location ?></td>
                                <td><?php echo $sdate ?></td>
                                <td><?php echo $time ?></td>
                                <td><?php echo $user_id ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_mobile ?></td>
                                <td><?php echo $user_address ?></td>
                                <td><?php echo $book ?></td>
                                <td><?php echo $btime ?></td>

                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>

            </div>
            <br>
            <hr class="divider">
            <div class="col-md-12 fw-bold small fs-3">
                Result From Feedback Table
            </div>

            <div class="col-xs-6">

                <?php



                $a = $_GET['betweena'];
                $b = $_GET['betweenb'];

                $query = "SELECT *  FROM  feedback WHERE created_at BETWEEN $a AND $b";
                $select_feedback = mysqli_query($connection, $query);
                ?>

                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Feedback Id</th>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Mobile</th>
                            <th> Category Id</th>
                            <th> Category Title</th>
                            <th>Feedback Image</th>
                            <th>Feedback Rating</th>
                            <th>Feedback </th>
                            <th>created at</th>
                            <th>TIME</th>



                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        while ($row = mysqli_fetch_assoc($select_feedback)) {
                            $feed_id = $row['feed_id'];
                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_email = $row['user_email'];
                            $user_mobile = $row['user_mobile'];
                            $categorie_id = $row['categorie_id'];
                            $categorie_tittle = $row['categorie_tittle'];
                            $feed_image = $row['feed_image'];
                            $feed_rating = $row['feed_rating'];
                            $feed_message = $row['feed_message'];
                            $fdate = $row['created_at'];
                            $ftime = $row['time'];


                        ?>
                            <tr>

                                <td><?php echo $feed_id ?></td>
                                <td><?php echo $user_id ?></td>
                                <td><?php echo $user_name ?></td>
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_mobile ?></td>
                                <td><?php echo $categorie_id ?></td>
                                <td><?php echo $categorie_tittle ?></td>
                                <td><img src="../uploads/feedback_uploads/<?php echo $feed_image ?>" width='150px' height='150px'> </td>
                                <td><?php echo $feed_rating ?></td>
                                <td><?php echo $feed_message ?></td>
                                <td><?php echo $fdate ?></td>
                                <td><?php echo $ftime?></td>


                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>

            </div>





            <?php
            /*
include 'admincontrol/autoload.php';
if(isset($_GET['download']))
{
    $mpdf=new \Mpdf\Mpdf ();

}*/
            ?>





        </div>


<?php
    }
}
include 'footer.php';
?>