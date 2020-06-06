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
    <title>View All Subscribers Here</title>

    <!--<link rel="stylesheet" href="style/bootstrap.min.css"-->
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<table width="1000" align="center" class="table table-striped table-dark">
    <tr align='center'>
        <td colspan='10'><h2>View All Newsletters Subscribers Here</h2></td>
    </tr>

    <tr align='' border='' bgcolor='purple'>
        <th>Counter</th>
        <th>Subscriber ID </th>
        <th>Subscriber Name</th>
        <th>Subscriber Email</th>
        <th>Email Subscriber</th>
    </tr>

    <?php

	include 'includes/db.php';

	global $connection;
	$query = 'SELECT * FROM newsletters';

	$result = mysqli_query($connection, $query);
	$i = 0;

	while ($row_subscr = mysqli_fetch_array($result)) {
		$subscriber_id = $row_subscr['user_id'];
		$name = $row_subscr['username'];
		$email = $row_subscr['email'];
		++$i;?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $subscriber_id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><a href="index.php?email_subscriber=<?php mail('$email', "Thank you note", 'Thank you for subscribing for our newsletters');?>" class="btn btn-sm btn-primary">Email</a></td>
    </tr>

    <?php
}
	?>
<?php }?>
</table>

</body>
</html>
