<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class marcaEquipo_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar una marca en la tabla marca_equipo
	 * 
	 * @param  array  datos de la marca nombere,imagen a ingresar

	 */
        public function ingresar_marca($marca){
            		$this->db->insert('marca_equipo',$marca);
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Marca '.$marca['nombre']. ' Registrada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
                
        /**
	 * Borrar una Marca
	 * 
	 * @param  strring nombre de la marca a borrar

	 */
           public function delete_marca($nombre){
        
        return $this->db->query("Delete from marca_equipo WHERE nombre='".$nombre."';");
            if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Marca '.$nombre. ' Eliminada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
       /**
	 * Seleccionar todas las marcas
	 * 
	 * 

	 */
    public function all_marcas(){
	
        $query = $this->db->query("SELECT nombre FROM marca_equipo;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $marca) {
                $data[$marca->nombre] =  $marca -> nombre;
            }
            return $data;
           
        } else
            return false;
    }
           /**
	 * Seleccionar una marca
	 * 
	 * @param string $nombre nombre de la marca a seleccionar los datos
	 */
    public function buscar_marca($nombre){
		// User table query
        $query = $this->db->query("SELECT nombre,imagen FROM marca_equipo;");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
    
    
          
        
        
}