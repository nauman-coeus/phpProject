<?php
	session_start();
	require_once '../models/Sessions.php';
	require_once '../models/Retrieve.php';

	if(!Sessions::getSession())
		header('location:login.php?err=Please Login');

	if(!Sessions::getRestriction())
		header('location:markAttendance.php');

	$retrieve = new Retrieve();
	$emp = $retrieve->retrieveEmployees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HR | Employees List</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<section class="row text-center">
			<header>
				<h1>Employee's List</h1>
			</header>
		</section>
		<div class="row">
			<div class="col-40 sideBar">
				<ul>
					<li><a href="addEmployee.php">Add Employee</a></li>
					<li class="selected"><a href="#">Employee's List</a></li>
					<li><a href="dailyAttendance.php">Today's Attendance</a></li>
					<li><a href="../controllers/c_logout.php" id="logoutBtn">LogOut</a></li>
				</ul>
			</div>

			<div class="col-60">
				<table>
					<tbody>
					<?foreach($emp as $key):?>
						<tr>
							<td><?=$key['emp_name']?></td>
							<td><a href="editEmployee.php?emp_id=<?=$key['emp_id']?>">Edit</a></td>
							<td><a href="../controllers/c_deleteEmp.php?emp_id=<?=$key['emp_id']?>">Delete</a></td>
						</tr>
					<?endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>