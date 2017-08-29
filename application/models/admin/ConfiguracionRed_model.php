<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ConfiguracionRed_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar la configuracion de red de un equipo en la tabla hardware
	 * 
	 * @param  array  datos de configuracion de la red de un equipo

	 */
        public function ingresar_configuracion($configuracion){
            		$this->db->insert('configuracion_red',$configuracion);
                
                if( $this->db->affected_rows() == 1 ){
                        return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                /**
	 * Obtener la configuracion de red de un equipo 
	 * 
	 * @param  array  placa del equipo a buscar configuracion

	 */
       public function obtener_configuracion($placa){
       
       $query = $this->db->query("SELECT nombre_equipo,dominio,en_red,id_nombre_red,dhcp,ip_fija,mac_fija,mac_inalambrica FROM configuracion_red where id_placa='".$placa."';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else
            return false;
    }
}