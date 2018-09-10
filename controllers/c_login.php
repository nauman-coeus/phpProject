<?php

require_once '../models/Sessions.php';
require_once '../models/Retrieve.php';

if (!isset($_POST['loginForm'])){
	header('location:../views/login.php');
	die();
}

$usr_email = $_POST['usr_email'];
$usr_password = $_POST['usr_password'];

$retrieve = new Retrieve();
$result = $retrieve->loginCheck($usr_email, $usr_password)->fetch_assoc();

if($result) {
	Sessions::startSession($result['emp_id'], $result['desig_id']);
}

if(Sessions::getRestriction())
	header('location:../views/addEmployee.php');

if(Sessions::getSession())
	header('location:../views/markAttendance.php');

header("location:../views/login.php?msg=Wrong Email / Password");
