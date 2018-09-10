<?php

session_start();

require_once '../models/Create.php';

if(!Sessions::getSession())
	header('location:login.php?err=Please Login');

if(!Sessions::getRestriction())
	header('location:markAttendance.php');

$create = new Create();
$create->createEmp();
$msg = $create->getMessage();
header("location:../views/addEmployee.php?msg=$msg");
