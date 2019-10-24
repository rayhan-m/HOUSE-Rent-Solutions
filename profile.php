
<?php 
@session_start();
  if ($_SESSION['tenant_login'] == TRUE) {
include('include/ten-header.php')?>

<div style="background-image: url('img/banner2.jpg')" class="banner_section1">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h3>MY PROFILE</h3>
			</div>
		</div>
	</div>
</div>

<div class="main_content_section">
	<div class="col-md-12">
		
		<?php include('include/menubar.php')?>
		<div class="content_list">

			<div class="col-md-offset-1 col-md-10">


				<!-- MAIN CONTENT-->
				<div class="col-md-4 col-md-offset-4 ">
						<img src="<?php echo $pro['img'];?>" class="profile_pic"></img>
					</div>
				<div class="col-md-8 col-md-offset-2">
					
					<div class="form-group row">
						<label class="col-4 col-form-label" style="color: #000">User ID</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['user_id'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">First Name</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['fname'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">Last Name</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['lname'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">User Name</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['user_name'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">Password</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['password'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">Email</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['email'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">Phone No</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['phn_no'];?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label"style="color: #000">Address</label> 
						<div class="col-8">
							<input class="form-control here " disabled value="<?php echo $pro['address'];?>">
						</div>
					</div>
					

				<div class="form-group row">
					<div class="offset-4 col-8">

						<a href="editUserProfile.php?user_id=<?php echo $pro['user_id']; ?>" class="btn btn-primary"   title="Edit" ><i class="fas fa-edit"></i>Edit Profile</a>
					</div>
					
					<!-- END MAIN CONTENT-->


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