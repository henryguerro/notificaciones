<?php
namespace WebGobernacion\Domain;

use WebGobernacion\Infrastructure\ResponsabilidadRepository;

/**
* Representa un patrón de Servicio encargado
* de comunicarse con la capa de Infraestructura
* Para notificar las Responsabilidades Sociales
*/
class Notificador
{
  /**
   * @type ResponsabilidadRepository
   */
	private $responsabilidades;

	public function __construct(ResponsabilidadRepository $responsabilidades)
	{
		$this->responsabilidades = $responsabilidades;
	}

  /**
   * @return \Illuminate\Support\Collection
   */
	public function listResponsabilidades()
	{
		return $this->responsabilidades->all();
	}

  public function findById($id)
  {
    return $this->responsabilidades->find($id);
  }
}
