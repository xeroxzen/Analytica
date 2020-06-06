<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">

<?php

include_once 'includes/db.php';
if (isset($_GET['delete_comment'])) {
	$delete_id = $_GET['delete_comment'];

	$delete_comm = "DELETE FROM comments WHERE id ='$delete_id'";

	$run_delete = mysqli_query($connection, $delete_comm);

	if ($run_delete) {
		echo "

			<div class='alert alert-success' role='alert' style='text-align: center;'>
                <strong>Success:</strong> Comment was successful deleted.
            </div>

		";

		echo "

			<div class='alert alert-warning' role='alert' style='text-align: center;>
                <strong>Success:</strong> Comment was not deleted.
            </div>

		";
	}
}

?>
