<div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-file-alt"></i> Alta de Puestos <small>de la Empresa</small></h2>
</div>
<div class="container">
  <form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
      <div class="form-group">
        <label for="formGroupExampleInput2">Nombre del Puesto</label>
        <input type="text" class="form-control" name="puesto" id="formGroupExampleInput2" placeholder="Gerente">
        <small class="form-text">Escriba el nombre del puesto</small>
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Salario</label>
        <input type="number" class="form-control" name="salario" id="formGroupExampleInput2" placeholder="3500">
        <small class="form-text">Escriba el Salario de la persona</small>
      </div>
       <div class="form-group">
        <label for="formGroupExampleInput2">Departamento</label>
          <select name="deptos" class="form-control" aria-describedby="deptos" placeholder="Departamento">
          <option value="#">Seleccione..</option>
          <?php
              $respuesta = Controller::ConsultaDepartamentoController();

              foreach($respuesta as $row => $valor)
              {
                echo '<option value="'.$valor["pk_departamento"].'">'.$valor["departamento"].'</option>';
              }
          ?>
        </select>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
  </form>
</div>
<br>
<div>
  <?php
    include("mostrar_puesto.php");
  ?>
</div>
<div>
  <?php
    $registro = new Controller();
    $registro -> registroPuestoController();
  ?>
</div>