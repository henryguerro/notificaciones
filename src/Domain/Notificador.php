<?php
namespace WebGobernacion\Domain;

use WebGobernacion\Infrastructure\FakeDatabase;

/**
* Representa un patrón de Servicio encargado
* de comunicarse con la capa de Infraestructura
* Para notificar las Responsabilidades Sociales
*/
class Notificador
{
	private $db;

	public function __construct(FakeDatabase $db)
	{
		$this->db = $db;
	}

	public function listResponsabilidades()
	{
		return $this->db->contratos();
	}
}
