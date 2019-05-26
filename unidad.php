
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
		<h2 align="center">Tipo unidad</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar" align="right">
 
     
      
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar unidad</a>
  <input type="button" class="btn btn-default" value="Ingredientes" name="B4" OnClick="location.href='./ingredientes.php'">
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" align="center">Ingresar tipo unidad</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
         <?php
             require_once("./conexion/conexion.php");
          ?>
  <div class="form-group">
    <label for="name">Unidad</label>
    <input type="text" class="form-control" onkeypress="soloLetras(event)" name="nombre" required>
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

  $.get("./php_unidad/tabla.php","",function(data){
    
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php_unidad/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php_unidad/agregar.php",$("#agregar").serialize(),function(data){
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
