<div class="col-sm-9"><!--INICIO DEL DIV PRINCIPAL DEL LADO DERECHO-->
    
<div class='container'>
  <?php
  if(isset($equipo)){
     
         foreach($equipo as $equipo){
             echo " 
<div class='row'>
  <div class='col-md-7'>
    <h4> Placa del Equipo:</h4>
    <div class='col-md-offset-1 col-md-7'>
      <h1 style='color: #5e9ca0; font-size: 120px;'>$equipo->placa</h1>
  </div>
  </div>
  <div class='col-md-5'>
    <img src='$this->config->item('variable');uploads/Imagen_equipo/$equipo->imagen' width='300' heigth='300' />
     </div>
</div>
<hr>
<div class='row'> 
    <div class='row'>
    <div class='col-md-11'>
   <h4>Informaciòn General</h4>
    </div>
    <div class='col-md-1'>
      <div class='form-group pull-right'>
<button id='editar_hardware' type='button' class='btn btn-default'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
      </button>
      </div>
  </div>
  </div>
 
  <div class='col-md-offset-1 col-md-8'>
    <dl class='dl-horizontal'>
    <dt>Estado:</dt>
      <dd><p class='text-success'><strong>Alta.</strong></p></dd>

<dt>Marca:</dt>
  <dd>$equipo->id_marca_equipo</dd>
        <dt>Tipo Equipo:</dt>
  <dd>$equipo->id_tipo_equipo</dd>
    <dt>Referencia:</dt>
  <dd>$equipo->referencia</dd>
    <dt>Serial:</dt>
  <dd>$equipo->serial</dd>
    <dt>Producto Nro:</dt>
  <dd>$equipo->producto_nro</dd>
  <dt>Fecha de compra:</dt>
  <dd>$equipo->fecha_compra</dd>
    <dt>Hoja de Vida Fisica:</dt>
      <dd>http://$equipo->hoja_fisica</dd>
    <dt>Hoja de Vida Folio:</dt>
  <dd>$equipo->folio_nro</dd>
    <dt>Instaladores Fisicos:</dt>
  <dd>CD de Recovery, Drivers y Manual de Instruccion</dd>

    </dl>
  
  
  </div>
    <div class='col-md-3'>
   
    <img src='http://www.brandemia.org/sites/default/files/sites/default/files/logo_hp_antes.jpg' width='100' heigth='100' />

  </div>
</div>
         <hr>";}
  }else{
      echo "No hay resultados";
  }
?>

</div> <!--Cierre div contenedor-->
</div>><!--Columna 2-->