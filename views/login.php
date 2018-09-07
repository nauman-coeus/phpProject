<?php
	session_start();
	require_once '../models/Sessions.php';

	if(Sessions::getSession() && Sessions::getRestriction())
		header('location:addEmployee.php');
	
	if(Sessions::getSession())
		header('location:markAttendance.php');

	$err = '';

	if(isset($_GET['msg']))
		$err = $_GET['msg'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Attendance | Login</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<section class="row">
			<header class="text-center">
				<h1>Attendance Login Page</h1>
			</header>
		</section>

		<div class="row">
			<div class="col-40">&nbsp</div>
			<div class="col-20 blackBox">
				<form action="../controllers/c_login.php" method="POST">
					<div class="row">
						<h3>Email</h3>	
						<input type="text" name="usr_email" required="required">
					</div>
					<div class="row">
						<h3>Password</h3>	
						<input type="password" name="usr_password" required="required">
					</div>
					<div class="row">
						<h5 class="error text-center"><?=$err;?></h5>	
					</div>
					<div class="row">
						<input type="submit" value="Login" class="orangeBtn" name="loginForm">
					</div>
				</form>
			</div>
			<div class="col-40">&nbsp</div>
		</div>
	</div>
</body>
</html>