<?php
	class reportController extends controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->is_sercure=TRUE;
		}
		
		public function index($arg=false)
		{
			$this->secureArea(TRUE);
			$this->view->render('/report/index');
		}
	}

?>