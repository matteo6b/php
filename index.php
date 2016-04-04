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

  <link rel='stylesheet' href='header.css'>
 <link rel='stylesheet' href='table.css'>
  <link rel='stylesheet' href='footer.css'>
  <!--[if lt IE 9]><script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
  

</head>";


echo"
<body>";require_once('header.php');
echo"<section>
<div class='top'>";

require_once("database.php");

$db = new DataBase();
 //locales
 echo"<div class='local'>";
 $sql = "select * from usuario,votacion_local  where codigo_usuario=cod_local and tipo=1 order by  puntuacion DESC limit 5 ;";
 $db->executer($sql);
 $result = $db->getResultados();
echo"<table border=1>
<thead><tr><th>Top LOCALES</th</tr></thead>";
 $i=1;
 foreach($result as $topl){
	 
	 echo"<tbody><tr><td><strong>Posicion de Locales ".$i."</strong><br> <strong> Nombre: ".$topl['persona_contacto']."
			<strong> <a href='perfil_local.php?id=".$topl['codigo_usuario']."'>   Ver perfil</a>    <div class='face-img'>
   </div>   </td> <tr></tbody>";
	 $i++;
 }
 echo "</table>";
 //musicos
 echo "</div>";
  $sql1 = "select * from usuario,votacion_musico  where codigo_usuario=cod_musico and tipo=3 order by  puntuacion DESC limit 5 ;";
 $db->executer($sql1);
 $result1 = $db->getResultados();
 echo "<div class='musico'>";
echo"<table border=1>
<thead><tr><th>Top MUSICOS</th</tr></thead>";
$j=1;
 foreach($result1 as $topm){
	 	 echo"<tbody><tr><td><strong>Posicion de Musicos ".$j."</strong><br> <strong> Nombre: ".$topm['nombre_grupo']."
			<strong> <a href='musico.php?id=".$topm['codigo_usuario']."'>   Ver perfil</a>    <div class='face-img'>
   </div>   </td> <tr></tbody>";
	 $j++;
	 
 }
 echo "</table>";
 echo"</div>";
 $sql1 = "select * from concierto,votacion_conciertos  where codigo=cod_conciertos and  order by  puntuacion DESC limit 5 ;";
 $db->executer($sql1);
 $result1 = $db->getResultados();
 echo"<div class='concierto'>";
echo"<table border=1>
<thead><tr><th>Top CONCIERTOS</th</tr></thead>";
$c=1;
 foreach($result1 as $topc){
	 	 echo"<tbody><tr><td><strong>Posicion de Conciertos ".$i."</strong><br> <strong> Nombre: ".$topc['nombre_concierto']."
			<strong> <a href='perfil_local.php?id=".$topc['codigo']."'>   Ver perfil</a>    <div class='face-img'>
   </div>   </td> <tr></tbody>";
	 $c++;
	 
 }
 echo "</table>";
 echo"</div>";
 
echo"</div>
</section>";

require_once('footer.html');
echo"
</body>



</html>";
?>