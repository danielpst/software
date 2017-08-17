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
class Index_admin extends MY_Controller{
    //put your code here
    	public function __construct()
	{
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->model('admin/marcaEquipo_model');
                $this->load->model('admin/estadoEquipo_model');
                $this->load->model('admin/tipoEquipo_model');
                $this->load->model('admin/redes_model');
                $this->load->model('admin/programas_model');
	}
        function index(){
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $data['redes']=  $this->redes_model->all_redes_dropdown();
            $data['tipos']= $this->tipoEquipo_model->all_tipo_dropdown();
            $data['estados']=$this->estadoEquipo_model->all_estado_dropdown();
            $data['marcas']=  $this->marcaEquipo_model->all_marcas();
            $data['windows']=  $this->programas_model->programasxcategoria('Sistema Operativo');
            $data['office']=  $this->programas_model->programasxcategoria('Office');
            $this->load->view('admin/index.php',$data);
            $this->load->view('admin/footer.php');
        }
        function dashboard(){
            $this->load->view('admin/head.php');
     //       $this->load->view('admin/menu.php');
          $this->load->view('admin/dashboard_head.php');
   //         $this->load->view('admin/dashboard.php');
            $this->load->view('admin/footer.php');
        }
        function ingresar_equipo(){
            
            
        $this->load->library('upload');
            
        if (!empty($_FILES['hoja_vida']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/Hoja_vida/';
            $config['file_name']='HV_0007562';
            $config['overwrite']=true;
            $config['allowed_types'] = 'pdf';  
            $config['max_size'] = '0';
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('hoja_vida'))
            {
                $data = $this->upload->data();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
                    
        if (!empty($_FILES['imagen_equipo']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/Imagen_equipo';
            $config['file_name']='0007562';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';   
            $config['max_size'] = '0';
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('imagen_equipo'))
            {
                $data = $this->upload->data();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
                if (!empty($_FILES['imagen_soporte']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/Soporte/';
            $config['file_name']='0007562';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('imagen_equipo'))
            {
                $data = $this->upload->data();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
        }
        
        /*
         * Funcion que se encarga de mostrar todos los programas 
         * de la categoria varios registrados
         */
        function programas_varios(){
            $result= $this->programas_model->programas_varios();
 
            $data=  array();
            foreach($result as $pro){
                $row=array(
                    "nombre"=>$pro->logo,
                    "nombre"=>$pro->nombre,
                    "acciones"=>"<div class='btn-group'>
                    <button type='button' onclick='modal_agregar($pro->id,$pro->nombre)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-plus'></i></button>",    
                        );
                $data[]=$row;
            }
            
            
            $output= array(
                    "data" => $data,
                    );
            echo json_encode($output);       
        }
    
}
