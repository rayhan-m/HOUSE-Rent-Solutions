 <?php

 session_start();
 if ($_SESSION['owner_login'] == TRUE) {
$message = "";
	require_once './DBManager.php';
	$DBM = new DBManager();
	if (isset($_POST['button'])) {
		$message = $DBM->addBuilding($_POST);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
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
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center bg-deep-orange" style="padding: 10px;">Add New Building Info</h2>
                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="house_name" required>
                                        <label class="form-label">House Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="house_number" required>
                                        <label class="form-label">House Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="road_number" required>
                                        <label class="form-label">Road Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="location" required>
                                        <label class="form-label">Location</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="post_code" required>
                                        <label class="form-label">Post Code</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <label class="form-label">Upload Building Image</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="fileToUpload" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label style="color: red;" class="form-label">* Upload Building Valid Documents (ex: RAJUK Approval/ Other Valid Document) Scan Copy.</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="fileToUpload1" required>

                                    </div>
                                </div>
                              	 
                                <br/>
                                <button class="btn btn-primary waves-effect text-center btn-block" type="submit" name="button">SUBMIT</button>
                            </form>
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