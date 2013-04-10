<?php 

class Page
{
	//Title in the Header
	
	public $title;
	private $arrayLink;
	public $css;
	public $contentFile;
	public $internalCss;
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	
	public function Render()
	{
		$this->DisplayHeader();
		$this->DisplayContent();
		$this->DisplayFooter();
	}
	//Header 
	
	private function DisplayHeader()
	{
		require dirname(__FILE__).'\header.php';
	}
	
	//Display content from file
	private function DisplayContent()
	{?>
	  <div id="content">
	  <?php 
			if (isset($this->contentFile) && file_exists($this->contentFile)) 
			{
				include ($this->contentFile);
			}
			else 
			{
				echo '<p style="color:red">Error: Please Assign value to contentFile or make sure the file path you Entered is Valid</p>';
				exit;
			}
			
	  echo '</div>';	
		
	}
	private function DisplayFooter()
	{
		require dirname(__FILE__).'\footer.php';
	}
}
?>