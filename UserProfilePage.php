<?php

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include_once 'database.php';
    $name = htmlspecialchars($_SESSION["email"]);
    $result = mysqli_query($conn, "SELECT * FROM `seller_profile` WHERE `email` = '$name'");

?>
    <!doctype html>

    <html lang="en">


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>



        <meta charset="UTF-8">

        <title>User Profile</title>

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
        <div id="page" class="site">

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

                                <li><?php
                                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                        echo "<a href=UserProfilePage.php>" . htmlspecialchars($_SESSION["email"]) . "</a>";
                                    } else { ?>
                                        <a href="login.php">Login</a>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <li><a href="register.php">Registration</a></li>
                                <li><a href="logout.php">Logout</a></li>

                                <li><a href="#">Cart</a></li>

                            </ul>

                        </li>


                        <li class="h-cart">

                            <a class="cart-contents" href="#">



                                <button type="button" class="butn callback" data-toggle="modal" data-target="#cart"><i class="ion-android-cart"></i>(<span class="total-count"></span>)</button>

                                
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

                                <a href="index.html">Covid-19 update</a>

                            </li>

                            <li class="menu-has-children ">

                                <a href="catalog-gallery.php">Shop</a>



                            </li>

                            <li>

                                <a href="about.php">About Us</a>

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
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="cont maincont">

                            <div class="profile-wrap">


                                <div class="profile-col">
                                    <p>User Profile</p>
                                    <?php
                                    $row = mysqli_fetch_array($result)
                                    ?>
                                    <form action="edit-credentials.php">
                                        <button class="view-history2" type="submit">
                                            Edit Credentials
                                        </button>
                                    </form>
                                    <table>
                                        <tr>
                                            <td class="table-header">
                                                Name:
                                            </td>
                                            <td>
                                                <?php echo $row["name"];
                                                
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-header">
                                                Company name:
                                            </td>
                                            <td>
                                                <?php echo $row["company_name"];
                                                
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="table-header">
                                                Email:
                                            </td>
                                            <td>
                                                <?php echo $row["email"]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-header">
                                                Address:
                                            </td>
                                            <td>
                                                <?php echo $row["address"];
                                                ?>
                                            </td>
                                        </tr>
                                    </table>

                                    <form action="edit-profile.php">
                                        <button class="view-history" type="submit">
                                            Edit Profile
                                        </button>
                                    </form>


                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </main>
                </div>

            </div>



           
            <div class="form-validate modal-form" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                        </div>
                        <div class="modal-body">
                            <table class="show-cart table">

                            </table>
                            <div>Total price: <span class="total-cart"></span> Tk.</div>
                        </div>
                        <div class="modal-footer">
                            <form action="checkout.php" id="checkout" method="get">
                                <button type="button" onclick="form_submit()" class="butn4 btn-primary">Order now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


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
