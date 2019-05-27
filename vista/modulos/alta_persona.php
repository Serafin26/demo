<div class="alert alert-dark" role="alert">
  <h2><i class="fa fa-file-alt"></i> Alta de Personas <small>de la Empresa</small></h2>
</div>
<div class="container">
  <form method="POST" enctype="multipart/form-data" class="from-horizontal form-label-left" accept-charset="utf-8">
     <div class="form-group">
      <label for="exampleInputEmail1">Nombre de la Persona</label>
      <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Serafin Eduardo"> 
      <small class="form-text">Escriba el/los nombres de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" class="form-control" name="ap" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Barron">
      <small class="form-text">Escriba el Apellido Paterno de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" class="form-control" name="am" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lopez">
      <small class="form-text">Escriba el Apellido Materno de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Edad</label>
      <input type="number" class="form-control" name="edad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="18">
      <small class="form-text">Escriba la edad de la persona</small>
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Sexo</label>
      <select name="sexo" class="form-control" aria-describedby="sexo" placeholder="">
        <option value="#">Seleccione...</option>
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>
      </select>
      <small class="form-text">Seleccione el Sexo de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Correo</label>
      <input type="e-mail" class="form-control" name="correo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="serafin@hotmail.com">
      <small class="form-text">Escriba el correo de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Clave</label>
      <input type="password" class="form-control" name="clave" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4654">
      <small class="form-text">Escriba la Clave de la persona</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Foto</label>
      <input type="file" class="form-control" name="foto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      <small class="form-text">Foto de la persona</small>
    </div>

    <label for="formGroupExampleInput2">Departamento</label>
          <select name="depto" class="form-control" aria-describedby="depto" placeholder="">
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

    <label for="formGroupExampleInput2">Profesion</label>
          <select name="profe" class="form-control" aria-describedby="depto" placeholder="">
          <option value="#">Seleccione..</option>
          <?php
              $respuesta = Controller::ConsultaProfesionController();

              foreach($respuesta as $row => $valor)
              {
                echo '<option value="'.$valor["pk_profesion"].'">'.$valor["profesion"].'</option>';
              }
          ?>
        </select>
        <br>

      <label for="formGroupExampleInput2">Grado</label>
          <select name="grad" class="form-control" aria-describedby="depto" placeholder="">
          <option value="#">Seleccione..</option>
          <?php
              $respuesta = Controller::ConsultaGradoController();

              foreach($respuesta as $row => $valor)
              {
                echo '<option value="'.$valor["pk_grado"].'">'.$valor["grado"].'</option>';
              }
          ?>
        </select>
        <br>
    <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
  </div>
</form>
</div>
<br>
<div>
  <?php
    include("mostrar_persona.php");
  ?>
</div>
<div> 
  <?php
    $registro = new Controller();
    $registro -> registroPersonaController();
  ?>
</div>
