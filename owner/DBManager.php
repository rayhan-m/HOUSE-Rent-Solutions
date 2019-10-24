<?php
class DBManager {
	protected $connection;
    public function __construct() {
        $this->connection = mysqli_connect('localhost', 'root', '', 'homerent');
        if (!$this->connection) {
            die('Connection fail' . mysql_error($this->connection));
        }
    }

//Building//
    public function addBuilding($data) {
        $user_name=$_SESSION['user_name'];
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../upload/" . $name);
        $url = "upload/$name";

        $name1 = str_replace(" ", "_", $_FILES['fileToUpload1'] ['name']);
        $temp1 = $_FILES['fileToUpload1'] ['tmp_name'];
        move_uploaded_file($temp1, "../house_varify/" . $name1);
        $url1 = "house_varify/$name1";
        $status="Pending";
        
        $sql = "INSERT INTO building (user_name,house_name,house_number,road_number,location,post_code,description, img,verify_house,status)VALUES ('$user_name','$data[house_name]','$data[house_number]','$data[road_number]','$data[location]','$data[post_code]','$data[description]','$url','$url1','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = ' Building Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewBuilding() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM building WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editBuilding($bid) {
        $sql = "SELECT * FROM building WHERE bid='$bid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBuilding($bid) {
        $sql = "DELETE FROM building WHERE bid='$bid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Building Delete Successfully';
            header('location:view-building.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateBuilding($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../upload/". $name);
        $url = "upload/$name";
        
        $sql = "UPDATE building SET house_name = '$data[house_name]', house_number = '$data[house_number]', road_number = '$data[road_number]', location = '$data[location]',post_code = '$data[post_code]',description = '$data[description]',img = '$url',status = '$data[status]' WHERE bid='$data[bid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Building Update Successfully';
            header('location:view-building.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //Flat Type//
    public function addFlatType($data) {
        $sql = "INSERT INTO flat_type (type_name)VALUES ('$data[type_name]')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Flat Type Added Successflly';
            header('location:flat-type.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewFlatType() {
        $sql = "SELECT * FROM flat_type";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFlatType($typeid) {
        $sql = "SELECT * FROM flat_type WHERE typeid='$typeid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFlatType($typeid) {
        $sql = "DELETE FROM flat_type WHERE typeid='$typeid'";
        if (mysqli_query($this->connection, $sql)) {
            $_SESSION['message'] = 'Flat Type Delete Successfully';
            header('location:flat-type.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateFlatType($data) {
        $sql = "UPDATE flat_type SET type_name = '$data[type_name]' WHERE typeid='$data[typeid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Flat Type Update Successfully';
            header('location:flat-type.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //Flat//
    public function addFlat($data) {
        $user_name=$_SESSION['user_name'];
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../upload/" . $name);
        $url = "upload/$name";
        $availability='Available';
        
        $sql = "INSERT INTO flat (user_name,house_number,flat_type,flat_no,rent,service_charge,security_deposit,flat_release_policy,address,flat_size,bedroom,bathroom,phn_no,bkash,conditions,facilities,img,flat_video,status,availability)VALUES ('$user_name','$data[house_number]','$data[flat_type]','$data[flat_no]','$data[rent]','$data[service_charge]','$data[security_deposit]','$data[flat_release_policy]','$data[address]','$data[flat_size]','$data[bedroom]','$data[bathroom]','$data[phn_no]','$data[bkash]','$data[conditions]','$data[facilities]','$url','$data[flat_video]','$data[status]','$availability')";
        if (mysqli_query($this->connection, $sql)) {
            $message = ' Flat Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewFlat() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM flat WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFlat($flatid) {
        $sql = "SELECT * FROM flat WHERE flatid='$flatid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFlat($flatid) {
        $sql = "DELETE FROM flat WHERE flatid='$flatid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Flat Delete Successfully';
            header('location:view-flat.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateFlat($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../upload/". $name);
        $url = "upload/$name";
        
        $sql = "UPDATE flat SET house_number = '$data[house_number]',flat_type = '$data[flat_type]', flat_no = '$data[flat_no]', rent = '$data[rent]',service_charge = '$data[service_charge]',security_deposit = '$data[security_deposit]',flat_release_policy = '$data[flat_release_policy]',address = '$data[address]',flat_size = '$data[flat_size]',bedroom = '$data[bedroom]',bathroom = '$data[bathroom]',phn_no = '$data[phn_no]',conditions = '$data[conditions]',facilities = '$data[facilities]',img = '$url',status = '$data[status]',availability = '$data[availability]' WHERE flatid='$data[flatid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Flat Update Successfully';
            header('location:view-flat.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    // User Register//
    public function addTenant($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        $sql = "INSERT INTO tenant (fname, lname, user_name, password, email, phn_no, address, img)VALUES ('$data[first_name]','$data[last_name]','$data[user_name]','$data[password]','$data[email]','$data[phn_no]','$data[address]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Register Successfully';
            header('location:login.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    // flat View//
    public function viewFlatHome() {
        $sql = "SELECT * FROM flat WHERE status='Public' AND availability='Available' LIMIT 6";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewAllFlat() {
        $sql = "SELECT * FROM flat WHERE status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewFamilyFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Family House' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewSubletFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Sublet' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewBMessFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Bachelor Mess' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewFMessFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Female Mess' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewOfficeFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Office' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewWarehouseFlat() {
        $sql = "SELECT * FROM flat WHERE flat_type='Warehouse' AND status='Public' AND availability='Available'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewSingleFlat($flatid) {
        $sql = "SELECT * FROM flat WHERE flatid='$flatid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewBookReq() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM booking WHERE uname='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenBookReq() {
        $user_name=@$_SESSION['user_name'];
        $sql = "SELECT * FROM booking WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenantProfile() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM tenant WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBookReq($bookid) {
        $sql = "DELETE FROM booking WHERE bookid='$bookid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Booking Request Cancled Successfully';
            header('location:view-booking-request.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewRelFlat() {
        $sql = "SELECT * FROM flat WHERE status='Public' AND availability='available' LIMIT 3";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenProfile() {

        $sql = "SELECT * FROM tenant WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    // Owner Register//
    public function addOwner($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../upload/" . $name);
        $url = "upload/$name";

        $status='Pending';

        $sql = "INSERT INTO owner (full_name, user_name, password, email, phn_no,nid, address, img,status)VALUES ('$data[full_name]','$data[user_name]','$data[password]','$data[email]','$data[phn_no]','$data[nid]','$data[address]','$url','$status')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Register Successfully';
            header('location:login.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    public function viewOwnerProfile() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM owner WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//Notice//
    public function addNotice($data) {
        $user_name=$_SESSION['user_name'];
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../notice/" . $name);
        $url = "notice/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        $status="Not Published";

        $sql = "INSERT INTO notice (user_name,title,date,file,status)VALUES ('$user_name','$data[title]','$current_date','$url','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = ' Notice Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewNotice() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM notice WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editNotice($noticeid) {
        $sql = "SELECT * FROM notice WHERE noticeid='$noticeid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteNotice($noticeid) {
        $sql = "DELETE FROM notice WHERE noticeid='$noticeid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Notice Delete Successfully';
            header('location:view-notice.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateNotice($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../notice/" . $name);
        $url = "notice/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        $status="Not Published";
        
        $sql = "UPDATE notice SET title = '$data[house_name]',date = '$current_date',file = '$url',  WHERE noticeid='$data[noticeid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Notice Update Successfully';
            header('location:view-notice.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewTenRegForm() {
        $user_name=$_SESSION['user_name'];
        $sql6 = "SELECT flatid FROM booking WHERE user_name='$user_name' AND status='Approved'";
        $query6= $this->connection->query($sql6);
        $booking = mysqli_fetch_assoc($query6);
        $fltid= $booking['flatid'];


        $sql = "SELECT * FROM tenant_reg_form WHERE user_name='$user_name' AND flatid='$fltid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewTenant() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM tenant WHERE owner='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    // public function TenLeaveNotice() {
    //     $user_name=$_SESSION['user_name'];
    //     $sql = "SELECT * FROM leave_notice WHERE user_name='$user_name'";
    //     if (mysqli_query($this->connection, $sql)) {
    //         $query = mysqli_query($this->connection, $sql);
    //         return $query;
    //     } else {                
    //         die('SQL Problem' . mysql_error($this->connection));
    //     }
    // }

    public function viewTenLeaveNotice() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM leave_notice WHERE owner='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    ////Feedback///
    public function ViewFeedback() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM feedback WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFeedback($feedbackid) {
        $sql = "DELETE FROM feedback WHERE feedbackid='$feedbackid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Feedback Delete Successfully';
            header('location:feedback.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFeedback($feedbackid) {
        $sql = "SELECT * FROM feedback WHERE feedbackid='$feedbackid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateFeedback($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        
        $sql = "UPDATE feedback SET title = '$data[title]',comment='$data[comment]' ,date = '$current_date',img = '$url' WHERE feedbackid='$data[feedbackid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Feedback Update Successfully';
            header('location:feedback.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenFeedback() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM feedback WHERE owner='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function ViewPayment() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM payment WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenPayment() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM payment WHERE owner='$user_name' AND status='Paid' OR payment_type='Cash'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenPaymentReq() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM payment WHERE owner='$user_name' AND status='Unpaid' AND payment_type='bkash'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function deletePayment($paymentid) {
        $sql = "DELETE FROM payment WHERE paymentid='$paymentid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Delete Successfully';
            header('location:view-payment.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewExpense() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM expense WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function deleteExpense($expenseid) {
        $sql = "DELETE FROM expense WHERE expenseid='$expenseid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Delete Successfully';
            header('location:expense.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewEarnReport() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM payment WHERE owner='$user_name' AND status='Paid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function ViewExpenseReport() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM expense WHERE user_name='$user_name' AND status='Confirmed'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }


    public function viewOwner() {
        $sql = "SELECT * FROM owner WHERE status='Active' ORDER BY status DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewOwnerReq() {
        $sql = "SELECT * FROM owner WHERE status='Pending' ORDER BY status DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewTenants() {
        $sql = "SELECT * FROM tenant";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewBuildings() {
        $sql = "SELECT * FROM building WHERE status='Accepted'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //Blog Post//
    public function addBlog($data) {
        $user_name=$_SESSION['user_name'];
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../blog/" . $name);
        $url = "blog/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        $status="Not Published";

        $sql = "INSERT INTO blog (user_name,title,date,details,status,img)VALUES ('$user_name','$data[title]','$current_date','$data[details]','$status','$url')";
        if (mysqli_query($this->connection, $sql)) {
            $message = ' Post Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewBlog() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM blog WHERE user_name='$user_name'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {                
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editBlog($postid) {
        $sql = "SELECT * FROM blog WHERE postid='$postid'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBlog($postid) {
        $sql = "DELETE FROM blog WHERE postid='$postid'";
        if (mysqli_query($this->connection, $sql)) {
            
            $_SESSION['message'] = 'Post Delete Successfully';
            header('location:blog-post.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateBlog($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../blog/" . $name);
        $url = "blog/$name";

        date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        
        $sql = "UPDATE blog SET title = '$data[title]',date = '$current_date',details='$data[details]',img = '$url',  WHERE postid='$data[postid]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Post Update Successfully';
            header('location:blog-post.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewTenBlog() {
        $sql = "SELECT * FROM blog WHERE status='Published'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewPopularPost() {
        $sql = "SELECT * FROM blog WHERE status='Published' LIMIT 4";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewRecentPost() {
        $sql = "SELECT * FROM blog WHERE status='Published' LIMIT 3";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewBuildingReq() {
        $sql = "SELECT * FROM building WHERE status='Pending' ORDER BY status DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
}