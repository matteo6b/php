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

  <link rel='stylesheet' href='header.css'>
  <link rel='stylesheet' href='footer.css'>
  <link rel='stylesheet' href='perfil.css'>
   <link rel='stylesheet' href='table.css'>
  <!--[if lt IE 9]><script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
  

</head>";


echo"
<body>";require_once('header.php');


require_once("database.php");

$db = new DataBase();
	
	
	
	  if(isset($_SESSION['nombre']) && $_GET['id']==$_SESSION['codigo'] ) {
	  
	 
	 
	 
echo    " <h3>Mi Perfil</h3>";

echo "<div class='face-lockup'>";
 $sql = "select * from usuario, ciudad  where codigo_usuario='".$_SESSION['codigo']."' and cod_ciudad=codigo  ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $fan){
echo"<div class='face-img'><img src='".$fan['imagen']."'  /> </div>";
echo  "<div class='icon-pencil'  onClick=\"location.href='modifica_fan.php?id=".$_SESSION['codigo']."'\" >";require_once('icons/pencil.html');
echo"</div>

</div>
";
echo "<div class='blurb'>
<p>";

			echo "<strong> Nombre: ".$fan['nombre_fan']."</br> Edad: ".$fan['edad']."</br> Ciudad: ".$fan['nombre']." </br> Telefono: ".$fan['telefono']."</strong> </br>";
			
		
		}
echo" </p>
</div>
<div class='skill-lockup'>";
//conciertos
	$sql = "select c.codigo ,nombre_concierto,fecha,nombre from concierto c,votacion_concierto v, genero g where codigo=cod_concierto and  puntuacion=2 and c.cod_genero=g.cod_genero   ";
	$db->executer($sql);
	$result = $db->getResultados();
	
	echo "<form method='post' action='votacion.php'>";
echo"<table border=1>
<thead><tr><th>nombre concierto</th><th>genero</th><th>fecha</th><th>voto positivo </th><th> voto negativo</th></tr></thead>";
	
	foreach($result as $concierto){

	

	
	

echo"<tbody><tr><td><input type='hidden' name='codigoconcierto' value='".$concierto['codigo']."' /> ".$concierto['nombre_concierto']."</td><td>".$concierto['nombre']."</td><td>".$concierto['fecha']."</td><td><input type='submit' value='SI' name='si[]' </td> <td><input type='submit' value='NO' name='no'/> </td> </tbody><tr>";




}

echo "</table>";
echo "</form><br>"; 

	//musico
	
	$sql = "select codigo_usuario,nombre_grupo ,g.nombre,c.nombre  AS 'ciudad'from usuario u,ciudad c, genero g  where    tipo=3 and u.genero_musico=g.cod_genero and u.cod_ciudad=c.codigo  ";
	$db->executer($sql);
	$result = $db->getResultados();
	
	echo "<form method='post' action='votacion_musicos.php'>";
echo"<table border=1>
<thead><tr><th>nombre musico</th><th>genero</th><th>ciudad</th><th>voto positivo </th><th> voto negativo</th></tr></thead>";
	
	foreach($result as $musico){

	

	
	

echo"<tbody><tr><td><input type='hidden' name='codigomusico' value='".$musico['codigo_usuario']."' /> ".$musico['nombre_grupo']."</td><td>".$musico['nombre']."</td><td>".$musico['ciudad']."</td><td ><input type='submit' value='SI' name='si'/>  </td> <td ><input type='submit' value='NO' name='no'/>  </td><tr></tbody>";




}

echo "</table>";
echo "</form><br>"; 

//locales
		$sql = "select codigo_usuario,persona_contacto ,direccion,c.nombre  AS 'ciudad'from usuario u,ciudad c where    tipo=1  and u.cod_ciudad=c.codigo  ";
	$db->executer($sql);
	$result = $db->getResultados();
	
	echo "<form method='post' action='votacion_locales.php'>";
echo"<table border=1>
<thead><tr><th>nombre local</th><th>direccion</th><th>ciudad</th><th>voto positivo </th><th> voto negativo</th></tr></thead>";
	
	foreach($result as $local){

	

	
	

echo"<tbody><tr><td><input type='hidden' name='codigolocal' value='".$local['codigo_usuario']."' /> ".$local['persona_contacto']."</td><td>".$local['direccion']."</td><td>".$local['ciudad']."</td><td ><input type='submit' value='SI' name='si'/> </td> <td ><input type='submit' value='NO' name='no' /> <tr></tbody>";




}

echo "</table>";
echo "</form><br>"; 

echo"</div>";
	 
	 
	
	
}	
else{
	  if(isset($_GET['id'])) {
		  
		  $sql = "select * from usuario, ciudad  where codigo_usuario='".$_GET['id']."' and cod_ciudad=codigo  ;";
  $db->executer($sql);
		  $result = $db->getResultados();
		foreach($result as $fan){
		echo "<div class='face-lockup'>";

echo"<div class='face-img'><img src='".$fan['imagen']."'  /> </div>";
echo"</div>
";
echo "<div class='blurb'>
<p>";

	  
	 
	
	
		
			echo "<strong> Nombre: ".$fan['nombre_fan']."</br> Edad: ".$fan['edad']."</br> Ciudad: ".$fan['nombre']." </br> Telefono: ".$fan['telefono']."</strong> </br>";
			
		
		}
echo" </p>
</div>";


		
		}
		
		else{
		echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
		
		
		}
		
		
		
		}	
	
	$db->disconnect();




require_once('footer.html');
echo"
</body>



</html>";
?>