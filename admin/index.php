<?php
session_start();

if (!isset($_SESSION['user_email'])) {
	echo "<script>window.open('login.php?not_admin=You need to log in for Administrative privileges!', '_self')</script>";
} else {

	if (isset($_GET['username'])) {
		$username = $_GET['username'];

		$query = "SELECT * FROM admins WHERE username='$username'";
		$result = mysqli_query($connection, $query);

		$row_admins = mysqli_fetch_array($result);
		$admin_name = $row_admins['username'];
	}
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

	<meta charset="UTF-8">
    <meta name="description" content="NewsNet">
    <meta name="keywords" content="andile, newsnet, News Net, news, Africa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/bootstrap.min.css" media='all'>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">

    <style type="text/css">
    	.#right span{
    		margin-right: 8px;
    		color: #ee3e80;
    	}
    	#right i{
    		margin-right: 8px;
    		color: #ee3e80;
    	}
    </style>
</head>
<body>
	<div class="main_wrapper">
		<div id="header">
			<h2 id='admin_header'>The Admin Panel</h2>
		</div>
		<div id="right">
			<h3 style="text-align: center; overflow: hidden;"><i class="fa fa-user "></i><?php print $_SESSION['user_email'];?></h3>
			<a href="index.php"><h6 style="text-align: center; color: cyan;"><i class="fa fa-dashboard "></i>Dashboard</h6></a>
			<hr>
			<?php
if (isset($GET['active'])) {
		# code...
		#This code is for the active entry
		#should probably fetch it by class
		#TASK: How to link a CSS class to a PHP GET function
	}
	?>
				<a href="index.php"><i class="fa fa-home "></i>Home</a>
				<a href="index.php?insert_post"><i class="ti ti-thought"></i>Insert New Post</a>
				<a href="index.php?view_posts"><i class="fa fa-spinner"></i>All Posts</a>
				<a href="index.php?insert_tag"><i class="fa fa-tag"></i>Insert New Tag</a>
				<a href="index.php?view_tags"><i class="fa fa-tag "></i>All Tags</a>
				<a href="index.php?insert_cat"><i class="fa fa-book"></i>Insert New Category</a>
				<a href="index.php?view_cats"><i class="fa fa-archive"></i>All Categories</a>
				<a href="index.php?view_comments"><i class="ti ti-comment-alt "></i>All Comments</a>
				<a href="index.php?view_readers"><i class="fa fa-user "></i>Visitors</a>
				<a href="index.php?view_authors"><i class="fa fa-envelope-o"></i>Authors</a>
				<a href="index.php?view_subscribers"><i class="fa fa-envelope"></i>Newsletter Subcribers</a>
				<a href="index.php?view_admins"><i class="fa fa-users"></i>Admins</a>
				<a href="index.php?insert_admin"><i class="fa fa-users"></i>Add Admin</a>
				<a href="logout.php"><i class="fa fa-lock "></i>Admin Logout</a>
		</div>
		<div id="left">
			<div>
			<h5 style ="color: green; text-align: center;"><?php echo @$_GET['logged_in']; ?></h5>
		</div>
<?php
if (isset($_GET['insert_post'])) {
		include 'insert_post.php';
	}

	if (isset($_GET['view_posts'])) {
		include 'view_posts.php';
	}
	if (isset($_GET['edit_post'])) {
		include 'edit_post.php';
	}
	if (isset($_GET['delete_post'])) {
		include 'delete_post.php';
	}
	if (isset($_GET['insert_cat'])) {
		include 'insert_cat.php';
	}
	if (isset($_GET['insert_tag'])) {
		include 'insert_tag.php';
	}
	if (isset($_GET['view_cats'])) {
		include 'view_cats.php';
	}
	if (isset($_GET['view_tags'])) {
		include 'view_tags.php';
	}
	if (isset($_GET['delete_cat'])) {
		include 'delete_cat.php';
	}
	if (isset($_GET['delete_tag'])) {
		include 'delete_tag.php';
	}
	if (isset($_GET['edit_cat'])) {
		include 'edit_cat.php';
	}
	if (isset($_GET['edit_tag'])) {
		include 'edit_tag.php';
	}
	if (isset($_GET['view_comments'])) {
		include 'view_comments.php';
	}
	if (isset($_GET['delete_comment'])) {
		include 'delete_comment.php';
	}
	if (isset($_GET['edit_comment'])) {
		include 'edit_comment.php';
	}
	if (isset($_GET['view_authors'])) {
		include 'view_authors.php';
	}
	if (isset($_GET['view_subscribers'])) {
		include 'view_subscribers.php';
	}
	if (isset($_GET['view_admins'])) {
		include 'view_admins.php';
	}
	if (isset($_GET['insert_admin'])) {
		include 'insert_admin.php';
	}
	if (isset($_GET['edit_admins'])) {
		include 'edit_admin.php';
	}
	if (isset($_GET['delete_admin'])) {
		include 'delete_admin.php';
	}?>
		</div>
	</div>
</body>
</html>

<?php
}
?>