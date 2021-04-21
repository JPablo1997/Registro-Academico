<?php
class Materia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('materia_model');
    }

    public function index()
    {
        $data['title'] = "Listado de Materias";
        $data['op'] = "M";
        $data['materias'] = $this->materia_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('materia/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]', array(
            'required' => 'El nombre de la materia es requerido',
            'max_length' => 'El nombre de la materia debe contener como maximo 100 caracteres.'
        ));

        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Creacion de Materia";
            $data['op'] = "M";

            $this->load->view('templates/header', $data);
            $this->load->view('materia/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->materia_model->store();

            $this->load->helper('url');

            redirect('/materia/index', 'location');
        }
    }

    public function edit($id = 0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]', array(
            'required' => 'El nombre de la materia es requerido',
            'max_length' => 'El nombre de la materia debe contener como maximo 100 caracteres.'
        ));

        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Actualizacion de Materia";
            $data['op'] = "M";
            $data['materia'] = $this->materia_model->findById($id);

            $this->load->view('templates/header', $data);
            $this->load->view('materia/edit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->materia_model->update();

            $this->load->helper('url');

            redirect('/materia/index', 'location');
        }
    }

    public function delete($id)
    {
        $this->materia_model->destroy($id);

        $this->load->helper('url');

        redirect('/materia/index', 'location');
    }
}