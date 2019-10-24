 <?php
 session_start();
	require_once './DBManager.php';
	$typeid = $_GET['typeid']; 
	$DBM = new DBManager();
	$editFlatType = $DBM->editFlatType($typeid);
	$flat_type = mysqli_fetch_assoc($editFlatType);
	if (isset($_POST['button'])) {
    	$DBM->updateFlatType($_POST);
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
                            <h2 class="text-center">Update Flat Type Info</h2>

                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    	<input type="hidden" name="typeid" value="<?php echo $flat_type['typeid']; ?>" class="form-control" >
                                        <input type="text" class="form-control" name="type_name" value="<?php echo $flat_type['type_name']; ?>" >
                                        <label class="form-label">Flat Type Name</label>
                                    </div>
                                </div>
                                <br/>
                                <button class="btn btn-primary waves-effect" type="submit" name="button">Update</button>
                               <a href="flat-type.php" class="btn btn-danger pull-right">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('include/footer.php')?>