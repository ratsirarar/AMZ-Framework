<?php 

/**
 * These Methods are the basic cmd line following 
 * C# syntax
 */

function writeln($string)
{
	fwrite(STDOUT,$string."\n");
}
function write($string)
{
	fwrite(STDOUT,$string);
}
function read()
{
	return fgets(STDIN);
}

/**
 * This Method create file 
 * 
 * @param string -> the path of the file to create
 * @param string -> the text to insert into the file
 * 
 */
function createFile($filename, $text)
{
	$handler=fopen((string)$filename, 'w+') or die("Error Occured");
	fwrite($handler, $text);
	fclose($handler);
}

/**
 * This Method create file 
 * 
 * @param string -> the path of the file to create
 * @param string -> the text to insert into the file
 * 
 */
function openFile($filename)
{
		
	$content=file_get_contents($filename);	
	//createFile("test.txt", $content);
	return $content;
}

?>