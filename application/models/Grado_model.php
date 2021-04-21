<?php
class Grado_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('grd_grado');

        return $query->result_array();
    }

    public function findById($id)
    {
        $this->db->where('grd_id', $id);

        $query = $this->db->get('grd_grado');

        return $query->row_array();
    }

    public function store()
    {
        $data = array(
            'grd_nombre' => $this->input->post('nombre')
        );

        $this->db->insert('grd_grado', $data);
    }

    public function update()
    {
        $data = array(
            'grd_nombre' => $this->input->post('nombre')
        );

        $this->db->where('grd_id', $this->input->post('id'));
        $this->db->update('grd_grado', $data);
    }

    public function destroy($id)
    {
        if($this->hasRelations($id) == TRUE){
            return;
        }

        $this->db->delete('grd_grado', array('grd_id' => $id));
    }

    public function hasRelations($grado_id)
    {
        $this->db->where('mxg_id_grd', $grado_id);
        $query = $this->db->get('mxg_materiasxgrado');
        $result = $query->result_array();
        
        if(empty($result))
            return FALSE;
        else
            return TRUE;
    }
}