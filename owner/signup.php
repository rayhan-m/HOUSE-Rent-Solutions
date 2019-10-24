<?php
session_start();
  if (@$_SESSION['owner_login'] != TRUE) {
    require_once './DBManager.php';
    $DBM = new DBManager();
    if (isset($_POST['button'])) {
        $DBM->addOwner($_POST);
    }
    
?>
<?php include('include/header.php')?>
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="../index.php"><b>House</b>Rent Solutions</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="" method="POST" enctype="multipart/form-data">
                    <div class="msg">Owner Registration</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user_name" placeholder="User Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password"  placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_phone_msg</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="phn_no" placeholder="Phone No" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_phone_msg</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="nid" placeholder="NID No" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">room</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" placeholder="Address" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                             Upload Image:
                        </span>
                        <div class="form-line">
                            <input type="file" name="fileToUpload" id="fileToUpload"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="button">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.html">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/pages/examples/sign-up.js"></script>
    <?php include('include/footer.php')?>
</body>
    <?php } else{
    header('location:dashboard.php');
}
?>