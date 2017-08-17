<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Daniel
 */
class Test extends MY_Controller{
    //put your code here
    	public function __construct()
	{
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
	}
        /**Este metodo carga la vista principal del login
         * 
         */
        function index(){
         
            
            if ($this->is_logged_in()){
               if($this->verify_role('admin')){
                   redirect('index_admin');
//                   $this->load->view('admin/head');
//                   $this->load->view('admin/dashboard_head.php');
//                   $this->load->view('admin/index.php');
//                   $this->load->view('login/footer');    
            }else{
                   $this->load->view('usuario/head');
                   $this->load->view('usuario/navbar');
                   $this->load->view('usuario/index.php');
                   $this->load->view('usuario/footer'); 
            }
            }
            $this->setup_login_form();
            $this->load->view('login/head');
            $this->load->view('login/login');
            $this->load->view('login/footer');
        
            
        }
        
        
      
        
        /**
	 * This login method only serves to redirect a user to a 
	 * location once they have successfully logged in. It does
	 * not attempt to confirm that the user has permission to 
	 * be on the page they are being redirected to.
	 */
	public function login()
	{
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'test/login')
			show_404();

		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);

		$this->setup_login_form();
                if($this->auth_role == 'admin'){
                   $this->load->view('admin/head');
                   $this->load->view('admin/dashboard_head.php');
                   $this->load->view('admin/index.php');
                   $this->load->view('admin/footer');    
                    
                }else if($this->auth_role == 'customer'){
                   $this->load->view('usuario');
                   $this->load->view('usuario/navbar');
                   $this->load->view('usuario/index.php');
                   $this->load->view('usuario/footer'); 
           
                    }else{
                
            $this->load->view('login/head');
            $this->load->view('login/login');
                    $this->load->view('login/footer');
                    
                    }

	}
        // --------------------------------------------------------------

	/**
	 * User recovery form
	 */
	public function recover()
	{
		// Load resources
		$this->load->model('examples/examples_model');

		/// If IP or posted email is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// If the form post looks good
			if( $this->tokens->match && $this->input->post('email') )
			{
				if( $user_data = $this->examples_model->get_recovery_data( $this->input->post('email') ) )
				{
					// Check if user is banned
					if( $user_data->banned == '1' )
					{
						// Log an error if banned
						$this->authentication->log_error( $this->input->post('email', TRUE ) );

						// Show special message for banned user
						$view_data['banned'] = 1;
					}
					else
					{
						/**
						 * Use the authentication libraries salt generator for a random string
						 * that will be hashed and stored as the password recovery key.
						 * Method is called 4 times for a 88 character string, and then
						 * trimmed to 72 characters
						 */
						$recovery_code = substr( $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt(), 0, 72 );

						// Update user record with recovery code and time
						$this->examples_model->update_user_raw_data(
							$user_data->user_id,
							[
								'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
								'passwd_recovery_date' => date('Y-m-d H:i:s')
							]
						);

						// Set the link protocol
						$link_protocol = USE_SSL ? 'https' : NULL;

						// Set URI of link
						$link_uri = 'examples/recovery_verification/' . $user_data->user_id . '/' . $recovery_code;

						$view_data['special_link'] = anchor( 
							site_url( $link_uri, $link_protocol ), 
							site_url( $link_uri, $link_protocol ), 
							'target ="_blank"' 
						);

						$view_data['confirmation'] = 1;
					}
				}

				// There was no match, log an error, and display a message
				else
				{
					// Log the error
					$this->authentication->log_error( $this->input->post('email', TRUE ) );

					$view_data['no_match'] = 1;
				}
			}
		}

		echo $this->load->view('examples/page_header', '', TRUE);

		echo $this->load->view('examples/recover_form', ( isset( $view_data ) ) ? $view_data : '', TRUE );

		echo $this->load->view('examples/page_footer', '', TRUE);
	}


	// --------------------------------------------------------------

	/**
	 * Log out
	 */
	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
	}

	// --------------------------------------------------------------
        public function install()
        {  
        echo "contraseña: 123456";
        echo "<br>";
        echo "hash contraseña: ";
        echo $this->authentication->hash_passwd(123456);       
        }
}