<?php
require_once("database.php");
	$db = new DataBase();

?>

<?php

echo"<form action='insertar_imagen_fan.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='archivo'/>
    <input type='submit'/>
</form>";

 $sql = "select imagen from usuario  ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $fan){
			echo "<img src='".$fan['imagen']."' ;'/>";
			
		
		}
?>