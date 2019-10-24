 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$flatid = $_GET['flatid']; 
	$DBM = new DBManager();
	$editFlat = $DBM->editFlat($flatid);
	$flat = mysqli_fetch_assoc($editFlat);
	if (isset($_POST['button'])) {
    	$DBM->updateFlat($_POST);
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
                            <h2 class="text-center">Update Flat Info</h2>

                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                            	<input type="hidden" name="flatid" value="<?php echo $flat['flatid']; ?>" class="form-control">
                                <div class="form-group ">
                                    <div class="form-line">
                                        <select class="form-control" name="house_number" required>
                                            <option value="">Select House</option>
                                            <?php
                                                $connection = mysqli_connect('localhost', 'root', '', 'homerent');
                                                
                                                $sql = "SELECT house_number from building";
                                                $result = $connection->query($sql);

                                                while ($row1 = $result->fetch_array()) {
                                                            echo "<option value='" . $row1['house_number'] . "'>" . $row1['house_number'] . "</option>";
                                                    } // while
                                                ?>
                                                <option value="<?php if( $flat['house_number']== $row1['house_number'] ) echo "selected";?>"></option>
                                        </select>
                                    </div>
                                </div>

                                <br/>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <select class="form-control" name="flat_type" required>
                                            <option value="">Select Flat Type</option>
                                            <option value="Family House" <?php if ($flat['flat_type'] == 'Family House') echo "selected"; ?> >Family House</option>
                                            <option value="Sublet" <?php if ($flat['flat_type'] == 'Sublet') echo "selected"; ?>>Sublet</option>
                                            <option value="Bachelor Mess" <?php if ($flat['flat_type'] == 'Bachelor Mess') echo "selected"; ?>>Bachelor Mess</option>
                                            <option value="Female Mess" <?php if ($flat['flat_type'] == 'Female Mess') echo "selected"; ?>>Female Mess</option>
                                            <option value="Office" <?php if ($flat['flat_type'] == 'Office') echo "selected"; ?>>Office</option>
                                            <option value="Warehouse" <?php if ($flat['flat_type'] == 'Warehouse') echo "selected"; ?>>Warehouse</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="flat_no" value="<?php echo $flat['flat_no']; ?>">
                                        <label class="form-label">Flat No</label>
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="rent" value="<?php echo $flat['rent']; ?>">
                                        <label class="form-label">Rent/Month</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="service_charge" value="<?php echo $flat['service_charge']; ?>" >
                                        <label class="form-label">Service Charge</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="security_deposit" value="<?php echo $flat['security_deposit']; ?>">
                                        <label class="form-label">Security Deposit</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="flat_release_policy" value="<?php echo $flat['flat_release_policy']; ?>">
                                        <label class="form-label">Flat Release Policy</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="address" value="<?php echo $flat['address']; ?>">
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="flat_size" value="<?php echo $flat['flat_size']; ?>">
                                        <label class="form-label">Flat Size</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bedroom" value="<?php echo $flat['bedroom']; ?>">
                                        <label class="form-label">Bedroom</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bathroom" value="<?php echo $flat['bathroom']; ?>">
                                        <label class="form-label">Bathroom</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="phn_no" value="<?php echo $flat['phn_no']; ?>">
                                        <label class="form-label">Phone No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="conditions" cols="30" rows="5" class="form-control no-resize"><?php echo $flat['conditions']; ?></textarea>
                                        <label class="form-label">Conditions</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="facilities" cols="30" rows="5" class="form-control no-resize" ><?php echo $flat['facilities']; ?></textarea>
                                        <label class="form-label">Facilities</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Image</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="fileToUpload" >
                                        
                                    </div>

                                </div>
                              	<div class="form-group form-float">
                                	<div class="form-line">
	                                    <select class="form-control"  name="status" required>
	                                    	<option value="">Select Status</option>
	                                        <option value="Public" <?php if ($flat['status'] == 'Public') echo "selected"; ?> >Public</option>
	                                        <option value="Private" <?php if ($flat['status'] == 'Private') echo "selected"; ?> >Private</option>
	                                    </select>
	                                    
                                    </div>
                                </div>
                               
                                <br/>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="availability" required>
                                            <option value="">Select Availability</option>
                                            <option value="available" <?php if ($flat['availability'] == 'available') echo "selected"; ?> >Available</option>
                                            <option value="booked" <?php if ($flat['availability'] == 'booked') echo "selected"; ?> >Booked</option>
                                        </select>
                                        
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
<?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>