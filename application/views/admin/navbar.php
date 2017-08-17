 <div class="col-sm-3">

<nav class=" navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Codigo Para Proyectos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          
          <li class="dropdown">
              <a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false"><i class='glyphicon glyphicon-user'></i> Usuarios<span class="caret"></span></a>
          
              <ul class="dropdown-menu">
                  <li class=""><a href="<?php echo base_url().'/usuario_admin/vista_create_user' ?>"><i class='glyphicon glyphicon-plus'></i> Crear Usuarios  <span class="sr-only">(current)</span></a></li>
                  <li class=""><a href="<?php echo base_url().'/usuario_admin/ver_usuarios' ?>"><i class='glyphicon glyphicon-plus'></i> Ver Usuarios  <span class="sr-only">(current)</span></a></li>
              </ul>
          
          </li>
          
          
          
          
        <li class=""><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>
		<li class=""><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
		<li class=""><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
           <li class=""><a href="<?php echo base_url().'/index_admin/dashboard' ?>"><i class='glyphicon glyphicon-plus'></i> Dashboard <span class="sr-only">(current)</span></a></li>
          <li><a href="#" target=''><i class='glyphicon glyphicon-usuer'></i>Bienvenido:  <?php echo $this->auth_nombre?></a></li>
        <li><a href="#" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Soporte</a></li>
		<li><a href="<?php echo base_url().'/test/logout' ?>"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div><!-- /.div contenedor nav