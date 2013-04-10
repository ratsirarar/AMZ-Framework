<?php
define('__ROOT__',dirname(__FILE__));

function __autoload($name)
	{
		switch ($name)
			{
				case preg_match('/Controller$/',$name)==TRUE:
					require_once(__ROOT__.'\\app\\controller\\'.$name.".php");
					break;
				default:
					require_once('/app/components/'.$name.".php");
			}	
	}
$test=new routes();

?>