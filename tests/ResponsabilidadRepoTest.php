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

    $results = $responsabilidades->all();

    $this->assertInstanceOf(Collection::class,$results);

    foreach ($results as $responsabilidad) {
      $this->assertInstanceOf(Responsabilidad::Class, $responsabilidad);
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

    $this->setExpectedException(\WebGobernacion\Domain\EntityNotFound::Class);

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
