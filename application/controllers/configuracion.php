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
class Configuracion extends MY_Controller{
    //put your code here
    	public function __construct()
	{
            
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
                //$this->load->model('admin/usuario_model');
	}
        
        
        /**Este metodo carga la vista principal de la ventana configuracion
         * 
         */
        function index(){
 
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/configuracion.php');
            $this->load->view('admin/footer.php');
        }
}
?>