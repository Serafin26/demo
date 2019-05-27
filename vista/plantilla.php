<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>	LadelApache</title>
	<link rel="stylesheet" href="vista/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
	<div>
		<?php
			require("modulos/menu.php");
		?>
	</div>

	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
   			<h1 class="display-4"><i class="fa fa-address-book"></i> Gestion de Empresarial</h1>
    		<p class="lead">Aplicacion web que gestiona la alta de personas, profesion, grados, puestos y departamento de la empresa.</p>
  		</div>
	</div>

<div>
	<?php
		$f2 =new Controller();
		$f2 -> enlacespagina();
	?>
</div>
<div>
	<?php
		require("modulos/datos_personales.php");
	?>
</div>

	<script src="vista/js/jquery-3.2.1.slim.min.js"></script>
	<script src="vista/js/popper.min.js"></script>
	<script src="vista/js/bootstrap.min.js"></script>
	<script src="vista/js/query.js"></script>
</body>
</html>