<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class usuarios extends CI_Controller 
{
    public function __construct() {
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
 
    public function index() {

        $this->lista();
    }
    public function lista(){
        if ($this->tank_auth->is_admin_in()) {
            $config = array();
            $config["base_url"] = base_url() . "usuarios/lista/";
            $config["total_rows"] = $this->UserL->record_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            $config['next_link'] = "&raquo;";
            $config['prev_link'] = '&laquo;';
            $config["num_tag_open"]  = $config['next_tag_open'] =  $config['prev_tag_open'] ='<li>';
            $config['num_tag_close'] = $config['prev_tag_close'] ="</li>";
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->UserL->
                fetch_user($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $data['title'] = 'Listado usuario';
            $data['countuser'] =  $this->UserL->record_count();
            $data['countfac'] =  $this->facturaL->record_count();
            $data['menu'] = '1_3';
            $data['att'] = array('class' => 'bs-example form-horizontal');
            $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
            $this->load->view('header_tpl',$data);
            $this->load->view("admin/userlist", $data);
            $this->load->view('footer_tpl',$data);
        }
    }
    public function ver($username){
        if (!$this->tank_auth->is_admin_in()) {
            redirect('/');
        }
        $data = array();
        $data = $this->m_perfil->user($username,$data);
        if ($data) {
            echo json_encode($data);
        }
        
    }
    public function nuevo(){
        if (!$this->tank_auth->is_admin_in()) {
            redirect('/');
        }
        $id = $this->tank_auth->get_user_id();
        $type_admin = $this->UserL->type_admin($id);
            if ($type_admin == 0) {

                if(isset($_POST['username'])){
                    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[4]|max_length[30]');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[30]');
                    if($this->form_validation->run()){
                        if (!is_null($data = $this->tank_auth->create_user($this->form_validation->set_value('username'),
                        $this->form_validation->set_value('email'),
                        $this->form_validation->set_value('password'),
                        FALSE))) { 
                            $data['title'] = 'Nuevo usuario';
                            $data['countuser'] =  $this->UserL->record_count();
                            $data['countfac'] =  $this->facturaL->record_count();
                            $data['menu'] = '1_1';
                            $data['att'] = array('class' => 'bs-example form-horizontal');
                            $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                            $data['success'] = TRUE;
                            $this->load->library('email');
                            $this->email->from('design.anguel@gmail.com', 'Miguel Angel Sirlopu Cumpa');
                            $this->email->to($this->form_validation->set_value('email')); 

                            $this->email->subject('Bienvenido a CINACAD');
                            $msg = 'Bienvenido a CINACAD</br> Le agradecemos su eleccion. En estos momentos le hemos generado una cuenta para que pueda acceder a nuestro sistema, porfavor sirvase a verificarla en la brevedad.<br>Debe dirigirse a (http://) e iniciar session con los siguientes datos.<br>Su usuario es:'.$this->form_validation->set_value('username').'<br>Contraseña:'.$this->form_validation->set_value('password');
                            $this->email->message($msg);  

                            $this->email->send();

                            $data['send_email'] =  $this->email->print_debugger();
                            $this->load->view('header_tpl',$data);
                            $this->load->view('admin/g_agrega_user',$data);
                            $this->load->view('footer_tpl',$data);
                        } else{
                            $data['title'] = 'Nuevo usuario';
                            $data['countuser'] =  $this->UserL->record_count();
                            $data['countfac'] =  $this->facturaL->record_count();
                            $data['menu'] = '1_1';
                            $data['att'] = array('class' => 'bs-example form-horizontal');
                            $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                            $this->load->view('header_tpl',$data);
                            $this->load->view('admin/g_agrega_user',$data);
                            $this->load->view('footer_tpl',$data);
                        }    

                    }else{
                            $data['title'] = 'Nuevo usuario';
                            $data['countuser'] =  $this->UserL->record_count();
                            $data['countfac'] =  $this->facturaL->record_count();
                            $data['menu'] = '1_1';
                            $data['att'] = array('class' => 'bs-example form-horizontal');
                            $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                            $this->load->view('header_tpl',$data);
                            $this->load->view('admin/g_agrega_user',$data);
                            $this->load->view('footer_tpl',$data);
                        }   
                }else{
                $data['title'] = 'Nuevo usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_1';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_agrega_user',$data);
                $this->load->view('footer_tpl',$data);
                }
            }else{
              redirect('/');  
            }
    }

    public function editar(){
        if (!$this->tank_auth->is_admin_in()) {
            redirect('/');
        }
        $id = $this->tank_auth->get_user_id();
        $type_admin = $this->UserL->type_admin($id);
            if ($type_admin == 0) {
                if (isset($_POST['username'])) {
                    $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|min_length[4]|max_length[30]');
                    $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
                    $this->form_validation->set_rules('password', 'Password', 'xss_clean');
                    $this->form_validation->set_rules('baneado', 'Baneado', 'xss_clean');
                    $datos = array(
                        'email'  => $_POST['email'],
                        'banned'          => (isset($_POST['baneado'])) ? 1 : 0,
                         );
                    if($this->form_validation->run()){
                   
                        $this->UserL->set_all_user($_POST['username'],$datos);
                        $data['title'] = 'Nuevo usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['success'] = 'de lujo';
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                    }else{
                        $data['title'] = 'Nuevo usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                    }
                }else{
                    $data['title'] = 'Nuevo usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                }
                
        }
    }
     public function notificar(){
        if (!$this->tank_auth->is_admin_in()) {
            redirect('/');
        }
        $id = $this->tank_auth->get_user_id();
        $type_admin = $this->UserL->type_admin($id);
            if ($type_admin == 0) {
                if (isset($_POST['username'])) {
                    $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|min_length[4]|max_length[30]');
                    $this->form_validation->set_rules('mensaje', 'mensaje', 'xss_clean|required|max_length[300]');
                    if($this->form_validation->run()){
                        $user_mail = $this->db->get_where('users',array('username',$_POST['username']));
                        $mail = $user_mail->row();
                        $this->load->library('email');

                        $this->email->from('design.anguel@gmail.com', 'Developer Team');
                        $this->email->to($mail->email); 

                        $this->email->subject('Saludos de CINACAD');
                        $this->email->message($_POST['mensaje']);  

                        $this->email->send();
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['success'] = 'de lujo';
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                    }else{
                        $data['title'] = 'Notificar a usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                    }
                }else{
                    $data['title'] = 'Notificar a usuario';
                $data['countuser'] =  $this->UserL->record_count();
                $data['countfac'] =  $this->facturaL->record_count();
                $data['menu'] = '1_2';
                $data['att'] = array('class' => 'bs-example form-horizontal');
                $data['users'] = $user = $this->db->get('users');
                $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
                $this->load->view('header_tpl',$data);
                $this->load->view('admin/g_editar_user',$data);
                $this->load->view('footer_tpl',$data);
                }
                
        }
    }

    public function check_user(){
        if (isset($_POST['username'])) {
            $user = $this->db->get('users');
            $n = 0;
            foreach ($user->result() as $row) {
                if ($_POST['username']==$row->username) {
                    echo 1;
                    $n=1;
                }
            }
            if ($n=0) {
                echo 0;
            }

        }
    }
}