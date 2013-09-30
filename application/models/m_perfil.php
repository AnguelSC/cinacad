<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_perfil extends CI_Model{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
    public function set_datos($id,$data){

		$this->db->where('user_id', $id);

		$this->db->update('user_profiles', $data); 

		return $data;
    }
    public function evalua_password($id,$password){
        $query = $this->db->query('SELECT * FROM users WHERE id='.$id.'');
        $row = $query->row();
        if (md5($row->password)==$password) {
            return true;
        }

        return false;
    }
    public function user($id,$data){
        $query = $this->db->query('SELECT * FROM user_profiles WHERE user_id='.$id.'');
        $row = $query->row();
        $data['id'] = $row->id;
        $data['nombres'] = $row->nombres;
        $data['apellidos'] = $row->apellidos;
        $data['telefono'] = $row->telefono;
        $data['thumb'] = $row->thumb;
        $data['direccion'] = $row->direccion;
        $query2 = $this->db->query('SELECT * FROM users WHERE id='.$id.'');
        $row2 = $query2->row();
        $data['username'] = $row2->username;
        $data['dni'] = $row->dni;
        return $data;
    }
    public function change_new($id){
        $this->db->where('id', $id);
        $data = array('new' => 0, );
        $this->db->update('users', $data); 
    }
}