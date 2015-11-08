<?php 
/**
* 
*/
use \WebGobernacion\Domain\Responsabilidad;
use \WebGobernacion\Domain\Contrato;
use \WebGobernacion\Domain\Empresa;

class ResponsabilidadTest extends PHPUnit_Framework_TestCase
{

  /**
   * @test
   */
  function it_should_be_able_to_construct()
  {
    $empresa  = new Empresa("Probadora");
    $contrato = new Contrato($empresa,0105,"Contrato de Responsabilidad");
    $responsabilidad = new Responsabilidad($contrato,'Prueba',"10/10/2015");

    $this->assertInstanceOf(Responsabilidad::class,$responsabilidad);

  }
  /**
   * @test
   */
  public function it_return_title()
  {
    $empresa  = new Empresa("Probadora");
    $contrato = new Contrato($empresa,0105,"Contrato de Responsabilidad");
    $responsabilidad = new Responsabilidad($contrato,'Prueba',"10/10/2015");
    $name = $responsabilidad->getTitulo();
    $this->assertEquals('Prueba', $name);
  }

  /**
   * @test
   */
  public function it_return_contrato()
  {
    $empresa  = new Empresa("Probadora");
    $contrato = new Contrato($empresa,0105,"Contrato de Responsabilidad");
    $responsabilidad = new Responsabilidad($contrato,'Prueba',"10/10/2015");
    $nombre = $responsabilidad->getContrato();
    $this->assertEquals("Contrato de Responsabilidad", $nombre);
  }
}
