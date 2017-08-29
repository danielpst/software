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
                $this->load->model('admin/equipo_model');
                $this->load->model('admin/Hardware_model');
                $this->load->model('admin/ConfiguracionRed_model');
                $this->load->model('admin/marcaEquipo_model');
                $this->load->model('admin/estadoEquipo_model');
                $this->load->model('admin/tipoEquipo_model');
                $this->load->model('admin/redes_model');
                $this->load->model('admin/UsuarioEquipo_model');
                $this->load->model('admin/Responsable_model');
                $this->load->model('admin/programas_model');
                $this->load->model('admin/dependencia_model');
                $this->load->model('admin/soporte_model');
                $this->load->library('upload');
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
        public function completar_placa($placa){
            $res= 7-strlen($placa);
            for($i=1;$i<=$res;$i++){
                $placa = "0".$placa;
            }
            return $placa;
        }
       public function vista() {
           $this->load->view('testfile.php');
       }
        public function buscar_equipo(){
            $placa= 9876;
            $equipo=$this->equipo_model->buscar($placa);
            $data['equipo']=$equipo;
            $this->load->view('admin/head.php');
          $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/resultado.php',$data);
            $this->load->view('admin/footer.php');
        }

        function prueba() {
           $placa = $this->input->post('placa');
           $placa_completa=$this->completar_placa($placa);
           $HV_fisica = "";
           $imagen_equipo ="img_no_disponible.jpg";
           if (!empty($_FILES['hoja_vida']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/Hoja_vida/';
            $config['file_name']='HV_'.$placa_completa;
            $config['overwrite']=true;
            $config['allowed_types'] = 'pdf';  
            $config['max_size'] = '0';
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('hoja_vida'))
            {
                //$data = $this->upload->data();
                $file_info = $this->upload->data();
                
                $HV_fisica =  $file_info['file_name']; 
                echo "carga hoja de vida completa";
              
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
            $config['file_name']=$placa;
             $config['overwrite']=true;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '100';
            $config['max_width']  = '300';
            $config['max_height']  = '300';   
          
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('imagen_equipo'))
            {
                //$data = $this->upload->data();
                                $file_info = $this->upload->data();
                
                 $imagen_equipo =  $file_info['file_name']; 
                
                echo "carga Imagen Equipo correcta";
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
           $equipo =[
               'placa' => $placa,
                'id_tipo_equipo' =>$this->input->post('tipo_equipo'),
                'id_marca_equipo' =>$this->input->post('marca_equipo'),
                'id_estado_equipo' => $this->input->post('estado_equipo'),
                'referencia' =>$this->input->post('referencia'),
                'serial' =>$this->input->post('serial'),
                'producto_nro' =>$this->input->post('producto_nro'),
                'fecha_compra'=>$this->input->post('fecha_compra'),
                'imagen'=>$imagen_equipo,
                'folio_nro' =>$this->input->post('folio_hv'),
                'hoja_fisica'=> $HV_fisica,
                'inst_fisicos' =>$this->input->post('ins_fisicos'),
           ];
           $ingEquipo= $this->equipo_model->ingresar_equipo($equipo);
           if($ingEquipo){
           //echo "CONFIGURACION DE HARDWARE";
           $hardware=[ 
           'id_placa' => $placa,
           'Procesador' => $this->input->post('procesador'),
           'marca_disco' =>$this->input->post('marca_disco'),
           'capacidad_disco' => $this->input->post('capacidad_disco'),
           'capacidad_ram' => $this->input->post('capacidad_ram'),
           ];
           $res_hardware=$this->Hardware_model->ingresar_hardware($hardware);
           if($res_hardware){
               echo "hadware ingresado con exito";
           }else{
               echo $res_hardware['error'];
           }
            //   echo "CONFIGURACION DE RED";
           $red=[
                'id_placa' => $placa,
                'nombre_equipo' => $this->input->post('nombre_equipo'),
                'dominio' =>$this->input->post('dominio'),
                'en_red' => $this->input->post('en_red'),
                'id_nombre_red'=> $this->input->post('nombre_red'),
                'dhcp' => $this->input->post('dhcp'),
                'ip_fija'=>$this->input->post('ip_fija'),
                'mac_fija'=>$this->input->post('mac_fija'),
                'mac_inalambrica'=>$this->input->post('mac_wifi'),
           ];
           $res_Red=$this->ConfiguracionRed_model->ingresar_configuracion($red);
           if($res_Red){
               echo "Configuracion de red con exito";
           }else{
               echo $res_Red['error'];
           }

           //echo "CONFIGURACION SISTEMA OPERATIVO";
           $pro_x_equ=[ 
                'id_programa'=>$this->input->post('sistema_operativo'),
                'id_placa'=> $placa,
                'fecha_instalacion' =>$this->input->post('fecha_windows'),       
                'serial'=>$this->input->post('serial_windows'),
                'original'=>$this->input->post('original'),
           ];

          $res_pxe=$this->programas_model->instalar_programa($pro_x_equ);;
           if($res_Red){
               echo "S.O ingresado con exito";
           }else{
               echo $res_pxe['error'];
           }
           //INstalacion Automatico de Recovery
           if($this->input->post('has_recovery') == 1){
               $recovery=[ 
                'id_programa'=>1,
                'id_placa'=> $placa,
                'fecha_instalacion' =>$this->input->post('fecha_windows'),       
           ];
                         $res_pxe=$this->programas_model->instalar_programa($recovery);;
                        if($res_Red){
                            echo "Recovery ingresado con exito";
                        }else{
                            echo $res_pxe['error'];
                        }
           }
           //Si se va a grabar usuario del sistema Operativo
           if($this->input->post('grabarOS1')== 1){
                //No haga nada
           }else{
             $usu1=[
                   'id_placa' => $placa,
                   'nombre'=>$this->input->post('nombreOS1'),
                   'contrasena' =>$this->input->post('passOS1'),
                   'id_tipo_usuario'=>$this->input->post('tipoOS1'),
               ];

                  $us=$this->UsuarioEquipo_model->ingresar_usuario($usu1);
                    if($us){
                        echo "Usuario 1 ingresado con exito";
                    }else{
                        echo $us['error'];
                    }
           }
           //Si se va a grabar usuario del sistema Operativo
           if($this->input->post('grabarO2')==1){
                    //No haga nada
           }else{
               $usu2=[
                   'id_placa' => $placa,
                   'nombre'=>$this->input->post('nombreOS2'),
                   'contrasena' =>$this->input->post('passOS2'),
                   'id_tipo_usuario'=>$this->input->post('tipoOS2'),
               ];
                     $us=$this->UsuarioEquipo_model->ingresar_usuario($usu2);
                    if($us){
                        echo "Usuario 2 ingresado con exito";
                    }else{
                        echo $us['error'];
                    }
           }
          // echo "CONFIGURACION SOFTWARE";
          //echo "Se instala el office en la tabla proxequipo
           
            $office=[ 
                'id_programa'=>$this->input->post('office'),
                'id_placa'=> $placa,
                'fecha_instalacion' =>$this->input->post('fecha_office'),       
                'serial'=>$this->input->post('serial_office'),
                'original'=>$this->input->post('originalof'),
           ];
 
                                     $res_pxe=$this->programas_model->instalar_programa($office);
                        if($res_Red){
                            echo "Office ingresado con exito";
                        }else{
                            echo $res_pxe['error'];
                        }
           
           //echo "Atributo oculto para manejar proInstalados";

           $can_programas = array_filter((explode(',', $this->input->post('proInstalados'))));
           $t_pro = sizeof($can_programas);
           if($t_pro>0){
          for($i=1;$i<=$t_pro;$i++){
            $programa=[ 
                'id_programa'=>$can_programas[$i],
                'id_placa'=> $placa,
                'fecha_instalacion' =>$this->input->post('instalacion'.$can_programas[$i]),
                'serial'=>$this->input->post('serial'.$can_programas[$i]),
                ];
                                     $res_pxe=$this->programas_model->instalar_programa($programa);
                        if($res_Red){
                            echo $programa['id_programa']." ingresado con exito";
                        }else{
                            echo $res_pxe['error'];
                        }
          }
           }
           if($this->input->post('check_soporte')==1){
               //no haga nada
           }  else {
               $sofisico="";
         if (!empty($_FILES['hoja_soporte']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/Soporte/';
            $config['file_name']='SO_'.$placa_completa."_".$this->input->post('fecha_soporte');
            $config['overwrite']=false;
            $config['allowed_types'] = 'pdf';  
            $config['max_size'] = '0';
            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);
            // Subimos archivo 1
            if ($this->upload->do_upload('hoja_soporte'))
            {
                //$data = $this->upload->data();
                echo "carga Soporte completa";
                                                $file_info = $this->upload->data();
                
                $sofisico =  $file_info['file_name']; 

              
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
               $soporte=[
                   'id_placa'=>$placa,
                 'fecha'=> $this->input->post('fecha_soporte'),
                  'falla'=> $this->input->post('falla'),
                  'actividad_realizada' =>$this->input->post('actividad_realizada'),
                   'solucionado'=>$this->input->post('solucion'),
                   'evidencia'=>$sofisico,
                   'folio_evidencia'=>$this->input->post('folio_soporte'),
               ];
                                 $sop=$this->soporte_model->ingresar_soporte($soporte);
                        if($sop){
                            echo " soporte ingresado con exito";
                        }else{
                            echo $sop['error'];
                        }
         
           }
           
           if($this->input->post('check_responsable')==1){
               //NO va a ingresar responsable
           }else{
                $res=[
                    'id_placa'=>$placa,
                    'nombre'=>$this->input->post('nombre_responsable'),
                    'fecha_asignacion'=>$this->input->post('fecha_asignacion'),
                    'id_dependencia'=>$this->input->post('dependencia'),
                    'observacion'=> $this->input->post('observacion'),       
           ];
                     $sop=$this->Responsable_model->ingresar_responsable($res);
                        if($sop){
                            echo "Responsable ingresado con exito";
                        }else{
                            echo $sop['error'];
                        }
           }
        } else{
               echo $ingEquipo['error'];
           }
           $this->load->view('testfile.php',$ingEquipo);
        }
    
}
