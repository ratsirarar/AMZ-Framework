<?php
/**
 * This is the model component
 * 
 * @author Andy Ratsirarson
 * @package AMZ framework
 */

 class model 
 {
 	public function __construct()
	{
		//echo 'calling model base class';	
		$this->db= new database();
	}
	
	public function checkUser($email)
	{
		$sh=$this->db->prepare('select email from user where email= :email');
		$sh->execute(array(':email'=>$email));
		if(count($sh->fetch())!=0)
		{
			return TRUE;
		}
		return FALSE;
	}
 }
?>