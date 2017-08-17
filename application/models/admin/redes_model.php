<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class redes_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar una red en la tabla redes
	 * 
	 * @param  array nombre de la red a ingresar

	 */
        public function ingresar_red($red){
            		$this->db->set($red)
                        ->insert(db_table('redes'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Red '.$red['nombre']. ' Registrada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                
        /**
	 * Borrar una red
	 * 
	 * @param  strring nombre de la red a borrar

	 */
           public function delete_red($red){
        
        return $this->db->query("Delete from redes WHERE nombre='".$red."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Red '.$red. ' Eliminada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos las redes para un dropdown
	 * 
	 * 

	 */
    public function all_redes_dropdown(){
	
        $query = $this->db->query("SELECT nombre FROM redes;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $red) {
                $data[$red->nombre] =  $red -> nombre;
            }
            return $data;
           
        } else
            return false;
    }
 
        
}