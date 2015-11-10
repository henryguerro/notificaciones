<?php 
use \WebGobernacion\Infrastructure\Database;

class DatabaseTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  function it_should_be_able_to_construct()
  {
    $database  = new Database();

    $this->assertInstanceOf(Database::class,$database);

    $result = $database->responsabilidades();

    $this->assertInstanceOf(\Illuminate\Support\Collection::class,$result);

  }

  function it_allow_create_fefault_database()
  {
    $database  = new Database();

    $this->assertInstanceOf(Database::class,$database);

    $database->createTables();

  }

}
