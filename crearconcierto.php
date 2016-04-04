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
   <link rel='stylesheet' href='table.css'>
  <!--[if lt IE 9]><script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
  

</head>";


echo"
<body>";require_once('header.php');
include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);


if(isset($_SESSION['nombre'])){




echo "<section>";
echo "<form action='insertarconcierto.php' method='post'>";


		echo "<label><span>Nombre</span><input type='text' name='nombre' required/></label><br/>";
	echo "<label><span>fecha</span><input type='date' name='fecha' required/></label><br/>";
	
	 echo "<label><span>Genero</span><select name='genero'required>";

	 $query="select cod_genero , nombre from genero ;";
$resultado= mysqli_query($con, $query);

while($fila=mysqli_fetch_array($resultado)){
  extract($fila);
   echo  "<option value='$cod_genero'>$nombre</option>";
  }
echo "</select></label><br/>";



echo   "	<br><input type='submit'/ value='crear'></br>
</form>";
echo"</section>";
}
else{
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
}





require_once('footer.html');
echo"
</body>



</html>";
?>