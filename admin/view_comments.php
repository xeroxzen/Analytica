<?php

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View All Comments</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10'><h2>View All Comments through here</h2></td>
    </tr>

    <tr align='' border='' bgcolor='purple'>
        <th>#</th>
        <th>ID</th>
        <th>Commentor</th>
        <th>Email</th>
        <th>Post ID</th>
        <th>Comment</th>

        <th>Approve</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

	include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM comments ORDER BY id DESC';

	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_comm = mysqli_fetch_array($result)) {
		$comm_id = $row_comm['id'];
		$comm_author = $row_comm['name'];
		$comm_email = $row_comm['email'];
		$comm_post_id = $row_comm['post_id'];
		$comm_body = $row_comm['comment'];
		++$i;?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $comm_id; ?></td>
        <td><?php echo $comm_author; ?></td>
        <td><?php echo $comm_email; ?></td>
        <td><?php echo $comm_post_id; ?></td>
        <td><?php echo substr(strip_tags($comm_body), 0, 50), strlen(strip_tags($comm_body)) > 50 ? "..." : "" ?></td>
        <td><a href ='index.php?approve_comment=<?php echo $comm_id; ?>' class="btn btn-sm btn-success">Approve</a></td>
        <td><a href ='index.php?edit_comment=<?php echo $comm_id; ?>' class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href ='delete_comment.php?delete_comment=<?php echo $comm_id; ?>' class="btn btn-sm btn-danger">Delete</a></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
