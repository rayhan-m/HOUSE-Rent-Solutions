 <?php
 session_start();
    require_once 'owner/DBManager.php';
    $message = "";

    $DBM = new DBManager();
    $query = $DBM->viewFamilyFlat();
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
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

    <!-- ====== Page Header ====== --> 
    <div class="page-header default-template-gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">Choose Your House</h2>
                    <p class="page-description">Take A House For Booking</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div><!-- /.page-header -->

    <!-- ====== Breadcrumbs Area ====== --> 
    <div class="breadcrumbs-area bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <span class="first-item">
                         <a href="index01.html">Home</a></span>
                        <span class="separator">&gt;</span>
                        <span class="last-item">House List For Booking</span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumbs-area -->

    <!-- ====== Apartments Area ======= --> 
    <div class="apartments-area four bg-gray-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="apartment-tab-area">
                        <ul role="tablist" class="nav nav-tabs apartment-menu hidden-xs hidden-sm">
                            <li >
                                <a href="all-flats.php" >All House</a>
                            </li>
                            <li class="active">
                                <a href="family-house.php" >Family House</a>
                            </li>
                            <li>
                                <a href="sublet.php" >Sublet  </a>
                            </li>
                            <li>
                                <a href="bachelor-mess.php" >Bachelor Mess</a>
                            </li>
                            <li>
                                <a href="female-mess.php">Female Mess</a>
                            </li>
                            <li>
                                <a href="office.php" >Office</a>
                            </li>
                             <li>
                                <a href="warehouse.php">Warehouse</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="popular-apartment" class="tab-pane fade in active">
                                <div class="row">
                                    <?php
                                        while ($viewAllFlat = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <div class="apartments-content">
                                            <div class="image-content">
                                                <a href="single-flat.php?flatid=<?php echo $viewAllFlat['flatid']; ?>">
                                                    <img style="height: 270px; width: 360px" src="<?php echo @$viewAllFlat['img']; ?>" />
                                                </a>
                                            </div><!-- /.image-content -->
                                        
                                            <div class="text-content">
                                                <div class="top-content">
                                                    <h3>
                                                        <a href="single-flat.php?flatid=<?php echo $viewAllFlat['flatid']; ?>"><?php echo @$viewAllFlat['flat_type']; ?></a>
                                                    </h3>
                                                   <span>
                                                       <i class="fa fa-map-marker"></i>
                                                       <?php echo @$viewAllFlat['address']; ?>
                                                   </span> 
                                                </div><!-- /.top-content -->
                                                <div class="bottom-content clearfix">
                                                    <div class="meta-bed-room">
                                                        <i class="fa fa-bed"></i> <?php echo @$viewAllFlat['bedroom']; ?> Bedrooms
                                                    </div>
                                                    <div class="meta-bath-room">
                                                        <i class="fa fa-bath"></i><?php echo @$viewAllFlat['bathroom']; ?> Bathroom
                                                    </div>
                                                    <span class="clearfix"></span>
                                                    <div class="rent-price pull-left">
                                                        TK <?php echo @$viewAllFlat['rent']; ?>
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
                                    <div class="clearfix hidden-md hidden-lg"></div>
                                </div><!-- /.row -->
                                <a href="#" class="more-link default-template-gradient">Load More</a>
                            </div><!-- /.popular-apartment -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.apartment-tab-area -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.Apartments-area-->

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
