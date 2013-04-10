<?php
	class contactController extends controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index($arg=false)
		{
			$this->view->render('/contact/index');
		}
	}

?>