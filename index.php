<?php 
session_start();
    require_once 'owner/DBManager.php';
    $DBM = new DBManager();
    $query = $DBM->viewFlatHome();

?>
<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from htmlguru.net/house-rent/index02.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2019 20:46:49 GMT -->
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="glimmer is a modern presentation HTML5 Blog template.">
    <meta name="keywords" content="HTML5, Template, Design, Development, Blog" />
    <meta name="author" content="">

    <!-- Titles
    ================================================== -->
    <title>House-Rent Solutions</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="assets/images/house-logo.png">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">

    <!-- Custom Font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i%7cPoppins:300,400,500,600,700" rel="stylesheet">   
    
    
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="style.css">
    <!-- Modernizr
    ================================================== -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- ====== Header Mobile Area ====== -->
    <header class="mobile-header-area bg-gray-color hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 tb">
                    <div class="mobile-header-block">
                        <div class="menu-area tb-cell">
                            <!--Mobile Main Menu-->
                            <div class="mobile-menu-main hidden-md hidden-lg">
                                <div class="menucontent overlaybg"></div>
                                <div class="menuexpandermain slideRight">
                                    <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                        <span></span>
                                    </a>
                                    <span id="menu-marker"></span>
                                </div><!--/.menuexpandermain-->
                                <div id="mobile-main-nav" class="main-navigation slideLeft">
                                    <div class="menu-wrapper">
                                        <div id="main-mobile-container" class="menu-content clearfix"></div>
                                        <div class="left-content">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-phone-square"></i>Call Us - 01623 030020</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="cd-signin"><i class="fa fa-address-book"></i>Login / Register</a>
                                                </li>
                                            </ul>
                                        </div><!-- /.left-content -->
                                        <div class="social-media">
                                            <h5>Follow Us</h5>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            </ul>
                                        </div><!-- /.social-media -->
                                    </div>
                                </div><!--/#mobile-main-nav-->
                            </div><!--/.mobile-menu-main-->
                        </div><!-- /.menu-area -->
                        <div class="logo-area tb-cell">
                            <div class="site-logo">
                                <a href="index.php">
                                    <img src="assets/images/footer-logo.png" alt="site-logo" />
                                </a>
                            </div><!-- /.site-logo -->
                        </div><!-- /.logo-area -->
                        <div class="search-block tb-cell">
                            
                        </div><!-- /.search-block -->
                        <div class="additional-content tb-cell">
                            <a href="#" class="trigger-overlay"><i class="fa fa-sliders"></i></a>
                        </div><!-- /.additional-content -->
                    </div><!-- /.mobile-header-block -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.mobile-header-area --> 

    <!-- ====== Header Top Area ====== -->
    <header class="header-area bg-gray-color style-two hidden-xs hidden-sm">
        <div class="container">
            <div class="header-top-content">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="social-media">
                            <h5>Follow Us</h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div><!-- /.social-media -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-8">
                        <div class="left-content">
                            <ul>
                                
                                <li>
                                    <a href="#"><i class="fa fa-phone-square"></i>Call Us - 01623 030020</a>
                                </li>
                                <?php
                                
                                if (@$_SESSION['tenant_login'] != TRUE) {
                                ?>
                                <li>
                                    <a href="login.php"><i class="fa fa-address-book"></i>Login</a>
                                </li>
                                <li>
                                    <a href="registration.php"><i class="fa fa-address-book"></i>Registration</a>
                                </li>
                                 <?php }else{
                                     $user_name =$_SESSION['user_name'];
                                ?>
                                Welcome ( <?php echo $user_name; ?> )

                                <li><a href="logout.php">Logout</a></li>
                                <?php }?>

                            </ul>
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.head-top-area -->
    </header>

    <!-- ====== Header Bottom Content ====== -->
    <header class="header-bottom-content style-two hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="site-logo">
                        <a href="index.php">
                            <img src="assets/images/footer-logo.png" alt="house" />
                        </a>
                    </div><!-- /.house-logo -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-10 col-sm-10">
                    <nav id="main-nav" class="site-navigation top-navigation">
                        <div class="menu-wrapper">
                            <div class="menu-content">
                                <ul class="menu-list">
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <?php
                                    @session_start();
                                    if (@$_SESSION['tenant_login'] == TRUE) {
                                    ?>
                                     <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                <?php } ?>
                                    <li>
                                        <a href="all-flats.php">Booking</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About</a>
                                    </li>
                                    <li>
                                        <a href="blog.php">Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul> <!-- /.menu-list -->
                            </div> <!-- /.menu-content-->
                        </div> <!-- /.menu-wrapper --> 
                    </nav><!-- /.site-navigation --> 
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.header-bottom-area -->

    <!-- ====== Header Overlay Content ====== -->
    <div class="header-overlay-content">
        <!-- overlay-menu-item -->
        <div class="overlay overlay-hugeinc gradient-transparent overlay-menu-item">
            <button type="button" class="overlay-close">Close</button>
            
        </div> <!-- /.overlay-menu-item -->


    <!-- ====== Main Slider Area================================== --> 
    <div class="main-slider-two default-template-gradient">
        <div class="container-fluid pd-zero">
            <div class="pogoSlider">
                <div class="pogoSlider-slide" data-transition="expandReveal" data-duration="1000">
                    <div class="container-slider">                    
                        <div class="row tb">
                            <div class="col-md-5 tb-cell">
                                <div class="show-image-content pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500">
                                    <img src="assets/images/slider-show3.png" style="margin-top:30px" alt="show" />
                                </div><!-- /.show-image-content -->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7 tb-cell">
                                <div class="show-text-content">
                                    <p class="pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500">If we have <br/>the right perspective in life, life will always be beautiful!</p>
                                    <h2 class="pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500"><a href="#">House Rent</a></h2>
                                </div><!-- /.show-text-content -->
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container-slider -->
                </div>
                <div class="pogoSlider-slide" data-transition="expandReveal" data-duration="1000">
                    <div class="container-slider">                    
                        <div class="row tb">
                            <div class="col-md-5 tb-cell">
                                <div class="show-image-content pogoSlider-slide-element" data-in="slideLeft" data-out="slideRight" data-duration="750" data-delay="500">
                                    <img src="assets/images/slider-show.png" alt="show" />
                                </div><!-- /.show-image-content -->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7 tb-cell">
                                <div class="show-text-content">
                                    <p class="pogoSlider-slide-element" data-in="slideLeft" data-out="slideRight" data-duration="750" data-delay="500">If we have <br/>the right perspective in life, life will always be beautiful!</p>
                                    <h2 class="pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500"><a href="#">House Rent</a></h2>
                                </div><!-- /.show-text-content -->
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container-slider -->
                </div>
                <div class="pogoSlider-slide" data-transition="expandReveal" data-duration="1000">
                    <div class="container-slider">                    
                        <div class="row">
                            <div class="col-md-5">
                                <div class="show-image-content pogoSlider-slide-element" data-in="slideLeft" data-out="slideRight" data-duration="750" data-delay="500">
                                    <img src="assets/images/slider-show.png" alt="show" />
                                </div><!-- /.show-image-content -->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7">
                                <div class="show-text-content">
                                    <p class="pogoSlider-slide-element" data-in="slideLeft" data-out="slideRight" data-duration="750" data-delay="500">If we have <br/>the right perspective in life, life will always be beautiful!</p>
                                    <h2 class="pogoSlider-slide-element" data-in="slideDown" data-out="slideUp" data-duration="750" data-delay="500"><a href="#">House Rent</a></h2>
                                </div><!-- /.show-text-content -->
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container-slider -->
                </div>
            </div><!-- .pogoSlider -->
        </div><!-- /.container-fluid -->
    </div><!-- /.main-slider -->
    
    <!-- ====== Form Area ======= --> 
    <div class="form-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 rent-manage">
                    <div class="col-md-6">
                        <a href="all-flats.php"><img src="assets/images/rent3.png" alt="category" style="height:100px; margin-top:30px" /><h2><strong>Rent House</strong><h1>
                    </div>
                    <div class="col-md-6">
                        <a href="owner/login.php"><img src="assets/images/manage3.png" alt="category" style="height:100px; margin-top:30px" /><h2><strong>Manage House</strong><h1>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.form-area -->

    <!-- ====== Category Area ====== --> 
    <div class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="catagory-left-content clearfix">
                        <h2 class="default-text-gradient">Rental Category</h2>
                        <a href="all-flats.php" class="button nevy-button">All Apartment</a>
                    </div><!--/.catagory-left-content -->
                </div><!--/.col-md-4 -->
                <div class="col-md-8 col-sm-8">
                    <div class="catagory-right-content row">
                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="family-house.php"><img src="assets/images/category/category-one.png" alt="category" />
                            <h4>Family House</h4></a>
                        </div><!-- /.category-list -->

                        <div class="clearfix visible-xs"></div><!-- /.clearfix -->

                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="#"><img src="assets/images/category/category-three.png" alt="category" />
                            <h4>Sublet</h4></a>
                        </div><!-- /.category-list -->

                        <div class="clearfix visible-sm"></div><!-- /.clearfix -->

                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="#"><img src="assets/images/category/category-six.png" alt="category" />
                            <h4>Bachelor Mess</h4></a>
                        </div><!-- /.category-list -->

                        <div class="clearfix visible-xs"></div><!-- /.clearfix -->
                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="#"><img src="assets/images/category/category-ten.png" alt="category" />
                            <h4>Female Mess</h4></a>
                        </div><!-- /.category-list -->
                        <div class="clearfix visible-md visible-lg"></div><!-- /.clearfix -->

                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="#"><img src="assets/images/category/category-five.png" alt="category" />
                            <h4>Office</h4></a>
                        </div><!-- /.category-list -->
                        <div class="category-list style-two col-md-3 col-sm-4 col-xs-6">
                            <a href="#"><img src="assets/images/category/category-nine.png" alt="category" />
                            <h4>Warehouse</h4></a>
                        </div><!-- /.category-list -->
                    </div><!--/.catagory-right-content -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!--/.container -->
    </div><!-- /.category-area -->

    <!-- ====== Apartments Area ====== --> 
    <div class="apartments-area bg-gray-color">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="heading-content-one border">
                       <h2 class="title">Rooms &amp; Apartments</h2>
                       <h5 class="sub-title">Find Your Rooms, for your abaility</h5>
                   </div><!-- /.Apartments-heading-content -->
               </div><!-- /.col-md-12 -->
           </div><!-- /.row -->
           <div class="row">

            <?php
                while ($viewFlatHome = mysqli_fetch_assoc($query)) {
            ?>
               <div class="col-md-4 col-sm-6 col-xs-6">
                   <div class="apartments-content">
                       <div class="image-content">
                           <a href="single-flat.php?flatid=<?php echo $viewFlatHome['flatid']; ?>"><img style="height: 270px; width: 360px" src="<?php echo @$viewFlatHome['img']; ?>" alt="apartment" /></a>
                       </div><!-- /.image-content -->
                   
                       <div class="text-content">
                           <div class="top-content">
                               <h3><a href="single-flat.php?flatid=<?php echo $viewFlatHome['flatid']; ?>"><?php echo @$viewFlatHome['flat_type']; ?></a></h3>
                               <span>
                                   <i class="fa fa-map-marker"></i>
                                   <?php echo @$viewFlatHome['address']; ?>
                               </span> 
                           </div><!-- /.top-content -->
                           <div class="bottom-content clearfix">
                               <div class="meta-bed-room">
                                   <i class="fa fa-bed"></i> <?php echo @$viewFlatHome['bedroom']; ?> Bedrooms
                               </div>
                               <div class="meta-bath-room">                                
                                   <i class="fa fa-bath"></i><?php echo @$viewFlatHome['bathroom']; ?> Bathroom
                               </div>
                               <span class="clearfix"></span>
                               <div class="rent-price pull-left">
                                   TK <?php echo @$viewFlatHome['rent']; ?>
                               </div>
                               <div class="share-meta dropup pull-right">
                                   <ul>
                                       <li class="dropup">
                                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                           <ul class="dropdown-menu">
                                               <li>
                                                   <a href="#"><i class="fa fa-facebook"></i></a>
                                               </li>
                                               <li>
                                                   <a href="#"><i class="fa fa-twitter"></i></a>
                                               </li>
                                               <li>
                                                   <a href="#"><i class="fa fa-instagram"></i></a>
                                               </li>
                                               <li>
                                                   <a href="#"><i class="fa fa-google-plus"></i></a>
                                               </li>
                                           </ul>
                                       </li>
                                       <li>
                                           <a href="#"><i class="fa fa-star-o"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div><!-- /.bottom-content -->
                       </div><!-- /.text-content -->
                   </div><!-- /.partments-content -->
               </div><!-- /.col-md-4 -->
           <?php }?>
               
           </div><!-- /.row -->
           <a href="all-flats.php" class="button nevy-button">Load More</a>
       </div><!-- /.container -->
    </div><!-- /.Apartments-area-->

    <!-- ====== Gallery Area ====== --> 
    <div class="gallery-area">
        <div class="container-fluid">
            <div class="container-large-device">
                <div class="row">
                    <div class="col-md-7">
                        <div class="gallery-left-content">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <img src="assets/images/gallery/gallery-one.png" alt="gallery" />
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <img src="assets/images/gallery/gallery-two.png" alt="gallery" />
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <img src="assets/images/gallery/gallery-three.png" alt="gallery" />
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="gallery-right-content">
                            <h2>Our <br/>Photo Gallery</h2>
                            <a href="gallery.html" class="button nevy-button">All Photos & Video</a>
                        </div><!-- /.right-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.container-large-device -->
        </div><!-- /.container -->
    </div><!-- /.gallery-area -->

    <!-- ====== Call To Action ======= --> 
    <div class="call-to-action default-template-gradient">
        <div class="container">
            <div class="row tb">
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-left-content">
                        <h3>Do you want to Rent your House</h3>
                        <h4>Call us and list your property here</h4>
                    </div><!-- /.contact-left-content -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-right-content">
                        <h4><a href="#">+880123654987<span>propertyrent@gmail.com</span></a></h4>
                        <a href="#" class="button">Contact us</a>
                    </div><!-- /.contact-right-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.call-to-action -->

    <!-- ====== Testimonial Area ====== --> 
    <div class="testimonial-area bg-gray-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-heading-content">
                        <h2 class="title">Testimonial</h2>
                        <i class="fa fa-quote-right"></i>
                        <h2 class="sub-title">Some Reviews</h2>
                    </div><!-- /.testimonial-heading-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider owl-carousel owl-theme">
                        <div class="item">
                            <div class="client-image">
                                <img src="assets/images/testimonial-image.png" alt="testimonial" />
                            </div><!-- /.client-image -->
                            <div class="client-content">                            
                                <h3>Rayhan Mahmud</h3>
                                <h5>Software Developer</h5>
                                <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                                <div class="star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div><!-- /.star -->
                            </div><!-- /.client-content -->
                        </div><!-- /.item -->
                        <div class="item">
                            <div class="client-image">
                                <img src="assets/images/testimonial-image.png" alt="testimonial" />
                            </div><!-- /.client-image -->
                            <div class="client-content">                            
                                <h3>Rayhan </h3>
                                <h5>Software Developer</h5>
                                <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                                <div class="star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div><!-- /.star -->
                            </div><!-- /.client-content -->
                        </div><!-- /.item -->
                    </div><!-- /.testimonial-slider -->           
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.testimonial-area -->

    <!-- ====== Contact Area ====== --> 
    <div class="contact-area">
        <div class="container-large-device">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-content-two available">
                            <h2 class="title">We Are Available<br/> For You 24/7</h2>
                            <h5 class="sub-title">Our online support service is always 24 Hours</h5>
                        </div><!-- /.testimonial-heading-content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="map-left-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7301.719775985139!2d90.37410090000003!3d23.78800320000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c734c4abc47d%3A0xd696584909ddf06f!2sShewraPara%20Bus%20Stand!5e0!3m2!1sen!2sbd!4v1568331820594!5m2!1sen!2sbd" height="350" width="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div><!-- /.mapl-left-content -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="map-right-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-address-book"></i>Address</h4>
                                        <p>19/1, Panthapath, Dhaka-1205</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-envelope"></i>Mail</h4>
                                        <p>houserent@domain.com</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-phone-square"></i>Call</h4>
                                        <p>+0123456789 <br/>+9876543210</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-user-circle"></i>Social account</h4>
                                        <div class="social-icon">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div><!-- /.Social-icon -->
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.map-right-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div><!-- /.contact-area -->

    <!-- ====== Blog Area ====== --> 
    <div class="blog-area bg-gray-color">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="heading-content-one">
                        <h2 class="title">Our Blog Post</h2>
                        <h5 class="sub-title">Our News Feed</h5>
                    </div><!-- /.blog-heading-content -->
                </div><!-- /.row -->
            </div><!-- /.col-md-12 -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <article class="post">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="assets/images/blog/blog-one.png" alt="blog" />
                            </a>
                        </figure><!-- /.post-thumb -->
                        <div class="post-content">  
                            <div class="entry-meta">
                                <span class="entry-date">
                                    July 25, 2016
                                </span>
                                <span class="devied"></span>
                                <span class="entry-category">
                                    <a href="#">Rooms &amp; suites</a>
                                </span>
                            </div><!-- /.entry-header -->
                            <div class="entry-header">
                                <h3><a href="blog-single.html">Finding best places to visit in California</a></h3>
                            </div><!-- /.entry-header -->
                            <div class="entry-footer">
                                <div class="entry-footer-meta">
                                    <span class="view"><i class="fa fa-eye"></i>35</span>
                                    <span class="like"><a href="#"><i class="fa fa-heart-o"></i>09</a></span>
                                    <span class="comments"><a href="#"><i class="fa fa-comments"></i>05</a></span>
                                </div><!-- /.entry-footer-meta -->
                            </div><!-- /.entry-footer -->
                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <article class="post">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="assets/images/blog/blog-two.png" alt="blog" />
                            </a>
                        </figure><!-- /.post-thumb -->
                        <div class="post-content">  
                            <div class="entry-meta">
                                <span class="entry-date">
                                    July 25, 2016
                                </span>
                                <span class="devied"></span>
                                <span class="entry-category">
                                    <a href="#">Rooms &amp; suites</a>
                                </span>
                            </div><!-- /.entry-header -->
                            <div class="entry-header">
                                <h3><a href="blog-single.html">Finding best places to visit in California</a></h3>
                            </div><!-- /.entry-header -->
                            <div class="entry-footer">
                                <div class="entry-footer-meta">
                                    <span class="view"><i class="fa fa-eye"></i>35</span>
                                    <span class="like"><a href="#"><i class="fa fa-heart-o"></i>09</a></span>
                                    <span class="comments"><a href="#"><i class="fa fa-comments"></i>05</a></span>
                                </div><!-- /.entry-footer-meta -->
                            </div><!-- /.entry-footer -->
                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <article class="post">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="assets/images/blog/blog-three.png" alt="blog" />
                            </a>
                        </figure><!-- /.post-thumb -->
                        <div class="post-content">  
                            <div class="entry-meta">
                                <span class="entry-date">
                                    July 25, 2016
                                </span>
                                <span class="devied"></span>
                                <span class="entry-category">
                                    <a href="#">Rooms &amp; suites</a>
                                </span>
                            </div><!-- /.entry-header -->
                            <div class="entry-header">
                                <h3><a href="blog-single.html">Finding best places to visit in California</a></h3>
                            </div><!-- /.entry-header -->
                            <div class="entry-footer">
                                <div class="entry-footer-meta">
                                    <span class="view"><i class="fa fa-eye"></i>35</span>
                                    <span class="like"><a href="#"><i class="fa fa-heart-o"></i>09</a></span>
                                    <span class="comments"><a href="#"><i class="fa fa-comments"></i>05</a></span>
                                </div><!-- /.entry-footer-meta -->
                            </div><!-- /.entry-footer -->
                        </div><!-- /.post-content -->
                    </article><!-- /.post -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
            <a href="blog.html" class="button">show all</a>
        </div><!-- /.container -->
    </div><!-- /.Blog-area-->

    <!-- ====== Footer Area ====== --> 
    <footer class="footer-area" style="background-image:url(assets/images/footer-bg.png)">
       <div class="container">
           <div class="row">
               <div class="col-md-4">
                   <div class="widget widget_about yellow-color">    
                       <div class="widget-title-area">
                           <h3 class="widget-title">
                               About House Rent
                           </h3><!-- /.widget-title -->
                       </div><!-- /.widget-title-area -->
                       <div class="widget-about-content">
                           <img src="assets/images/footer-logo.png" alt="house" />
                           <p>We Provide Premium Word Press, Ghost and HTML template. Our Perm tritium Templates is, develop gaped in a way so that the clients find  Support. Themes are developed in a way so that the clients find.</p>
                           <a href="#" class="button">More</a>
                       </div><!-- /.widget-content -->
                   </div><!-- /.widget widget_about -->
               </div><!-- /.col-md-4 -->
               <div class="col-md-4">
                   <div class="widget widget_place_category yellow-color">
                       <div class="widget-title-area">
                           <h3 class="widget-title">Importent Links</h3><!-- /.widget-title -->
                       </div><!-- /.widget-title-area -->
                       <ul>
                           <li><a href="dashboard.php">Dashboard</a></li>
                           <li><a href="all-flats.php">Rental Category</a></li>
                           <li><a href="contact.php">Contact Us</a></li>
                           <li><a href="about.php">About Us</a></li>
                       </ul> 
                   </div><!-- /.widget -->
               </div><!-- /.col-md-4 -->
               <div class="col-md-4">
                   <div class="widget widget_instagram yellow-color">
                       <div class="widget-title-area">
                           <h3 class="widget-title">Instagram Image</h3><!-- /.widget-title -->
                       </div><!-- /.widget-title-area -->
                       <div class="instagram-image-content">
                           <a href="#"><img src="assets/images/instagram/instagram-one.png" alt="" /></a>
                           <a href="#"><img src="assets/images/instagram/instagram-two.png" alt="" /></a>
                           <a href="#"><img src="assets/images/instagram/instagram-three.png" alt="" /></a>
                           <a href="#"><img src="assets/images/instagram/instagram-four.png" alt="" /></a>
                           <a href="#"><img src="assets/images/instagram/instagram-five.png" alt="" /></a>
                           <a href="#"><img src="assets/images/instagram/instagram-six.png" alt="" /></a>

                       </div><!-- /.instagram-image-content -->
                   </div><!-- /.widget -->
               </div><!-- /.col-md-4 -->
           </div><!-- /.row -->
           <div class="row">
               <div class="col-md-12">
                   <div class="bottom-content">
                       <p>Copyright  &copy;2019 HouseRentSolutions</p>
                   </div><!-- /.bottom-top-content -->
               </div><!-- /.col-md-12 -->
           </div><!-- /.row -->
       </div><!-- /.container -->
    </footer><!-- /.footer-area -->

    <!-- All The JS Files
    ================================================== --> 
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> <!-- main-js -->
</body>

<!-- Mirrored from htmlguru.net/house-rent/index02.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2019 20:46:49 GMT -->
</html>