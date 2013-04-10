<?php
  class database extends PDO
  {
  	public function __construct()
	{
		parent::__construct('mysql:host=localhost; dbname=evergreen','admin_green', 'password');	
	}
	
  }
?>