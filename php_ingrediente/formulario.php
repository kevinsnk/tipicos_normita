<?php
include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT tipo_unidad.TIPO_UNIDAD, ingrediente.INGREDIENTE, ingrediente.PRESENTACION , ingrediente.VENCIMIENTO, marca.MARCA, ingrediente.CANTIDAD,  ingrediente.ID_INGREDIENTES FROM tipo_unidad INNER JOIN ingrediente ON tipo_unidad.ID_TIPO_UNIDAD=ingrediente.TIPO_UNIDAD INNER JOIN marca on marca.ID_MARCA=ingrediente.MARCA WHERE ID_INGREDIENTES=".$_GET["id"]; 
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
    <label for="name">Nombre del ingrediente</label>
    <input type="text" class="form-control" value="<?php echo $person->INGREDIENTE; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="name">Presentacion</label>
    <input type="text" class="form-control" value="<?php echo $person->PRESENTACION; ?>" name="presentacion" required>
  </div>
  <div class="form-group">
    <label for="name">Vencimiento</label>
    <input type="date" class="form-control" value="<?php echo $person->VENCIMIENTO; ?>" name="vencimiento" required>
  </div>
   <div class="form-group">
    <label for="phone">Marca</label>
    <select  class="form-control" name="marca" required>
      <option value=""><?php echo $person->MARCA;?> </option>
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
    <label for="address" >Cantidad</label>
    <input type="text" class="form-control" value="<?php echo $person->CANTIDAD; ?>" name="cantidad" required>
  </div>
 <div class="form-group">
    <label for="phone">Marca</label>
    <select  class="form-control" name="unidad" required>
      <option value=""><?php echo $person->TIPO_UNIDAD;?> </option>
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
  
<input type="hidden" name="id" value="<?php echo $person->ID_INGREDIENTES; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php_ingrediente/actualizar.php",$("#actualizar").serialize(),function(data){
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