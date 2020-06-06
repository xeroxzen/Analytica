<head>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap/css/bootstrap.min.css">
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"-->
	<link rel="stylesheet" href="../style/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
	<!--link rel='stylesheet' href="../style/css/error.css" type="text/css" media="all"-->

    <style type="text/css">
        span{
            margin-left: 10px;
            color: #f6783a;
            float: left;
        }
    </style>
</head>

<?php
//login file is carryinh the login credentials to the site
include_once 'login.php';

//error handling, the more complex way. There's a easier way but  I prefer this one
$conn = mysqli_connect($host, $username, $password, $db);
if ($conn->connect_error) {
	die($conn->connect_error);
}

//getting the categories output to the navbar. This has no limitv number meaning it retains all the cateegories in the db
//I might consider limiting it or rather removing News because everything is news and the news category is supposed
//to retrieve all posts to page, so making it dynamic is kind of a bummer.

function getAbout() {
	$data = array('created_by' => 'Andile Mbele', 'platform_name' => 'NewsNet', 'date_released' => 2019);

	echo $data['platform_name'];

}

function getCats() {
	global $conn;
	$get_cats = 'SELECT * FROM categories ORDER BY cat_id';
	$run_cats = mysqli_query($conn, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_name = $row_cats['cat_name'];

		echo "<li><a href='index.php?cat=$cat_name'>$cat_name</a></li>";
	}
}

//Retrieving all tags. Tags will be included in some sidebar probably in single post section or category reads
//Probably all will be retrieved with no set limitation
function getTags() {
	global $conn;
	$get_tag = 'SELECT * FROM tags ORDER BY RAND() LIMIT 0, 50';
	$run_tags = mysqli_query($conn, $get_tag);

	while ($row_tags = mysqli_fetch_array($run_tags)) {
		$tag_id = $row_tags['tag_id'];
		$tag_name = $row_tags['tag_name'];

		//echo "<option value='$tag_id'>$tag_name</option>";
		echo "
		<div class='widget'>
			<div class='tags'>
				<a href='index.php?tag=$tag_name'>$tag_name</a>
			</div>
		</div>

		";
	}
}
//Getting all Posts using the getCats Way. This is the index page and the News Category

function getPost() {
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['tag'])) {
			//Defining the number of posts required per page
			$results_per_page = 30;

			global $conn;
			global $cat_name;
			$get_posts = 'SELECT * FROM posts ORDER BY post_id DESC';
			$run_posts = mysqli_query($conn, $get_posts);
			$number_of_results = mysqli_num_rows($run_posts);

			$number_of_pages = ceil($number_of_results / $results_per_page);

			//determine current page number visited;
			if (!isset($_GET['page'])) {
				$page = 1;
			} else {
				$page = $_GET['page'];
			}

			//Determine the sql LIMIT
			$this_page_first_result = ($page - 1) * $results_per_page;

			//retrieve selected results for database and display them on page

			$sql = 'SELECT * FROM posts LIMIT ' . $this_page_first_result . ', ' . $results_per_page;
			$result = mysqli_query($conn, $sql);

			while ($row_posts = mysqli_fetch_array($result)) {
				$post_id = $row_posts['post_id'];
				$post_author = $row_posts['post_author'];
				$post_title = $row_posts['post_title'];
				$post_tag = $row_posts['post_tag'];
				$post_cat = $row_posts['post_cat'];
				$post_slug = $row_posts['post_slug'];
				$post_content = $row_posts['post_content'];
				$post_image = $row_posts['post_image'];
				$image_descr = $row_posts['image_desc'];
				$post_createdAt = $row_posts['created_at'];

				echo "
    <div id='single_post'>
        <a href='post.php?post_id=$post_id'>
            <img src='admin/post_images/$post_image' width='360' height='260' class='img/responsive'/>

            <h4 class='post_title'>$post_title</h4>

        <p class='post_info'><i class='fa fa-link'></i> <a href='post.php?post_id=$post_id'>$post_slug</a></p>
        </a>
    </div>

    ";

			}
			for ($page = 1; $page <= $number_of_pages; ++$page) {
				echo '
                    <div class="link">
                        <div class="link-2">
                            <a href="index.php?page=' . $page . '">' . $page . '</a>
                        </div>
                    </div>

				';
			}
		}
	}
}
//}

//End of getPosts function

//Beginninng of the getPostCat function. The The use of this function is to call Posts according to their categories
//i.e tech, business, travel etc

function getCatPost() {
	if (isset($_GET['cat'])) {
		$cat_name = $_GET['cat'];

		global $conn;
		$get_cat_posts = "SELECT * FROM posts WHERE post_cat ='$cat_name'";
		$run_cat_posts = mysqli_query($conn, $get_cat_posts);

		$count_cat = mysqli_num_rows($run_cat_posts);

		if ($count_cat == 0) {
			echo "<h2 style='text-align: center; color: red; font-weight: 400px; float: center;' class='header'>Sorry there are no posts for this category yet.</h2>";

			echo "

			<div class='container'>
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<div class='error-msg'>
					<h1 class='error-header'>404 Error</h1>
					<p>The page you're looking for was not found or is unavailable.</p>
					<a href='../index.php' class='btn btn-warning' >Back Home</a>
				</div>
			</div>
		</div>
	</div>

			";
			exit();
		}

		while ($row_cat_posts = mysqli_fetch_array($run_cat_posts)) {
			$post_id = $row_cat_posts['post_id'];
			$post_author = $row_cat_posts['post_author'];
			$post_title = $row_cat_posts['post_title'];
			$post_tag = $row_cat_posts['post_tag'];
			$post_cat = $row_cat_posts['post_cat'];
			$post_slug = $row_cat_posts['post_slug'];
			$post_content = $row_cat_posts['post_content'];
			$post_image = $row_cat_posts['post_image'];
			$image_descr = $row_cat_posts['image_desc'];
			$post_createdAt = $row_cat_posts['created_at'];

			echo "

			<div id='single_post'>
        <a href='post.php?post_id=$post_id'>
            <img src='admin/post_images/$post_image' width='460' height='450' class='img/responsive'/>

            <h3 class='post_title'>$post_title</h3>

        <p class='post_info'><i class='fa fa-link'></i> <a href='post.php?cat=$post_id'>$post_cat</a></p>
        </a>
    </div>

			";
		}
	}
}

//Beginninng of the getTagPost function. The The use of this function is to call Posts according to their categories
//Russia, United States, Art etc

function getTagPost() {
	if (isset($_GET['tag'])) {
		$tag_name = $_GET['tag'];

		global $conn;
		$get_tag_post = "SELECT * FROM posts WHERE post_tag ='$tag_name'";
		$run_tag_post = mysqli_query($conn, $get_tag_post);

		$count_tags = mysqli_num_rows($run_tag_post);

		if ($count_tags == 0) {
			//echo "<h2 style='text-align: center; color: red; font-weight: 400px; float: center;' class='header'>Sorry there are no posts for this tag yet.</h2>";

			echo "

			<div class='container'>
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<div class='error-msg'>
					<h1 class='error-header'>404 Error</h1>
					<p>The page you're looking for was not found or is unavailable.</p>
					<a href='../index.php' class='btn btn-warning' >Back Home</a>
				</div>
			</div>
		</div>
	</div>


			";
			exit();
		}

		while ($row_tag_posts = mysqli_fetch_array($run_tag_post)) {
			$post_id = $row_tag_posts['post_id'];
			$post_author = $row_tag_posts['post_author'];
			$post_title = $row_tag_posts['post_title'];
			$post_tag = $row_tag_posts['post_tag'];
			$post_cat = $row_tag_posts['post_cat'];
			$post_slug = $row_tag_posts['post_slug'];
			$post_content = $row_tag_posts['post_content'];
			$post_image = $row_tag_posts['post_image'];
			$image_descr = $row_tag_posts['image_desc'];
			$post_createdAt = $row_tag_posts['created_at'];

			echo "
			<div id='single_post'>
        <a href='post.php?post_id=$post_id'>
            <img src='admin/post_images/$post_image' width='460' height='450' class='img-responsive'/>

            <h3 class='post_title'>$post_title</h3>

        <p class='post_info'><i class='fa fa-link'></i> <a href='post.php?tag=$post_id'>$post_tag</a></p>
        </a>
    </div>

			";
		}
	}
}

//End of the getTagCat() Function

//End of the getPostCat() Function

//The Single Post function. This function should look like a blog section.
//It should be cool and awesome, and most importantly unique
//Thins to retain include:
/*
1. The post in full
2. Image on top 450 * 271px
3. Time posted on the left and author next to it
4. Sidebar on the left showing:
4.1 All Available tags
4.2 Recent Posts
4.3 Search Bar
5. Comment Section underneath
5.0 Comment Counter
5.1 Leave a Comment
5.2 Show Other reader's comments
5.3 Like button
5.4 Reply button
5.5 Include faces in the comments

function getSingle() {
global $conn;
$query = "SELECT * FROM posts WHERE post_slug='$cat_id'";
$results = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($results)) {
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_category = $row['post_cat'];
$post_tag = $row['post_tags'];

echo 'Ok';
}
}*/

function getCommentCount() {
	if (isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];

		global $conn;
		$query = "SELECT * FROM comments WHERE post_id='$post_id'";
		$results = mysqli_query($conn, $query);

		$comment_count = mysqli_num_rows($results);

		echo "<i class='fa fa-comments'> $comment_count Comments</i>";
	}
}

function getComments() {
	if (isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];

		global $conn;
		$query = "SELECT * FROM comments WHERE post_id='$post_id'";
		$results = mysqli_query($conn, $query);

		while ($row = mysqli_fetch_array($results)) {
			$comment_id = $row['id'];
			$commentor_name = $row['name'];
			$commentor_email = $row['email'];
			$comment_post_id = $row['post_id'];
			$comment_content = $row['comment'];
			$comment_creation = $row['created_at'];

			echo "

    <ul class='comment-list'>
        <li>
            <div class='comment'>
                <img src='../img/faces/card-profile4-square.jpg' class='author-image' class='comment-avator'>
                <div class='comment-content'>
                    <h5>$commentor_name</h5>
                    <span class='c-date'>" . date('d F, Y - g:ia', strtotime($comment_creation)) . "</span><br><br>
                    <p>$comment_content</p>
                    <a href='' class='c-btn'>Like</a>
                    <a href='' class='c-btn'>Reply</a>
                </div>
            </div>
        </li>
    </ul>

            ";
		}
	}
}

//<img src='https://www.gravatar.com/avatar/' . md5(strtolower(trim($commentor_email))) .'?s=50&d=mm' }}' class='author-image'>

function getSidebarRecents() {
	// if (isset($_GET['post_slug'])) {
	//   $post_url = $_GET['post_slug'];

	global $conn;
	$query = 'SELECT * FROM posts ORDER BY post_id DESC LIMIT 0, 10';
	$results = mysqli_query($conn, $query);

	while ($row_recents = mysqli_fetch_array($results)) {
		$post_title = $row_recents['post_title'];
		$post_createdAt = $row_recents['created_at'];
		$post_id = $row_recents['post_id'];
		$post_author = $row_recents['post_author'];
		$post_tag = $row_recents['post_tag'];
		$post_cat = $row_recents['post_cat'];
		$post_image = $row_recents['post_image'];
		$image_desc = $row_recents['image_desc'];
		$post_kw = $row_recents['post_keywords'];
		$post_url = $row_recents['post_slug'];

		echo "<li style='disc'>
                <a href='post.php?post_id=$post_id'>$post_title</a>
                <span><i class='fa fa-user '></i> $post_author</span>
                <span><i class='fa fa-clock-o '></i>" . date('d F, Y', strtotime($post_createdAt)) . '</span><br>

            </li>';
	}
}
