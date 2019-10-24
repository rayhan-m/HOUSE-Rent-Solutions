<?php
session_start();
 if ($_SESSION['owner_login'] == TRUE) {
$connection = mysqli_connect('localhost', 'root', '', 'homerent');
$user_name=$_SESSION['user_name'];
$sql = "SELECT * from owner where user_name='$user_name'";
$result = $connection->query($sql);
$OwnerProfile = mysqli_fetch_assoc($result);
?>
<?php include('include/sitebar.php')?>
<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 class="text-center bg-deep-orange" style="padding: 10px;">Owner Profile</h2>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<img src="../<?php echo $OwnerProfile['img']; ?>" alt="" class=" profile_pic"/>
							</div>

							<div class=" col-md-8" style="height: 400px;">
								<h3 style="color:gray;">Owner ID   &nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $OwnerProfile['ownerid']; ?></h3>
								<h3 style="color:gray;">Full Name   &nbsp&nbsp: &nbsp<?php echo $OwnerProfile['full_name']; ?></h3>
								<h3 style="color:gray;">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnerProfile['email']; ?></h3>
								<h3 style="color:gray;">Phone No &nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnerProfile['phn_no']; ?></h3>
								<h3 style="color:gray;">NID No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnerProfile['nid']; ?></h3>
								<h3 style="color:gray;">Address  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnerProfile['address']; ?></h3>
							</br>
							</br>
								<div class="button-demo">
                                <a type="button" href="view-booking-request.php" class="btn bg-deep-purple waves-effect">BACK</a>
                            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="js/pages/ui/notifications.js"></script>
<?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>

