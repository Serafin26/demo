<head>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-clipboard"></i> Editar <small> profesion</small></h2>
</div>
<div class="container">
  <form method="POST">
    <?php

      $editar = new Controller();
      $editar ->editarProfesionController();

    ?>
  </form>

</div>
<br>
<br>
  <div>
    <?php
      include ("mostrar_profesion.php");
    ?>
  </div>
  <?php 
    $registro = new Controller();
    $registro -> actualizarProfesionController();
   ?>