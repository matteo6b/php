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

if(isset($_SESSION['nombre'])){

require_once("database.php");
$db = new DataBase();
if(isset($_POST['codigo'])){
$codigo= $_POST['codigo'];
		$nombre = $_POST["nombre"];
	$telefono = $_POST["telefono"];
	$ciudad= $_POST["ciudad"];
	$edad= $_POST["edad"];
	 function sube_imagen(){
    //Obtenemos la extensión del archivo a subir
    global $nombre_archivo;
    $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
    $extensiones_aceptadas = array("png", "jpg", "gif", "JPG");
    //Compruebo si la extensión del archivo que quiero subir coincide con las aceptadas
    if(array_search($extension, $extensiones_aceptadas)){
        if(is_uploaded_file($_FILES["archivo"]["tmp_name"])){
            //Guardo el archivo en la carpeta "imagenes" cambiando el nombre
            $nombre_archivo = "img/".time().".".$extension;
	    move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombre_archivo);
	    return 0;
        }
	else{
	    return 1;
	}
    }
    else{
	return 2;
    }
}



$resultado = sube_imagen();
if($resultado == 0){
    echo "Imagen subida";
$query = "update usuario set imagen='$nombre_archivo'  where codigo_usuario='".$_SESSION['codigo']."' ;";
$db->executer($query);

}
else if($resultado == 1){
    echo "Imagen NO subida";
}
else{
    echo "Extension no válida";
}
	
	
$query="update usuario set nombre_fan='$nombre', telefono='$telefono', cod_ciudad=$ciudad,edad='$edad' where codigo_usuario=$codigo;";

$db->executer($query);

echo "<meta http-equiv='Refresh' content='0;url=fan.php?id=".$_SESSION['codigo']."'>";
}

else{
$codigo= $_GET['id'];
$query="select u.nombre_fan,u.telefono ,u.edad,c.nombre  as 'cnombre'  from usuario u inner join ciudad c on u.cod_ciudad=c.codigo where u.codigo_usuario=$codigo;";
	$db->executer($query);
	$result = $db->getResultados();
foreach($result as $fan){



echo "<form method='post' action='".$_SERVER['PHP_SELF']."'  enctype='multipart/form-data'   >";
echo "<label><span></span><input type='hidden' name='codigo' value='$codigo'/></label>";
echo "<label><span>nombre:</span><input type='text' name='nombre' value='".$fan['nombre_fan']."'required/></label>";
	echo "<label><span>telefono:</span><input type='text' name='telefono' value='".$fan['telefono']."' required/></label>";
		echo "<label><span>Edad:</span><input type='text' name='edad' value='".$fan['edad']."' required/></label>";
		echo "<label><span> Sube una Imagen:</span><input type='file' name='archivo'/></label>";
	
	 echo "<label><span>Ciudad:  <span><select name='ciudad'required>";

	 $query="select codigo,nombre from ciudad ;";
	$db->executer($query);
	$result = $db->getResultados();
foreach($result as $ciudad){
	if($ciudad['nombre']==$fan['cnombre']){
		 echo  "<option value='".$ciudad['codigo']."'selected>".$ciudad['nombre']."</option>";
	}	
	else{	
   echo  "<option value='".$ciudad['codigo']."'>".$ciudad['nombre']."</option>";
	}
  }
echo "</select></label><br>";
}





echo "<input type='submit' value='modificar'/>";
echo"</form>";

}
$db->disconnect();
}
else{
	
		echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
}

require_once('footer.html');
echo"
</body>



</html>";
?>