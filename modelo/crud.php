<?php
require_once "conexion.php";

class Datos
{
	static public function registroPersonaModel($DatosModel, $tabla)
	{

		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$activo = "1";

		$ejecucion = Conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidop, apellidom, edad, sexo, correo, clave, foto, activo, hora, fecha, fk_departamento, fk_profesion, fk_grado) VALUES (:nombres, :apellidop, :apellidom, :edad, :sexo, :correo, :clave, :foto, :activo, :hora, :fecha, :fk_departamento, :fk_profesion, :fk_grado) ");	

		$ejecucion ->bindParam(":nombres", $DatosModel["a"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":apellidop", $DatosModel["b"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":apellidom", $DatosModel["c"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":edad", $DatosModel["d"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":sexo", $DatosModel["f"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":correo", $DatosModel["g"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":clave", $DatosModel["h"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":foto", $DatosModel["i"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":activo", $activo, PDO::PARAM_STR);
		$ejecucion ->bindParam(":hora", $hora, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fk_departamento", $DatosModel["j"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":fk_profesion", $DatosModel["k"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":fk_grado", $DatosModel["l"], PDO::PARAM_STR);

		if ($ejecucion->execute()) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}

	static public function registroPuestoModel($DatosModel, $tabla)
	{
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$activo = "1";

		$ejecucion = Conexion::conectar()->prepare("INSERT INTO $tabla (puesto, salario, fk_departamento, activo, hora, fecha) VALUES (:puesto, :salario, :fk_departamento, :activo, :hora, :fecha) ");	

		$ejecucion ->bindParam(":puesto", $DatosModel["x"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":salario", $DatosModel["y"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":fk_departamento", $DatosModel["z"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":activo", $activo, PDO::PARAM_STR);
		$ejecucion ->bindParam(":hora", $hora, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		
		if ($ejecucion->execute()) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}

	static public function registroDepartamentoModel($DatosModel, $tabla)
	{

		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$activo = "1";

		$ejecucion = Conexion::conectar()->prepare("INSERT INTO $tabla (departamento, activo, hora, fecha) VALUES (:departamento, :activo, :hora, :fecha) ");	

		$ejecucion ->bindParam(":departamento", $DatosModel["p"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":activo", $activo, PDO::PARAM_STR);
		$ejecucion ->bindParam(":hora", $hora, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fecha", $fecha, PDO::PARAM_STR);


		if ($ejecucion->execute()) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}

	static public function registroProfesionModel($DatosModel, $tabla)
	{

		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$activo = "1";

		$ejecucion = Conexion::conectar()->prepare("INSERT INTO $tabla (profesion, activo, hora, fecha) VALUES (:profesion, :activo, :hora, :fecha) ");	

		$ejecucion ->bindParam(":profesion", $DatosModel["q"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":activo", $activo, PDO::PARAM_STR);
		$ejecucion ->bindParam(":hora", $hora, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fecha", $fecha, PDO::PARAM_STR);


		if ($ejecucion->execute()) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}

	static public function registroGradoModel($DatosModel, $tabla)
	{

		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$activo = "1";

		$ejecucion = Conexion::conectar()->prepare("INSERT INTO $tabla (grado, activo, hora, fecha) VALUES (:grado, :activo, :hora, :fecha) ");	

		$ejecucion ->bindParam(":grado", $DatosModel["r"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":activo", $activo, PDO::PARAM_STR);
		$ejecucion ->bindParam(":hora", $hora, PDO::PARAM_STR);
		$ejecucion ->bindParam(":fecha", $fecha, PDO::PARAM_STR);


		if ($ejecucion->execute()) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}


	static public function vistaPersonasModel($tabla1, $tabla2, $tabla3, $tabla4)
	{
		$consulta = Conexion::conectar()->prepare("
			SELECT $tabla2.departamento, $tabla4.grado, $tabla1.*, $tabla3.profesion, puesto.puesto
			FROM $tabla2, $tabla4, $tabla1, $tabla3, puesto
			WHERE $tabla1.fk_departamento = $tabla2.pk_departamento
			AND $tabla1.fk_profesion = $tabla3.pk_profesion
			AND $tabla1.fk_grado = $tabla4.pk_grado
			AND puesto.fk_departamento = $tabla2.pk_departamento");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}


	static public function vistaDepartamentoModel($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}

	static public function vistaProfesionmodel($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}

	static public function vistaGradoModel($tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function vistaPuestoModel($tabla, $tabla1)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_puesto, puesto, salario, departamento FROM $tabla, $tabla1 where $tabla.fk_departamento=$tabla1.pk_departamento");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}

	static public function editarPuestoModel($DatosModel, $tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_puesto, puesto, salario, fk_departamento FROM $tabla WHERE pk_puesto = :pk");

		$consulta -> bindParam(":pk", $DatosModel, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetch();
		$consulta->close();
	}

	static public function actualizarPuestoModel($arregloModel, $puesto)
	{

		$consulta = Conexion::conectar()->prepare("UPDATE $puesto SET puesto = :puesto, salario =:salario, fk_departamento = :fk_depto WHERE pk_puesto = :pk");

		$consulta ->bindParam(":puesto", $arregloModel['puesto'], PDO::PARAM_STR);
		$consulta ->bindParam(":salario", $arregloModel['salario'], PDO::PARAM_STR);
		$consulta ->bindParam(":fk_depto", $arregloModel['departamento'], PDO::PARAM_STR);
		$consulta ->bindParam(":pk", $arregloModel['pk'], PDO::PARAM_INT);


		if($consulta->execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$consulta ->close();

	}

	static public function editarProfesionModel($DatosModel, $tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_profesion, profesion FROM $tabla WHERE pk_profesion = :pk");

		$consulta -> bindParam(":pk", $DatosModel, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetch();
		$consulta->close();

	}

	static public function actualizarProfesionModel($arregloModel, $profesion)
	{

		$consulta = Conexion::conectar()->prepare("UPDATE $profesion SET profesion = :profesion WHERE pk_profesion = :pk");

		$consulta ->bindParam(":profesion", $arregloModel['profesion'], PDO::PARAM_STR);
		$consulta ->bindParam(":pk", $arregloModel['pk'], PDO::PARAM_INT);


		if($consulta->execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$consulta ->close();

	}

	static public function editarGradoModel($DatosModel, $tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_grado, grado FROM $tabla WHERE pk_grado = :pk");

		$consulta -> bindParam(":pk", $DatosModel, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetch();
		$consulta->close();

	}

	static public function actualizarGradoModel($arregloModel, $grado)
	{

		$consulta = Conexion::conectar()->prepare("UPDATE $grado SET grado = :grado WHERE pk_grado = :pk");

		$consulta ->bindParam(":grado", $arregloModel['grado'], PDO::PARAM_STR);
		$consulta ->bindParam(":pk", $arregloModel['pk'], PDO::PARAM_INT);


		if($consulta->execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$consulta ->close();

	}

	static public function editarDepartamentoModel($DatosModel, $tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_departamento, departamento FROM $tabla WHERE pk_departamento = :pk");

		$consulta -> bindParam(":pk", $DatosModel, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetch();
		$consulta->close();

	}

	static public function actualizarDepartamentoModel($arregloModel, $departamento)
	{

		$consulta = Conexion::conectar()->prepare("UPDATE $departamento SET departamento = :departamento WHERE pk_departamento = :pk");

		$consulta ->bindParam(":departamento", $arregloModel['departamento'], PDO::PARAM_STR);
		$consulta ->bindParam(":pk", $arregloModel['pk'], PDO::PARAM_INT);


		if($consulta->execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$consulta ->close();

	}

	static public function borrarDepartamentoModel($DatosModel, $tabla)
	{
		$consulta = Conexion::conectar()->prepare("SELECT pk_departamento, departamento FROM $tabla WHERE pk_departamento = :pk");

		$consulta -> bindParam(":pk", $DatosModel, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetch();
		$consulta->close();

	}
}