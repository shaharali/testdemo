<?php
include '../../lib/Database.php'; 

$db = new Database();

if (isset($_GET['stu_id'])) {
    $stu_id = $_GET['stu_id'];
    $query = "SELECT * FROM tbl_student INNER JOIN tbl_testimonial ON tbl_student.stu_id = tbl_testimonial.stu_id WHERE tbl_student.stu_id ='$stu_id'";
$data = $db->select($query);
if($data){
  while ($rows = $data->fetch_assoc()) {
    $test_id = $rows['test_id'];
    $name = $rows['name'];
    $gender = $rows['gender'];
    $email = $rows['email'];
    $father = $rows['father'];
    $mother = $rows['mother'];
    $paddress = $rows['paddress'];
    $maddress = $rows['maddress'];
    $mobile = $rows['mobile'];
    $pyear = $rows['pyear'];
    $batch = $rows['batch'];
    $class = $rows['class'];
    $roll = $rows['roll'];
    $result = $rows['result'];
    $subject = $rows['subject'];
    $testimonial_date = $rows['testimonial_date'];
    $prepared_by = $rows['prepared_by'];
  
        
    $testimonial_date_c = date_create($testimonial_date);
    $testimonial_date   = date_format($testimonial_date_c, "d-m-Y");
    $year_testimonial   = date_format($testimonial_date_c, "Y");
    
       
    
    require('../fpdf/fpdf.php');  
    
    class PDF extends FPDF
    {
        // Page header        
        
        function Header()
        {
            
            
$this->SetFont('Arial', 'B', 28);
$this->Multicell(160,10,'UNIVERSITY OF DHAKA', 0, 'C', false);
$this->SetFont('Arial', 'B', 15);
$this->Multicell(160,8,'INSTITUTE OF INFORMATION TECHNOLOGY', 0, 'C', false);
$this->Image('../../img/logo_du.jpg',97,38, 20);

//Background watermark image
$this->Image('../../img/du_logo.jpg',58,90,105,150);


//$this->Multicell(160,6,'Human Resources Division', 0, 'C', false);

        }
function reference($sl, $date){
    $this->SetFont('Arial', 'I', 9);    
    $this->Multicell(170,15,'Ref No. DU-IIT/Testimonial - '.$sl.'/'.$date, 0, 'L', false);

$this->SetFont('Arial', 'B', 22);
$this->Multicell(160,30,'', 0, 'C', false);
$this->Multicell(160,10,'Testimonial', 0, 'C', false);
$this->SetFont('Arial', 'B', 11);
}        
        
        // Page footer
function Footer()
        {
            
            
    $foots = 'Institute of Information Technology, University of Dhaka';
            $this->SetFont('Arial', 'BI', 10);
            // Position at 1.5 cm from bottom
            $this->SetY(-22);
            // Page number           
            
            $this->SetFont('Arial', 'I', 8);
           
             $this->MultiCell(170, 3, 'This Testimonial is not a document to use. It is only an assignment of Md. Shahar Ali, PGDIT-20 batch.', 0, 'L', false);
    //$this->Image('../../img/iit_2.jpg', 175,273,-503);
            
            
        }
    }

    if($gender == 'Male'){
        $He = 'He';
        $he = 'he';
        $him = 'him';
        $His = 'His';
        $his = 'his';
        $son = 'son';
    }else{
         $He = 'She';
        $he = 'she';
        $him = 'her';
        $His = 'Her';
        $his = 'her';
        $son = 'daughter';
    }
    
    $para_1 = 'This is to certify that '.$name.', '.$son.' of '.$father.', '.$paddress.' was a student of this Institute. '.$He.' obtained the Degree of '.$class.' in '.$subject.' bearing roll no. '.$roll.' from this University in '.$pyear.'.';

    $para_2 = 'I found '.$him.' an intellegent and hard-working student. '.$His.' conduct and progress in the class had been satisfactory. '.$He.' bears a good moral character. To the best of my knowledge '.$he.' did not take part in any activity subversive of the state or of discipline.';
    $wish = 'I wish '.$him.' all success in life.';
    
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->SetMargins(25, 15.4, 15.4); 
            
    $pdf->AddPage();            
    

    $pdf->reference($test_id, $year_testimonial);
    $pdf->SetFont('Arial', 'I', 15);
    $pdf->MultiCell(170, 10, '', 0, 'J', false);
    $pdf->MultiCell(170, 10, $para_1, 0, 'J', false);
    $pdf->MultiCell(170, 10, '', 0, 'J', false);
    $pdf->MultiCell(170, 10, $para_2, 0, 'J', false);
    $pdf->MultiCell(170, 10, '', 0, 'J', false);
    $pdf->MultiCell(170, 10, $wish, 0, 'J', false);

    $pdf->MultiCell(170, 20, '', 0, 'J', false);


    $pdf->Image('../../img/chairman.jpg',143,195,30,20);
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(85, 5, '', 0, 'C', false);
    $pdf->MultiCell(85, 5, 'Chairman', 0, 'C', false);
    $pdf->Cell(85, 5, 'Prepared by: '.$prepared_by, 0, 'C', false);
    $pdf->MultiCell(85, 5, 'Institute of Information Technology', 0, 'C', false);
    $pdf->Cell(85, 5, 'Date: '.$testimonial_date, 0, 'C', false);
    $pdf->MultiCell(85, 5, 'University of Dhaka', 0, 'C', false);
   
            
    $pdf->output();
    
    
    
    
    }}
    
} else {
    $msg        = "Data not Found";
    $msgdetails = 'Please check that the data you inserted is correct! Or contact to your system provider.';
    
    require('../fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 30);
    $pdf->MultiCell(200, 8, $msg, 0, 'C', false);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->MultiCell(200, 8, $msgdetails, 0, 'J', false);
    $pdf->output();
}

?>

