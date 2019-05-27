<div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-file-alt"></i> Alta de Profesion <small>de la Persona</small></h2>
</div>
<div class="container">
	<form method="POST" class="form-horizontal form-label-left" accept-charset="utf-8">
		<div class="form-group">
	    	<label for="exampleInputEmail1">Profesion</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="profesion" aria-describedby="emailHelp" placeholder="Licenciado">
	    	<small id="emailHelp" class="form-text text-muted">Escriba la profesion de la persona.</small>
  		</div>

  		<button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
	</form>
</div>
<br>
<div>
  <?php
    include("mostrar_profesion.php");
  ?>
</div>
</div>
<div>
  <?php
    $registro = new Controller();
    $registro -> registroProfesionController();
  ?>
</div>