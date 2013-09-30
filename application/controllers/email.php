<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct()
    {
	    parent:: __construct();
	    $this->load->model(array('m_perfil'));
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }
	public function index()
	{
		$id = $this->tank_auth->get_user_id();
	    	$data['title'] = 'Bienvenido';
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($id,$data);
		    $this->db->order_by("id", "asc"); 
		   	$data['query'] = $this->db->get_where('ventas', array('user_id' => $id));
			$this->load->helper('html');
			$this->load->view('header_tpl',$data);
			$this->load->view('reporte',$data);
			$this->load->view('footer_tpl',$data);
    }
    
    // settings
	protected 	$sendEmailTo 	= 	'design.anguel@gmail.com';
	protected	$subjectLine 	= 	""; // actually set on line 39.

	// views
	protected 	$formView		= 	'contact';
	protected	$successView	= 	'contact_success';
	protected 	$headerView 	= 	'template/header'; //null to disable
	protected 	$footerView 	= 	'template/footer'; //null to disable

	// other
	public 		$data 			= 	array(); // used for the views


	public function send_mail(){
		$this->subjectLine = "Contact form response from " . $_SERVER['HTTP_HOST'];
		$this->form_validation->set_rules('name', 'Your name', 'trim|required');
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

		if($this->form_validation->run()) {
			// success! email it, assume it sent, then show contact success view.
			$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'design.anguel@gmail.com',
		    'smtp_pass' => 'Losmejores1982+',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->load->library('email');
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to($this->sendEmailTo);
			$this->email->subject($this->subjectLine);
			$this->email->message($this->input->post('message'));
			$this->email->send();
		}
	}
}