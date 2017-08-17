<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class estadoEquipo_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar un estado en la tabla estdao_equipo
	 * 
	 * @param  array nombre del estado a ingresare

	 */
        public function ingresar_estado_equipo($estado){
            		$this->db->set($estado)
                        ->insert(db_table('estado_equipo'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'estado '.$estado['estado']. ' Registrado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                
        /**
	 * Borrar un estado
	 * 
	 * @param  strring nombre de la marca a borrar

	 */
           public function delete_estado($estado){
        
        return $this->db->query("Delete from estado_equipo WHERE estado='".$estado."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Estado '.$estado. ' Eliminado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos los estado para un dropdown
	 * 
	 * 

	 */
    public function all_estado_dropdown(){
	
        $query = $this->db->query("SELECT estado FROM estado_equipo;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $estado) {
                $data[$estado->estado] =  $estado -> estado;
            }
            return $data;
           
        } else
            return false;
    }
 
        
}