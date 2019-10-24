 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
    include('include/ten-header.php');
    $query = $DBM->viewBookReq();
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
					<h2 class="text-center" style="color: #0a2269">ভাড়াটিয়া নিবন্ধন ফরম</h2>               
					<form action="" method="post" >
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Renter ID:</label>
								<select type="text" class="form-control"  placeholder="Renter ID"
								name="renter_id" required>
								<option value="">~~SELECT~~</option>
								
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>বাড়ি/হোল্ডিং</label>
						<input type="text" name="house_number" class="form-control" placeholder="বাড়ি/হোল্ডিং"  required>
					</div>
					<div class="form-group col-md-4">
						<label>রাস্তা</label>
						<input type="text" name="road_number" class="form-control" placeholder="রাস্তা" required>
					</div>
					<div class="form-group col-md-4">
						<label>এলাকা</label>
						<input type="text" name="location" class="form-control" placeholder="এলাকা" required>
					</div>
					<div class="form-group col-md-4">
						<label>পোস্ট কোড</label>
						<input type="number" name="post_code" class="form-control" placeholder="পোস্ট কোড" required >
					</div>

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
						<input type="text" name="dob" class="form-control" placeholder="জন্ম তারিখ" required>
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
		</div>
	</div>
	<!-- END MAIN CONTENT-->
</div>   
</div>  
</div>
</div>
<!--Inspiration from: http://ertekinn.com/loginsignup/-->


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