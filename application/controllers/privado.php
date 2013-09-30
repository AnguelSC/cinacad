<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Privado extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array('admin/UserL','admin/facturaL','m_perfil' ));
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_admin_in()) {
			redirect('/');
		}
		$data['local'] = array(
			'1' => 'condominio parques de villa el salvador',
			'2' => 'condominio parques de carabayllo',
			'3' => 'condominio parques del agustino',
			'4' => 'concominio parques de dan martin',
			'5' => 'condominio central 10.5',
			'6' => 'edificio alessandro',
			'7' => 'edificio toquepala',
			'8' => 'edificio mello franco',
			'9' => 'edificio san Giuliano',
			'10' => 'edificio torre ugarte',
			'11' => 'edificio Francia',
			'12' => 'edificio borgonño',
			'13' => 'edificio toquepala',
			'14' => 'edificio alamos de basadre',
			'15' => 'edificio los cedros',
			'16' => 'edificio los encinos',
			'17' => 'edificio las violetas', );
		
		if($this->tank_auth->is_logged_in()){
			$id = $this->tank_auth->get_user_id();
			$data['title'] = 'Bienvenido';
			$data['countuser'] =  $this->UserL->record_count();
	        $data['countfac'] =  $this->facturaL->record_count();
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($id,$data);
		    $type_admin = $this->UserL->type_admin($id);
		    if ($type_admin == 0) {
			/*$this->load->view('header_tpl',$data);
			$this->load->view('/admin/index',$data);
			$this->load->view('footer_tpl',$data);*/
				$this->general();
			}elseif ($type_admin == 1) {
				$this->central();
			}elseif ($type_admin == 2) {
				$this->local();
			}else{
				redirect('/auth/logout');
			}
			
		} else {
			redirect('/privado/login');
		}
	}       
	function login()
	{	
		if ($this->tank_auth->is_logged_in() AND $this->tank_auth->is_admin_in()) {									// logged in
			redirect('/privado/');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/privado/login/');

		} else {
			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}

			$data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				if ($data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email'])) {								// success
					redirect('/privado/');

				} else {
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/privado/login/');

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				if ($data['use_recaptcha']) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			$data['att'] = array('class' => 'bs-example form-horizontal');
			$data['att2'] = array('class' => 'form-control');
			$data['title'] = "Panel Admin";
			$this->load->view('header_tpl',$data);
			$this->load->view('auth/login_admin', $data);
			$this->load->view('footer_tpl',$data);
		}
	}
	public function data(){
		$user = $this->db->get('users');
		foreach ($user->result() as $row) {
			echo $row->created. "\t" . $row->id. "\n";
		}
		
	}
	private function general(){
		$id = $this->tank_auth->get_user_id();
		$data['title'] = 'Bienvenido';
		$data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
    	$data['att'] = array('class' => 'bs-example form-horizontal');
	    $data = $this->m_perfil->user($id,$data);
		$data['att'] = array('class' => 'bs-example form-horizontal');
		$data['att2'] = array('class' => 'form-control');
		$data['title'] = "Panel Admin";
		$this->load->view('header_tpl',$data);
		$this->load->view('admin/index_g');
	}
	private function central(){
		$id = $this->tank_auth->get_user_id();
		$data['title'] = 'Bienvenido';
		$data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
    	$data['att'] = array('class' => 'bs-example form-horizontal');
	    $data = $this->m_perfil->user($id,$data);
		$data['att'] = array('class' => 'bs-example form-horizontal');
		$data['att2'] = array('class' => 'form-control');
		$data['title'] = "Panel Admin";
		$this->load->view('header_tpl',$data);
		$this->load->view('admin/index_c');
	}
	private function local(){
		$id = $this->tank_auth->get_user_id();
		$data['title'] = 'Bienvenido';
		$data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
    	$data['att'] = array('class' => 'bs-example form-horizontal');
	    $data = $this->m_perfil->user($id,$data);
		$data['att'] = array('class' => 'bs-example form-horizontal');
		$data['att2'] = array('class' => 'form-control');
		$data['title'] = "Panel Admin";
		$this->load->view('header_tpl',$data);
		$this->load->view('admin/index_l');
	}
}
