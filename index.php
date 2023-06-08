<?php 
  require_once 'core/init.php';

  if (isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('dashboard.php','_self')</script>";
  }
  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Atelis Music School</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/--mp---Masonry-Gallery-with-Loader.css">
    <link rel="stylesheet" href="assets/css/Accordion-with-custom-design.css">
    <link rel="stylesheet" href="assets/css/Color-Contact-List.css">
    <link rel="stylesheet" href="assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="assets/css/Custom-product-list-audio---black.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing-1.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="assets/css/Landing-Section-with-Call-to-Action-BS4.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/some-message.css">
</head>

<body>
    <!-- Start: Landing Section with Call to Action BS4 -->
    <div class="landing-threshold" style="height: 100%;">
        <div class="container-fluid" style="height: 655px;">
            <div class="landing-intro">
                <center><img style="width: 150px; height: 150px;" src="logo/logo.png"></center>
                <h1>Atelis Music School Facilitation System</h1>
                <p class="lead">Apply for Enrollment or Login</p>
                <p class="lead visually-hidden">Webim PNG is a Digital Marketing and Web Development Business Located in Port Moresby, Papua New Guinea. Services provided by webim PNG include: Search Engine Optimization, Social Media Integrated Engagements, Content Marketing, Email Marketing, Progressive Web Applications, Web Performance &amp; Analytics.</p><a class="btn" href="login.php">LOGIN</a><a class="btn" href="apply.php">APPLY FOR ENROLLMENT</a>
            </div>
            <div class="d-flex justify-content-between landing-cta-group">
                <!-- Start: newsocialwebimlinks --><span class="align-self-end social-links"><a href="https://www.facebook.com/Webim-PNG-100236798021993" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://www.pinterest.com/0kybwxsjpsixrwndk5tstfuc9yvk64"><i class="fa fa-pinterest-p"></i></a><a href="#"><i class="fa fa-youtube-play"></i></a><a href="https://www.instagram.com/webim.png/" target="_blank"><i class="fa fa-instagram"></i></a><a href="https://www.linkedin.com/in/arnold-forova-b12610170/" target="_blank"><i class="fa fa-linkedin"></i></a></span><!-- End: newsocialwebimlinks -->
                <div class="btn-group-vertical align-self-center" role="group"><button class="btn btn-success btn-sm" type="button"><i class="material-icons">phone</i></button><button class="btn btn-primary btn-sm" type="button"><i class="material-icons">textsms</i></button><button class="btn btn-danger btn-sm" type="button"><i class="material-icons">email</i></button></div>
            </div>
        </div>
    </div><!-- End: Landing Section with Call to Action BS4 -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/--mp---Masonry-Gallery-with-Loader.js"></script>
    <script src="assets/js/Accordion-with-custom-design.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>