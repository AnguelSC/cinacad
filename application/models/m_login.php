<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
   
    var $details;
    public function getLogin($username,$password)
    {
    //comprobamos que el nombre de usuario y contraseña coinciden
        $this->db->from('usuarios');
        $this->db->where('username',$username );
        $this->db->where( 'password', $password );
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 ) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'nombres'=>$this->details->nombres,
                'apellidos'=>$this->details->apellidos,
                'telefono'=>$this->details->telefono,
                'email'=>$this->details->email,
                'isLoggedIn'=>true
            )
        );
    }

   
    public function isLogged()
    {
    //Comprobamos si existe la variable de sesión username. En caso de no existir, le impediremos el paso a la página para usuarios registrados
   
        if(isset($this->session->userdata['username']))
        {
        return TRUE;
        }
        else
        {
        return FALSE;
        }
       
    }
   
    public function close()
    {
    //cerrar sesión
    return $this->session->sess_destroy();
    }

    function fill_session_data($data){
        $data['id'] = $this->session->userdata('id');
        $data['nombres'] = $this->session->userdata('nombres');
        $data['apellidos'] = $this->session->userdata('apellidos');
        $data['telefono'] = $this->session->userdata('telefono');
        $data['username'] = $this->session->userdata('username');
        return $data;
    }
}