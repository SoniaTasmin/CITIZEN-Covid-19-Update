<?php
// Initialize the session
session_start();

?>
<?php
// Include config file
require_once "database.php";

// Define variables and initialize with empty values
$s_id = $s_id_err = "";
$name = $name_err = "";
$price = $price_err = "";
$brand = $brand_err = "";
$weight = $weight_err = "";
$material = $material_err = "";
$color = $color_err = "";
$dimension = $dimension_err = "";
$expiry_date = $expiry_date_err = "";
$manufacturer = $manufacturer_err = "";
$description = $description_err = "";
$uploaded = $uploaded_err = "";
$catagory = $catagory_err = "";




// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter price.";
    } else {
        $price = trim($_POST["price"]);
    }
    if (empty(trim($_POST["s_id"]))) {
        $s_id_err = "Please enter your id.";
    } else {
        $s_id = trim($_POST["s_id"]);
    }
    if (empty(trim($_POST["catatory"]))) {
        $catagory_err = "Please enter catagory.";
    } else {
        $catagory = trim($_POST["catagory"]);
    }









    // Check input errors before inserting in database
    if (empty($s_id_err) && empty($name_err)  && empty($price_err) &&  empty($catagory_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO products ( s_id, name, price,brand, weight, material, color,  dimension, expiry_date, manufacturer, description, uploaded, catagory) VALUES (?,?, ?, ?, ?, ?,?, ?, ?, ?,?,?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss",  $param_s_id, $param_name, $param_price,  $param_brand, $param_weight, $param_material, $param_color, $param_dimension, $param_expiry_date, $param_manufacturer, $param_description,  $param_uploaded, $param_catagory);

            // Set parameters
            $param_s_id= $s_id;
            $param_name = $name;
            $param_price = $price;
             $param_brand= $brand;
             $param_weight= $weight;
             $param_material= $material;
             $param_color= $color;
             $param_dimension= $dimension;
             $param_expiry_date= $expiry_date;
             $param_manufacturer= $manufacturer;
             $param_description= $description;
              $param_uploaded= $uploaded;
            $param_catagory = $catagory;



            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
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


<!-- Mirrored from multishop-html.real-web.pro/auth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Mar 2021 15:21:48 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>



    <meta charset="UTF-8">

    <title>reg form</title>

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
                    <h1 class="maincont-ttl">Registration</h1>
                    <ul class="b-crumbs">
                        <li><a href="index.html">Home</a></li>
                        <li>Registration</li>
                    </ul>
                    <article class="page-cont">
                        <div class="page-styling">


                            <div class="auth-wrap justify-content-center">
                                <div class="auth-col">
                                    <h2>Registration</h2>
                                    <form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                      <p class="form-group <?php echo (!empty($s_id_err)) ? 'has-error' : ''; ?>">
                                          <label for="s_id">id <span class="required">*</span></label>
                                          <input type="number" id="s_id" name="id" value="<?php echo $s_id; ?>">
                                          <?php echo $s_id_err; ?>
                                      </p>
                                        <p class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                                            <?php echo "<font color='red'>  $name_err </font>" ?>
                                        </p>
                                        <p class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                                            <label for="f_name">Price <span class="required">*</span></label>
                                            <input type="number" id="price" name="price" value="<?php echo $price; ?>">
                                            <?php echo $price_err; ?>
                                        </p>
                                        <p class="form-group">
                                            <label for="brand">Brand</label>
                                            <input type="text" id="brand" name="brand" value="<?php echo brand; ?>">

                                        </p>

                                        <p class="form-group">
                                            <label for="weight">Weight</label>
                                            <input type="text" id="weight" name="weight" value="<?php echo brand; ?>">

                                        </p>
                                        <p class="form-group">
                                            <label for="material">Material</label>
                                            <input type="text" id="material" name="material" value="<?php echo material; ?>">

                                        </p>
                                        <p class="form-group">
                                            <label for="color">Color</label>
                                            <input type="text" id="color" name="color" value="<?php echo color; ?>">

                                        </p>

                                        <p class="form-group">
                                            <label for="dimension">dimension</label>
                                            <input type="text" id="dimension" name="dimension" value="<?php echo dimension; ?>">

                                        </p>
                                        <p class="form-group">
                                            <label for="expiry_date">expiry_date</label>
                                            <input type="date" id="expiry_date" name="expiry_date" value="<?php echo expiry_date; ?>">

                                        </p>
                                        <p class="form-group">
                                            <label for="manufacturer">expiry_date</label>
                                            <input type="text" id="manufacturer" name="manufacturer" value="<?php echo manufacturer; ?>">

                                        </p>

                                        <p class="form-group">
                                            <label for="description">description</label>
                                            <input type="text" id="description" name="description" value="<?php echo description; ?>">

                                        </p>
                                        <p class="form-group">
                                            <label for="uploaded">uploaded</label>
                                            <input type="datetime" id="uploaded" name="uploaded" value="<?php echo uploaded; ?>">

                                        </p>


                                        <p class="form-group <?php echo (!empty($catagory_err)) ? 'has-error' : ''; ?>">
                                            <label for="catagory">Catagory <span class="required">*</span></label>
                                            <input type="text" id="catagory" name="catagory" value="<?php echo $catagory; ?>">
                                            <?php echo $catagory_err; ?>
                                        </p>
                                        <p class="auth-submit">
                                            <a href="login.php"><input type="submit" value="Add Product"></a>
                                        </p>


                                    </form>

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
