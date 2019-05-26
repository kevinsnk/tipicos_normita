<?php

include "./conexion/conexion.php";

$user_id=null;
$sql1= "SELECT ordenes.ID_ORDEN, mesas.NOMBRE_MESA, productos.NOMBRE, ordenes.DESCRIPCION, tipo_orden.TIPO_ORDEN, estado_orden.ESTADO_ORDEN, usuario.NOMBRE
FROM (((((ordenes
INNER JOIN mesas ON ordenes.MESA = mesas.ID_MESA)      
INNER JOIN productos ON ordenes.PRODUCTO = productos.ID_PRODUCTO)
INNER JOIN tipo_orden ON ordenes.TIPO_ORDEN = tipo_orden.ID_TIPO_ORDEN)
INNER JOIN estado_orden ON ordenes.ESTADO_ORDEN = estado_orden.ID_ESTADO_ORDEN)
INNER JOIN usuario ON ordenes.USUARIO = usuario.ID_USUARIO)";
$query = $con->query($sql1);


?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>ID</th>
	<th>Mesa</th>
	<th>Producto</th>
	<th>Combo</th>
    <th>Descripcion</th>
    <th>Tipo de Orden</th>
    <th>Estado de Orden</th>
    <th>Nombre</th>
</thead>
<?php while ($r=$query->fetch_array()):?>

 <tr>
	<td><?php echo $r["ID_ORDEN"]; ?></td>
    <td><?php echo $r["NUM_MESA"]; ?></td>
    <td><?php echo $r["NOMBRE"]; ?></td>
    <td><?php echo $r["NOMBRE_COMBO"]; ?></td>
    <td><?php echo $r["DESCRIPCION"]; ?></td>
    <td><?php echo $r["TIPO_ORDEN"]; ?></td>
    <td><?php echo $r["ESTADO_ORDEN"]; ?></td>
    <td><?php echo $r["NOMBRE"]; ?></td>
    
   
	
    
 </tr>

<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
