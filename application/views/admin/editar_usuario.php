
    <div class="container-fluid">
 

    <form action="<?php echo base_url() . 'usuario_admin/edit_user' ?>" class="form-horizontal" method="post" accept-charset="utf-8">

        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cedula">Cedula: </label>  
                <div class="col-md-4">
                    <input id="username" name="cedula" type="text" placeholder="Cedula" class="form-control input-md" value="" required="">
                    <span class="help-block">ej: 21785254</span>  
                </div>
            </div>
        
                    <input id="cedula_vieja" type="hidden" name="cedula_vieja" type="text" value="" required="">
                    <span class="help-block">ej: 21785254</span>  
             

            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Username</label>  
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="username" value="" class="form-control input-md" required="">
                    <span class="help-block">ej: jmartinez</span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre_usuario">Nombre</label>  
                <div class="col-md-4">
                    <input id="nombre_usuario" name="nombre_usuario" type="text" placeholder="Nombre" value="" class="form-control input-md" required="">
                    <span class="help-block">Ej: Juan martinez</span>  
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email: </label>  
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="email" value="" class="form-control input-md" required="">
                    <span class="help-block">jamartinez@example.com.co</span>  
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
                    <button id="submit" name="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>

        </fieldset>
    </form>
                            
   </div>
