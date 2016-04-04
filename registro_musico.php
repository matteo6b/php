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


require_once('cript.php');
include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);

echo"<section>
<h3>Registro Del Musico</h3>
";
echo "<form action='insertarmusico.php' method='post'>";
	echo"<div class='contact-info-group'>";

		echo "<label><span>Nombre Del Grupo</span><input type='text' name='nombre' required/></label>";
		echo "<label><span>Direccion</span><input type='text' name='direccion' required/></label>";
		echo"<label><span>Password</span><input type='password' name='pass' required/></label>";
	echo "<label><span>Confirmar Password</span><input type='password' name='pass1' required/></label>";
	if(isset($_SESSION['ERROR5'])){
	echo "'".$_SESSION['ERROR5']."'<br>";
	}
		
	echo "<label><span>Edad</span><input type='text' name='edad' required/></label>";	
	echo "<label><span>Telefono</span><input type='text' name='telefono' required/></label>";
			if(isset($_SESSION['ERROR8'])){
	echo "'".$_SESSION['ERROR8']."'<br>";
	}
	 echo "<label><span>Genero</span><select name='genero'required>";

	 $query="select cod_genero , nombre from genero ;";
$resultado= mysqli_query($con, $query);

while($fila=mysqli_fetch_array($resultado)){
  extract($fila);
   echo  "<option value='$cod_genero'>$nombre</option>";
  }
echo "</select></label>";
	 echo "<label><span>Ciudad</span><select name='ciudad'required>";

	 $query="select codigo,nombre from ciudad ;";
$resultado= mysqli_query($con, $query);

while($fila=mysqli_fetch_array($resultado)){
  extract($fila);
   echo  "<option value='$codigo'>$nombre</option>";
  }
echo "</select></label>";
echo"</div>";

echo "<label><span>Informacion</span><textarea rows='4' cols='50' name='informacion'></textarea required></label>";
echo"<div class='submit-wrap'>";
echo   "	<br><input type='submit'/ value='crear'></br>
</div>
</form>";
echo"</section>";



require_once('footer.html');
echo"
</body>



</html>";
?>
