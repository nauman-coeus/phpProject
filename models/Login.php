<?php

require_once 'DBConnection.php';
require_once 'Sessions.php';

class Login
{
	public static function loginUser($email, $password)
	{
		$conn = DBConnection::connect();

		$sql = "SELECT emp_id
				FROM Employees
				WHERE emp_email = '$email' AND emp_password = '$password'";

		$result = $conn->query($sql)->fetch_assoc();
		$emp_id = $result['emp_id'];

		$sql = "SELECT desig_name
				FROM Designation
				WHERE desig_id = (
					SELECT desig_id
				    FROM Employees
				    WHERE emp_email = '$email' AND emp_password = '$password');";

		$result = $conn->query($sql)->fetch_assoc();
		$emp_desig = $result['desig_name'];

		Sessions::startSession($emp_id, $emp_desig);
	}
}