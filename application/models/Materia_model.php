<?php
class Materia_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('mat_materia');

        return $query->result_array();
    }

    public function findById($id)
    {
        $this->db->where('mat_id', $id);

        $query = $this->db->get('mat_materia');

        return $query->row_array();
    }

    public function store()
    {
        $data = array(
            'mat_nombre' => $this->input->post('nombre')
        );

        $this->db->insert('mat_materia', $data);
    }

    public function update()
    {
        $data = array(
            'mat_nombre' => $this->input->post('nombre')
        );

        $this->db->where('mat_id', $this->input->post('id'));
        $this->db->update('mat_materia', $data);
    }

    public function destroy($id)
    {
        if($this->hasRelations($id) == TRUE){
            return;
        }

        $this->db->delete('mat_materia', array('mat_id' => $id));
    }

    public function hasRelations($materia_id)
    {
        $this->db->where('mxg_id_mat', $materia_id);
        $query = $this->db->get('mxg_materiasxgrado');
        $result = $query->result_array();
        
        if(empty($result))
            return FALSE;
        else
            return TRUE;
    }
}