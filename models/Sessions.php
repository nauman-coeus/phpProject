<?php


class Sessions
{
	public static function startSession($var)
	{
		session_start();
		$_SESSION['login'] = true;

		if($var == 'HR') 
			$_SESSION['hr'] = true;
	}

	public static function getSession()
	{
		if(isset($_SESSION['login']))
			return true;
		else
			return false;
	}

	public static function getRestriction()
	{
		if(isset($_SESSION['hr']))
			return true;
		else
			return false;
	}

	public static function logoutUser()
	{
		session_unset();
		session_destroy();
	}
}