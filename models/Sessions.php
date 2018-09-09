<?php


class Sessions
{
	public static function startSession($id=false, $desig=false)
	{
		session_start();
		$_SESSION['emp_id'] = $id;

		if($desig == 'HR')
			$_SESSION['hr'] = true;
	}

	public static function getSession()
	{
		if(isset($_SESSION['emp_id']))
			return $_SESSION['emp_id'];

		return false;
	}

	public static function getRestriction()
	{
		if(isset($_SESSION['hr']))
			return $_SESSION['hr'];

		return false;
	}

	public static function logoutUser()
	{
		session_unset();
		session_destroy();
	}
}