<?php
include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT ID_CARGO, NOMBRE_CARGO, SALARIO FROM cargo_empleado WHERE ID_CARGO=".$_GET["id"]; 
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Nombre cargo</label>
    <input type="text" class="form-control" value="<?php echo $person->NOMBRE_CARGO; ?>" name="nombre" required>
  </div>

  <div class="form-group">
    <label for="name">Nombre cargo</label>
    <input type="number" class="form-control" value="<?php echo $person->SALARIO; ?>" name="sueldo" required>
  </div>
  
<input type="hidden" name="id" value="<?php echo $person->ID_CARGO; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php_cargo/actualizar.php",$("#actualizar").serialize(),function(data){
      loadTabla();
    });
    //alert("Agregado exitosamente!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>