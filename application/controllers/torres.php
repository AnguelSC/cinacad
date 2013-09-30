<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class torres extends CI_Controller {
	public function __construct()
    {
	    parent:: __construct();
	    $this->load->model(array("admin/facturaL","admin/UserL","m_perfil","m_torres"));
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }
    public function index()
	{
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		$data['title'] = 'Seccion Zonas';
	    $data['att'] = array('class' => 'bs-example form-horizontal');
	    $data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
		$data['torres'] = $this->db->get_where('torres');
		$data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
		$this->load->view("header_tpl",$data);
		$this->load->view("admin/torres",$data);
		$this->load->view("footer_tpl");
	}
	public function estado()
	{
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		$data['title'] = 'Seccion Zonas';
	    $data['att'] = array('class' => 'bs-example form-horizontal');
	    $data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
		$data['torres'] = $this->db->get_where('torres');
		$data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
		$this->load->view("header_tpl",$data);
		$this->load->view("admin/torres_estado",$data);
		$this->load->view("footer_tpl");
	}
	public function change(){
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		if(!empty($_POST['check_list'])) {
			$torres = $this->db->get_where('torres');
			foreach ($torres->result() as $row) {
		    	foreach($_POST['check_list'] as $check) {
		    		if ($row->id==$check && $row->activo==1) {
		    			$this->db->where('id', $check);
					      $data = array('activo' => 0,
					       );
					      $this->db->update('torres', $data); 
		    		}
		    	}    
		    }   
		}
		redirect('/torres/');
	}
	public function activa($id){
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		if (is_numeric($id)) {
			$torres = $this->db->get_where('torres');
			foreach ($torres->result() as $row) {
				if ($row->id==$id && $row->activo==0) {
					$this->db->where('id', $id);
					      $data = array('activo' => 1,
					       );
					      $this->db->update('torres', $data); 
				}
			}
		}
		redirect('/torres/estado/'); 
	}
	public function desactiva($id){
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		if (is_numeric($id)) {
			$torres = $this->db->get_where('torres');
			foreach ($torres->result() as $row) {
				if ($row->id==$id && $row->activo==1) {
					$this->db->where('id', $id);
					      $data = array('activo' => 0,
					       );
					      $this->db->update('torres', $data); 
				}
			}
		}
		redirect('/torres/estado/'); 
	}
	public function editar($id){
		if (is_numeric($id)) {
			if (isset($_POST['nombre'])) {
				$this->form_validation->set_rules('nombre','Nombre','min_lenght[1]|max_lenght[200]|required|xss_clean');
				$this->form_validation->set_rules('precio','precio','required|xss_clean|decimal');
				$this->form_validation->set_rules('dpto','Numero de departamentos inicial','required|xss_clean|numeric');
				$this->form_validation->set_rules('dpto_f','Numero de departamentos final','required|xss_clean|numeric');
				if($this->form_validation->run()){
					$datos['Nombre']= $_POST['nombre'];
					$datos['precio']= $_POST['precio'];
					$datos['dpto']= $_POST['dpto'];
					$datos['dpto_f']= $_POST['dpto_f'];
					$this->m_torres->editar($id,$datos);
					$data['title'] = 'Modificando';
					$data['success'] = true;
				    $data['att'] = array('class' => 'bs-example form-horizontal');
				    $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
				    $data['countuser'] =  $this->UserL->record_count();
			        $data['countfac'] =  $this->facturaL->record_count();
					$torre = $this->db->get_where('torres',array('id'=>$id));
					foreach ($torre->result() as $k) {
						$data['torre'] = $k;
					}
					$this->load->view("header_tpl",$data);
					$this->load->view("admin/torres_edit",$data);
					$this->load->view("footer_tpl");
					}else{
						$data['title'] = 'Modificando';
				    $data['att'] = array('class' => 'bs-example form-horizontal');
				    $data['countuser'] =  $this->UserL->record_count();
			        $data['countfac'] =  $this->facturaL->record_count();
			        $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
					$torre = $this->db->get_where('torres',array('id'=>$id));
					foreach ($torre->result() as $k) {
						$data['torre'] = $k;
					}
					$this->load->view("header_tpl",$data);
					$this->load->view("admin/torres_edit",$data);
					$this->load->view("footer_tpl");
					}
			}else{
				$data['title'] = 'Modificando';
			    $data['att'] = array('class' => 'bs-example form-horizontal');
			    $data['countuser'] =  $this->UserL->record_count();
		        $data['countfac'] =  $this->facturaL->record_count();
		        $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
				$torre = $this->db->get_where('torres',array('id'=>$id));
				foreach ($torre->result() as $k) {
					$data['torre'] = $k;
				}
				$this->load->view("header_tpl",$data);
				$this->load->view("admin/torres_edit",$data);
				$this->load->view("footer_tpl");
			}
		}
	}
}