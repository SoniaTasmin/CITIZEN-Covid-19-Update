<?php
error_reporting(0);
include('hosincludes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital Appointment</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="hoscss/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('hosincludes/header.php');?>
<?php include('hosincludes/slider.php');?>
   
    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to our hospital appointment website</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">The need for good health</h4>
                   
                        <p class="card-text" style="padding-left:2%">Being healthy should be part of your overall lifestyle. Living a healthy lifestyle can help prevent chronic diseases and long-term illnesses. Feeling good about yourself and taking care of your health are important for your self-esteem and self-image. Maintain a healthy lifestyle by doing what is right for your body. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Health Tips</h4>
                   
                        <p class="card-text" style="padding-left:2%">Everyone knows that eating a balanced diet, exercising and getting plenty of rest are key to maintaining good health. However, that can seem to be an impossible task while in college. Frequently, the appeal of sweets, fast food, caffeine and alcohol outweigh healthy options when you’re in work or stress.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Who you could Help</h4>
                   
                        <p class="card-text" style="padding-left:2%">Help the people in need.Pandemic situation has made our lives.People below poverty level suffersd the most.It will be an ethical thing to help the people in need. </p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        
        <!-- /.row -->

        <!-- Features Section -->
        
        <div class="row">
            <div class="col-lg-6">
                <h2>Why choose our website?</h2>
          <p> Clinical excellence must be the priority for any health care service provider. We ensure to find the best healthcare service comprise of professional (clinical) service excellence with outstanding personal service.</p>
               
            
            </div>
            <div class="col-lg-6">
               <!-- <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">-->
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Appoint a Hospital</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
