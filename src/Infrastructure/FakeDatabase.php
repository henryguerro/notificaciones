<?php 
namespace Notificaciones\Infrastructure;

use Illuminate\Support\Collection; 
use Notificaciones\Domain\Empresa;
use Notificaciones\Domain\Contrato;

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
      1=> new Contrato($empresa,001,"Contrato de Prueba#1"),
      2=> new Contrato($empresa,003,"Contrato de Prueba#3"),
      3=>  new Contrato($empresa,005,"Contrato de Prueba#5"),
      4=>  new Contrato($empresa,007,"Contrato de Prueba#7")
    ]);
  }
}