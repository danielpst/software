<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hardware_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar el hardware de un equipo en la tabla hardware
	 * 
	 * @param  array  datos del hardware a ingresar

	 */
        public function ingresar_hardware($equipo){
            		$this->db->insert('hardware',$equipo);
                
                if( $this->db->affected_rows() == 1 ){
                    return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                /**
	 * Obtener el hardware de un equipo 
	 * 
	 * @param  array  placa del equipo a buscar el hardware

	 */
       public function buscar($placa){
       
       $query = $this->db->query("SELECT procesador,marca_disco,capacidad_disco,capacidad_ram FROM hardware where id_placa='".$placa."';");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else
            return false;
    }
}