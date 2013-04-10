<?php
class func
{
	public function __construct()
	{
		
	}
	
	/**
		 * This function Sanitize entries
		 */
		public static function sanitize($a)
		{
			return trim(strtoupper($a));
		}
		
		/**
		 * dynamically create the parameters for execute
		 */
		public static function parameterPost($post)
		{
			$result=array();
			foreach($post as $name=>$value)
			{
				//echo (string) ${$name}.to_s;
				$result[':'.$name]=$value;
			}
			
			//print_r(array(':test'=>'uy',':last'=>'ada'));
			//print_r ($result);
			return $result;
		}
		
		
		
}
?>