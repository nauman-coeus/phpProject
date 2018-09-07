<?php
	session_start();
	require_once '../models/Sessions.php';

	if(!Sessions::getSession())
		header('location:login.php?err=Please Login');

	if(!Sessions::getRestriction())
		header('location:markAttendance.php');

	if(!isset($_GET['emp_id']))
		header('location:employeeList.php?msg=Enter Employee Id');

	$_GET['emp_id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HR | Edit Employee</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<section class="row text-center">
			<header>
				<h1>Edit Employee</h1>
			</header>
		</section>

		<div class="row">
			<div class="col-20">&nbsp;</div>
			<div class="col-60">
				<div class="row">
					<h3>Name</h3>
					<input type="text">
				</div>
				<div class="row">
					<h3>Email</h3>
					<input type="email">
				</div>
				<div class="row">
					<h3>Department</h3>
					<select>
						<option>-- Select --</option>
						<option>Associate Software Engineer</option>
						<option>Software Engineer</option>
						<option>Senior Software Engineer</option>
					</select>
				</div>
				<div class="row">
					<h3>Salary</h3>
					<input type="number" min="20000">
				</div>
				<div class="row">
					<h3>Profile Picture</h3>
					<input type="password">
				</div>
				<div class="row">
					<h3>Boss</h3>
					<select>
						<option>-- Select --</option>
					</select>
				</div>
				<div class="row">
					<h3>Designation:</h3>
					<select>
						<option>-- Select --</option>
					</select>
				</div>
				<hr><br><br>

				<div class="row">
					<input type="submit" value="Edit Employee">
					<a href="editEmployee.php"><button>Cancel</button></a>
				</div>
			</div>
			<div class="col-20">&nbsp;</div>
		</div>
	</div>
</body>
</html>