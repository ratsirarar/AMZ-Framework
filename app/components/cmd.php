#!/user/bin/env php

<?php 

//define the controller url
define('__URLCONTROLLER__', dirname(dirname(__FILE__)).'\\controller\\');
define('__URLVIEW__', dirname(dirname(__FILE__)).'\\view\\');
define('__URLLIB__', dirname(__FILE__)."\lib\IO.php");

require_once __URLLIB__;

Main();

function Main()
{
	getHeader();
	$answer=read();
	while($answer!="exit"){
		$data=sanitize(explode(" ", $answer));
		
		if(count($data)>=3)
		{
			//symbol create
			$_action="action";
			$$_action=$data[0];
		
			//symbol controller
			$_type="type";
			$$_type=$data[1];
		
			//symbol name controller
			$_name="name";
			$$_name=$data[2];
			
			compile($action, $type, $name);
			$answer=read();
		}
		elseif ($data[0]!="exit")
		{
			writeln("No Action available, Please check manual");
			$answer=read();
		}
		else{return;}
		
	}
}


/**
 * This Method get the welcome data
 */
function getHeader(){
writeln("Welcome to AMZ MVC Framework");
writeln("type exit to exit the application");
writeln("Below are the command available using create cmd: ");
writeln("\t *Controller");
writeln("\t *Model");
writeln("");
}


function compile($action, $type, $name)
{
	/**
	 * Check if it is a create data
	 */ 
	 
	if ($action =="create")
	{
		if ($type=="controller")
		{
			
			createController($name);		
			
		}
		elseif($type=="view")
		{
			createView($name);
		}
	}	
	
	/**
	 * Make an option secure or not
	 */
	
	if($action == "secure")
		{
			$filename=__URLCONTROLLER__.$type."Controller.php";
			$content=openFile($filename);
			$pattern='/secureArea\((FALSE|TRUE)\)/';
			$replacement= 'secureArea('.strtoupper($name).')';
			$content=preg_replace($pattern, $replacement, $content);
			createFile($filename, $content);
		}
}

/**
 * This Method is sanitizing the input
 * 
 * @param array -> from the prompt command
 * 
 */
function sanitize($array)
{
	foreach ($array as &$item)
	{
		$item=trim(strtolower($item));
	}	
	return $array;
}


/**
 * This Method Generate the controller
 * 
 * This not only create the controller file 
 * but generates also the view file
 * @param string -> name of the controller
 */
function createController($name)
{
	$filename=__URLCONTROLLER__.$name."Controller.php";

	if (file_exists($filename)==FALSE){
		
		/*This is the content of controller*/
		
	$fileController="<?php
	class ".$name."Controller extends controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index(".'$arg=false)
		{
			$this->view->render('."'/".$name."/index');
		}
	}

?>";
	/*End content of controller*/
	
	//add text into the controller
	createFile($filename, $fileController);
	
	writeln("Controller has been successfully created");
	
	/*create the view*/
	createView($name);
	}
	else 
		{
			writeln("Possible Duplication of $name Controller!\n Action aborted!");
		}
}


/**
 * This Method generate the View
 * 
 * @param string -> the name of the view
 */
function createView($name)
{
	$filedir=__URLVIEW__.$name;
	if(is_dir($filedir))
	{
		writeln("Possible Duplication of $name View!\n Action aborted!");

	}	
	else {
		
		//create the folder to contain the view
		mkdir($filedir);
		writeln("$name folder created");
		$filename=$filedir."\index.php";
		if (file_exists($filename)==FALSE){
		
			/*This is the content of View*/
			
				$fileView="<?php
				/**
				 * This View has been auto-generated
				 * This contains the data for your page
				 */
			?>";
			/*End content of View*/
			
		//add text into the controller
		createFile($filename, $fileView);
		
		writeln("View has been successfully created");
		}
		else 
		{
			writeln("Possible Duplication of $name View!\n Action aborted!");
		}
		
	}	
}
?>