<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserL extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("users");
    }
 
    public function fetch_user($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("users");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function getalluser() {
        $query = $this->db->get("users");
 
        if ($query->num_rows() > 0) {
            $data[]=array('id'=>'id');
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function get_user_profile(){
        $query = $this->db->get("user_profiles");
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row ) {
                $data[$row->user_id] = array(
                    'nombres' => $row->nombres,
                    'apellidos' => $row->apellidos,
                     );
            }
            return $data;
        }
        return false;
   }
   public function get_user(){
        $query = $this->db->get("users");
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row ) {
                $data[$row->id] = array(
                    'username' => $row->username,
                    'email' => $row->email,
                     );
            }
            return $data;
        }
        return false;
   }
   public function get_nombres($id){
    $user = $this->db->get_where('user_profiles',array('user_id'=>$id));
    $name = $user->row();
    return $name;
   }
   function type_admin($id){
        $admin = $this->db->get_where('users',array('id'=>$id));
        $row = $admin->row();
        $n = $row->type_admin;
        return $n;
    }
    public function set_all_user($id,$datos){
        $this->db->where('username', $id);
        $this->db->update('users',$datos);
    }

}