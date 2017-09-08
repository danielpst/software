<html lang="es"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--<title>Bootstrap 101 Template</title>-->

    <!-- Bootstrap -->
       
    <link href="http://localhost/alcaldia1/assets/css/bootstrap.min.css" rel="stylesheet">   
    <link href="http://localhost/alcaldia1/assets/css/propio.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/alcaldia1/assets/css/datatable.css">
<!-- <link href="http://localhost/alcaldia1/assets/css/propio1.css" rel="stylesheet">
    -->
 
  <script type="text/javascript" src="http://localhost/alcaldia1/assets/js/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="http://localhost/alcaldia1/assets/js/bootstrap.js"></script>
   

    <script type="text/javascript" src="http://localhost/alcaldia1/assets/js/datables.js"></script>
    </head>
    <body><nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                
                
            </button>
            <a class="navbar-brand" href="#">
                <img style="max-width:150px; margin-top: -4px;" src="http://localhost/alcaldia1/img/logo.jpg">
            </a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="http://localhost/alcaldia1//test/logout"><i class="glyphicon glyphicon-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--
Comienza el menu izquierdo-->
<div id="slider-collapse" class="col-sm-2 col-lg1 sidebar">
    <ul class="nav menu">
        <li class="">
        <a href="http://localhost/alcaldia1//index_admin/index">
            <i class="glyphicon glyphicon-home">
                
            </i>
            Inicio
        </a>
        </li>
        <li class=""><a href="http://localhost/alcaldia1//usuario_admin/vista_create_user"><i class="glyphicon glyphicon-plus"></i> Crear Usuarios  <span class="sr-only">(current)</span></a></li>
<li class=""><a href="http://localhost/alcaldia1//usuario_admin/ver_usuarios"><i class="glyphicon glyphicon-search"></i> Ver Usuarios  <span class="sr-only">(current)</span></a></li>
        
        <li class="">
           <a href="http://localhost/alcaldia1//configuracion">
            <i class="glyphicon glyphicon-home">
                
            </i>
            Configuracion
        </a>
        </li>
   
    </ul>
</div>
<div class="col-xs-12 col-md-6 col-md-offset-2 col-lg-10 espacio"><div class="col-sm-9"><!--INICIO DEL DIV PRINCIPAL DEL LADO DERECHO-->
    
<div class="container">
<div class="row">
  <div class="col-md-7">
    <h4> Placa del Equipo:</h4>
    <div class="col-md-offset-1 col-md-7">
      <h1 style="color: #5e9ca0; font-size: 120px;">0002458</h1>
  </div>
  </div>
  <div class="col-md-5">
    <img src="http://production-alkosto-data.s3-website-us-east-1.amazonaws.com/media/catalog/product/cache/6/image/69ace863370f34bdf190e4e164b6e123/c/o/computador_compaq-cq2951.jpg" width="300" heigth="300">
     </div>
</div>
<hr>
<div class="row"> 
    <div class="row">
    <div class="col-md-11">
   <h4>Informaciòn General</h4>
    </div>
    <div class="col-md-1">
      <div class="form-group pull-right">
<button id="editar_hardware" type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      </div>
  </div>
  </div>
 
  <div class="col-md-offset-1 col-md-8">
    <dl class="dl-horizontal">
    <dt>Estado:</dt>
      <dd><p class="text-success"><strong>Alta.</strong></p></dd>

<dt>Marca:</dt>
  <dd>HP.</dd>
        <dt>Tipo Equipo:</dt>
  <dd>Computo</dd>
    <dt>Referencia:</dt>
  <dd>All In One</dd>
    <dt>Serial:</dt>
  <dd>XMLFGRTEWS</dd>
    <dt>Producto Nro:</dt>
  <dd>XMLFGRTEWS#095</dd>
  <dt>Fecha de compra:</dt>
  <dd>15-Jun-2017</dd>
    <dt>Hoja de Vida Fisica:</dt>
      <dd>http://software_hoja_vida.pdf</dd>
    <dt>Hoja de Vida Folio:</dt>
  <dd>2</dd>
    <dt>Instaladores Fisicos:</dt>
  <dd>CD de Recovery, Drivers y Manual de Instruccion</dd>

    </dl>
  
  
  </div>
    <div class="col-md-3">
   
    <img src="http://www.brandemia.org/sites/default/files/sites/default/files/logo_hp_antes.jpg" width="100" heigth="100">

  </div>
</div>
<hr>
<div class="row">
      <div class="row">
    <div class="col-md-11">
    <h4>Información hardware</h4>
    </div>
    <div class="col-md-1">
      <div class="form-group pull-right">
<button id="editar_hardware" type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      </div>
  </div>
  </div>
 
  <div class="col-md-offset-1 col-md-8">
    <dl class="dl-horizontal">
    <dt>Procesador:</dt>
      <dd><p class=""><strong>Intel core i-7</strong></p></dd>
<dt>Marca Disco Duro:</dt>
  <dd>Western</dd>
    <dt>Capacidad Disco Duro:</dt>
  <dd>1 TB</dd>
    <dt>Capacidad de la RAM:</dt>
  <dd>4 GB</dd>


    </dl>
  
  
  </div>

</div>
<hr>
<div class="row">
        <div class="row">
    <div class="col-md-11">
    <h4>Información de red</h4>
    </div>
    <div class="col-md-1">
      <div class="form-group pull-right">
<button id="editar_hardware" type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      </div>
  </div>
  </div>
  
  <div class="col-md-offset-1 col-md-8">
    <dl class="dl-horizontal">
    <dt>Nombre del Equipo:</dt>
      <dd><p class=""><strong>SISTEMAS-PC</strong></p></dd>
<dt>En Red:</dt>
  <dd>Si</dd>
    <dt>Red:</dt>
  <dd>Alcaldia</dd>
    <dt>Ip fija:</dt>
  <dd>192.168.1.14</dd>
    <dt>MAC fija:</dt>
      <dd>00:12:23:45:45:24</dd>
    <dt>MAC Wifi:</dt>
      <dd>00:12:23:45:45:24</dd>


    </dl>
  
  
  </div>

</div>
<hr>
<div class="row">
  <div class="row">
    <div class="col-md-11">
  <h4>Información del Sistema Operativo</h4>
    </div>
    <div class="col-md-1">
      <div class="form-group pull-right">
<button id="editar_hardware" type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      </div>
  </div>
  </div>
  
  <div class="col-md-offset-1 col-md-8">
    <dl class="dl-horizontal">
    <dt>Sistema Operativo:</dt>
      <dd><p class=""><strong>Windows 7 Professional x64 Bits</strong></p></dd>
<dt>Serial:</dt>
  <dd>88XJB-7KMP9-9HX2V-PYKKK-KWB44</dd>
    <dt>Fecha de Instalación:</dt>
  <dd>09-AGO-2014</dd>
      <dt>Tiene Recovery en D.D:</dt>
  <dd>Si</dd>
      <div class="col-md-offset-1">
    <dt>Usuario:</dt>
  <dd>Administrador</dd>
      <dt>Clave:</dt>
  <dd>AGu4rne318</dd>
      <dt>Tipo Cuenta:</dt>
  <dd>Administrador</dd>
 
      </div>


    </dl>
  <div class="panel panel-info">
      <div class="panel-heading">
        <h5 class="panel-title">Este equipo presenta un formateo, se instalo el sistema operativo: WINDOWS 7 PROFESSIONAL 
        el dia 09-10-2017</h5>
  </div>
</div>
  
  </div>
  <div class="col-md-3">

    <img src="https://softlay.net/wp-content/uploads/2015/05/Windows-7-Ultimate-Logo-200x200.jpg" width="100" heigth="100">

  </div>

</div>
<hr>
<div class="row">
   <div class="row">
    <div class="col-md-11">
     <h4>Información del Office</h4>
    </div>
    <div class="col-md-1">
      <div class="form-group pull-right">
<button id="editar_hardware" type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      </div>
  </div>
  </div>
 
  <div class="col-md-offset-1 col-md-8">
    <dl class="dl-horizontal">
    <dt>Office:</dt>
      <dd><p class=""><strong>Office 2016 Hogar y Empresas</strong></p></dd>
<dt>Serial:</dt>
  <dd>88XJB-7KMP9-9HX2V-PYKKK-KWB44</dd>
    <dt>Fecha de Instalación:</dt>
  <dd>10-AGO-2014</dd>



    </dl>
  
  
  </div>
  <div class="col-md-3">
    <img src="https://www.softzone.es/app/uploads/2015/08/Office-Logotipo.png?x=634&amp;y=309" width="100" heigth="100">

  </div>
</div>
<div class="row">
  <h4>Programas Instalados</h4>
  <div class="col-md-offset-1">
<table class="table table-striped">
  <thead>
      <tr>
        <th>Logo</th>
        <th>Nombre</th>
        <th>Serial</th>
        <th>Fecha Instalación</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td> <img src="https://www.softzone.es/app/uploads/2015/08/Office-Logotipo.png?x=634&amp;y=309" width="100" heigth="100">
</td>
      <td>WinRar x 64 Bits</td>
      <td>Sin Licencia</td>
      <td>12-Ago-2017</td>
    </tr>
  </tbody>
</table>
  
  
  </div>

</div>
</div>    
    
    
</div><!--FIN DEL DIV PRINCIPAL DEL LADO DERECHO-->




</div>

</body></html>