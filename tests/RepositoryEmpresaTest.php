<?php 
use \WebGobernacion\Infrastructure\EmpresaRepository;
use \WebGobernacion\Domain\Empresa;
use \Illuminate\Support\Collection; 

class RepositoryEmpresaTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  function it_construct_repository()
  {
    $empresaRepository  = new EmpresaRepository();

    $this->assertInstanceOf(EmpresaRepository::class,$empresaRepository);


  }

  /**
   * @test
   */
  function find_a_empresa_by_id()
  {
    $empresas = new EmpresaRepository();

    $empresa = $empresas->find("J-29469419-5");

    $this->assertInstanceOf(
      Empresa::Class, 
      $empresa
    );

  }

}
