<?php 
use \Notificaciones\Infrastructure\BaseRepository;
use \Notificaciones\Infrastructure\ResponsabilidadRepository;

class BaseRepositoryTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  function it_should_be_able_to_construct_extends_the_BaseRepository()
  {
    $database  = new ResponsabilidadRepository();

    $this->assertInstanceOf(ResponsabilidadRepository::class,$database);

    $this->assertInstanceOf(BaseRepository::class,$database);

  }

  ##CREAR BASE DE DATOS CUANDO NO EXISTE
/*  function it_allow_create_fefault_database()
  {
    $database  = new ResponsabilidadRepository();

    $this->assertInstanceOf(ResponsabilidadRepository::class,$database);

    $database->createTables();

  }*/

}
