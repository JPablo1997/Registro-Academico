<?php
class Alumno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alumno_model');
        $this->load->model('grado_model');
    }

    public function index()
    {
        $data['title'] = "Listado de Alumnos";
        $data['op'] = "A";
        $data['alumnos'] = $this->alumno_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('alumno/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = "Crear Alumno";
        $data['op'] = "A";
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[300]', array(
            'required' => 'El nombre es requerido.',
            'maxlength' => 'El nombre debe poseer como maximo 300 caracteres.'
        )); 

        $this->form_validation->set_rules('edad', 'Edad', 'required|integer|is_natural_no_zero', array(
            'required' => 'La edad es requerida.',
            'integer' => 'La edad es un entero.',
            'is_natural_no_zero' => 'La edad debe ser un valor positivo.'
        ));
        
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|max_length[100]', array(
            'required' => 'El sexo es requerido.',
            'maxlength' => 'El sexo debe poseer como maximo 100 caracteres.'
        )); 

        $this->form_validation->set_rules('grado', 'Grado', 'required|integer|is_natural_no_zero', array(
            'required' => 'El Grado es requerido.',
            'integer' => 'El Grado debe ser un entero.',
            'is_natural_no_zero' => 'Debe seleccionar un grado.'
        )); 

        $this->form_validation->set_rules('observacion', 'Observacion', 'required|max_length[300]', array(
            'required' => 'La observacion es requerida.',
            'maxlength' => 'La observacion debe poseer como maximo 300 caracteres.'
        )); 

        if( $this->form_validation->run() === FALSE)
        {
            $data['grados'] = $this->grado_model->getAll();

            $this->load->view('templates/header', $data);
            $this->load->view('alumno/create',  $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->alumno_model->store();

            $this->load->helper('url');
            redirect('/alumno/index', 'location');
        }
    }

    public function edit($id = 0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = "Actualizar Alumno";
        $data['op'] = "A";
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[300]', array(
            'required' => 'El nombre es requerido.',
            'maxlength' => 'El nombre debe poseer como maximo 300 caracteres.'
        )); 

        $this->form_validation->set_rules('edad', 'Edad', 'required|integer|is_natural_no_zero', array(
            'required' => 'La edad es requerida.',
            'integer' => 'La edad es un entero.',
            'is_natural_no_zero' => 'La edad debe ser un valor positivo.'
        ));
        
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|max_length[100]', array(
            'required' => 'El sexo es requerido.',
            'maxlength' => 'El sexo debe poseer como maximo 100 caracteres.'
        )); 

        $this->form_validation->set_rules('grado', 'Grado', 'required|integer|is_natural_no_zero', array(
            'required' => 'El Grado es requerido.',
            'integer' => 'El Grado debe ser un entero.',
            'is_natural_no_zero' => 'Debe seleccionar un grado.'
        )); 

        $this->form_validation->set_rules('observacion', 'Observacion', 'required|max_length[300]', array(
            'required' => 'La observacion es requerida.',
            'maxlength' => 'La observacion debe poseer como maximo 300 caracteres.'
        )); 

        if( $this->form_validation->run() === FALSE)
        {
            $data['alumno'] = $this->alumno_model->findById($id);
            $data['grados'] = $this->grado_model->getAll();

            $this->load->view('templates/header', $data);
            $this->load->view('alumno/edit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->alumno_model->update();
            
            $this->load->helper('url');
            redirect('/alumno/index', 'location');
        }
    }

    public function delete($id)
    {
        $this->alumno_model->destroy($id);

        $this->load->helper('url');
        redirect('/alumno/index', 'location');
    }
}