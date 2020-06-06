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
    <title>View All Posts</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10' bgcolor='#ee3e89'><h2>View All Posts through here</h2></td>
    </tr>

    <tr align='' border='1' bgcolor='purple'>
        <th>#</th>
        <th>Author</th>
        <th>Title</th>
        <th>Cat</th>
        <th>Tag</th>
        <th>Post ID</th>
        <th>Image</th>
        <th>Content</th>

        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM posts ORDER BY post_id';

	//This is a comment counter to be used in the view post function
	//It will show the total comments for each single post in the admin area

	//For Posts
	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_post = mysqli_fetch_array($result)) {

		$post_id = $row_post['post_id'];
		$post_author = $row_post['post_author'];
		$post_title = $row_post['post_title'];
		$post_cat = $row_post['post_cat'];
		$post_tag = $row_post['post_tag'];
		$post_image = $row_post['post_image'];
		$post_content = $row_post['post_content'];
		$post_create = $row_post['created_at'];
		++$i;?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $post_author; ?></td>
        <td><?php echo $post_title; ?></td>
        <td><?php echo $post_cat; ?></td>
        <td><?php echo $post_tag; ?></td>
        <td><?php echo $post_id; ?></td>
        <td><img src="post_images/<?php echo $post_image; ?>" width="70" height="70"></td>
        <td><?php echo substr(strip_tags($post_content), 0, 50), strlen(strip_tags($post_content)) > 50 ? "..." : "" ?></td>
        <td><a href ='index.php?edit_post=<?php echo $post_id; ?>' class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href ='delete_post.php?delete_post=<?php echo $post_id; ?>' class="btn btn-sm btn-danger">Delete</a></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
