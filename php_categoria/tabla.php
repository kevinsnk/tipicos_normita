<?php

include "../conexion/conexion.php";

$user_id=null;
$sql1= "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA FROM categoria";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover" >
<thead>
	<th>ID</th>
	<th>Nombre de Categoria</th>
	<th>Acciones</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["ID_CATEGORIA"]; ?></td>
	<td><?php echo $r["NOMBRE_CATEGORIA"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["ID_CATEGORIA"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_CATEGORIA"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["ID_CATEGORIA"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php_categoria/eliminar.php","id="+<?php echo $r["ID_CATEGORIA"];?>,function(data){
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
  		$.get("./php_categoria/formulario.php","id="+id,function(data){	
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

      </div>
    </div>
  </div>