
<?php session_start() ?>
<?php include "../includes/db.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <title> Cart</title>
   
    <link rel="stylesheet"href="main.css">
    <link rel="stylesheet"href="cart.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>

    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../includes/profilecss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  
     
  <section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-u">

<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">





    
<ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">

<li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../servicecat.php"><i class="fas fa-arrow-circle-left"></i></a></li> 
                    <!-- profile section -->
                  
                    <div class="dropdown topnav-right">
                        <button class="dropbtn"> <i class="fas fa-cog fa-pulse"></i><?php echo ucfirst($_SESSION['username']['user_name']); ?></button>
                        <div class="dropdown-content">
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>LogOut</a>

                        </div>
                    </div>
                    
</ul>        

</nav>

</section>



















  
    <!--Hero Section-->
    <section id="hero">
        <div class="hero-container">
            <div class="hero-logo">
                <h1 class="font-weight-bold">Cart Products</h1>
            </div>
            </div>
    </section>
    <!---End of Hero Section-->
    <!--Cart Section-->
    <section class="mt-5">
        <div class="container">
            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"class="text-white">Product</th>
                            <th scope="col"class="text-white">Price</th>
                            <th scope="col"class="text-white">Quantity</th>
                            <th scope="col"class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                     <!--W=145 H=98--> <img src="images/cart-1.jpg"alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <i class="fas fa-angle-down"></i>
                                    <input class="input-number"type="text"
                                    value="1"min="0"max="10">
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
                        <!----->
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                     <!--W=145 H=98--> <img src="images/cart-1.jpg"alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <i class="fas fa-angle-down"></i>
                                    <input class="input-number"type="text"
                                    value="1"min="0"max="10">
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
                        <!----->
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                     <!--W=145 H=98--> <img src="images/cart-1.jpg"alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <i class="fas fa-angle-down"></i>
                                    <input class="input-number"type="text"
                                    value="1"min="0"max="10">
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
                        <!----->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
            <ul>
                <li class="subtotal">subtotal
                    <span>$60.00</span>
                </li>
                <li class="cart-total">Total
                <span>$60.00</span></li>
            </ul>
            <a href="#"class="proceed-btn">Proceed to Checkout</a>
        </div>
    </div>





<br><br>


    <section data-bs-version="5.1" class="footer7 cid-sSfHtr6wBk" once="footers" id="footer7-10">












      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>