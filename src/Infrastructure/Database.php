<?php 
namespace WebGobernacion\Infrastructure;

use Illuminate\Support\Collection; 
use WebGobernacion\Domain\Responsabilidad; 
/**
* 
*/
class Database
{

  /**
   * @return PDO 
   * PDO es un modelo de Objeto, una extension de PHP PDO.dll
   * PDO_mysql.dll PDO_mysqlite.dll (php -m)
   */
  public function responsabilidades()
  {

    $pdo = $this->connectDB();
    
    $statement = $pdo->prepare(
      'SELECT * FROM responsabilidad'
    );

    $statement->execute();

    return $this->mapToResponsabilidad(
      $statement->fetchAll()
    );

  }

  public function mapToResponsabilidad(array $results)
  {
    $responsabilidades = new Collection();

    foreach ($results as $result) {
      $responsabilidad = new Responsabilidad(
        $result['contrato'],
        $result['titulo'],
        $result['fecha'],
        $result['id']
      );

      $responsabilidades->push($responsabilidad);
    }

    return $responsabilidades;
  }

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