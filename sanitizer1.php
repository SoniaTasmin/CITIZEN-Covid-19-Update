<?php
// Initialize the session
session_start();

?>
<?php
include_once 'database.php';
$result = mysqli_query($conn, "SELECT * FROM products WHERE `product_code`=3");

?>
<!doctype html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>



    <meta charset="UTF-8">

    <title>Huangjisoo Hand sanitizer</title>

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

                <li>

<a href="index.html">covid-19 Update</a>

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
                    <ul class="b-crumbs">
                        
                        <li><a href="catalog-gallery.php">All Products</a></li>
                        <li>Product</li>
                    </ul>
                    <article>
                        <?php
                        $row = mysqli_fetch_array($result)
                        ?>
                        <div class="prod">
                            <div class="prod-slider-wrap prod-slider-shown">
                                <div class="flexslider prod-slider" id="prod-slider">
                                    <ul class="slides">
                                        <li>
                                            <a data-fancybox-group="prod" class="fancy-img" href="<?php base64_encode($row['image']); ?>">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="prod-slider-count">
                                        <p class="hover-label prod-slider-zoom"><i class="icon ion-search"></i><span>Zoom In</span></p>
                                    </div>
                                </div>
                                <div class="flexslider prod-thumbs" id="prod-thumbs">
                                    <ul class="slides">
                                        <li>
                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="prod-cont">

                                <p class="prod-categs"><a href="All_Products_sanitizer.php">Hand sanitizer</a>, <a href="#"><?php echo $row["brand"]; ?></a></p>
                                <h1><?php echo $row["name"]; ?></h1>
                                <div class="variations_form cart">
                                    <p class="prod-price"><?php echo $row["price"]; ?> Tk.</p>
                                    <p class="prod-excerpt">Pellentesque habitant morbi tristique senectus et netus
                                        et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae,
                                        ultricies eget... <a id="prod-showdesc" class="prod-excerpt-more" href="#">read more</a></p>



                                    <div class="prod-add">

                                        <p class="prod-i-cart">
                                            <a href="#" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["price"]; ?>" class="add-to-cart btn btn-primary"><i class="icon ion-android-cart"></i><span></span></a>
                                        </p>


                                    </div>

                                </div>
                                <div class="prod-props">
                                    <dl class="product_meta">
                                        <dt>Product Code:</dt>
                                        <dd><?php echo $row["product_code"]; ?></dd>
                                        <dt>Brand:</dt>
                                        <dd><a href="#"><?php echo $row["brand"]; ?></a></dd>
                                        <dt>Weight</dt>
                                        <dd><?php echo $row["weight"]; ?></dd>
                                        <dt>Dimensions</dt>
                                        <dd><?php echo $row["dimension"]; ?></dd>
                                        <dt>Сolor</dt>
                                        <dd><?php echo $row["color"]; ?></dd>
                                        <dt>Manufacturer</dt>
                                        <dd><?php echo $row["manufacturer"]; ?></dd>
                                        <dt>Material</dt>
                                        <dd><?php echo $row["material"]; ?></dd>
                                    </dl>
                                </div>
                            </div>
                            <p class="prod-badge">
                                <span class="badge-1">TOP SELLER</span>
                            </p>
                        </div>
                        <div class="prod-tabs-wrap">
                            <ul class="prod-tabs">
                                <li id="prod-desc" class="active" data-prodtab-num="1">
                                    <a data-prodtab="#prod-tab-1" href="#">Description</a>
                                </li>

                            </ul>
                            <div class="prod-tab-cont">
                                <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">
                                    Description</p>
                                <div class="prod-tab page-styling prod-tab-desc" id="prod-tab-1">
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                                        turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
                                        tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                        ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                </div>
                                
                                <div class="prod-tab" id="prod-tab-2">
                                    <dl class="prod-tab-props">
                                        <dt>Weight</dt>
                                        <dd><?php echo $row["weight"]; ?></dd>
                                        <dt>Dimensions</dt>
                                        <dd><?php echo $row["dimension"]; ?></dd>
                                        <dt>Сolor</dt>
                                        <dd>
                                            <p><?php echo $row["color"]; ?></p>
                                        </dd>
                                        <dt>Manufacturer</dt>
                                        <dd>
                                            <p><a href="#"><?php echo $row["manufacturer"]; ?></a></p>
                                        </dd>
                                        <dt>Material</dt>
                                        <dd>
                                            <p><?php echo $row["material"]; ?></p>
                                        </dd>
                                    </dl>
                                </div>


                            </div>
                        </div>

                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM `products` WHERE `catagory` LIKE 'hand sanitizer' AND `product_code` != 3")
                        ?>
                        <h2 class="prod-related-ttl">Related Products</h2>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($res)) {
                            if ($i < 5) { ?>
                                <div class="row prod-items prod-items-4 ">
                                    <article class=" sectgl-item sectgl-item ">

                                        <?php
                                        $i++; ?>
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
                                                    <p class="prod-i-price"><?php echo $row["price"]; ?> Tk</p>
                                                    <p class="prod-i-categ"><a href="All_Products_sanitizer.php">Hand sanitizer</a>
                                                    </p>
                                                </div>
                                                <h3 class="prod-i-ttl"><a href="<?php echo $row["path"]; ?>"><?php echo $row["name"]; ?></a></h3>
                                            </div>
                                        </div>
                                    </article>

                                </div>
                        <?php }
                        } ?>

                    </article>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->


        <!-- Elements -->
        <div class="content-area width-full">
            <div class="maincont page-styling page-full">


                <div class="container mb20 page-styling row-wrap-container row-wrap-nottl">
                    <div class="row">
                        <div class="cf-lg-4 col-sm-4">
                            <div class="iconbox-item iconbox-i-3">
                                <div class="iconbox-i-top">
                                    <p class="iconbox-i-img">
                                        <i class="fa fa-road"></i>
                                    </p>
                                    <h3>Financing Services</h3>
                                </div>
                                <p>We have proper financing services to provide better service than others.</p>
                            </div>
                        </div>
                        <div class="cf-lg-4 col-sm-4">
                            <div class="iconbox-item iconbox-i-3">
                                <div class="iconbox-i-top">
                                    <p class="iconbox-i-img">
                                        <i class="fa fa-truck"></i>
                                    </p>
                                    <h3>Home Delivery</h3>
                                </div>
                                <p>We provide Home delivery serivice for all the products via "Pathao"</p>
                            </div>
                        </div>
                        <div class="cf-lg-4 col-sm-4">
                            <div class="iconbox-item iconbox-i-3">
                                <div class="iconbox-i-top">
                                    <p class="iconbox-i-img">
                                        <i class="fa fa-shield"></i>
                                    </p>
                                    <h3>Warranty Available</h3>
                                </div>
                                <p> All our products have warranty, which will last till 12 months after purchasing,
                                 terms and conditions are applied. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mb60 page-styling row-wrap-container row-wrap-nottl">
                    <div class="promobox-i promobox-i-hasbtn">
                        <h3>Our terms of services</h3>
                        <p>Information that you will give us during the creation of your account and during purhase. If you don't provide us with the information that we'll need then you won't be able to take advantage of our service.</p>
                        <a class="promobox-i-link" href="terms.php">READ MORE</a>
                    </div>
                </div>
                <div class="container-fluid page-styling row-wrap-full product-parallax-bg" style="background-image: url(img/1/product/bg2.jpg);"></div>
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
