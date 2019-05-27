<?php

class Paginas
{
	static public function enlacesPaginaModel($enlaces)
	{
		if($enlaces == "principal")
		{
			$module = "vista/modulos/principal.php";
		}
		else if($enlaces == "persona")
		{
			$module = "vista/modulos/alta_persona.php";
		}
		else if($enlaces == "profesion")
		{
			$module = "vista/modulos/alta_profesion.php";
		}
		else if($enlaces == "puesto")
		{
			$module = "vista/modulos/alta_puesto.php";
		}
		else if($enlaces == "departamento")
		{
			$module = "vista/modulos/alta_departamento.php";
		}
		elseif ($enlaces == "editarPuesto") 
		{
			$module = "vista/modulos/editar_Puesto.php";
		}
		elseif ($enlaces == "editarProfesion") 
		{
			$module = "vista/modulos/editar_Profesion.php";
		}
		elseif ($enlaces == "editarGrado") 
		{
			$module = "vista/modulos/editar_Grado.php";
		}
		elseif ($enlaces == "editarDepartamento") 
		{
			$module = "vista/modulos/editar_Departamento.php";
		}
		elseif ($enlaces == "borrarDepartamento") 
		{
			$module = "vista/modulos/borrar_Departamento.php";
		}
		else if($enlaces == "grado")
		{
			$module = "vista/modulos/alta_grado.php";
		}
		else 
		{
			$module = "vista/modulos/principal.php";
		}
		return $module;
	}
}