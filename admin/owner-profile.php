<?php
@session_start();
   if ($_SESSION['admin_login'] == TRUE) {
$connection = mysqli_connect('localhost', 'root', '', 'homerent');
$ownerid=$_GET['ownerid'];
$sql = "SELECT * from owner where ownerid='$ownerid'";
$result = $connection->query($sql);
$OwnProfile = mysqli_fetch_assoc($result);
include('inc/header.php')
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="row m-t-20">

                            <div class="col-md-12">
                            	<h2 class="text-center" style="padding: 5px; background-color:  #121983 ; color: #fff;">Owner Profile</h2>
                            	<div class="col-md-8">
									<img src="../<?php echo $OwnProfile['img']; ?>" alt="" class=" profile_pic"/>
									<div class="marg">
										<h3 style="color:#fff;">Owner ID   &nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $OwnProfile['ownerid']; ?></h3>
										<h3 style="color:#fff;">Full Name   &nbsp&nbsp: &nbsp<?php echo $OwnProfile['full_name']; ?></h3>
										<h3 style="color:#fff;">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnProfile['email']; ?></h3>
										<h3 style="color:#fff;">Phone No &nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnProfile['phn_no']; ?></h3>
										<h3 style="color:#fff;">NID No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnProfile['nid']; ?></h3>
										<h3 style="color:#fff;">Address  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  &nbsp<?php echo $OwnProfile['address']; ?></h3>
									</div>
									<a type="button" href="owner-list.php" class="btn btn-primary">BACK</a>
								</div>
								
                            </div>
                        </div>

<?php include('inc/footer.php');
}else{
    header('location:login.php');
}
?>