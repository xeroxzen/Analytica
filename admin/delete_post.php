<?php

include_once 'includes/db.php';

if (isset($_GET['delete_post'])) {
	$delete_id = $_GET['delete_post'];

	$delete_post = "DELETE FROM posts WHERE post_id ='$delete_id'";

	$run_delete = mysqli_query($connection, $delete_post);

	if ($run_delete) {
		echo "<script>alert('A post has been deleted.')</script>";

		echo "<script>window.open('index.php?view_posts', '_self')</script>";
	}
}
?>