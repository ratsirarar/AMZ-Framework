<?php

	class controller
	{
		public $is_secure=FALSE;
		
		public function __construct()
		{
			session::init();
			$this->view= new View();
		}
		
		public function loadModel($name)
		{
			   if (isset($name))
			{
				$model=$name.'Model';
				if (file_exists(dirname(dirname(__FILE__)).'/model/'.$model.".php")==TRUE)
				{
					//echo 'Login model called';
					$this->model= new $model();
				}
				
			}
				else echo 'error occured during loading the Model';
			
		}
		/**
		 * this function check if a user is logged in
		 */
		
		public function isLoggedIn()
		{
			/*if($_SESSION['username'])
			{
				
			} */
			return $this->is_secure;
		}
		
		/**
		 * this function check if the site Has been enabled secure Area
		 */
		public function secureArea($isSecure=FALSE)
		{
			if ($isSecure==TRUE)
			{
				
				$isLoggedIn= session::get('loggedIn');
				if (!isset($isLoggedIn))
				{
					header("location: login");
				}
				else {
					 return FALSE;
				}
			}
		}
		
		
	}
?>