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


	
	include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);






echo"<section>
<h3>Registro del Local</h3>
";
echo "<form action='insertarlocal.php' method='post'>
	<div class='contact-info-group'>";
	echo "<label><span>Nombre del Local</span><input type='tex' name='persona' required/></label>
	<label><span>Direccion</span><input type='text' name='direccion' required/></label>
	<label><span>Contraseña</span><input type='password' name='pass' required/></label>";
	echo "<br/>
	<label><span>Confirmar Contraseña</span><input type='password' name='pass1' required/></label>";
	if(isset($_SESSION['ERROR5'])){
	echo "'".$_SESSION['ERROR5']."'<br>";
	}
	
	echo "<label><span>Telefono</span><input type='text' name='telefono' required/></label>";
	
	

	 echo "<label><span>Ciudad</span><select name='ciudad'required>";

	 $query="select codigo,nombre from ciudad ;";
$resultado= mysqli_query($con, $query);

while($fila=mysqli_fetch_array($resultado)){
  extract($fila);
   echo  "<option value='$codigo'>$nombre</option>";
  }
echo "</select></label>";
echo"</div>";
echo "<label><span>Informacion </span><textarea rows='4' cols='50' name='descripcion'></textarea required></label>";
echo"<div class='submit-wrap'>";
echo   "	<br><input type='submit'/></br>
</div>
</form>";
echo"</section>";


	












	



mysqli_close($con);

require_once('footer.html');
echo"
</body>



</html>";
?>






	



