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
class Usuario_admin extends MY_Controller{
    //put your code here
    	public function __construct()
	{
            
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->model('admin/usuario_model');
	}
        
        
        public function rules_password(){
            
            $this->config->load('examples/password_strength');
            $data['min_chars_for_password']= 'Minimo de caracteres: <b>'.config_item('min_chars_for_password').'</b>';
            $data['max_chars_for_password']= 'Maximo de Caracteres: <b>'.config_item('max_chars_for_password').'</b>';
            $data['min_digits_for_password']= 'Cantidad de Numeros: <b>'.config_item('min_digits_for_password').'</b> Si es 0 no necesita';
            $data['min_lowercase_chars_for_password'] =  'Cantidad de Minusculas: <b>'.config_item('min_lowercase_chars_for_password') . '</b> Si es 0 no necesita';
            $data['min_uppercase_chars_for_password']= 'Cantidad de Mayusculas: <b>'. config_item('min_uppercase_chars_for_password') . '</b> Si es 0 no necesita';
            $data['min_non_alphanumeric_chars_for_password']= 'Cantidad de Alfanumericas: <b>'.config_item('min_non_alphanumeric_chars_for_password'). '</b> Si es 0 no necesita';

            
            return $data;
            
        }
        /**Este metodo carga la vista principal del login
         * 
         */
        function index(){
            $data = $this->rules_password();
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/crear_usuario.php',$data);
            $this->load->view('admin/footer.php');
        }
        
        function vista_create_user(){
            $data = $this->rules_password();
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/crear_usuario.php',$data);
            $this->load->view('admin/footer.php');
            
        }
        
        function ver_usuarios(){
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/ver_usuarios.php');
            $this->load->view('admin/footer.php');
        }
        
        function all_usuarios(){
            $result= $this->usuario_model->all_users();
 
            $data=  array();
            foreach($result as $usuario){
                $row=array(
                    "user_id"=>$usuario->user_id,
                        "username"=>$usuario->username,
                        "nombre"=>$usuario->nombre,
                    "auth_level"=>$usuario->auth_level,
                    "acciones"=>"<div class='btn-group'>
                    <button type='button' onclick='editar($usuario->user_id)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-pencil'></i></button>
                    <button type='button' onclick='confirmar_delete($usuario->user_id)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-trash'></i></button>",
                        
                        
                        );
                $data[]=$row;
            }
            
            
            $output= array(
                    "data" => $data,
                    );
            echo json_encode($output);       
        }
        
        function obtener_unico_usuario(){
            
            $user_id= $this->input->post('user_id');
            $result=  $this->usuario_model->obtener_unico_usuario($user_id);
            echo json_encode($result);
        }
        function update_user(){
            $cod['user_id_viejo']=  $this->input->post('cedula_vieja');
            $cod['user_id']=  $this->input->post('cedula');
            $cod['username']=  $this->input->post('username');
            $cod['nombre']=  $this->input->post('nombre_usuario');
            $cod['email']=  $this->input->post('email');
            $cod['auth_level']=  $this->input->post('role');
            if($this->usuario_model->update_usuario($cod)){
                $data['correcto']= "Se actualizo correctamente el usuario. ";
            }else{
                $data['error']= "No se pudo Actualizar el Usuario.";
            }
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/ver_usuarios.php',$data);
            $this->load->view('admin/footer.php');
            
        }
        
        function eliminar_usuario(){
            $user_id= $this->input->post('usuario_delete');
            
             if($this->usuario_model->delete_usuario($user_id)){
                $data['correcto']= "Se Elimino correctamente el usuario. ";
            }else{
                $data['error']= "No se pudo Eliminar el Usuario.";
            }
            
            $this->load->view('admin/head.php');
            $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/ver_usuarios.php',$data);
            $this->load->view('admin/footer.php');
        }
        /**
	 * Most minimal user creation. You will of course make your
	 * own interface for adding users, and you may even let users
	 * register and create their own accounts.
	 *
	 * The password used in the $user_data array needs to meet the
	 * following default strength requirements:
	 *   - Must be at least 8 characters long
	 *   - Must be at less than 72 characters long
	 *   - Must have at least one digit
	 *   - Must have at least one lower case letter
	 *   - Must have at least one upper case letter
	 *   - Must not have any space, tab, or other whitespace characters
	 *   - No backslash, apostrophe or quote chars are allowed
	 */
	public function create_user($user =null )
	{
            
            $data= [];
          
            $user_data=array();
            if($user){
                // Creacion masiva de usuarios 
                $user_data = [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'nombre' => $user['nombre'],
                        'email' => $user['email'],
                        'passwd' =>$user['passwd'],
                       'auth_level' => $user['auth_level'],
                    
		];
        }else{
		// Customize this array for your user
            $user_data = [
                        'user_id' => $this->input->post('cedula'),
                        'username' => $this->input->post('username'),
                        'nombre' => $this->input->post('nombre_usuario'),
                        'email' => $this->input->post('email'),
                        'passwd' => $this->input->post('password'),
                        'auth_level' => $this->input->post('role'),
                    
		];
        }
        
           $datos['user']=$user_data;
                            $this->load->view('admin/head.php');
              // $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/carga_masivausuarios.php',$datos);
		//$this->is_logged_in();

		//echo $this->load->view('examples/page_header', '', TRUE);

		// Load resources
		$this->load->helper('auth');
		
		$this->load->model('examples/validation_callables');
		$this->load->library('form_validation');

		$this->form_validation->set_data( $user_data );

		$validation_rules = [
                    	[
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'max_length[10]|is_unique[' . db_table('user_table') . '.user_id]',
				'errors' => [
					'is_unique' => 'User_id already in use.'
				]
			],
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
                            
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,6,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );

		if( $this->form_validation->run() )
		{
                    
			$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			//$user_data['user_id']    = $this->examples_model->get_unused_id();
			$user_data['created_at'] = date('Y-m-d H:i:s');

			// If username is not used, it must be entered into the record as NULL
//			if( empty( $user_data['username'] ) )
//			{
//				$user_data['username'] = NULL;
//			}
                        
                        $data= $this->usuario_model->create_user($user_data);
                        if($user){
                            $retorno[0]= true;
                            $retorno[1]="creado";
                            return $retorno;
                        }
                           
                        
                     
	}  else {
            if($user){
                $retorno[0]=false;
                $retorno[1]=validation_errors();
                return $retorno;
            }
             $data['error'] = validation_errors();
        }
        if($user){
           // En caso de que todo este bien y sea llamado desde creacion masiva de usuarios
        }  else {
                $data += $this->rules_password();
            $this->load->view('admin/head.php');
               $this->load->view('admin/dashboard_head.php');
            $this->load->view('admin/crear_usuario.php',$data);
            $this->load->view('admin/footer.php');
        }
        
     
     
        }
        /*Creacion masiva de usuarios a partir de un archivo excel
         */
        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'xlsx|xls';
                $config['max_size']             = 100;
                //$config['max_width']            = 1024;
               // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('admin/head.php');
                        $this->load->view('admin/dashboard_head.php');
                        $this->load->view('admin/configuracion.php', $error);
                        $this->load->view('admin/footer.php');
     
                }
                else
                {
                   // $data = array('upload_data' => $this->upload->data());
                        $data['nombre'] = $this->upload->data('orig_name');
                        
                        $this->load->library('excel');
                        
                                 $file='./uploads/'.$data['nombre'];
       
                                 $objPHPExcel = PHPExcel_IOFactory::load($file);
      $table = "<table cellspacing='0' width='100%' class='table table-striped'>"
              . "<thead><th>user_id</th><th>username</th><th>nombre</th><th>email</th><th>auth_level</th><th>Registro</th>"
              . "</thead><tbody>";
        
                     //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
//extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }
            foreach ($arr_data as $renglon_usuario) {
                $usuario = array();
                foreach ($renglon_usuario as $key => $valor) {
                    switch ($key) {
                        case 'A':
                            $usuario['user_id'] = $valor;
                            $usuario['passwd'] = $valor;
                            break;
                        case 'B':
                            $usuario['username'] = $valor;
                            break;
                        case 'C':
                            $usuario['nombre'] = $valor;
                            break;
                        case 'D':
                            $usuario['email'] = $valor;
                            break;
                        case 'E':
                            $usuario['auth_level'] = (int) $valor;
                            break;
                        default:
                            break;
                    }
                }
                $retorno = $this->create_user($usuario);
                
                if ($retorno[0]) {
                    //quiere decir que el usuario fue creado con exito
                    $table .= "<tr class='success'><td>".$usuario['user_id']."</td><td>"
                            .$usuario['username']."</td><td>"
                            .$usuario['nombre']."</td><td>"
                            .$usuario['email']."</td><td>"
                            .$usuario['auth_level']."</td><td>"
                            .$retorno[1]."</td>"
                            . "</tr>";
                } else {
                       $table .= "<tr class='danger'><td>".$usuario['user_id']."</td><td>"
                            .$usuario['username']."</td><td>"
                            .$usuario['nombre']."</td><td>"
                            .$usuario['email']."</td><td>"
                            .$usuario['auth_level']."</td><td>"
                            .$retorno[1]."</td>"
                            . "</tr>";
                }
            }
            $table .= "</tbody></table>";
            $data['table']=$table;
                        $this->load->view('admin/head.php');
                        //$this->load->view('admin/dashboard_head.php');
                        $this->load->view('admin/carga_masivausuarios.php', $data);
                        $this->load->view('admin/footer.php');
                       
                }
        }
}
