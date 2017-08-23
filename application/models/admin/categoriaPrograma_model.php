<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Auth_model Model
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

class categoriaPrograma_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}

	// --------------------------------------------------------------

	/**
	 * Crear una categoria
	 * 
	 * @param  array  nombre de la categoria a ingresar
	
	 */
	public function create_categoria( $categoria)
	{
		$this->db->set($categoria)
                        ->insert(db_table('cat_programa'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Categoria de Programas: '.$categoria['nombre']. ' Creada con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }

	}
               /**
	 * Seleccionar todos las categorias para un dropdown
	 * 
	 * 

	 */
    public function all_categorias_dropdown(){
	
        $query = $this->db->query("SELECT nombre FROM cat_programa;");
        if ($query->num_rows() > 0) {
            $data =array();
            foreach ($query->result() as $categoria) {
                $data[$categoria->nombre] =  $categoria -> nombre;
            }
            return $data;
           
        } else
            return false;
    }
}