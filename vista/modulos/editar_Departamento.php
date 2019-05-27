<head>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-clipboard"></i> Editar <small> departamento</small></h2>
</div>
<div class="container">
  <form method="POST">
    <?php

      $editar = new Controller();
      $editar ->editarDepartamentoController();

    ?>
  </form>

</div>
<br>
<br>
  <div>
    <?php
      include ("mostrar_departamento.php");
    ?>
  </div>
  <?php 
    $registro = new Controller();
    $registro -> actualizarDepartamentoController();
   ?>