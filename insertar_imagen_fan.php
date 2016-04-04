<?php
session_start();
?>
<?php

	require_once("database.php");
	
$db = new DataBase();
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
?>