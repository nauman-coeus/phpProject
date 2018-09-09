<?php

require_once 'DBConnection.php';

class Delete
{
	private $conn = null;

	public function __construct()
	{
		$this->conn = DBConnection::connect();
	}

	public function __destruct()
	{
		$this->conn = null;
	}

	public function deleteEmp($emp_id)
	{
		$sql = "DELETE FROM `Employees` WHERE emp_id = $emp_id;";
		$this->conn->query($sql);
	}
}