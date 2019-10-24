
<?php
@session_start();
  if ($_SESSION['tenant_login'] == TRUE) {
include('include/ten-header.php');

 $connection = mysqli_connect('localhost', 'root', '', 'homerent');
 $user_name=$_SESSION['user_name'];

 $sql = "SELECT rent FROM payment WHERE user_name='$user_name' AND status='Paid'";
 $query = $connection->query($sql);
 $TotalPaid = 0;
 while ($Trent = $query->fetch_assoc()) {
  $TotalPaid += $Trent['rent'];
 }

 $sql1 = "SELECT rent FROM payment WHERE user_name='$user_name' AND status='Unpaid'";
 $query1 = $connection->query($sql1);
 $TotalDue = 0;
 while ($Trent = $query1->fetch_assoc()) {
  $TotalDue += $Trent['rent'];
 }
 
  $sql2 = "SELECT * FROM booking WHERE user_name='$user_name' AND status='Approved' OR status='Leaved'";
    $query2 = $connection->query($sql2);
    $countFlat = $query2->num_rows;


     $query2 = "SELECT status, count(*) as number FROM payment WHERE user_name='$user_name' GROUP BY status";
     $result2 = mysqli_query($connection, $query2); 

     $query3 = "SELECT status, count(*) as number FROM booking WHERE user_name='$user_name' GROUP BY status";
     $result3 = mysqli_query($connection, $query3); 

?>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Payment Info.',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }   
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart1);
           function drawChart1()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Booking Info.',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }
           </script>  

<div style="background-image: url('img/banner2.jpg')" class="banner_section1">
  <div class="container">
    <div class="row">
     <div class="col-md-4 col-md-offset-4">
      <h3>Dashboard</h3>
    </div>
  </div>
</div>
</div>


</div>


<?php 

    $sql6 = "SELECT status,flatid FROM booking WHERE user_name='$user_name' AND status='Approved'";
    $query6= $connection->query($sql6);
    $booking = mysqli_fetch_assoc($query6);
    $sts= $booking['status'];
    $fltid= $booking['flatid'];

  if(!$sts){?>
    <div>
        <h4 class="text-center btn-block waves-effect" style="padding: 10px; background-color:   #7c0c72  ; color: #fff"><?php echo "Book a Flat First to Access Other Feature." ?></h4>
    </div>
    <?php include('include/menubar.php')?>
  <?php } else{?>
<div class="main_content_section">
  <div class="col-md-12">
    <?php include('include/menubar.php');?>


    <div class="content_list">
      <div class="col-md-offset-2 col-md-10 section_4">
        <?php
         $sql7 = "SELECT status FROM tenant_reg_form WHERE user_name='$user_name' AND flatid='$fltid'";
        $query7= $connection->query($sql7);
        $flt = mysqli_fetch_assoc($query7);
        $stat= $flt['status'];


        if(!$stat){?>
        <div>
            <h4 class="text-center btn-block waves-effect" style="padding: 10px; background-color: red; color: #fff"><?php echo "Please Fill Up Tenant Registration Form." ?></h4>
        </div>
      <?php } ?>
          <div class="col-md-4">
            <div class="single_content">
              <div class="content_text">
                <i class="glyphicon glyphicon-home" style="font-size: 50px;"></i>
                <h3> 
                  Flat Booked: <span style="font-size: 26px;"><?php echo $countFlat; ?></span></h3>
              </div>
              <hr/>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single_content">
              <div class="content_text">
                <i class="glyphicon glyphicon-usd" style="font-size: 50px;"></i>
                <h3> 
                  Total Paid: <span style="font-size: 26px;"><?php echo $TotalPaid; ?> TK</span></h3>
              </div>
              <hr/>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single_content">
              <div class="content_text">
                <i class="glyphicon glyphicon-usd" style="font-size: 50px;"></i>
                <h3> 
                  Total Due: <span style="font-size: 26px;"><?php echo $TotalDue; ?> TK</span></h3>
              </div>
              <hr/>
            </div>
          </div>
          <div style="margin-top: 200px;">
            <div class="col-md-6" style="margin-bottom: 30px;">  
            <div id="piechart" style="height: 300px;"></div>  
        </div> 
        <div class="col-md-6" style="margin-bottom: 30px;">  
            <div id="piechart1" style="height: 300px;"></div>  
        </div>
          </div>
      </div>
    </div>  
  </div>
<?php } ?>

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
<?php  }else{
    header('location:login.php');
}
?>