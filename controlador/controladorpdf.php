<?php
require_once 'modelo/profesor.php';
require_once 'modelo/reto.php';
require_once 'modelo/pdf.php';

class ControladorPDF
{
    private $modeloprofesores;
    private $modeloretos;

    public function __construct()
    {
        $this->modeloprofesores = new Profesor();
        $this->modeloretos = new Reto();
    }

    public function index()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        require_once 'vista/headeruser.php';
        require_once 'vista/pdf/index.php';
    }

    public function generarretos()
    {
        $retos = $this->modeloretos->listarRetos();
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $header = array('Nombre', 'Profesor', 'Dirigido', 'Inicio Reto', 'Fin Reto');
        $pdf->tablaretos($header, $retos, $this->modeloprofesores);
        $pdf->Output('retos.pdf', 'D');
    }

    public function generarprof()
    {
        $profesores = $this->modeloprofesores->listar();
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $header = array('Nombre', 'Correo', 'Pass');
        $pdf->tablaprofesores($header, $profesores);
        $pdf->Output('profesores.pdf', 'D');
    }
}
