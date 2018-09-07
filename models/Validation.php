<?php

class Validation
{
	private $flag = true;

	public static function loginValidate($usr_email, $usr_password)
	{
		if($usr_email == '' || $usr_password == '')
			$this->flag = false;

		return $this->flag;
	}
}