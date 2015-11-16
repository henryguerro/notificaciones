<?php 
use \Notificaciones\Infrastructure\ContratoRepository;
use \Notificaciones\Domain\Contrato;
use \Illuminate\Support\Collection; 

class RepositoryContratoTest extends PHPUnit_Framework_TestCase
{

  /**
   * @test
   */
  function find_a_contrato_by_id()
  {
    $contratos = new ContratoRepository();

    $cotrato = $contratos->find(1);

    $this->assertInstanceOf(
      Contrato::Class, 
      $cotrato
    );

  }

  /**
   * @test
   */
  function fail_to_find_a_responsabilidad_by_id()
  {
    $contratos = new ContratoRepository();

    $this->setExpectedException(\Notificaciones\Domain\EntityNotFound::Class);

    $contratos->find(10000);

  }


}
