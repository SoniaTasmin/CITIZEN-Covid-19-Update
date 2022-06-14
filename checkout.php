<?php
// Initialize the session
session_start();

?>
<!doctype html>

<html lang="en">


<!-- Mirrored from multishop-html.real-web.pro/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Mar 2021 15:21:48 GMT -->
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
    <div id="page" class="site">











        <div class="site-header">


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
                                            echo "<a href=UserProfilePage.php>" . htmlspecialchars($_SESSION["username"]) . "</a>";
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

                                    <a href="about.php">About Us</a>

                                </li>

                                <li>

                                    <a href="contacts.php">Contacts</a>

                                </li>





                            </ul>

                        </nav>



                    </div>
                    <!--

    No Space

-->
                </div>





                <div id="content" class="site-content">
                    <div id="primary" class="content-area width-normal">
                        <main id="main" class="site-main">
                            <div class="cont maincont">
                                <h1 class="maincont-ttl">Checkout</h1>
                                <ul class="b-crumbs">
                                    <li><a href="catalog-gallery.php">products</a></li>
                                    <li>Checkout</li>
                                </ul>
                                <article class="page-cont">
                                    <div class="page-styling">



                                        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="#">


                                            <div class="col2-set" id="customer_details">
                                                <div class="col-1">
                                                    <div class="woocommerce-billing-fields">

                                                        <h3>Billing details</h3>


                                                        <div class="woocommerce-billing-fields__field-wrapper">
                                                            <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10"><label for="billing_first_name" class="">Name <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" autofocus="autofocus" />
                                                            </p>
                                                            
                                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" />
                                                            </p>
                                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70"><label for="billing_city" class="">Town / City <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2" /></p>
                                                            </p>
                                                            <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90"><label for="billing_postcode" class="">Postcode
                                                                    / ZIP <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code" />
                                                            </p>
                                                            <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label><input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel" /></p>
                                                            <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110"><label for="billing_email" class="">Email address <abbr class="required" title="required">*</abbr></label><input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="dn190@yandex.ru" autocomplete="email username" />
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-2">
                                                    
                                                    <div class="woocommerce-additional-fields">


                                                        <div class="woocommerce-additional-fields__field-wrapper">
                                                            <p class="form-row notes" id="order_comments_field" data-priority=""><label for="order_comments" class="">Order notes</label><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea></p>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                            <h3 id="order_review_heading">Your order</h3>


                                            <div id="order_review" class="woocommerce-checkout-review-order">
                                                <table class="show-cart table">
                                                
                                                
                                                </table>
                                                <div>Total price: <span class="total-cart"></span> Tk.</div>
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method payment_method_cheque">
                                                            
                                                            <div class="payment_box payment_method_cheque">
                                                                <p>We only do Cash on deliveries for now.</p>
                                                            </div>
                                                        </li>
                                                       
                                                    </ul>
                                                    <div class="form-row place-order">
                                                        <noscript>
                                                            Since your browser does not support JavaScript, or it is disabled, please ensure you click
                                                            the <em>Update Totals</em> button before placing your order. You may be charged more than
                                                            the amount stated above if you fail to do so. <br /><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                                                        </noscript>


                                                        <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order" />

                                                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="6f6a2b42bd" /><input type="hidden" name="_wp_http_referer" value="/multishop/order/" />
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

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


<!-- Mirrored from multishop-html.real-web.pro/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Mar 2021 15:21:50 GMT -->

</html>