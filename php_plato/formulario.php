<?php
include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT categoria.NOMBRE_CATEGORIA, productos.NOMBRE, productos.PRECIO, productos.DESCRIPCION, productos.ID_PRODUCTO FROM categoria INNER JOIN productos ON categoria.ID_CATEGORIA=productos.CATEGORIA WHERE ID_PRODUCTO=".$_GET["id"]; 
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
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->NOMBRE; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="lastname">Categoria</label>
    <select  class="form-control" name="categoria" value="<?php echo $person->ID_CATEGORIA; ?>">
      <option  ><?php echo $person->NOMBRE_CATEGORIA;?></option>
        <?php
          $consulta = 'SELECT categoria.ID_CATEGORIA, categoria.NOMBRE_CATEGORIA FROM categoria';
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
    <label for="address" >Precio</label>
    <input type="text" class="form-control" value="<?php echo $person->PRECIO; ?>" name="precio" required>
  </div>
  <div class="form-group">
    <label for="address">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $person->DESCRIPCION; ?>" name="descripcion" required>
  </div>
  
<input type="hidden" name="id" value="<?php echo $person->ID_PRODUCTO; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php_plato/actualizar.php",$("#actualizar").serialize(),function(data){
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