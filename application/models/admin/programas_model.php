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
     * Seleccionar todos los programas por categoria dropdown
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
	 * Seleccionar programa por el tiupo de programa y por placa del equipo
	 * 
	 * @param string placa del equipo  
         *  @param string tipo de programa eje: "Sistema Operativo","Office"
            * @param int 0 si es programa desinstalado, 1 si es programa instalado
	 */
    public function proInstalados($placa,$tipo,$estado){
	
        $query=$this->db->query("SELECT * FROM prog_x_equi WHERE id_placa ='".$placa."' and estado ='".$estado."' and id_programa in (SELECT id FROM programas WHERE categoria ='".$tipo."');");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else{
            return false;
        }
    }
               /**
	 * Seleccionar programa por el id de programa y por placa del equipo
	 * 
	 * @param string placa del equipo  
         *  @param string id de programa eje: 1,2
                * @param int 0 si es programa desinstalado, 1 si es programa instalado
	 */
    public function especiales($placa,$id,$estado){
	
        $query=$this->db->query("SELECT * FROM prog_x_equi WHERE id_placa ='".$placa."' and estado='".$estado."' and id_programa ='".$id."';");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else{
            return false;
        }
    }
    /*
     * Obtenemos el un programa por el id
     * @param int id del programa a buscar
     */
    public function buscar($id){
        $query = $this->db->query("SELECT *  FROM programas where id='".$id."';");
        if ($query->num_rows() > 0) {
            return $query->row_array();
           
        } else{
            return false;
        }
        
    }
    /*Relaciona un programa con un equipo 
    *@param array con el nombre y la placa del equipo a instalar
     * 
     */
    public function instalar_programa($proxequipo){
                $this->db->insert('prog_x_equi',$proxequipo);
                
                if( $this->db->affected_rows() == 1 ){
                    return true;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }
    }
    
    
        
}