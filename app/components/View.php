<?php
	class View
	{
		public $data;
		public $error=FALSE;
		public function __construct()
		{
			$this->url='http://'.$_SERVER['HTTP_HOST'].'/evergreen/public/';
			$this->links='http://'.$_SERVER['HTTP_HOST'].'/evergreen/';
			//$this->data='';
		}
		
		public function render($name)
		{
			require_once dirname(dirname(__FILE__)).'\view\header.php';
			require '/../view'.$name.'.php';
			require_once dirname(dirname(__FILE__)).'\view\footer.php';
			
		}
		
		
	}
?>