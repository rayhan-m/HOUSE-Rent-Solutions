 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
 include('include/ten-header.php');

 $connection = mysqli_connect('localhost', 'root', '', 'homerent');
 $user_name=$_SESSION['user_name'];
 $sql1 = "SELECT owner FROM tenant WHERE user_name='$user_name'";
 $query = $connection->query($sql1);
 $owner1 = mysqli_fetch_assoc($query);
 $owner2= $owner1['owner'];

 $sql2 = "SELECT * FROM notice WHERE user_name='$owner2' AND status='Published'";
 $query = $connection->query($sql2);
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
  <div class="container">
    <div class="row">
     <div class="col-md-4 col-md-offset-4">
      <h3>Notice Board</h3>
    </div>
  </div>
</div>
</div>


</div>


<div class="main_content_section ">
  <div class="col-md-12">
    <?php include('include/menubar.php')?>

    <div class="content_list">

      <div class="col-md-offset-1 col-md-10">
        <?php
        while ($viewNotice = mysqli_fetch_assoc($query)) {
          ?>
          <div class="col-md-8 single_notice">
            <div class="date-box col-md-3">
              <div class="date"><span><?php echo @$viewNotice['date']; ?></div>
              </div>
              <div class="col-md-7 file "style="color: #000;"><?php echo @$viewNotice['title']; ?></div>
              <div class="col-md-2"> <a class="btn btn-success glyphicon glyphicon-eye-open" target="_blank" href="<?php echo $viewNotice['file'];?>"></a> </div>
           
            </div>

          <?php }?>
        </div> 

      </div>  
    </div>
  </div>
  <!--Inspiration from: http://ertekinn.com/loginsignup/-->


  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
<?php }else{
    header('location:login.php');
}
?>