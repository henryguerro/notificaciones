<?php 
namespace WebGobernacion\Infrastructure;

use Illuminate\Support\Collection; 
use WebGobernacion\Domain\Responsabilidad; 
/**
* 
*/
class ResponsabilidadRepository
{

  /**
   * @return Colecction
   */
  public function all()
  {

    $pdo = $this->connectDB();
    
    $statement = $pdo->prepare(
      'SELECT * FROM responsabilidad'
    );

    $statement->execute();

    return $this->mapToResponsabilidades(
      $statement->fetchAll()
    );

  }

  /**
   * @return Colecction
   */
  public function find($id)
  {
    $pdo = $this->connectDB();

    $statement = $pdo->prepare(
      'SELECT * FROM responsabilidad WHERE id= :id'
    );

    $statement->bindParam(':id',$id,\PDO::PARAM_INT); 

    $statement->execute();

    $result = $statement->fetch();

    if ($result === false) {
      throw new \OutOfBoundsException("La responsabilidad $id no existe.");
    }

    return $this->mapResponsabilidad($result);

  }

  /**
   * @return Colecction
   */
  public function search($query)
  {

    $pdo = $this->connectDB();
    
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

      $responsabilidad = $this->mapResponsabilidad($result);

      $responsabilidades->push($responsabilidad);
    }

    return $responsabilidades;
  }

  /**
   * @return Responsabilidad 
   */
  private function mapResponsabilidad(array $result)
  {
    return new Responsabilidad(
        $result['contrato'],
        $result['titulo'],
        $result['fecha'],
        $result['id']
    );
  }

/**
 * @return \PDO
 */
  private function connectDB()
  {
    try{
      $pdo = new \PDO('sqlite:database/responsabilidades.sqlite3');

      $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      return $pdo;
    }

    catch (PDOException $e){
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public function createDefaultTables()
  {
    $pdo = $this->connectDB();

    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS empresa (
        rif TEXT NOT NULL PRIMARY KEY, 
        nombre TEXT NOT NULL)"
    );

    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS contrato (
        numero INTEGER NOT NULL PRIMARY KEY, 
        titulo TEXT NOT NULL,
        fecha INTEGER,
        empresa TEXT NOT NULL)"
    );

    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS responsabilidad(
        id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
        titulo TEXT NOT NULL,
        fecha INTEGER,
        contrato TEXT NOT NULL)"
    );

  }
}