<?php

require_once 'DBConnection.php';

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

		if(!emp_id)
			$sql = "SELECT * FROM Employees WHERE emp_id = $emp_id;";
		else
			$sql = "SELECT emp_id, emp_name FROM `Employees`";

		return self::$conn->query($sql);
	}

	public function timeIn($day)
	{
		
	}
}