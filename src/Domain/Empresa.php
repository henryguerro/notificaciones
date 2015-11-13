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

	/**
	 * @type string
	 */
	private $id;


	public function __construct($nombre,$id=null)
	{
		$this->nombre = $nombre;
		$this->id 		= $id;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

}