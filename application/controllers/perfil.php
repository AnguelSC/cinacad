<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {
	public function __construct()
    {
	    parent:: __construct();
	    $this->load->model('m_perfil');
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }
	public function index()
	{
	   	if($this->tank_auth->is_logged_in())
	    {
			$data['title'] = 'Configuraciones';
	    	$data['att'] = array('class' => 'bs-example form-horizontal');
		    $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
			$this->load->helper('html');
			$this->load->view('header_tpl.php',$data);
			if(!isset($_POST['password'])) {
				$this->load->view('perfil',$data);
				$this->load->view('footer_tpl.php',$data);
			}else{
				$this->form_validation->set_rules('nombres','Nombres','min_lenght[1]|max_lenght[30]|xss_clean');
				$this->form_validation->set_rules('apellidos','Apellidos','min_lenght[1]|max_lenght[30]|xss_clean');
				$this->form_validation->set_rules('password','Password','trim|required|xss_clean|matches[password]');
				if ($this->tank_auth->chekiar_password($_POST['password'])) {
					if ($_POST['nombres']) {
						$datos['nombres'] = $_POST['nombres'];
					}else{
						$datos['nombres'] = $data['nombres'];
					}
					if ($_POST['apellidos']) {
						$datos['apellidos'] = $_POST['apellidos'];
					}else{
						$datos['apellidos'] = $data['apellidos'];
					}
					if ($_POST['telefono']) {
						$datos['telefono'] = $_POST['telefono'];
					}else{
						$datos['telefono'] = $data['telefono'];
					}
					if($this->form_validation->run()){
						$hola = $this->m_perfil->set_datos($this->tank_auth->get_user_id(),$datos);        
						if ($hola) {
							$hola['title'] = $data['title'];
							$hola['att'] = $data['att'];
							$hola['success'] = 'exito';
						    	$this->load->view('perfil',$hola);
						    	$this->load->view('footer_tpl.php',$hola);
						    }else{
						    	redirect('/error/', 'refresh');
						    } 
		                
					}
				}else{
						$hola['success'] = 'error al validar contraseña';
				    	$this->load->view('perfil',$hola);
				    	$this->load->view('footer_tpl.php',$hola);
				}
			}
		}else{
			redirect('/login/', 'refresh');
		}

	}
	function do_upload() {	
		/* Upload Settings */
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '3052';
		$config['width'] = '128';
		$config['max_height']  = '2872';
		/* Encrypting helps prevent the file name from being discerned once its saved */
		$config['encrypt_name'] = 'TRUE';
	 
		/* Load the CodeIgniter upload library, feed it the config from above */
		$this->load->library('upload', $config);
	 
		/* Checks if the do_upload function has been successfully executed ...
		... and if not, shows the upload form and any errors (if they exist) */
		if (!$this->upload->do_upload()){
	 
		 
		$this->load->model('tank_auth/users','foo');
	 
		
		$user_id = $this->tank_auth->get_user_id();
	 
	
		$profile_data = (array) $this->foo->get_profile_by_id($user_id);
	 
		
		$data = $profile_data;
	 
		
		$error = array('error' => $this->upload->display_errors());
	 
		echo json_encode(array('msg' => $error));
	 
		} else{ 
	 
		/* Load the users model, assign it alias 'foo' (or whatever you want) */
		$this->load->model('tank_auth/users','foo');
	 
		/* Assign logged-in user ID to a nice, clean variable */
		$user_id = $this->tank_auth->get_user_id();
	 
		/* Assign the upload's metadata (size, dimensions, destination, etc.) ...
		... to an array with another nice, clean variable */
		$upload = (array) $this->upload->data();
	 
		/* Assign's the user's profile data to yet another nice, clean variable */
		$profile_data = (array) $this->foo->get_profile_by_id($user_id);
	 
		/* Uses two upload library features to assemble the file name (the name, and extension) */
		$filename = $upload['raw_name'].$upload['file_ext'];
	 
		/* Same with the thumbnail we'll generate, but with the suffix '_thumb' */
		$thumb = $upload['raw_name']."_thumb".$upload['file_ext'];
	 
		/* Set the rules for the upload */
		$config['image_library'] = 'gd2';
		$config['source_image']	= "./uploads/".$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 128;
		$config['height']	= 128;
	 
		/* Load "image manipulation library", see CodeIgniter user guide */
		$this->load->library('image_lib', $config);
	 
		/* Resize the image! */
		$this->image_lib->resize();
	 
		/* Assign upload_data to $data variable */
		$data['upload_data'] = $this->upload->data();
	 
		/* Assign profile_data to $data variable */
		$data['profile_data'] = $profile_data;
	 
		/* Runs the users model (update_photo function, see below) and ...
		... loads the location of the photo new photo into user's profile */
		$this->foo->update_photo($user_id, $filename, $thumb);
	 
		/* Load "success" view with all the data! */
		 echo json_encode(array('msg' => $thumb));
	 
		}
	}
}
