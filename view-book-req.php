
<?php
@session_start();
  if ($_SESSION['tenant_login'] == TRUE) {
include('include/ten-header.php');
$query = $DBM->viewTenBookReq();
 $message = "";
 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
    $bookid = $_GET['delete'];
    $message = $DBM->deleteBookReq($bookid);
  }
  
?>

<!doctype html>


<div style="background-image: url('img/banner2.jpg')" class="banner_section1">
  <div class="container">
    <div class="row">
     <div class="col-md-4 col-md-offset-4">
      <h3>Booking Request</h3>
    </div>
  </div>
</div>
</div>


</div>

<?php if($message){?>
     <div>
        <h4 class="text-center btn-block waves-effect" style="padding: 10px; background-color: green; color: #fff"><?php echo $message ?></h4>
    </div>
<?php }else{?>
    <div id="hide">
    </div>
<?php }?>
<div class="main_content_section">
  <div class="col-md-12">
    <?php include('include/menubar.php')?>

    <div class="content_list">

      <div class="col-md-offset-2 col-md-10 section_4">
        <?php
        while ($viewBookInfo = mysqli_fetch_assoc($query)) {
          ?>
          <div class="col-md-4">
            <div class="single_content">
              <div class="head_img">
                <img src="<?php echo @$viewBookInfo['img']; ?>" alt="" class="image">
              </div>
              <div class="content_text">
                <span> Flat Type: <?php echo @$viewBookInfo['flat_type']; ?></span>
                <h4> House No: <?php echo @$viewBookInfo['house_number']; ?></h4>
                <h4> Flat No: <?php echo @$viewBookInfo['flat_no']; ?></h4>
                <h4> Status: <?php echo @$viewBookInfo['status']; ?></h4>
              </div>
              <hr/>
              <div>
                <div class="content_footer">
                  <a href="?delete=<?php echo $viewBookInfo['bookid']; ?>" class="btn btn-danger <?php if($viewBookInfo['status'] =='Approved'){?> disabled <?php } if($viewBookInfo['status'] =='Rejected') {?>disabled<?php } if($viewBookInfo['status'] =='Leaved') {?>disabled<?php }?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" >CANCEL REQUEST</a>
                </div>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
    </div>  
  </div>
  <div class="container">
    <div class="row">
     <div class="col-xs-12">
       <div class="modal" data-keyboard="false" data-backdrop="static" id="loginModal2" tabindex="-1">
         <div class="modal-dialog">
           <div class="modal-content">
            <div style="background:#24722D;" class="modal-header">
              <button style="color:#FFFFFF;" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-1">
                    <img src="<?php echo @$viewBookInfo['img']; ?>" alt="" class="image design1"/>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-offset-2  col-md-12">
                   <h4 style="color:gray;"><?php echo @$viewBookInfo['flat_type']; ?></h4>
                   <h5 style="color:gray;">B.S.C in CSE</h5>
                   <h5 style="color:gray;">Daffodil International University</h5>
                   <h5 style="color:gray;">From, Sirajgong</h5>
                   <h4 style="color:gray;">Teaches:</h4>
                   <h5 style="color:gray;">Bangla / English / Math</h5>
                   <h4 style="color:gray;">Class:</h4>
                   <h5 style="color:gray;">Class-One / Class-Two / Class-Three</h5>
                 </div>
               </div>
             </div>
           </div>

           <div class="modal-footer">
            <button style="background:gray;border:1px solid gray;" class="btn btn-primary">DETAILS</button>
            <button style="background:gray;border:1px solid gray;" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
          </div>

        </div>
      </div>
    </div>
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