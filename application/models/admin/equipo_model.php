<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class equipo_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingrar un equipo en la tabla equipo
	 * 
	 * @param  array  datos del soporte a ingresar

	 */
        public function ingresar_equipo($equipo){
            		$this->db->insert('equipo',$equipo);
                
                if( $this->db->affected_rows() == 1 ){
                        return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
        /*
         * Buscar un equipo
         * @param String placa del equipo a buscar
         */
            public function buscar($placa){
       $query = $this->db->get_where('equipo', array('placa' => $placa));
       
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else
            return false;
    }
}