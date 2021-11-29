<?php
require RaizDIR.'/FPDF/fpdf.php';

class PDF extends FPDF
{
  public $tittle2 = '';
// Page header
function Header()
{
    $hoy = date("F j, Y");
    // Logo
    //$this->Image('logo.png' ,0,0,60,60, 'png');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(90);
    // Title
    $this->Cell(90,10,$this->tittle2,1,0,'C');
    $this->Cell(40);
    $this->Cell(55,10,$hoy,0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
  $this->SetY(-35);
  $this->Cell(50);
  $this->Cell(80,10,'Dir. Talento Humano','T',0,'C');
  $this->Cell(15);
  $this->Cell(80,10,utf8_decode('Coordinador de Capacitación'),'T',0,'C');
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

?>
