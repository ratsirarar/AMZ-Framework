<?php
	class siteController extends controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		/**
		 * call the index by default
		 */
		public function index($arg=false)
		{
			$this->view->render('/Site/index');
		}
		
		/**
		 * Login function that check if a person is logged in 
		 */
		public function login()
		{
			$this->view->render('/Site/login');
			/*$username=$this->sanitize($_POST['username']);
			$pwd=$this->sanitize($_POST['password']);
			if($username && $pwd)
			{
				
			}else
			{
				
			}*/
				
		}
	}

?>