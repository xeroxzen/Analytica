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
    <title>View All Categories</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10'><h2>View All Tags through here</h2></td>
    </tr>

    <tr align='' border='' bgcolor='purple'>
        <th>Counter</th>
        <th>Tag ID </th>
        <th>Tag Name</th>
        <th>Posts with Tag</th>

        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

	include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM tags ORDER BY tag_id';

	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_tag = mysqli_fetch_array($result)) {
		$tag_id = $row_tag['tag_id'];
		$tag_name = $row_tag['tag_name'];
		++$i;

		$posts_query = "SELECT * FROM posts WHERE post_tag = '$tag_name'";
		$post_result = mysqli_query($connection, $posts_query);

		$post_per_tag = mysqli_num_rows($post_result);
		?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $tag_id; ?></td>
        <td><?php echo $tag_name; ?></td>
        <td><?php echo $post_per_tag; ?></td>
        <td><a href ='index.php?edit_tag=<?php echo $tag_id; ?>' class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href ='delete_tag.php?delete_tag=<?php echo $tag_id; ?>' class="btn btn-sm btn-danger">Delete</a></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
