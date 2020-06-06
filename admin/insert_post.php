<?php
include_once 'includes/db.php';

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/main.css"-->

	<script src="js/select2.min.js"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

		<script type="text/javascript">
			tinymce.init({
				selector: 'textarea',
				plugins: 'link code image'
				//toolbar: 'code image',
				//menubar: 'tools',
				//menubar: false
			});
		</script>
</head>
<body>
	<form action="index.php?insert_post" method="POST" enctype="multipart/form-data" class="form-control">

		<table class="table table-striped table-dark" width="auto" border="2" align="center">
			<tr align="center">
				<td colspan="8"><h2>Insert Your New Post here</h2></td>
			</tr>
			<tr>
				<td align="right">Post Author: </td>
				<td><input type="text" name="post_author" autocomplete="On" size="60" required></td>
			</tr>
			<tr>
				<td align="right">Post Title: </td>
				<td><input type="text" name="post_title" autocomplete="On" size="60" required></td>
			</tr>
			<tr>
				<td align="right">Post Tag: </td>
				<td>
					<select class="select2-multi" name="post_tag">
						<option></option>
					<?php

	global $connection;
	$get_tag = 'SELECT * FROM tags';
	$run_tags = mysqli_query($connection, $get_tag);

	while ($row_tags = mysqli_fetch_array($run_tags)) {
		$tag_id = $row_tags['tag_id'];
		$tag_name = $row_tags['tag_name'];

		echo "<option value='$tag_name'>$tag_name</option>";
	}?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Post Category: </td>
				<td>
					<select name="post_cat">
						<option></option>
	<?php

	global $connection;
	$get_cats = 'SELECT * FROM categories';
	$run_cats = mysqli_query($connection, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_name = $row_cats['cat_name'];

		echo "<option value='$cat_name'>$cat_name</option>";
	}?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Post Slug: </td>
				<td><input type="text" name="post_slug" placeholder="hello-world-i-am-a-slug-some-kind-of-url" autocomplete="On" size="60" required></td>
			</tr>
			<tr>
				<td align="right">Post Image: </td>
				<td><input type="file" name="post_image" required></td>
			</tr>
			<tr>
				<td align="right">Image Description: </td>
				<td><input type="text" name="image_desc" size="60" required></td>
			</tr>
			<tr>
				<td align="right">Post Content: </td>
				<td><textarea name="post_content" cols="100" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right">Post Keywords: </td>
				<td><input type="text" name="post_keywords" autocomplete="On" size="60" required></td>
			</tr>
			<tr align="center">
				<td colspan="8"><input type="submit" class="btn-primary btn-sm" name="insert_post" value="Post Now"></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">
			$('.select2-multi').select2();
		</script>
</body>
</html>

<?php

	if (isset($_POST['insert_post'])) {
		//Getting all the necessary post content.
		$post_author = $_POST['post_author'];
		$post_title = $_POST['post_title'];
		$post_cat = $_POST['post_cat'];
		$post_tag = $_POST['post_tag'];
		$post_slug = $_POST['post_slug'];
		$image_desc = $_POST['image_desc'];
		$post_content = $_POST['post_content'];
		$post_keywords = $_POST['post_keywords'];

		//Getting all the necessary image information

		$post_image = $_FILES['post_image']['name'];
		$post_image_tmp = $_FILES['post_image']['tmp_name'];

		move_uploaded_file($post_image_tmp, "post_images/$post_image");

		$insert_post = "INSERT INTO posts(post_author, post_title, post_cat,post_tag, post_slug, post_content,post_keywords, post_image, image_desc) VALUES('$post_author','$post_title','$post_cat','$post_tag','$post_slug','$post_content','$post_keywords','$post_image','$image_desc')";

		$post_insert = mysqli_query($connection, $insert_post);

		if (isset($post_insert)) {
			echo "<script>alert('Your post was successfully sent...')";
			echo "<script>window.open('index.php?insert_post', '_self')</script>";
		} else {
			echo "<script>alert('Post was not successful. Try again.')</script>";
			echo "<script>window.open('index.php?insert_post', '_self')</script>";
		}
	}

	?>
<?php }?>

