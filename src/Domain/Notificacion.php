<?php
namespace WebGobernacion\Domain;

/**
* 
*/
class Notificacion
{
	private $id;
	private $titulo;
	private $fecha;
	static private $_ultimoId = 0;

	public function __construct($titulo,$fecha)
	{
		self::$_ultimoId += 1;
		$this->id = self::$_ultimoId;
		$this->titulo = $titulo;
		$this->fecha = $fecha;
	}
}
