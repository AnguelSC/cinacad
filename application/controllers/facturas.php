<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class facturas extends CI_Controller 
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
        $config = array();
        $config["base_url"] = base_url() . "facturas/lista/";
        $config["total_rows"] = $this->facturaL->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = '&laquo;';
        $config["num_tag_open"]  = $config['next_tag_open'] =  $config['prev_tag_open'] ='<li>';
        $config['num_tag_close'] = $config['prev_tag_close'] ="</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->facturaL->
            fetch_user($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'Listado facturas';
        $data['countuser'] =  $this->UserL->record_count();
        $data['countfac'] =  $this->facturaL->record_count();
        $data['att'] = array('class' => 'bs-example form-horizontal');
        $data['getuser'] = $this->UserL->get_user();
        $data['getuserprofile'] = $this->UserL->get_user_profile();
        $data = $this->m_perfil->user($this->tank_auth->get_user_id(),$data);
        $this->load->view('header_tpl',$data);
        $this->load->view("admin/faclist", $data);
        $this->load->view('footer_tpl',$data);
    }
}
}