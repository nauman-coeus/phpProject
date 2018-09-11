<?php

require_once '../models/Retrieve.php';

date_default_timezone_set("Asia/Karachi");
$day = date('d-m-y');
$time = date('H:i');

$retrieve = new Retrieve();