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

class Usuario_model extends CI_Model{

public function __construct()
	{
		parent::__construct();
                $this->load->database();
	}

	// --------------------------------------------------------------

	/**
	 * Crear un usuario
	 * 
	 * @param  array  the user's user table data
	 * @param  string  the login time in MySQL format
	 * @param  array  the session ID 
	 */
	public function create_user( $user_data)
	{
		$this->db->set($user_data)
                        ->insert(db_table('user_table'));
                
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Usuario: '.$user_data['nombre']. ' Creado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }

	}
        
    public function obtener_unico_usuario($user_id){
       
       $query = $this->db->query("SELECT user_id,username,nombre,email,auth_level FROM users where user_id='".$user_id."';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else
            return false;
    }
    
    public function update_usuario($cod){
       
        
        return $this->db->query("UPDATE users SET user_id='".$cod['user_id']."',username='".$cod['username']."',nombre='".$cod['nombre']."',email='".$cod['email']."',auth_level='".$cod['auth_level']."' where user_id='".$cod['user_id_viejo']."'");
        
      
    
    }
    public function delete_usuario($user_id){
        
        return $this->db->query("Delete from users WHERE user_id='".$user_id."';");
    }

    public function all_users(){
              
            
            		// Selected user table data
		$selected_columns = [
                        'user_id',
			'username',
			'nombre',
			'auth_level'
		];

		// User table query
		$query = $this->db->query("SELECT user_id,username,nombre,auth_level FROM users;");
        if ($query->num_rows() > 0) {
            return $query->result();
           
        } else
            return false;
    }
            
        
}

/* End of file Usuario_model.php */
