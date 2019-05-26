<?php
$usuario = $_POST['usuario'];
session_start();
$_SESSION['usuario']=$usuario;
$clave = $_POST['clave'];

$conexion=mysqli_connect("localhost","root","","tipicos_normita");
$consulta="SELECT * FROM empleados WHERE USUARIO='$usuario' and CONTRA ='$clave'";
$resultado = mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0){
header("Location:inicio.php");
}
else{
header("Location:login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>