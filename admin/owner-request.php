 <?php
 session_start();
    if ($_SESSION['admin_login'] == TRUE) {
 require_once '../owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewOwnerReq();

if (isset($_POST['btn'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $ownerid = $_POST['ownerid'];

    $sql = "UPDATE owner SET  status='Active' WHERE ownerid='$ownerid'";
    $query1 = $connection->query($sql);
    }
include('inc/header.php')
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Owner ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    while ($viewOwnerReq = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo @$viewOwnerReq['ownerid']; ?></td>
                                            <td><?php echo @$viewOwnerReq['full_name']; ?></td>
                                            <td><?php echo @$viewOwnerReq['phn_no']; ?></td>
                                            <td><?php echo @$viewOwnerReq['email']; ?></td>
					          				<td style="background-color: red; color:#fff;"><?php echo @$viewOwnerReq['status']; ?></td>
                                        <td>
                                            <a href="unactive-owner-profile.php?ownerid=<?php echo $viewOwnerReq['ownerid']; ?>" class="btn btn-success"   title="Details" ><i class="fas fa-eye"></i></a> 
                                        </td>
                                        <td>
						                    <form action="" method="post">
						                        <input type="hidden" name="ownerid" value="<?php echo $viewOwnerReq['ownerid']; ?>" class="form-control" >
						                        <button type="submit" name="btn" class="btn btn-primary"  <?php if($viewOwnerReq['status'] == 'Active'){?> disabled <?php }?> >Active</button>
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