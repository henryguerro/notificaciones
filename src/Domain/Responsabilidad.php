<?php
namespace WebGobernacion\Domain;

use \WebGobernacion\Infrastructure\ContratoRepository;
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


	public function __construct($contratoID,$titulo,$fecha,$id=null)
	{
		$this->setContrato($contratoID);
		$this->titulo 	= $titulo;
		$this->fecha 		= $fecha;
		$this->id 			= $id;
	}

	public static function create(Contrato $contrato,$titulo,$fecha)
	{
		$responsabilidad = new Responsabilidad($contrato,$titulo,$fecha);
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
		return $this->contrato->getTitulo();
	}

	/**
	 * @return string 
	 */
	public function getEmpresa()
	{
		return $this->contrato->getEmpresa();
	}

	/**
	 * @return void 
	 */
	private function setContrato($contrato)
	{
		if ($contrato instanceof Contrato) {
			$this->contrato = $contrato;
		}else{
			$repository = new ContratoRepository();
			$this->contrato = $repository->find($contrato);
		}
	}
}