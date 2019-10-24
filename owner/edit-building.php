 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$bid = $_GET['bid']; 
	$DBM = new DBManager();
	$editBuilding = $DBM->editBuilding($bid);
	$building = mysqli_fetch_assoc($editBuilding);
	if (isset($_POST['button'])) {
    	$DBM->updateBuilding($_POST);
	}
 ?>
 <?php include('include/sitebar.php')?>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">Update Building Info</h2>

                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    	<input type="hidden" name="bid" value="<?php echo $building['bid']; ?>" class="form-control" >
                                        <input type="text" class="form-control" name="house_name" value="<?php echo $building['house_name']; ?>" >
                                        <label class="form-label">House Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="house_number" value="<?php echo $building['house_number']; ?>">
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="road_number" value="<?php echo $building['road_number']; ?>">
                                        <label class="form-label">Road Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location" value="<?php echo $building['location']; ?>">
                                        <label class="form-label">Location</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="post_code" value="<?php echo $building['post_code']; ?>">
                                        <label class="form-label">Post Code</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize" ><?php echo $building['description']; ?></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="fileToUpload" value="<?php echo "<img src='../". $building['img'] . "'height='70' width='120'>"; ?>">
                                    </div>
                                </div>
                              	<div class="form-group form-float">
                                	<div class="form-line">
	                                    <select class="form-control" name="status" required>
	                                    	<option value="">~~SELECT~~</option>
	                                        <option value="Public" <?php if ($building['status'] == 'Public') echo "selected"; ?>>Public</option>
	                                        <option value="Private" <?php if ($building['status'] == 'Private') echo "selected"; ?>>Private</option>
	                                    </select>
	                                    <label class="form-label">Status</label>
                                    </div>
                                </div>
                                <br/>
                                <button class="btn btn-primary waves-effect" type="submit" name="button">Update</button>
                               <a href="view-building.php" class="btn btn-danger pull-right">Cancel</a>
                            </form>
                        </div>
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