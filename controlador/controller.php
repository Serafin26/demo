<?php
class Controller
{
	static public function pagina()
	{
		include "vista/plantilla.php";
	}

	static public function enlacespagina()
	{
		if(isset($_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginaModel($enlaces);
		include $respuesta;
	}
	static public function registroPersonaController()
	{
		if (isset($_POST['nombre'])) 
		{
			
			$archivo = $_FILES['foto']['tmp_name'];
			$nombre_archivo = $_FILES['foto']['name'];
			$tipo = $_FILES['foto']['type'];
			$tamanio = $_FILES['foto']['size'];

			echo '<script>
					var archivo= "'.$archivo.'"
					alert("El nombre temporal es: "+archivo)
				</script>
			';

			echo '<script>
					var nombre= "'.$nombre_archivo.'"
					alert("El nombre real es: "+nombre)
				</script>
			';

			echo '<script>
					var tipo= "'.$tipo.'"
					alert("El tipo de archivo es: "+tipo)
				</script>
			';

			echo '<script>
					var tamanio= "'.$tamanio.'"
					alert("El tamaño del archivo es: "+tamanio)
				</script>
			';

			$ruta = "controlador/fotos/".$nombre_archivo;

			if (move_uploaded_file($archivo, $ruta)) 
			{
				echo '<script>
						alert("Archivo copiado exitosamente")
						</script>
				';
			}
			else
			{
				echo '<script>
						alert("Archivo no copiado")
						</script>
				';
			}

			$datosController = array("a"=>$_POST["nombre"], 
				"b"=>$_POST["ap"], 
				"c"=>$_POST["am"], 
				"d"=>$_POST["edad"],
				"f"=>$_POST["sexo"],
				"g"=>$_POST["correo"],
				"h"=>$_POST["clave"],
				"i"=>$ruta,
				"j"=>$_POST["depto"],
				"k"=>$_POST["profe"], 
				"l"=>$_POST["grad"]);

			$respuesta = Datos::registroPersonaModel($datosController, "persona");
			if ($respuesta =="success") 
			{
				echo '<script>
				alert("Datos Guardados Correctamente");
				window.location="index.php?action=persona&guardar=ok"</script>';
			}
			else
			{
				echo '<script>
				alert("Datos No Guardados");
				window.location="index.php?action=persona&guardar=ok"</script>';
			}
		}
	}

	static public function registroPuestoController()
	{
		if (isset($_POST['puesto'])) 
		{
			$datosController = array("x"=>$_POST["puesto"],
			"y"=>$_POST["salario"],
			"z"=>$_POST["deptos"]);
			

			$respuesta = Datos::registroPuestoModel($datosController, "puesto");
			if ($respuesta =="success") 
			{
				echo '<script>
				alert("Datos Guardados Correctamente");
				window.location="index.php?action=puesto&guardar=ok"</script>';
			}
			else
			{
				echo '<script>
				alert("Datos No Guardados");
				window.location="index.php?action=puesto&guardar=ok"</script>';
			}
		}
	}

	static public function registroDepartamentoController()
	{
		if (isset($_POST['departamento'])) 
		{
			$datosController = array("p"=>$_POST["departamento"]);
			

			$respuesta = Datos::registroDepartamentoModel($datosController, "departamento");
			if ($respuesta =="success") 
			{
				echo '<script>
				alert("Datos Guardados Correctamente");
				window.location="index.php?action=departamento&guardar=ok"</script>';
			}
			else
			{
				echo '<script>
				alert("Datos No Guardados");
				window.location="index.php?action=departamento&guardar=ok"</script>';
			}
		}
	}

	static public function registroProfesionController()
	{
		if (isset($_POST['profesion'])) 
		{
			$datosController = array("q"=>$_POST["profesion"]);
			

			$respuesta = Datos::registroProfesionModel($datosController, "profesion");
			if ($respuesta =="success") 
			{
				echo '<script>
				alert("Datos Guardados Correctamente");
				window.location="index.php?action=profesion&guardar=ok"</script>';
			}
			else
			{
				echo '<script>
				alert("Datos No Guardados");
				window.location="index.php?action=profesion&guardar=ok"</script>';
			}
		}
	}

	static public function registroGradoController()
	{
		if (isset($_POST['grado'])) 
		{
			$datosController = array("r"=>$_POST["grado"]);
			

			$respuesta = Datos::registroGradoModel($datosController, "grado");
			if ($respuesta =="success") 
			{
				echo '<script>
				alert("Datos Guardados Correctamente");
				window.location="index.php?action=grado&guardar=ok"</script>';
			}
			else
			{
				echo '<script>
				alert("Datos No Guardados");
				window.location="index.php?action=grado&guardar=ok"</script>';
			}
		}
	}
	static public function vistaPersonaController()
	{
		$respuesta = Datos::vistaPersonasModel("persona", "departamento", "profesion", "grado");
		foreach($respuesta as $datos)
		{
			?>
				<tr>
					<td>
						<img src="<?php echo $datos['foto'];?>" width="100" height="80">
					</td>
					
					<td><?php echo $datos['apellidop']; ?></td>
					<td><?php echo $datos['departamento']; ?></td>
					<td><?php echo $datos['profesion']; ?></td>
					<td>
						<a href="#detallePersona"<?php echo $datos['pk_persona']; ?>" data-toggle="modal"><button class="btn btn-primary"><li class="fa fa-eye"></li></button></a>
					</td>
					
					<td><a href=""><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a></td>
					<td><a href=""><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
				</tr>

										<!--modal-->
				<div class="modal fade" id="detallePersona"<?php echo $datos['pk_persona']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Informacion del personal</h5>
				      </div>
				      <div class="modal-body">
				        
				      	<div class="row cal-md-12">
				      		<div class="col-md-6">
				      			<img src="<?php echo $datos['foto']; ?>" width="100" height="100">
				      		</div>
				      		<br>
				      		<div class="col-md-6">
				      			<p> Apellido Paterno: <?php echo $datos['apellidop']; ?> </p>
				      			<p> Apellido Materno: <?php echo $datos['apellidom']; ?> </p>
				      			<p> Nombres: <?php echo $datos['nombres']; ?></p>

				      		</div>

				      	</div>








				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				      </div>
				    </div>
				  </div>
				</div>

			<?php
		}
	}

	static public function vistaDepartamentoController()
	{
		$respuesta = Datos::vistaDepartamentoModel("departamento");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['departamento']; ?></td>
					<td><a href="index.php?action=editarDepartamento&pk=<?php echo $datos['pk_departamento']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a></td>
					<td><a href="index.php?action=borrarDepartamento&pk=<?php echo $datos['pk_departamento']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
				</tr>
			<?php
		}
	}

		static public function vistaProfesionController()
	{
		$respuesta = Datos::vistaProfesionModel("profesion");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['profesion']; ?></td>
					<td><a href="index.php?action=editarProfesion&pk=<?php echo $datos['pk_profesion']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a></td>
					<td><a href=""><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
				</tr>
			<?php
		}
	}

	static public function vistaGradoController()
	{
		$respuesta = Datos::vistaGradoModel("grado");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['grado']; ?></td>
					<td><a href="index.php?action=editarGrado&pk=<?php echo $datos['pk_grado']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a></td>
					<td><a href=""><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
				</tr>
			<?php
		}
	}

	static public function vistaPuestoController()
	{
		$respuesta = Datos::vistaPuestoModel("puesto", "departamento");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['puesto']; ?></td>
					<td><?php echo $datos['salario']; ?></td>
					<td><?php echo $datos['departamento']; ?></td>
					<td><a href="index.php?action=editarPuesto&pk=<?php echo $datos['pk_puesto']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></a></td>
					<td><a href=""><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
				</tr>
			<?php
		}
	}

	static public function ConsultaDepartamentoController()
	{
		$tabla = "departamento";
		$respuesta = Datos::vistaDepartamentoModel($tabla);
		return $respuesta;
	}

	static public function ConsultaProfesionController()
	{
		$tabla = "profesion";
		$respuesta = Datos::vistaProfesionmodel($tabla);
		return $respuesta;
	}

	static public function ConsultaGradoController()
	{
		$tabla = "grado";
		$respuesta = Datos::vistaGradomodel($tabla);
		return $respuesta;
	}

	static public function editarPuestoController()
	{
		$datos = $_GET['pk'];
		$respuesta = Datos::editarPuestoModel($datos, "puesto", "departamento");
		?>
		<input type="hidden" name="pk" value="<?php echo $respuesta['pk_puesto']; ?>">

		<div class="container">
  		<form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
      	<div class="form-group">
        <label for="formGroupExampleInput2">Nombre del Puesto</label>
        <input type="text" class="form-control" name="puesto" value="<?php echo $respuesta['puesto']; ?>">
        <small class="form-text">Escriba el nombre del puesto</small>
      	</div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Salario</label>
        <input type="number" class="form-control" name="salario" value="<?php echo $respuesta['salario']; ?>">
        <small class="form-text">Escriba el Salario de la persona</small>
      </div>
       <div class="form-group">
        <label for="formGroupExampleInput2">Departamento</label>
          <select name="deptos" class="form-control">
          <?php
              $respuesta2 = Controller::ConsultaDepartamentoController();
              $a = 0;
              foreach($respuesta2 as $row => $valor)
              {
                	$a++;
                	if($respuesta['fk_departamento'] == $valor['pk_departamento'])
                	{
                		echo '<option value="'.$valor["pk_departamento"].'"selected="select">'.$valor["departamento"].'</option>';
                	}
                	else
                	{
                		echo '<option value="'.$valor["pk_departamento"].'">'.$valor["departamento"].'</option>';
                	}
                }
                ?>
        </select>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
		</form>
	</div>
	<?php
	}


	static public function actualizarPuestoController()
	{
		if (isset($_POST['puesto'])) 
		{
			$arregloController = array("pk"=>$_POST['pk'], "puesto"=>$_POST['puesto'], "salario"=>$_POST['salario'], "departamento"=>$_POST['deptos']);

			

			$respuesta = Datos::actualizarPuestoModel($arregloController, "puesto");
			if($respuesta = "ok")
			{
				echo '<script>
				alert ("Datos actualizados correctamente");
				window.location="index.php?action=puesto"</script>';
			}
			else
			{
				echo '<script>
				alert ("Datos NO actualizados");
				window.location="index.php?action=puesto"</script>';
			}
		
		}
	}


	static public function editarProfesionController()
	{
		$datos = $_GET['pk'];
		$respuesta = Datos::editarProfesionModel($datos, "profesion");
		?>
		<input type="hidden" name="pk" value="<?php echo $respuesta['pk_profesion']; ?>">

		<div class="container">
  		<form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
  			<div class="form-group">
	    	<label for="exampleInputEmail1">Profesion</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="profesion"  value="<?php echo $respuesta['profesion']; ?>">
	    	<small id="emailHelp" class="form-text text-muted">Escriba la profesion de la persona.</small>
  		</div>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
		</form>
	</div>
	<?php
	}

	static public function actualizarProfesionController()
	{
		if (isset($_POST['profesion'])) 
		{
			$arregloController = array("pk"=>$_POST['pk'], "profesion"=>$_POST['profesion']);

			

			$respuesta = Datos::actualizarProfesionModel($arregloController, "profesion");
			if($respuesta = "ok")
			{
				echo '<script>
				alert ("Datos actualizados correctamente");
				window.location="index.php?action=profesion"</script>';
			}
			else
			{
				echo '<script>
				alert ("Datos NO actualizados");
				window.location="index.php?action=profesion"</script>';
			}
		
		}
	}

	static public function editarGradoController()
	{
		$datos = $_GET['pk'];
		$respuesta = Datos::editarGradoModel($datos, "grado");
		?>
		<input type="hidden" name="pk" value="<?php echo $respuesta['pk_grado']; ?>">

		<div class="container">
  		<form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
  		<div class="form-group">
	    	<label for="exampleInputEmail1">Grado</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="grado" value="<?php echo $respuesta['grado']; ?>">
	    	<small id="emailHelp" class="form-text text-muted">Escriba el Grado de la Persona.</small>
	    </div>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
		</form>
	</div>
	<?php
	}

	static public function actualizarGradoController()
	{
		if (isset($_POST['grado'])) 
		{
			$arregloController = array("pk"=>$_POST['pk'], "grado"=>$_POST['grado']);

			$respuesta = Datos::actualizarGradoModel($arregloController, "grado");
			if($respuesta = "ok")
			{
				echo '<script>
				alert ("Datos actualizados correctamente");
				window.location="index.php?action=grado"</script>';
			}
			else
			{
				echo '<script>
				alert ("Datos NO actualizados");
				window.location="index.php?action=grado"</script>';
			}
		
		}
	}

	static public function editarDepartamentoController()
	{
		$datos = $_GET['pk'];
		$respuesta = Datos::editarDepartamentoModel($datos, "departamento");
		?>
		<input type="hidden" name="pk" value="<?php echo $respuesta['pk_departamento']; ?>">

		<div class="container">
  		<form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
  		<div class="form-group">
	    	<label for="exampleInputEmail1">Departamento</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="departamento" value="<?php echo $respuesta['departamento']; ?>">
	    	<small id="emailHelp" class="form-text text-muted">Escriba el nombre del Departamento.</small>
  		</div>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
		</form>
	</div>
	<?php
	}

	static public function actualizarDepartamentoController()
	{
		if (isset($_POST['departamento'])) 
		{
			$arregloController = array("pk"=>$_POST['pk'], "departamento"=>$_POST['departamento']);

			$respuesta = Datos::actualizarDepartamentoModel($arregloController, "departamento");
			if($respuesta = "ok")
			{
				echo '<script>
				alert ("Datos actualizados correctamente");
				window.location="index.php?action=departamento"</script>';
			}
			else
			{
				echo '<script>
				alert ("Datos NO actualizados");
				window.location="index.php?action=departamento"</script>';
			}
		
		}
	}

	static public function borrarDepartamentoController()
	{
		$datos = $_GET['pk'];
		$respuesta = Datos::borrarDepartamentoModel($datos, "departamento");
		?>
		<input type="hidden" name="pk" value="<?php echo $respuesta['pk_departamento']; ?>">

		<div class="container">
  		<form method="POST" class="from-horizontal form-label-left" accept-charset="utf-8">
  		<div class="form-group">
	    	<label for="exampleInputEmail1">Departamento</label>
	    	<input type="text" class="form-control" id="exampleInputEmail1" name="departamento" value="<?php echo $respuesta['departamento']; ?>">
	    	<small id="emailHelp" class="form-text text-muted">Escriba el nombre del Departamento.</small>
  		</div>
        <br>
      </div>
      <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
		</form>
	</div>
	<?php
	}
}