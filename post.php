<?php
include_once 'login.php';
include_once 'functions/function.php';
?>

<!DOCTYPE html>
<html lang='en-US'>
<head>
    <title>NewsNet</title>

    <meta charset="UTF-8">
    <meta name="description" content="NewsNet">
    <meta name="keywords" content="andile, newsnet, News Net, news, Africa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon"/>
    <!--link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"-->

    <link rel="stylesheet" type="text/css" href="style/css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/themify-icons.css"/>

    <style type="text/css">
.site-breadcrumb {
    padding: 60px 0;
    color: #b7b7b7;
    font-size: 18px;
    }

    @media only screen and (min-width: 100px) and (max-width: 1300px){
        .site-breadcrumb{
            font-size: 90%;
        }
    }

.site-breadcrumb a {
    color: #111111;
    text-decoration: none;
    }
    .site-breadcrumb a:hover{
        font-weight: bolder;
        color: #ee3e83;
    }

.site-breadcrumb a i {
    margin: 0;

    }

.site-breadcrumb i {
    margin: 0 10px;
    }

    </style>
</head>

<body>
    <div class='container-fluid'>
        <?php include 'includes/navbar.php';?>

    <div class='col-md-12 col-offset-2'>
        <div class="sidebar">
            <div class="sidebar_title">Recent Post</div>
            <hr>
            <ul id ="recents">
                <?php getSidebarRecents();?>
            </ul>

            <h4 class="widget-title" style="color: #ee3e80;">Tags</h4>
            <hr>
            <?php getTags();?>
        </div>
            <div id="col-md-8 col-offset-2"> <!--Originally: content_area-->

<?php

if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
	$get_posts = "SELECT * FROM posts WHERE post_id='$post_id'";
	$run_posts = mysqli_query($conn, $get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$post_author = $row_posts['post_author'];
		$post_title = $row_posts['post_title'];
		$post_tag = $row_posts['post_tag'];
		$post_cat = $row_posts['post_cat'];
		$post_slug = $row_posts['post_slug'];
		$post_content = $row_posts['post_content'];
		$post_image = $row_posts['post_image'];
		$image_descr = $row_posts['image_desc'];
		$post_kw = $row_posts['post_keywords'];
		$post_createdAt = $row_posts['created_at'];

		echo "
<div class='post-item post-details'>
    <div class='site-breadcrumb'>
        <a href='index.php'><i class='fa fa-home'></i> Home</a> <i class='fa fa-angle-right'></i> Reading $post_title
    </div>
    <img src='admin/post_images/$post_image' class='post-thumb-full' alt='A Image goes here'>
        <div class='post-content'>
            <h4 class='post-title'>$post_title</h4>
            <div class='post-meta'>
                <span><i class='fa fa-clock-o'></i> $post_createdAt</span>
                <span><i class='fa fa-user'></i> $post_author</span>
            </div><br>
            <hr>
            <p>$post_content</p>

            <blockquote>
                <span class='tag'>Post Keywords: <i class='fa fa-hand-o-right'></i> $post_kw</span>
                <span class='tag'>Tag: <i class='fa fa-tag'></i>$post_tag</span>
            </blockquote>
        </div>
</div>

    ";
	}
}

?>
            </div>
    </div>
        <div class="comment-warp">
        <h4 class="comment-title"><?php getCommentCount();?></h4>

                    <?php getComments();?>
    </div>

<!--Here goes the comment form-->
<div class="row">
<div class="comment-form-warp">
    <div class="col-md-6 col-md-offset-2">
    <h3 class="comment-title" style="color: #ee3e80;"><i class="fa fa-comments "> Leave Your Comment</i></h3><br>

<form action="" method="POST" enctype="multipart/form-data" name="comment_form" onsubmit="return formValidation()">
    <div class="form-group">
        <label for="exampleInputEmail1" style="color: #ee3e80;"><i class="fa fa-user "></i> Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" required="required" aria-describedby=><small id="nameHelp" class="form-text text-muted">*Required</small>
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1" style="color: #ee3e80;"><i class="fa fa-envelope "></i> Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required="required" aria-describedby=><small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone</small>
    </div>

    <div class="form-group">
        <label for="comment" style="color: #ee3e80;"><i class="fa fa-comment "></i> Comment</label>
        <textarea class="form-control" rows="10" cols="30" placeholder="Your comment goes here" name="comment_body"></textarea>
    </div>

    <button type="submit" name="insert_comment" class="btn btn-primary">Send Comment</button>
</form>
</div>
</div>
</div>
<!--Form section ends here-->


        <?php
include 'includes/newsletter.php';
include_once 'includes/footer.php';
?>
</div>
<script src="js/interact.js"></script>
<script src="style/bootstrap/js/bootstrap.min.js"></script>

<!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->
</body>
</html>

<?php

include 'admin/includes/db.php';

if (isset($_POST['insert_comment'])) {
	if (isset($_GET['post_id'])) {
		$comment_post_id = $_GET['post_id'];
		//Getting all the necessary comment content.
		$comment_author = $_POST['name'];
		$author_email = $_POST['email'];
		$comment_body = $_POST['comment_body'];
		//$comment_post_id = $_POST['post_id'];

		//posting to the database

		$insert_comment = "INSERT INTO comments(name, email, comment, post_id) VALUES('$comment_author', '$author_email', '$comment_body', '$comment_post_id')";

		$comment_insert = mysqli_query($connection, $insert_comment);

		if (isset($comment_insert)) {
			echo "
                     <div class='alert alert-success' role='alert'style='margin-top: -30px;'>
                        <strong>Success:</strong> Comment was successful
                    </div>
                ";
		} else {
			echo "

                    div class='alert alert-warning' role='alert'>
                        <strong>Warning:</strong> Comment was not successful
                    </div>
                ";
		}
	}
}

?>