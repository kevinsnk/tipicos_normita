<?php
include "conexion.php";

$user_id=null;
$sql1= "SELECT * from empleado WHERE id_Emp  ";
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
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->nombre_Emp; ?>" name="Nombre" required>
  </div>
  <div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $person->apellido_Emp; ?>" name="Apellido" required>
  </div>
  <div class="form-group">
    <label for="Nit">Nit</label>
    <input type="text" class="form-control" value="<?php echo $person->NIT; ?>" name="NIT" required>
  </div>
  <div class="form-group">
    <label for="DUI">Dui</label>
    <input type="text" class="form-control" value="<?php echo $person->DUI; ?>" name="DUI" >
  </div>
  <div class="form-group">
    <label for="Direccion">Direccion</label>
    <input type="text" class="form-control" value="<?php echo $person->direccion; ?>" name="Direccion" >
  </div>
<input type="hidden" name="id" value="<?php echo $person->id_Emp; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizar.php",$("#actualizar").serialize(),function(data){
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