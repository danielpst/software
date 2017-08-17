<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class tipoEquipo_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar un tipo de equipo en la tabla tipo_equipo
	 * 
	 * @param  array nombre del estado a ingresare

	 */
        public function ingresar_tipo_equipo($tipo){
            		$this->db->set($tipo)
                        ->insert(db_table('tipo_equipo'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Estado '.$tipo['nombre']. ' Registrado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                
        /**
	 * Borrar un tipo
	 * 
	 * @param  strring nombre del estado a borrar

	 */
           public function delete_tipo_equipo($tipo){
        
        return $this->db->query("Delete from tipo_equipo WHERE nombre='".$tipo."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Tipo de Equipo: '.$tipo. ' Eliminado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos los tipos_equipos para un dropdown
	 * 
	 * 

	 */
    public function all_tipo_dropdown(){
	
        $query = $this->db->query("SELECT nombre FROM tipo_equipo;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $tipo) {
                $data[$tipo->nombre] =  $tipo -> nombre;
            }
            return $data;
           
        } else
            return false;
    }
 
        
}