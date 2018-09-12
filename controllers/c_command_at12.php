<?php

require_once '../models/Retrieve.php';

date_default_timezone_set("Asia/Karachi");
$day = date('d-m-y');

$retrieve = new Retrieve();
$result = $retrieve->unMarked($day);

$body = "I tried to convince the following users to mark their attendance but looks like the dont wana. Screw them, Better do something about them >_< \n";


foreach($result as $key)
	$body .= $key['emp_name'] . "<br>";

$body .= "\n\nSincerely, \nCron Job Linux.";
mail("hr@coeus.de", "Attendance Not Marked", $body);