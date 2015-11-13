<?php 
namespace WebGobernacion\Infrastructure;

use WebGobernacion\Domain\Contrato; 
/**
* 
*/
class ContratoRepository extends BaseRepository
{

  protected function table()
  {
    return 'contrato';
  }

  /**
   * @return Responsabilidad 
   */
  protected function mapEntity(array $result)
  {
    return new Contrato(
        $result['empresa'],
        $result['fecha'],
        $result['titulo'],
        $result['id']
    );
  }


}