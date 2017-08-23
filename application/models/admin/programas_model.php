<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Programas_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        

        	/**
	 * Crear un Programa
	 * 
	 * @param  array  datos del programa a ingresar

	 */
        public function ingresar_programa($programa){

           $this->db->query("Insert Into programas (nombre,categoria,logo) values('".$programa['nombre']."','".$programa['categoria']."','".$programa['logo']."');");
           
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Programa: '.$programa['nombre']. ' Registrado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
        
         /**
	 * Borrar un programa
	 * 
	 * @param  strring id del programa a eliminar

	 */
           public function delete_programa($id){
        
        $this->db->query("Delete from programas WHERE id='".$id."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Programa '.$id. ' Eliminado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todos los programas de categoria varios
	 * 
	 * 

	 */
        public function programas_varios(){
		// Programas table query
		$query = $this->db->query("SELECT id,nombre,logo FROM programas where categoria='Varios';");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
           /**
	 * Seleccionar todos los programas 
	 * 
	 * 

	 */
        public function all_programas(){
		// Programas table query
		$query = $this->db->query("SELECT logo,id,nombre,categoria FROM programas;");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
    /*
     * Seleccionar todos los programas por categoria
     */
    public function programasxcategoria($categoria){
		
       $query = $this->db->query("SELECT id, nombre  FROM programas where categoria='".$categoria."';");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $programa) {
                $data[$programa->id] =  $programa -> nombre;
            }
            return $data;
           
        } else
            return false;
    }

           /**
	 * Seleccionar programa por id
	 * 
	 * @param string $id del programa a buscar
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