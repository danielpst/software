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
class Administrador_programas extends MY_Controller{
    //put your code here
    	public function __construct()
	{
            
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->model('admin/programas_model');
                $this->load->model('admin/categoriaPrograma_model');
	}

        public function index(){
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $data['categorias']= $this->categoriaPrograma_model->all_categorias_dropdown();
//            $data['redes']=  $this->redes_model->all_redes_dropdown();
//            $data['tipos']= $this->tipoEquipo_model->all_tipo_dropdown();
//            $data['estados']=$this->estadoEquipo_model->all_estado_dropdown();
//            $data['marcas']=  $this->marcaEquipo_model->all_marcas();
//            $data['windows']=  $this->programas_model->programasxcategoria('Sistema Operativo');
//            $data['office']=  $this->programas_model->programasxcategoria('Office');
            $this->load->view('admin/administrador_programas.php',$data);
            $this->load->view('admin/footer.php');
        }
        public function todos_programas() {
                        $result= $this->programas_model->all_programas();
 
            $data=  array();
            foreach($result as $programa){
                $row=array(
                    "logo"=>"<img src='uploads/logos/$programa->logo' alt='$programa->nombre' height='50' width='50'>",
                    "id"=>$programa->id,
                    "nombre"=>$programa->nombre,
                    "categoria"=>$programa->categoria,
                    "acciones"=>"<div class='btn-group'>
                    <button type='button' onclick='editar($programa->id)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-pencil'></i></button>
                    <button type='button' onclick='confirmar_delete($programa->id,$programa->nombre)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-trash'></i></button>",
                        
                        
                        );
                $data[]=$row;
            }
            
            
            $output= array(
                    "data" => $data,
                    );
            echo json_encode($output);  
        }
        function eliminar_programa(){
            $programa_id= $this->input->post('programa_delete_id');
            
             if($this->programas_model->delete_programa($programa_id)){
                $data['correcto']= "Se Elimino correctamente el Programa. ";
            }else{
                $data['error']= "No se pudo Eliminar el Programa.";
            }
            $data['categorias']= $this->categoriaPrograma_model->all_categorias_dropdown();
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_programas.php',$data);
            $this->load->view('admin/footer.php');
        }
        
        public function  ingresar_programa(){
           
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
            $cod['categoria']=  $this->input->post('categoria');
            $cod['nombre']=  $this->input->post('nombre');
  
           
            if($this->programas_model->ingresar_programa($cod)){
                $data['correcto']= "Se Ingreso correctamente el programa. ";
                if($flag){
                    $data['correcto'] .= "Pero se presento un error al cargar imagen :" . $data['error_cargar'];
                }
            }else{
                $data['error']= "no se pudo ingresar el programa.";
                if ($flag){
                   $data['error'] .= $data['error_cargar'];
                }
            }
            $data['categorias']= $this->categoriaPrograma_model->all_categorias_dropdown();
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/administrador_programas.php',$data);
            $this->load->view('admin/footer.php');
            
       
        }

        
}