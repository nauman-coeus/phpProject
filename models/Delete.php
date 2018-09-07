<?php

require_once 'DBConnection.php';

class Delete
{
	private static $conn = null;

	public function __construct()
	{
		self::$conn = DBConnection::connect();
	}

	public function __destruct()
	{
		self::$conn = null;
	}

	public function deleteEmp($emp_id)
	{
		$sql = "DELETE FROM `Employees` WHERE emp_id = $emp_id;";
		self::$conn->query($sql);
	}
}