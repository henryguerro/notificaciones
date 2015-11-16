<?php 
use \Notificaciones\Infrastructure\EmpresaRepository;
use \Notificaciones\Domain\Empresa;
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

    /**
   * @test
   */
  function add_empresa()
  {
        $empresa = new Empresa("EmpresaPruebaAdd","J-11111111-1");

        $repository = new EmpresaRepository();

        $repository->add($empresa);

  }

}
