
<?php
@session_start();
 if ($_SESSION['owner_login'] == TRUE) {
?>
    <?php include('include/sitebar.php')?>

    <?php
     $connect = mysqli_connect("localhost", "root", "", "homerent");  
     session_start();
     $user_name=$_SESSION['user_name'];
     $query = "SELECT status, count(*) as number FROM booking WHERE uname='$user_name' GROUP BY status";
     $result = mysqli_query($connect, $query); 

     $query1 = "SELECT status, count(*) as number FROM payment WHERE owner='$user_name' GROUP BY status";
     $result1 = mysqli_query($connect, $query1); 

      $query2 = "SELECT availability, count(*) as number FROM flat WHERE user_name='$user_name' GROUP BY availability";
     $result2 = mysqli_query($connect, $query2);
       $query3 = "SELECT expense_type, count(*) as number FROM expense WHERE user_name='$user_name' GROUP BY expense_type";
     $result3 = mysqli_query($connect, $query3);



        $sql4 = "SELECT * FROM booking WHERE status='Pending' AND uname='$user_name' ";
        $query4 = $connect->query($sql4);
        $countBookReq = $query4->num_rows;

        $sql5 = "SELECT * FROM feedback WHERE status='Pending' AND owner='$user_name'";
        $query5 = $connect->query($sql5);
        $FEEDBACK = $query4->num_rows;

        $sql5 = "SELECT * FROM flat WHERE availability='Booked' AND user_name='$user_name'";
        $query5 = $connect->query($sql5);
        $booked = $query5->num_rows;

        $sql6 = "SELECT * FROM flat WHERE availability='available' AND user_name='$user_name'";
        $query6 = $connect->query($sql6);
        $avail = $query6->num_rows;
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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">BOOKING REQUEST</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countBookReq ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">TENANT FEEDBACK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countBookReq ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">BOOKED FLAT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $booked ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">AVAILABLE FLAT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $avail ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CPU USAGE (%)</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                    </div>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="body">  
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
        </div>
    </section>
    <?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>