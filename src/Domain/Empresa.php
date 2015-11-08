<?php
namespace WebGobernacion\Domain;

/**
* 
*/
class Empresa
{

	/**
	 * @type string
	 */
	private $nombre;
	

	public function __construct($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

}