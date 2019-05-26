<?php
include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT cargo_empleado.NOMBRE_CARGO, empleados.NOMBRE, empleados.APELLIDO, empleados.DUI, empleados.NIT, empleados.TEL1, empleados.TEL2, empleados.FECHANAC, empleados.DIRECCION, estado_empleado.ESTADO_EMPLEADO,  empleados.ID_EMPLEADO FROM cargo_empleado INNER JOIN empleados ON cargo_empleado.ID_CARGO=empleados.CARGO INNER JOIN estado_empleado on estado_empleado.ID_ESTADO_EMPLEADO=empleados.ESTADO_EMPLEADO WHERE ID_EMPLEADO=".$_GET["id"]; 
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
    <label for="name">Nombres</label>
    <input type="text" class="form-control" value="<?php echo $person->NOMBRE; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="name">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $person->APELLIDO; ?>" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="name">DUI</label>
    <input type="number" class="form-control" value="<?php echo $person->DUI; ?>" name="dui" required>
  </div>
   <div class="form-group">
    <label for="name">NIT</label>
    <input type="number" class="form-control" value="<?php echo $person->NIT; ?>" name="nit" required>
  </div>
  <div class="form-group">
    <label for="name">TELEFONO 1</label>
    <input type="number" class="form-control" value="<?php echo $person->TEL1; ?>" name="tel1" required>
  </div>
  <div class="form-group">
    <label for="name">TELEFONO 2</label>
    <input type="number" class="form-control" value="<?php echo $person->TEL2; ?>" name="tel2" required>
  </div>
  <div class="form-group">
    <label for="name">FECHA NACIMIENTO</label>
    <input type="date" class="form-control" value="<?php echo $person->FECHANAC; ?>" name="fechanac" required>
  </div>
  <div class="form-group">
    <label for="name">DIRECCION</label>
    <input type="text" class="form-control" value="<?php echo $person->DIRECCION; ?>" name="direccion" required>
  </div>
   <div class="form-group">
    <label for="lastname">ESTADO EMPLEADO</label>
    <select  class="form-control" name="estado" value="<?php echo $person->ID_ESTADO_EMPLEADO; ?>">
      <option  ><?php echo $person->ESTADO_EMPLEADO;?></option>
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
    <label for="lastname">CARGO</label>
    <select  class="form-control" name="cargo" value="<?php echo $person->ID_CARGO; ?>">
      <option  ><?php echo $person->NOMBRE_CARGO;?></option>
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

  
<input type="hidden" name="id" value="<?php echo $person->ID_EMPLEADO; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php_empleados/actualizar.php",$("#actualizar").serialize(),function(data){
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