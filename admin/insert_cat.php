<?php

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	?>

<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<form action="" method="POST" style="padding: 170px;">
	<b>Insert New Category</b>
	<input type="text" name="new_cat" autocomplete="On">
	<input type="submit" name="add_cat" value="Add New Category" class="btn btn-primary">
</form>

<?php

	include 'includes/db.php';

	if (isset($_POST['add_cat'])) {
		$new_cat = $_POST['new_cat'];

		$insert_cat = "INSERT INTO categories(cat_name) VALUES('$new_cat')";

		$run_cat = mysqli_query($connection, $insert_cat);

		if ($run_cat) {
			echo '<script>New Category has been inserted</script>';
			echo "<script>window.open('index.php?view_cats', '_self')</script>";
		}
	}
	?>

<?php }?>