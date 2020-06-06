<?php
include_once 'includes/db.php';

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	if (isset($_GET['edit_post'])) {
		$get_id = $_GET['edit_post'];

		$query = "SELECT * FROM posts WHERE post_id='$get_id'";

		$result = mysqli_query($connection, $query);
		$i = 0;

		$row_post = mysqli_fetch_array($result);
		$post_id = $row_post['post_id'];
		$post_author = $row_post['post_author'];
		$post_title = $row_post['post_title'];
		$post_cat = $row_post['post_cat'];
		$post_tag = $row_post['post_tag'];
		$post_image = $row_post['post_image'];
		$post_content = $row_post['post_content'];
		$post_slug = $row_post['post_slug'];
		$image_desc = $row_post['image_desc'];
		$post_kw = $row_post['post_keywords'];
		$post_create = $row_post['created_at'];

		//Getting the categories
		$query_cats = "SELECT * FROM categories WHERE cat_id = '$post_cat'";

		$cat_result = mysqli_query($connection, $query_cats);
		$row_cat = mysqli_fetch_array($cat_result);
		$category_name = $row_cat['cat_name']; //Had  used ID AT first

		//Getting all the tags for the particualr post
		$query_tags = "SELECT * FROM tags WHERE tag_name = '$post_tag'";

		$tag_result = mysqli_query($connection, $query_tags);
		while ($row_tag = mysqli_fetch_array($tag_result));
		$tag_id = $row_tag['tag_id'];
		$tag_name = $row_tag['tag_name'];
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/main.css">

	<script src="js/select2.min.js"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

		<script type="text/javascript">
			tinymce.init({
				selector: 'textarea',
				plugins: 'link code image image',
				//toolbar: 'code image',
				//menubar: 'tools',
				//menubar: false
			});
		</script>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">

		<table class="table table-dark" width="900" border="">
			<tr align="center">
				<td colspan="8"><h2>Edit and Update Your Post Here</h2></td>
			</tr>
			<tr>
				<td align="right">Post Author: </td>
				<td><input type="text" name="post_author" autocomplete="On" size="60" value='<?php echo $post_author; ?>' required></td>
			</tr>
			<tr>
				<td align="right">Post Title: </td>
				<td><input type="text" name="post_title" autocomplete="On" size="60" value='<?php echo $post_title; ?>' required></td>
			</tr>
			<tr>
				<td align="right">Post Tag: </td>
				<td>
					<select name="post_tag">
						<option><?php echo $post_tag; ?></option>
					<?php

	$get_tag = 'SELECT * FROM tags';
	$run_tags = mysqli_query($connection, $get_tag);

	while ($row_tags = mysqli_fetch_array($run_tags)) {
		$tag_id = $row_tags['tag_id'];
		$tag_name = $row_tags['tag_name'];

		print "<option value='$tag_name'>$tag_name</option>";
	}
	?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Post Category: </td>
				<td>
					<select name="post_cat">
						<option><?php echo $post_cat; ?></option>
	<?php

	$get_cats = 'SELECT * FROM categories';
	$run_cats = mysqli_query($connection, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_name = $row_cats['cat_name'];

		echo "<option value='$cat_name'>$cat_name</option>";
	}

	?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Post Slug: </td>
				<td><input type="text" name="post_slug" placeholder="hello-world-i-am-a-slug-some-kind-of-url" autocomplete="On" size="60" value='<?php echo $post_slug; ?>' required></td>
			</tr>
			<tr>
				<td align="right">Post Image: </td>
				<td><input type="file" name="post_image"><img src="post_images/<?php echo $post_image; ?>" width="60" height="60"/></td>
			</tr>
			<tr>
				<td align="right">Image Description: </td>
				<td><input type="text" name="image_desc" size="60" value='<?php echo $image_desc; ?>' required></td>
			</tr>
			<tr>
				<td align="right">Post Content: </td>
				<td><textarea name="post_content" cols="50" rows="10"><?php echo $post_content; ?></textarea></td>
			</tr>
			<tr>
				<td align="right">Post Keywords: </td>
				<td><input type="text" name="post_keywords" autocomplete="On" size="60" value='<?php echo $post_kw; ?>' required></td>
			</tr>
			<tr align="center">
				<td colspan="8"><input type="submit" class="btn-primary btn-sm" name="update_post" value="Update Now"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php

	if (isset($_POST['update_post'])) {
		//Getting all the necessary post content.
		$update_id = $post_id;
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

		$update_post = "UPDATE posts SET post_author ='$post_author', post_title='$post_title', post_content='$post_content', post_tag='$post_tag', post_keywords='$post_kw', post_cat='$post_cat', post_image='$post_image', image_desc='$image_desc', post_slug='$post_slug' WHERE post_id ='$update_id'";

		$run_post = mysqli_query($connection, $update_post);

		if (isset($run_post)) {
			echo "<script>alert('Your post was successfully updated...')";
			echo "<script>window.open('index.php?view_posts', '_self')</script>";
		} else {
			echo "<script>alert('Post was not successful. Try again.')</script>";
			echo "<script>window.open('index.php?view_posts', '_self')</script>";
		}
	}

	?>

<?php }?>