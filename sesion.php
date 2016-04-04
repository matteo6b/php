 <?php
 session_start();
 ?>
 
 <?php
 
 if(isset($_SESSION['nombre']) && ( $_SESSION['tipo'])==1)  {
?>
        Bienvenido: <a href="perfil_local.php?id=<?=$_SESSION['codigo']?>"><strong><?=$_SESSION['nombre']?></strong></a><br />
        <a href="logout.php">Cerrar Sesión</a>
<?php

    } 
	
	?>
	 <?php
	

  	


  if(isset($_SESSION['nombre']) && ( $_SESSION['tipo'])==3) {
?>
        Bienvenido: <a href="musico.php?id=<?=$_SESSION['codigo']?>"><strong><?=$_SESSION['nombre']?> </strong></a><br />
        <a href="logout.php">Cerrar Sesión</a>
<?php

    } 
	
	?>
	<?php
	  if(isset($_SESSION['nombre']) && ( $_SESSION['tipo'])==2) {
?>
        Bienvenido: <a href="fan.php?id=<?=$_SESSION['codigo']?>"><strong><?=$_SESSION['nombre']?></strong></a><br />
        <a href="logout.php">Cerrar Sesión</a>
<?php

    }
?>	