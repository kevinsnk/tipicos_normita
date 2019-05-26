
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
		<h2 align="center">Empleados</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar" align="right">
 
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar empleado</a>
  <input type="button" class="btn btn-default" value="Cargo" name="B4" OnClick="location.href='./cargo.php'">
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" align="center">Ingresar empleado</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
         <?php
             require_once("./conexion/conexion.php");
          ?>
  <div class="form-group">
    <label for="name">NOMBRE</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="name">APELLIDO</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="name">DUI</label>
    <input type="number" class="form-control" onkeypress="soloNumeros(event)" name="dui" min="9 "maxlength="9"  required>
  </div>
  <div class="form-group">
    <label for="name">NIT</label>
    <input type="number" class="form-control" onkeypress="soloNumeros(event)" name="nit"  max="14" required>
  </div>
  <div class="form-group">
    <label for="name">TELEFONO 1</label>
    <input type="number" class="form-control" onkeypress="soloNumeros(event)" name="tel1"  maxlength="8" required>
  </div>
   <div class="form-group">
    <label for="name">TELEFONO 2</label>
    <input type="number" class="form-control" onkeypress="soloNumeros(event)" name="tel2" " maxlength="8"  >
  </div>
  <div class="form-group">
    <label for="name">FECHA NACIMIENTO</label>
    <input type="date" class="form-control" name="fechanac" >
  </div>
  <div class="form-group">
    <label for="name">DIRECCION</label>
    <input type="text" class="form-control" name="direccion" required>
  </div>
   <div class="form-group">
    <label for="phone">ESTADO</label>
    <select  class="form-control" name="estado" required>
      <option value=""> --- Seleccionar --- </option>
        <?php

          $consulta = 'SELECT ID_ESTADO_EMPLEADO, ESTADO_EMPLEADO FROM estado_empleado';
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
    <label for="phone">CARGO</label>
    <select  class="form-control" name="cargo" required>
      <option value=""> --- Seleccionar --- </option>
        <?php

          $consulta = 'SELECT ID_CARGO, NOMBRE_CARGO FROM cargo_empleado';
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
    <label for="name">USUARIO</label>
    <input type="text" class="form-control" name="user" required>
  </div>
  <div class="form-group">
    <label for="name">CONTRASEÑA</label>
    <input type="password" class="form-control" name="contra" required>
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

  $.get("./php_empleados/tabla.php","",function(data){
    
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php_empleados/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php_empleados/agregar.php",$("#agregar").serialize(),function(data){
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

    if(!(/[0-9\-]/.test(ch))){
      evt.preventDefault();
    }
  } 
</script>

	</body>
</html>
