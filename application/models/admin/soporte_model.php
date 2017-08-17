<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Soporte_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
                	
        /**
	 * Buscar ultimo soporte registrado
	 * @string Obtener el ultimo id registrado en la tabla soporte
	 * @param  array  datos del soporte a ingresar

	 */
        public function ultimo_soporte() {
            $query= $this->db->query("SELECT MAX(id) AS id FROM soporte");
            if ($query->num_rows> 0){
                 mysql_fetch_row($query); 
                 return trim($query[0]);
            }else{
             return false;
             
            }
        }
        	/**
	 * Crear un soporte
	 * 
	 * @param  array  datos del soporte a ingresar

	 */
        public function ingresar_soporte($soporte){
            		$this->db->set($soporte)
                        ->insert(db_table('soporte'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Soporte: Para el equipo '.$soporte['id_placa']. ' Registrado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
        
         /**
	 * Borrar un soporte
	 * 
	 * @param  strring id del soporte a eliminar

	 */
           public function delete_soporte($id){
        
        return $this->db->query("Delete from soporte WHERE id='".$id."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Soporte '.$id. ' Eliminado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos los soportes
	 * 
	 * 

	 */
    public function all_soportes(){
		// User table query
        $query = $this->db->query("SELECT * FROM soporte;");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
           /**
	 * Seleccionar soportes por placas
	 * 
	 * @param string $placa placa del equipo a buscar soportes
	 */
    public function buscar_soportes($placa){
		// User table query
        $query = $this->db->query("SELECT * FROM soporte WHERE id_placa='".$placa."';");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
    
    
        
}