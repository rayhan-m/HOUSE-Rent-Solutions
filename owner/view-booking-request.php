 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewBookReq();

 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
if (isset($_POST['btn'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $bookid = $_POST['bookid'];

    $sql = "UPDATE booking SET  status='Approved' WHERE bookid='$bookid'";
    $query = $connection->query($sql);



    $sql1 = "SELECT * FROM booking WHERE bookid='$bookid'";
    $query = $connection->query($sql1);
    $booking = mysqli_fetch_assoc($query);
    $house_no= $booking['house_number'];
    $flat_no= $booking['flat_no'];
    $flatid= $booking['flatid'];


    $user_name=$_SESSION['user_name'];
    $unm=$booking['user_name'];
    $entry_month= date("F Y");
    $sql2 = "UPDATE tenant SET entry_month='$entry_month',flatid='$flatid', owner='$user_name' WHERE user_name='$unm'";
    $query = $connection->query($sql2);

    $sql2 = "UPDATE booking SET status='Rejected' WHERE house_number='$house_no' AND flat_no='$flat_no' AND status='Pending'";
    $query = $connection->query($sql2);

    $sql3 = "UPDATE flat SET availability='Booked' WHERE house_number='$house_no' AND flat_no='$flat_no'";
    $query = $connection->query($sql3);



    $_SESSION['message'] = 'Booking Request Approved';
    header('location:view-booking-request.php');
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
                        Booking Request List
                    </h1>

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
                                    <th>BookID</th>
                                    <th>House Number</th>
                                    <th>Flat Type</th>
                                    <th>Flat No</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Tenant Details</th>
                                    <th>Action</th>
                                </tr>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>BookID</th>
                                <th>House Number</th>
                                <th>Flat Type</th>
                                <th>Flat No</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Tenant Details</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            while ($viewBookReq = mysqli_fetch_assoc($query)) {
                              ?>
                              <tr>
                                <td><?php echo @$viewBookReq['bookid']; ?></td>
                                <td><?php echo @$viewBookReq['house_number']; ?></td>
                                <td><?php echo @$viewBookReq['flat_type']; ?></td>
                                <td><?php echo @$viewBookReq['flat_no']; ?></td>
                                
                                <td class="text-center"><?php echo "<img src='../". @$viewBookReq['img'] . "'height='70' width='120'>"; ?>
                            </td>
                            <?php if(@$viewBookReq['status']=='Pending'){?>
                                <td class="bg-deep-orange waves-effect"><?php echo @$viewBookReq['status']; ?>

                            </td>
                        <?php }else if(@$viewBookReq['status']=='Approved'){?>
                            <td class="bg-green waves-effect"><?php echo @$viewBookReq['status']; ?>
                        </td>
                    <?php } else{?>
                        <td class="bg-grey waves-effect"><?php echo @$viewBookReq['status']; ?>
                    </td>
                <?php }?>

                <td>
                    <a href="tenant-profile.php?user_name=<?php echo $viewBookReq['user_name']; ?>" class="btn btn-success"   title="Details" ><i class="material-icons">face</i></a> 
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="bookid" value="<?php echo $viewBookReq['bookid']; ?>" class="form-control" >
                        <button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($viewBookReq['status'] == 'Approved'){?> disabled <?php }else if($viewBookReq['status'] == 'Rejected'){?> disabled <?php } ?> >Accept</button>
                    </form>
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