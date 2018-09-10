<?php

require_once 'Retrieve.php';
require_once 'Sessions.php';

class Create
{
	private $conn = null;
	private $msg = null;

	public function __construct()
	{
		$this->conn = DBConnection::connect();
	}

	public function __destruct()
	{
		$this->conn = null;
		$this->msg = null;
	}

	public function getMessage()
	{
		return $this->msg;
	}

	public function addTimeIn()
	{
		date_default_timezone_set("Asia/Karachi");
		$day = date('d-m-y');
		$time = date('H:i');
		
		$retrieve = new Retrieve();

		if(!$retrieve->timeIn($day)) {
			$id = Sessions::getSession();
			$status = null;
			
			if($time < '11:00')
				$status = 'P';
			else if($time < '12:00')
				$status = 'L';
			else
				$status = 'A';

			$sql = "INSERT INTO Attendance (emp_id, att_status, time_in, day)
					VALUES ($id, '$status', '$time', '$day');";

			if($this->conn->query($sql))
				$this->msg = "Time In SuccessFul";
			else
				$this->msg = "Time In Unsuccessful";

		} else {
			$this->msg = "You have already Enter your Time In";
		}
	}
}