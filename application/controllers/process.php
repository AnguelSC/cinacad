<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class process extends CI_Controller {
	public function __construct()
    {
	    parent:: __construct();
        $this->load->model(array('m_perfil'));
        $this->load->helper("url");
        $this->load->model(array("admin/facturaL","admin/UserL"));
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }
	public function index(){
		$id = $this->tank_auth->get_user_id();
		$new = $this->db->get_where('users', array('id' => $id));
			foreach ($new->result() as $row) {
				$id_new = $row->new;
			}
		if($id_new==1)
    	{
			$id = $this->tank_auth->get_user_id();
			if (isset($_POST['dni'])) {
				$this->form_validation->set_rules('nombres','Nombres','xss_clean');
				$this->form_validation->set_rules('apellidos','Apellidos','xss_clean');
				$this->form_validation->set_rules('dni','DNI','xss_clean');
				$this->form_validation->set_rules('email','Email','xss_clean');
				$this->form_validation->set_rules('telefono','Telefono/cel','xss_clean');
				$this->form_validation->set_rules('direccion','Direccion','xss_clean');
				if($this->form_validation->run()){
					$datos['nombres']= $_POST['nombres'];
					$datos['apellidos']= $_POST['apellidos'];
					$datos['dni']= $_POST['dni'];
					$datos['email']= $_POST['email'];
					$datos['telefono']= $_POST['telefono'];
					$datos['direccion']= $_POST['direccion'];
					$this->m_perfil->set_datos($id,$datos);
					$this->m_perfil->change_new($id);
					redirect('/');
				}else{
					echo validation_errors();
				}
			}else{
				echo 'oli';
			}
		}
	}
}