<?php
	session_start();
	require_once '../models/Sessions.php';

	if(!Sessions::getSession())
		header('location:login.php?err=Please Login');

	if(!Sessions::getRestriction())
		header('location:markAttendance.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HR | Daily Attendance</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<section class="row text-center">
			<header>
				<h1>Daily Attendance</h1>
			</header>
		</section>
		<div class="row">
			<div class="col-40 sideBar">
				<ul>
					<li><a href="addEmployee.php">Add Employee</a></li>
					<li><a href="employeeList.php">Employee's List</a></li>
					<li class="selected"><a href="#">Today's Attendance</a></li>
					<li><a href="../controllers/c_logout.php" id="logoutBtn">LogOut</a></li>
				</ul>
			</div>

			<div class="col-60">
				<table>
					<tbody>
						<tr>
							<td>Nauman</td>
							<td>A</td>
						</tr>
						<tr>
							<td>Nauman</td>
							<td>A</td>
						</tr>
						<tr>
							<td>Nauman</td>
							<td>A</td>
						</tr>
						<tr>
							<td>Nauman</td>
							<td>A</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>