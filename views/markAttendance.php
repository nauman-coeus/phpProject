<?php
	session_start();
	require_once '../models/Sessions.php';

	if(!Sessions::getSession())
		header('location:login.php?err=Please Login');

	if(Sessions::getRestriction())
		header('location:addEmployee.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mark Attendance</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<section class="container">
		<header class="row text-center">
			<h1>Mark Attendance</h1>
		</header>
	</section>

	<div class="row">
		<div class="col-40">&nbsp</div>
		<div class="col-20 blackBox">
			<div class="row">
				<input type="submit" value="Mark Time In" class="orangeBtn">
				<br><br>
				<h3>Time In :</h3>
			</div>
			<hr>
			<div class="row">
				<input type="submit" value="Mark Time Out" class="orangeBtn">
				<br><br>
				<h3>Time Out :</h3>
			</div>
			<hr>
			<div class="row">
				<a href="../controllers/c_logout.php" id="logoutBtn">Logout</a>
			</div>
		</div>
		<div class="col-40">&nbsp</div>
	</div>
</body>
</html>