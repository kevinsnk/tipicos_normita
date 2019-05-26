<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["presentacion"]) &&isset($_POST["vencimiento"]) &&isset($_POST["marca"]) &&isset($_POST["cantidad"]) &&isset($_POST["unidad"])){
		if($_POST["nombre"]!=""&& $_POST["presentacion"]!=""&& $_POST["vencimiento"]!=""&& $_POST["marca"]!=""&& $_POST["cantidad"]!=""&& $_POST["unidad"]!=""){
			
			
			$sql = "insert into ingrediente (INGREDIENTE, PRESENTACION, VENCIMIENTO, MARCA, CANTIDAD, TIPO_UNIDAD) value (\"$_POST[nombre]\",\"$_POST[presentacion]\",\"$_POST[vencimiento]\",\"$_POST[marca]\",\"$_POST[cantidad]\",\"$_POST[unidad]\")";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>