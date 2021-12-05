<?php 

$pdffilename = '18092021_021554_exo1.pdf';
header('Content-type: application/pdf');
header('Content-Description: inline; filename="'.$pdffilename.'"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($pdffilename);

?>