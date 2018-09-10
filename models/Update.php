<?php

require_once 'DBConnection.php';
require_once 'Retrieve.php';
require_once 'Sessions.php';

class Update
{
	private $conn;
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

	public function updateEmp($emp_id)
	{
		echo $emp_id;
	}

	public function addTimeout()
	{
		date_default_timezone_set("Asia/Karachi");
		$day = date('d-m-y');
		$time = date('H:i');

		$retrieve = new Retrieve();

		if($retrieve->timeOut($day)) {
			$id = Sessions::getSession();

			$sql = "UPDATE Attendance
					SET  time_out = '$time'
					WHERE emp_id = $id  AND day = '$day' AND time_out IS NULL;";

			if($this->conn->query($sql))
				$this->msg = "Time Out Successful";
			else
				$this->msg = "Time Out Unsuccessful";
		} else {
			$this->msg = "You have Already Time Out";
		}
	}
}