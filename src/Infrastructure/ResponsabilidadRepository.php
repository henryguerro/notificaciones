<?php 
namespace Notificaciones\Infrastructure;

use Illuminate\Support\Collection; 
use Notificaciones\Domain\Responsabilidad;
/**
* 
*/
class ResponsabilidadRepository extends BaseRepository
{

  protected function table()
  {
    return 'responsabilidad';
  }


  /**
   * @return Colecction
   */
  public function all()
  {

    $pdo = $this->getPDO();
    
    $statement = $pdo->prepare(
      'SELECT * FROM responsabilidad'
    );

    $statement->execute();

    return $this->mapToResponsabilidades(
      $statement->fetchAll()
    );

  }


  /**
   * @return mapToResponsabilidades
   */
  public function search($query)
  {

    $pdo = $this->getPDO();
    
    $statement = $pdo->prepare(
      'SELECT * FROM responsabilidad WHERE 1'
    );

    $query= "%$query%";
    $statement->bindParam(':query',$query,\PDO::PARAM_STR); 

    return $this->mapToResponsabilidades($statement->fetchAll());

  }

  /**
   * @return Collection 
   */
  public function mapToResponsabilidades(array $results)
  {
    $responsabilidades = new Collection();

    foreach ($results as $result) {

      $responsabilidad = $this->mapEntity($result);

      $responsabilidades->push($responsabilidad);
    }

    return $responsabilidades;
  }

  /**
   * @return Responsabilidad 
   */
  protected function mapEntity(array $result)
  {
    return new Responsabilidad(
        $result['contrato'],
        $result['titulo'],
        $result['fecha'],
        $result['id']
    );
  }


}