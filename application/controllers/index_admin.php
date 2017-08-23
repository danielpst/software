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
                $this->load->model('admin/dependencia_model');
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
            $data['all_pro']=  $this->programas_model->programas_varios();
            $data['dependencias']=  $this->dependencia_model->all_dependencias_dropdown();
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
            foreach($result as $programa){
                $row=array(
                    "logo"=>"<img src='uploads/logos/$programa->logo' alt='$programa->nombre' height='50' width='50'>",
                    "nombre"=>$programa->nombre,
                    "acciones"=>"<div class='btn-group'>
                    <button type='button' onclick='agregar($programa->id)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-plus'></i></button>",
                        
                        
                        );
                $data[]=$row;
            }
            
            
            $output= array(
                    "data" => $data,
                    );
            echo json_encode($output);       
        }
                /*
         * Funcion para buscar un equipo
         * @param String placa que es el id del equipo a consultar
         */
       public function busqueda_equipo() {
                       $this->load->view('admin/head.php');
  
          $this->load->view('admin/dashboard_head.php');
 $this->load->view('admin/busqueda_equipo.php');
            $this->load->view('admin/footer.php');
           
        }

        function prueba() {
           echo "placa: ".$this->input->post('placa')."</br>";
           echo "Tipo Equipo: ".$this->input->post('tipo_equipo')."</br>";
           echo "Marca Equipo: ".$this->input->post('marca_equipo')."</br>";
           echo "Estado Equipo: ".$this->input->post('estado_equipo')."</br>";
           echo "Referencia Equipo: ".$this->input->post('referencia')."</br>";
           echo "Serial: ".$this->input->post('serial')."</br>";
           echo "Product NRO: ".$this->input->post('producto_nro')."</br>";
           echo "Folio HV: ".$this->input->post('folio_hv')."</br>";
           echo "Fecha de compra: ".$this->input->post('fecha_compra')."</br>";
           echo "Instaladores Fisicos: ".$this->input->post('ins_fisicos')."</br>";
           echo "CONFIGURACION DE HARDWARE";
           echo "Procesador: ".$this->input->post('procesador')."</br>";
           echo "Marca Disco Duro: ".$this->input->post('marca_disco')."</br>";
           echo "Capacidad Disco Duro: ".$this->input->post('capacidad_disco')."</br>";
           echo "Capacidad RAM: ".$this->input->post('capacidad_ram')."</br>";
           echo "CONFIGURACION DE RED";
           echo "Nombre Equipo: ".$this->input->post('nombre_equipo')."</br>";
           echo "Dominio: ".$this->input->post('dominio')."</br>";
           echo "En Red: ".$this->input->post('en_red')."</br>";
           echo "Nombre Red: ".$this->input->post('nombre_red')."</br>";
           echo "DHCP: ".$this->input->post('dhcp')."</br>";
           echo "iP Fija: ".$this->input->post('ip_fija')."</br>";
           echo "MAC fija: ".$this->input->post('mac_fija')."</br>";
           echo "MAC Wifi: ".$this->input->post('mac_wifi')."</br>";
           echo "CONFIGURACION SISTEMA OPERATIVO";
           echo "Sistema Operativo: ".$this->input->post('sistema_operativo')."</br>";
           echo "Serial Sistema O: ".$this->input->post('serial_windows')."</br>";
           echo "Fecha Windows: ".$this->input->post('fecha_windows')."</br>";
           echo "Recovery en PC: ".$this->input->post('has_recovery')."</br>";
           echo "CHECK USUARIO 1: ".$this->input->post('grabarOS1')."</br>";
           echo "Nombre Usuario 1: ".$this->input->post('nombreOS1')."</br>";
           echo "Password Usuario 1: ".$this->input->post('passOS1')."</br>";
           echo "Tipo Usuario 1: ".$this->input->post('tipoOS1')."</br>";
           echo "CHECK USUARIO 2: ".$this->input->post('grabarOS2')."</br>";
           echo "Nombre Usuario 1: ".$this->input->post('nombreOS2')."</br>";
           echo "Password Usuario 1: ".$this->input->post('passOS2')."</br>";
           echo "Tipo Usuario 1: ".$this->input->post('tipoOS2')."</br>";
           echo "CONFIGURACION SOFTWARE";
           echo "<br>";
           echo "Office: ".$this->input->post('office')."</br>";
           echo "Serial Office: ".$this->input->post('serial_office')."</br>";
           echo "Fecha Instalacion Office: ".$this->input->post('fecha_office')."</br>";
           echo "Atributo oculto para manejar proInstalados";
           echo "<br>";
           echo "proInstalados: ".$this->input->post('proInstalados')."</br>";
           echo "Pestaña Soporte <br>";
           echo "Checked Soporte: ".$this->input->post('check_soporte')."</br>";
           echo "Fecha Soporte: ".$this->input->post('fecha_soporte')."</br>";
           echo "Falla: ".$this->input->post('falla')."</br>";
           echo "Actividad Realizada: ".$this->input->post('actividad_realizada')."</br>";
           echo "Folio Soporte: ".$this->input->post('folio_soporte')."</br>";
           echo "PESTAÑA RESPONSABLE <br>";
           echo "Checked responsable: ".$this->input->post('check_responsable')."</br>";
           echo "Fecha Asignacion: ".$this->input->post('fecha_asignacion')."</br>";
           echo "Nombre Responsable: ".$this->input->post('nombre_responsable')."</br>";
           echo "Dependencia: ".$this->input->post('dependencia')."</br>";
           $this->load->view('prueba.php');
        }
    
}
