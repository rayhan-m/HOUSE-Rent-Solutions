 <?php
 session_start();
 require_once 'owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 @$flatid = $_GET['flatid'];
 $query = $DBM->viewSingleFlat($flatid);
 $flatid = mysqli_fetch_assoc($query);

 $query1 = $DBM->viewRelFlat();

 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}

if (isset($_POST['btn'])) {
    if ($_SESSION['tenant_login'] == TRUE) {
        $connection = mysqli_connect('localhost', 'root', '', 'homerent');
        
        $fid= $flatid['flatid'];
        $uname= $flatid['user_name'];
        $house_n= $flatid['house_number'];
        $flat_t= $flatid['flat_type'];
        $f_no= $flatid['flat_no'];
        $img= $flatid['img'];
        $user_name =$_SESSION['user_name'];
        $full_name =$_POST['full_name'];
        $phn_no =$_POST['phn_no']; 
        $email =$_POST['email']; 
        $msg =$_POST['msg'];
        $status="Pending"; 

        $sql = "INSERT into booking (flatid,uname,house_number,flat_type,flat_no,img,user_name,full_name,phn_no,email,msg,status) VALUES('$fid','$uname','$house_n','$flat_t','$f_no','$img','$user_name','$full_name','$phn_no','$email','$msg','$status')";
        $result = $connection->query($sql);
        $message = 'Booking Request Send Successfully'; 
    }else{
        header('location:login.php');
    }
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

    <!-- ====== Header Overlay Content ====== -->
    <div class="header-overlay-content">
        <!-- overlay-menu-item -->
        <div class="overlay overlay-hugeinc gradient-transparent overlay-menu-item">
            <button type="button" class="overlay-close">Close</button>
            
        </div> <!-- /.overlay-menu-item -->


        <!-- ====== Page Header ====== --> 
        <div class="page-header default-template-gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                
                        <h2 class="page-title">House</h2>
                        <p class="page-description">More Details About Flat</p>        
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row-->
            </div><!-- /.container-fluid -->           
        </div><!-- /.page-header -->

        <!-- ====== Breadcrumbs Area====== --> 
        <div class="breadcrumbs-area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="breadcrumbs">
                           <span class="first-item">
                            <a href="index01.html">Home</a></span>
                            <span class="separator">&gt;</span>
                            <span class="last-item"><?php echo @$flatid['flat_type']; ?></span>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumbs-area -->
        <div>
            <?php if($message){?>
             <div>
                <h4 class="text-center bg-green btn-block waves-effect" style="padding: 10px; color: #fff"><?php echo $message ?></h4>
            </div>
        <?php }else{?>
            <div id="hide">

            </div>
        <?php }?>
    </div>
    <!-- ====== Apartments-Single-Area ======= --> 
    <div class="apartment-single-area">
        <div class="container">
         <div class="row">
           <div class="col-md-8">
            <div class="corousel-gallery-content">
               <div class="gallery">
                <div class="full-view owl-carousel">
                 <a class="item image-pop-up" href="<?php echo @$flatid['img']; ?>">
                  <img src="<?php echo @$flatid['img']; ?>" alt="corousel">
              </a>

          </div>
      </div> <!-- /.gallery-two -->
      <h3>View Flat Video <a style="background-color: #0c7c11; color: #fff;" target='_blank' href="<?php echo @$flatid['flat_video']; ?>">CLICK HERE</a></h3>
  </div> <!-- /.corousel-gallery-content -->

  <div class="family-apartment-content mobile-extend">
    <div class="tb  apartment-description default-gradient-before">
        <div class="tb-cell">
            <h3 class="apartment-title"><?php echo @$flatid['flat_type']; ?></h3>
        </div><!-- /.tb-cell -->
        <div class="tb-cell">
            <p class="pull-right rent">Rent/Month: TK <?php echo @$flatid['rent']; ?></p>
        </div><!-- /.tb-cell -->
    </div><!-- /.tb -->

    <div class="price-details">
      <h3>Price Details-</h3>
      <ul>
       <li><span>Rent/Month: </span> TK <?php echo @$flatid['rent']; ?> (negotiable)</li>
       <li><span>Service Charge :</span> <?php echo @$flatid['service_charge']; ?>/= Tk per month, subject to change</li>
       <li><span>Security Deposit :</span> <?php echo @$flatid['security_deposit']; ?></li>
       <li><span>Flat Release Policy :</span> <?php echo @$flatid['flat_release_policy']; ?></li>
   </ul>
</div><!-- /.price -->

<div class="property-details">
  <h3>Property Details-</h3>
  <ul>
   <li><span>Address  :</span> <?php echo @$flatid['address']; ?></li>
   <li><span>Flat Size :</span> <?php echo @$flatid['flat_size']; ?> Sq Feet.</li>
   <li><span>Floor :</span> <?php echo @$flatid['flat_no']; ?></li>

   <li><span>Facilities :</span> <?php echo @$flatid['facilities']; ?></li>
   <li><span>Conditions :</span> <?php echo @$flatid['conditions']; ?></li>
</ul>
<h3>Contact No: (+880 ) <?php echo @$flatid['phn_no']; ?></h3>
</div><!-- /.Property -->

</div><!-- /.family-apartment-content -->
<div class="hidden-md hidden-lg text-center extend-btn">
    <span class="extend-icon">
        <i class="fa fa-angle-down"></i>
    </span>
</div>
</div> <!-- /.col-md-8 -->

<div class="col-md-4">
    <div class="apartment-sidebar">                    
        <div class="widget_rental_search clerafix">					
         <div class="form-border gradient-border">
          <form action="" method="post" class="advance_search_query booking-form" enctype="multipart/form-data">
           <div class="form-bg seven">
            <div class="form-content">
                <h2 class="form-title">Book This Apartment</h2>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Full name"  required="">
                </div><!-- /.form-group -->
                <div class="form-group">
                 <label>Phone Number</label>
                 <input type="Number" name="phn_no" placeholder="Phone Number" required="">
             </div><!-- /.form-group -->
             <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" placeholder="Your Email" required="">
          </div><!-- /.form-group -->
          <div class="form-group">
             <label>Your Message</label>
             <textarea name="msg" placeholder="Message" class="form-controller"></textarea>
         </div><!-- /.form-group -->
         <div class="form-group">
          <button name="btn" type="submit" class="button default-template-gradient button-radius">Request Booking</button>
      </div><!-- /.form-group -->
  </div><!-- /.form-content -->
</div><!-- /.form-bg -->
</form> <!-- /.advance_search_query -->
</div><!-- /.form-border -->
</div><!-- /.widget_rental_search -->

<div class="apartments-content seven post clerafix">
 <div class="image-content">
  <a href="#"><img class="overlay-image" src="assets/images/apartment-ad.png" alt="about" /></a>
</div><!-- /.image-content -->
</div><!-- /.partments-content -->
</div><!-- /.apartment-sidebar -->
</div> <!-- .col-md-4 -->
</div> <!-- /.row -->
</div> <!-- /.container -->
</div> <!-- /.appartment-single-area -->

<!-- ====== Apartments-Related-area ====== --> 
<div class="apartments-related-area bg-gray-color">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
     <div class="heading-content-one">
         <h2 class="title default-text-gradient">Related Flat</h2>
     </div><!-- /.Apartments-heading-content -->
 </div><!-- /.col-md-12 -->
</div><!-- /.row -->
<div class="row">
    <?php
    while ($viewRelFlat = mysqli_fetch_assoc($query1)) {
        ?>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="apartments-content">
                <div class="image-content">
                    <a href="single-flat.php?flatid=<?php echo $viewRelFlat['flatid']; ?>">
                        <img style="height: 270px; width: 360px" src="<?php echo @$viewRelFlat['img']; ?>" />
                    </a>
                </div><!-- /.image-content -->

                <div class="text-content">
                    <div class="top-content">
                        <h3>
                            <a href="single-flat.php?flatid=<?php echo $viewRelFlat['flatid']; ?>"><?php echo @$viewRelFlat['flat_type']; ?></a>
                        </h3>
                        <span>
                           <i class="fa fa-map-marker"></i>
                           <?php echo @$viewRelFlat['address']; ?>
                       </span> 
                   </div><!-- /.top-content -->
                   <div class="bottom-content clearfix">
                    <div class="meta-bed-room">
                        <i class="fa fa-bed"></i> <?php echo @$viewRelFlat['bedroom']; ?> Bedrooms
                    </div>
                    <div class="meta-bath-room">
                        <i class="fa fa-bath"></i><?php echo @$viewRelFlat['bathroom']; ?> Bathroom
                    </div>
                    <span class="clearfix"></span>
                    <div class="rent-price pull-left">
                        TK <?php echo @$viewRelFlat['rent']; ?>
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
</div><!-- /.container -->
</div><!-- /.Apartments-Related-area-->

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
