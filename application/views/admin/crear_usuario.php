
    <div class="container-fluid">

    <?php
    if (isset($error)) {
        echo' 
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>  
                             ' . $error . ' 
                        </div>
                            ';
    } else if (isset($correcto)) {
        echo '
                            <div class="alert alert-success" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>  
                             ' . $correcto . ' 
                        </div>
                            . ';
    }
    ?>  
 
    
    <div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
                        <a  href="<?php echo base_url().'/usuario_admin/ver_usuarios' ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Ver Usuarios</a>
			</div>
			<h4><i class='glyphicon glyphicon-user'></i> Crear Usuario</h4>
		</div>
			<div class="panel-body">

    <form action="<?php echo base_url() . 'usuario_admin/create_user' ?>" class="form-horizontal" method="post" accept-charset="utf-8">

        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cedula">Cedula: </label>  
                <div class="col-md-4">
                    <input id="username" name="cedula" type="text" placeholder="Cedula" class="form-control input-md" value="<?php if (isset($_POST['cedula'])) {
        echo $_POST['cedula'];
    } ?>" required="">
                    <span class="help-block">ej: 21785254</span>  
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Username</label>  
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="username" value="<?php if (isset($_POST['username'])) {
        echo $_POST['username'];
    } ?>" class="form-control input-md" required="">
                    <span class="help-block">ej: jmartinez</span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre_usuario">Nombre</label>  
                <div class="col-md-4">
                    <input id="nombre_usuario" name="nombre_usuario" type="text" placeholder="Nombre" value="<?php if (isset($_POST['nombre'])) {
        echo $_POST['nombre'];
    } ?>" class="form-control input-md" required="">
                    <span class="help-block">Ej: Juan martinez</span>  
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email: </label>  
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="email" value="<?php if (isset($_POST['email'])) {
        echo $_POST['email'];
    } ?>" class="form-control input-md" required="">
                    <span class="help-block">jamartinez@example.com.co</span>  
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Contrasena</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="contrasena" class="form-control input-md" required="">
                    <span class="help-block">
<?php
echo nl2br('- ' . $min_chars_for_password . '<br/>' .
        '- ' . $max_chars_for_password . '<br/>' .
        '- ' . $min_digits_for_password . '<br/>' .
        '- ' . $min_lowercase_chars_for_password . '<br/>' .
        '- ' . $min_uppercase_chars_for_password . '<br/>' .
        '- ' . $min_non_alphanumeric_chars_for_password);
?>
                    </span>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="role">Role</label>
                <div class="col-md-4">
                    <select id="role" name="role" class="form-control">
                        <option value="1">Usuario</option>
                        <option value="9">Admin</option>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>

        </fieldset>
    </form>
                            	</div>
		</div>	

</div>
