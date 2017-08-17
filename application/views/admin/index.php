<script lang="Javascript">
//     function consulta_cliente() {
//                var cod =$('input#codigo').val();
//                var nombre =$('input#nombre_cliente').val();
//                var nit =$('input#nit').val();
//               $.ajax({
//                  type: "post",
//                  url: "<?= $this->config->item('base_url');?>/factura/cliente",
//                  data:{codigo: cod,nombre:nombre,nit:nit},
//                  success: function(result) {                   
//                     var result1 = JSON.parse(result);
//                    $.each(result1, function(i, val){
//                        $('input#codigo').val(val.codigo);
//                        $('input#nit').val(val.nit);
//                        $('input#nombre_cliente').val(val.nombre);
//                        $('input#telefono').val(val.telefono);
//                        $('input#celular').val(val.celular); 
//                        $('input#direccion').val(val.direccion);
//                        $('input#ciudad').val(val.ciudad);
//                        //Los siguientes campos son para actualizar el usuario
//                        $('input#new_codigo').val(val.codigo);
//                        $('input#new_nit').val(val.nit);
//                        $('input#new_nombre_cliente').val(val.nombre);
//                        $('input#new_telefono').val(val.telefono);
//                        $('input#new_celular').val(val.celular); 
//                        $('input#new_direccion').val(val.direccion);
//                        $('input#new_ciudad').val(val.ciudad);
//                        
//                    }); 
//                  }
//               });
//            }
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
  function agregar(i){
      var conteo = $('input#conteo_programas').val();
      
  }
  function modal_agregar(id,nombre){
       $('#datos_programa').modal('show');
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
                ajax: "<?php echo base_url()?>index_admin/programas_varios",

            "columns": [
        { data: 'logo' },
        { data: 'nombre' },
        { data: 'acciones' }

    ],
         
            "processing":true,
            "scrollY": "400px",
            "scrollCollapse": true,
            
        });
    });
</script>
<!--Modal para Agregar un programa a un PC-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" id='datos_programa' role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del programa</h4>
      </div>
        <div class="row">
            <input id='pro_dinamico_id' value="" name='pro_dinamico_id' type='hidden'>
            <div class="col-md-12">
                
                                                <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-3" for="nombre_programa">nombre_programa</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="pro_dinamico_nombre" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                </div>
                                                <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-3" for="Serial">Serial</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="pro_dinamico_serial" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                </div>
                
            </div>
        </div>
    </div>
  </div>
</div>
<!--Fin del modal-->
<div class="col-sm-9">

    <div class="container-fluid">
        <div class="row">

            <form action="../submit" id="formentry" class="form-horizontal" role="form" data-parsley-validate novalidate>
                <div class="container-fluid shadow">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-12"><div class="row" id="tab1" data-role="tab">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a href="#tabContent2" data-toggle="tab" id="tabLabel2">Informacion General</a></li>
                                        <li class=""><a data-toggle="tab" href="#tabContent3" id="tabLabel3">Hardware</a></li>
                                        <li class=""><a href="#tabContent4" data-toggle="tab" id="tabLabel4">Red</a></li><li class="active"><a id="tabLabel85" href="#tabContent85" data-toggle="tab">Software</a></li><li class=""><a id="tabLabel86" href="#tabContent86" data-toggle="tab">Soporte</a></li><li><a id="tabLabel87" href="#tabContent87" data-toggle="tab">Responsable</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabContent2">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-3" for="placa">Placa<span class="req"> *</span></label>
                                                            <div class="controls col-sm-9">
                                                                <input id="placa" type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-minlength="1" data-parsley-maxlength="7" data-parsley-errors-container="#errId1"><span id="errId1" class="error"></span></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-3" for="tipo_equipo">Tipo Equipo<span class="req"> *</span></label>
                                                            <div class="controls col-sm-9">
                                                                <?php
                                                                echo form_dropdown('tipo_equipo', $tipos, '', 'id="tipo_equipo" class="form-control" data-role="select" selected="selected" required="required" data-parsley-errors-container="#errId2"');
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-3" for="marca_equipo">Marca:</label>
                                                                <div class="controls col-sm-9">
                                                                    <?php echo form_dropdown('marca_equipo', $marcas, '', 'id="marca_equipo" class="form-control" data-role="select" selected="selected" data-parsley-errors-container="#errId3"'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-3" for="estado_equipo">Estado<span class="req"> *</span></label>
                                                                <div class="controls col-sm-9">
                                                                    <?php
                                                                    echo form_dropdown('estado_equipo', $estados, '', 'id="estado_equipo" class="form-control" data-role="select" required="required" selected="selected" data-parsley-errors-container="#errId4"');
                                                                    ?>
                                                                </div>
                                                         </div>
                                                        <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-3" for="referencia">Referencia</label>
                                                                <div class="controls col-sm-9">

                                                                        <input id="referencia" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-3" for="serial">Serial<span class="req"> *</span></label>
                                                                    <div class="controls col-sm-9">

                                                                        <input id="serial" type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-3" for="producto_nro">Producto Nro.</label>
                                                                    <div class="controls col-sm-9">

                                                                        <input id="producto_nro" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId7"><span id="errId7" class="error"></span></div>

                                                                </div>
                                                        
                                                    </div>
                                                    <!--Lado derecho del Tab-->
                                                    <div class="col-md-6">
                                                        <label for="imagen_equipo">Imagen Equipo:</label>
                                                        <div class="input-group">
                                                        <input id="imagen_equipo" type="file" class="form-control" name="imagen_equipo">
                                                        </div>

                                                    </div>
                                                                                                            <!-- Panel de Informacion de Hoja de vida Fisica -->
                                                                <div class="col-sm-12 panel-group">
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-body">
                                                                                    <div class="form-group brdbot" style="display: block;">
                                                                                        <h4>Informaci&oacute;n Hoja de vida fisica</h4>
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label class="control-label control-label-left col-sm-3" for="folio">Folio numero:</label>
                                                                                                <div class="controls col-sm-2">
                                                                                                    <input id="folio" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId9"><span id="errId9" class="error"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                                                                               
                                                                                        <div class="form-group">
                                                                                                <label class="control-label control-label-left col-sm-3" for="field62">Hoja Fisica: </label>
                                                                                                <div class="controls col-sm-8">
                                                                                                    
                                                                                                      <input id="hoja_vida" type="file" class="form-control" name="hoja_vida">
                                                                                                </div>

                                                                                        </div>
                                                                
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                        </div>
                                                                </div>
 
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="tab-pane" id="tabContent3"><div class=""><div class="row"><div class="col-md-8"><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="marca_disco">Marca Disco Duro</label>
                                                                    <div class="controls col-sm-8">

                                                                        <input id="marca_disco" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId12"><span id="errId12" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="capacidad_disco">Capacidad Disco</label>
                                                                    <div class="controls col-sm-8">

                                                                        <select id="capacidad_disco" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="Option 1">160 GB</option>
                                                                            <option value="Option 2"> 500 GB</option>
                                                                            <option value="Option 3">1 TB</option>
                                                                            <option value="Option 4">Option 4</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="capacidad_ram">Capacidad RAM</label>
                                                                    <div class="controls col-sm-8">

                                                                        <select id="capacidad_ram" class="form-control" data-role="select" selected="selected" data-parsley-errors-container="#errId14">





                                                                            <option value=""></option><option value="256 MB">256 MB</option><option value="512 MB">512 MB</option><option value="1 GB">1 GB</option><option value="2GB">2GB</option><option value="3 GB">3 GB</option><option value="4 GB">4 GB</option><option value="8 GB">8 GB</option></select><span id="errId14" class="error"></span></div>

                                                    </div></div><div class="col-md-4"></div></div></div>
                                                                    
                                                </div>
                                                <div class="tab-pane" id="tabContent4">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-4" for="nombre_equipo">Nombre Equipo<span class="req"> *</span></label>
                                                            <div class="controls col-sm-8">
                                                                <input id="nombre_equipo" name="nombre_equipo"type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-errors-container="#errId1"><span id="errId1" class="error"></span></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-4" for="dominio">Dominio</label>
                                                            <div class="controls col-sm-8">
                                                                <input id="dominio" name="dominio" type="text" class="form-control k-textbox" data-role="text"   data-parsley-errors-container="#errId1"><span id="errId1" class="error"></span></div>
                                                        </div>
                                                        <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="en_red">En red</label>
                                                                    <div class="controls col-sm-3">

                                                                        <select id="en_red" name="en_red" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="0">No</option>
                                                                            <option value="1"> Si</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-4" for="nombre_red">Nombre Red</label>
                                                            <div class="controls col-sm-8">
                                                                <?php
                                                                echo form_dropdown('nombre_red', $redes, '', 'id="nombre_red" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                                                ?>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="dhcp">DHCP</label>
                                                                    <div class="controls col-sm-3">

                                                                        <select id="dhcp" name="dhcp" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="0">No</option>
                                                                            <option value="1"> Si</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="ip_fija">Ip Fija</label>
                                                                <div class="controls col-sm-8">

                                                                        <input id="ip_fija" name="ip_fija" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-4" for="mac_fija">MAC Fija</label>
                                                                <div class="controls col-sm-8">

                                                                        <input id="mac_fija" name="mac_fija" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="mac_wifi">MAC Wifi</label>
                                                                <div class="controls col-sm-8">

                                                                        <input id="mac_wifi" name="mac_wifi" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>

                            
                                                        
                                                    </div>
                                                    <!--Lado derecho del Tab-->
                                                    <div class="col-md-6">

                                                    </div>

 
                                                        </div>
                                                    </div></div>
                                        <div class="tab-pane" id="tabContent85">
                                            <div class="">
                                                <div class="row">
                                                    
                                                                                          <!-- Panel de Sistema Operativo-->
                                                                <div class="col-sm-12 panel-group">
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-body">
                                                                                    <div class="form-group brdbot" style="display: block;">
                                                                                        <h4>Sistema Operativo</h4>
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label class="control-label control-label-left col-sm-4" for="folio">Sistema Operativo:</label>
                                                                                                <div class="controls col-sm-8">
                                                                                                    
                                                                                                       <?php
                                                                echo form_dropdown('sistema_operativo', $windows, '', 'id="sistema_operativo" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                                                ?>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                                                                               
                                                       <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="Serial_windows">Serial</label>
                                                                <div class="controls col-sm-8">

                                                                        <input id="serial_windows" name="serial_windows" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                        </div>
                                                                
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                        </div>
                                                                </div>                                                   
                                                    
                                                    
                                                                                   <!-- Panel de Sistema Operativo-->
                                                                <div class="col-sm-12 panel-group">
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-body">
                                                                                    <div class="form-group brdbot" style="display: block;">
                                                                                        <h4>Office</h4>
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label class="control-label control-label-left col-sm-4" for="office">Office</label>
                                                                                                <div class="controls col-sm-8">
                                                                                                    
                                                                                                       <?php
                                                                echo form_dropdown('office', $office, '', 'id="office" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                                                ?>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                                                                               
                                                       <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="Serial_office">Serial Office</label>
                                                                <div class="controls col-sm-8">

                                                                        <input id="serial_office" name="serial_office" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                        </div>
                                                                
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                        </div>
                                                                </div> 
                                                 </div> <!--Cierre de la fila -->
                                                                               
               <div class="panel panel-info">
		<div class="panel-heading">
                   
		    <div class="btn-group pull-right">
                        <a  href="<?php echo base_url().'/usuario_admin/vista_create_user' ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Crear Usuario</a>
			</div>
		 <h4><i class='glyphicon glyphicon-th-list'></i> Seleccione los programas a ingresar</h4>
		</div>
        
        
			<div class="panel-body">
                            <table id="tabla-programas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead >
                                    <tr class="warning">
                                        <th>logo</th>
                                        <th>nombre</th>
                                        <th>Acciones</th>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>

       
                        </div>
		</div>	        
                                                        
                                                        
                                                        
                                                        
                                              
                                            </div><!-- Cierre div class="" -->
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane" id="tabContent86"><div class=""></div></div><div class="tab-pane" id="tabContent87"><div class=""></div></div>
                                            </div>
                                        </div></div>
                                </div>



                            </div>
                        </div>
                        </form>
                    </div>
                </div>

      
                    <form action="<?php echo base_url() . 'index_admin/ingresar_equipo' ?>" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        
                     
                        <input type="file" name="imagen_soporte">

                        <input type="submit" value="Submit">  

                    </form>


     
 </div>    <!--/. div contenedor lado izquierdo pagina