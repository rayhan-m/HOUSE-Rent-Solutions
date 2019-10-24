 <?php
 @session_start();

   if ($_SESSION['tenant_login'] == TRUE) {

   	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $user_name=$_SESSION['user_name'];

    $sql6 = "SELECT status FROM booking WHERE user_name='$user_name' AND status='Approved'";
    $query6= $connection->query($sql6);
    $booking = mysqli_fetch_assoc($query6);
    $sts= $booking['status'];
    if ($sts) {
 include('include/ten-header.php');


 if (isset($_POST['button'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
	$user_name=$_SESSION['user_name'];

	$sql1 = "SELECT uname,flatid FROM booking WHERE user_name='$user_name' AND status='Approved'";
        $query1 = $connection->query($sql1);
        $booking = mysqli_fetch_assoc($query1);
        $owner= $booking['uname'];
        $flatid= $booking['flatid'];

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "leaveNotice/" . $name);
        $url = "leaveNotice/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');

        $status='done';
        $approvement='Pending';
        $type='new';

        $sql = "INSERT INTO leave_notice (user_name,flatid,owner,file,date,status,approvement,type)VALUES('$user_name','$flatid','$owner','$url','$current_date','$status','$approvement','$type')";

        $query = $connection->query($sql);
        header('location:leave-notice.php');
	}
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<h3>Tenant Leave Notice</h3>
 			</div>
 		</div>
 	</div>
 </div>

</div>
<div class="main_content_section">
	<div class="col-md-12">
		<?php include('include/menubar.php')?>

		<div class="content_list">

			<div class="col-md-offset-2 col-md-8">
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 

					<?php 
					$connection = mysqli_connect('localhost', 'root', '', 'homerent');
					$user_name=$_SESSION['user_name'];
						$sql2 = "SELECT uname,flatid FROM booking WHERE user_name='$user_name' AND status='Approved'";
					    $query2 = $connection->query($sql2);
					    $booking = mysqli_fetch_assoc($query2);
					    $owner= $booking['uname'];
					    $fltid= $booking['flatid'];

						$sql3 = "SELECT * FROM leave_notice WHERE user_name='$user_name' AND flatid='$fltid' AND owner='$owner' AND type='new'";

						$query3 = $connection->query($sql3);
						$TenLeaveNotice = mysqli_fetch_assoc($query3);
					?>
					<?php echo $TenLeaveNotice['status'];?>
					<?php echo $TenLeaveNotice['type'];?>
					<?php if($TenLeaveNotice['status']== 'done' && $TenLeaveNotice['type'] == 'new'){?>
						<h2 class="text-center" style="color: #fff; background-color:green;">Already Send Leave Notice</h2>
					<?php }else{?>
						<h2 class="text-center" style="color: #fff; background-color: #7c0c72;">Upload Document File</h2> 
					<?php }?>
					<div style="color: #000">Download Sample <a href="" class="btn btn-danger text-center <?php if($TenLeaveNotice['status']== 'done' && $TenLeaveNotice['type'] == 'new'){?> disabled <?php }?>" onclick="downloadSample()" >CLICK HERE</a></div>

					<h2 class="text-center" style="color: #0a2269">Leave Notice</h2>
					<?php if($TenLeaveNotice['status']== 'done' && $TenLeaveNotice['type'] == 'new'){?>
						<form action="" method="post" >
							<div class="form-row" style="color: #000">

								<div class="form-group form-float">
									<div class="form-line">
										<?php if($TenLeaveNotice['approvement']== 'Pending'){?>
										<h2>Approvement : <span style="color: #fff; background-color:#F71B8C;"><?php echo $TenLeaveNotice['approvement'];?></span></h2>
										<?php } else{?>
											<h2>Approvement : <span style="color: #fff; background-color:green;"><?php echo $TenLeaveNotice['approvement'];?></span></h2>
											<?php } ?>
									</div>
									<div class="form-line">
										<label>View Your Notice : </label>
										<a class="btn btn-success glyphicon glyphicon-eye-open"  href="<?php echo $TenLeaveNotice['file'];?>" target="_blank"></a>
									</div>
								</div>
								<button type="submit" name="button" class="btn btn-primary btn-block" <?php if($TenLeaveNotice['status']== 'done' && $TenLeaveNotice['type'] == 'new'){?> disabled <?php }?>>Submit</button>
							</div>
						</form>
					<?php }else{?>
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="form-row" style="color: #000">
								<div class="form-group form-float">
									<div class="form-line">
										<label>Upload Leave notice file</label>
										<input type="file" class="form-control" name="fileToUpload" >
									</div>
								</div>
								<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					<?php }?>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
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
<script>
	function downloadSample() {
		window.open("leaveNotice/sampleNotice/Sample-Notice.docx");
	}
</script>
</body>

</html>
<?php }else{
    header('location:dashboard.php');
}
?>
<?php }else{
    header('location:login.php');
}
?>