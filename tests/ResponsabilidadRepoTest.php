<?php 
use \WebGobernacion\Infrastructure\ResponsabilidadRepository;
use \WebGobernacion\Domain\Responsabilidad;
use \Illuminate\Support\Collection; 

class ResponsabilidadRepoTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  function get_all_responsabilidades()
  {
    $responsabilidades  = new ResponsabilidadRepository();

    $this->assertInstanceOf(ResponsabilidadRepository::class,$responsabilidades);

    $results = $responsabilidades->all();

    $this->assertInstanceOf(\Illuminate\Support\Collection::class,$results);

    foreach ($results as $result) {
      $this->assertInstanceOf(Responsabilidad::Class, $result);
    }

  }

  /**
   * @test
   */
  function find_a_responsabilidad_by_id()
  {
    $responsabilidades = new ResponsabilidadRepository();

    $responsabilidad = $responsabilidades->find(1);

    $this->assertInstanceOf(
      Responsabilidad::Class, 
      $responsabilidad
    );

  }

  /**
   * @test
   */
  function fail_to_find_a_responsabilidad_by_id()
  {
    $responsabilidades = new ResponsabilidadRepository();

    $this->setExpectedException(\OutOfBoundsException::Class);

    $responsabilidades->find(10000);

  }

  /**
   * @test
   */
  function searching_responsabilidades()
  {
    $responsabilidades = new ResponsabilidadRepository();

    $results = $responsabilidades->search('Entrega');

    $this->assertInstanceOf(Collection::Class, $results);

  }

}
