<?php

session_start();
require_once '../models/Sessions.php';
require_once '../models/Update.php';
require_once '../models/Create.php';

if(!Sessions::getSession())
	header('location:login.php?err=Please Login');

if(!isset($_GET['time_in']) && !isset($_GET['time_out'])) {
	header('location:../views/markAttendance.php?msg=Please Mark Attendance');
} 
else if(isset($_GET['time_in'])) {
	$create = new Create();
	$create->addTimeIn();
	$msg = $create->getMessage();

	if($msg)
		header("location:../views/markAttendance.php?msg=$msg");
	else
		header('location:../views/markAttendance.php?msg=Attendance Marked&time_in=working');
}
else {
	$update = new Update();
	$update->addTimeOut();
	$msg = $update->getMessage();

	if($msg)
		header("location:../views/markAttendance.php?msg=$msg");
	else
		header('location:../views/markAttendance.php?msg=Attendance Marked&time_out=working');
}