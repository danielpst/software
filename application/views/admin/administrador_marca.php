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

    function confirmar_delete(i){
     var id= i;
     $('input#nombre_delete_id').val(id);
     $('input#marca_delete_id').val(id);
     $('#Modal_confirmar').modal('show');
    }  
    function editar(i){
        var nombre= i;
        $('input#nombre_old').val(nombre);
        $('input#nombred').val(nombre);

                  $('#ActualizaMarca').modal('show');

    }

    $(document).ready(function(){
        $('#tabla-marcas').DataTable({
               "ServerSide":true,
               "DisplayLength": 10,
               "DisplayStart": 0,
                ajax: "<?php echo base_url()?>administrador_marca/todas_marcas",

            "columns": [
        { data: 'logo' },

        { data: 'nombre' },

        { data: 'acciones' }

    ],
         
            "processing":true,
            "scrollY": "800px",
            "scrollCollapse": true,
            
        });
    });
</script>
<!-- Modal para editar una marca-->
<div class="modal fade" id="ActualizaMarca" tabindex="-1" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Actualizar Marca</h4>
      </div>
      <div class="modal-body">
        
                   <form action="<?php echo base_url() . 'administrador_marca/actualizar_marca' ?>"   class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                             <div class="form-group">
                <label class="control-label control-label-left col-sm-2" for="nombre">Nombre Actual<span class="req"> *</span></label>
                     <div class="controls col-sm-9">
                         <input id="nombred" name="nombred" type="text" class="form-control k-textbox" data-role="text" disabled="disable"required="required" data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span>
                    <input id="nombre_old" name="nombre_old" type="hidden"> 
                     </div>
              </div>
                       <div class="form-group">
                    <label class="control-label control-label-left col-sm-2" for="logo_label">Logo: </label>
                     <div class="controls col-sm-9">                                           
                           <input id="mi_logo"  type="file" class="form-control" name="mi_logo">
                           <h5>Tamaño del logo maximo 150 px X 150 px</h5>
                    </div>
                    
    
                </div>
              <div class="form-group">
                <label class="control-label control-label-left col-sm-2" for="nombre">Nombre Nuevo<span class="req"></span></label>
                     <div class="controls col-sm-9">
                                <input id="nombre_new" name="nombre_new" type="text" class="form-control k-textbox" data-role="text"  data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span>
                     </div>
              </div>                                                     
              <div class="form-group">

          <!--</div><!--Fin de la fila-->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
            </form>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div><!-- /.modal -->

<!-- Modal para agregar una marca-->
<div class="modal fade" id="AgregarMarca" tabindex="-1" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ingresar Marca</h4>
      </div>
      <div class="modal-body">
        
                   <form action="<?php echo base_url() . 'administrador_marca/ingresar_marca' ?>"   class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label control-label-left col-sm-2" for="logo_label">Logo: </label>
                     <div class="controls col-sm-9">                                           
                           <input id="mi_logo"  type="file" class="form-control" name="mi_logo">
                           <h5>Tamaño del logo maximo 150 px X 150 px</h5>
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
        <h4 class="modal-title">Eliminar Marca</h4>
      </div>
        <div class="modal-body">
            ¿Esta seguro que desea Eliminar la marca?
             <form action="<?php echo base_url() . 'administrador_marca/eliminar_marca' ?>" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <label class="col-sm-2 control-label" for="marca_nombre">Nombre: </label>  
                <div class="col-sm-8">
                    <input id="nombre_delete_id" name="nombre_delete_id" type="text" readonly="true" class="form-control input-md" value="">
                    <input id="marca_delete_id" name="marca_delete_id" type="hidden">
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
                         <button type="button" data-toggle="modal" data-target="#AgregarMarca" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span> Ingresar Marca</button>
			</div>
		 <h4><i class='glyphicon glyphicon-list'></i> Marcas</h4>
		</div>
        
        
			<div class="panel-body">
                            <table id="tabla-marcas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead >
                                    <tr class="warning">
                                        <th>logo</th>
     
                                        <th>Nombre</th>

                                        <th>Acciones</th>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>

                            
                            

       
                            	</div>
		</div>	
     </div>    <!--/. div contenedor lado izquierdo pagina