<?php
/* 
class Pdfgenerator
{
	public function generate($html,$filename,$stream=FALSE)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		require './vendor/dompdf/dompdf/dompdf_config.inc.php';
		
		$file_to_save = './pdf/';
		
		for($i=0; $i<5; $i++)
		{
			if ( get_magic_quotes_gpc() )
      		$old_limit = ini_set("memory_limit", "16M");
			
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->set_paper("A4", "portrait");
			$dompdf->render();
			
			file_put_contents($file_to_save.$filename.$i.".pdf", $dompdf->output()); 
		}

		echo "<script type='text/javascript'>";
		for($i=0;$i<5; $i++){
		  echo "window.open('". base_url() ."pdf/". $filename ."{$i}.pdf','_blank');" ;  
		}
		echo "</script>";	 
		
		
		//$canvas->page_text(16, 800, $font, 8, array(0,0,0));
		//$dompdf->set_font("10px");
		
		//$dompdf->stream($filename.'.pdf',array("Attachment"=>0));
	}
}
*/
?>



<?php

class Pdfgenerator
{
	public function generate($html,$filename,$stream=FALSE)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		require './vendor/dompdf/dompdf/dompdf_config.inc.php';
		
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("A4", "portrait");
		
		//$canvas->page_text(16, 800, $font, 8, array(0,0,0));
		//$dompdf->set_font("10px");
		$dompdf->render();
		$dompdf->stream($filename.'.pdf',array("Attachment"=>0));
	}
}

?>