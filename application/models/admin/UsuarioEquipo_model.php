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
        /*
         * Buscamos usuarios del sistema operativo
         * @param int placa del equipo
         */
        public function buscar($placa) {
                    $query = $this->db->query("SELECT * FROM usuario_equipo where id_placa='".$placa."';");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else{
            return false;
        }
        }
}