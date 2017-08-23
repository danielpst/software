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

    function confirmar_delete(i,name){
     var id= i;
     var nombre = name;
     $('input#programa_delete_id').val(id);
     $('input#programa_delete_nombre').val(nombre);
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
        $('#tabla-programas').DataTable({
               "ServerSide":true,
               "DisplayLength": 10,
               "DisplayStart": 0,
                ajax: "<?php echo base_url()?>administrador_programas/todos_programas",

            "columns": [
        { data: 'logo' },
        { data: 'id' },
        { data: 'nombre' },
        {data:'categoria'},
        { data: 'acciones' }

    ],
         
            "processing":true,
            "scrollY": "800px",
            "scrollCollapse": true,
            
        });
    });
</script>
<!-- Modal para agregar un program-->
<div class="modal fade" id="AgregarPrograma" tabindex="-1" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ingresar Programa</h4>
      </div>
      <div class="modal-body">
        
                   <form action="<?php echo base_url() . 'administrador_programas/ingresar_programa' ?>"   class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label control-label-left col-sm-2" for="logo_label">Logo: </label>
                     <div class="controls col-sm-9">                                           
                           <input id="mi_logo"  type="file" class="form-control" name="mi_logo">
                           <h5>Tamaño del logo maximo 150 px X 150 px</h5>
                    </div>
                    
    
                </div>
                 <div class="form-group">
                    <label class="control-label control-label-left col-sm-2" for="categoria">Categoria*: </label>      
                       
                       
                                                                                           <div class="controls col-sm-5">

                         <?php
                                                                    echo form_dropdown('categoria', $categorias, '', 'id="categorias" class="form-control" data-role="select" required="required" selected="selected" data-parsley-errors-container="#errId4"');
                                                                    ?>
                                                                                           
                                                                                           </div>
                                                                        
                     </div>                                                      
              <div class="form-group">
                <label class="control-label control-label-left col-sm-2" for="nombre">Nombre<span class="req"> *</span></label>
                     <div class="controls col-sm-9">
                                <input id="nombre" name="nombre" type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span>
                     </div>
              </div>
        
          <!--</div><!--Fin de la fila-->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Ingresar</button>
            </form>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->


<!--Modal para confirmar borrado de un programa-->
<div class="modal fade bs-example-modal-sm" id="Modal_confirmar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Programa</h4>
      </div>
        <div class="modal-body">
            ¿Esta seguro que desea Eliminar el programa:
             <form action="<?php echo base_url() . 'administrador_programas/eliminar_programa' ?>" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <label class="col-sm-2 control-label" for="programa_id">id: </label>  
                <div class="col-sm-3">
                    <input id="programa_delete_id" name="programa_delete_id" type="text" readonly="true" class="form-control input-md" value="">
                 
                </div>
            </div>
       <div class="form-group">
                <label class="col-sm-2 control-label" for="programa_nombre">nombre: </label>  
                <div class="col-md-9">
                    <input id="programa_delete_nombre" name="programa_delete_nombre" type="text" readonly="true" class="form-control input-md" value="">
                 
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
</div> <!-- /. Fin del Modal eliminar Programa-->


<div class="col-sm-9">
   <div class="panel panel-info">
		<div class="panel-heading">
                   
		    <div class="btn-group pull-right">
                         <button type="button" data-toggle="modal" data-target="#AgregarPrograma" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span> Ingresar Programa</button>
			</div>
		 <h4><i class='glyphicon glyphicon-list'></i> Programas</h4>
		</div>
        
        
			<div class="panel-body">
                            <table id="tabla-programas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead >
                                    <tr class="warning">
                                        <th>logo</th>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Acciones</th>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>

                            
                            

       
                            	</div>
		</div>	
     </div>    <!--/. div contenedor lado izquierdo pagina