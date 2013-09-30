<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Venta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array('m_perfil', 'm_venta'));
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}

	function index()
	{
		if ($this->tank_auth->is_admin_in()) {
			redirect('/private/');
		}
		$data['local'] = $this->db->get_where('torres', array('activo' => 1));

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['title'] = 'Seccion Ventas';
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
			$this->load->helper('html');
			$this->load->view('header_tpl',$data);
			$this->load->view('venta',$data);
			$this->load->view('footer_tpl',$data);
		}
	}
	
	function procesar_horas($fecha, $horas, $operando = false){
		 list($fecha, $tiempo) = explode(' ', $fecha);
		 list($anio, $mes, $dia) = explode('-', $fecha);
		 list($hora, $minutos, $segundos) = explode(':', $tiempo);
		 
		 if($operando){
		  $nueva_fecha = mktime($hora, $minutos, $segundos, $mes, $dia, $anio) + 0 - $horas * 60 * 60;
		 }
		 else{
		  $nueva_fecha = mktime($hora, $minutos, $segundos, $mes, $dia, $anio) + 0 + $horas * 60 * 60;
		 }
		 
		 return date("Y-m-d H:i:s", $nueva_fecha);
	}
	function process(){
		$data['local'] = $this->db->get_where('torres', array('activo' => 1));
		if($this->tank_auth->is_logged_in()){
			$data['title'] = 'Seccion Ventas';
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
			if(!isset($_POST['password'])) {
				$this->index();
			}else{
				$this->form_validation->set_rules('edificio','Edificio','required');
				$this->form_validation->set_rules('departamento','Departamento','required');
				$this->form_validation->set_rules('password','Password','trim|required|xss_clean|matches[password]');
				if ($this->tank_auth->chekiar_password($_POST['password'])) {
					$datos = array(
						'user_id' 		=> $this->tank_auth->get_user_id(),
						'edificio' 		=> $_POST['edificio'],
						'departamento' 	=> $_POST['departamento'],
						'total' 		=> 0,
						'estado' 		=> -1,
						 );
					
					if($this->form_validation->run()){
						$this->db->insert('ventas', $datos); 
						$option = $this->db->get_where('ventas',array(
							'edificio' 		=> $_POST['edificio'],
							'departamento' 	=> $_POST['departamento'],
							));
						$option2 = $option->row();
						$acumulador = 0;
						if (isset($_POST['suministros'])) {
							foreach ($_POST['suministros'] as $key) {
								$jala_precio = $this->db->get_where('suministros',array('id'=> $key));
								$j_precio = $jala_precio->row();
								$acumulador += $j_precio->precio;
								$datos2 = array(
									'fac_id' => $option2->id,
									'sum_id' => $key,
								 );
								$this->db->insert('user_suministros',$datos2);
							}
						}
						
						$get_precio = $this->db->get_where('torres',array('id' => $_POST['edificio']));
						$precio = $get_precio->row();
						$total = $precio->precio + $acumulador;
						$this->db->where(array('edificio'=> $_POST['edificio'],'departamento'=> $_POST['departamento']));
						$this->db->update('ventas',array('total'=>$total));
						redirect('/', 'refresh');
					}else{
						$this->index();
					}
				}else{
					$this->index();
				}
			}
		}
	}
	public function buscadep(){
		if(isset($_POST['edificio'])) {
			$data = $this->m_venta->buscaedificio($_POST['edificio']);
			$dpto = $this->db->get_where('torres', array('id' => $_POST['edificio']));
			
			foreach ($dpto->result() as $k) {
				$inicio = $k->dpto;
				$numero = $k->dpto_f;
			}
			if ($data) {
				$sw=0;
				for ($i=$inicio; $i <=$numero ; $i++) {
					echo '<option';
					foreach ($data as $key) {
						if ( $i == $key ) {
							echo ' disabled';
						}else{
							echo '';
						}
					}
					echo '>'.$i.'</option>';	
				}
			}else{
				for ($i=$inicio; $i <=$numero ; $i++) { 
					echo '<option>'.$i.'</option>';
				}
			}
		}
	}
	public function buscaprecio(){
		if(isset($_POST['edificio'])) {
			echo $this->m_venta->buscaprecioedi($_POST['edificio']);

		}
	}
	public function buscasuministros(){
		if(isset($_POST['edificio'])) {
			$data = $this->db->get_where('suministros',array('torre_id'=>$_POST['edificio']));
			echo'<div class="form-group">
                <label for="suministros" class="col-lg-3 control-label">Suministros</label>
                <div class="col-lg-9">Mantenga la tecla <a href="" class="btn btn-danger btn-xs">CTRL</a> precionada y seleccione los items que desea.<select name="suministros[]" class="form-control" multiple="multiple">';
			foreach ($data->result() as $row) {
				echo'
				<option value="'.$row->id.'">'.$row->nombre.'</option> 
                  ';
                 /* if (($row->adicional)) {
                  	echo'( '.$row->adicional.')';
                  }*/
			}
			echo'</select></div></div>
              </div>';
		}
	}
	
}
