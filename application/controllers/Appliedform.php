<?php
class Appliedform extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('model_appliedform');
             //   $this->load->model('admission_model');
	}
	
	
	public function index(){
		$this->load->view('header/header_withJQ');
                $this->load->view('nav/default_nav');
		$this->load->view('applied_form/enter_form');
		$this->load->view('footer/footer_section');
		$this->load->view('footer/footer_withoutJQ');
	}
        
        

	
	public function view(){
		
		
			$this->form_validation->set_error_delimiters('<p class="in-error">', '</p>');
			
			$this->form_validation->set_rules('formno', 'form no', 'trim|required|numeric');
			$this->form_validation->set_rules('dob_v', 'date of birth', 'trim|required');
			
			if(!$this->form_validation->run()){
				$this->load->view('header/header_withJQ');
                                $this->load->view('nav/default_nav');
				$this->load->view('applied_form/enter_form');
				$this->load->view('footer/footer_section');
				$this->load->view('footer/footer_withoutJQ');
				
			}else{
				//load the data from table
				$input_formno = $this->input->post('formno');
				$input_dob = $this->input->post('dob_v');
				
				$formdata = $this->model_appliedform->getFormDetail($input_formno, $input_dob);
					
				if(isset($formdata[0])){
					$formdata = $formdata['0'];
					//print_r($formdata);
					//CHECK it while uploading to server. May be it will require some changes.
						
					//$pdf_file = ($_SERVER["DOCUMENT_ROOT"])."/schooladmission/application/third_party/fpdf/Nmhs_pdf.php";
					$pdf_file = ($_SERVER["DOCUMENT_ROOT"])."/application/third_party/fpdf/Nmhs_pdf.php";
					require $pdf_file;
						
					$pdf = new Nmhs_pdf();
					//$pdf->AliasNbPages();
					$pdf->AddPage();
					$this->_WriteSchoolHeader($pdf);
					$this->_WriteBasicDetails($pdf, $formdata);
					$pdf->Ln(3);

				
					$this->_WriteContactDetails($pdf, $formdata);
					$pdf->Ln(3);
				
					$this->_WriteDetailQExam($pdf, $formdata);
					$pdf->Ln(3);
                                        $this->_WriteBankDetail($pdf, $formdata);
					//$this->_DrawTableSubMark($pdf, $formdata);
					//$this->_write_xi_info($pdf, $formdata);
					$pdf->Ln(2);
					$this->_Declaration($pdf, $formdata);
					$pdf->Ln(2);
					$this->_receiptCopy($pdf, $formdata);
						
                    //for download
                    $fl_name = 'nmhs_xi_'.$formdata['form_id'].'.pdf';
					$pdf->Output($fl_name,"D");
                    redirect(site_url());
                    //for no download
//					$pdf->Output();
				}else{
				    echo "This form does not exist";
				}
			}
			
	}
        
        
        
        
        public function get_status(){
            $fid = $this->input->post('fid');
            $fdob = $this->input->post('d');
            $resp = $this->admission_model->getFormStatusForApplicant($fid, $fdob);
            if ($resp) {
//                $dt = $resp[0];
//                $rdata = '{"fno":'.$dt["form_id"].',"name":'.$dt["name"].',"sb":'.$dt["has_fSubmitted"].',"vf":'.$dt["has_fVerified"].',"im":'.$dt["is_muted"].',"mr":'.$dt["mute_remark"].',"img_src":'.$dt["img_name"].'}';
                  $rdata = json_encode($resp[0]);
                  
                echo $rdata;
                }  else {
                echo 0;    
            }
           
            
        }

        public function status(){
            $this->load->view('template/header_nav');
            $this->load->view('admission/status');
            $this->load->view('template/footer_status');
        }

        

        private function _WriteSchoolHeader($pdf)
	{
		
                $logo_src = '/home/nexaping/public_html/nmhs11/asset/images/nmhs-logo.jpg';
             //  $logo_src = 'C:/xampp/htdocs/schooladmission/asset/images/nmhs-logo.jpg';
                $pdf->SetFont('Arial', 'B', 24);
		$pdf->Cell(0,10, 'Naimouza High School (H.S.)', 0, 1, 'C');
	
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(0, 6, 'Sujapur, Malda, PIN - 732206', 0, 1, 'C');
	
		$pdf->SetFont('Arial', '', 15);
		$pdf->Cell(0, 6, 'Application form for admission to class XI, SESSION : 2017', 0, 1, 'C');
                
                $pdf->Image($logo_src, 5, 5, 30);
		
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 3, $x + 187, $y + 3);
	
	
	}
	
	private function _WriteBasicDetails($pdf, $formdata)
	{
		
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(20, 6, "Form No.", 1);
		$pdf->Cell(18, 6, $formdata['form_id'], 'TRB');
		
                $pdf->Code128(56,38, $formdata['form_id'],32,6);
                $pdf->Cell(45);
                if($formdata['is_muted']==1){
                    $pdf->SetTextColor(255,0,0);
                    $pdf->Cell(20, 6, "FORM REJECTED", '');
                }
                else
                {
                    $typ = substr($formdata['typ'], 0, 3);
                    $pdf->Cell(20, 6, $formdata['stream'].'-'.$typ, '');
                }
                $pdf->SetTextColor(0,0,0);
		$pdf->Ln(4);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(40, 10, "Personal info");
                $pdf->Ln(5);
        
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 6, chr(149).' Name');
		$pdf->Cell(15);
		$pdf->Cell(75, 6, ': ' . $formdata['name']);

		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 6, chr(149).' Father\'s Name');
		$pdf->Cell(15);
		$pdf->Cell(75, 6, ': ' . $formdata['fname']);
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 6, chr(149).' Mother\'s Name');
		$pdf->Cell(15);
		$pdf->Cell(75, 6, ': ' . $formdata['mname']);
		
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 6, chr(149).' Guardian\'s Name');
		$pdf->Cell(15);
		$pdf->Cell(75, 6, ': ' . $formdata['gname']);

		$pdf->Image($formdata['img_path'], 160, 40, 30);
		
		
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 6, chr(149).' Date of birth');
		$pdf->Cell(15);
		$dob = date_create($formdata['dob']);
		$sdob = date_format($dob, 'd-m-Y');
		$pdf->Cell(75, 6, ': ' . $sdob);
		
		$pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Age on 31st Dec 2016');
		
		$pdf->Cell(15);
		$edate = new DateTime('2016-12-31');
		$dif = $edate->diff($dob);
		$age = $dif->format('%y years %m months and %d days');
		$pdf->Cell(30, 6, ': ' . $age);
		
		$pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Sex');
		$pdf->Cell(15);
		$sx = $formdata['sex'] === 'M' ? "Male" : "Female";
		$pdf->Cell(15, 6, ': ' . $sx);
		
		//$pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Guardian\'s occupation');
		$pdf->Cell(10);
		$pdf->Cell(75, 6, ': ' . $formdata['guardian_occu']);
        
     
		
		
		$pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Is physically challenged');
		$pdf->Cell(15);
                $ph;
                if ($formdata['ph_challenged'] == 1 || $formdata['ph_challenged'] == "Y") {
                    $ph = "Yes";
                }else{
                    $ph = "No";
                }
		$pdf->Cell(15, 6, ': ' . $ph);
		
		
		//$pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Ph. challenged type');
		$pdf->Cell(10);
		$pdf->Cell(75, 6, ': ' . $formdata['ph_type']);
		
                $pdf->Ln(4);
                $pdf->Cell(30, 6, chr(149).' Is BPL');
		$pdf->Cell(15);
                if(($formdata['is_bpl'] == 1)||($formdata['is_bpl'] == "Y")){
                    $bpl = "Yes";
                }else{
                    $bpl = "No";
                }
		$pdf->Cell(15, 6, ': '.$bpl);
                
                $pdf->Cell(30, 6, chr(149).' BPL number');
		$pdf->Cell(10);
		$pdf->Cell(75, 6, ': ' . $formdata['bpl_no']);
                
                
                $pdf->Ln(4);
		$pdf->Cell(30, 6, chr(149).' Religion');
		$pdf->Cell(15);
		$pdf->Cell(25, 6, ': ' . $formdata['religion']);
                
		
		$pdf->Cell(20, 6, chr(149).' Social category');
		$pdf->Cell(10);
		$pdf->Cell(15, 6, ': ' . $formdata['category']);
		
                $pdf->Ln(4);
		$pdf->Cell(15, 6, chr(149).' Aadhar no.');
		$pdf->Cell(10);
		$pdf->Cell(35, 6, ': ' . $formdata['aadhar_no']);
              
                
                $pdf->Cell(30, 6, chr(149).' Guardian\'s aadhar no.');
		$pdf->Cell(10);
		$pdf->Cell(35, 6, ': ' . $formdata['guardian_aadhar']);
               
                
                $pdf->Ln(4);
		
		$pdf->Cell(15, 6, chr(149).' Citizen');
		$pdf->Cell(10);
		$pdf->Cell(35, 6, ': ' . 'INDIAN');
                
                $pdf->Cell(30, 6, chr(149).' Guardian\'s EPIC no.');
		$pdf->Cell(10);
		$pdf->Cell(35, 6, ': ' . $formdata['epic_no']);
                
		$pdf->Ln(5);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 1, $x + 187, $y + 1);

	}
	

		
	private function _WriteContactDetails($pdf, $formdata)
	{
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(0, 5, "Address & Contact info", 0, 1, 'C');
		
		$pdf->Ln(1);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x+92, $y + 2, $x + 92, $y + 30);
		
		
		
		$pdf->Ln(1);
		$pdf->SetFont('Arial', 'U', 10);
		$pdf->Cell(30, 6, "Present address :");
		$pdf->Cell(65);
		$pdf->Cell(30, 6, "Permanent address :");
		
		$pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(20, 6, 'Para/House no.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['addresslane1a']);
		
		
		
		$pdf->Cell(20, 6, 'Para/House no.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_addresslane1a']);
		
		
		$pdf->Ln(4);
		$pdf->Cell(20, 6, 'Village/Street');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['addresslane1']);
		
		
		$pdf->Cell(20, 6, 'Village/Street');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_addresslane1']);
		
		$pdf->Ln(4);
		$pdf->Cell(20, 6, 'Post office');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['addresslane2']);
		
		
		$pdf->Cell(20, 6, 'Post office');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_addresslane2']);
		
		$pdf->Ln(4);
		$pdf->Cell(20, 6, 'P.S.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['ps']);
		
		
		$pdf->Cell(20, 6, 'P.S.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_ps']);
		
		
		$pdf->Ln(4);
		$pdf->Cell(20, 6, 'Dist.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['dist']);
		
		
		$pdf->Cell(20, 6, 'Dist.');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_dist']);
		
		$pdf->Ln(4);
		$pdf->Cell(20, 6, 'PIN');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['pin']);
		

		$pdf->Cell(20, 6, 'PIN');
		$pdf->Cell(10);
		$pdf->Cell(65, 6, ': ' . $formdata['p_pin']);
		
		
		$pdf->Ln();
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 2, $x + 187, $y + 2);
		
		$pdf->Ln(1);
		$pdf->Cell(20, 10, 'Mobile no.');
		$pdf->Cell(10);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 10, ': ' . $formdata['mobile']);
		
	
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(15, 10, 'Email');
		$pdf->Cell(5);
		$pdf->Cell(90, 10, ': ' . $formdata['email']);
		
		
		$pdf->Ln(5);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 3, $x + 187, $y + 3);
		
		


	}
	
	private function _WriteDetailQExam($pdf, $formdata){
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(30, 5, "About MP exam & Class XI admission");

		$pdf->Ln(2);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(25, 10, 'Year of passing');
		$pdf->Cell(10);
		$pdf->Cell(20, 10, ': ' . $formdata['passing_yr']);
		
		$pdf->Cell(20, 10, 'Marks obtained');
		$pdf->Cell(10);
		$pdf->Cell(15, 10, ': ' . $formdata['mark_obt']);
                
                $pdf->Cell(15, 10, 'Full marks');
		$pdf->Cell(10);
		$pdf->Cell(15, 10, ': ' . $formdata['mark_tot']);
                
                $pdf->Cell(15, 10, 'Percentage');
		$pdf->Cell(10);
		$pdf->Cell(15, 10, ': ' . $formdata['percentage']);
                
                $pdf->Ln(4);
                $pdf->SetFont('Arial', '', 10);
		$pdf->Cell(30, 10, 'Last school attended');
		$pdf->Cell(10);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(115, 10, ': ' . $formdata['last_school']);
		
                $pdf->Ln(7);
//		$pdf->SetFont('Arial', '', 10);
//		$pdf->Cell(0,6, "Marks obtained in mydhyamic exam");
//		$pdf->Ln();
	
		if ($formdata['last_board'] === "WBBSE") {
            $table_header = array('Subject', 'BENG', 'ENG', 'MATH', 'P.Sc', 'L.Sc', 'GEO', 'HIST', 'Total Obt.');
        } else {
            $table_header = array('Subject', 'BENG', 'ENG', 'MATH', 'P.Sc', 'L.Sc', 'GEO', 'HIST', 'ARB', 'Total Obt.');
        }
	
		$pdf->SetFont('Arial', 'B', 10);
		if ($formdata['last_board'] === "WBBSE") {
            for ($i = 0; $i < count($table_header); $i++) {
                $pdf->Cell(21, 6, $table_header[$i], 1);
            }
        } else {
            for ($i = 0; $i < count($table_header); $i++) {
                $pdf->Cell(19, 6, $table_header[$i], 1);
            }
        }
		$pdf->SetFont('Arial', '', 10);
	
	
		if ($formdata['last_board'] === "WBBSE") {
            $table_data = array('Mark in MP', $formdata['bng'], $formdata['eng'], $formdata['mth'], $formdata['psc'], $formdata['lsc'], $formdata['geo'], $formdata['his'], $formdata['mark_obt']);
        } else {
            $table_data = array('Mark in MP', $formdata['bng'], $formdata['eng'], $formdata['mth'], $formdata['psc'], $formdata['lsc'], $formdata['geo'], $formdata['his'], $formdata['arb'], $formdata['mark_obt']);
        }
		$pdf->Ln();
		if ($formdata['last_board'] === "WBBSE") {
            for ($i = 0; $i < count($table_data); $i++) {
                $pdf->Cell(21, 6, $table_data[$i], 1);
            }
        } else {
            for ($i = 0; $i < count($table_data); $i++) {
                $pdf->Cell(19, 6, $table_data[$i], 1);
            }
        }    
                $pdf->Ln(4);
                $pdf->SetFont('Arial', '', 9);
		$pdf->Cell(25, 10, 'Subjects for class XI :');
		$pdf->Cell(10);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(25, 10, '1.' . $formdata['el1']);
                $pdf->Cell(5);
                $pdf->Cell(25, 10, '2.' . $formdata['el2']);
                $pdf->Cell(5);
                $pdf->Cell(25, 10, '3.' . $formdata['el3']);
                $pdf->Cell(5);
                $pdf->Cell(25, 10, '4.' . $formdata['adl']);
                
		$pdf->Ln(4);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 3, $x + 187, $y + 3);
		
	}
        
        
        	private function _WriteBankDetail($pdf, $formdata){
                
                $pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(30, 6, "Bank details");
		
		$pdf->Ln(2);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(35, 10, 'Student\'s bank account no.');
		$pdf->Cell(10);
		$pdf->Cell(35, 10, ': ' . $formdata['bank_account']);

		
		$pdf->Cell(20, 10, chr(149).' Bank name');
		$pdf->Cell(10);
		$pdf->Cell(60, 10, ': ' . $formdata['bank_name']);
                
                
                $pdf->Ln(4);
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(35, 10, 'Branch\'s IFSC.');
		$pdf->Cell(10);
		$pdf->Cell(35, 10, ': ' . $formdata['branch_ifsc']);
		
		$pdf->Cell(20, 10, chr(149).' Branch name');
		$pdf->Cell(10);
		$pdf->Cell(60, 10, ': ' . $formdata['bank_branch']);
                
                
              
                $pdf->Ln(5);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		
		$pdf->Line($x, $y + 3, $x + 187, $y + 3);
               
		
		
	}
	
	
	
	
	private function _Declaration($pdf, $fdata) {
		$pdf->Ln(3);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 5, "Declaration");
	
		$pdf->Ln(5);
		$pdf->SetFont('Arial', '', 10);
		$pdf->MultiCell(0, 5, 'The particulars given above are correct and we shall abide by the rules and regulations of the school and board.');
	
	
		$pdf->Ln(12);
		$pdf->Cell(50, 6, "Guardian's signature", 'T');
		$pdf->Cell(75);
		$pdf->Cell(50, 6, "Student's signature", 'T');
	
		$pdf->Ln();
		$pdf->Cell(50, 6, "Date : ......./......./..........");
		$pdf->Cell(10);
		$pdf->Cell(60, 6, "Place: ...........................");
        
        $pdf->Ln(4);
        //$pdf->MultiCell(0,5, 'NOTE : Submit this form after signing it before the date mentioned in website to the school along with the copies of madhyamic mark sheet, admit, aadhar (if any) and other (if any) relevant documents.');
	}
	
	
private function _receiptCopy($pdf, $fdata) {
        $pdf->Ln(3);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 4, "---- ---- ---- ---- ---- ---- ---- ---- ---- cut here ---- ---- ---- ---- ---- ---- ---- ---- ---- ----", 0, 1, 'C');
        $pdf->Cell(0, 5, 'Receipt copy', 0, 1, 'C');

        $pdf->Ln(5);
        $pdf->Cell(25, 6, "Form No.", 1);
        $pdf->Cell(25, 6, $fdata['form_id'], 'TRB');

$pdf->Code128(65,241,$fdata['form_id'],32,6);

$pdf->Cell(45);
$typ = substr($fdata['typ'], 0, 3);
$pdf->Cell(20, 6, $fdata['stream'].'-'.$typ, '');

        $pdf->Ln(5);
        $pdf->Cell(20, 10, 'Student\'s name');
        $pdf->Cell(10);
        $pdf->Cell(65, 10, ': ' . $fdata['name']);
        $pdf->Ln(5);
        $pdf->Cell(75, 10, 'Application for admission to class XI');

      

        $pdf->Ln(20);
        $pdf->Cell(40, 5, "Received by: ..........................");
        $pdf->Cell(90);
        $pdf->Cell(40, 5, "Date : ..............................");
    }
	
	
}