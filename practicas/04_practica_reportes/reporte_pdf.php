<?php
require('fpdf186/fpdf.php');
require('conexion.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',15);
        
        $this->Cell(60);
        
        $this->Cell(70,10,'Reporte de Alumnos',1,0,'C');
        
        $this->Ln(20);
        
        $this->SetFont('Arial','B',10);
        $this->Cell(20, 10, 'ID', 1, 0, 'C');
        $this->Cell(80, 10, 'Nombre', 1, 0, 'C');
        $this->Cell(40, 10, 'Asistencia %', 1, 0, 'C');
        $this->Cell(40, 10, 'Nota Final', 1, 1, 'C'); 
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

$consulta = "SELECT * FROM alumnos";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages(); 
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(80, 10, utf8_decode($row['nombre']), 1, 0, 'L'); 
    $pdf->Cell(40, 10, $row['asistencia'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['nota'], 1, 1, 'C');
}

$pdf->Output();
?>