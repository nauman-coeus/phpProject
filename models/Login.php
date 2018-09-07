<?php

require_once 'DBConnection.php';

class Login
{
	private $email = null;
	private $password = null;
	private $conn = null;
	private static $status = false;

	function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	function loginUser()
	{
		$conn = DBConnection::connect();
		$sql = "SELECT desig_name
				FROM Designation
				WHERE desig_id = (
					SELECT desig_id
				    FROM Employees
				    WHERE emp_email = '$this->email' AND emp_password = '$this->password'
				);";

		return $conn->query($sql);
	}
}