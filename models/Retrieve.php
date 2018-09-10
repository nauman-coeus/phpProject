<?php

require_once 'DBConnection.php';
require_once 'Sessions.php';

class Retrieve
{
	private static $conn = null;

	public function __construct()
	{
		self::$conn = DBConnection::connect();
	}

	public function retrieveDesignations()
	{
		$sql = "SELECT * FROM `Designation`";
		return self::$conn->query($sql);
	}

	public function retrieveDepartments()
	{
		$sql = "SELECT * FROM `Department`";
		return self::$conn->query($sql);
	}

	public function retrieveManagers()
	{
		$sql = "SELECT * FROM Employees WHERE desig_id = 2";
		return self::$conn->query($sql);
	}

	public function retrieveEmp($emp_id = null)
	{
		$sql = '';

		if($emp_id)
			$sql = "SELECT * FROM Employees WHERE emp_id = $emp_id;";
		else
			$sql = "SELECT emp_id, emp_name FROM `Employees`";

		return self::$conn->query($sql);
	}

	public function timeIn($day)
	{
		$id = Sessions::getSession();
		$sql = "SELECT * FROM Attendance WHERE emp_id = $id  AND day = '$day'";
		return self::$conn->query($sql)->fetch_assoc();
	}

	public function timeOut($day)
	{
		$id = Sessions::getSession();
		$sql = "SELECT * FROM Attendance WHERE emp_id = $id  AND day = '$day' AND time_out IS NULL";
		return self::$conn->query($sql)->fetch_assoc();
	}

	public function retrieveAttendance($day, $id = null)
	{
		$sql = '';

		if($id)
			$sql = "SELECT * FROM Attendance WHERE emp_id = $id AND day LIKE '$day';";
		else
			$sql = "SELECT e.emp_name, a.att_status
					FROM Employees e INNER JOIN Attendance a
					WHERE e.emp_id = a.emp_id AND day LIKE '$day';";

		return self::$conn->query($sql);
	}

	public function monthlyCount($day) 
	{
		$sql = "SELECT  att_status, COUNT(att_status) as att_count
				FROM `Attendance` 
				WHERE day LIKE '%-$day-%'
				GROUP BY att_status
				ORDER By att_status";

		return self::$conn->query($sql);
	}
}