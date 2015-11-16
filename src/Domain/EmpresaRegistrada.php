<?php
/**
 * Modelo de Evento que se dispara cuando la empresa fue registrada
 */
namespace Notificaciones\Domain;


class EmpresaRegistrada
{
    /**
     * @type Empresa
     */
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function empresa()
    {
        return $this->empresa;
    }
}