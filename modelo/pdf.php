<?php
define('FPDF_FONTPATH', 'assets/font');
require_once('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('assets/fundacion.jpg', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(50, 10, 'WEB RETOS', 1, 0, 'C');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


    function tablaretos($header, $retos, $modeloProfesores)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Cabecera
        $w = array(30, 40, 40, 40, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        foreach ($retos as $reto) {
            $profesor = $modeloProfesores->obtenerNombre($reto->idProfesor);
            $this->Cell($w[0], 6, $reto->nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, iconv('UTF-8', 'windows-1252', $profesor->nombre), 'LR', 0, 'C', $fill);
            // $this->Cell($w[1], 6, $profesor->nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $reto->dirigido, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $reto->fechaInicioReto, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, $reto->fechaFinReto, 'LR', 0, 'C', $fill);

            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    function tablaprofesores($header, $profesores) {
         // Colores, ancho de línea y fuente en negrita
         $this->SetFillColor(255, 0, 0);
         $this->SetTextColor(255);
         $this->SetDrawColor(128, 0, 0);
         $this->SetLineWidth(.3);
         $this->SetFont('', 'B');
         // Cabecera
         $w = array(60, 60, 60);
         for ($i = 0; $i < count($header); $i++)
             $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
         $this->Ln();
         // Restauración de colores y fuentes
         $this->SetFillColor(224, 235, 255);
         $this->SetTextColor(0);
         $this->SetFont('');
         // Datos
         $fill = false;
         foreach ($profesores as $profesor) {
             $this->Cell($w[0], 6, iconv('UTF-8', 'windows-1252', $profesor->nombre), 'LR', 0, 'C', $fill);
             $this->Cell($w[1], 6, $profesor->correo, 'LR', 0, 'C', $fill);
             $this->Cell($w[2], 6, $profesor->pass, 'LR', 0, 'C', $fill);
             $this->Ln();
             $fill = !$fill;
         }
         // Línea de cierre
         $this->Cell(array_sum($w), 0, '', 'T');
    }
}
