<?php

class Validation
{
	private $flag = true;
	public $msg = '';

	public function __construct()
	{
		$this->flag = true;
		$this->msg = '';
	}

	public function getMessage()
	{
		return $this->msg;
	}

	public function empValidation($name = null, $email = null, $salary = null, $password = null, $dept = null, $pic = null, $boss = null, $desig = null)
	{
		if(!$name){
			$this->msg = "Name Cant Be Empty<br>";
			$this->flag = false;
		}

		if(!$email) {
			$this->msg .= "Email Cant Be Empty<br>";
			$this->flag = false;
		}

		if(!$salary) {
			$this->msg .= "Salary Cant Be Empty<br>";
			$this->flag = false;
		}

		if(!$password) {
			$this->msg .= "Password Cant Be Empty<br>";
			$this->flag = false;
		}

		if(!$dept) {
			$this->msg .= "Department Cant Be Empty<br>";
			$this->flag = false;
		}

		if(!$desig) {
			$this->msg .= "Designation Cant Be Empty<br>";
			$this->flag = false;
		}

		return $this->flag;
	}
}