<?php
include 'includes/db.php';

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	if (isset($_GET['edit_cat'])) {
		$cat_id = $_GET['edit_cat'];

		$get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";

		$result = mysqli_query($connection, $get_cat);

		$row_cat = mysqli_fetch_array($result);

		$cat_id = $row_cat['cat_id'];
		$cat_name = $row_cat['cat_name'];
	}
	?>

<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<form action="" method="POST" style="padding: 170px;">
	<b>Update Category</b>
	<input type="text" name="new_cat" value="<?php echo $cat_name; ?>">
	<input type="submit" name="update_cat" value="Update Category" class="btn btn-primary">
</form>

<?php

	if (isset($_POST['update_cat'])) {
		$update_id = $cat_id;
		$new_cat = $_POST['new_cat'];

		$update_cat = "UPDATE categories SET cat_name='$new_cat' WHERE cat_id='$update_id'";

		$run_cat = mysqli_query($connection, $update_cat);

		if ($run_cat) {
			echo '<script>Category has been Updated</script>';
			echo "<script>window.open('index.php?view_cats', '_self')</script>";
		}
	}
	?>

<?php }?>