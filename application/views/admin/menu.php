<script lang="Javascript">
    window.onload=function(){

$('.dropdown').click(function(){
$(this).siblings(".submenu").toggleClass('hide');


});
}
    </script>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-4 sidebar3">

                <div class="logo">
                    <img src="http://lorempixel.com/output/sports-q-c-64-64-2.jpg" class="img-responsive" alt="Logo">
                </div>
                <div class="name">
                    <p>Arshi S</p>
                    <p>12 Contributions</p>
                </div>
            </div>
            <div class="col-md-8">
                <?php
                if(isset($title)){
                    echo "<h1>".$title."</h1>";
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 sidebar3">
                <div class="left-navigation">
                    <ul>
                        <li><i class="glyphicon glyphicon-search" aria-hidden="true"></i>Busqueda Equipos</li>
                        <li class="list">
                            <div class="dropdown">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>Ingresos 
                            </div>
                            <ul class="submenu hide">
                           
                                <li><a href="<?php echo base_url().'administrador_equipo/vista_computo' ?>">Equipo de Cómputo</a></li>
                                <li><a href="<?php echo base_url().'administrador_equipo/vista_periferico' ?>">Ingreso de Periféricos</a></li>
                            </ul>
                        </li>
                        <li class="list">
                            <div class="dropdown">
                                <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>Administración 
                            </div>
                            <ul class="submenu hide">
                           
                                <li><a href="<?php echo base_url().'administrador_programas' ?>">Programas</a></li>
                                <li><a href="<?php echo base_url().'administrador_marca' ?>">Marcas de Equipos</a></li>
                                <li><a href="<?php echo base_url().'administrador_red' ?>">Redes de Internet</a></li>
                                <li><a href="<?php echo base_url().'administrador_dependencua' ?>">Dependencias</a></li>
                            </ul>
                        </li>
                        
                        <li class="list">
                            <div class="dropdown">
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>Usuarios
                            </div>
                            <ul class="submenu hide">
                                <li><a href="<?php echo base_url().'usuario_admin/ver_usuarios' ?>">Buscar</a></li>
                                <li><a href="<?php echo base_url().'usuario_admin/vista_create_user' ?>">Ingresar</a></li>
                            </ul>
                        </li>
                      </ul>
                        <ul class="category">
                        <li><i class="glyphicon glyphicon-menu-righ" aria-hidden="true"></i>##</li>
                        <li><i class="glyphicon glyphicon-menu-righ" aria-hidden="true"></i>##</li>
                        <li><i class="glyphicon glyphicon-menu-righ" aria-hidden="true"></i>##</li>
                      </ul>
                        <ul>
                        <li><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>Mi cuenta</li>
                        <li><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>Salir</li>
                    </ul>
                </div>
            </div>
