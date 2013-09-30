<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
    public function getallrec(){
    	$query = $this->db->get("recibos");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = array(
                    'id' => $row->id,
                    'inicio' => $row->inicio,
                     );
            }
            return $data;
        }
        return false;
    }
}