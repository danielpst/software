<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once APPPATH."/third_party/PHPExcel.php";
class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
    
    public function create_usuario($usuario){
        
    }
    
    public function leer_archivo($archivo){
   //   $header=array();
   //      $arr_data=array();
         $file='./uploads/'.$archivo;
        $objPHPExcel = PHPExcel_IOFactory::load($file);
      
        
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
                        $usuario['user_id'] = $value;
                        $usuario['passwd'] = $value;
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
                        $usuario['auth_level'] = $valor;
                        break;
                    default:
                        break;
                }
            }
            
        }


//send the data in an array format
$datos['header'] = $header;
$datos['values'] = $arr_data;

return $datos;
    }
    
}


?>