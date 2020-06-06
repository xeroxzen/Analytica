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
    <title>View All Authors</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10'><h2>View All Authors through here</h2></td>
    </tr>

    <tr align='' border='' bgcolor='purple'>
        <th>Counter</th>
        <th>Author Name</th>
        <th>Post Tag</th>
        <th>Posts by Author</th>
        <th>Post Title</th>
        <th>Post ID</th>
    </tr>

    <?php

	include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM posts';

	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_author = mysqli_fetch_array($result)) {
		$author_name = $row_author['post_author'];
		$author_post = $row_author['post_title'];
		$author_post_id = $row_author['post_id'];
		$post_tag = $row_author['post_tag'];
		++$i;

		$posts_query = "SELECT * FROM posts WHERE post_author = '$author_name'";
		$post_result = mysqli_query($connection, $posts_query);

		$posts_by_author = mysqli_num_rows($post_result);
		?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $author_name; ?></td>
        <td><?php print $post_tag;?></td>
        <td><?php print $posts_by_author;?></td>
        <td><?php echo $author_post; ?></td>
        <td><?php echo $author_post_id; ?></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
