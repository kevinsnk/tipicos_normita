
<html>
	<head>
		<title>Tipicos Normita</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
    
	</head>
  <header>
    <?php include "header.php"; ?>
  </header>
	<body>
	
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2 align="center">Ingredientes</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar" align="right">
 
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar ingrediente</a>
  <input type="button" class="btn btn-default" value="Marcas" name="B4" OnClick="location.href='./marca.php'">
  <input type="button" class="btn btn-default" value="Tipo Unidad" name="B4" OnClick="location.href='./unidad.php'">
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" align="center">Ingresar ingredientes</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
         <?php
             require_once("./conexion/conexion.php");
          ?>
  <div class="form-group">
    <label for="name">Nombre del ingrediente</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="name">Presentacion</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="presentacion" required>
  </div>
  <div class="form-group">
    <label for="name">Vencimiento</label>
    <input type="date" class="form-control" name="vencimiento" required>
  </div>
   <div class="form-group">
    <label for="phone">Marca</label>
    <select  class="form-control" name="marca" required>
      <option value=""> --- Seleccionar --- </option>
        <?php

          $consulta = 'SELECT ID_MARCA, MARCA FROM marca';
          $emp = $con->prepare($consulta);
          if($emp->execute()){$emp->bind_result($dID, $dNombre);
          $emp->store_result();
          if($emp->num_rows() > 0){
          while ($emp->fetch()) {
          ?>
          <option value="<?=$dID;?>"><?=$dNombre;?></option>
          <?php
          }
          }
          }
          $emp->close();
          ?>
    </select>
  
  </div>
  <div class="form-group">
    <label for="address">Cantidad</label>
    <input type="number" min="0" step="0.01" onkeypress="soloNumeros(event)" class="form-control" name="cantidad" required>
  </div>
<div class="form-group">
    <label for="phone">Unidad</label>
    <select  class="form-control" name="unidad" required>
      <option value=""> --- Seleccionar --- </option>
        <?php

          $consulta = 'SELECT ID_TIPO_UNIDAD, TIPO_UNIDAD FROM tipo_unidad';
          $emp = $con->prepare($consulta);
          if($emp->execute()){$emp->bind_result($dID, $dNombre);
          $emp->store_result();
          if($emp->num_rows() > 0){
          while ($emp->fetch()) {
          ?>
          <option value="<?=$dID;?>"><?=$dNombre;?></option>
          <?php
          }
          }
          }
          $emp->close();
          ?>
    </select>
  
  </div>

  

  <button type="submit" class="btn btn-default">Agregar</button>

</form>
        </div>

      </div>
    </div>
  </div>

<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./php_ingrediente/tabla.php","",function(data){
    
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php_ingrediente/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php_ingrediente/agregar.php",$("#agregar").serialize(),function(data){
      loadTabla();
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
   
  });

  function soloLetras(evt){

    var ch = String.fromCharCode(evt.which);

        if(!(/[a-zA-Z\s]/.test(ch))){
            evt.preventDefault();
        }
    }

  function soloNumeros(evt){

    var ch = String.fromCharCode(evt.which);

    if(!(/[0-9]/.test(ch))){
      evt.preventDefault();
    }
  } 

</script>

	</body>
</html>
