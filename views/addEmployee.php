<?php
	session_start();
	require_once '../models/Sessions.php';
	require_once '../models/Retrieve.php';

	if(!Sessions::getSession())
		header('location:login.php?err=Please Login');

	if(!Sessions::getRestriction())
		header('location:markAttendance.php');

	$retireve = new Retrieve();

	$desig = $retireve->retrieveDesignations();
	$dept = $retireve->retrieveDepartments();
	$emp = $retireve->retrieveManagers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HR | Add Employee</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<section class="row text-center">
			<header>
				<h1>Add Employee</h1>
			</header>
		</section>
		<div class="row">
			<div class="col-40 sideBar">
				<ul>
					<li class="selected"><a href="#">Add Employee</a></li>
					<li><a href="employeeList.php">Employee's List</a></li>
					<li><a href="dailyAttendance.php">Today's Attendance</a></li>
					<li><a href="../controllers/c_logout.php" id="logoutBtn">LogOut</a></li>
				</ul>
			</div>

			<div class="col-60">
				<div class="row">
					<h3>Name</h3>
					<input type="text">
				</div>
				<div class="row">
					<h3>Email</h3>
					<input type="edit">
				</div>
				<div class="row">
					<h3>Department</h3>
					<select name="emp_dept">
						<?php 
							foreach ($dept as $key) {
								echo '<option value="'. $key['dept_id'] .'">'. $key['dept_name'] .'</option>';
							}
						?>
					</select>
				</div>
				<div class="row">
					<h3>Salary</h3>
					<input type="number">
				</div>
				<div class="row">
					<h3>Profile Picture</h3>
					<input type="password">
				</div>
				<div class="row">
					<h3>Boss</h3>
					<select>
						<?php 
							foreach ($emp as $key) {
								echo '<option value="'. $key['emp_id'] .'">'. $key['emp_name'] .'</option>';
							}
						?>
					</select>
				</div>
				<div class="row">
					<h3>Designation:</h3>
					<select name="emp_desig">
						<?php 
							foreach ($desig as $key) {
								echo '<option value="'. $key['desig_id'] .'">'. $key['desig_name'] .'</option>';
							}
						?>
					</select>
				</div>
				<hr><br><br>

				<div class="row">
					<input type="submit" value="Add Employee">
				</div>
			</div>
		</div>
	</div>
</body>
</html>