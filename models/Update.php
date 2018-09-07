<?php

require_once 'DBConnection.php';

class Update
{
	private $conn = null;

	public function __construct()
	{
		$conn = DBConnection::connect();
	}

	public function __destruct()
	{
		$conn = null;
	}

	public function updateEmp($emp_id)
	{
		echo $emp_id;
	}
}