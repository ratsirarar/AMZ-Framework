<?php
	 class session
	{
		public static function init()
		{
			session_start();
		}
		public static function set($key, $value)
		{
			$_SESSION[$key]=$value;
		}
		public static function get($key)
		{
			return $_SESSION[$key];
		}
		public static function destroy($key)
		{
			unset($_SESSION[$key]);
			session_destroy();
		}
	} 
?>