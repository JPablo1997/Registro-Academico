<?php
class Inscripcion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inscripcion_model');
    }

    public function index()
    {
        $data['title'] = "Inscripciones de Alumnos";
        $data['op'] = "I";
        $data['inscripcionesData'] = $this->inscripcion_model->getInscripciones();

        $this->load->view('templates/header', $data);
        $this->load->view('inscripcion/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function inscripciones($id = 0)
    {
        $inscripcionesData = $this->inscripcion_model->getInscripcionesById($id);

        header('Content-Type: application/json');
        echo json_encode( $inscripcionesData );
    }
}