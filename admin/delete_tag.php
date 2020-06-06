<?php

include_once 'includes/db.php';

if (isset($_GET['delete_tag'])) {
	$delete_id = $_GET['delete_tag'];

	$delete_tag = "DELETE FROM tags WHERE tag_id ='$delete_id'";

	$run_delete = mysqli_query($connection, $delete_tag);

	if ($run_delete) {
		echo "<script>alert('A tag has been deleted.')</script>";

		echo "<script>window.open('index.php?view_tags', '_self')</script>";
	}
}
?>
