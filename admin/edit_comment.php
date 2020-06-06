<?php
include 'includes/db.php';

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	if (isset($_GET['edit_comment'])) {
		$comment_id = $_GET['edit_comment'];

		$get_comm = "SELECT * FROM comments WHERE id='$comment_id'";

		$result = mysqli_query($connection, $get_comm);

		$row_comm = mysqli_fetch_array($result);

		$comm_id = $row_comm['id'];
		$comm_author_name = $row_comm['name'];
		$comm_author_email = $row_comm['email'];
		$comm_body = $row_comm['comment'];
		$comm_post_id = $row_comm['post_id'];
		$comm_creation = $row_comm['created_at'];

	}
	?>

<head>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
</head>
<form action="" method="POST" style="padding: 170px;" class="form">
	<b>Update Comment</b><br>
	<input type="text" name="new_comm_name" style="float: left" value="<?php echo $comm_author_name; ?>">
	<input type="text" name="new_comm_email" style="float: right" value="<?php echo $comm_author_email; ?>"><br><br>
	<textarea class="form-control" rows="10" cols="30" name="new_comm_body"> <?php echo $comm_body; ?> </textarea><br>
	<input type="submit" name="update_comm" value="Update Comment" class="btn btn-primary">
</form>

<?php

	if (isset($_POST['update_comm'])) {
		if (isset($_GET['post_id'])) {
			$update_id = $_POST['post_id'];

			$comm_update_id = $comm_id;
			$new_comm_name = $_POST['new_comm_name'];
			$new_comm_email = $_POST['new_comm_email'];
			$new_comm_body = $_POST['new_comm_body'];

			$update_comm = "UPDATE comments SET name='$new_comm_name', id='$comm_update_id', email='$new_comm_email', comment='$new_comm_body', WHERE post_id='$update_id'";

			$run_comm = mysqli_query($connection, $update_comm);

			if ($run_comm) {
				echo '<script>Comment has been Updated</script>';
				echo "<script>window.open('index.php?view_comments', '_self')</script>";
			}
		}
	}
	?>

<?php

}
?>