<?php

if(!empty($_GET)){
			include "../conexion/conexion.php";
			
			$sql = "DELETE FROM empleados WHERE ID_EMPLEADO=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../ver.php';</script>";

			}
}

?>