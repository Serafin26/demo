<?php 
class Conexion
{
	static public function conectar()
	{
		$link = new PDO("mysql:host=localhost; dbname=ladelapache; charset=UTF8", "root", "");
		return $link;
	}
}