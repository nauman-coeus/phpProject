<?php

require_once 'DBConnection.php';
require_once 'Retrieve.php';

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
		
	}
}