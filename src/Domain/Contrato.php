<?php
namespace Notificaciones\Domain;

use \Notificaciones\Infrastructure\EmpresaRepository;
/**
* 
*/
class Contrato
{
	/**
	 * @type int
	 */
	private $id;
	/**
	 * @type object
	 */
	private $empresa;
	/**
	 * @type int
	 */
	private $fecha;
	/**
	 * @type string
	 */
	private $titulo;
	

	public function __construct($empresaID,$fecha,$titulo,$id=null)
	{
		$this->setEmpresa($empresaID);
		$this->numero 		= $fecha;
		$this->titulo 		= $titulo;
		$this->id 				= $id;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function getEmpresa()
	{
		return $this->empresa->getNombre();
	}

	private function setEmpresa($empresa)
	{
		if ($empresa instanceof Empresa) {
			$this->empresa = $empresa;
		}else{
			$repository = new EmpresaRepository();
			$this->empresa = $repository->find($empresa);
		}
	}
}