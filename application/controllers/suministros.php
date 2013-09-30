<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class suministros extends CI_Controller {
	public function __construct()
    {
	    parent:: __construct();
	    $this->load->model(array("admin/facturaL","admin/UserL","m_perfil","m_torres","admin/m_suministros"));
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }
	public function index()
	{

		$data['title'] = 'Agregar suministros';
	    $data['att'] = array('class' => 'bs-example form-horizontal');
	    $data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
		$data['torres'] = $this->db->get_where('torres', array('activo' => 1));
		$data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
		$this->load->view('header_tpl',$data);
		$this->load->view('admin/suministros',$data);
		$this->load->view('footer_tpl',$data);
	}

	public function nuevo(){
		if (isset($_POST['precio'])) {
			$this->form_validation->set_rules('nombre','Nombre','required|xss_clean');
			$this->form_validation->set_rules('edificio','Edificio','required|xss_clean');
			$this->form_validation->set_rules('precio','Precio','required|xss_clean');
			if($this->form_validation->run()){
				$datos['torre_id']= $_POST['edificio'];
				$datos['nombre']= $_POST['nombre'];
				$datos['precio']= $_POST['precio'];
				$this->m_suministros->insert_datos($datos);
			}
		}
		redirect('/suministros/');
	}
	public function busca_edi(){
		if (isset($_POST['suministro_edi'])) {
			$datos = $this->db->get_where('suministros', array('torre_id' => $_POST['suministro_edi']));
			if ($datos->num_rows() > 0) {
				foreach ($datos->result() as $row) {
				echo '<tr>
					<td>'.$row->id.'</td>
			        <td>'.$row->nombre.'</td>
			        <td>'.$this->m_torres->get_nombre($row->torre_id).'</td>
			        <td>'.$row->precio.'</td>
			      </tr>';
				}
			}else{
				echo '<tr><td colspan="3">No se en contraron resultados</td></tr>';
			}
			
		}
	}
}