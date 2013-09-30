<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_suministros extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    $this->load->database();
    }
    public function insert_datos($data){
		$this->db->insert('suministros', $data); 
    }
    public function get_datos($id){
        $query = $this->db->get_where('suministros', array('torre_id' => $id));
    $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function get_dep(){

    }
 }