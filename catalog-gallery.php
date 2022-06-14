<?php
// Initialize the session
session_start();

?>
<!doctype html>

<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>



    <meta charset="UTF-8">

    <title>All Products</title>

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

    No Space

    -->
        <div class="mainmenu">



            <nav id="h-menu" class="h-menu">

                <ul>

                <li>

<a href="index.html">covid-19 Update</a>

</li>

                    <li class="menu-has-children ">

                        <a href="catalog-gallery.php">Shop</a>



                    </li>

                    

                    <li>

                        <a href="contacts.php">Contacts</a>

                    </li>
                    <li>

<a href="index.php">Blood Donate</a>

</li>
<li>

<a href="hosindex.html">Hospital Appointment</a>

</li>





                </ul>

            </nav>



        </div>
        <!--

    No Space

-->
    </div>


    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="cont maincont">

                    <div class="section-top">

                        <h1 class="maincont-ttl">Shop</h1>
                        <ul class="b-crumbs">
                            <li><a href="">Shop</a></li>
                            <li>All Products</li>
                        </ul>
                    </div>


                    <div class="section-wrap-withsb">
                        <aside class="blog-sb-widgets section-sb" id="section-sb">

                            <div class="theiaStickySidebar">

                                <div class="section-filter">

                                    <div class="section-filter">

                                        <div class="blog-sb-widget multishopcategories_widget">

                                            <h3 class="widgettitle">Categories</h3>

                                            <div class="section-sb-current">

                                                <ul class="section-sb-list">

                                                    <li>

                                                        <a href="All_Products_mask.php"><span class="section-sb-label"> Face mask</a>

                                                    </li>

                                                    <li>

                                                        <a href="All_Products_sanitizer.php"><span class="section-sb-label">Hand sanitizer</a>

                                                    </li>

                                                    <li>

                                                        <a href="All_Products_oximeter.php"><span class="section-sb-label">Pulse oximeter</a>

                                                    </li>



                                                </ul>

                                            </div>

                                        </div>








                                    </div>

                                </div>

                            </div>

                        </aside>
                        <div class="section-list-withsb" id="section-list-withsb">
                            <div class="theiaStickySidebar">

                                <div class="row prod-items prod-items-2">
                                    <h1 class="prod-header1">Face mask</h1>
                                    <br>
                                    <?php
                                    include_once "database.php";
                                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_code` = 1");
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <article class="cf-sm-6 cf-md-6 cf-lg-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 sectgl-item">
                                        <div class="sectgl prod-i">
                                            <div class="prod-i-top">
                                                <a class="prod-i-img" href="<?php echo $row["path"]; ?>">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                                </a>
                                                <div class="prod-i-actions">
                                                    <div class="prod-i-actions-in">


                                                        <p class="prod-i-cart">
                                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prod-i-bot">
                                                <div class="prod-i-info">
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk.</p>
                                                    <p class="prod-i-categ"><a href="<?php echo $row["path"]; ?>"><?php echo $row["catagory"]; ?></a></p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"] ?></a></h3>
                                            </div>
                                        </div>
                                    </article>

                                    <?php
                                    include_once "database.php";
                                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_code` =2");
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <article class="cf-sm-6 cf-md-6 cf-lg-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 sectgl-item">
                                        <div class="sectgl prod-i">
                                            <div class="prod-i-top">
                                                <a class="prod-i-img" href="<?php echo $row["path"]; ?>">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                                </a>
                                                <div class="prod-i-actions">
                                                    <div class="prod-i-actions-in">


                                                        <p class="prod-i-cart">
                                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prod-i-bot">
                                                <div class="prod-i-info">
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk.</p>
                                                    <p class="prod-i-categ"><a href="<?php echo $row["path"]; ?>"><?php echo $row["catagory"]; ?></a></p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"]; ?></a></h3>
                                            </div>
                                        </div>
                                    </article>

                                    <h1 class="prod-header">sanitizer</h1>
                                    <br>
                                    <?php
                                    include_once "database.php";
                                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_code` = 3");
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                     <article class="cf-sm-6 cf-md-6 cf-lg-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 sectgl-item">
                                        <div class="sectgl prod-i">
                                            <div class="prod-i-top">
                                                <a class="prod-i-img" href="<?php echo $row["path"]; ?>">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                                </a>
                                                <div class="prod-i-actions">
                                                    <div class="prod-i-actions-in">


                                                        <p class="prod-i-cart">
                                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prod-i-bot">
                                                <div class="prod-i-info">
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk.</p>
                                                    <p class="prod-i-categ"><a href="<?php echo $row["path"]; ?>"><?php echo $row["catagory"]; ?></a></p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"] ?></a></h3>
                                            </div>
                                        </div>
                                    </article>

                                    <?php
                                    include_once "database.php";
                                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_code` = 4");
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <article class="cf-sm-6 cf-md-6 cf-lg-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 sectgl-item">
                                        <div class="sectgl prod-i">
                                            <div class="prod-i-top">
                                                <a class="prod-i-img" href="<?php echo $row["path"]; ?>">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                                </a>
                                                <div class="prod-i-actions">
                                                    <div class="prod-i-actions-in">


                                                        <p class="prod-i-cart">
                                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prod-i-bot">
                                                <div class="prod-i-info">
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk.</p>
                                                    <p class="prod-i-categ"><a href="<?php echo $row["path"]; ?>"><?php echo $row["catagory"]; ?></a></p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"] ?></a></h3>
                                            </div>
                                        </div>
                                    </article>
                                    <h1 class="prod-header">Pulse oximeter</h1>
                                    <br>
                                    <?php
                                    include_once "database.php";
                                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_code` =5");
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <article class="cf-sm-6 cf-md-6 cf-lg-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 sectgl-item">
                                        <div class="sectgl prod-i">
                                            <div class="prod-i-top">
                                                <a class="prod-i-img" href="<?php echo $row["path"]; ?>">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                                </a>
                                                <div class="prod-i-actions">
                                                    <div class="prod-i-actions-in">


                                                        <p class="prod-i-cart">
                                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prod-i-bot">
                                                <div class="prod-i-info">
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk.</p>
                                                    <p class="prod-i-categ"><a href="<?php echo $row["path"]; ?>"><?php echo $row["catagory"]; ?></a></p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"] ?></a></h3>
                                            </div>
                                        </div>
                                    </article>




                                        </div>
                                    </article>
                                </div>

                            </div>
                        </div>
                    </div>

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
