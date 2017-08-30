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
class Administrador_marca extends MY_Controller{
    //put your code here
    	public function __construct()
	{
            
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->model('admin/Marca_model');
	}

        public function index(){
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_marca.php');
            $this->load->view('admin/footer.php');
        }
        public function actualizar_marca() {
            $marca['nombre_old']=  $this->input->post('nombre_old');
            $marca['nombre_new']= $this->input->post('nombre_new');
            
         $this->load->library('upload');
         $flag=false;
            $marca['logo']="no_disponible.png";
            $data[]= array();
        if (!empty($_FILES['mi_logo']))
        {
            // Configuración para el logo
            $config['upload_path'] = './uploads/logos/';
            $config['overwrite']=false;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  
            $config['max_size'] = '100';
             $config['max_width']  = '150';
            $config['max_height']  = '150';   
            // Cargamos la configuración del logo
            $this->upload->initialize($config);
            // Subimos el logo
            if ($this->upload->do_upload('mi_logo'))
            {
                $data = $this->upload->data();
                $marca['logo']=$data['file_name'];
            }
            else
            {
                $flag =true;
                $data['error'] = $this->upload->display_errors();

                
            }

        }
        $result= "";
        if($flag){
             $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_marca.php',$data);
            $this->load->view('admin/footer.php');
        }  elseif($marca['logo']=="no_disponible.png" & $marca['nombre_new'] != "") {
            //ACctualizar el campo nombre
            $act = array(
               'nombre' => $marca['nombre_new'],
            );
             $result = $this->Marca_model->actualizar($act,$marca['nombre_old']);
        }else{
            //Actualizar los dos campos
          $act = array(
               'nombre' => $marca['nombre_new'],
                'logo' => $marca['logo'],
            );
          $result = $this->Marca_model->actualizar($act,$marca['nombre_old']);
        }
         if($result){
                $data['correcto']= "Se actualizo correctamente la marca. ";
            }else{
                $data['error']= "No se pudo Actualizar la marca";
            }
            
                        $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_marca.php',$data);
            $this->load->view('admin/footer.php');
            
            
            
        }
        public function todas_marcas() {
                        $result= $this->Marca_model->todas_marcas();
 
            $data=  array();
            foreach($result as $marca){
                $row=array(
                    "logo"=>"<img src='uploads/logos/$marca->logo' alt='$marca->nombre' height='50' width='50'>",
                    "nombre"=>$marca->nombre,
                    "acciones"=>"<div class='btn-group'>
                    <button type='button' onclick='editar($marca->nombre)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-pencil'></i></button>
                    <button type='button' onclick='confirmar_delete($marca->nombre)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-trash'></i></button>",
                        
                        
                        );
                $data[]=$row;
            }
            
            
            $output= array(
                    "data" => $data,
                    );
            echo json_encode($output);  
        }
        function eliminar_marca(){
            $marca_nombre= $this->input->post('marca_delete_id');
            
             if($this->Marca_model->delete($marca_nombre)){
                $data['correcto']= "Se Elimino correctamente la marca. ";
            }else{
                $data['error']= "No se pudo Eliminar la marca.";
            }

            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_marca.php');
            $this->load->view('admin/footer.php');
        }
        
        public function  ingresar_marca(){
           
            $flag = false;
            $this->load->library('upload');
            $cod['logo']="";
            $data['error_cargar']="";
        if (!empty($_FILES['mi_logo']))
        {
            // Configuración para el logo
            $config['upload_path'] = './uploads/logos/';
            $config['overwrite']=false;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  
            $config['max_size'] = '100';
             $config['max_width']  = '150';
            $config['max_height']  = '150';   
            // Cargamos la configuración del logo
            $this->upload->initialize($config);
            // Subimos el logo
            if ($this->upload->do_upload('mi_logo'))
            {
                $data = $this->upload->data();
                $cod['logo']=$data['file_name'];
            }
            else
            {
                $flag =true;
                $data['error_cargar'] = $this->upload->display_errors();

                
            }

        }
            $cod['nombre']=  $this->input->post('nombre');
  
           
            if($this->Marca_model->ingresar($cod)){
                $data['correcto']= "Se Ingreso correctamente la marca. ";
                if($flag){
                    $data['correcto'] .= "Pero se presento un error al cargar imagen :" . $data['error_cargar'];
                }
            }else{
                $data['error']= "no se pudo ingresar la marca.";
                if ($flag){
                   $data['error'] .= $data['error_cargar'];
                }
            }
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_marca.php');
            $this->load->view('admin/footer.php');
            
       
        }

        
}