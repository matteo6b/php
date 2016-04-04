<?php
echo"<header >
   <div class='logo'>";require_once('icons/logo.html');echo"</div>
  <nav>
  <a href='index.php'>Indice</a>
   <a href='buscador.php'>Buscador</a>
   <a href='registro.php'>Registro</a>
   <a href='login.php'>Login</a>
  </nav>
  
  <h1><span>Imagine Music</span></h1>";
  
  if(isset($_SESSION['codigo']) && isset( $_SESSION['tipo']))  {
  if($_SESSION['tipo']==1){
	   echo" <div class='kicker1'><a href='perfil_local.php?id=".$_SESSION['codigo']."'>BIENVENIDO ";echo $_SESSION['nombre'] ;echo"</a></div>";
	  
  }
  
   if($_SESSION['tipo']==2){
	     echo" <div class='kicker1'><a href='fan.php?id=".$_SESSION['codigo']."'>BIENVENIDO ";echo $_SESSION['nombre'] ;echo"</a></div>";
	   
   }
      if($_SESSION['tipo']==3){
		  
		  echo" <div class='kicker1'><a href='musico.php?id=".$_SESSION['codigo']."'>BIENVENIDO   ";echo $_SESSION['nombre'] ;echo"</a></div>"; 
		  
	  }
  
  }

  else{
  
  }
  
  
   if(isset($_SESSION['nombre'])) {
 echo" <div class='kicker'><a href='logout.php'>Cerrar Sesion</a></div>";
  }
  
  else{
  echo" <div class='kicker2'>Red social para crear eventos musicales </div>";
  
  }
  echo"
</header>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
 	<script src='fittext.js'></script>
	<script type='text/javascript'>
		
		$('header h1').fitText(1.1, { minFontSize: '20px', maxFontSize: '72px' });
	</script>";
?>
