<?php
function getBusiness() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="business"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_biz_id = $row['post_id'];
		$post_biz_tag = $row['post_tag'];
		$post_biz_image = $row['post_image'];
		$post_biz_img_desc = $row['image_desc'];
		$post_biz_url = $row['post_slug'];

		echo 'OK';
	}
}

function getTechScience() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="Science & Technology"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_SnT_id = $row['post_id'];
		$post_SnT_tag = $row['post_tag'];
		$post_SnT_title = $row['post_title'];
		$post_SnT_image = $row['post_image'];
		$post_SnT_img_desc = $row['image_desc'];
		$post_SnT_url = $row['post_slug'];

		echo "
<div id='post_single'>
    <h3 class='post_title'>$post_SnT_title</h3>
    <img src='admin/post_images/$post_SnT_image' width='380' height='280' class='img/responsive' />
    <p style='font-family: lotus; font-style: italic;text-align: left;margin-bottom:20px;'>$post_SnT_img_descr</p><p style='font-size: 12px; color: red; text-align: left;'><span><i class='fa fa-user'></i>$post_SnT_author</span><span><i class='fa fa-calendar-o'></i></span></p>

    <p></p>
    <a href='single.php?$post_SnT_url' style='float: center;'><button class='btn btn-primary'>Read More</button></a>

</div>";
	}
}

function getWorldNews() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="World Politics"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_wn_id = $row['post_id'];
		$post_wn_tag = $row['post_tag'];
		$post_wn_image = $row['post_image'];
		$post_wn_img_desc = $row['image_desc'];
		$post_wn_url = $row['post_slug'];

		echo 'OK';
	}
}

function getCulture_Env() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="Culture & Environment"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_env_id = $row['post_id'];
		$post_env_tag = $row['post_tag'];
		$post_env_image = $row['post_image'];
		$post_env_img_desc = $row['image_desc'];
		$post_env_url = $row['post_slug'];

		echo 'OK';
	}
}

function getEntertainment() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="Entertainment"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_ent_id = $row['post_id'];
		$post_ent_tag = $row['post_tag'];
		$post_ent_image = $row['post_image'];
		$post_ent_img_desc = $row['image_desc'];
		$post_ent_url = $row['post_slug'];

		echo 'OK';
	}
}

function getLocalNews() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="Local News"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_local_id = $row['post_id'];
		$post_local_tag = $row['post_tag'];
		$post_local_image = $row['post_image'];
		$post_local_img_desc = $row['image_desc'];
		$post_local_url = $row['post_slug'];

		echo 'OK';
	}
}

function getTravel() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="Travel"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_travel_id = $row['post_id'];
		$post_travel_tag = $row['post_tag'];
		$post_travel_image = $row['post_image'];
		$post_travel_img_desc = $row['image_desc'];
		$post_travel_url = $row['post_slug'];

		echo 'OK';
	}
}

function getMoney() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="money"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_money_id = $row['post_id'];
		$post_money_tag = $row['post_tag'];
		$post_money_image = $row['post_image'];
		$post_money_img_desc = $row['image_desc'];
		$post_money_url = $row['post_slug'];

		echo 'OK';
	}
}

function getSports() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="sports"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_sports_id = $row['post_id'];
		$post_sports_tag = $row['post_tag'];
		$post_sports_image = $row['post_image'];
		$post_sports_img_desc = $row['image_desc'];
		$post_sports_url = $row['post_slug'];

		echo 'OK';
	}
}
function getOpinion() {
	global $conn;

	$query = 'SELECT * FROM posts WHERE post_cat="opinion"';
	$results = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($results)) {
		$post_op_id = $row['post_id'];
		$post_op_tag = $row['post_tag'];
		$post_op_image = $row['post_image'];
		$post_op_img_desc = $row['image_desc'];
		$post_op_url = $row['post_slug'];

		echo 'OK';
	}
}

?>


 ?>

 //$number_of_results = mysqli_num_rows($run_posts);

//determine the total number of available pages
//$number_of_pages = ceil($number_of_results / $results_per_page);

//Determine the page  number the  visitor is currently on

/*if (!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = $_GET['page'];
*/

//determine the sql LIMIT starting number for the results on the displaying page

//$this_page_first_result = ($page - 1) * $results_per_page;

//retrieve selected results from database and display them on page
//$sql = 'SELECT * FROM posts LIMIT ' . $this_page_first_result . ',' . $results_per_page;
//$results = mysqli_query($conn, $sql);

//display the links to the page
            /*for ($page = 1; $page <= $number_of_pages; ++$page) {
                    echo '
                <div id="post_single">
                    <div class="pagination">
                        <div class="pagination-sm">
                           <div class="page-link">
                               <a href="index.php?page=' . $page . '">' . $page . '</a>
                           </div>
                        </div>
                    </div>
                </div>'
                    ;
*/

/*while ($row_posts = mysqli_fetch_array($run_posts)) {
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

                            <h3 class='post_title'>$post_title</h3>

                        <p class='post_info'><i class='fa fa-link'></i> <a href='index.php?post_slug=$post_slug'>$post_cat</a></p>
                        </a>
                    </div>

            */
            //<p class='post_info'><span>$post_author</span> <strong>||</strong> <span><b>$post_createdAt</b></span></p>

