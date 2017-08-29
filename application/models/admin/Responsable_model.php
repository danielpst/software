<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Responsable_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingrar un responsable de un equipo	 * 
	 * @param  array  datos del usuario ingresar

	 */
        public function ingresar_responsable($responsable){
            		$this->db->insert('responsable',$responsable);
                
                if( $this->db->affected_rows() == 1 ){
                    return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
}