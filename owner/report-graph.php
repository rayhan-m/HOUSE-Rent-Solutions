 <?php
 @session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 $connect = mysqli_connect("localhost", "root", "", "homerent");  
 $user_name=$_SESSION['user_name'];
 $query = "SELECT status, count(*) as number FROM booking WHERE uname='$user_name' GROUP BY status";
 $result = mysqli_query($connect, $query); 

 $query1 = "SELECT status, count(*) as number FROM payment WHERE owner='$user_name' GROUP BY status";
 $result1 = mysqli_query($connect, $query1); 

  $query2 = "SELECT availability, count(*) as number FROM flat WHERE user_name='$user_name' GROUP BY availability";
 $result2 = mysqli_query($connect, $query2);
   $query3 = "SELECT expense_type, count(*) as number FROM expense WHERE user_name='$user_name' GROUP BY expense_type";
 $result3 = mysqli_query($connect, $query3);
 ?>
  <?php include('include/sitebar.php')?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Booking Request.',  
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
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Rent Payment.',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart2);
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Availability', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["availability"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Flat Status.',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart3);
           function drawChart3()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Expense Type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["expense_type"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Of Expense Type.',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }
           </script>  


 <section class="content">
 	<div class="container-fluid">
<div class="col-md-12">  
 		<div class="col-md-6" style="margin-bottom: 30px;">  
 			<div id="piechart" style="height: 300px;"></div>  
 		</div> 
 		<div class="col-md-6" style="margin-bottom: 30px;">  
 			<div id="piechart1" style="height: 300px;"></div>  
 		</div> 
 		<div class="col-md-6" style="margin-bottom: 30px;">  
 			<div id="piechart2" style="height: 300px;"></div>  
 		</div> 
 		<div class="col-md-6" style="margin-bottom: 30px;">  
 			<div id="piechart3" style="height: 300px;"></div>  
 		</div>
 	</div>
 </div>
 </section>

 <?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>