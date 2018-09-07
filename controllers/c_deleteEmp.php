<?php

session_start();
require_once '../models/Sessions.php';
require_once '../models/Delete.php';
require_once '../models/Retrieve.php';

if(!Sessions::getSession())
	header('location:login.php?err=Please Login');

if(!Sessions::getRestriction())
	header('location:markAttendance.php');

if(!isset($_GET['emp_id']))
	header('location:../views/addEmployee.php?msg=! Error Deleting Employee');

$retrieve = new Retrieve();

if(!$retrieve->retrieveEmp())
	header('location:../views/addEmployee.php?msg=! Employee Doesnt Exists');

$delete = new Delete();
$delete->deleteEmp($_GET['emp_id']);