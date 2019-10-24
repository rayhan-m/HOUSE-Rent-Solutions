 <?php
 @session_start();
  if ($_SESSION['tenant_login'] == TRUE) {
 include('include/ten-header.php');

 if (isset($_POST['button'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
	$user_name=$_SESSION['user_name'];

	$sql1 = "SELECT uname,flatid FROM booking WHERE user_name='$user_name' AND status='Approved'";
        $query = $connection->query($sql1);
        $booking = mysqli_fetch_assoc($query);
        $owner= $booking['uname'];
        $flatid= $booking['flatid'];
        $title= $_POST['title'];
        $comment= $_POST['comment'];

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');

        $status='Not Done';
        $approvement='Pending';

        $sql = "INSERT INTO feedback (user_name,flatid,owner,title,comment,img,date,status,approvement)VALUES('$user_name','$flatid','$owner','$title','$comment','$url','$current_date','$status','$approvement')";

        $query = $connection->query($sql);
        $_SESSION['message'] = 'Feedback Send Successfully';
        header('location:feedback.php');
	}
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<h3>Tenant Feedback</h3>
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
					<h2 class="text-center" style="color: #fff; background-color: #0a1647;">User Feedback</h2>
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="form-row" style="color: #000">

								<div class="form-group form-float">
									<div class="form-line">
										<label>Title</label>
										<input type="text" class="form-control" name="title" >
									</div><div class="form-line">
										<label>Your Message</label>
										<textarea name="comment" cols="30" rows="5" class="form-control no-resize" ></textarea>
									</div>
									<div class="form-line">
										<label>Image</label>
										<input type="file" class="form-control" name="fileToUpload" >
									</div>
								</div>
								<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
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
</body>

</html>


<?php }else{
    header('location:login.php');
}
?>