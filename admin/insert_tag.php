<?php

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	?>

<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<form action="" method="POST" style="padding: 170px;">
	<b>Insert New Tag</b>
	<input type="text" name="new_tag">
	<input type="submit" name="add_tag" value="Add New Tag" class="btn btn-primary">
</form>

<?php

	include 'includes/db.php';

	if (isset($_POST['add_tag'])) {

		$new_tag = $_POST['new_tag'];

		$insert_tag = "INSERT INTO tags(tag_name) VALUES('$new_tag')";

		$run_tag = mysqli_query($connection, $insert_tag);

		if ($run_tag) {
			echo "<script>New Tag has been inserted</script>";
			echo "<script>window.open('index.php?insert_tag', '_self')</script>";
		}
	}
	?>

<?php }?>