<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FacturaL extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("ventas");
    }
 
    public function fetch_user($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("ventas");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function getallfac() {
        $query = $this->db->get("ventas");
 
        if ($query->num_rows() > 0) {
            $data[]=array('id'=>'id');
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}