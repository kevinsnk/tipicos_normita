<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["capacidad"]) &&isset($_POST["estado"])){
		if($_POST["nombre"]!=""&& $_POST["capacidad"]!=""&& $_POST["estado"]!=""){
			include "conexion.php";
			
		$sql = "insert into mesas (NOMBRE_MESA, CAPACIDAD, ID_ESTADO_MESA) value (\"$_POST[nombre]\",\"$_POST[capacidad]\",\"$_POST[estado]\")";
			$query = $con->query($sql);
			if($query!=null){
				//print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				//print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>