
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
        $('#tabla-equipos').DataTable({
               "ServerSide":true,
               "DisplayLength": 15,
               "DisplayStart": 0,
                ajax: "<?php echo base_url()?>equipo/todos_equipos",

            "columns": [
        { data: 'placa' },
        { data: 'tipo' },
        { data: 'estado' },
        {data:'marca'},
        {data:'serial'},
        { data: 'acciones' }

    ],
         
            "processing":true,
            "scrollY": "800px",
            "scrollCollapse": true,
            
        });
    });
</script>

<div class="col-md-8">
   <div class="panel panel-info">
		<div class="panel-heading">
                   
		    <div class="btn-group pull-right">
                         <button type="button" data-toggle="modal" data-target="#AgregarEquipo" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span> Ingresar Equipo</button>
			</div>
		 <h4><i class='glyphicon glyphicon-list'></i>Equipos en el Sistema.</h4>
		</div>
        
        
			<div class="panel-body">
                            <table id="tabla-equipos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead >
                                    <tr class="warning">
                                        <th>Placa</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Marca</th>
                                        <th>Serial</th>
                                        <th>Acciones</th>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>

                            
                            

       
                            	</div>
		</div>	
     </div>    <!--/. div contenedor lado izquierdo pagina