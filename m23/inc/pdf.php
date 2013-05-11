<?
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for generating PDF files
$*/

	require('/m23/inc/fpdf/fpdf.php');

	define('FPDF_FONTPATH','/m23/inc/fpdf/font/');





/**
**name PDF_showTableRow()
**description Shows a table row with a variable amount of entries. The parameters are shown side by side as rows in a table. If more than one PDF_showTableRow commands are executed in one table it is needed to always use the same amount of paramaters in each call.
**parameter Arbitrary amount of cells to show in a table.
**/
function PDF_showTableRow()
{
	global $_GLOBALS;
	$pdf = $_GLOBALS['FPDF_pdfPointer'];
	$amount = func_num_args();
	$a = array();

	for($i = 0; $i < $amount; $i++)
	{
		$width = $pdf->GetStringWidth(func_get_arg($i)) + 2;
		if (!isset($_GLOBALS['FPDF_columnWidth'][$i]) || $_GLOBALS['FPDF_columnWidth'][$i] < $width)
			$_GLOBALS['FPDF_columnWidth'][$i] = $width;
		$a[$i] = func_get_arg($i);
	}

	$_GLOBALS['FPDF_tableRows'][] = $a;
}





/**
**name PDF_showTableHeader()
**description Inits some values for starting a new PDF table.
**/
function PDF_showTableHeader()
{
	global $_GLOBALS;
	$_GLOBALS['FPDF_tableRows'] = array();
	$_GLOBALS['FPDF_columnWidth'] = array();
}





/**
**name PDF_showTableEnd()
**description Prints the PDF table.
**/
function PDF_showTableEnd()
{
	global $_GLOBALS;
	$pdf = $_GLOBALS['FPDF_pdfPointer'];

	$pdf->SetDrawColor(0,0,0);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');
	
	//Color and font restoration
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');

	$amount = func_num_args();
	$mark = false;

	foreach ($_GLOBALS['FPDF_tableRows'] as $row)
	{
		for ($i = 0; $i < count($row); $i++)
		{
			$pdf-> Cell($_GLOBALS['FPDF_columnWidth'][$i], 7, $row[$i], 'LRTB', 0 ,'L',$mark);
		}
		$pdf->Ln();
		$mark =! $mark;
	}
}





/**
**name PDF_init($orientation = 'P', $unit= 'mm', $format = 'A4')
**description Inits some basic variables for PDF creation.
**parameter orientation: Orientation of the PDF document (P or Portrait, L or Landscape)
**parameter unit: pt (point), mm (millimeter), cm (centimeter) or in (inch)
**parameter format: PDF page format A3, A4, A5, Letter or Legal
**/
function PDF_init($orientation = 'P', $unit= 'mm', $format = 'A4')
{
	global $_GLOBALS;
	$_GLOBALS['FPDF_pdfPointer'] =  new FPDF($orientation, $unit, $format);
	$_GLOBALS['FPDF_pdfPointer']->SetFont('Biolinum_Bd_0.4.1','',14);
	$_GLOBALS['FPDF_pdfPointer']->AddPage();
}





/**
**name PDF_output()
**description Shows the created PDF.
**/
function PDF_output()
{
	global $_GLOBALS;
	$_GLOBALS['FPDF_pdfPointer']->Output();
}

PDF_init();
PDF_showTableHeader($pdf);
PDF_showTableRow("lala","muhu");
PDF_showTableRow("gaga","hahahahahahhaahah");
PDF_showTableEnd();
PDF_output();
?>
