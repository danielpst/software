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

class Usuario_model{



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
                $error='';
                if( $this->db->affected_rows() == 1 ){
                    $data['correcto']= 'Usuario: '.$User_data['nombre']. ' Creado con exito.';
                    return $data;
        }       else{
                    $data['error']= $this->db->_error_message();
                    return $data;
                
            
        }

	}
}

/* End of file Usuario_model.php */
