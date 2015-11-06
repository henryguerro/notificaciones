<?php 
/**
* 
*/
use \WebGobernacion\FakeDatabase;

class ResponsabilidadTest extends PHPUnit_Framework_TestCase
{

  /**
   * @test
   */
  function it_should_be_able_to_construct()
  {
    $fakeDatabase  = new FakeDatabase();

    $this->assertInstanceOf(Responsabilidad::class,$fakeDatabase);

  }

}
