<?php

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	?>

<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">

		<form action="" method="POST" class="form-control" enctype="multipart/form-data">
			<table class="table table-striped table-dark" width="auto" border="2" align="center">
				<tr align="center">
					<td colspan="8"><h2>Insert New Admin</h2></td>
				</tr>
				<tr>
					<td align="right">Admin Name</td>
					<td><input type="text" name="admin_name" autocomplete="On" size="60" required="required"></td>
				</tr>
				<tr>
					<td align="right">Admin Email</td>
					<td><input type="email" name="admin_email" autocomplete="On" size="60" required="required"></td>
				</tr>
				<tr>
					<td align="right">Admin Image</td>
					<td><input type="file" name="admin_pic" size="60" required="required"></td>
				</tr>
				<tr>
					<td align="right">Admin Password</td>
					<td><input type="password" name="admin_pass" autocomplete="On" size="60" required="required"></td>
				</tr>
				<tr align="center">
					<td colspan="8">
						<input type="submit" name="add_admin" class="btn-primary btn-sm" value="Add Admin">
					</td>
				</tr>
			</table>
		</form>
<?php

	include 'includes/db.php';

	if (isset($_POST['add_admin'])) {

		//Using hash functions for deeper encryption
		//$salt1 = 'qm&h';
		//$salt2 = 'pg!@';

		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = md5($_POST['admin_pass']);

		//Saving final password as a token for better encryption
		//$token = hash('ripemd128', "$salt1$admin_pass$salt2");

		//Image information

		$admin_image = $_FILES['admin_pic']['name'];
		$admin_image_tmp = $_FILES['admin_pic']['tmp_name'];

		move_uploaded_file($admin_image_tmp, "admin_images/$admin_image");

		$insert_admin = "INSERT INTO admins(username, user_email, admin_image, pw) VALUES('$admin_name', '$admin_email', '$admin_image', '$admin_pass')";

		$run_admin = mysqli_query($connection, $insert_admin);

		if ($run_admin) {
			echo "

				<div class='alert alert-success' role='alert'style='margin-top: -30px;'>
                     <strong>Success:</strong> Admin was successful added.
                 </div>

			";
		} else {

			echo "

					<div class='alert alert-success' role='alert'style='margin-top: -30px;'>
                        <strong>Warning:</strong> Admin was not successful added.
                    </div>


			";
		}

	}
	?>

<?php }?>