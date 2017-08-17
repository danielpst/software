<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                
                
            </button>
            <a class="navbar-brand" href="#">
                <img style="max-width:150px; margin-top: -4px;" src="<?php echo base_url()?>img/logo.jpg">
            </a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <?php echo config_item('auth_username');?>
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo base_url().'/test/logout' ?>"><i class='glyphicon glyphicon-off'></i> Salir</a>
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
        <a href="<?php echo base_url() . '/index_admin/index' ?>">
            <i class="glyphicon glyphicon-home">
                
            </i>
            Inicio
        </a>
        </li>
        <li class=""><a href="<?php echo base_url() . '/usuario_admin/vista_create_user' ?>"><i class='glyphicon glyphicon-plus'></i> Crear Usuarios  <span class="sr-only">(current)</span></a></li>
<li class=""><a href="<?php echo base_url().'/usuario_admin/ver_usuarios' ?>"><i class='glyphicon glyphicon-search'></i> Ver Usuarios  <span class="sr-only">(current)</span></a></li>
        
        <li class="">
           <a href="<?php echo base_url().'/configuracion' ?>">
            <i class="glyphicon glyphicon-home">
                
            </i>
            Configuracion
        </a>
        </li>
   
    </ul>
</div>
<div class="col-xs-12 col-md-6 col-md-offset-2 col-lg-10 espacio">