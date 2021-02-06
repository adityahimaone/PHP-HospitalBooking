<?php
    include "phpqrcode/qrlib.php"; 
    $tempdir = "temp/";
    if (!file_exists($tempdir))
       mkdir($tempdir);
    //isi qrcode jika di scan
    $codeContents = '1234235234534'; 
    QRcode::png($codeContents, $tempdir.'007_4.png', QR_ECLEVEL_L, 7, 2);
    
    
    $content = "
    
	<html> 
	<body>
        <?php 
        
        ?>
	</body>
	</html>
	";

	require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
    $html2pdf->output();
    $html2pdf->output(__DIR__."/kode_booking.pdf","F");
?>