<?php 

require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Alejandro Plancarte');
$pdf->SetTitle('PDF Prueba');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('times', '', 16);

// add a page
$pdf->AddPage();

$pdf->Image('images/bancomer.jpg', 10, 10, 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$html = '<h1 style="color:black;">FORMATO DE DEFUNCION BANCOMER</h1>
			<hr>
			<p>Esta es una prueba de la clase TCPDF para creacion de formatos INSpector</p>';

$pdf->WriteHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('PruebaFormato', 'I');

?>
