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
            		$this->db->set($equipo)
                        ->insert(db_table('equipo'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Equipo con placa '.$equipo['id_placa']. ' Registrado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
}