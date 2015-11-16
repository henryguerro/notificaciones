<?php

use Notificaciones\Domain\EmpresaRegistrada;
use Notificaciones\Domain\EmpresaRegistro;
use Notificaciones\Infrastructure\EmpresaRepository;
use Notificaciones\Domain\Empresa;

Class EmpresaRegistryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function empresa_registry()
    {
        $repository = $this->getMock(EmpresaRepository::class);
       $events = new \Illuminate\Events\Dispatcher();

        $fired = false;
        $events->listen(
            EmpresaRegistrada::Class,
            function(EmpresaRegistrada $event) use (&$fired){
                $fired = true;
            }
        );
        $registry = new EmpresaRegistro($repository, $events);

        $company = $registry->register("Probadora de Registro","J-22222222-2");

        $this->assertInstanceOf(
            Empresa::class, $company
        );

        $this->assertTrue($fired);

    }
}