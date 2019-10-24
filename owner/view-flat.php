 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$message = "";

	$DBM = new DBManager();
	$query = $DBM->viewFlat();
	if (isset($_GET['edit'])) {
		$flatid = $_GET['edit'];
		$flatid = $_GET['flatid'];
		$editFlat = $DBM->editFlat($flatid);
		$flat = mysqli_fetch_assoc($editFlat);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['delete'])) {
		$flatid = $_GET['delete'];
		$message = $DBM->deleteFlat($flatid);
	}
?>
<?php include('include/sitebar.php')?>
<section class="content">
        <div class="container-fluid">
        	<?php if($message){?>
             <div>
                <h4 class="text-center text-success bg-green btn-block waves-effect" style="padding: 10px;"><?php echo $message ?></h4>
            </div>
        <?php }else{?>
            <div id="hide">
                
            </div>
        <?php }?>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1 class="text-center">
                                Flat Information
                            </h1>
                            <div class="button-demo">
                                <a type="button" href="add-flat.php" class="btn bg-deep-purple waves-effect">Add Flat</a>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Flat ID</th>
                                            <th>Image</th>
                                            <th>Video</th>
                                            <th>House Number</th>
                                            <th>Flat Type</th>
                                            <th>Flat No</th>
                                            <th>Rent</th>
                                            <th>Service Charge</th>
                                            <th>Security Deposit</th>
                                            <th>Flat Release Policy</th>
                                            <th>Address</th>
                                            <th>Flat Size</th>
                                            <th>Bedroom</th>
                                            <th>Bathroom</th>
                                            <th>Conditions</th>
                                            <th>Facilities</th>
                                            <th>Status</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Flat ID</th>
                                            <th>Image</th>
                                            <th>Video</th>
                                            <th>House Number</th>
                                            <th>Flat Type</th>
                                            <th>Flat No</th>
                                            <th>Rent</th>
                                            <th>Service Charge</th>
                                            <th>Security Deposit</th>
                                            <th>Flat Release Policy</th>
                                            <th>Address</th>
                                            <th>Flat Size</th>
                                            <th>Bedroom</th>
                                            <th>Bathroom</th>
                                            <th>Conditions</th>
                                            <th>Facilities</th>

                                            <th>Status</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
											while ($viewFlat = mysqli_fetch_assoc($query)) {
										?>
                                        <tr>
                                            <td><?php echo @$viewFlat['flatid']; ?></td>
                                            <td class="text-center"><?php echo "<img src='../". @$viewFlat['img'] . "'height='70' width='120'>"; ?>
                                            </td>
                                            <td>
                                                <a target='_blank' href="<?php echo $viewFlat['flat_video']; ?>">view</a>
                                            </td>
                                            <td><?php echo @$viewFlat['house_number']; ?></td>
                                            <td><?php echo @$viewFlat['flat_type']; ?></td>
                                            <td><?php echo @$viewFlat['flat_no']; ?></td>
                                            <td><?php echo @$viewFlat['rent']; ?></td>
                                            <td><?php echo @$viewFlat['service_charge']; ?></td>
                                            <td><?php echo @$viewFlat['security_deposit']; ?></td>
                                            <td><?php echo @$viewFlat['flat_release_policy']; ?></td>
                                            <td><?php echo @$viewFlat['address']; ?></td>
                                            <td><?php echo @$viewFlat['flat_size']; ?></td>
                                            <td><?php echo @$viewFlat['bedroom']; ?></td>
                                            <td><?php echo @$viewFlat['bathroom']; ?></td>
                                            <td><?php echo @$viewFlat['conditions']; ?></td>
                                            <td><?php echo @$viewFlat['facilities']; ?></td>
                                            <td><?php echo @$viewFlat['status']; ?></td>
                                            <td><?php echo @$viewFlat['availability']; ?></td>
                                            <td>
												<a href="edit-flat.php?flatid=<?php echo $viewFlat['flatid']; ?>" class="btn btn-success"   title="Edit" ><i class="material-icons">launch</i></a> 
												<a href="?delete=<?php echo $viewFlat['flatid']; ?>" class="btn btn-danger <?php if($viewFlat['availability'] =='Booked'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="material-icons">delete</i></a>
											</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    
    <?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>