<?php
	
	session_start();
	
	require_once("database.php");
	$db = new DataBase();
	
	
	$fan=$_SESSION['codigo'];
	
	

	if(isset($_POST["si"]) ){
		$puntuacion=1;
		$codigo_c = $_POST["codigoconcierto"];
		$query = "insert into votacion_conciertos(cod_fan,cod_conciertos,puntuacion) values($fan,$codigo_c,$puntuacion)";
		$db->executer($query);
				if ($db->executer($query)==null){
			
			echo"error no puedes votar al mismo mas de una vez";
			
		}
		else{
			echo "<meta http-equiv='Refresh' content='0;url=fan.php?id=".$_SESSION['codigo']."'>";
			
		}
		
	}
	if(isset($_POST["no"]) ){
		$puntuacion=-1;
		$codigo_c = $_POST["codigoconcierto"];
		$query = "insert into votacion_conciertos(cod_fan,cod_conciertos,puntuacion) values($fan,$codigo_c,$puntuacion)";
		$db->executer($query);
		echo $query;
				if ($db->executer($query)==null){
			
			echo"error no puedes votar al mismo mas de una vez";
			
		}
		else{
			echo "<meta http-equiv='Refresh' content='0;url=fan.php?id=".$_SESSION['codigo']."'>";
			
		}
	}
	
	
	

	
	
	


	

		
	
	
	



	

	

$db->disconnect();

		
?>