<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Marca_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
        
        /**
	 * Ingresar una marca en la tabla marca_equipo
	 * 
	 * @param  array  datos del soporte a ingresar

	 */
        public function ingresar($marca){
            		$this->db->insert('marca_equipo',$marca);
                
                if( $this->db->affected_rows() == 1 ){
                        return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
        }
        /*
         * Buscar una marca especifica
         * @param String nombre de la marca a buscar
         */
            public function buscar_unica($marca){
       $query = $this->db->get_where('marca_equipo', array('nombre' => $marca));
       
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else
            return false;
    }
    /*
     * Buscar todas las marcas en la tabla marca_equipo
     * @param No recibe parametros
     * @retun devuelve todos los registros de la tabla marca_equipo
     */
    public function todas_marcas() {
        $query = $this->db->query("SELECT * FROM marca_equipo;");
        if($query->num_rows()>0){
            return $query->result();
        }  else {
            return false;
        }
        
    }
    /*
     * Actualizar una marca
     * @param primer parametro array variables a actualizar
     * @param segundo parametro nombre de la marca a actualizar
     */
    public function actualizar($marca,$nombre) {
        $this->db->where('nombre', $nombre);
        return $this->db->update('marca_equipo', $marca); 
    }
}
