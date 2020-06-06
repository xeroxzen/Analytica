<?php
include 'includes/db.php';

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	if (isset($_GET['edit_tag'])) {
		$tag_id = $_GET['edit_tag'];

		$get_tag = "SELECT * FROM tags WHERE tag_id='$tag_id'";

		$result = mysqli_query($connection, $get_tag);

		$row_tag = mysqli_fetch_array($result);

		$tag_id = $row_tag['tag_id'];
		$tag_name = $row_tag['tag_name'];
	}
	?>

<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<form action="" method="POST" style="padding: 170px;">
	<b>Update Tag</b>
	<input type="text" name="new_tag" value="<?php echo $tag_name; ?>">
	<input type="submit" name="update_tag" value="Update Tag" class="btn btn-primary">
</form>

<?php

	if (isset($_POST['update_tag'])) {
		$update_id = $tag_id;
		$new_tag = $_POST['new_tag'];

		$update_tag = "UPDATE tags SET tag_name='$new_tag' WHERE tag_id='$update_id'";

		$run_tag = mysqli_query($connection, $update_tag);

		if ($run_tag) {
			echo '<script>Tag has been Updated</script>';
			echo "<script>window.open('index.php?view_tags', '_self')</script>";
		}
	}
	?>

<?php

}
?>