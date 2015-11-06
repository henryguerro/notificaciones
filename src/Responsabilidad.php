<?php
namespace WebGobernacion;

/**
* 
*/
class Responsabilidad
{
	/**
	 * @type int
	 */
	private $id;
	/**
	 * @type string
	 */
	private $titulo;
	/**
	 * @type string
	 */
	private $fecha;
	/**
	 * @type object
	 */
	private $contrato;
	/**
	 * @type int
	 */
	static private $_ultimoId = 0;

	public function __construct(Contrato $contrato,$titulo,$fecha)
	{
		self::$_ultimoId += 1;
		$this->id = self::$_ultimoId;
		$this->titulo 	= $titulo;
		$this->fecha 		= $fecha;
		$this->contrato = $contrato;
	}

	/**
	 * @return string
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * @return string 
	 */
	public function getFecha()
	{
		return $this->fecha;
	}

		/**
	 * @return string 
	 */
	public function getContrato()
	{
		return $this->contrato->getNombre();
	}
}