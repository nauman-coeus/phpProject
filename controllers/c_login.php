<?php

require_once '../models/Login.php';
require_once '../models/Sessions.php';

if (!isset($_POST['loginForm'])){
	header('location:../views/login.php');
	die();
}

$usr_email = $_POST['usr_email'];
$usr_password = $_POST['usr_password'];

Login::loginUser($usr_email, $usr_password);

if(Sessions::getRestriction()) {
	header('location:../views/addEmployee.php');
	die();
}

if(Sessions::getSession()) {
	header('location:../views/markAttendance.php');
	die();
}

header('location:../views/login.php?msg=Wrong Email / Password');