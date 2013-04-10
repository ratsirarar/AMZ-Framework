<?php
require 'routes.php';

class routesTest extends PHPUnit_Framework_TestCase
{
	public function testRoutes()
	{
		$test=new routes();
		$this->assertEquals(array('test','write'), $test->url);
	}
}
?>