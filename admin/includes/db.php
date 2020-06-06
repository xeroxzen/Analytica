<?php

$connection = mysqli_connect('localhost', 'Andile', '2019', 'newsnet');
//$dbc = @mysqli_connect(DB_USER, DB_HOST, DB_PASSWORD, DB_NAME) or die('Could not connect to Mysql: ' . mysqli_connect_error());

if (mysqli_connect_errno()) {
	echo 'Failed to connect to MySQL: ' . mysqli_connect_errno();
}
