<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
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
		if ($this->tank_auth->is_admin_in()) {
			redirect('/privado/');
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
	   
	    if($this->tank_auth->is_logged_in())
	    {
	    	$id = $this->tank_auth->get_user_id();
	    	$data['title'] = 'Bienvenido';
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($id,$data);
		    $this->db->order_by("id", "asc"); 
		   	$data['query'] = $this->db->get_where('ventas', array('user_id' => $id));
			$this->load->helper('html');
			$this->load->view('header_tpl',$data);
			$new = $this->db->get_where('users', array('id' => $id));
			foreach ($new->result() as $row) {
				$id_new = $row->new;
			}
			if($id_new==0)
	    	{
				$this->load->view('home',$data);
			}else{
				$this->load->view('new',$data);
			}
			$this->load->view('footer_tpl',$data);
			/*$fecha = date("Y-m-d H:i:s");
			$compara = $this->comparar_fechas($fecha,'2013-10-12 18:26:47');
			if ($compara==-1) {
				echo ' tiene tiempo de pa gar';
			}elseif ($compara==1) {
				echo 'se vencio el plazo de pago';
			}*/
	    }
	    else
	    {
	    	redirect('/auth/login', 'refresh');
	    }
		
	}
}
