<div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-file-alt"></i> Alta de Departamentos <small>de la Empresa</small></h2>
</div>
<div class="container">
	<form method="POST" class="form-horizontal form-label-left" accept-charset="utf-8">
		<div class="form-group">
	    	<label for="exampleInputEmail1">Departamento</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="departamento" aria-describedby="emailHelp" placeholder="Finanzas">
	    	<small id="emailHelp" class="form-text text-muted">Escriba el nombre del Departamento.</small>
  		</div>

  		<button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
	</form>
</div>
<div>
  <?php
    include("mostrar_departamento.php");
  ?>
</div>
</div>
<div>
  <?php
    $registro = new Controller();
    $registro -> registroDepartamentoController();
  ?>
</div>