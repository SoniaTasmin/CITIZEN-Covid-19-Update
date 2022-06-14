
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: UserProfilePage.php");
    exit;
}

// Include config file
require_once "database.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT s_id, email, password FROM seller_profile WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $s_id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["s_id"] = $s_id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: UserProfilePage.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid  password.";
                        }
                    }
                } else {
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email.";
                }
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

    <title>login</title>

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

                        <a href="catalog-gallery.html">Shop</a>



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
                    <h1 class="maincont-ttl">Login</h1>
                    <ul class="b-crumbs">
                        <li><a href="index.html">Home</a></li>
                        <li>Login</li>
                    </ul>
                    <article class="page-cont">
                        <div class="page-styling">


                            <div class="auth-wrap">
                                <div class="auth-col">
                                    <h2>Login</h2>
                                    <?php
                                    if (!empty($login_err)) {
                                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                    }
                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <p class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                            <label for="email">email <span class="required">*</span></label>
                                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                        </p>
                                        <p class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                        </p>
                                        <p class="auth-submit">
                                            <input type="submit" value="Login">

                                        </p>
                                        <p class="auth-lost_password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                    <p class="auth-signup">New Member? Sign up <a href="register.php"> here.</a></p>
                                </div>

                            </div>


                        </div>
                    </article>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->




           
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
