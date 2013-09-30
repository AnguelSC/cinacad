<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class recibos extends CI_Controller 
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
        $data['title'] = 'Agregar recibos';
        $data['att'] = array('class' => 'bs-example form-horizontal');
        $data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
        $data['torres'] = $this->db->get_where('torres');
        $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
        $this->load->view('header_tpl',$data);
        $this->load->view('admin/recibos',$data);
        $this->load->view('footer_tpl',$data);
    }

    public function busca_edi(){
        if (isset($_POST['edificio'])) {
            $depa = $this->db->get_where('ventas',array('edificio'=>$_POST['edificio']));
            if ($depa) {
               echo '<option>---</option>';
                foreach ($depa->result() as $row) {
                    echo '<option>'.$row->departamento.'</option>';
                }
            }else{
                echo false;
            }
        }
    }
    public function busca_dep(){
        if (isset($_POST['depa'])) {
            $depa = $this->db->get_where('ventas',array(
                'departamento'=>$_POST['depa'],
                'edificio'=>$_POST['edificio']));
            $row = $depa->row();
            $nombresx = $this->UserL->get_nombres($row->user_id);
            $data = array('dep' => $depa->row(),'nombre'=>$nombresx );
           echo json_encode($data);
        }
    }
}