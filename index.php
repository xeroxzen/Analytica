<?php
include_once 'login.php';
include_once 'functions/function.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<title><?php print 'NewsNet'?></title>

	<meta charset="UTF-8">
	<meta name="description" content="NewsNet">
	<meta name="keywords" content="andile, newsnet, News Net, news, Africa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Favicon -->
	<link href="img/favicon.png" rel="shortcut icon"/>
	<link rel="stylesheet" type="text/css" href="style/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="style/css/main.css" media="all">
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
</head>

<body>
	<?php include 'includes/navbar.php';?>
<div class="container-fluid">
	<div class="col-md-12 col-offset-2">
		<?php getPost();?>
		<?php getCatPost();?>
		<?php getTagPost();?>

	</div>
</div>

		<?php include_once 'includes/footer.php';?>
<script src="js/interact.js"></script>
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.backtotop.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>