<?php
require_once("database.php");
$db = new DataBase();
$tipo=$_POST["tipo"];

if($tipo==1 && empty($_POST["buscar"])){
	
	 $sql = "select persona_contacto from usuario  where  tipo=1 ;";
	  $db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $local){
			echo "<strong> Nombre: ".$local['persona_contacto']."</br>";
			
		
		}
echo" </p>";
	
	
	  
	
	
}
if($tipo==2  && empty($_POST["buscar"])){
	
	$sql = "select nombre_fan from usuario  where  tipo=2 ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $fan){
			echo "<strong> Nombre: ".$fan['nombre_fan']."</br>";
			
		
		}
echo" </p>";
	
	
	
}

if($tipo==3  && empty($_POST["buscar"]) ){
	
	$sql = "select nombre_grupo from usuario  where  tipo=3 ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $musico){
			echo "<strong> Nombre: ".$musico['nombre_grupo']."</br>";
			
		
		}
echo" </p>";
	
	
	
}
if($tipo==4  && empty($_POST["buscar"]) ){
	
	$sql = "select nombre_concierto from concierto where  puntuacion=2 ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $concierto){
			echo "<strong> Nombre: ".$concierto['nombre_concierto']."</br>";
			
		
		}
echo" </p>";
	
	
	
}

if (isset($_POST["buscar"])  && isset($tipo)){
	$sql= "  ";
	
}


$db->executer($sql);


?>