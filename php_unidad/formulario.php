<?php
include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT ID_TIPO_UNIDAD, TIPO_UNIDAD FROM tipo_unidad WHERE ID_TIPO_UNIDAD=".$_GET["id"]; 
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
    <label for="name">Nombre de la marca</label>
    <input type="text" class="form-control" value="<?php echo $person->TIPO_UNIDAD; ?>" name="nombre" required>
  </div>
  
<input type="hidden" name="id" value="<?php echo $person->ID_TIPO_UNIDAD; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php_unidad/actualizar.php",$("#actualizar").serialize(),function(data){
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