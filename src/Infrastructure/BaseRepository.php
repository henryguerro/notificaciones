<?php 
namespace WebGobernacion\Infrastructure;

use WebGobernacion\Domain\EntityNotFound; 


abstract class BaseRepository
{
  private static $pdo;

  /**
   * @return string
   */
  abstract protected function table();

  /**
   * @param array $result
   * @return object
   */
  abstract protected function mapEntity(array $result);

  /**
   * @return \PDO
   */
  protected function getPDO()
  {
    try{
      if(self::$pdo==null){
        self::$pdo = new \PDO('mysql:host=127.0.0.1;dbname=notificaciones','homestead','secret');
/*        self::$pdo = new \PDO('sqlite:database/responsabilidades.sqlite3',"","",array(
          \PDO::ATTR_PERSISTENT => true,
          \PDO::ERRMODE_EXCEPTION =>true,
          \PDO::ATTR_ERRMODE =>true
        ));*/
      }
      return self::$pdo;
    }
    catch(PDOException $e){
      logerror($e->getMessage(), "opendatabase");
      print "Error in openhrsedb ".$e->getMessage();
    }

  }


  public function find($id)
  {
    $pdo = $this->getPDO();

    $statement = $pdo->prepare(
      'SELECT * FROM '. $this->table() .' WHERE id= :id'
    );

    $statement->bindParam(':id',$id,\PDO::PARAM_INT); 

    $statement->execute();

    $result = $statement->fetch();

    if ($result === false) {
      throw new EntityNotFound(
        $id,
        $this->table() ." $id no existe."
      );
    }

    return $this->mapEntity($result);

  }


  protected function createDefaultTables()
  {
    $pdo = $this->getPDO();
    try{ 
      $pdo->exec(
        "CREATE TABLE IF NOT EXISTS empresa (
          rif TEXT NOT NULL PRIMARY KEY, 
          nombre TEXT NOT NULL)"
      );
    }
    catch (PDOException $e){
        echo 'Connection failed: ' . $e->getMessage();
    }

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