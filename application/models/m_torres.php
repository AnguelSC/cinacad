<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_torres extends CI_Model{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
    public function change($id,$estado){
	    $this->db->where('id', $id);
	      $data = array('activo' => $estado,
	       );
	      $this->db->update('torres', $data); 
	}
	public function editar($id,$data){
		$this->db->where('id', $id);
		$this->db->update('torres', $data); 

		return $data;
	}
	public function get_nombre($id){
		$this->db->where('id', $id);
		$query= $this->db->get('torres'); 
		$row = $query->row();
        return $row->Nombre;
	}
}