<?php

require_once '../models/Sessions.php';

session_start();
Sessions::logoutUser();

header('location:../views/login.php');
