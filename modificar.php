<?php
session_start();
?>

<!DOCTYPE html>
<?php
echo"
<html class=''>
<head>
  
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


if(isset($_SESSION['nombre'])){
		include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);
	
if(isset($_POST['codigo'])){
$codigo= $_POST['codigo'];
		$nombre = $_POST["nombre"];
	$fecha = $_POST["fecha"];
	$genero= $_POST["genero"];
 $query="select c.codigo, nombre_concierto,g.nombre,fecha from concierto c inner join genero g on g.cod_genero=c.cod_genero;";
$query="update concierto c set nombre_concierto='$nombre', fecha='$fecha', cod_genero=$genero where codigo=$codigo;";

mysqli_query($con,$query);
header("location:perfil_local.php?id='".$_SESSION['codigo']."'");
}

else{
$codigo= $_GET['codigo'];
$query="select c.nombre_concierto, c.fecha,g.nombre as 'nombreG', g.cod_genero as 'codigoG'  from concierto c inner join genero g on c.cod_genero=g.cod_genero where c.codigo=$codigo;";
$result=mysqli_query($con,$query);
$fila=mysqli_fetch_array($result);
extract($fila);


echo"<section>
<h3>Modifica El Concierto</h3>";
echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
echo "<di class='contact-info-group'>
<input type='hidden' name='codigo' value='$codigo'/>
<label><span>Nombre</span><input type='text' name='nombre' value='$nombre_concierto'/></label>
<label><span>Fecha</span><input type='date' name='fecha' value='$fecha'/></label>
<label><span>Genero</span><select name='genero'>";
$query= "select * from genero;";
$resultado= mysqli_query($con, $query);
while($fila=mysqli_fetch_array($resultado)){
extract($fila);
if($nombre==$nombreG){
echo "<option value='$cod_genero' selected>$nombre</option>";
}
else{
echo "<option value='$cod_genero'>$nombre</option>";}


}

echo "<select/></label>
</div>";

echo"<div class='submit-wrap'>";
echo "<input type='submit' value='modificar'/>";
echo"</div>";
echo"</form>";
echo"</section>";
}
mysqli_close($con);
}
else{
		echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	
}

require_once('footer.html');
echo"
</body>



</html>";
?>
