<?php

require_once '../models/Login.php';
require_once '../models/Sessions.php';
require_once '../models/Validation.php';

if (!isset($_POST['loginForm'])){
	header('location:../views/login.php');
	die();
}

$usr_email = $_POST['usr_email'];
$usr_password = $_POST['usr_password'];

$login = new Login($usr_email, $usr_password);
$result = $login->loginUser()->fetch_assoc();

if(!$result) {
	header('location:../views/login.php?msg=Wrong Username / Password');
	echo "Please Redirect to Login Page";
	die();
}

Sessions::startSession($result['desig_name']);

if(Sessions::getRestriction()) {
	header('location:../views/addEmployee.php');
	die();
} else {
	header('location:../views/markAttendance.php');
	die();
}