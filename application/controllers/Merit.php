<?php

class Merit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_merit');
        $this->load->library('session');
    }

    public function arts() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $dt = $this->model_merit->getMeritList("ARTS");       
            $this->_makeMeritPDF($dt, "ARTS");
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function science() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $dt = $this->model_merit->getMeritList("SCIENCE");
            $this->_makeMeritPDF($dt, "SCIENCE");
        } else {
            $this->_showUnauthorizePage();
        }
    }

public function geo() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $dt = $this->model_merit->getMeritList("ARTS_GEO");
            $this->_makeMeritPDF($dt, "ARTS with GEO");
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    private function _makeMeritPDF($dt, $strm) {

        $pdf_file = ($_SERVER["DOCUMENT_ROOT"]) . "/application/third_party/fpdf/PDF_with_pageno.php";
       // $pdf_file = ($_SERVER["DOCUMENT_ROOT"]) . "/bhmamhs/application/third_party/fpdf/PDF_with_pageno.php";

        require $pdf_file;

        $pdf = new PDF_with_pageno();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $this->_WriteSchoolHeader($pdf, $strm);
        $this->_DrawTableMerit($pdf, $dt);

        $pdf->Output();
    }

    private function _WriteSchoolHeader($pdf, $strm) {
        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(0, 10, 'Naimouza High School (H.S.)', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 6, 'Sujapur, Malda, PIN - 732206', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 15);
        $pdf->Cell(0, 6, 'Merit list for admission to class XI, SESSION : 2017, stream : ' . $strm, 0, 1, 'C');

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $pdf->Line($x, $y + 3, $x + 187, $y + 3);
    }

    private function _DrawTableMerit($pdf, $fd) {
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(12, 6, 'Rank', 1, 0, 'C');
        $pdf->Cell(12, 6, 'Form No.', 1, 0, 'C');
        $pdf->Cell(65, 6, 'Name', 1, 0, 'C');
        $pdf->Cell(65, 6, 'Father\'s name', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Percent.', 1, 0, 'C');
        $pdf->Cell(8,6, "Typ.", 1,1,'c');


        $pdf->SetFont('Arial', '', 10);
        for ($i = 0; $i < sizeOf($fd); $i++) {
            $pdf->Cell(12, 6, $i + 1, 1, 0, 'C');
            $pdf->Cell(12, 6, $fd[$i]['form_id'], 1, 0, 'C');
            $pdf->Cell(65, 6, $fd[$i]['name'], 1, 0);
            $pdf->Cell(65, 6, $fd[$i]['fname'], 1, 0);
            $pdf->Cell(15, 6, $fd[$i]['percentage'], 1, 0, 'C');
            $type = ($fd[$i]['typ'] === "INTERNAL") ? "INT" : "EXT";
            $pdf->Cell(8,6, $type, 1,1,'c');
        }
    }

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
