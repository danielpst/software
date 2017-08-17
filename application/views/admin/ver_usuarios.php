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
<script lang="Javascript">
    function eliminar(){
        var cedula = $('input#usuario_delete').val();
        $.ajax({
			type: "POST",
			url: "<?php echo base_url()?>usuario_admin/eliminar_usuario",
			data: {user_id: cedula}
			             
                      
    });
        $('#Modal_confirmar').modal('close');
    }
    function confirmar_delete(i){
     var cedula= i;
     $('input#usuario_delete').val(cedula);
     $('#Modal_confirmar').modal('show');
    }    
  
    function editar(i){
        var cedula= i;
         $.ajax({
			type: "POST",
			url: "<?php echo base_url()?>usuario_admin/obtener_unico_usuario",
			data: {user_id: cedula},
			success: function(result){                  
                        var result1 = JSON.parse(result);
                        $.each(result1, function(i, val){
                        $('input#cedula_vieja').val(val.user_id);
                        $('input#cedula').val(val.user_id);
                        $('input#username').val(val.username);
                        $('input#nombre_usuario').val(val.nombre);
                        $('input#email').val(val.email); 
                        $('#role').val(val.auth_level);
                      
    });
                  $('#Modal_editar').modal('show');
	}
        
        }) 
    }

    $(document).ready(function(){
        $('#tabla-usuarios').DataTable({
          //  $.ajax({
            //      type: "post",
              //    url: "<?php echo base_url()?>usuario_admin/all_usuarios",
                //  success: function(result) {   
                     //result1= result;
                    //var result1 = JSON.parse(result);
                  //  alert(result);
                 //   $.each(result1, function(i, val){
                //        $('input#codigo').val(val.codigo);
 
                        
               //   }); 
               "ServerSide":true,
                       "DisplayLength": 10,
"DisplayStart": 0,
                   ajax: "<?php echo base_url()?>usuario_admin/all_usuarios",
            //"ajax": {
                //"url":"<?php echo base_url()?>usuario_admin/all_usuarios",
                //"type":"post",
                
                //success: function(result) {  
                //    data=result;
              //  };
                
   
            //},
            "columns": [
        { data: 'user_id' },
        { data: 'username' },
        { data: 'nombre' },
        { data: 'auth_level' },
        { data: 'acciones' }

    ],
         
            "processing":true,
            "scrollY": "400px",
            "scrollCollapse": true,
            
        });
               //   }
             //  });
        
        
        
     
    });
</script>
<!--Modal para confirmar borrado de un usuario-->
<div class="modal fade bs-example-modal-sm" id="Modal_confirmar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Usuario</h4>
      </div>
        <div class="modal-body">
            ¿Esta seguro que desea Eliminar al Usuario:
             <form action="<?php echo base_url() . 'usuario_admin/eliminar_usuario' ?>" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <label class="col-md-4 control-label" for="cedula">Cedula: </label>  
                <div class="col-md-4">
                    <input id="usuario_delete" name="usuario_delete" type="text" readonly="true" class="form-control input-md" value="">
                 
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button id="submit"  type="submit" class="btn btn-primary">Si</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modal para editar un usuario-->
<div class="modal fade" id="Modal_editar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar usuario</h4>
      </div>
         <form action="<?php echo base_url() . 'usuario_admin/update_user' ?>" class="form-horizontal" method="post" accept-charset="utf-8">
      <div class="modal-body">
       

       
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cedula">Cedula: </label>  
                <div class="col-md-4">
                    <input id="cedula" name="cedula" type="text" placeholder="Cedula" required class="form-control input-md" value="" required="">
                    <span class="help-block">ej: 21785254</span>  
                </div>
            </div>
        
                    <input id="cedula_vieja" type="hidden" name="cedula_vieja" type="text" value="" required="">
               

            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Username</label>  
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="username" required value="" class="form-control input-md" required="">
                    <span class="help-block">ej: jmartinez</span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre_usuario">Nombre</label>  
                <div class="col-md-4">
                    <input id="nombre_usuario" name="nombre_usuario" type="text" required placeholder="Nombre" value="" class="form-control input-md" required="">
                    <span class="help-block">Ej: Juan martinez</span>  
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email: </label>  
                <div class="col-md-6">
                    <input id="email" name="email" type="email" placeholder="email" required value="" class="form-control input-sm " required="">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="submit" type="submit" class="btn btn-primary">Actualizar</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    
    <div class="panel panel-info">
		<div class="panel-heading">
                   
		    <div class="btn-group pull-right">
                        <a  href="<?php echo base_url().'/usuario_admin/vista_create_user' ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Crear Usuario</a>
			</div>
		 <h4><i class='glyphicon glyphicon-user'></i> Ver Usuarios</h4>
		</div>
        
        
			<div class="panel-body">
                            <table id="tabla-usuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead >
                                    <tr class="warning">
                                        <th>Usuario_id</th>
                                        <th>Usuarname</th>
                                        <th>Nombre</th>
                                        <th>Nivel</th>
                                        <th>Acciones</th>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>
                                   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

       
                            	</div>
		</div>	