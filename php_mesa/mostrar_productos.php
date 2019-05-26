<?php

include "./conexion/conexion.php";

$user_id=null;
$sql1= "SELECT productos.NOMBRE, categoria.NOMBRE_CATEGORIA, productos.PRECIO
FROM productos
INNER JOIN categoria ON productos.CATEGORIA = categoria.ID_CATEGORIA";
$query = $con->query($sql1);


?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Categoria</th>
	<th>Precio</th>
	<th>Cantidad</th>
    <th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<form method="post" action="realizar_pedido.php?action=add&id=<?php echo $row['id']; ?>">
 <tr>
	<td width="35%"><?php echo $r["NOMBRE"]; ?></td>
	<td width="15%"><?php echo $r["NOMBRE_CATEGORIA"]; ?></td>
	<td width="10%"><?php echo $r["PRECIO"]; ?></td>
    <td width="10%"><input type="text" name="cantidad" class="form-control" value="1" /></td>
	<td width="5%">
        <input type="hidden" name="hidden_nombre" value="<?php echo $r['NOMBRE'];?>" />
        <input type="hidden" name="hidden_precio" value="<?php echo $r['PRECIO'];?>"/>
		<input type="submit" name="agregar" style="margin-top:5px;" class="btn btn-success" value="Add" />
		<script>
		$("#del-"+<?php echo $r["id_Emp"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php/eliminar.php","id_Emp="+<?php echo $r["id_Emp"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
        
        
	</td>
    
 </tr>
</form>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
