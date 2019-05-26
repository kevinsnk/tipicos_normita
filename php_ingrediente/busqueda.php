<?php

include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT tipo_unidad.TIPO_UNIDAD, ingrediente.INGREDIENTE, ingrediente.PRESENTACION , ingrediente.VENCIMIENTO, marca.MARCA, ingrediente.CANTIDAD,  ingrediente.ID_INGREDIENTES FROM tipo_unidad INNER JOIN ingrediente ON tipo_unidad.ID_TIPO_UNIDAD=ingrediente.TIPO_UNIDAD INNER JOIN marca on marca.ID_MARCA=ingrediente.MARCA WHERE ingrediente.INGREDIENTE like '%$_GET[s]%' or ingrediente.PRESENTACION like '%$_GET[s]%' or  marca.MARCA like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre del ingrediente</th>
  <th>Presentacion</th>
  <th>Vencimiento</th>
  <th>Marca</th>
  <th>Cantidad</th>
  <th>Tipo unidad</th>
  <th>Acciones</th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
  <td><?php echo $r["INGREDIENTE"]; ?></td>
  <td><?php echo $r["PRESENTACION"]; ?></td>
  <td><?php echo $r["VENCIMIENTO"]; ?></td>
  <td><?php echo $r["MARCA"]; ?></td>
  <td><?php echo $r["CANTIDAD"]; ?></td>
  <td><?php echo $r["TIPO_UNIDAD"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["ID_INGREDIENTES"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_INGREDIENTES"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
$("#del-"+<?php echo $r["ID_INGREDIENTES"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php_ingrediente/eliminar.php","id="+<?php echo $r["ID_INGREDIENTES"];?>,function(data){
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
  		$.get("./php_ingrediente/formulario.php","id="+id,function(data){
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