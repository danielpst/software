<script lang="Javascript">




    $(document).ready(function(){
                //AQUI COMIENZA MANEJADOR del check configuracion de red
                $('input[name=check_red]').change(
                function(){ 
                    
                    if($('input[name=check_red]').is(':checked')){
                        $("#nombre_equipo").prop('disabled', true);
                        $("#dominio").prop('disabled', true); 
                        $("#en_red").prop('disabled', true);
                         $("#nombre_red").prop('disabled', true);
                         $("#ip_fija").prop('disabled', true);
                         $("#dhcp").prop('disabled', true);
                         $("#mac_fija").prop('disabled', true);
                         $("#mac_wifi").prop('disabled', true);
                        $("#nombre_equipo").prop('required', false);
                        $("#dominio").prop('required', false);
                        $("#en_red").prop('required', false);
                        $("#nombre_red").prop('required', false);
                        $("#dhcp").prop('required', false);
                        $("#ip_fija").prop('required', false);
                        $("#mac_fija").prop('required', false);
                        $("#mac_wifi").prop('required', false);

                        
                    }else{
                        $("#nombre_equipo").removeAttr("disabled");
                        $("#dominio").removeAttr("disabled");
                        $("#en_red").removeAttr("disabled");
                        $("#nombre_red").removeAttr("disabled");
                        $("#ip_fija").removeAttr("disabled");
                        $("#dhcp").removeAttr("disabled");
                        $("#mac_wifi").removeAttr("disabled");
                        $("#mac_fija").removeAttr("disabled");
                        $("#nombre_equipo").prop('required', true);
                        $("#dominio").prop('required', true);
                        $("#en_red").prop('required', true);
                        $("#nombre_red").prop('required', true);
                        $("#ip_fija").prop('required', true);
                        $("#dhcp").prop('required', true);
                        $("#mac_fija").prop('required', true);
                        $("#mac_wifi").prop('required', true);

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
                //DESACTIVAR LOS CAMPOS DE LA SECCION CONFIGURACION DE RED
                        $('input[name=check_red]').attr('checked', true);
                        $("#nombre_equipo").prop('disabled', true);
                        $("#dominio").prop('disabled', true);
                        $("#en_red").prop('disabled', true);
                        $("#nombre_red").prop('disabled', true);
                        $("#dhcp").prop('disabled', true);
                        $("#ip_fija").prop('disabled', true);
                        $("#mac_fija").prop('disabled', true);
                        $("#mac_wifi").prop('disabled', true);
    });
</script>

<div class="col-md-8">

    <div class="container-fluid">
        <div class="row">

            <form action="<?php echo base_url() . 'equipo/ingresar_periferico' ?>"   class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="container-fluid shadow">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row" id="tab1" data-role="tab">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabContent2" data-toggle="tab" id="tabLabel2">Informacion General</a></li>
                                        <li class=""><a href="#tabContent4" data-toggle="tab" id="tabLabel4">Red</a></li>
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
                                
<div class="tab-pane" id="tabContent4">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                  <label class="control-label control-label-left col-sm-3">Ignorar</label>
                                  <div class="controls col-sm-9">

                                      <label class="checkbox" for="checkbox2"><input type="checkbox" value="1" id="check_red" name="check_red" data-parsley-errors-container="#errId1">No completar estos campos</label><span id="errId1" class="error"></span></div>

                              </div>
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
  
  
  
  
  
  
  
  
  
                                </div>
                                    </div>
                       



                            </div>
                        </div>
                        
                    </div>
                </div>

                    </form>
</div>
</div>
     
 </div>    <!--/. div contenedor lado izquierdo pagina