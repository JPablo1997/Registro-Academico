<?php
class Alumno_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('alm_alumno');

        return $query->result_array();
    }

    public function findById($id)
    {
        $this->db->where('alm_id', $id);

        $query = $this->db->get('alm_alumno');

        return $query->row_array();
    }

    public function store()
    {
        $data = array(
            'alm_nombre' => $this->input->post('nombre'),
            'alm_edad' => $this->input->post('edad'),
            'alm_sexo' => $this->input->post('sexo'),
            'alm_id_grd' => $this->input->post('grado'),
            'alm_observacion' => $this->input->post('observacion')
        );

        $this->db->insert('alm_alumno', $data);
    }

    public function update()
    {
        $data = array(
            'alm_nombre' => $this->input->post('nombre'),
            'alm_edad' => $this->input->post('edad'),
            'alm_sexo' => $this->input->post('sexo'),
            'alm_id_grd' => $this->input->post('grado'),
            'alm_observacion' => $this->input->post('observacion')
        );

        $this->db->where('alm_id', $this->input->post('id'));
        $this->db->update('alm_alumno', $data);
    }

    public function destroy($id)
    {
        $this->db->delete('alm_alumno', array('alm_id' => $id));
    }
}