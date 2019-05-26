<?php
session_start();
require_once 'conexion/conexion.php';
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $item_array_id_cart = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$item_array_id_cart))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="mesas.php";</script>';
            }

        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tipicos Normita</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <style type="text/css">
      div.inline { float:left; padding: 15px;}
    </style>

  </head>
<header id="main-header">
    
    <a id="logo-header" href="./inicio.php">
      <span class="site-name">Tipicos Normita</span>
    </a> <!-- / #logo-header -->
    <nav>
      <ul>
        <li ><a  href="./plato.php">Platos</a></li>
      <li><a href="./empleados.php">Empleados</a></li>
      <li><a href="./ingredientes.php">Inventario</a></li>
      <li><a href="./mesas.php">Mesas</a></li>
      </ul>
    </nav><!-- / nav -->
 
  </header><!-- / #main-header -->
 
  <body id="page-top">
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">MESAS</h2>
            <h3 class="section-subheading text-muted">Disponibles - Ocupadas</h3>
            <a data-toggle="modal" href="#newModal" class="btn btn-success">Agregar mesas</a>
              <a data-toggle="modal" style="font-color: white¿" class="btn btn-success" Onclick="location.href='plato.php'">INICIO</a>
              
        
        <br/><br/>
              

<?php
  $sql = "SELECT * FROM mesas";
  $result = mysqli_query($con, $sql);
  $mesas = array();
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      $mesas[] = $row;
    }
  }?>
              
<div class="row">
                   <?php
  //print_r($mesas);
  foreach($mesas as $mesa){
      ?>
       
          <div class="col-sm-4  portfolio-item">
            <?php
              if($mesa['ID_ESTADO_MESA'] == 1){
            ?> 
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fas fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="img/disponible.png" alt="">
                </a>
            <?php
              }else if($mesa['ID_ESTADO_MESA'] == 2){
            ?>
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fas fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="img/ocupado.png" alt="">
                </a>
            <?php
              }
            ?>

            <div class="portfolio-caption">
              <h4><?php echo $mesa['NOMBRE_MESA']; ?></h4>
              <p class="text-muted"><?php echo $mesa['CAPACIDAD']; ?></p>
            </div>
          </div>
        
<?php
  }
?>

      </div>
              </div>
              </div>
        </div>
    </section>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            
                <div class="modal-body">
                    <div class="row">
                  <!-- Project Details Go Here -->
                  
                  <!-- mostrar productos-->
                  <div class="col-xs-8 col-sm-6">
<?php

include "./conexion/conexion.php";

$user_id=null;
$sql1= "SELECT productos.ID_PRODUCTO, productos.NOMBRE, categoria.NOMBRE_CATEGORIA, productos.PRECIO
FROM productos
INNER JOIN categoria ON productos.CATEGORIA = categoria.ID_CATEGORIA";
$query = $con->query($sql1);


if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
    
	<th>Nombre</th>
	<th>Categoria</th>
	<th>Precio</th>
	<th>Cantidad</th>
    <th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<form method="post" action="mesas.php?action=add&id=<?php echo $r['ID_PRODUCTO']; ?>">
 <tr>
    
	<td width="35%"><?php echo $r["NOMBRE"]; ?></td>
	<td width="15%"><?php echo $r["NOMBRE_CATEGORIA"]; ?></td>
	<td width="10%"><?php echo $r["PRECIO"]; ?></td>
    <td width="10%"><input type="text" name="cantidad" class="form-control" value="1" /></td>
	<td width="5%">
        <input type="hidden" name="hidden_nombre" value="<?php echo $r['NOMBRE'];?>" />
        <input type="hidden" name="hidden_nombre" value="<?php echo $r['NOMBRE'];?>" />
        <input type="hidden" name="hidden_precio" value="<?php echo $r['PRECIO'];?>"/>
		<input type="submit" name="agregar" style="margin-top:5px;" class="btn btn-success" value="Add" />
		
        
	</td>
    
 </tr>
</form>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
                     
                    </div>
                        <!-- tabla orden-->
                    <div class="col-xs-4 col-sm-6">
                        
            <form method="post" id="orden">
                        <table class="table table-bordered">
            <tr>
                <th width="10%">Precio</th>
                <th width="40%">Nombre del Producto</th>
                <th width="10%">Precio</th>
                <th width="20%">Cantidad</th>
                <th width="15%">Total</th>
                <th width="5%">Accion</th>
            </tr>
                            
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_id"]; ?></td>
                        <td><?php echo $values["item_nombre"]; ?></td>
                        <td><?php echo $values["item_precio"]; ?></td>
                        <td>$ <?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td><a href="mesas.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right" >Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
                
        </table>
                <input type="hidden" name="id" value="<?php echo $r['item_id'];?>" />
                            <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Enviar" />
                         </form>   
                    </div>
                    
                 
                      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    

<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingreso de mesa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

<form method="post" id="agregar">
  <?php
      require_once("./conexion/conexion.php");
  ?>
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre de la mesa</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Capacidad</label>
    <input type="text" class="form-control" name="capacidad">
  </div>
  
  <div class="form-group">
    <label for="phone">Estado</label>
    <select  class="form-control" name="estado" required>
      <option value=""> --- Seleccionar --- </option>
        <?php
          $consulta = 'SELECT ID_ESTADO_MESA, ESTADO_ORDEN FROM estado_mesa';
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

  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript">
    
        $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php_mesa/agregar.php",$("#agregar").serialize(),function(data){
      window.location.reload();
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
   
  });


       
        
    function soloLetras(evt){

    var ch = String.fromCharCode(evt.which);

        if(!(/[a-zA-Z\s]/.test(ch))){
            evt.preventDefault();
        }
    } 
    
    function soloNumeros(evt){

    var ch = String.fromCharCode(evt.which);

        if(!(/[0-9\-]/.test(ch))){
            evt.preventDefault();
        }
    }
   
        $('portfolioModal1').on('hidden.bs.modal', function() {
  return false;
});
        
        $("#orden").submit(function(e){
    e.preventDefault();
    $.post("./php_mesa/orden.php",$("#orden").serialize(),function(data){
    });
    alert("Agregado exitosamente!");
    $("#orden")[0].reset();
    $('#newModal').modal('hide');
   
  });
        
    </script>

  </body>

</html>
