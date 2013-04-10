<?php
/**
 * THis class define how to routes the URL
 * @author Andy Ratsirarson
 * @package Routes
 * 
 * Possible format of the url got from $_GET:
 * 		Class/methods/args
 * 		Class
 * 		Class/method
 */

	
class routes
{
	protected $url;
	
	public function __get($name)
	{
		switch($name)
		{
			case 'url': return $this->url; break;
		}
	}
		
		
	public function __construct()
	{
		//this get the url and strip it $_GET['url']
		
		
		if (!isset($_GET['url']))
		{
			$url='site/index';
		}
		else {
			$url=$_GET['url'];
		}
			
		
		//Trim and explode data
		$this->url=rtrim($url,'/');
		$this->url=explode('/', $this->url);
		
		//asign index to the second position if url format == /controller/
		if (count($this->url)==1)
		{
			 $this->url=array_merge($this->url,array('index'));
		}
		
		//Format controller to be nameController
		$control=$this->url[0].'Controller';
		
		//check if controller does not exist:
		if (file_exists(dirname(dirname(__FILE__)).'/controller/'.$control.".php")==FALSE)
		{
			$control='errorController';
		}
		
		//instantiate class from URL // create a new controller
		$controller=new $control;
		//instantiate model from URL
		$controller->loadModel($this->url[0]);
		
		//Get Method from URL with Arguments
		if (isset($this->url[2]))
		{
			$controller->{$this->url[1]}($this->url[2]);	
		}
		
		//Get Method from URL
		if (isset($this->url[1]))
		{
			$controller->{$this->url[1]}();	
		}
		
	}	
	
}
	



?>