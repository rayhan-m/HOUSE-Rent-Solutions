 <?php
 session_start();
    if ($_SESSION['admin_login'] == TRUE) {
 require_once '../owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewBuildingReq();

if (isset($_POST['btn'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $bid = $_POST['bid'];

    $sql = "UPDATE building SET  status='Accepted' WHERE bid='$bid'";
    $query1 = $connection->query($sql);
    header('location:buildings.php');
    }
include('inc/header.php')
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="row m-t-20">
                            <div class="col-md-12">
                            	<h1 style="text-align: center; background-color: #673AB7; color: #fff;">Building Request</h1>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>House Name</th>
                                                <th>House No</th>
                                                <th>Road No</th>
                                                <th>Location</th>
                                                <th>Post Code</th>
                                                <th>Image</th>
                                                <th>Documents</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    while ($viewBuildingReq = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo @$viewBuildingReq['house_name']; ?></td>
                                            <td><?php echo @$viewBuildingReq['house_number']; ?></td>
                                            <td><?php echo @$viewBuildingReq['road_number']; ?></td>
                                            <td><?php echo @$viewBuildingReq['location']; ?></td>
					          				<td><?php echo @$viewBuildingReq['post_code']; ?></td>
					          				<td class="text-center"><?php echo "<img src='../". @$viewBuildingReq['img'] . "'height='70' width='120'>"; ?>
											</td>
	                                        <td>
	                                            <a href="../<?php echo @$viewBuildingReq['verify_house']; ?>" target="_blank" class="btn btn-success"   title="VIEW" ><i class="fas fa-eye"></i></a> 
	                                        </td>
	                                        <td>
							                    <form action="" method="post">
							                        <input type="hidden" name="bid" value="<?php echo $viewBuildingReq['bid']; ?>" class="form-control" >
							                        <button type="submit" name="btn" class="btn btn-primary"  <?php if($viewBuildingReq['status'] == 'Accepted'){?> disabled <?php }?> >Accept</button>
							                    </form>
							                </td>
	                                    </tr>
                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
<?php include('inc/footer.php');
}else{
    header('location:login.php');
}
?>