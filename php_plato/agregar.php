<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["categoria"]) &&isset($_POST["precio"]) &&isset($_POST["descripcion"])){
		if($_POST["nombre"]!=""&& $_POST["categoria"]!=""){
			
			
			$sql = "insert into productos (NOMBRE, CATEGORIA, PRECIO, DESCRIPCION) value (\"$_POST[nombre]\",\"$_POST[categoria]\",\"$_POST[precio]\",\"$_POST[descripcion]\")";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>