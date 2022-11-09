

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . "/dompdf/autoload.inc.php");


use Dompdf\Dompdf;
 
class Pdfgenerator{


  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
   $dompdf = new DOMPDF();
    //$dompdf = new DOMPDF($options);
	$dompdf->set_option( "is_php_enabled" , true );
$dompdf->set_option('isRemoteEnabled', true);
ini_set('memory_limit','-1');
	//$dompdf->set_option("isPhpEnabled", true);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}