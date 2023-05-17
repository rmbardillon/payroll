<?php
require('../../libs/plugins/fpdf/fpdf.php');
include_once('../../config/database.php');
include_once('../../data/model/Report.php');

$Report = new Report($conn);

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo image
        $this->Image('../../libs/images/logo.png', 10, 10, 20, 20);
        
        // Company information
        $this->SetFont('Arial','B',12);
        $this->Cell(30);
        $this->Cell(0,10,'Lucas Pizza',0,1);
        $this->SetFont('Arial','',10);
        $this->Cell(30);
        $this->Cell(0,5,'Savor the Slice, Delight in Every Bite!',0,1);
        $this->Cell(30);
        $this->Cell(0,5,'Labuin, Sta. Cruz Laguna',0,1);
        
        // Line break
        $this->Line(10, 40, 200, 40);
        $this->Ln(15);
    }
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

if(isset($_GET['from'])){

    $from = $_GET['from'];
    $to = $_GET['to'];
    $fromDate = date('M j, Y', strtotime($from));
    $toDate = date('M j, Y', strtotime($to));
    $result = $Report->getAllEmployeesSalaryReport($from, $to);
}

// Instanciation of inherited class
$pdf = new PDF('P', 'mm', "Legal");
$pdf->AliasNbPages();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','B',12);

// Row 1
if(isset($_GET['from'])){
    $pdf->Cell(0,6,strtoupper('EMPLOYEES SALARY FROM '.$fromDate." TO ".$toDate),0,1,'C');
} else {
    $pdf->Cell(0,6,strtoupper('EMPLOYEES SALARY FROM FROMDATE TO TODATE'),0,1,'C');
}

// Line break
$pdf->Ln(1);

// Set font
$pdf->SetFont('Arial','B',7);

$pdf->Cell(13,10,'No.',1,0,'C');
$pdf->Cell(87,10,'Full Name',1,0,'C');
$pdf->Cell(30,10,'Total Hours Worked',1,0,'C');
$pdf->Cell(30,10,'Salary Rate',1,0,'C');
$pdf->Cell(30,10,'Total Salary',1,1,'C');

if(isset($_GET['from'])){
    $i = 1;
    foreach($result as $key => $value)
    {
        $pdf->Cell(13,7,$i,1,0,'C');
        $pdf->Cell(87,7,$value['FULL_NAME'],1,0,'C');
        $pdf->Cell(30,7,$value['TOTAL_HOURS_WORKED'],1,0,'C');
        $pdf->Cell(30,7,$value['SALARY_RATE']." Pesos",1,0,'C');
        $pdf->Cell(30,7,$value['TOTAL_SALARY']." Pesos",1,1,'C');
        $i++;
    }
} else {
    for ($i = 1; $i <= 10; $i++)
    {
        $pdf->Cell(13,7,$i,1,0,'C');
        $pdf->Cell(87,7,"value",1,0,'C');
        $pdf->Cell(30,7,"value",1,0,'C');
        $pdf->Cell(30,7,"value",1,0,'C');
        $pdf->Cell(30,7,"value",1,1,'C');
    }
}

// Line break
$pdf->Ln(5);
// echo($pdf->GetY());
if($pdf->GetY() > 258.00125)
{
    $pdf->AddPage();
}
// First column
$pdf->SetXY(10, $pdf->GetY());
$pdf->Cell(70, 5, 'PREPARED BY:', 0, 1);
$pdf->Cell(50, 5, "", 0, 1, 'C');
$pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 50, $pdf->GetY());
$pdf->Cell(70, 5, 'Signature over Printed Name', 0, 1);
$pdf->Cell(8, 5, 'DATE:', 0, 0);
// Set Font
$pdf->SetFont('Arial','U',7);
$pdf->Cell(62, 5,date("Y/m/d") , 0, 1);
$pdf->Ln(5);

// Set font
$pdf->SetFont('Arial','B',7);

$pdf->Cell(70, 5, 'RECEIVED BY:', 0, 1);
$pdf->Cell(50, 5, "", 0, 1, 'C');
$pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 50, $pdf->GetY());
$pdf->Cell(70, 5, 'Signature over Printed Name', 0, 1);
$pdf->Cell(8, 5, 'DATE:', 0, 0);
// Set Font
$pdf->SetFont('Arial','U',7);
$pdf->Cell(62, 5, "", 0, 1);
$pdf->Ln(5);

$pdf->Output();
?>