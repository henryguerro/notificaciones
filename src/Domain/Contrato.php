<?php
namespace WebGobernacion\Domain;

/**
* 
*/
class Contrato
{
	/**
	 * @type object
	 */
	private $empresa;
	/**
	 * @type int
	 */
	private $numero;
	/**
	 * @type string
	 */
	private $nombre;
	

	public function __construct(Empresa $empresa,$numero,$nombre)
	{
		$this->empresa 		= $empresa;
		$this->numero 		= $numero;
		$this->nombre 		= $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getEmpresa()
	{
		return $this->empresa->getNombre();
	}


}