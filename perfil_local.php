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
 $sql = "select * from usuario, ciudad  where codigo_usuario='".$_SESSION['codigo']."' and cod_ciudad=codigo  ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $local){
echo"<div class='face-img'><img src='".$local['imagen']."'  /> </div>";
echo  "<div class='icon-pencil'  onClick=\"location.href='modifica_local.php?id=".$_SESSION['codigo']."'\" >";require_once('icons/pencil.html');
echo"</div>
<div class='icon-facebook'   onClick=\"location.href='crearconcierto.php?id=".$_SESSION['codigo']."'\"><div class='c'><strong>Crear concierto</strong></div></div>
</div>

</div>
";
echo "<div class='blurb'>
<p>";

			echo "<strong> Nombre: ".$local['persona_contacto']."</br> Edad: ".$local['direccion']."</br> Ciudad: ".$local['nombre']." </br>  Telefono: ".$local['telefono']." <br> Descripcion: ".$local['descripcion_local']." </strong> </br>";
			
		
		}
echo" </p>
</div>
<div class='skill-lockup'>";


	








 $query="select c.codigo, nombre_concierto,g.nombre,fecha from concierto c , genero g , usuario u where  codigo_usuario='".$_SESSION['codigo']."' and c.cod_local=u.codigo_usuario and g.cod_genero=c.cod_genero ;";
$resultado= mysqli_query($con, $query);
$rows=mysqli_num_rows($resultado);
if($rows==0){
echo "<strong>no se han encontrado conciertos</stong><br/>";
}


else{
echo "<form method='post' >";
echo"<table border=1>
<thead><tr><th>nombre</th><th>genero</th><th>fecha</th><th>modificar</th></tr></thead>";

while($fila=mysqli_fetch_array($resultado)){
	extract($fila);
		echo"<tbody><tr><td>$nombre_concierto</td><td>$nombre</td><td>$fecha</td><td><a href='modificar.php?codigo=$codigo'>modificar</a></td></tr></tbody><br/>";

}

echo "</table>";
echo "</form>";
}
 $query="select * from votacion_concierto v, concierto c,  usuario u  where v.cod_concierto=c.codigo and u.codigo_usuario=v.cod_fan and tipo=3 ;";


echo"<h2 style='text-align:center;'>CANDIDATURAS</h2>";
$resultado= mysqli_query($con, $query);
$rows=mysqli_num_rows($resultado);


if($rows==0){
echo "<strong>No se han encontrado candidaturas</strong><br/>";
}

else{

echo "<form method='post' action='rechazar.php'>";
echo"<table border=1>
<thead><tr><th>nombre grupo</th><th>nombre concierto</th><th>confirmar </th><th>rechazar</th><th>estado</th></tr></thead>";

while($fila=mysqli_fetch_array($resultado)){
	extract($fila);
	

	
	
$query="select * from votacion_concierto v, concierto c,  usuario u  where v.cod_concierto=$codigo and u.codigo_usuario=v.cod_fan  ;" ;
$resultado1= mysqli_query($con, $query);


echo"<tbody><tr><td>$nombre_grupo</td><td>$nombre_concierto</td>";$fila1=mysqli_fetch_array($resultado1);
extract($fila1);if($puntuacion==1){echo"<td><a href='aceptar.php?codigo=$codigo'>aceptar</a></td><td><input type='checkbox' name='rechazar[]' value='$codigov'</td><td>Pendiente</td>"; } if($puntuacion==2){ echo"<td></td><td></td><td>Aceptado</a></td>";    } if($puntuacion==3){ echo"<td>  </td><td>  </td><td>Cancelado</td>";    } echo "</tr></tbody> ";



}

echo "<tr><td colspan='4'style='text-align:right;'><input type='submit' value='rechazar'/></td></tr>";
echo "</table>";
echo "</form><br>";  





}
	  

mysqli_close($con);


}


else{
	 if(isset($_GET['id'])) {
		 
		 
		 echo "<div class='face-lockup'>";
 $sql = "select * from usuario, ciudad  where codigo_usuario='".$_GET['id']."' and cod_ciudad=codigo  ;";
	  
	  $db->executer($sql);
	
	
		$result = $db->getResultados();
		foreach($result as $local){
echo"<div class='face-img'><img src='".$local['imagen']."'  /> </div>";


echo"
</div>
";
echo "<div class='blurb'>
<p>";

			echo "<strong> Nombre: ".$local['persona_contacto']."</br> Edad: ".$local['direccion']."</br> Ciudad: ".$local['nombre']." </br>  Telefono: ".$local['telefono']." <br> Descripcion: ".$local['descripcion_local']." </strong> </br>";
			
		
		}
echo" </p>
</div>
<div class='skill-lockup'>";
		 
		$query="select * from votacion_concierto v, concierto c,  usuario u  where v.cod_concierto=c.codigo and u.codigo_usuario=v.cod_fan and cod_local='".$_GET['id']."' and puntuacion=2 ;";




$resultado= mysqli_query($con, $query);
$rows=mysqli_num_rows($resultado);


if($rows==0){
echo "<strong>No hay ningun concierto programado</strong><br/>";
}
else{
echo"<table border=1>
<thead><tr><th>nombre grupo</th><th>nombre concierto</th><th>fecha </th></tr></thead>";

while($fila=mysqli_fetch_array($resultado)){
	extract($fila);
	



	
	
	echo"<tbody><td>$nombre_grupo</td><td>$nombre_concierto</td><td>$fecha</td></tr></tbody><br/>";




}


echo "</table><br>"; 
}	 
		 
		 
	echo"</div>";	 
		 
		 
		 
		 
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