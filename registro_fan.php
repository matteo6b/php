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

require_once("cript.php");

require_once("database.php");

$db = new DataBase();
echo"<section>
<h3>Registro del Fan</h3>";
echo "<form action='insertarfan.php' method='post'>";
	echo"<div class='contact-info-group'>";

		echo "<label><span>Nombre</span><input type='text' name='nombre' required/></label>";
		echo "<label><span>Edad</span><input type='text' name='edad' required/></label>";
		
		echo"<label><span>Password</span><input type='password' name='pass' required/></label>";
	echo "<label><span>Confirmar Password</span><input type='password' name='pass1' required/></label>";
	if(isset($_SESSION['ERROR5'])){
	echo "'".$_SESSION['ERROR5']."'<br>";
	}
		
		
	echo "<label><span>Telefono</span><input type='text' name='telefono' required/></label>";
	
	
	 echo "<label><span>Ciudad</span><select name='ciudad'required>";

	 $query="select codigo,nombre from ciudad ;";
	$db->executer($query);
	$result = $db->getResultados();
foreach($result as $ciudad){
		
		
   echo  "<option value='".$ciudad['codigo']."'>".$ciudad['nombre']."</option>";
  }
echo "</select></label>";
echo"</div>";
echo"<div class='submit-wrap'>";
echo   "	<br><input type='submit'/ value='crear'></br>
</div>
</form>";
echo"</section>";




$db->disconnect();


require_once('footer.html');
echo"
</body>



</html>";
?>