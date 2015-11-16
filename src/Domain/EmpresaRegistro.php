<?php
namespace Notificaciones\Domain;
use Illuminate\Events\Dispatcher;
use Notificaciones\Infrastructure\EmpresaRepository;

/**
* 
*/
class EmpresaRegistro
{

	/**
	 * @type EmpresaRepository
	 */
	private $empresas;

	/**
	 * @type
	 */
	private $events;

	public function __construct(EmpresaRepository $empresas, Dispatcher $events)
	{
		$this->empresas = $empresas;
        $this->events = $events;
	}

	public function register($name, $id)
	{
		$empresa = new Empresa($name, $id);

		$this->empresas->add($empresa);

		$this->events->fire(new EmpresaRegistrada($empresa));
		return $empresa;
	}

}