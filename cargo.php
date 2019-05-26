
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
		<h2 align="center">Cargos de empleados</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar" align="right">
 
      
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar cargo</a>
  <input type="button" class="btn btn-default" value="Empleados" name="B4" OnClick="location.href='./empleados.php'">
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" align="center">Ingresar cargo</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
         <?php
             require_once("./conexion/conexion.php");
          ?>
  <div class="form-group">
    <label for="name">Nombre del cargo</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="name">Sueldo</label>
    <input type="number" step="0.01" class="form-control"  name="sueldo" required>
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

  $.get("./php_cargo/tabla.php","",function(data){
    
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php_cargo/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php_cargo/agregar.php",$("#agregar").serialize(),function(data){
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
</script>

	</body>
</html>
