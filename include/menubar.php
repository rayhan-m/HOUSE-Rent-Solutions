
<?php 
@session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $user_name=$_SESSION['user_name'];

    $sql6 = "SELECT status FROM booking WHERE user_name='$user_name' AND status='Approved'";
    $query6= $connection->query($sql6);
    $booking = mysqli_fetch_assoc($query6);
    $sts= $booking['status'];
?>
<div class="col-md-1">
      <div id="mySidenav" class="sidenav">
        
        
        <?php if ($sts){?>
        <a href="dashboard.php" id="dashboard">Dashboard</a>
        <a href="index.php" id="home">Home</a>
        <a href="view-book-req.php" id="book_req">View Booking Req</a>
        <a href="notice-board.php" id="notice">Notice Board</a>
        <a href="tenant-reg-form.php" id="reg-form">Registration Form</a>
        <a href="payment.php" id="payment">Make Payment</a>
        <a href="leave-notice.php" id="leave_notice">Leave Notice</a>
        <a href="feedback.php" id="feedback">Feedback</a>
        <?php }else{?>
        <a href="dashboard.php" id="dashboard">Dashboard</a>
        <a href="index.php" id="home">Home</a>
        <a href="view-book-req.php" id="book_req">View Booking Req</a>
    <?php }?>
      </div>

    </div>