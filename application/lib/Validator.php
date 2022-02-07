<?php

namespace application\lib;


class Validator
{
	public static function validate($email, $name, $pwd)
	{
		$errmsg = '';

		if(empty($email) || empty($name) || empty($pwd))
		{
			$errmsg = 'Fill in all the fields!';
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$errmsg = 'Email is invalid!';
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $pwd))
		{
			$errmsg = 'Password incorrect!';
		}
		else if(strlen($pwd) < 4)
		{
			$errmsg = 'Password is small!';
		}

		return $errmsg;
	}
}