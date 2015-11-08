<?php 
namespace WebGobernacion\Infrastructure;

use Illuminate\Support\Collection; 
use WebGobernacion\Domain\Empresa; 
use WebGobernacion\Domain\Contrato; 

/**
* 
*/
class FakeDatabase
{


  /**
   * @return Collection
   */
  function contratos()
  {
    $empresa = new Empresa("Probadora C.A");
    return new Collection ([
        new Contrato($empresa,001,"Contrato de Prueba#1"),
        new Contrato($empresa,003,"Contrato de Prueba#3"),
        new Contrato($empresa,005,"Contrato de Prueba#5"),
        new Contrato($empresa,007,"Contrato de Prueba#7")
    ]);
  }
}