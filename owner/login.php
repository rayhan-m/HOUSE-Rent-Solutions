
<?php
@session_start();
  if (@$_SESSION['owner_login'] != TRUE) {
$message = "";
if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
if (isset($_POST['login'])) {
$user_name =$_POST['user_name'];
$password = $_POST['password'];
//echo $user_name;

$con = mysqli_connect("localhost", "root", "", "homerent");

    
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM owner WHERE user_name = '" . $user_name. "' and password = '" . $password. "'and status='Active'");

    
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_name']=$user_name;
        $_SESSION['owner_login']=TRUE;
        header("Location:dashboard.php");
    }   
    else {
        $message= 'Incorrect Username or Password!!!';
    }
}
?>
<?php include('include/header.php')?>
<body class="login-page bag">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);" style="background-color:  #0f5687 ;"><b>House</b>Rent Solutions</a>
            <h3 class="text-center" style="background-color:   #2e9205 ; color: #fff;">Owner Login</h3>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">
                        <?php if($message){?>
                         <div>
                            <h4 class="text-center bg-red btn-block" style="padding: 10px;"><?php echo $message ?></h4>
                        </div>
                    <?php }else{?>
                        <div id="hide">
                            
                        </div>
                    <?php }?>
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
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="signup.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <script src="js/pages/examples/sign-in.js"></script>
        <?php include('include/footer.php')?>
    </body>
    <?php } else{
    header('location:dashboard.php');
}
?>