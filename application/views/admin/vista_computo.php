<script lang="Javascript">

    function remover(i){
        var pro = $('input#proInstalados').val();
        var ids=pro.split(",");
        var index = ids.indexOf(""+i+"");
        var final= ids.splice(index, 1);
        $('input#proInstalados').val(ids);
    $('input#instalacion').removeAttr("required");
    $('#div'+i).hide(); 
    }

 function agregar(i){
   if ($('#div'+i).is(":visible")){
               alert("Ya esta en lista el programa");
               return false;
    }
    var instalados= $('input#proInstalados').val();

    $('input#proInstalados').val(instalados+","+i)
    $('input#instalacion').prop("required", true);
    $('#div'+i).fadeToggle("fast");
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
        $(".oculto").hide(); 
        //Aqui comienza manejador de OS1
        $('input[name=grabarOS1]').change(
                function(){ 
                    
                    if($('input[name=grabarOS1]').is(':checked')){
                        $("#nombreOS1").prop('disabled', true);
                        $("#passOS1").prop('disabled', true); 
                        $("#tipoOS1").prop('disabled', true);
                        $("#nombreOS1").prop('required', false);
      
                        $("#tipoOS1").prop('required', false);

                        
                    }else{
                        $("#nombreOS1").removeAttr("disabled");
                        $("#passOS1").removeAttr("disabled");
                        $("#tipoOS1").removeAttr("disabled");
;
                        $("#nombreOS1").prop('required', true);

                        $("#tipoOS1").prop('required', true);

                    }
                });
                //AQUI comienza Manejador del  check OS2
                           
        $('input[name=grabarOS2]').change(
                function(){ 
                    
                    if($('input[name=grabarOS2]').is(':checked')){
                        $("#nombreOS2").prop('disabled', true);
                        $("#passOS2").prop('disabled', true); 
                        $("#tipoOS2").prop('disabled', true);
                        $("#nombreOS2").prop('required', false);

                        $("#tipoOS2").prop('required', false);

                        
                    }else{
                        $("#nombreOS2").removeAttr("disabled");
                        $("#passOS2").removeAttr("disabled");
                        $("#tipoOS2").removeAttr("disabled");
;
                        $("#nombreOS2").prop('required', true);

                        $("#tipoOS2").prop('required', true);

                    }
                });

        //AQUI COMIENZA MANEJADOR del check responsables
                $('input[name=check_responsable]').change(
                function(){ 
                    
                    if($('input[name=check_responsable]').is(':checked')){
                        $("#fecha_asignacion").prop('disabled', true);
                        $("#nombre_responsable").prop('disabled', true); 
                        $("#dependencia").prop('disabled', true);
                         $("#observacion").prop('disabled', true);
                        $("#fecha_asignacion").prop('required', false);
                        $("nombre_responsable").prop('required', false);
                        $("#dependencia").prop('required', false);

                        
                    }else{
                        $("#fecha_asignacion").removeAttr("disabled");
                        $("#nombre_responsable").removeAttr("disabled");
                        $("#dependencia").removeAttr("disabled");
                        $("#observacion").removeAttr("disabled");
                        $("#fecha_asignacion").prop('required', true);
                        $("#nombre_responsable").prop('required', true);
                        $("#dependencia").prop('required', true);

                    }
                });
        
        $('input[name=check_soporte]').change(
                function(){ 
                    
                    if($('input[name=check_soporte]').is(':checked')){
                        $("#actividad_realizada").prop('disabled', true);
                        $("#falla").prop('disabled', true); 
                        $("#fecha_soporte").prop('disabled', true);
                        $("#folio_soporte").prop('disabled', true);
                        $("#hoja_soporte").prop('disabled', true);
                        $("#solucion").prop('disabled', true);
                        
                        $("#actividad_realizada").prop('required', false);
                        $("#falla").prop('required', false);
                        $("#fecha_soporte").prop('required', false);
                        $("#solucion").prop('required', false);

                        
                    }else{
                        $("#actividad_realizada").removeAttr("disabled");
                        $("#falla").removeAttr("disabled");
                        $("#fecha_soporte").removeAttr("disabled");
                        $("#folio_soporte").removeAttr("disabled");
                        $("#hoja_soporte").removeAttr("disabled");
                        $("#solucion").removeAttr("disabled");
                        $("#actividad_realizada").prop('required', true);
                        $("#falla").prop('required', true);
                        $("#fecha_soporte").prop('required', true);
                        $("#solucion").prop('required', true);

                    }
                });
                //DESACTIVAR SECCION usuario OS1
                $('input[name=grabarOS1]').attr('checked',true)
                        $("#nombreOS1").prop('disabled', true);
                        $("#passOS1").prop('disabled', true); 
                        $("#tipoOS1").prop('disabled', true);
                        $("#nombreOS1").prop('required', false);
                        $("#tipoOS1").prop('required', false);
                //DESACTIVAR SECCION usuario OS2
                $('input[name=grabarOS2]').attr('checked',true)
                        $("#nombreOS2").prop('disabled', true);
                        $("#passOS2").prop('disabled', true); 
                        $("#tipoOS2").prop('disabled', true);
                        $("#nombreOS2").prop('required', false);
                        $("#tipoOS2").prop('required', false);
                //DESACTIVAR SECCION DE SOPORTE 
                        $('input[name=check_soporte]').attr('checked', true);
                        $("#actividad_realizada").prop('disabled', true);
                        $("#falla").prop('disabled', true); 
                        $("#fecha_soporte").prop('disabled', true);
                        $("#folio_soporte").prop('disabled', true);
                        $("#hoja_soporte").prop('disabled', true);
                        $("#solucion").prop('disabled', true);
                        
                        $("#actividad_realizada").prop('required', false);
                        $("#falla").prop('required', false);
                        $("#fecha_soporte").prop('required', false);
                        $("#solucion").prop('required', false);
                //DESACTIVAR SECCION DE RESPONSABLE 
                        $('input[name=check_responsable]').attr('checked', true);
                        $("#fecha_asignacion").prop('disabled', true);
                        $("#nombre_responsable").prop('disabled', true); 
                        $("#dependencia").prop('disabled', true);
                        $("#observacion").prop('disabled', true);
                        $("#fecha_asignacion").prop('required', false);
                        $("nombre_responsable").prop('required', false);
                        $("#dependencia").prop('required', false);
                        $("#observacion").prop('required', false);
  
    });
</script>

<div class="col-md-8">

    <div class="container-fluid">
        <div class="row">

            <form action="<?php echo base_url() . 'index_admin/prueba' ?>"   class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="container-fluid shadow">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-12"><div class="row" id="tab1" data-role="tab">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabContent2" data-toggle="tab" id="tabLabel2">Informacion General</a></li>
                                        <li class=""><a data-toggle="tab" href="#tabContent3" id="tabLabel3">Hardware</a></li>
                                        <li class=""><a href="#tabContent4" data-toggle="tab" id="tabLabel4">Red</a></li>
                                        <li class=""><a id="tabLabel85" href="#tabContent85" data-toggle="tab">S. Operativo</a></li>
                                        <li class=""><a id="tabLabel86" href="#tabContent86" data-toggle="tab">Software</a></li>
                                        <li class=""><a id="tabLabel87" href="#tabContent87" data-toggle="tab">Soporte</a></li>
                                        <li><a id="tabLabel88" href="#tabContent88" data-toggle="tab">Responsable</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabContent2">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label control-label-left col-sm-3" for="placa">Placa<span class="req"> *</span></label>
                                                            <div class="controls col-sm-9">
                                                                <input id="placa" name="placa" type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-minlength="1" data-parsley-maxlength="7" data-parsley-errors-container="#errId1"><span id="errId1" class="error"></span></div>
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

                                                                        <input id="referencia" name="referencia"type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-3" for="serial">Serial<span class="req"> *</span></label>
                                                                    <div class="controls col-sm-9">

                                                                        <input id="serial" name="serial" type="text" class="form-control k-textbox" data-role="text" required="required" data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-3" for="producto_nro">Producto Nro.</label>
                                                                    <div class="controls col-sm-9">

                                                                        <input id="producto_nro" name="producto_nro"type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId7"><span id="errId7" class="error"></span></div>

                                                                </div>
                                                        
                                                    </div>
                                                    <!--Lado derecho del Tab-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-5" for="fecha_compra">Fecha Compra:</label>
                                                                    <div class="controls col-sm-6">

                                                                        <input id="fecha_compra" name="fecha_compra" type="date" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId6"><span id="errId6" class="error"></span></div>

                                                        </div>
                                                        <div class="form-group ">
                                  <label class="control-label control-label-left col-sm-6" for="inst_fisicos">Instaladores Fisicos</label>
                                  <div class="controls col-sm-12">

                                      <textarea id="ins_fisicos" name="ins_fisicos" rows="6" class="form-control k-textbox" data-role="textarea" placeholder="Ingrese Aqui informacion de los Cd, con los que vino el equipo y que van a ser guardados fisicamente. EJ: drivers, Recovery"style="margin-top: 0px; margin-bottom: 0px; height: 100px;" data-maxwords="200" data-parsley-errors-container="#errId3"></textarea><span id="errId3" class="error"></span></div>

                              </div>
                                                        <label for="imagen_equipo">Imagen Equipo:</label>
                                                        <div class="input-group">
                                                        <input id="imagen_equipo" type="file" class="form-control" name="imagen_equipo">
                                                        <h6>Tamaño maximo permitido 300 x 300 pixeles</h6>
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
                                                                                                    <input id="folio_hv" name="folio_hv" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId9"><span id="errId9" class="error"></span>
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
                                                
                                                <div class="tab-pane" id="tabContent3"><div class=""><div class="row"><div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="procesador">Procesador:</label>
                                                                    <div class="controls col-sm-8">

                                                                        <input id="procesador" name="procesador"type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId12"><span id="errId12" class="error"></span></div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="marca_disco">Marca Disco Duro</label>
                                                                    <div class="controls col-sm-8">

                                                                        <input id="marca_disco" name="marca_disco"type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId12"><span id="errId12" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="capacidad_disco">Capacidad Disco</label>
                                                                    <div class="controls col-sm-8">

                                                                        <select id="capacidad_disco" name="capacidad_disco"class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="160 GB">160 GB</option>
                                                                            <option value="320 GB">320 GB</option>
                                                                            <option value="500 GB"> 500 GB</option>
                                                                            <option value="1 TB">1 TB</option>
                                                                            
                                                                        </select><span id="errId13" class="error"></span></div>

                                                                </div><div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="capacidad_ram">Capacidad RAM</label>
                                                                    <div class="controls col-sm-8">

                                                                        <select id="capacidad_ram" name="capacidad_ram" class="form-control" data-role="select" selected="selected" data-parsley-errors-container="#errId14">





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

                                                                        <select id="dhcp" name="dhcp" name="dhcp" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
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
                                                                                                <label class="control-label control-label-left col-sm-4" for="SistemaO">Sistema Operativo:</label>
                                                                                                <div class="controls col-sm-7">
                                                                                                    
                                                                                                       <?php
                                                                echo form_dropdown('sistema_operativo', $windows, '', 'id="sistema_operativo" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                                                ?>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                                                                               
                                                       <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="Serial_windows">Serial</label>
                                                                <div class="controls col-sm-7">

                                                                        <input id="serial_windows" name="serial_windows" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                        </div>
                                                                                                                                <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="fecha_windows">Fecha Instalación</label>
                                                                <div class="controls col-sm-4">

                                                                        <input id="fecha_windows" name="fecha_windows" type="date" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                        </div>
                                                                                                                                                <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="recovery">Recovry en PC</label>
                                                                    <div class="controls col-sm-2">

                                                                        <select id="has_recovery" name="has_recovery" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                          <option value="1"> Si</option>
                                                                            <option value="0">No</option>
                                                                            
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="original">Original</label>
                                                                    <div class="controls col-sm-2">

                                                                        <select id="original" name="original" required class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value="1"> Si</option>
                                                                            <option value="0">No</option>
                                                                            
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                                
                                                                                    </div>
                                                                                    
                                                                         
                                                                            <h4>Usuarios del Sistema Operativo</h4> 
                                                                            <div id='' class='col-xs-12 well'>
                                                                               
  

                                                                                                        <div class="form-group">
                                                                                                            <label class="control-label control-label-left col-sm-2"><input type="checkbox" id="grabarOS1" name="grabarOS1" value="1">Ignorar</label>
                                                                <label class="control-label control-label-left col-sm-2" for="UsuarioOS">Nombre</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="nombreOS1" name="nombreOS1" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                                                               <div class="form-group">
                                                                                                            
                                                                <label class="control-label control-label-left col-sm-4" for="ContraseñaOS">Contraseña:</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="passOS1" name="passOS1" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                                                               <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="UsuarioSO">Tipo:</label>
                                                                    <div class="controls col-sm-4">

                                                                        <select id="tipoOS1" name="tipoOS1" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="Administrador">Administrador</option>
                                                                            <option value="Usuario Estandar">Usuario Estandar</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                                            </div>
                                                                     <div id='' class='col-xs-12 well'>
                                                                                                        <div class="form-group">
                                                                                                            <label class="control-label control-label-left col-sm-2"><input type="checkbox" name="grabarOS2" id="grabarOS2"value="1">Ignorar</label>
                                                                <label class="control-label control-label-left col-sm-2" for="UsuarioOS">Nombre</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="nombreOS2" name="nombreOS2" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                                                          <div class="form-group">
                                                                                                            
                                                                <label class="control-label control-label-left col-sm-4" for="ContraseñaOS">Contraseña:</label>
                                                                <div class="controls col-sm-6">

                                                                        <input id="passOS2" name="passOS2" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span></div>

                                                        </div>
                                                                    <div class="form-group">
                                                                                                    
                                                                    <label class="control-label control-label-left col-sm-4" for="UsuarioSO">Tipo:</label>
                                                                    <div class="controls col-sm-4">

                                                                        <select id="tipoOS2" name="tipoOS2" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value=""></option>
                                                                            <option value="Administrador">Administrador</option>
                                                                            <option value="Usuario Estandar">Usuario Estandar</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                                                                            </div>
                                                                                   </div>
                                                                        </div>
                                                                    
                                                                </div>                                                   
 
                                                 </div> <!--Cierre de la fila -->
                                                                               
        
                                                        
                                                        
                                                        
                                                        
                                              
                                            </div><!-- Cierre div class="" -->
  </div>
                                   
                                            
                                            
                                     
                                        
                                        
                                        
                                        
  <!--TAB PARA SOFTWARE-->
<div class="tab-pane" id="tabContent86">
    <div class="">
        <div class="row">
            <!--Contenido del Tab86 relativo al software-->


            <!-- Panel de Office-->
            <div class="col-sm-12 panel-group">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group brdbot" style="display: block;">
                            <h4>Office</h4>

                            <div class="form-group">
                                <label class="control-label control-label-left col-sm-4" for="office">Office</label>
                                <div class="controls col-sm-7">

                                    <?php
                                    echo form_dropdown('office', $office, '', 'id="office" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                    ?>


                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label control-label-left col-sm-4" for="Serial_office">Serial Office</label>
                                <div class="controls col-sm-7">

                                    <input id="serial_office" name="serial_office" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                </div>

                            </div>
                                                                                                                                                            <div class="form-group">
                                                                <label class="control-label control-label-left col-sm-4" for="fecha_offcie">Fecha Instalación</label>
                                                                <div class="controls col-sm-4">

                                                                        <input id="fecha_office" name="fecha_office" type="date" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId5"><span id="errId5" class="error"></span>
                                                                </div>

                                                        </div>
                                                                                                <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="original">Original</label>
                                                                    <div class="controls col-sm-2">

                                                                        <select id="originalof" name="originalof" class="form-control" required data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value="0">No</option>
                                                                            <option value="1"> Si</option>
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
<div class="panel panel-info">
    <div class="panel-heading">
        <h4>
            <i class='glyphicon glyphicon-th-list'></i>
            Seleccione los programas a ingresar
        </h4>
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
                                                
                                                
                                                                                   <!--PANELES QUE APARECERAN A MEDIDA QUE SE SELECCIONA EL BOTON AGREGRAR -->  
  
  <input type="hidden" name="proInstalados" id="proInstalados">
      
   <?php foreach($all_pro as $pro){
               
                echo " 
          
                  <div id='div$pro->id' class='col-xs-12 well oculto'>
                       <div class='btn-group pull-right'>
                         <button type='button' onclick='remover($pro->id)' class='btn btn-mini btn-default'><i class='glyphicon glyphicon-trash'></i></button>
			</div>
                             <div class='row'>                                                 

      
                    <h4>$pro->nombre</h4>	   
  			<div class='col-sm-2'>
                    <img src='uploads/logos/$pro->logo' alt='$pro->nombre' height='100' width='100'>
        	</div>
          <div class='col-sm-9'>
                 <div class='form-group'>
                    <label class='control-label control-label-left col-sm-4' for='label_1'>Serial:</label>
                        <div class='controls col-sm-8'>
                            <input id='serial$pro->id' name='serial$pro->id' type='text' class='form-control k-textbox' data-role='text' data-parsley-errors-container='#errId5'><span id='errId5' class='error'></span>
                        </div>
                 </div>
                <div class='form-group'>
                    <label class='control-label control-label-left col-sm-4' for='label_1'>Fecha Instalacion: *</label>
                        <div class='controls col-sm-6'>
                            <input id='instalacion$pro->id' name='instalacion$pro->id' type='date' class='form-control k-textbox' data-role='text' data-parsley-errors-container='#errId5'><span id='errId5' class='error'></span>
                        </div>
                 </div>
          </div>
        </div>

    </div>   ";
                   
                   
                   
                   
                                
            }
            
   
   ?> 
                                            </div><!--Cierre de la clase row-->
                                            </div><!--Fin del div class del tab 86-->
                                                
                                        </div>
  <div class="tab-pane" id="tabContent87">
      <div class="">
              <div class="row">
                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6"><div class="form-group">
                                  <label class="control-label control-label-left col-sm-3">Ignorar</label>
                                  <div class="controls col-sm-9">

                                      <label class="checkbox" for="checkbox4"><input type="checkbox" value="1" id="check_soporte" name="check_soporte" data-parsley-errors-container="#errId1">No completar estos campos</label><span id="errId1" class="error"></span></div>

                              </div><div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="field1">Fecha</label>
                                  <div class="controls col-sm-9">

                                  <input id="fecha_soporte" name="fecha_soporte" type="date" class='form-control k-textbox' data-role='text' data-parsley-errors-container='#errId5'><span id='errId5' class='error'></span>

                              </div>
                              </div>
                              <div class="col-md-9">
                                                                      <div class="form-group">
                                                                    <label class="control-label control-label-left col-sm-4" for="solucion">Se soluciono</label>
                                                                    <div class="controls col-sm-6">

                                                                        <select id="solucion" name="solucion" class="form-control" data-role="select" data-parsley-errors-container="#errId13">
                                                                            <option value="1"> Si</option>
                                                                            <option value="0">No</option>
                                                                            
                                                                        </select><span id="errId13" class="error"></span></div>

                                                        </div>
                              </div></div><div class="row"><div class="col-md-12"><div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="field10">Falla</label>
                                  <div class="controls col-sm-9">

                                      <textarea id="falla" name="falla" rows="3" class="form-control k-textbox" data-role="textarea" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" data-maxwords="200" data-parsley-errors-container="#errId3"></textarea><span id="errId3" class="error"></span></div>

                              </div>
                                <div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="label_actividad_realizada">Actividad Realizada</label>
                                  <div class="controls col-sm-9">

                                      <textarea id="actividad_realizada" name="actividad_realizada" rows="3" class="form-control k-textbox" data-role="textarea" data-maxwords="200"  data-parsley-errors-container="#errId4"></textarea><span id="errId4" class="error"></span></div>

                              </div>
                                  </div>
                              </div>
                      </div>
              </div>





          
      </div>
          <div class="row">
              <!-- Panel de Informacion de Hoja de vida Fisica -->
              <div class="col-sm-12 panel-group">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group brdbot" style="display: block;">
                              <h4>Informaci&oacute;n Hoja de Soporte fisica</h4>

                              <div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="folio">Folio numero:</label>
                                  <div class="controls col-sm-2">
                                      <input id="folio_soporte" name="folio_soporte" type="text" class="form-control k-textbox" data-role="text" data-parsley-errors-container="#errId9"><span id="errId9" class="error"></span>
                                  </div>
                              </div>


                              <div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="field62">Hoja Fisica: </label>
                                  <div class="controls col-sm-8">

                                      <input id="hoja_soporte" type="file" class="form-control" name="hoja_soporte">
                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>
              </div>

          </div>



      </div>
  </div>
  
  
  <!--Inicio Tab para el responsable-->
  <div class="tab-pane" id="tabContent88">
      <div class="">
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group" style="display: block;">
                                      <label class="control-label control-label-left col-sm-3">Ignorar</label>
                                      <div class="controls col-sm-9">
                                          <label class="checkbox" for="checkbox16">
                                              <input type="checkbox" value="1" id="check_responsable" name="check_responsable" data-parsley-errors-container="#errId1">No completar estos campos</label><span id="errId1" class="error"></span></div>

                                  </div>
                              </div>
                              <div class="col-md-6"></div>
                                  
                          </div>
                          <div class="form-group" style="display: block;">
                              <label class="control-label control-label-left col-sm-3" for="fecha_asignacion">Fecha Asignaci&oacute;n</label>
                              <div class="controls col-sm-3">
                                    <input id="fecha_asignacion" type="date" class="form-control k-input" data-role="date" role="textbox" aria-haspopup="true" aria-expanded="false" aria-owns="field38_dateview" aria-disabled="false" aria-readonly="false" aria-label="Current focused date is null" data-error-container="#errfield38" style="width: 100%;" name="fecha_asignacion" data-parsley-errors-container="#errId2">
                                    </div>

                          </div><div class="form-group">
                              <label class="control-label control-label-left col-sm-3" for="nombre_responsable">Nombre</label>
                              <div class="controls col-sm-6">

                                  <input id="nombre_responsable" type="text" class="form-control k-textbox" data-role="text" name="nombre_responsable" data-parsley-maxwords="40" data-parsley-errors-container="#errId3"><span id="errId3" class="error"></span></div>

                          </div><div class="form-group">
                              <label class="control-label control-label-left col-sm-3" for="field40">Dependencia</label>
                              <div class="controls col-sm-6">

                                          <?php
                                    echo form_dropdown('dependencia', $dependencias, '', 'id="dependencia" class="form-control" data-role="select" selected="selected"  data-parsley-errors-container="#errId2"');
                                    ?>
                              </div>

                          </di></div></div></div>
                  <div class="row"><div class="col-md-12"><div class="form-group">
                                  <label class="control-label control-label-left col-sm-3" for="observacion">Observacion</label>
                                  <div class="controls col-sm-9">

                                      <textarea id="observacion" name="observacion" rows="3" class="form-control k-textbox" data-role="textarea" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" data-maxwords="250" data-parsley-errors-container="#errId3"></textarea><span id="errId3" class="error"></span></div>

                              </div>

                                  </div>
                              </div>
                  
          </div>
                                



<div class="form-group pull-right">
			    
			    
                
		<button id="registrar_equipo" type="submit" class="btn btn-primary" name="registrar_equipo">Registrar Equipo</button></div>
      </div><!--Fin div class="" del Tab responsable-->
  </div><!--Fin del TAB responsable-->
  
  
  
  
  
  
  
  
  
                                </div></div>
                        </div>



                            </div>
                        </div>
                        
                    </div>
                </div>

                    </form>


     
 </div>    <!--/. div contenedor lado izquierdo pagina