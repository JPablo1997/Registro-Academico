<?php
class Inscripcion_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getInscripciones()
    {
        $query = $this->db->get('alm_alumno');
        $alumnos = $query->result_array();
        $inscripciones = [];

        foreach($alumnos as $alumno)
        {
            $this->db->where('grd_id', $alumno['alm_id_grd']);
            $query = $this->db->get('grd_grado');
            $grado = $query->row_array();

            $this->db->where('mxg_id_grd', $grado['grd_id']);
            $query = $this->db->get('mxg_materiasxgrado');
            $materiasGrado = $query->result_array();

            $materias = '';
            foreach($materiasGrado as $materiaGrado)
            {
                $this->db->where('mat_id', $materiaGrado['mxg_id_mat']);
                $query = $this->db->get('mat_materia');
                $materia = $query->row_array();

                $materias .= $materia['mat_nombre'] . ' '; 
            }

            $inscripciones[] = array(
                'alumno' => $alumno,
                'grado' => $grado,
                'materias' => $materias
            );

        }

        return $inscripciones;
    }

    public function getInscripcionesById($id)
    {
        if($id > 0)
            $this->db->where('alm_id', $id);

        $query = $this->db->get('alm_alumno');
        $alumnos = $query->result_array();
        $inscripciones = [];

        foreach($alumnos as $alumno)
        {
            $this->db->where('grd_id', $alumno['alm_id_grd']);
            $query = $this->db->get('grd_grado');
            $grado = $query->row_array();

            $this->db->where('mxg_id_grd', $grado['grd_id']);
            $query = $this->db->get('mxg_materiasxgrado');
            $materiasGrado = $query->result_array();

            $materias = '';
            foreach($materiasGrado as $materiaGrado)
            {
                $this->db->where('mat_id', $materiaGrado['mxg_id_mat']);
                $query = $this->db->get('mat_materia');
                $materia = $query->row_array();

                $materias .= $materia['mat_nombre'] . ' '; 
            }

            $inscripciones[] = array(
                'alumno' => $alumno,
                'grado' => $grado,
                'materias' => $materias
            );

        }

        return $inscripciones;
    }
}