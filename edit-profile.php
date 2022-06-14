<?php

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include_once 'database.php';
    $email = htmlspecialchars($_SESSION["email"]);
    $result = mysqli_query($conn, "SELECT * FROM `seller_profile` WHERE `email` = '$email'");

    $first_name = $first_name_err = "";
    $company_name = $company_name_err = "";

    $address = $address_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["first_name"]))) {
            $first_name_err = "Please enter your first name.";
        } else {
            $first_name = trim($_POST["first_name"]);
        }

        if (empty(trim($_POST["company_name"]))) {
            $company_name_err = "Please enter your Company name.";
        } else {
            $company_name = trim($_POST["company_name"]);
        }



        if (empty(trim($_POST["address"]))) {
            $address_err = "Please enter your address.";
        } else {
            $address = trim($_POST["address"]);
        }




        // Check input errors before inserting in database
        if (empty($first_name_err) && empty($company_name_err) && empty($address_err)) {

            // Prepare an insert statement
            $sql = "UPDATE `seller_profile` SET `first_name`=?,`company_name`=?,`Address`=? WHERE `email` = '$email'";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_first_name, $param_company_name,  $param_address);

                // Set parameters
                $param_first_name = $first_name;
                $param_company_name = $company_name;

                $param_address = $address;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: UserProfilePage.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($conn);
    }

?>
    <!doctype html>

    <html lang="en">


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>



        <meta charset="UTF-8">

        <title>Edit-profile</title>

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

                    <a href="index.php"><img src="img/logo.png" alt="Amader Shop"></a>

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

                                <a href="index.php">Home</a>

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
                <div id="primary" class="content-area width-normal">
                    <main id="main" class="site-main">
                        <div class="cont maincont">
                            <h1 class="maincont-ttl">Edit Your Profile</h1>
                            <br>
                            <article class="page-cont">
                                <div class="page-styling">


                                    <div class="auth-wrap justify-content-center">


                                        <div class="auth-col">
                                            <?php
                                            $row = mysqli_fetch_array($result)
                                            ?>
                                            <br>
                                            <form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <p class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                                    <label for="first_name">Name <span class="required">*</span></label>
                                                    <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
                                                    <?php echo $first_name_err; ?>
                                                </p>
                                                <p class="form-group <?php echo (!empty($company_name_err)) ? 'has-error' : ''; ?>">
                                                    <label for="f_name">Company name <span class="required">*</span></label>
                                                    <input type="text" id="f_name" name="company_name" value="<?php echo $company_name; ?>">
                                                    <?php echo $company_name_err; ?>
                                                </p>



                                                <p class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                                    <label for="address">Address <span class="required">*</span></label>
                                                    <input type="text" id="address" name="address" value="<?php echo $address; ?>">
                                                    <?php echo $address_err; ?>
                                                </p>
                                                <p class="auth-submit">
                                                    <input type="submit" value="Update Information">
                                                </p>

                                            </form>
                                        </div>


                                    </div>


                                </div>
                            </article>
                        </div>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        <?php
    } ?>
        <!-- #content -->


        <div class="container-fluid blog-sb-widgets page-styling site-footer">

            <div class="row">

                <div class="col-sm-12 col-md-4 widget align-center-tablet f-logo-wrap">

                    <a href="index.html" class="f-logo">

                        <img src="img/logo.png" alt="logo" style="width: 70%;">

                    </a>

                    <p><b><i>Best Products. Better Prices</i></b></p>



                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Company</h3>

                    <ul class="menu">

                        <li>

                            <a href="index.php">Home Page</a>

                        </li>

                        <li>

                            <a href="about.php">About Us</a>

                        </li>

                        <li>

                            <a href="contacts.php">Contacts</a>

                        </li>


                    </ul>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Shop</h3>

                    <ul class="menu">

                        <li>

                            <a href="Product_page_mouse1.php">Gaming Mice</a>

                        </li>

                        <li>

                            <a href="Product_page_keyboard1.php">Keyboards</a>

                        </li>

                        <li>

                            <a href="Product_page_headset1.php">Headphone</a>

                        </li>

                        <li>

                            <a href="Product_page_monitor1.php">Monitor</a>

                        </li>

                    </ul>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Account</h3>

                    <ul class="menu">

                        <li>

                            <a href="UserProfilePage.php">My Account</a>

                        </li>

                        <li>

                            <a href="#" class=" callback" data-toggle="modal" data-target="#cart">Cart</a>

                        </li>

                    </ul>

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
