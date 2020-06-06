<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/demo.css" rel="stylesheet" />

    <!-- My Custom made CSS files -->

</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style=" background-image:url('img/sunset.jpg');"></div>
        <div class="container">
            <div class="col-md-4 content-center">
            <h6 style ="color: red; text-align: center;"><?php echo @$_GET['not_admin']; ?></h6>
            <h6 style ="color: green; text-align: center;"><?php echo @$_GET['logged_out']; ?></h6>
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="login.php">
                        <div class="header header-primary text-center">
                                <h2 style="color: cyan; font-weight: lighter; font-size: 25px;">Admin Login</h2>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Email..." required="required">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" name="password" placeholder="Password..." class="form-control" required="required" />
                            </div>
                        <div class="footer text-center">
                            <button type="submit" name="login" class="btn btn-primary btn-round btn-lg btn-block">Let me in</button>
                        </div>
                            <p>
                                Don't have an account? <a href="#">Create one</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Coded and Designed by
                    <a href="https://www.github.com/Andile-Mbele" target="_blank">Andile XeroxZen</a>.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

<?php
session_start();

include 'includes/db.php';

if (isset($_POST['login'])) {

	//Using hash functions for deeper encryption
	//$salt1 = 'qm&h';
	//$salt2 = 'pg!@';

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, md5($_POST['password']));

	//token hash using 128bit encryption.
	//Saving final password as a token for better encryption
	//$token = hash('ripemd128', "$salt1$password$salt2");

	$user = "SELECT * FROM admins WHERE user_email='$email' AND pw='$password'";
	$run_user = mysqli_query($connection, $user);

	$check_user = mysqli_num_rows($run_user);

	if ($check_user == 0) {
		echo "<script>alert('Password or Email is wrong, Try Again.')</script>";
	} else {
		$_SESSION['user_email'] = $email;

		echo "<script>window.open('index.php?logged_in=You have successfully logged in as Admin!', '_self')</script>";
	}
}
?>