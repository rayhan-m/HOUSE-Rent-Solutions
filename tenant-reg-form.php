 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
    include('include/ten-header.php');
	$query = $DBM->viewTenRegForm();
	$TenRegForm = mysqli_fetch_assoc($query);
	$message = "";
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}

 if (isset($_POST['button'])) {
     $connection = mysqli_connect('localhost', 'root', '', 'homerent');
	 $user_name=$_SESSION['user_name'];
	 $sql1 = "SELECT flatid,house_number FROM booking WHERE user_name='$user_name' AND status='Approved'";
	 $query = $connection->query($sql1);
	 $house = mysqli_fetch_assoc($query);
	 $flatid= $house['flatid'];
	 $house_num= $house['house_number'];

	 $sql2 = "SELECT * FROM building WHERE house_number='$house_num'";
	 $query = $connection->query($sql2);
	 $building = mysqli_fetch_assoc($query);
	 $road_number= $building['road_number'];
	 $location= $building['location'];
	 $post_code= $building['post_code'];

	 $sql3 = "SELECT user_id FROM tenant WHERE user_name='$user_name'";
	 $query = $connection->query($sql3);
	 $tenant = mysqli_fetch_assoc($query);
	 $tenantid= $tenant['user_id'];


	 $tenant_name =$_POST['tenant_name'];
	 $father_name =$_POST['father_name'];
	 $dob =$_POST['dob'];
	 $marital_status =$_POST['marital_status'];
	 $address1 =$_POST['address1'];
	 $job =$_POST['job'];
	 $religion =$_POST['religion'];
	 $education =$_POST['education'];
	 $phn_num1 =$_POST['phn_num1'];
	 $email =$_POST['email'];
	 $nid_no1 =$_POST['nid_no1'];
	 $passport_no =$_POST['passport_no'];
	 $ref_name =$_POST['ref_name'];
	 $relation =$_POST['relation'];
	 $address2 =$_POST['address2'];
	 $phn_num2 =$_POST['phn_num2'];
	 $housewife_name =$_POST['housewife_name'];
	 $nid_no2 =$_POST['nid_no2'];
	 $address3 =$_POST['address3'];
	 $phn_num3 =$_POST['phn_num3'];
	 $driver_name =$_POST['driver_name'];
	 $nid_no3 =$_POST['nid_no3'];
	 $address4 =$_POST['address4'];
	 $phn_num4 =$_POST['phn_num4'];
	 $pre_owner_name =$_POST['pre_owner_name'];
	 $address5 =$_POST['address5'];
	 $phn_num5 =$_POST['phn_num5'];
	 $reason =$_POST['reason'];
	 $status='done';

	 $sql4 = "INSERT INTO tenant_reg_form (tenantid,flatid,house_number,road_number,location,post_code,tenant_name,father_name,dob,marital_status,address1,job,religion,education,phn_num1,email,nid_no1,passport_no,ref_name,relation,address2,phn_num2,housewife_name,nid_no2,address3,phn_num3,driver_name,nid_no3,address4,phn_num4,pre_owner_name,address5,phn_num5,reason,status,user_name)VALUES('$tenantid','$flatid','$house_num','$road_number','$location','$post_code','$tenant_name','$father_name','$dob','$marital_status','$address1','$job','$religion','$education','$phn_num1','$email','$nid_no1','$passport_no','$ref_name','$relation','$address2','$phn_num2','$housewife_name','$nid_no2','$address3','$phn_num3','$driver_name','$nid_no3','$address4','$phn_num4','$pre_owner_name','$address5','$phn_num5','$reason','$status','$user_name')";
  	 $query = $connection->query($sql4);

     $_SESSION['message'] = 'Registration Done';
     header('location:tenant-reg-form.php');

}

?>

<div style="background-image: url('img/banner2.jpg')" class="banner_section1">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h3>Tenant Registration Form</h3>
			</div>
		</div>
	</div>
</div>

</div>
<div class="main_content_section">
	<div class="col-md-12">
		<?php include('include/menubar.php')?>

		<div class="content_list">

			<div class="col-md-offset-2 col-md-8">
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 
					<?php if($TenRegForm['status']== 'done'){?>
					<h2 class="text-center" style="color: #fff; background-color:green;">Registration Completed</h2>
				<?php }else{?>
					<h2 class="text-center" style="color: #fff; background-color:pink;">Fill up Carefully</h2> 
				<?php }?>
					<h2 class="text-center" style="color: #0a2269">ভাড়াটিয়া নিবন্ধন ফরম</h2>  
				<?php if($TenRegForm['status']== 'done'){?>
					<form action="" method="post" >
					<div class="form-row" style="color: #000">
							<div class="form-group col-md-4">
						<label>Tenant ID</label>
						<input type="text" name="house_number" class="form-control" value="<?php echo @$TenRegForm['tenantid']; ?>"  readonly>
					</div>
					<div class="form-group col-md-4">
						<label>বাড়ি/হোল্ডিং</label>
						<input type="text" name="house_number" value="<?php echo @$TenRegForm['house_number']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>রাস্তা</label>
						<input type="text" name="road_number" value="<?php echo @$TenRegForm['road_number']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>এলাকা</label>
						<input type="text" name="location" value="<?php echo @$TenRegForm['location']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>পোস্ট কোড</label>
						<input type="number" name="post_code" value="<?php echo @$TenRegForm['post_code']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-10">
						<label>ভাড়াটিয়া/ বাড়িওলার নামঃ</label>
						<input type="text" name="tenant_name" value="<?php echo @$TenRegForm['tenant_name']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-10">
						<label>পিতার নাম</label>
						<input type="text" name="father_name" value="<?php echo @$TenRegForm['father_name']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জন্ম তারিখ</label>
						<input type="text" name="dob" value="<?php echo @$TenRegForm['dob']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>বৈবাহিক অবস্থা</label>
						<input type="text" name="marital_status" value="<?php echo @$TenRegForm['marital_status']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-12">
						<label>স্থায়ী ঠিকানা</label>
						<input type="text" name="address1" value="<?php echo @$TenRegForm['address1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-12">
						<label>পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা</label>
						<input type="text" name="job" value="<?php echo @$TenRegForm['job']; ?>" class="form-control"readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ধর্ম</label>
						<input type="text" name="religion" value="<?php echo @$TenRegForm['religion']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>শিক্ষাগত যোগ্যতা</label>
						<input type="text" name="education" value="<?php echo @$TenRegForm['education']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num1" value="<?php echo @$TenRegForm['phn_num1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ইমেইল আইডি</label>
						<input type="email" name="email" value="<?php echo @$TenRegForm['email']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no1" value="<?php echo @$TenRegForm['nid_no1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পাসপোর্ট নম্বর(যদি থাকে)</label>
						<input type="number" name="passport_no" value="<?php echo @$TenRegForm['passport_no']; ?>" class="form-control"readonly>
					</div>

					<div class="form-group col-md-6">
						<label>নাম (জরুরী যোগাযোগ) </label>
						<input type="text" name="ref_name" value="<?php echo @$TenRegForm['ref_name']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>সম্পর্ক</label>
						<input type="text" name="relation" value="<?php echo @$TenRegForm['relation']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address2" value="<?php echo @$TenRegForm['address2']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num2" value="<?php echo @$TenRegForm['phn_num2']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>গৃহকর্মীর নাম</label>
						<input type="text" name="housewife_name" value="<?php echo @$TenRegForm['housewife_name']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no2" value="<?php echo @$TenRegForm['nid_no2']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address3" value="<?php echo @$TenRegForm['address3']; ?>" class="form-control"readonly >
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num3" value="<?php echo @$TenRegForm['phn_num3']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ড্রাইভারের নাম</label>
						<input type="text" name="driver_name" value="<?php echo @$TenRegForm['driver_name']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no3" value="<?php echo @$TenRegForm['nid_no3']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address4" value="<?php echo @$TenRegForm['address4']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num4" value="<?php echo @$TenRegForm['phn_num4']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাড়িওলার নাম</label>
						<input type="text" name="pre_owner_name" value="<?php echo @$TenRegForm['pre_owner_name']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address5" value="<?php echo @$TenRegForm['address5']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num5" value="<?php echo @$TenRegForm['phn_num5']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাসা ছাড়ার কারণ</label>
						<input type="text" name="reason" value="<?php echo @$TenRegForm['reason']; ?>" class="form-control" readonly>
					</div>
				</div>
			</form>
		<?php } else{?>
					          
					<form action="" method="post" >
						<div class="form-row" style="color: #000">

					<div class="form-group col-md-10">
						<label>ভাড়াটিয়া/ বাড়িওলার নামঃ</label>
						<input type="text" name="tenant_name" class="form-control" placeholder="ভাড়াটিয়া/ বাড়িওলার নামঃ" required>
					</div>

					<div class="form-group col-md-10">
						<label>পিতার নাম</label>
						<input type="text" name="father_name" class="form-control" placeholder="পিতার নাম" required>
					</div>
					<div class="form-group col-md-6">
						<label>জন্ম তারিখ</label>
						<input type="date" name="dob" class="form-control" placeholder="জন্ম তারিখ" required>
					</div>
					<div class="form-group col-md-6">
						<label>বৈবাহিক অবস্থা</label>
						<select class="form-control" name="marital_status" required>
							<option value="">~~SELECT~~</option>
							<option value="Married">Married</option>
							<option value="Unmarried">Unmarried</option>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>স্থায়ী ঠিকানা</label>
						<input type="text" name="address1" class="form-control" placeholder="স্থায়ী ঠিকানা" required>
					</div>
					<div class="form-group col-md-12">
						<label>পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা</label>
						<input type="text" name="job" class="form-control" placeholder="পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা" required>
					</div>

					<div class="form-group col-md-6">
						<label>ধর্ম</label>
						<input type="text" name="religion" class="form-control" placeholder="ধর্ম" required>
					</div>
					<div class="form-group col-md-6">
						<label>শিক্ষাগত যোগ্যতা</label>
						<input type="text" name="education" class="form-control" placeholder="শিক্ষাগত যোগ্যতা"required>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num1" class="form-control" placeholder="মোবাইল নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>ইমেইল আইডি</label>
						<input type="email" name="email" class="form-control" placeholder="ইমেইল আইডি" required>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no1" class="form-control" placeholder="জাতীয় পরিচয় পত্র নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>পাসপোর্ট নম্বর(যদি থাকে)</label>
						<input type="number" name="passport_no" class="form-control" placeholder="পাসপোর্ট নম্বর(যদি থাকে)" required>
					</div>

					<div class="form-group col-md-6">
						<label>নাম (জরুরী যোগাযোগ) </label>
						<input type="text" name="ref_name" class="form-control" placeholder="নাম (জরুরী যোগাযোগ)" required>
					</div>
					<div class="form-group col-md-6">
						<label>সম্পর্ক</label>
						<input type="text" name="relation" class="form-control" placeholder="সম্পর্ক" required>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address2" class="form-control" placeholder="ঠিকানা" required>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num2" class="form-control" placeholder="মোবাইল নম্বর"required >
					</div>

					<div class="form-group col-md-6">
						<label>গৃহকর্মীর নাম</label>
						<input type="text" name="housewife_name" class="form-control" placeholder="গৃহকর্মীর নাম" required>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no2" class="form-control" placeholder="জাতীয় পরিচয় পত্র নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address3" class="form-control" placeholder="ঠিকানা" required>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num3" class="form-control" placeholder="মোবাইল নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>ড্রাইভারের নাম</label>
						<input type="text" name="driver_name" class="form-control" placeholder="ড্রাইভারের নাম" required>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no3" class="form-control" placeholder="জাতীয় পরিচয় পত্র নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address4" class="form-control" placeholder="ঠিকানা" required>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num4" class="form-control" placeholder="মোবাইল নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাড়িওলার নাম</label>
						<input type="text" name="pre_owner_name" class="form-control" placeholder="পূর্ববর্তী বাড়িওলার নাম" required>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address5" class="form-control" placeholder="ঠিকানা" required>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num5" class="form-control" placeholder="মোবাইল নম্বর" required>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাসা ছাড়ার কারণ</label>
						<input type="text" name="reason" class="form-control" placeholder="পূর্ববর্তী বাসা ছাড়ার কারণ" required>
					</div>

					<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
				</div>
			</form>
		<?php }?>
		</div>
	</div>
	<!-- END MAIN CONTENT-->
</div>   
</div>  
</div>
</div>
<!--Inspiration from: http://ertekinn.com/loginsignup/-->

<script>
	$(function () {
		$("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
</script>
<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
	window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
	ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
<?php }else{
    header('location:login.php');
}
?>