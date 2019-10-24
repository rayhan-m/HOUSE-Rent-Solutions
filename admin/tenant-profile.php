<?php
@session_start();
   if ($_SESSION['admin_login'] == TRUE) {
$connection = mysqli_connect('localhost', 'root', '', 'homerent');
$user_id=$_GET['user_id'];
$sql = "SELECT * from tenant where user_id='$user_id'";
$result = $connection->query($sql);
$TenProfile = mysqli_fetch_assoc($result);
include('inc/header.php')
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="row m-t-20">

                            <div class="col-md-12">
                            	<h2 class="text-center" style="padding: 5px; background-color:  #121983 ; color: #fff;">Tenant Profile</h2>
                            	<div class="col-md-8">
									<img src="../<?php echo $TenProfile['img']; ?>" alt="" class=" profile_pic"/>
									<div class="marg">
										<h3 style="color:#fff;">Tenant ID   &nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $TenProfile['user_id']; ?></h3>
										<h3 style="color:#fff;">First Name   &nbsp&nbsp: &nbsp<?php echo $TenProfile['fname']; ?></h3>
										<h3 style="color:#fff;">Last Name   &nbsp&nbsp: &nbsp<?php echo $TenProfile['lname']; ?></h3>
										<h3 style="color:#fff;">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $TenProfile['email']; ?></h3>
										<h3 style="color:#fff;">Phone No &nbsp&nbsp&nbsp:  &nbsp<?php echo $TenProfile['phn_no']; ?></h3>
										<h3 style="color:#fff;">NID No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $TenProfile['owner']; ?></h3>
										<h3 style="color:#fff;">Address  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $TenProfile['address']; ?></h3>
									</div>
									<a type="button" href="tenant-list.php" class="btn btn-primary">BACK</a>
								</div>
								
                            </div>
                        </div>

<?php include('inc/footer.php');
}else{
    header('location:login.php');
}
?>
