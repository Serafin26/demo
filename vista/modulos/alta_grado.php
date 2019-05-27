<div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-file-alt"></i> Alta de Grados <small>de la Persona</small></h2>
</div>
<div class="container">
	<form method="POST" class="form-horizontal form-label-left" accept-charset="utf-8">
		<div class="form-group">
	    	<label for="exampleInputEmail1">Grado</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="grado" aria-describedby="emailHelp" placeholder="Ingenieria">
	    	<small id="emailHelp" class="form-text text-muted">Escriba el Grado de la Persona.</small>
  		</div>

  		<button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
	</form>
</div>
<br>
<div>
  <?php
    include("mostrar_grado.php");
  ?>
</div>
</div>
<div>
  <?php
    $registro = new Controller();
    $registro -> registroGradoController();
  ?>
</div>