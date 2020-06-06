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
    <title>View All Admins</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10'><h2>View All Admins Here</h2></td>
    </tr>

    <tr align='' border='' bgcolor='purple'>
        <th>Counter</th>
        <th>Admin ID</th>
        <th>Admin Name</th>
        <th>Admin Email</th>
        <th>Admin Password</th>
        <th>Admin Picture</th>

        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

	include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM admins';

	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_admin = mysqli_fetch_array($result)) {
		$admin_id = $row_admin['user_id'];
		$admin_username = $row_admin['username'];
		$admin_email = $row_admin['user_email'];
		$admin_pass = $row_admin['pw'];
		$admin_image = $row_admin['admin_image'];
		++$i;?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $admin_id; ?></td>
        <td><?php echo $admin_username; ?></td>
        <td><?php echo $admin_email; ?></td>
        <td><?php echo $admin_pass; ?></td>
        <td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"></td>

        <td><a href ='index.php?edit_admin=<?php echo $admin_id; ?>' class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href ='delete_admin.php?delete_admin=<?php echo $admin_id; ?>' class="btn btn-sm btn-danger">Delete</a></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
