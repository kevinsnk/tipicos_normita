<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["sueldo"])){
		if($_POST["nombre"]!=""){
			
			
			$sql = "update cargo_empleado set NOMBRE_CARGO=\"$_POST[nombre]\", SALARIO=\"$_POST[sueldo]\" where ID_CARGO=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>