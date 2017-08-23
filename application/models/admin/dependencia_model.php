<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class dependencia_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar una dependencia en la tabla dependencias
	 * 
	 * @param  array nombre del estado a ingresare

	 */
        public function ingresar_dependencia($dep){
            		$this->db->set($dep)
                        ->insert(db_table('dependencia'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'dependencia '.$dep['nombre']. ' Registrada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                
        /**
	 * Borrar una dependencia
	 * 
	 * @param  strring nombre de la dependencia a borrar

	 */
           public function delete_dependencia($dep){
        
        return $this->db->query("Delete from dependencia WHERE nombre='".$dep."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Dependencia '.$dep. ' Eliminada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos las dependencias para un dropdown
	 * 
	 * 

	 */
    public function all_dependencias_dropdown(){
	
        $query = $this->db->query("SELECT nombre FROM dependencia;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $dep) {
                $data[$dep->nombre] =  $dep -> nombre;
            }
            return $data;
           
        } else
            return false;
    }
 
        
}

