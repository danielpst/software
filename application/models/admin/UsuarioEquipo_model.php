<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UsuarioEquipo_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingrar un usuario a un equipo	 * 
	 * @param  array  datos del usuario ingresar

	 */
        public function ingresar_usuario($equipo){
            		$this->db->insert('usuario_equipo',$equipo);
                
                if( $this->db->affected_rows() == 1 ){
                    return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
}