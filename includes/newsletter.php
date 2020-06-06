<head>
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../style/css/main.css">
</head>

<section class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-7">
					<div class="section-title mb-md-0">
						<h3>NEWSLETTER</h3>
						<p>Subscribe and get the latest news and useful tips, advice and best offer.</p>
					</div>
				</div>
				<div class="col-md-7 col-lg-5">
					<form action="" method="POST" enctype="multipart/form-data" class="newsletter" name="sub_form" onsubmit="return validateSubscr()">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Enter your name">
							<input type="email" class="form-control" name="email" placeholder="Enter your email">
						</div>

						<button type="submit" class="site-btn" name="subscribe">SUBSCRIBE</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php

include 'admin/includes/db.php';

if (isset($_POST['subscribe'])) {
	//Posting to the db;

	$sub_name = $_POST['name'];
	$sub_email = $_POST['email'];

	$newsletter = "INSERT INTO newsletters(username, email) VALUES('$sub_name', '$sub_email')";

	$newsletter_received = mysqli_query($connection, $newsletter);

	if (isset($newsletter_received)) {
		echo "


			 <div class='alert alert-success' role='alert'style='margin-top: -30px;'>
 	             <strong>Success:</strong> Newsletter Subscriprion sent
             </div>


		";

	} else {
		echo "

				 <div class='alert alert-success' role='alert'style='margin-top: -30px;'>
                     <strong>Warning:</strong> Newsletter Subscription not sent.
                 </div>

		";
	}
}
?>