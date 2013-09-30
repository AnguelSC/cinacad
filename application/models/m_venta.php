<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_venta extends CI_Model{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
    public function set_datos($data){
		$this->db->insert('ventas', $data); 
		return $data;
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
    public function set_estado($id,$fecha){
        $this->db->where('id', $id);
        //$final = $this->procesar_horas($fecha,720,false);
        $data = array('estado' => 0,

         );
        $this->db->update('ventas', $data); 
    }
    public function buscaedificio($id){
        $this->db->where('edificio', $id);
        $query = $this->db->get("ventas");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                    $data[] = $row->departamento;         
            }
            return $data;
        }
        return false;
    }
    public function buscaprecioedi($id){
        $this->db->where('id', $id);
        $query = $this->db->get("torres");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                    echo $row->precio;         
            } 
        }else{
            echo '0000';                                              
        }
    }
    
}