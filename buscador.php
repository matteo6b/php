<?php
session_start();
?>
<!DOCTYPE html>
<?php

echo"
<html class=''>
<head>
  <meta charset='UTF-8'>
  <meta name='apple-mobile-web-app-capable' content='yes'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <meta name='description' content='{{ site.data.settings.seo.description }}'>
  <meta rel='author' href='{{ site.data.settings.seo.rel-author }}'>
  <meta rel='publisher' href='{{ site.data.settings.seo.rel-publisher }}'>
<link rel='shortcut icon' href='icons/favicon.ico'>
<link rel='icon' type='image/gif' href='icons/animated_favicon1.gif' >
  <title>Imagine Music</title>
<link rel='stylesheet' href='form.css'>
  <link rel='stylesheet' href='header.css'>
  <link rel='stylesheet' href='footer.css'>
  <link rel='stylesheet' href='perfil.css'>
  <!--[if lt IE 9]><script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
  

</head>";


echo"
<body>";require_once('header.php');

require_once("database.php");
$db = new DataBase();

echo"<section>
<h3>Buscador</h3>
<h6>Busca sin saber ningun nombre!</h6>
";
echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>
<div class='contact-info-group>'>
	<label><span>Buscar:</span><input type='text' name='buscar' /></label>";
	


	echo "<label><span>¿Que buscas?</span><select name='tipo'>
<option value='1'>locales</option>
<option value='2'>fans</option>
<option value='3'>musicos</option>
<option value='4'>conciertos</option>
</select></label>";

 echo "<label><span>Ciudad</span><select name='ciudad'>";

	 $query="select codigo,nombre from ciudad ;";
	$db->executer($query);
	$result = $db->getResultados();
foreach($result as $ciudad){
		
		
   echo  "<option value='".$ciudad['codigo']."'>".$ciudad['nombre']."</option>";
  }
echo "</select></label>";

 echo "<label><span>Genero</span><select name='genero'>";

	 $query="select cod_genero ,nombre from genero ;";
	$db->executer($query);
	$result = $db->getResultados();
foreach($result as $genero){
		
		
   echo  "<option value='".$genero['cod_genero']."'>".$genero['nombre']."</option>";
  }
echo "</select></label>";


"</div>";


echo"<div class='submit-wrap'>";
echo   "	<br><input type='submit'/></br>
</div>
</form>";






if( isset($_POST["tipo"]) && (!empty($_POST["buscar"])  || empty($_POST["buscar"]) )) {
$tipo=$_POST["tipo"];

	if( $tipo==1  && empty($_POST["buscar"])){
	 $sql = "select * from usuario,ciudad where  tipo=1 and cod_ciudad=codigo  and codigo='".$_POST["ciudad"]."' ;";
	  $db->executer($sql);
	
	


	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $local){
		echo"	<p>";
			echo "<strong> Nombre: ".$local['persona_contacto']."</br>";
			echo "<strong> <a href='perfil_local.php?id=".$local['codigo_usuario']."'> ".$local['persona_contacto']."  Ver perfil</a>";
		echo" </p>";
		}

}

if($tipo==2  && empty($_POST["buscar"])){
	
	$sql = "select * from usuario,ciudad where  tipo=2 and cod_ciudad=codigo  and codigo='".$_POST["ciudad"]."' ;";
	$db->executer($sql);
	
	


	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $fan){
		echo"	<p>";
		echo "<strong> Nombre: ".$fan['nombre_fan']."</br>";
			echo "<strong> <a href='fan.php?id=".$fan['codigo_usuario']."'> ".$fan['nombre_fan']."  Ver perfil</a>";
			
			echo" </p>";
		
		}

}
	if($tipo==3  && empty($_POST["buscar"]) ){
	
	$sql = "select * from usuario,ciudad,genero  where  tipo=3 and cod_ciudad=codigo and genero_musico=cod_genero and cod_genero='".$_POST["genero"]."' and codigo='".$_POST["ciudad"]."' ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $musico){
			echo "<strong> Nombre: ".$musico['nombre_grupo']."</br>";
			echo "<strong> <a href='musico.php?id=".$musico['codigo_usuario']."'> ".$musico['nombre_grupo']."  Ver perfil</a>";
		
		}
echo" </p>";
	
	
	
}

	if($tipo==4  && empty($_POST["buscar"]) ){
	
	$sql = "select * from concierto c,genero g,votacion_concierto v,usuario u  where  puntuacion=2  and  c.cod_genero=g.cod_genero and g.cod_genero='".$_POST["genero"]."' and v.cod_concierto=c.codigo  and c.cod_local=u.codigo_usuario and u.cod_ciudad='".$_POST["ciudad"]."' group by c.codigo;    ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $concierto){
			echo "<strong> Nombre: ".$concierto['nombre_concierto']."</br>";
			echo "<strong> <a href='perfil_local.php?id=".$concierto['codigo_usuario']."'> ".$concierto['nombre_concierto']."  Ver perfil</a>";
			
		
		}
echo" </p>";
	
	
	
}


	if( $tipo==1  && !empty($_POST["buscar"])){
	 $sql = "select * from usuario,ciudad where  tipo=1  and cod_ciudad=codigo and  codigo='".$_POST["ciudad"]."' and persona_contacto like '%".$_POST["buscar"]."%' ;";
	  $db->executer($sql);
	
	


	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $local){
		echo"	<p>";
			echo "<strong> Nombre: ".$local['persona_contacto']."</br>";
			echo "<strong> <a href='perfil_local.php?id=".$local['codigo_usuario']."'> ".$local['persona_contacto']."  Ver perfil</a>";
		echo" </p>";
		}

}

if($tipo==2  && !empty($_POST["buscar"])){
	
	$sql = "select * from usuario,ciudad where  tipo=2 and cod_ciudad=codigo and  codigo='".$_POST["ciudad"]."' and nombre_fan like '%".$_POST["buscar"]."%' ;";
	$db->executer($sql);
	
	


	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $fan){
		echo"	<p>";
			echo "<strong> Nombre: ".$fan['nombre_fan']."</br>";
			echo "<strong> <a href='fan.php?id=".$fan['codigo_usuario']."'> ".$fan['nombre_fan']."  Ver perfil</a>";
			
			echo" </p>";
		
		}

}
	if($tipo==3  && !empty($_POST["buscar"]) ){
	
	$sql = "select * from usuario,ciudad,genero  where  tipo=3 and codigo_usuario=codigo and genero_musico=cod_genero and cod_genero='".$_POST["genero"]."' and codigo='".$_POST["ciudad"]."' and nombre_grupo like '%".$_POST["buscar"]."%' ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $musico){
			echo "<strong> Nombre: ".$musico['nombre_grupo']."</br>";
			echo "<strong> <a href='musico.php?id=".$musico['codigo_usuario']."'> ".$musico['nombre_grupo']."  Ver perfil</a>";
		
		}
echo" </p>";
	
	
	
}

	if($tipo==4  && !empty($_POST["buscar"]) ){
	
	$sql = "select * from concierto c,genero g,votacion_concierto v,usuario u  where  puntuacion=2  and  c.cod_genero=g.cod_genero and g.cod_genero='".$_POST["genero"]."' and v.cod_concierto=c.codigo  and c.cod_local=u.codigo_usuario and u.cod_ciudad='".$_POST["ciudad"]."' and nombre_concierto like '%".$_POST["buscar"]."%'  group by c.codigo;    ;";
	$db->executer($sql);
	
	
echo"	<p>";

	  
	
	
	
		$result = $db->getResultados();
		foreach($result as $concierto){
			echo "<strong> Nombre: ".$concierto['nombre_concierto']."</br>";
			echo "<strong> <a href='perfil_local.php?id=".$concierto['codigo_usuario']."'> ".$concierto['nombre_concierto']."  Ver perfil</a>";
			
		
		}
echo" </p>";
	
	
	
}






	
	



	

	
	
	
	}



	
	
	
	







	
	
	  
	
	










echo"</section>";



require_once('footer.html');
echo"
</body>



</html>";
?>