<?php
namespace Notificaciones\Infrastructure;

use Notificaciones\Domain\Empresa;

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

  public function add(Empresa $empresa)
  {
      $pdo = $this->getPDO();

      try{
          $statement = $pdo->prepare(
              'INSERT INTO  '. $this->table() .'(id, nombre) VALUES (:id, :nombre)'
            );
        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

      $statement->bindParam(':id', $empresa->getRif);
      $statement->bindParam(":nombre", $empresa->getNombre);

      $statement->execute();

  }

}