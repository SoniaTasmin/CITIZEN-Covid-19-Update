<?php
// Initialize the session
session_start();

?>
<!doctype html>

<html lang="en">


<!-- Mirrored from multishop-html.real-web.pro/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Mar 2021 15:23:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>



    <meta charset="UTF-8">

    <title>MultiShop - eCommerce HTML Template</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="format-detection" content="telephone=no">



    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i&amp;subset=cyrillic" rel="stylesheet">



    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/ionicons.min.css">



    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/jquery.formstyler.css">

    <link rel="stylesheet" href="css/flexslider.css">

    <link rel="stylesheet" href="css/jquery.fancybox.css">

    <link rel="stylesheet" href="css/ion.rangeSlider.css">

    <link rel="stylesheet" href="css/jquery.mThumbnailScroller.css">

    <link rel="stylesheet" href="css/chosen.css">



    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/elements.css">

    <link rel="stylesheet" href="css/media.css">

    <link rel="stylesheet" href="css/elements-media.css">


</head>

<body>
    <div class="site-header">



        <p class="h-logo">

           

        </p>
        <!--

    No Space

    -->
        <div class="h-shop">



            <form method="post" action="search.php" class="h-search" id="h-search">

                <input type="text" name="search" placeholder="Search">

                <button type="submit"><i class="ion-search"></i></button>

            </form>


            <ul class="h-shop-links">

                <li class="h-search-btn" id="h-search-btn"><i class="ion-search"></i></li>


                <li class="h-shop-icon h-profile">

                    <a href="UserProfilePage.php" title="My Account">

                        <i class="ion-android-person"></i>

                    </a>

                    <ul class="h-profile-links">

                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Registration</a></li>
                        <li><a href="logout.php">Logout</a></li>

                        <li><a href="#">Cart</a></li>

                    </ul>

                </li>


                <li class="h-cart">

                    <a class="cart-contents" href="#">



                        <button type="button" class="butn callback" data-toggle="modal" data-target="#cart"><i class="ion-android-cart"></i>(<span class="total-count"></span>)</button>

                        <button class="clear-cart butn1 ">X</button>
                    </a>


                </li>


                <li class="h-menu-btn" id="h-menu-btn">

                    <i class="ion-navicon"></i> Menu

                </li>

            </ul>

        </div>
        <!--

    No Space-->
        <div class="mainmenu">



            <nav id="h-menu" class="h-menu">

                <ul>

                    <li class="menu-has-children ">

                        <a href="index.html">Covid-19 Update</a>

                    </li>

                    <li class="menu-has-children ">

                        <a href="catalog-gallery.php">Shop</a>



                    </li>

                    

                    <li>

                        <a href="contacts.php">Contacts</a>

                    </li>





                </ul>

            </nav>



        </div>
        <!--

    No Space-->
    </div>

    <div id="content" class="site-content">
        <div id="primary" class="content-area width-full">
            <main id="main" class="site-main">
                <div class="cont">
                    <h1 class="maincont-ttl">Contacts</h1>

                    <ul class="b-crumbs">
                        <li><a href="index.html">Home</a></li>
                        <li>Contacts</li>
                    </ul>
                </div>
                <div class="maincont page-styling page-full">


                    <div class="cont row-wrap-boxed contacts-page">
                        <div class="page-cont">
                            <div class="row">
                                <div class="cf-lg-4 col-sm-4">
                                    <h3>Information</h3>
                                    <p>Citizen </p>
                                    <br>
                                    <h3>Address</h3>
                                    <p>Block-A, Road-2, Bashundhara R/A, Dhaka, Bangladesh</p>
                                    <br>
                                    <h3>Email</h3>
                                    <p><a href="mailto:email@email.com">rahmanrifat61@gmail.com</a></p>
                                    <br>
                                </div>
                                <div class="cf-lg-8 col-sm-4">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <h3>Phone</h3>
                                            <p>+8801876878724</p>
                                            <br>
                                            <h3>Working Hours</h3>
                                            <p>Sunday-Thursday: 8am to 6pm<br> Saturday: 10am to 2pm<br> Friday: Closed<br> Support 24/7
                                            </p>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div><!-- .maincont.page-styling.page-full -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->



    

            <script type="text/javascript">
                function form_submit() {
                    document.getElementById("checkout").submit();
                }
            </script>

            <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="js/cart.js"></script>
            <script src="js/jquery-1.12.3.min.js"></script>
            <script src="js/jquery-plugins.js"></script>
            <script src="js/main.js"></script>



</body>


</html>