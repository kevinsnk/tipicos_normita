<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["categoria"]) &&isset($_POST["precio"]) &&isset($_POST["descripcion"])){
		if($_POST["nombre"]!=""&& $_POST["categoria"]!=""&& $_POST["precio"]!=""&&$_POST["descripcion"]!=""){
			
			
			$sql = "update productos set NOMBRE=\"$_POST[nombre]\",CATEGORIA=\"$_POST[categoria]\",PRECIO=\"$_POST[precio]\",DESCRIPCION=\"$_POST[descripcion]\" where ID_PRODUCTO=".$_POST["id"];
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