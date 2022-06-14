<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include_once 'database.php';
    $email = htmlspecialchars($_SESSION["email"]);
    $result = mysqli_query($conn, "SELECT * FROM `seller_profile` WHERE `email` = '$email'");

    $email = $password = $confirm_password = "";
    $email_err = $password_err = $confirm_password_err = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter a email.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id FROM seller_profile WHERE email = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                // Set parameters
                $param_email = trim($_POST["email"]);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $email_err = "This email is already taken.";
                    } else {
                        $email = trim($_POST["email"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }



        // Check input errors before inserting in database
        if (empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

            // Prepare an insert statement
            $sql = "UPDATE `seller_profile` SET `email`=?,`password`=? WHERE `email` = '$email'";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);

                // Set parameters
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: logout.php");
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
                            <h1 class="maincont-ttl">Edit Your Credentials</h1>
                            <br>
                            <article class="page-cont">
                                <div class="page-styling">


                                    <div class="auth-wrap justify-content-center">
                                        <div class="profile-img">
                                            <img src="img/1/user/generic_profile_male.png" alt="" width="250" height="300">
                                        </div>
                                        <div class="auth-col">
                                            <?php
                                            $row = mysqli_fetch_array($result)
                                            ?>
                                            <br>
                                            <form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <p class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                                    <label for="email">email <span class="required">*</span></label>
                                                    <input type="text" id="f_name" name="email" value="<?php echo $email; ?>">
                                                    <?php echo $email_err; ?>
                                                </p>
                                                <p class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                    <label for="password">Password <span class="required">*</span></label>
                                                    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                                                    <?php echo $password_err; ?>
                                                </p>
                                                <p class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                    <label for="password">Confirm Password <span class="required">*</span></label>
                                                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                                    <?php echo $confirm_password_err; ?>
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

                    <button class="btn callback">Contact Us</button>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Company</h3>

                    <ul class="menu">

                        <li>

                            <a href="index.html">Home Page</a>

                        </li>

                        <li>

                            <a href="about.html">About Us</a>

                        </li>

                        <li>

                            <a href="contacts.html">Contacts</a>

                        </li>

                        <li>

                            <a href="index.html">Gallery</a>

                        </li>

                    </ul>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Shop</h3>

                    <ul class="menu">

                        <li>

                            <a href="#">Gaming Mice</a>

                        </li>

                        <li>

                            <a href="#">Keyboards</a>

                        </li>

                        <li>

                            <a href="#">Headphone</a>

                        </li>

                        <li>

                            <a href="#">Monitor</a>

                        </li>

                    </ul>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 align-center-mobile widget">

                    <h3 class="widgettitle">Account</h3>

                    <ul class="menu">

                        <li>

                            <a href="auth.html">My Account</a>

                        </li>

                        <li>

                            <a href="cart.html">Cart</a>

                        </li>

                    </ul>

                </div>

            </div>

        </div><!-- #page -->

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
                        <button type="button" class="butn4 btn-primary">Order now</button>
                    </div>
                </div>
            </div>
        </div>



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
