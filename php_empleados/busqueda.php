<?php

include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT cargo_empleado.NOMBRE_CARGO, empleados.NOMBRE, empleados.APELLIDO, empleados.DUI, empleados.TEL1, estado_empleado.ESTADO_EMPLEADO,  empleados.USUARIO, empleados.CONTRA, empleados.ID_EMPLEADO FROM cargo_empleado INNER JOIN empleados ON cargo_empleado.ID_CARGO=empleados.CARGO INNER JOIN estado_empleado on estado_empleado.ID_ESTADO_EMPLEADO=empleados.ESTADO_EMPLEADO WHERE cargo_empleado.NOMBRE_CARGO like '%$_GET[s]%' or empleados.NOMBRE like '%$_GET[s]%' or  empleados.APELLIDO like '%$_GET[s]%' or  estado_empleado.ESTADO_EMPLEADO like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
  <th>Apellido</th>
  <th>DUI</th>
  <th>TELEFONO</th>
  <th>CARGO</th>
  <th>ESTADO</th>
  <th>Acciones</th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
 <td><?php echo $r["NOMBRE"]; ?></td>
  <td><?php echo $r["APELLIDO"]; ?></td>
  <td><?php echo $r["DUI"]; ?></td>
  <td><?php echo $r["TEL1"]; ?></td>
  <td><?php echo $r["NOMBRE_CARGO"]; ?></td>
  <td><?php echo $r["ESTADO_EMPLEADO"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["ID_EMPLEADO"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_EMPLEADO"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
$("#del-"+<?php echo $r["ID_EMPLEADO"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php_empleados/eliminar.php","id="+<?php echo $r["ID_EMPLEADO"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("./php_empleados/formulario.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->