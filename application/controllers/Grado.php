<?php
class Grado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('grado_model');
    }

    public function index()
    {
        $data['title'] = "Listado de Grados";
        $data['op'] = "G";
        $data['grados'] = $this->grado_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('grado/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]', array(
            'required' => 'El nombre del grado es requerido',
            'max_length' => 'El nombre del grado debe contener como maximo 100 caracteres.'
        ));

        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Creacion de Grado";
            $data['op'] = "G";

            $this->load->view('templates/header', $data);
            $this->load->view('grado/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->grado_model->store();

            $this->load->helper('url');

            redirect('/grado/index', 'location');
        }
    }

    public function edit($id = 0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]', array(
            'required' => 'El nombre del grado es requerido',
            'max_length' => 'El nombre del grado debe contener como maximo 100 caracteres.'
        ));

        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Actualizacion de Grado";
            $data['op'] = "G";
            $data['grado'] = $this->grado_model->findById($id);

            $this->load->view('templates/header', $data);
            $this->load->view('grado/edit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->grado_model->update();

            $this->load->helper('url');

            redirect('/grado/index', 'location');
        }
    }

    public function delete($id)
    {
        $this->grado_model->destroy($id);

        $this->load->helper('url');

        redirect('/grado/index', 'location');
    }
}