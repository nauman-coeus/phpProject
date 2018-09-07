<?php

session_start();
require_once '../models/Sessions.php';
require_once '../models/Update.php';

if(!Sessions::getSession())
	header('location:login.php?err=Please Login');

if(!Sessions::getRestriction())
	header('location:markAttendance.php');


