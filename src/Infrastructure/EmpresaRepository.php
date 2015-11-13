<?php 
namespace WebGobernacion\Infrastructure;

use WebGobernacion\Domain\Empresa; 

/**
* 
*/
class EmpresaRepository extends BaseRepository
{

  protected function table()
  {
    return 'empresa';
  }

  /**
   * @return Responsabilidad 
   */
  protected function mapEntity(array $result)
  {
    return new Empresa(
        $result['nombre'],
        $result['id']
    );
  }


}