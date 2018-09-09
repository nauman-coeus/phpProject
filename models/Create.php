<?php

require_once 'Retrieve.php';

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
		
	}
}