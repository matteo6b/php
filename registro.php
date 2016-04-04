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

include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);

echo"<section>
<h3>Registrate</h3>
";
echo "<form action='insertarregistro.php' method='post'>
<div class='contact-info-group>'>
	<label><span>Nombre de Usuario</span><input type='text' name='nombre' required/></label>";
	if(isset($_SESSION['ERROR1'])){
	echo $_SESSION['ERROR1'];
	}

	
	echo "
	<label><span>Email</span><input type='email' name='email' required/></label>";
	if(isset($_SESSION['ERROR'])){
	echo $_SESSION['ERROR'];
	}
	echo "<label><span>Tipo de usuario</span><select name='tipo'required>
<option value='1'>local</option>
<option value='2'>fan</option>
<option value='3'>musico</option>
</select></labe>";
"</div>";
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