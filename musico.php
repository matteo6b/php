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




require_once("database.php");

$db = new DataBase();
	
	
	
	  if(isset($_SESSION['nombre']) && $_GET['id']==$_SESSION['codigo'] ) {
	  
	 
	 
	 
echo    " <h3>Mi Perfil</h3>";

echo "<div class='face-lockup'>";
 $sql = "select * ,c.nombre as  'cnombre', g.nombre as 'gnombre' from usuario u , ciudad c, genero g   where codigo_usuario='".$_SESSION['codigo']."' and cod_ciudad=c.codigo and genero_musico=g.cod_genero   ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $musico){
echo"<div class='face-img'><img src='".$musico['imagen']."'  /> </div>";
echo  "<div class='icon-pencil'  onClick=\"location.href='modifica_musico.php?id=".$_SESSION['codigo']."'\" >";require_once('icons/pencil.html');
echo"</div>


</div>
";
echo "<div class='blurb'>
<p>";

			echo "<strong> Nombre: ".$musico['nombre_grupo']."</br> Edad: ".$musico['edad']."</br> Ciudad: ".$musico['cnombre']." </br>  Genero: ".$musico['gnombre']." </br>  Telefono: ".$musico['telefono']." <br> Descripcion: ".$musico['descripcion_musico']." </strong> </br>";
			
		
		}
echo" </p>
</div>
<div class='skill-lockup'>";


	$query1="select  c.codigo,u.nombre_usu,nombre_concierto,g.nombre,c.fecha  from concierto c,  usuario u ,genero g  where  c.cod_local=u.codigo_usuario  and  c.cod_genero in(select cod_genero from usuario, concierto where genero_musico=cod_genero )   group by codigo ;" ;

$resultado= mysqli_query($con, $query1);
$rows=mysqli_num_rows($resultado);
if($rows==0){
	echo"No se han encontrado conciertos";
}
else{


	echo "<form method='post' >";
echo"<table border=1>
<thead><tr><th>local</th><th>concierto</th><th>genero</th><th>fecha</th><th>estado</th></tr></thead>";
while($fila=mysqli_fetch_array($resultado)){
	extract($fila);
	$query="select  v.codigov, puntuacion from concierto c,votacion_concierto v where  v.cod_concierto=$codigo and cod_fan='".$_SESSION['codigo']."'   ;" ;
$resultado1= mysqli_query($con, $query);
$rows1=mysqli_num_rows($resultado1);
		echo"<tbody><tr><td>$nombre_usu</td><td>$nombre_concierto</td><td>$nombre</td><td>$fecha</td>";if($rows1==0){ echo"<td><a href='apuntarse.php?codigo=$codigo'>apuntarse</a></td>";}else{$fila1=mysqli_fetch_array($resultado1);
extract($fila1);if($puntuacion==1){ echo"<td>En espera</td>";    }  if($puntuacion==2){ echo"<td>Aceptado</td>";    }  if($puntuacion==3){ echo"<td>Cancelado</td>";    }       }    echo"</tr></tbody><br/>";

		}
echo "</table>";



}





 "</div>";


 
 




mysqli_close($con);
	
	}
	
	
	
	
	


else{
		 if(isset($_GET['id'])) {
		echo "<div class='face-lockup'>";
 $sql = "select * ,c.nombre as  'cnombre', g.nombre as 'gnombre' from usuario u , ciudad c, genero g   where codigo_usuario='".$_GET['id']."' and cod_ciudad=c.codigo and genero_musico=g.cod_genero   ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $musico){
echo"<div class='face-img'><img src='".$musico['imagen']."'  /> </div>";
		
		
	echo"	</div>
";
echo "<div class='blurb'>
<p>";

			echo "<strong> Nombre: ".$musico['nombre_grupo']."</br> Edad: ".$musico['edad']."</br> Ciudad: ".$musico['cnombre']." </br>  Genero: ".$musico['gnombre']." </br>  Telefono: ".$musico['telefono']." <br> Descripcion: ".$musico['descripcion_musico']." </strong> </br>";
			
		
		}
echo" </p>
</div>
";

	
		
		
		
		 }
		 else{
		echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
		
		
		}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

require_once('footer.html');
echo"
</body>



</html>";
?>



