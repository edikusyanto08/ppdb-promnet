<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function generate_pdf($html, $name)
	{
		$ro = APPPATH ."third_party/dompdf/dompdf_config.inc.php";
		require_once($ro);
		 
		$dompdf = new DOMPDF();
		$dompdf->set_paper(array(0, 0, 810, 890), 'landscape');
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($name .'.pdf');
	}

	function fpdf()
	{
		$ro = APPPATH ."third_party/fpdf/fpdf.php";
		require($ro);

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output();

	}
}

/* End of file pDF.php */
/* Location: ./application/libraries/pDF.php */
