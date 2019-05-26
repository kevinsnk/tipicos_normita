<?php

include "conexion/conexion.php";

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

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Mostrar Ordenes</title>
  
  
  
      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<section class="hero-section">
  <div class="card-grid">
       <?php if($query->num_rows>0):
      while ($r=$query->fetch_array()): ?>
      
    <a class="card" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
      <div class="card__content">
        <p class="card__category"><?php echo $r["NOMBRE_MESA"]; ?></p>
        <p class="card__category">Mesero:</p>
        <h3 class="card__heading"><?php echo $r["NOMBRE"]; ?></h3>
        <p class="card__category"><?php echo $r["TIPO_ORDEN"]; ?></p>
      </div>
    </a>
   <?php endwhile;
      else:
      endif;?>
  
    </div>
      
</section>




</body>

</html>
